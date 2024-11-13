<?php

namespace App\Services;

use App\Models\Empresa;
use App\Enums\HttpStatusEnum;
use App\Services\ImagenesService;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Services\EmpresasService as RulesRequest;
use App\Models\Usuarios;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use App\Mail\Auth\Licenses;
use App\Models\Permisos;
use App\Models\UsuarioHasPermisos;
use Illuminate\Support\Str;

class EmpresasService extends Service
{
    /**
     * Construct
     *
     * @return void
     */
    public function _construct()
    {
        //
    }

    /**
     * Retorna una lista de los recursos
     *
     * @param  array<\App\Http\Requests\Services\EmpresasService\Index>  $data
     * @param  bool  $validateData
     * @return \App\Models\Empresa
     */
    public function index(array $data, bool $validateData = true)
    {
        $this->validate(RulesRequest\Index::class, $data, $validateData);
        $request = new RulesRequest\Index($data);

        $empresa = Empresa::query()
            ->whereNotRequired("nombre", "=", $request->input("nombre"))
            ->get();

        return $empresa;
    }

    /**
     * Guarda un nuevo recurso
     *
     * @param  array<\App\Http\Requests\Services\EmpresasService\Store>  $data
     * @param  bool  $validateData
     * @return \App\Models\Empresa
     */
    public function store(array $data, bool $transactionExists = false, bool $validateData = true)
    {
        $this->validate(RulesRequest\Store::class, $data, $validateData);
        $request = new RulesRequest\Store($data);

        $this->dbBeginTransaction($transactionExists);
        try {
            if ($request->foto) {
                $foto = File::get($request->foto);
                $guardarFoto = ImagenesService::guardar('empresas', $foto, $request->foto->getClientOriginalName());
            }
            $nombre_completo = $request->responsable . " " . $request->ap_pat . " " . $request->ap_mat;
            $empresa = Empresa::create([
                'foto'                  => $guardarFoto ?? null,
                "nombre"                => $request->nombre,
                "rfc"                   => $request->rfc,
                "responsable"           => $nombre_completo,
                "domicilio_fiscal"      => $request->domicilio_fiscal,
                "dominio"               => $request->dominio,
                "aviso_privacidad"      => $request->aviso_privacidad,
                "telefono"              => $request->telefono,
            ]);
            if (!$empresa) {
                abort(HttpStatusEnum::INTERNAL_SERVER_ERROR, "No se pudo crear la empresa");
            } else {
                $usuario = Usuarios::create([
                    'nombre'                => $request->responsable,
                    'ap_pat'                => $request->ap_pat,
                    'ap_mat'                => $request->ap_mat,
                    'email'                 => $request->email,
                    'password'              => bcrypt($request->password),
                    'id_perfiles'           => 1,
                    'id_empresas'           => $empresa->id,
                    'id_puestos'            => 5,
                ]);
                $contadorPerfilAdmin = Permisos::query()
                    ->get()
                    ->count();

                for ($i = 0; $i < $contadorPerfilAdmin; $i++) {
                    $perfilAdministrador = UsuarioHasPermisos::create([
                        'id_usuarios'   => $usuario->id,
                        'id_permisos'   => $i + 1
                    ]);
                }
                if (!$usuario) {
                    abort(HttpStatusEnum::INTERNAL_SERVER_ERROR, "No se pudo crear el usuario");
                } else {
                    // Aqui se envia el correo al usuario con la licencia de accesos y verificacion de correo
                    $Mail = Mail::to($usuario->email)->send(new Licenses($usuario));
                }
            }

            $this->dbCommit($transactionExists);
        } catch (\Throwable $th) {
            $this->dbRollback($th->getMessage(), $transactionExists);
            throw $th;
        }

        return $empresa;
    }

    /**
     * Muestra un recurso en especifico
     *
     * @param  array<\App\Http\Requests\Services\EmpresasService\Show>  $data
     * @param  bool  $validateData
     * @return \App\Models\Motor
     */
    public function show(array $data, bool $validateData = true)
    {
        $this->validate(RulesRequest\Show::class, $data, $validateData);
        $request = new RulesRequest\Show($data);
        $empresa = Empresa::query()
            ->where("id", "=", $request->id)
            ->first();

        if (!$empresa) {
            abort(HttpStatusEnum::NOT_FOUND, "La empresa recibida no existe");
        }

        return $empresa;
    }

    /**
     * Actualiza un recurso en especifico
     *
     * @param  array<\App\Http\Requests\Services\EmpresasService\Update>  $data
     * @param  bool  $validateData
     * @return \App\Models\Empresa
     */
    public function update(array $data, bool $transactionExists = false, bool $validateData = true)
    {
        $this->validate(RulesRequest\Update::class, $data, $validateData);
        $request = new RulesRequest\Update($data);

        $this->dbBeginTransaction($transactionExists);
        try {
            $empresa = Empresa::query()
                ->where("id", "=", $request->id)
                ->first();

            if (!$empresa) {
                abort(HttpStatusEnum::NOT_FOUND, "La empresa no existe");
            }

            if ($request->foto) {
                $foto = File::get($request->foto);
                $guardarFoto = ImagenesService::guardar('empresas', $foto, $request->foto->getClientOriginalName());

                //TODO Eliminar la foto anterior antes de actualizarla (Si es que existe)
                $empresa->update([
                    'foto' => $guardarFoto
                ]);
            }

            $usuarioConRfcIgual = Empresa::query()
                ->where('id', '!=', $empresa->id)
                ->where('rfc', '=', $request->rfc)
                ->first();

            if ($usuarioConRfcIgual) {
                abort(HttpStatusEnum::CONFLICT, "El RFC ya se encuentra registrado");
            }

            $empresa->update([
                "nombre"                => $request->nombre,
                "rfc"                   => $request->rfc,
                "reponsable"            => $request->reponsable,
                "domicilio_fiscal"      => $request->domicilio_fiscal,
                "dominio"               => $request->dominio,
                "aviso_privacidad"      => $request->aviso_privacidad,
                "telefono"              => $request->telefono,
            ]);

            $this->dbCommit($transactionExists);
        } catch (\Throwable $th) {
            $this->dbRollback($th->getMessage(), $transactionExists);
            throw $th;
        }

        return $empresa;
    }

    /**
     * Elimina un recurso en especifico
     *
     * @param  array<\App\Http\Requests\Services\EmpresasService\Destroy>  $data
     * @param  bool  $transactionExists
     * @param  bool  $validateData
     * @return \App\Models\Empresa
     */
    public function destroy(array $data, bool $transactionExists = false, bool $validateData = true)
    {
        $this->validate(RulesRequest\Destroy::class, $data, $validateData);
        $request = new RulesRequest\Destroy($data);

        $this->dbBeginTransaction($transactionExists);
        try {
            $empresa = Empresa::query()
                ->where("id", "=", $request->id)
                ->first();

            if (!$empresa) {
                abort(HttpStatusEnum::NOT_FOUND, "La empresa recibida no existe");
            }

            $empresa->delete();

            $this->dbCommit($transactionExists);
        } catch (\Throwable $th) {
            $this->dbRollback($th->getMessage(), $transactionExists);
            throw $th;
        }

        return $empresa;
    }
}

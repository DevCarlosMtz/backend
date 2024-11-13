<?php

namespace App\Services;

use App\Models\Permisos;
use App\Models\Usuarios;
use App\Enums\HttpStatusEnum;
use App\Helpers\ResponseHelper;
use App\Services\ImagenesService;
use App\Models\UsuarioHasPermisos;
use Illuminate\Support\Facades\DB;
use CreateUsuariosHasPermisosTable;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Services\UsuariosService as RulesRequest;
use App\Http\Requests\Services\AnalisisVibracionesService\Store;
use App\Mail\Auth\Licenses;
use App\Mail\Auth\LicensiasUsuario;
use App\Models\Centros_Cobupem;
use App\Models\Empresa;
use App\Models\Usuario;
use App\Models\verifiedEmail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class UsuariosService extends Service
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
     * @param  array<\App\Http\Requests\Services\UsuariosService\Index>  $data
     * @param  bool  $validateData
     * @return \App\Models\Usuarios
     */
    public function index(array $data, bool $validateData = true)
    {
        $this->validate(RulesRequest\Index::class, $data, $validateData);
        $request = new RulesRequest\Index($data);

        $usuario = Usuarios::query()
        ->with([
            'perfil:id,nombre',
            'puesto:id,puesto',
            'empresa:id,nombre'

        ])
        ->get();

    if (!$usuario) {
        abort(HttpStatusEnum::NOT_FOUND, "El usuario recibido no existe");
    }

    return $usuario;
    }

    /**
     * Guarda un nuevo recurso
     *
     * @param  array<\App\Http\Requests\Services\UsuariosService\Store>  $data
     * @param  bool  $transactionExists
     * @param  bool  $validateData
     * @return \App\Models\Usuarios
     */
    public function store(array $data, bool $transactionExists = false, bool $validateData = true)
    {
        $this->validate(RulesRequest\Store::class, $data, $validateData);
        $request = new RulesRequest\Store($data);

        $this->dbBeginTransaction($transactionExists);
        try {
            if ($request->foto) {
                $foto = File::get($request->foto);
                $guardarFoto = ImagenesService::guardar('usuarios', $foto, $request->foto->getClientOriginalName());
            }
            $empresa = Empresa::query()
                ->where("id", "=", $request->id)
                ->first();

            $password = Str::random(12);
            $usuario = Usuarios::create([
                'foto'                  => $guardarFoto ?? null,
                'nombre'                => $request->nombre,
                'ap_pat'                => $request->ap_pat,
                'ap_mat'                => $request->ap_mat,
                'email'                 => $request->email,
                'password'              => bcrypt($password),
                'sueldo'                => $request->sueldo,
                'id_perfiles'           => $request->id_perfiles,
                'id_empresas'           => $request->id_empresas,
                'id_puestos'            => $request->id_puestos
            ]);

            $permisos  = [];

            switch ($request->id_perfiles) {
                case '1':
                    $contadorPerfilAdmin = Permisos::query()
                        ->get()
                        ->count();

                    for ($i = 0; $i < $contadorPerfilAdmin; $i++) {
                        $perfilAdministrador = UsuarioHasPermisos::create([
                            'id_usuarios'   => $usuario->id,
                            'id_permisos'   => $i + 1
                        ]);
                    }
                    break;
                case '2':
                    $permisos = [3, 6, 7, 8, 9];
                    $contadorPermiso = count($permisos);
                    for ($i = 0; $i < $contadorPermiso; $i++) {
                        $perfilSupervisor = UsuarioHasPermisos::create([
                            'id_usuarios'   => $usuario->id,
                            'id_permisos'   => $permisos[$i]
                        ]);
                    }
                    break;
                case '3':
                    $permisos = [1];
                    $contadorPermiso = count($permisos);
                    for ($i = 0; $i < $contadorPermiso; $i++) {
                        $perfilVentas = UsuarioHasPermisos::create([
                            'id_usuarios'   => $usuario->id,
                            'id_permisos'   => $permisos[$i]
                        ]);
                    }
                    break;
                case '4':
                    $permisos = [7, 8];
                    $contadorPermiso = count($permisos);
                    for ($i = 0; $i < $contadorPermiso; $i++) {
                        $perfilOperativo = UsuarioHasPermisos::create([
                            'id_usuarios'   => $usuario->id,
                            'id_permisos'   => $permisos[$i]
                        ]);
                    }
                    break;
                default:
                    # code...
                    break;
            }

            if (!$usuario) {
                abort(HttpStatusEnum::INTERNAL_SERVER_ERROR, "No se pudo crear el usuario");
            } else {
                $Mail = Mail::to($usuario->email)->send(new LicensiasUsuario($usuario, $password));
            }
            $this->dbCommit($transactionExists);
        } catch (\Throwable $th) {
            $this->dbRollback($th->getMessage(), $transactionExists);
            throw $th;
        }

        return $usuario;
    }

    /**
     * Muestra un recurso en especifico
     *
     * @param  array<\App\Http\Requests\Services\UsuariosService\Show>  $data
     * @param  bool  $validateData
     * @return \App\Models\Usuarios
     */
    public function show(array $data, bool $validateData = true)
    {
        $this->validate(RulesRequest\Show::class, $data, $validateData);
        $request = new RulesRequest\Show($data);

        $usuario = Usuarios::query()
        ->whereNotRequired("id", "=", $request->id)
        ->with([
            'perfil:id,nombre',
            'puesto:id,puesto',
            'empresa:id,nombre'

        ])
        ->first();

    if (!$usuario) {
        abort(HttpStatusEnum::NOT_FOUND, "El usuario recibido no existe");
    }

    return $usuario;
    }

    /**
     * Actualiza un recurso en especifico
     *
     * @param  array<\App\Http\Requests\Services\UsuariosService\Update>  $data
     * @param  bool  $transactionExists
     * @param  bool  $validateData
     * @return \App\Models\Usuarios
     */
    public function update(array $data, bool $transactionExists = false, bool $validateData = true)
    {
        $this->validate(RulesRequest\Update::class, $data, $validateData);
        $request = new RulesRequest\Update($data);

        $this->dbBeginTransaction($transactionExists);
        try {
            //Consulta el usuario dependiendo al ID
            $usuario = Usuarios::query()
                ->where("id", "=", $request->id)
                ->first();

            if (!$usuario) {
                abort(HttpStatusEnum::NOT_FOUND, "El usuario recibido no existe");
            }

            $usuarioConCorreoIgual = Usuarios::query()
                ->where('id', '!=', $usuario->id)
                ->where('email', '=', $request->email)
                ->first();

            if ($usuarioConCorreoIgual) {
                abort(HttpStatusEnum::CONFLICT, "El correo ingresado ya se encuentra registrado");
            }

            if ($request->foto) {
                $foto = File::get($request->foto);
                $guardarFoto = ImagenesService::guardar('usuarios', $foto, $request->foto->getClientOriginalName());
                if ($usuario->foto) {
                    Storage::disk('usuarios')->delete($usuario->foto);
                }

                $usuario->update([
                    'foto' => $guardarFoto
                ]);
            }

            if ($request->password) {
                $usuario->update([
                    'password' => bcrypt($request->password)
                ]);
            }

            if ($request->id_perfiles) {
                $usuario = Usuarios::query()
                    ->select('id')
                    ->where("id", "=", $request->id)
                    ->first();

                $sql = 'DELETE FROM usuarios_has_permisos WHERE id_usuarios =' . $usuario->id;

                $result = DB::delete($sql);
            }

            $usuario->update([
                'nombre'                => $request->nombre,
                'ap_pat'                => $request->ap_pat,
                'ap_mat'                => $request->ap_mat,
                'email'                 => $request->email,
                'sueldo'                => $request->sueldo,
                'id_empresas'           => $request->id_empresas,
                'id_puestos'            => $request->id_puestos,
                'id_perfiles'           => $request->id_perfiles
            ]);

            $permisos  = [];

            switch ($request->id_perfiles) {
                case '1':
                    $contadorPerfilAdmin = Permisos::query()
                        ->get()
                        ->count();

                    for ($i = 0; $i < $contadorPerfilAdmin; $i++) {
                        $perfilAdministrador = UsuarioHasPermisos::create([
                            'id_usuarios'   => $usuario->id,
                            'id_permisos'   => $i + 1
                        ]);
                    }
                    break;
                case '2':
                    $permisos = [3, 6, 7, 9];
                    $contadorPermiso = count($permisos);
                    for ($i = 0; $i < $contadorPermiso; $i++) {
                        $perfilSupervisor = UsuarioHasPermisos::create([
                            'id_usuarios'   => $usuario->id,
                            'id_permisos'   => $permisos[$i]
                        ]);
                    }
                    break;
                case '3':
                    $permisos = [1];
                    $contadorPermiso = count($permisos);
                    for ($i = 0; $i < $contadorPermiso; $i++) {
                        $perfilVentas = UsuarioHasPermisos::create([
                            'id_usuarios'   => $usuario->id,
                            'id_permisos'   => $permisos[$i]
                        ]);
                    }
                    break;
                case '4':
                    $permisos = [6, 7];
                    $contadorPermiso = count($permisos);
                    for ($i = 0; $i < $contadorPermiso; $i++) {
                        $perfilOperativo = UsuarioHasPermisos::create([
                            'id_usuarios'   => $usuario->id,
                            'id_permisos'   => $permisos[$i]
                        ]);
                    }
                    break;
                default:
                    # code...
                    break;
            }
            $this->dbCommit($transactionExists);
        } catch (\Throwable $th) {
            $this->dbRollback($th->getMessage(), $transactionExists);
            throw $th;
        }

        return $usuario;
    }
    /**
     * Verificar cuenta de correo del usuario
     * @param \App\Http\Requests\Auth\Verificar $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function verificar(array $data, bool $transactionExists = false, bool $validateData = true)
    {
        $this->validate(RulesRequest\Verificar::class, $data, $validateData);
        $request = new RulesRequest\Verificar($data);

        $this->dbBeginTransaction($transactionExists);
        try {

            $verified = verifiedEmail::query()
                ->where('token', $request->token)
                ->first();

            if ($verified) {
                $usuario = Usuarios::query()
                    ->where('email', $verified->email)
                    ->first();
                $usuario->email_verified_at = Carbon::now();
                $usuario->save();
            } else {
                abort(HttpStatusEnum::NOT_FOUND, "El token no es válido");
            }

            $this->dbCommit($transactionExists);
        } catch (\Throwable $th) {
            $this->dbRollback($th->getMessage(), $transactionExists);
            throw $th;
        }

        return $usuario;
    }

    /**
     * Elimina un recurso en especifico
     *
     * @param  array<\App\Http\Requests\Services\UsuariosService\Destroy>  $data
     * @param  bool  $transactionExists
     * @param  bool  $validateData
     * @return \App\Models\Usuarios
     */
    public function destroy(array $data, bool $transactionExists = false, bool $validateData = true)
    {
        $this->validate(RulesRequest\Destroy::class, $data, $validateData);
        $request = new RulesRequest\Destroy($data);

        $this->dbBeginTransaction($transactionExists);
        try {
            $usuario = Usuarios::query()
                ->where("id", "=", $request->id)
                ->first();

            if (!$usuario) {
                abort(HttpStatusEnum::NOT_FOUND, "El usuario recibido no existe");
            }

            $sql = 'DELETE FROM usuarios_has_permisos WHERE id_usuarios =' . $usuario->id;

            $result = DB::delete($sql);

            $usuario->delete();



            $this->dbCommit($transactionExists);
        } catch (\Throwable $th) {
            $this->dbRollback($th->getMessage(), $transactionExists);
            throw $th;
        }

        return $usuario;
    }
}

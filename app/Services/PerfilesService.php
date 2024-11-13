<?php

namespace App\Services;

use App\Enums\HttpStatusEnum;
use App\Services\Service;
use App\Http\Requests\Services\PerfilesService as RulesRequest;
use App\Models\Perfiles;

class PerfilesService extends Service
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
     * @param  array<\App\Http\Requests\Services\PerfilesService\Index>  $data
     * @param  bool  $validateData
     * @return \App\Models\Perfiles
     */
    public function index(array $data, bool $validateData = true)
    {
        $this->validate(RulesRequest\Index::class, $data, $validateData);
        $request = new RulesRequest\Index($data);

        $perfil = Perfiles::query()
            ->whereNotRequired("nombre", "=", $request->input("nombre"))
            ->get();

        return $perfil;
    }

    /**
     * Guarda un nuevo recurso
     *
     * @param  array<\App\Http\Requests\Services\PerfilesService\Store>  $data
     * @param  bool  $transactionExists
     * @param  bool  $validateData
     * @return \App\Models\Perfiles
     */
    public function store(array $data, bool $transactionExists = false, bool $validateData = true)
    {
        $this->validate(RulesRequest\Store::class, $data, $validateData);
        $request = new RulesRequest\Store($data);

        $this->dbBeginTransaction($transactionExists);
        try {
            $perfil = Perfiles::create([
                "nombre"    => $request->nombre,
            ]);

            $this->dbCommit($transactionExists);
        } catch (\Throwable $th) {
            $this->dbRollback($th->getMessage(), $transactionExists);
            throw $th;
        }

        return $perfil;
    }

    /**
     * Muestra un recurso en especifico
     *
     * @param  array<\App\Http\Requests\Services\PerfilesService\Show>  $data
     * @param  bool  $validateData
     * @return \App\Models\Perfiles
     */
    public function show(array $data, bool $validateData = true)
    {
        $this->validate(RulesRequest\Show::class, $data, $validateData);
        $request = new RulesRequest\Show($data);

        $perfil = Perfiles::query()
            ->where("id", "=", $request->id)
            ->first();

        if (!$perfil) {
            abort(HttpStatusEnum::NOT_FOUND, "El motor {$request->id} no existe");
        }

        return $perfil;
    }

    /**
     * Actualiza un recurso en especifico
     *
     * @param  array<\App\Http\Requests\Services\PerfilesService\Update>  $data
     * @param  bool  $transactionExists
     * @param  bool  $validateData
     * @return \App\Models\Perfiles
     */
    public function update(array $data, bool $transactionExists = false, bool $validateData = true)
    {
        $this->validate(RulesRequest\Update::class, $data, $validateData);
        $request = new RulesRequest\Update($data);

        $this->dbBeginTransaction($transactionExists);
        try {

            $perfil = Perfiles::query()
                ->where("id", "=", $request->id)
                ->first();

            if (!$perfil) {
                abort(HttpStatusEnum::NOT_FOUND, "El perfil {$request->id} no existe");
            }

            $perfil->update([
                "nombre"    => $request->nombre
            ]);

            $this->dbCommit($transactionExists);
        } catch (\Throwable $th) {
            $this->dbRollback($th->getMessage(), $transactionExists);
            throw $th;
        }

        return $perfil;
    }

    /**
     * Elimina un recurso en especifico
     *
     * @param  array<\App\Http\Requests\Services\PerfilesService\Destroy>  $data
     * @param  bool  $transactionExists
     * @param  bool  $validateData
     * @return \App\Models\Perfiles
     */
    public function destroy(array $data, bool $transactionExists = false, bool $validateData = true)
    {
        $this->validate(RulesRequest\Destroy::class, $data, $validateData);
        $request = new RulesRequest\Destroy($data);

        $this->dbBeginTransaction($transactionExists);
        try {

            $perfil = Perfiles::query()
                ->where("id", "=", $request->id)
                ->first();

            if (!$perfil) {
                abort(HttpStatusEnum::NOT_FOUND, "El perfil {$request->id} no existe");
            }

            $perfil->delete();

            $this->dbCommit($transactionExists);
        } catch (\Throwable $th) {
            $this->dbRollback($th->getMessage(), $transactionExists);
            throw $th;
        }

        return $perfil;
    }
}

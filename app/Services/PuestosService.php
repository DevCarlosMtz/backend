<?php

namespace App\Services;

use App\Models\Puestos;
use App\Services\Service;
use App\Enums\HttpStatusEnum;
use App\Http\Requests\Services\PuestosService as RulesRequest;

class PuestosService extends Service
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
     * @param  array<\App\Http\Requests\Services\PuestosService\Index>  $data
     * @param  bool  $validateData
     * @return \App\Models\Puestos
     */
    public function index(array $data, bool $validateData = true)
    {
        $this->validate(RulesRequest\Index::class, $data, $validateData);
        $request = new RulesRequest\Index($data);

        

        $puestos = Puestos::query()
            ->whereNotRequired('puesto', 'LIKE', "%{$request->puesto}%")
            ->get();

        if ($puestos->isEmpty()) {
            abort(HttpStatusEnum::NOT_FOUND, "No se encontraron puestos");
        }

        return $puestos;
    }

    /**
     * Guarda un nuevo recurso
     *
     * @param  array<\App\Http\Requests\Services\PuestosService\Store>  $data
     * @param  bool  $transactionExists
     * @param  bool  $validateData
     * @return \App\Models\Puestos
     */
    public function store(array $data, bool $transactionExists = false, bool $validateData = true)
    {
        $this->validate(RulesRequest\Store::class, $data, $validateData);
        $request = new RulesRequest\Store($data);

        $this->dbBeginTransaction($transactionExists);
        try {
            $puesto = Puestos::create([
                'puesto'    => $request->puesto
            ]);

            $this->dbCommit($transactionExists);
        } catch (\Throwable $th) {
            $this->dbRollback($th->getMessage(), $transactionExists);
            throw $th;
        }

        return $puesto;
    }

    /**
     * Muestra un recurso en especifico
     *
     * @param  array<\App\Http\Requests\Services\PuestosService\Show>  $data
     * @param  bool  $validateData
     * @return \App\Models\Puestos
     */
    public function show(array $data, bool $validateData = true)
    {
        $this->validate(RulesRequest\Show::class, $data, $validateData);
        $request = new RulesRequest\Show($data);

        $puesto = Puestos::query()
            ->where('id', '=', $request->id)
            ->first();

        if (!$puesto) {
            abort(HttpStatusEnum::NOT_FOUND, "El puesto recibido no existe");
        }

        return $puesto;
    }

    /**
     * Actualiza un recurso en especifico
     *
     * @param  array<\App\Http\Requests\Services\PuestosService\Update>  $data
     * @param  bool  $transactionExists
     * @param  bool  $validateData
     * @return \App\Models\Puestos
     */
    public function update(array $data, bool $transactionExists = false, bool $validateData = true)
    {
        $this->validate(RulesRequest\Update::class, $data, $validateData);
        $request = new RulesRequest\Update($data);

        $this->dbBeginTransaction($transactionExists);
        try {
            $puesto = Puestos::query()
                ->where('id', '=', $request->id)
                ->first();

            if (!$puesto) {
                abort(HttpStatusEnum::NOT_FOUND, "El puesto recibido no existe");
            }

            $puesto->update([
                'puesto'        => $request->puesto
            ]);

            $this->dbCommit($transactionExists);
        } catch (\Throwable $th) {
            $this->dbRollback($th->getMessage(), $transactionExists);
            throw $th;
        }

        return $puesto;
    }

    /**
     * Elimina un recurso en especifico
     *
     * @param  array<\App\Http\Requests\Services\PuestosService\Destroy>  $data
     * @param  bool  $transactionExists
     * @param  bool  $validateData
     * @return \App\Models\Puestos
     */
    public function destroy(array $data, bool $transactionExists = false, bool $validateData = true)
    {
        $this->validate(RulesRequest\Destroy::class, $data, $validateData);
        $request = new RulesRequest\Destroy($data);

        $this->dbBeginTransaction($transactionExists);
        try {
            $puesto = Puestos::query()
                ->where('id', '=', $request->id)
                ->first();

            if (!$puesto) {
                abort(HttpStatusEnum::NOT_FOUND, "El puesto recibido no existe");
            }

            $puesto->delete();

            $this->dbCommit($transactionExists);
        } catch (\Throwable $th) {
            $this->dbRollback($th->getMessage(), $transactionExists);
            throw $th;
        }

        return $puesto;
    }
}

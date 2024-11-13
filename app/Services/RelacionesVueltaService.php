<?php

namespace App\Services;

use App\Http\Requests\Services\RelacionesVueltaService as RulesRequest;
use App\Enums\HttpStatusEnum;
use App\Models\RelacionVuelta;
use App\Models\TransformadorTrifasico;

class RelacionesVueltaService extends Service
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
     * @param  array<\App\Http\Requests\Services\RelacionesVueltaService\Index>  $data
     * @param  bool  $validateData
     * @return <type> $example
     */
    public function index(array $data, bool $validateData = true)
    {
        $this->validate(RulesRequest\Index::class, $data, $validateData);
        $request = new RulesRequest\Index($data);


        $transformadorTrifasico = TransformadorTrifasico::query()
            ->where('id', $request->idTransformadorTrifasico)
            ->with([
                'relacionVuelta'
            ])
            ->first();

        if (!$transformadorTrifasico) {
            abort(HttpStatusEnum::NOT_FOUND, 'El transformador trifásico no existe');
        }

        return $transformadorTrifasico->relacionVuelta;
    }

    /**
     * Guarda un nuevo recurso
     *
     * @param  array<\App\Http\Requests\Services\RelacionesVueltaService\Store>  $data
     * @param  bool  $transactionExists
     * @param  bool  $validateData
     * @return <type> $example
     */
    public function store(array $data, bool $transactionExists = false, bool $validateData = true)
    {
        $this->validate(RulesRequest\Store::class, $data, $validateData);
        $request = new RulesRequest\Store($data);

        $this->dbBeginTransaction($transactionExists);
        try {
            $relacionVuelta = RelacionVuelta::create([
                'fase'       => $request->fase,
                'rojo'       => $request->rojo,
                'negro'      => $request->negro,
                'tap_1'      => $request->tap_1,
                'tap_2'      => $request->tap_2,
                'tap_3'      => $request->tap_3,
                'tap_4'      => $request->tap_4,
                'tap_5'      => $request->tap_5,
            ]);

            $relacionVuelta->transformadoresTrifasicos()->attach($request->idTransformadorTrifasico);

            $this->dbCommit($transactionExists);
        } catch (\Throwable $th) {
            $this->dbRollback($th->getMessage(), $transactionExists);
            throw $th;
        }

        return $relacionVuelta;
    }

    /**
     * Muestra un recurso en especifico
     *
     * @param  array<\App\Http\Requests\Services\RelacionesVueltaService\Show>  $data
     * @param  bool  $validateData
     * @return <type> $example
     */
    public function show(array $data, bool $validateData = true)
    {
        $this->validate(RulesRequest\Show::class, $data, $validateData);
        $request = new RulesRequest\Show($data);

        $relacionVuelta = RelacionVuelta::query()
            ->where('id', $request->idRelacionVuelta)
            ->with([
                'transformadoresTrifasicos'
            ])
            ->first();

        if (!$relacionVuelta) {
            abort(HttpStatusEnum::NOT_FOUND, 'Relacion vuelta no encontrada');
        }

        return $relacionVuelta;
    }

    /**
     * Actualiza un recurso en especifico
     *
     * @param  array<\App\Http\Requests\Services\RelacionesVueltaService\Update>  $data
     * @param  bool  $transactionExists
     * @param  bool  $validateData
     * @return <type> $example
     */
    public function update(array $data, bool $transactionExists = false, bool $validateData = true)
    {
        $this->validate(RulesRequest\Update::class, $data, $validateData);
        $request = new RulesRequest\Update($data);

        $this->dbBeginTransaction($transactionExists);
        try {
            $relacionVuelta = RelacionVuelta::query()
                ->where('id', $request->idRelacionVuelta)
                ->first();

            if (!$relacionVuelta) {
                abort(HttpStatusEnum::NOT_FOUND, 'Relacion Vuelta no encontrada');
            }
            $relacionVuelta->update([
                'fase'       => $request->fase,
                'rojo'       => $request->rojo,
                'negro'      => $request->negro,
                'tap_1'      => $request->tap_1,
                'tap_2'      => $request->tap_2,
                'tap_3'      => $request->tap_3,
                'tap_4'      => $request->tap_4,
                'tap_5'      => $request->tap_5,
            ]);


            $this->dbCommit($transactionExists);
        } catch (\Throwable $th) {
            $this->dbRollback($th->getMessage(), $transactionExists);
            throw $th;
        }


        return $relacionVuelta;
    }

    /**
     * Elimina un recurso en especifico
     *
     * @param  array<\App\Http\Requests\Services\RelacionesVueltaService\Destroy>  $data
     * @param  bool  $transactionExists
     * @param  bool  $validateData
     * @return <type> $example
     */
    public function destroy(array $data, bool $transactionExists = false, bool $validateData = true)
    {
        $this->validate(RulesRequest\Destroy::class, $data, $validateData);
        $request = new RulesRequest\Destroy($data);

        $this->dbBeginTransaction($transactionExists);
        try {
            # code

            $this->dbCommit($transactionExists);
        } catch (\Throwable $th) {
            $this->dbRollback($th->getMessage(), $transactionExists);
            throw $th;
        }

        return null;
    }
}

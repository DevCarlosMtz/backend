<?php

namespace App\Services;

use App\Enums\HttpStatusEnum;
use App\Enums\TiposImagenesEnum;
use App\Helpers\ImagenesHelper;
use App\Services\Service;
use App\Http\Requests\Services\GaleriaService as RulesRequest;
use App\Models\Imagen;
use App\Models\OrdenTrabajo;
use Illuminate\Support\Facades\Storage;

class GaleriaService extends Service
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
     * @param  array<\App\Http\Requests\Services\GaleriaService\Index>  $data
     * @param  bool  $validateData
     * @return <type> $example
     */
    public function index(array $data, bool $validateData = true)
    {
        $this->validate(RulesRequest\Index::class, $data, $validateData);
        $request = new RulesRequest\Index($data);

        # code

        return null;
    }

    /**
     * Guarda un nuevo recurso
     *
     * @param  array<\App\Http\Requests\Services\GaleriaService\Store>  $data
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
             //dd($request);
            if (!empty($request->fotos)) {
                $fotos = ImagenesHelper::guardadoMasivo($request->disk, $request->fotos);
            }

            $ordenTrabajo = OrdenTrabajo::query()
                ->where('ot', $request->ot)
                ->first();

            $insertGaleria = collect();
            foreach ($fotos as $foto) {
                $insertGaleria->push([
                    'imagen'           => $foto->nombre,
                    'id_orden_trabajo' => $ordenTrabajo->id,
                    'id_tipo_imagen'   => TiposImagenesEnum::getConstantValueByName($request->tipo_imagen),
                ]);
            }

            $galeria = Imagen::insert($insertGaleria->toArray());

            $this->dbCommit($transactionExists);
        } catch (\Throwable $th) {
            $this->dbRollback($th->getMessage(), $transactionExists);
            throw $th;
        }

        return  $galeria;
    }

    /**
     * Muestra un recurso en especifico
     *
     * @param  array<\App\Http\Requests\Services\GaleriaService\Show>  $data
     * @param  bool  $validateData
     * @return <type> $example
     */
    public function show(array $data, bool $validateData = true)
    {
        $this->validate(RulesRequest\Show::class, $data, $validateData);
        $request = new RulesRequest\Show($data);

        # code

        return null;
    }

    /**
     * Actualiza un recurso en especifico
     *
     * @param  array<\App\Http\Requests\Services\GaleriaService\Update>  $data
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
            # code

            $this->dbCommit($transactionExists);
        } catch (\Throwable $th) {
            $this->dbRollback($th->getMessage(), $transactionExists);
            throw $th;
        }

        return null;
    }

    /**
     * Elimina un recurso en especifico
     *
     * @param  array<\App\Http\Requests\Services\GaleriaService\Destroy>  $data
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
            $imagen = Imagen::query()
                ->where('id', '=', $request->id)
                ->first();

            if (!$imagen) {
                abort(HttpStatusEnum::NOT_FOUND, "La imagen  con id " . $request->id . " no existe");
            }
            Storage::disk('conexion_externa')->delete($imagen->imagen);
            $imagen->delete();

            $this->dbCommit($transactionExists);
        } catch (\Throwable $th) {
            $this->dbRollback($th->getMessage(), $transactionExists);
            throw $th;
        }

        return null;
    }

    /**
     * Muestra las imagenes relacionadas a una orden de trabajo
     *
     * @param  array<\App\Http\Requests\Services\GaleriaService\Destroy>  $data
     * @param  bool  $transactionExists
     * @param  bool  $validateData
     * @return <type> $example
     */
    public function showGalery(array $data, bool $validateData = true)
    {
        $this->validate(RulesRequest\showGalery::class, $data, $validateData);
        $request = new RulesRequest\showGalery($data);

        $galeria = ImagenesHelper::mostrarGaleria($request->ot, $request->tipo_imagen);


        if (!$galeria) {
            abort(HttpStatusEnum::NOT_FOUND, "No existe galeria de fotos de la orden " . $request->ot);
        }

        return $galeria;
    }

    /**
     * Muestra las imagenes relacionadas a un pedido
     *
     * @param  array<\App\Http\Requests\Services\GaleriaService\Destroy>  $data
     * @param  bool  $transactionExists
     * @param  bool  $validateData
     * @return \App\Models\Imagen
     */
    public function showGaleryPedidos(array $data, bool $validateData = true)
    {
        $this->validate(RulesRequest\showGaleryPedidos::class, $data, $validateData);
        $request = new RulesRequest\showGaleryPedidos($data);

        $galeria = ImagenesHelper::mostrarGaleria($request->ot, $request->tipo_imagen);


        if (!$galeria) {
            abort(HttpStatusEnum::NOT_FOUND, "No existe galeria de fotos de la orden " . $request->ot);
        }

        return $galeria;
    }
}

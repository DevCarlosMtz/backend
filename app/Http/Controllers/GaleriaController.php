<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Services\GaleriaService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Services\GaleriaService as RulesRequest;

class GaleriaController extends Controller
{
    /**
     * My Service
     *
     * @var \App\Services\GaleriaService
     */
    protected $service;

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        $this->service = new GaleriaService();
    }

    /**
     * Retorna una lista de los recursos
     *
     * @param  \App\Http\Requests\Services\GaleriaService\Index  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(RulesRequest\Index $request)
    {
        $index = $this->service->index($request->validated(), false);
        return ResponseHelper::json($index);
    }

    /**
     * Guarda un nuevo recurso
     *
     * @param  \App\Http\Requests\Services\GaleriaService\Store  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(RulesRequest\Store $request)
    {
        $store = $this->service->store($request->validated(), false, false);
        return ResponseHelper::json($store, "Se guardó correctamente");
    }

    /**
     * Muestra un recurso en especifico
     *
     * @param  \App\Http\Requests\Services\GaleriaService\Show  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(RulesRequest\Show $request)
    {
        $show = $this->service->show($request->validated(), false);
        return ResponseHelper::json($show);
    }

    /**
     * Actualiza un recurso en especifico
     *
     * @param  \App\Http\Requests\Services\GaleriaService\Update  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(RulesRequest\Update $request)
    {
        $update = $this->service->update($request->validated(), false, false);
        return ResponseHelper::json($update, "Se actualizó correctamente");
    }

    /**
     * Elimina un recurso en especifico
     *
     * @param  \App\Http\Requests\Services\GaleriaService\Destroy  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(RulesRequest\Destroy $request)
    {
        $destroy = $this->service->destroy($request->validated(), false, false);
        return ResponseHelper::json($destroy, "Se eliminó correctamente");
    }
    /**
     * Muestra las imagenes relacionadas a una orden de trabajo
     *
     * @param  \App\Http\Requests\Services\GaleriaService\ShowGalery  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function showGalery(RulesRequest\ShowGalery $request)
    {
        $galery = $this->service->showGalery($request->validated(), false);
        return ResponseHelper::json($galery);
    }
}

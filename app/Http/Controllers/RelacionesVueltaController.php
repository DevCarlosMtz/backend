<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Services\RelacionesVueltaService;
use App\Http\Requests\Services\RelacionesVueltaService as RulesRequest;

class RelacionesVueltaController extends Controller
{
    /**
     * My Service
     *
     * @var \App\Services\RelacionesVueltaService
     */
    protected $service;

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        $this->service = new RelacionesVueltaService();
    }

    /**
     * Retorna una lista de los recursos
     *
     * @param  \App\Http\Requests\Services\RelacionesVueltaService\Index  $request
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
     * @param  \App\Http\Requests\Services\RelacionesVueltaService\Store  $request
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
     * @param  \App\Http\Requests\Services\RelacionesVueltaService\Show  $request
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
     * @param  \App\Http\Requests\Services\RelacionesVueltaService\Update  $request
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
     * @param  \App\Http\Requests\Services\RelacionesVueltaService\Destroy  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(RulesRequest\Destroy $request)
    {
        $destroy = $this->service->destroy($request->validated(), false, false);
        return ResponseHelper::json($destroy, "Se eliminó correctamente");
    }
}

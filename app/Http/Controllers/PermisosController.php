<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Services\PermisosService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Services\PermisosService as RulesRequest;

class PermisosController extends Controller
{
    /**
     * My Service
     *
     * @var \App\Services\PermisosService
     */
    protected $service;

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        $this->service = new PermisosService();
    }

    /**
     * Retorna una lista de los recursos
     *
     * @param  \App\Http\Requests\Services\PermisosService\Index  $request
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
     * @param  \App\Http\Requests\Services\PermisosService\Store  $request
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
     * @param  \App\Http\Requests\Services\PermisosService\Show  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(RulesRequest\Show $request)
    {
        $show = $this->service->show($request->validated(), false);
        return ResponseHelper::json($show);
    }
    /**
     * Muestra un recurso en especifico dependiendo del id del usuario
     *
     * @param  \App\Http\Requests\Services\PermisosService\ShowHasUsuario  $request
     * param  int  $idUsuario
     * @return \Illuminate\Http\JsonResponse
     */
    public function showHasUsuario(RulesRequest\ShowHasUsuario $request)
    {
        $showPerfil = $this->service->showHasUsuario($request->validated(), false);
        return ResponseHelper::json($showPerfil);
    }
    /**
     * Actualiza un recurso en especifico
     *
     * @param  \App\Http\Requests\Services\PermisosService\Update  $request
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
     * @param  \App\Http\Requests\Services\PermisosService\Destroy  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(RulesRequest\Destroy $request)
    {
        $destroy = $this->service->destroy($request->validated(), false, false);
        return ResponseHelper::json($destroy, "Se eliminó correctamente");
    }
}

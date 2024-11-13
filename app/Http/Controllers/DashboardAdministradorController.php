<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Services\DashboardAdministradorService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Services\DashboardAdministradorService as RulesRequest;

class DashboardAdministradorController extends Controller
{
    /**
     * My Service
     *
     * @var \App\Services\DashboardAdministradorService
     */
    protected $service;

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        $this->service = new DashboardAdministradorService();
    }

    /**
     * Retorna una lista de los recursos
     *
     * @param  \App\Http\Requests\Services\DashboardAdministradorService\Index  $request
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
     * @param  \App\Http\Requests\Services\DashboardAdministradorService\Store  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(RulesRequest\Store $request)
    {
        $store = $this->service->store($request->validated(), false, false);
        return ResponseHelper::json($store, "Se guardó correctamente");
    }
    /**
     * Muestra las ordenes de trabajo por estatus
     * @param  \App\Http\Requests\Services\DashboardAdministradorService\ShowOrdenesEstatus  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function showOrdenesEstatus(RulesRequest\ShowOrdenesEstatus $request)
    {
        $show = $this->service->showOrdenesEstatus($request->validated(), false);
        return ResponseHelper::json($show);
    }
    /**
     * Muestra un recurso en especifico
     *
     * @param  \App\Http\Requests\Services\DashboardAdministradorService\Show  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(RulesRequest\Show $request)
    {
        $show = $this->service->show($request->validated(), false);
        return ResponseHelper::json($show);
    }

    /**
     * Muestra un recurso en especifico
     *
     * @param  \App\Http\Requests\Services\DashboardAdministradorService\Show  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function showDetalleOtProceso(RulesRequest\Show $request)
    {
        $show = $this->service->showDetalleOtProceso($request->validated(), false);
        return ResponseHelper::json($show);
    }

    /**
     * Muestra un recurso en especifico
     *
     * @param  \App\Http\Requests\Services\DashboardAdministradorService\Show  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function showOtRevision(RulesRequest\Show $request)
    {
        $show = $this->service->showOtRevision($request->validated(), false);
        return ResponseHelper::json($show);
    }

    /**
     * Muestra un recurso en especifico
     *
     * @param  \App\Http\Requests\Services\DashboardAdministradorService\Show  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function showDetalleOtRevision(RulesRequest\Show $request)
    {
        $show = $this->service->showDetalleOtRevision($request->validated(), false);
        return ResponseHelper::json($show);
    }

    /**
     * Muestra un recurso en especifico
     *
     * @param  \App\Http\Requests\Services\DashboardAdministradorService\Show  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function showOtFinalizadas(RulesRequest\Show $request)
    {
        $show = $this->service->showOtFinalizadas($request->validated(), false);
        return ResponseHelper::json($show);
    }

    /**
     * Muestra un recurso en especifico
     *
     * @param  \App\Http\Requests\Services\DashboardAdministradorService\Show  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function showOtDetalleFinalizadas(RulesRequest\Show $request)
    {
        $show = $this->service->showOtDetalleFinalizadas($request->validated(), false);
        return ResponseHelper::json($show);
    }

    /**
     * Muestra un recurso en especifico
     *
     * @param  \App\Http\Requests\Services\DashboardAdministradorService\Show  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function showOtPendientes(RulesRequest\Show $request)
    {
        $show = $this->service->showOtPendientes($request->validated(), false);
        return ResponseHelper::json($show);
    }

    /**
     * Muestra un recurso en especifico
     *
     * @param  \App\Http\Requests\Services\DashboardAdministradorService\Show  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function showOtDetallePendientes(RulesRequest\Show $request)
    {
        $show = $this->service->showOtDetallePendientes($request->validated(), false);
        return ResponseHelper::json($show);
    }

    /**
     * Muestra un recurso en especifico
     *
     * @param  \App\Http\Requests\Services\DashboardAdministradorService\Show  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function showOtPorcentajeCumplimiento(RulesRequest\Show $request)
    {
        $show = $this->service->showOtPorcentajeCumplimiento($request->validated(), false);
        return ResponseHelper::json($show);
    }

    /**
     * Actualiza un recurso en especifico
     *
     * @param  \App\Http\Requests\Services\DashboardAdministradorService\Update  $request
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
     * @param  \App\Http\Requests\Services\DashboardAdministradorService\Destroy  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(RulesRequest\Destroy $request)
    {
        $destroy = $this->service->destroy($request->validated(), false, false);
        return ResponseHelper::json($destroy, "Se eliminó correctamente");
    }
}

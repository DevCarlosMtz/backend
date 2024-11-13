<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Services\EmpresasService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Services\EmpresasService as RulesRequest;

class EmpresasController extends Controller
{
    /**
     * My Service
     *
     * @var \App\Services\EmpresasService
     */
    protected $service;

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        $this->service = new EmpresasService();
    }

    /**
     * Retorna una lista de los recursos
     *
     * @param  \App\Http\Requests\Services\EmpresasService\Index  $request
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
     * @param  \App\Http\Requests\Services\EmpresasService\Store  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(RulesRequest\Store $request)
    {
        $store = $this->service->store($request->validated(), false, false);
        return ResponseHelper::json($store, "Su empresa se registró correctamente, en breve recibirá un correo electronico con la información de su cuenta.");
    }

    /**
     * Muestra un recurso en especifico
     *
     * @param  \App\Http\Requests\Services\EmpresasService\Show  $request
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
     * @param  \App\Http\Requests\Services\EmpresasService\Update  $request
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
     * @param  \App\Http\Requests\Services\EmpresasService\Destroy  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(RulesRequest\Destroy $request)
    {
        $destroy = $this->service->destroy($request->validated(), false, false);
        return ResponseHelper::json($destroy, "Se eliminó correctamente");
    }
}

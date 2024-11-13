<?php

/**
 * ---------------------------------------------------------------------------
 * Rutas Api "Empresas"
 * ---------------------------------------------------------------------------
 *
 * @api {{host}}/api/empresas
 */

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresasController;

Route::get('/', [EmpresasController::class, 'index']);
Route::get('/show', [EmpresasController::class, 'show']);
Route::post('/', [EmpresasController::class, 'store']);
Route::put('/', [EmpresasController::class, 'update']);
Route::delete('/', [EmpresasController::class, 'destroy']);

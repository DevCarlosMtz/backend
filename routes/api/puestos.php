<?php

/**
 * ---------------------------------------------------------------------------
 * Rutas Api "Puestos"
 * ---------------------------------------------------------------------------
 *
 * @api {{host}}/api/puestos
 */

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PuestosController;

Route::get('/', [PuestosController::class, 'index']);
Route::get('/show', [PuestosController::class, 'show']);
Route::post('/', [PuestosController::class, 'store']);
Route::put('/', [PuestosController::class, 'update']);
Route::delete('/', [PuestosController::class, 'destroy']);

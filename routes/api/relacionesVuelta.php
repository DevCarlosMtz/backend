<?php

/**
 * ---------------------------------------------------------------------------
 * Rutas Api "Relaciones Vuelta"
 * ---------------------------------------------------------------------------
 *
 * @api {{host}}/api/relaciones-vuelta
 */

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RelacionesVueltaController;

Route::get('/', [RelacionesVueltaController::class, 'index']);
Route::get('/show', [RelacionesVueltaController::class, 'show']);
Route::post('/', [RelacionesVueltaController::class, 'store']);
Route::put('/', [RelacionesVueltaController::class, 'update']);
Route::delete('/', [RelacionesVueltaController::class, 'destroy']);

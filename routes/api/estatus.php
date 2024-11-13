<?php

/**
 * ---------------------------------------------------------------------------
 * Rutas Api "Estatus"
 * ---------------------------------------------------------------------------
 *
 * @api {{host}}/api/estatus
 */

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstatusController;

Route::get('/', [EstatusController::class, 'index']);
Route::get('/show', [EstatusController::class, 'show']);
Route::post('/', [EstatusController::class, 'store']);
Route::put('/', [EstatusController::class, 'update']);
Route::delete('/', [EstatusController::class, 'destroy']);

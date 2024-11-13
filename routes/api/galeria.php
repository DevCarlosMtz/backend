<?php

/**
 * ---------------------------------------------------------------------------
 * Rutas Api "Galeria"
 * ---------------------------------------------------------------------------
 *
 * @api {{host}}/api/galeria
 */

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GaleriaController;

Route::get('/', [GaleriaController::class, 'index']);
Route::get('/show', [GaleriaController::class, 'show']);
Route::post('/', [GaleriaController::class, 'store']);
Route::put('/', [GaleriaController::class, 'update']);
Route::delete('/', [GaleriaController::class, 'destroy']);
Route::get('/galery', [GaleriaController::class, 'showGalery']);

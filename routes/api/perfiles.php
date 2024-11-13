<?php

/**
 * ---------------------------------------------------------------------------
 * Rutas Api "Perfiles"
 * ---------------------------------------------------------------------------
 *
 * @api {{host}}/api/perfiles
 */

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerfilesController;

Route::get('/', [PerfilesController::class, 'index']);
Route::get('/show', [PerfilesController::class, 'show']);
Route::post('/', [PerfilesController::class, 'store']);
Route::put('/', [PerfilesController::class, 'update']);
Route::delete('/', [PerfilesController::class, 'destroy']);

<?php

/**
 * ---------------------------------------------------------------------------
 * Rutas Api "Permisos"
 * ---------------------------------------------------------------------------
 *
 * @api {{host}}/api/permisos
 */

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermisosController;

Route::get('/', [PermisosController::class, 'index']);
Route::get('/show', [PermisosController::class, 'show']);
Route::get('/showHasUsuario', [PermisosController::class, 'showHasUsuario']);
Route::post('/', [PermisosController::class, 'store']);
Route::put('/', [PermisosController::class, 'update']);
Route::delete('/', [PermisosController::class, 'destroy']);

<?php

/**
 * ---------------------------------------------------------------------------
 * Rutas Api "Usuario"
 * ---------------------------------------------------------------------------
 *
 * @api {{host}}/api/usuario
 */

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

Route::get('/', [UsuarioController::class, 'index']);
Route::get('/show', [UsuarioController::class, 'show']);
Route::post('/', [UsuarioController::class, 'store']);
Route::put('/', [UsuarioController::class, 'update']);
Route::delete('/', [UsuarioController::class, 'destroy']);

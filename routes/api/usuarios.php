<?php

/**
 * ---------------------------------------------------------------------------
 * Rutas Api "Usuarios"
 * ---------------------------------------------------------------------------
 *
 * @api {{host}}/api/usuarios
 */

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;

Route::get('/', [UsuariosController::class, 'index']);
Route::get('/show', [UsuariosController::class, 'show']);
Route::post('/', [UsuariosController::class, 'store']);
Route::put('/', [UsuariosController::class, 'update']);
Route::put('/verificar', [UsuariosController::class, 'verificar']);
Route::delete('/', [UsuariosController::class, 'destroy']);

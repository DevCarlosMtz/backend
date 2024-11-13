<?php

/**
 * ---------------------------------------------------------------------------
 * Rutas Api "Dashboard Administrador"
 * ---------------------------------------------------------------------------
 *
 * @api {{host}}/api/dashboard-administrador
 */

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardAdministradorController;

Route::get('/', [DashboardAdministradorController::class, 'index']);
Route::get('/show', [DashboardAdministradorController::class, 'show']);
Route::post('/', [DashboardAdministradorController::class, 'store']);
Route::put('/', [DashboardAdministradorController::class, 'update']);
Route::delete('/', [DashboardAdministradorController::class, 'destroy']);

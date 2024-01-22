<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\UserController;

//Rutas no autenticadas
Route::get('/', [DashboardController::class, 'index']);


Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    //Rutas autenticadas
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('/solicitudes', SolicitudController::class);
    Route::resource('/users', UserController::class);

});

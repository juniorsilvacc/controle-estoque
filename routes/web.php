<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Home
Route::get('/home', [HomeController::class, 'index'])->name('home.index');

// Clientes
Route::get('/lista-clientes', [ClienteController::class, 'index'])->name('clientes.lista-clientes');

Route::post('/cadastrar-clientes', [ClienteController::class, 'createAction'])->name('clientes.createAction');
Route::get('/cadastrar-clientes', [ClienteController::class, 'create'])->name('clientes.cadastrar-clientes');

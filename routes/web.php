<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/home', [HomeController::class, 'index'])->name('home.index');

Route::get('/lista-clientes', [ClienteController::class, 'listar'])->name('clientes.lista-clientes');
Route::get('/cadastrar-clientes', [ClienteController::class, 'cadastrar'])->name('clientes.cadastrar-clientes');

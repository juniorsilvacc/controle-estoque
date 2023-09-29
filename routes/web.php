<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Home
Route::get('/home', [HomeController::class, 'index'])->name('home.index');

// Clientes
Route::get('/lista-clientes', [ClienteController::class, 'index'])->name('clientes.lista-clientes');

Route::get('/clientes/{id}/atualizar', [ClienteController::class, 'edit'])->name('clientes.edit');
Route::put('/clientes/{id}', [ClienteController::class, 'editAction'])->name('clientes.editAction');

Route::get('/cadastrar-clientes', [ClienteController::class, 'create'])->name('clientes.cadastrar-clientes');
Route::post('/cadastrar-clientes', [ClienteController::class, 'createAction'])->name('clientes.createAction');

Route::get('clientes/{id}/delete', [ClienteController::class, 'deleteAction'])->name('clientes.deleteAction');

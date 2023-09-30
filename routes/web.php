<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Home
Route::get('/', [HomeController::class, 'index'])->name('home.index');

// Clientes
Route::get('/lista-clientes', [ClienteController::class, 'index'])->name('clientes.lista-clientes');

Route::put('/clientes/{id}', [ClienteController::class, 'editAction'])->name('clientes.editAction');
Route::get('/clientes/{id}/atualizar', [ClienteController::class, 'edit'])->name('clientes.edit');

Route::post('/cadastrar-clientes', [ClienteController::class, 'createAction'])->name('clientes.createAction');
Route::get('/cadastrar-clientes', [ClienteController::class, 'create'])->name('clientes.cadastrar-clientes');

Route::get('clientes/{id}/delete', [ClienteController::class, 'deleteAction'])->name('clientes.deleteAction');

// Categorias
Route::get('/lista-categorias', [CategoriaController::class, 'index'])->name('categorias.lista-categorias');

Route::put('/categorias/{id}', [CategoriaController::class, 'editAction'])->name('categorias.editAction');
Route::get('/categorias/{id}/atualizar', [CategoriaController::class, 'edit'])->name('categorias.edit');

Route::post('/cadastrar-categorias', [CategoriaController::class, 'createAction'])->name('categorias.createAction');
Route::get('/cadastrar-categorias', [CategoriaController::class, 'create'])->name('categorias.cadastrar-categorias');

Route::get('categorias/{id}/delete', [CategoriaController::class, 'deleteAction'])->name('categorias.deleteAction');

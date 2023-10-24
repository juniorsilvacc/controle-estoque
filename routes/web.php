<?php

use App\Http\Controllers\User\CategoriaController;
use App\Http\Controllers\User\ClienteController;
use App\Http\Controllers\User\EntradaController;
use App\Http\Controllers\User\FornecedorController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\PerfilController;
use App\Http\Controllers\User\ProdutoController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    // Entrada de Produtos
    Route::post('/cadastrar/entrada', [EntradaController::class, 'entryAction'])->name('entrada.entryAction');
    Route::get('/entrada/produtos', [EntradaController::class, 'entry'])->name('entrada.entrada-produtos');

    // Perfil
    Route::post('/perfil/upload', [PerfilController::class, 'uploadAction'])->name('perfil.uploadAction');

    Route::put('/perfil/{id}', [PerfilController::class, 'editAction'])->name('perfil.editAction');
    Route::get('/perfil/{id}/atualizar', [PerfilController::class, 'edit'])->name('perfil.edit-usuario-perfil');

    Route::get('/perfil/{id}/detalhes', [PerfilController::class, 'details'])->name('perfil.detalhes-usuario-perfil');

    // Home
    Route::get('/', [HomeController::class, 'index'])->name('home.index');

    // Clientes
    Route::get('/lista-clientes', [ClienteController::class, 'index'])->name('clientes.lista-clientes');

    Route::put('/clientes/{id}', [ClienteController::class, 'editAction'])->name('clientes.editAction');
    Route::get('/clientes/{id}/atualizar', [ClienteController::class, 'edit'])->name('clientes.edit');

    Route::post('/cadastrar-clientes', [ClienteController::class, 'createAction'])->name('clientes.createAction');
    Route::get('/cadastrar-clientes', [ClienteController::class, 'create'])->name('clientes.cadastrar-clientes');

    Route::get('/clientes/{id}/delete', [ClienteController::class, 'deleteAction'])->name('clientes.deleteAction');

    Route::get('/detalhes-clientes/{id}', [ClienteController::class, 'details'])->name('clientes.detalhes-clientes');

    // Categorias
    Route::get('/lista-categorias', [CategoriaController::class, 'index'])->name('categorias.lista-categorias');

    Route::put('/categorias/{id}', [CategoriaController::class, 'editAction'])->name('categorias.editAction');
    Route::get('/categorias/{id}/atualizar', [CategoriaController::class, 'edit'])->name('categorias.edit');

    Route::post('/cadastrar-categorias', [CategoriaController::class, 'createAction'])->name('categorias.createAction');
    Route::get('/cadastrar-categorias', [CategoriaController::class, 'create'])->name('categorias.cadastrar-categorias');

    Route::get('/categorias/{id}/delete', [CategoriaController::class, 'deleteAction'])->name('categorias.deleteAction');

    Route::get('/detalhes-categorias/{id}', [CategoriaController::class, 'details'])->name('categorias.detalhes-categorias');

    // Produtos
    Route::post('/produtos/{id}/upload-imagem', [ProdutoController::class, 'uploadAction'])->name('produtos.uploadAction');
    Route::get('/produtos/{id}/imagem', [ProdutoController::class, 'image'])->name('produtos.image');

    Route::get('/lista-produtos', [ProdutoController::class, 'index'])->name('produtos.lista-produtos');

    Route::put('/produtos/{id}', [ProdutoController::class, 'editAction'])->name('produtos.editAction');
    Route::get('/produtos/{id}/atualizar', [ProdutoController::class, 'edit'])->name('produtos.edit');

    Route::post('/cadastrar-produtos', [ProdutoController::class, 'createAction'])->name('produtos.createAction');
    Route::get('/cadastrar-produtos', [ProdutoController::class, 'create'])->name('produtos.cadastrar-produtos');

    Route::get('/produtos/{id}/delete', [ProdutoController::class, 'deleteAction'])->name('produtos.deleteAction');

    Route::get('/detalhes-produtos/{id}', [ProdutoController::class, 'details'])->name('produtos.detalhes-produtos');

    // Fornecedores
    Route::get('/lista-fornecedores', [FornecedorController::class, 'index'])->name('fornecedores.lista-fornecedores');

    Route::put('/fornecedores/{id}', [FornecedorController::class, 'editAction'])->name('fornecedores.editAction');
    Route::get('/fornecedores/{id}/atualizar', [FornecedorController::class, 'edit'])->name('fornecedores.edit');

    Route::post('/cadastrar-fornecedores', [FornecedorController::class, 'createAction'])->name('fornecedores.createAction');
    Route::get('/cadastrar-fornecedores', [FornecedorController::class, 'create'])->name('fornecedores.cadastrar-fornecedores');

    Route::get('/fornecedores/{id}/delete', [FornecedorController::class, 'deleteAction'])->name('fornecedores.deleteAction');

    Route::get('/detalhes-fornecedores/{id}', [FornecedorController::class, 'details'])->name('fornecedores.detalhes-fornecedores');
});

require __DIR__.'/auth.php';

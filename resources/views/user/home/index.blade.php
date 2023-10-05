@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="container-fluid px-4">
        <div>
            <div class="title-home">
                <i class="fa-solid fa-chart-line"></i>
                <h1>Início</h1>
            </div>
            <p class="title-text">Visão Geral do Controle de Estoque</p>
        </div>

        <div class="row g-3 my-2">
            <div class="col-md-6 mx-auto">
                <div class="card shadow">
                    <div class="card-body bg-one">
                        <p class="card-text">4 Clientes Cadastrado</p>
                        <p class="card-text">10 Fornecedores Cadastrado</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mx-auto">
                <div class="card shadow">
                    <div class="card-body bg-two">
                        <p class="card-text">4 Produtos Cadastrado</p>
                        <p class="card-text">10 Categorias Cadastrado</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mx-auto">
                <div class="card shadow">
                    <div class="card-body bg-tree">
                         <p class="card-text">2 Produtos com Estoque Zerado</p>
                         <p class="card-text">3 Produtos com Estoque Mínimo</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mx-auto">
                <div class="card shadow">
                    <div class="card-body bg-four">
                        <p class="card-text">Investimentos: R$ 500,00</p>
                        <p class="card-text">Retorno Previsto: R$ 800,00</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

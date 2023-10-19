@extends('layouts.app')

@section('title', 'Detalhes Produto')

@section('content')
    <div class="container details">
        <div class="row bg-details">
            <div class="col-md-7 product-details">

                <div class="col title-details">
                    <h1>Detalhes Produto</h1>
                </div>

                <div class="informations">
                    <h6><strong>Nome:</strong> {{ $produto->nome }} </h6>
                    <h6><strong>Código Referência:</strong> {{ $produto->cod_referencia }} </h6>
                    <h6><strong>Descrição:</strong>
                        @empty($produto->descricao)
                            Não há descrição
                        @else
                            {{ $produto->descricao }}
                        @endempty
                    </h6>
                    <h6><strong>Unidade de Médida:</strong> {{ $produto->unidade_medida }} </h6>
                    <h6><strong>Preço Unitário:</strong> R$ {{ $produto->preco_unitario }} </h6>
                    <h6><strong>Estoque:</strong> {{ $produto->estoque }}</h6>
                    <h6><strong>Data Fabricação:</strong> {{ $produto->data_fabricacao }} </h6>
                    <h6><strong>Data Validade:</strong> {{ $produto->data_validade }} </h6>
                    <h6><strong>Fornecedor:</strong> {{ $produto->fornecedor['nome'] }} </h6>
                    <h6><strong>Categoria:</strong> {{ $produto->categoria['nome'] }} </h6>
                </div>

                <form class="form-delete" action="{{ route('produtos.deleteAction', $produto->id) }}" method="POST">

                    @method('delete')
                    @csrf

                    @include('user.produtos.partials.delete-modal')

                </form>
            </div>

            <div class="col-md-5 user-photo text-center">
                <div class="col title-details">
                    <h1>Foto</h1>
                </div>
                <img src="{{ $produto->image ? asset("storage/{$produto->image}") : asset('img/sem-foto.jpg') }}"
                    alt="{{ $produto->nome }}" class="foto-details-product">
            </div>
        </div>
    </div>
@endsection

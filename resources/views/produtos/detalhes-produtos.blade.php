@extends('layouts.app')

@section('title', 'Detalhes Produto')

@section('content')
    <div class="container-fluid px-4">
        <div class="row bg-form">
            <div class="col bg-title-form">
                <h1>Detalhes Produto</h1>
            </div>
            <form class="row g-3 my-2" action="{{ route('produtos.deleteAction', $produto->id) }}" method="POST">

                <ul>
                    <li>{{$produto->nome}}</li>
                    <li>{{$produto->preco}}</li>
                    <li>{{$produto->preco_venda}}</li>
                    <li>{{$produto->estoque_inicial}}</li>
                    <li>{{$produto->estoque_minimo}}</li>
                    <li>{{$produto->data_produto}}</li>
                </ul>

                @method('delete')
                @csrf
                @include('produtos.partials.delete-modal')

            </form>
        </div>
    </div>
@endsection

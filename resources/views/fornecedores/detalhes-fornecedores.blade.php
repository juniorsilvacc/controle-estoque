@extends('layouts.app')

@section('title', 'Detalhes Fornecedor')

@section('content')
    <div class="container-fluid px-4">
        <div class="row bg-form">
            <div class="col bg-title-form">
                <h1>Detalhes Fornecedor</h1>
            </div>
            <form class="row g-3 my-2" action="{{ route('fornecedores.deleteAction', $fornecedor->id) }}" method="POST">

                <ul>
                    <li>{{$fornecedor->nome}}</li>
                    <li>{{$fornecedor->empresa}}</li>
                    <li>{{$fornecedor->email}}</li>
                    <li>{{$fornecedor->cnpj}}</li>
                </ul>

                @method('delete')
                @csrf
                @include('fornecedores.partials.delete-modal')

            </form>
        </div>
    </div>
@endsection

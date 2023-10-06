@extends('layouts.app')

@section('title', 'Detalhes Fornecedor')

@section('content')
    <div class="container-fluid px-4 details">
        <div class="row bg-details">
            <div class="col title-details">
                <h1>Detalhes Fornecedor</h1>
            </div>
            <div class="informations">
                <h6><strong>Nome:</strong> {{ $fornecedor->nome }} </h6>
                <h6><strong>Empresa:</strong> {{ $fornecedor->empresa }} </h6>
                <h6><strong>E-mail:</strong> {{ $fornecedor->email }} </h6>
                <h6><strong>Telefone:</strong> {{ $fornecedor->telefone }} </h6>
                <h6><strong>Endereço:</strong> {{ $fornecedor->endereço }} </h6>
                <h6><strong>CNPJ:</strong> {{ $fornecedor->cnpj }} </h6>
                <h6><strong>Tipo Fornecedor:</strong> {{ $fornecedor->tipo }} </h6>
                <h6><strong>Observações:</strong> {{ $fornecedor->observacoes }} </h6>
            </div>

            <form class="form-delete" action="{{ route('fornecedores.deleteAction', $fornecedor->id) }}" method="POST">

                @method('delete')
                @csrf

                @include('user.fornecedores.partials.delete-modal')

            </form>
        </div>
    </div>
@endsection

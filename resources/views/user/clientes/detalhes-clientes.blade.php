@extends('layouts.app')

@section('title', 'Detalhes Fornecedor')

@section('content')
    <div class="container-fluid px-4 details">
        <div class="row bg-details">
            <div class="col title-details">
                <h1>Detalhes Clientes</h1>
            </div>
            <div class="informations">
                <h6><strong>Nome:</strong> {{ $cliente->nome }} </h6>
                <h6><strong>E-mail:</strong> {{ $cliente->email }} </h6>
            </div>

            <form class="form-delete" action="{{ route('clientes.deleteAction', $cliente->id) }}" method="POST">

                @method('DELETE')
                @csrf

                @include('user.clientes.partials.delete-modal')

            </form>
        </div>
    </div>
@endsection

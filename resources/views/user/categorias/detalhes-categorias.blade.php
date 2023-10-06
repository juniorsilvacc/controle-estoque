@extends('layouts.app')

@section('title', 'Detalhes Fornecedor')

@section('content')
    <div class="container-fluid px-4 details">
        <div class="row bg-details">
            <div class="col title-details">
                <h1>Detalhes Categoria</h1>
            </div>
            <div class="informations">
                <h6><strong>Nome:</strong> {{ $categoria->nome }} </h6>
            </div>

            <form class="form-delete" action="{{ route('categorias.deleteAction', $categoria->id) }}" method="POST">

                @method('delete')
                @csrf

                @include('user.categorias.partials.delete-modal')

            </form>
        </div>
    </div>
@endsection

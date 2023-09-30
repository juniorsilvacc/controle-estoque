@extends('layouts.app')

@section('title', 'Atualizar Categoria')

@section('content')
    <div class="container-fluid px-4">
        <div class="row bg-form">
            <div class="col bg-title-form">
                <h1>Atualizar Categoria</h1>
            </div>
            <form class="row g-3 my-2" action="{{ route('categorias.editAction', $categoria->id) }}" method="POST">

                @method('PUT')
                @include('categorias.partials.forms')

                <div>
                    <button type="submit" class="btn btn-success col-md-3">Atualizar</button>
                </div>
            </form>
        </div>
    </div>
@endsection

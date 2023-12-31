@extends('layouts.app')

@section('title', 'Cadastrar Categoria')

@section('content')
    <div class="container-fluid px-4">
        <div class="row bg-form">
            <div class="col bg-title-form">
                <h1>Cadastrar Categoria</h1>
            </div>
            <form class="row g-3 my-2" action="{{ route('categorias.createAction') }}" method="POST">

                @include('user.categorias.partials.forms')

                <div>
                    <button type="submit" class="btn btn-success col-md-3">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
@endsection

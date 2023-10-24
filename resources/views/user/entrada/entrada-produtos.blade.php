@extends('layouts.app')

@section('title', 'Entrada de Produto')

@section('content')
    <div class="container-fluid px-4">
        <div class="row bg-form">
            <div class="col bg-title-form">
                <h1>Entrada de Produto</h1>
            </div>
            <form class="row g-3 my-2" action="{{ route('entrada.entryAction') }}" method="POST">

                @include('components.includes.message')

                @include('user.entrada.partials.forms')

                <div>
                    <button type="submit" class="btn btn-success col-md-3">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
@endsection

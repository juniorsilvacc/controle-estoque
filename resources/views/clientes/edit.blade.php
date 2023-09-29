@extends('layouts.app')

@section('title', 'Atualizar Cliente')

@section('content')
    <div class="container-fluid px-4">
        <div class="row bg-form">
            <div class="col bg-title-form">
                <h1>Atualizar Cliente</h1>
            </div>
            <form class="row g-3 my-2" action="{{ route('clientes.editAction', $cliente->id) }}" method="POST">

                @method('PUT')
                @include('clientes.partials.forms')

                <div>
                    <button type="submit" class="btn btn-success col-md-3">Atualizar</button>
                </div>
            </form>
        </div>
    </div>
@endsection

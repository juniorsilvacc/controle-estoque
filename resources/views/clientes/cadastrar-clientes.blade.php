@extends('layouts.app')

@section('title', 'Cadastrar Cliente')

@section('content')
    <div class="container-fluid px-4">
        <div class="row bg-form">
            <div class="col bg-title-form">
                <h1>Cadastrar Cliente</h1>
            </div>
            <form class="row g-3 my-2">
                <div class="col-md-6 form-group">
                    <label for="cliente">Nome</label>
                    <input type="cliente" class="form-control" id="cliente">
                </div>
                <div class="col-md-6 form-group ">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" id="email">
                </div>
                <div>
                    <button type="submit" class="btn btn-success col-md-3">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
@endsection

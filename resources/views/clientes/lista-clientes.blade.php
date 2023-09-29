@extends('layouts.app')

@section('title', 'Listar Clientes')

@section('content')
    <div class="container-fluid px-4">
        <div class="row g-3 my-2 bg-title-list">
            <div class="col">
                <h1>Clientes</h1>
            </div>

            <div class="col d-flex m-auto justify-content-end bg-button-pag">
                <a href=" {{ route('clientes.cadastrar-clientes') }} " class="btn btn-success me-2" type="button"><i
                        class="fas fa-plus-circle me-2"></i>Cadastrar</a>
            </div>
        </div>
    </div>

    <div class="container-fluid px-4">
        <div class="row g-3 my-2">

            @include('includes.message')

            <table class="table table-striped table-hover w-100">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($clientes as $cliente)
                        <tr>
                            <th scope="row">{{ $cliente->id }}</th>
                            <td>{{ $cliente->nome }}</td>
                            <td>{{ $cliente->email }}</td>
                            <td>
                                <a href=" {{ route('clientes.edit', $cliente->id) }} " class="btn btn-warning col-md-3">Editar</a>
                                <a href=" {{ route('clientes.edit', $cliente->id) }} " class="btn btn-danger col-md-3">Excluir</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="{{ $clientes->previousPageUrl() }}" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="{{ $clientes->url(1) }}">1</a></li>
                    <li class="page-item"><a class="page-link" href="{{ $clientes->url(2) }}">2</a></li>
                    <li class="page-item"><a class="page-link" href="{{ $clientes->url(3) }}">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="{{ $clientes->nextPageUrl() }}" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
@endsection

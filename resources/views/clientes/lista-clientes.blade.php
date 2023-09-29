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

                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#cliente_editar"><i class="fa-solid fa-pen-to-square"></i></button>
                                <!-- Modal -->
                                <div class="modal fade" id="cliente_editar" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Editar Cliente</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">

                                                <form class="row g-3 my-2">
                                                    <div class="col-md-6 form-group">
                                                        <label for="cliente">Nome</label>
                                                        <input type="cliente" class="form-control" id="cliente">
                                                    </div>
                                                    <div class="col-md-6 form-group ">
                                                        <label for="email">E-mail</label>
                                                        <input type="email" class="form-control" id="email">
                                                    </div>
                                                </form>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal">Fechar</button>
                                                <button type="submit" class="btn btn-warning">Atualizar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-danger" type="button"><i class="fa-solid fa-trash"></i></button>
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

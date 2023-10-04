@extends('layouts.app')

@section('title', 'Listar Fornecedores')

@section('content')
    <div class="container-fluid px-4">
        <div class="row g-3 my-2 bg-title-list">
            <div class="col">
                <h1>Fornecedores</h1>
            </div>

            <div class="col d-flex m-auto justify-content-end bg-button-pag">
                <a href=" {{ route('fornecedores.cadastrar-fornecedores') }} " class="btn btn-success me-2" type="button"><i
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
                        <th scope="col">Empresa</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">CNPJ</th>

                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($fornecedores as $fornecedor)
                        <tr>
                            <th scope="row">{{ $fornecedor->id }}</th>
                            <td>{{ $fornecedor->nome }}</td>
                            <td>{{ $fornecedor->empresa }}</td>
                            <td>{{ $fornecedor->email }}</td>
                            <td>{{ $fornecedor->cnpj }}</td>
                            <td>
                                <a href=" {{ route('fornecedores.edit', $fornecedor->id) }} " class="btn btn-warning"><i
                                        class="fa-solid fa-pen-to-square"></i></a>

                                <a href=" {{ route('fornecedores.detalhes-fornecedores', $fornecedor->id) }} " class="btn btn-info"><i
                                        class="fa-solid fa-circle-info"></i></a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="1000">
                                Nenhum fornecedor Cadastrada
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>

            @if ($fornecedores->count() >= 1)
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="{{ $fornecedores->previousPageUrl() }}" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="{{ $fornecedores->url(1) }}">1</a></li>
                        <li class="page-item"><a class="page-link" href="{{ $fornecedores->url(2) }}">2</a></li>
                        <li class="page-item"><a class="page-link" href="{{ $fornecedores->url(3) }}">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="{{ $fornecedores->nextPageUrl() }}" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            @endif

        </div>
    </div>
@endsection

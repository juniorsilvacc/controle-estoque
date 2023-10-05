@extends('layouts.app')

@section('title', 'Listar Categorias')

@section('content')
    <div class="container-fluid px-4">
        <div class="row g-3 my-2 bg-title-list">
            <div class="col">
                <h1>Categorias</h1>
            </div>

            <div class="col d-flex m-auto justify-content-end bg-button-pag">
                <a href=" {{ route('categorias.cadastrar-categorias') }} " class="btn btn-success me-2" type="button"><i
                        class="fas fa-plus-circle me-2"></i>Cadastrar</a>
            </div>
        </div>
    </div>

    <div class="container-fluid px-4">
        <div class="row">
            <div class="col-12">

                @include('components.includes.message')

                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($categorias as $categoria)
                            <tr>
                                <th scope="row">{{ $categoria->id }}</th>
                                <td>{{ $categoria->nome }}</td>
                                <td>
                                    <a href=" {{ route('categorias.edit', $categoria->id) }} "
                                        class="btn btn-warning col-md-2">Editar</a>

                                    @include('user.categorias.partials.delete-modal')

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="1000">
                                    Nenhum Categoria Cadastrada
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>

                @if ($categorias->count() >= 1)
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="{{ $categorias->previousPageUrl() }}" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="{{ $categorias->url(1) }}">1</a></li>
                            <li class="page-item"><a class="page-link" href="{{ $categorias->url(2) }}">2</a></li>
                            <li class="page-item"><a class="page-link" href="{{ $categorias->url(3) }}">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="{{ $categorias->nextPageUrl() }}" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                @endif
            </div>
        </div>
    </div>
@endsection

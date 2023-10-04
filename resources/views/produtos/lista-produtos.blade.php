@extends('layouts.app')

@section('title', 'Listar produtos')

@section('content')
    <div class="container-fluid px-4">
        <div class="row g-3 my-2 bg-title-list">
            <div class="col">
                <h1>Produtos</h1>
            </div>

            <div class="col d-flex m-auto justify-content-end bg-button-pag">
                <a href=" {{ route('produtos.cadastrar-produtos') }} " class="btn btn-success me-2" type="button"><i
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
                        <th scope="col">Preço</th>
                        <th scope="col">Preço da Venda</th>
                        <th scope="col">Estoque Inicial</th>
                        <th scope="col">Estoque Mínimo</th>

                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($produtos as $produto)
                        <tr>
                            <th scope="row">{{ $produto->id }}</th>
                            <td>{{ $produto->nome }}</td>
                            <td>{{ $produto->preco }}</td>
                            <td>{{ $produto->preco_venda }}</td>
                            <td>{{ $produto->estoque_inicial }}</td>
                            <td>{{ $produto->estoque_minimo }}</td>
                            <td>
                                <a href=" {{ route('produtos.edit', $produto->id) }} " class="btn btn-warning"><i
                                        class="fa-solid fa-pen-to-square"></i></a>

                                <a href=" {{ route('produtos.detalhes-produtos', $produto->id) }} " class="btn btn-info"><i
                                        class="fa-solid fa-circle-info"></i></a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="1000">
                                Nenhum Produto Cadastrada
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>

            @if ($produtos->count() >= 1)
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="{{ $produtos->previousPageUrl() }}" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="{{ $produtos->url(1) }}">1</a></li>
                        <li class="page-item"><a class="page-link" href="{{ $produtos->url(2) }}">2</a></li>
                        <li class="page-item"><a class="page-link" href="{{ $produtos->url(3) }}">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="{{ $produtos->nextPageUrl() }}" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            @endif

        </div>
    </div>
@endsection

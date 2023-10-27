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

    <form action="{{ route("produtos.search") }}" method="POST">
        @csrf

        <div class="search-container">
            <i class="fas fa-search"></i>
            <input type="text" id="search-input" placeholder="Pesquisar" name="search">
            <button type="submit">Pesquisar</button>
        </div>
    </form>

    <div class="container-fluid px-4">
        <div class="row g-3 my-2">

            @include('components.includes.message')

            <table class="table table-striped table-hover w-100 text-center">
                <thead>
                    <tr>
                        <th scope="col">Imagem</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Cód. Referência</th>
                        <th scope="col">Unid. Médida</th>
                        <th scope="col">Preço Uni.</th>
                        <th scope="col">Estoque</th>

                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($produtos as $produto)
                        <tr>
                            <td>
                                <img src="{{ $produto->image ? asset("storage/{$produto->image}") : asset('img/sem-foto.jpg') }}"
                                    alt="{{ $produto->nome }}" class="foto-product">
                            </td>
                            <td>{{ $produto->nome }}</td>
                            <td>{{ $produto->cod_referencia }}</td>
                            <td>{{ $produto->unidade_medida }}</td>
                            <td>
                                @if ($produto->preco_unitario)
                                    @php
                                        $precoStr = str_replace(',', '.', $produto->preco_unitario);
                                        $precoStr = preg_replace('/[^\d.]/', '', $precoStr);
                                        $preco_unitario = floatval($precoStr);
                                    @endphp

                                    R$ {{ number_format($preco_unitario, 2, ',', '.') }}
                                @endif
                            </td>
                            <td>{{ $produto->estoque }}</td>
                            <td>
                                <a href=" {{ route('produtos.edit', $produto->id) }} " class="btn btn-warning"><i
                                        class="fa-solid fa-pen-to-square"></i></a>
                                <a href=" {{ route('produtos.image', $produto->id) }} " class="btn btn-secondary"><i
                                        class="fa-solid fa-image"></i></a>
                                <a href=" {{ route('produtos.detalhes-produtos', $produto->id) }} " class="btn btn-info"><i
                                        class="fa-solid fa-circle-info"></i></a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="1000">
                                Nenhum produto cadastrado
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

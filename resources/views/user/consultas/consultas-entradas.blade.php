@extends('layouts.app')

@section('title', 'Consultas Entrada')

@section('content')
    <div class="container-fluid px-4">
        <div class="row g-3 my-2 bg-title-list">
            <div class="col">
                <h1>Consultas de Entrada</h1>
            </div>

            <div class="col d-flex m-auto justify-content-end bg-button-pag">
                <button type="button" class="btn btn-danger me-2" data-toggle="modal" data-target="#filtroModal"><i
                        class="fas fa-filter me-2"></i>Filtrar</a>
                </button>
            </div>

            {{-- Modal --}}
            <div class="modal fade" id="filtroModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Filtrar por Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Campos de input para o filtro de data -->
                            <div class="form-group">
                                <label for="dataInicial">Data Inicial:</label>
                                <input type="date" class="form-control" id="dataInicial">
                            </div>
                            <div class="form-group">
                                <label for="dataFinal">Data Final:</label>
                                <input type="date" class="form-control" id="dataFinal">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button type="button" class="btn btn-primary">Aplicar Filtro</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid px-4">
        <div class="row g-3 my-2">
            <table class="table table-striped table-hover w-100 text-center">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Data Entrada</th>
                        <th scope="col">Produto</th>
                        <th scope="col">Quant.</th>
                        <th scope="col">Valor</th>
                        <th scope="col">SubTotal</th>
                        <th scope="col">Motivo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($registros as $registro)
                        <tr>
                            <td scope="row">{{ $registro->id }}</td>
                            <td>{{ $registro->data_entrada }}</td>
                            <td>
                                @if ($registro->produto)
                                    {{ $registro->produto->nome }}
                                @endif
                            </td>
                            <td>{{ $registro->quantidade }}</td>
                            <td>
                                @if ($registro->produto)
                                    R${{ $registro->produto->preco_venda }}
                                @endif
                            </td>
                            <td>
                                @if ($registro->produto)
                                    @php
                                        $precoStr = str_replace(',', '.', $registro->produto->preco_venda); // Substitui vírgula por ponto, se necessário
                                        $precoStr = preg_replace('/[^\d.]/', '', $precoStr); // Remove todos os caracteres exceto dígitos e ponto decimal
                                        $precoDeVenda = floatval($precoStr); // Converte para número (float)
                                        $quantidade = $registro->quantidade; // Supondo que a quantidade está definida
                                        $total = $precoDeVenda * $quantidade; // Multiplica o preço pelo quantidade
                                    @endphp
                                    R$ {{ $total }}
                                @endif
                            </td>
                            <td>
                                @if ($registro->observacoes)
                                    {{ $registro->observacoes }}
                                @else
                                    N/DA
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


        </div>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

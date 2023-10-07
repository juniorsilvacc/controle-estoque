@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="container-fluid px-4">
        <div>
            <div class="title-home">
                <i class="fa-solid fa-chart-line"></i>
                <h1>Início</h1>
            </div>
            <p class="title-text">Visão Geral do Controle de Estoque</p>
        </div>

        <div class="row g-3 my-2">
            <div class="col-md-6 mx-auto">
                <div class="card shadow">
                    <div class="card-body bg-one">
                        <p class="card-text">
                            {{ $totalClientes == 1 ? '1 Cliente cadastrado' : ($totalClientes >= 1 ? "{$totalClientes} Clientes cadastrados" : 'Não há nenhum cliente cadastrado') }}
                        </p>
                        <p class="card-text">
                            {{ $totalFornecedores == 1 ? '1 Fornecedor cadastrado' : ($totalFornecedores >= 1 ? "{$totalFornecedores} Fornecedores cadastrados" : 'Não há nenhum fornecedor cadastrado') }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mx-auto">
                <div class="card shadow">
                    <div class="card-body bg-two">
                        <p class="card-text">
                            {{ $totalProdutos == 1 ? '1 Produto cadastrado' : ($totalProdutos >= 1 ? "{$totalProdutos} Produtos cadastrados" : 'Não há nenhum produto cadastrado') }}
                        </p>

                        <p class="card-text">
                            {{ $totalCategorias == 1 ? '1 Categoria cadastrada' : ($totalCategorias >= 1 ? "{$totalCategorias} Categorias cadastradas" : 'Não há nenhuma categoria cadastrada') }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mx-auto">
                <div class="card shadow">
                    <div class="card-body bg-tree">
                        <p class="card-text">
                            @if($produtosEstoqueMinimo->count() <= 5)
                                {{$produtosEstoqueMinimo->count()}} Produtos com estoque mínimo
                            @else
                                Não há nenhum produto com estoque mínimo
                            @endif
                        </p>
                        <p class="card-text">
                            {{ $produtosEstoqueZero == 0 ? 'Não há nenhum produto com estoque zerado' : "{$produtosEstoqueZero} Produtos com estoque zerado"}}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mx-auto">
                <div class="card shadow">
                    <div class="card-body bg-four">
                        <p class="card-text">Investimentos: R$ 500,00</p>
                        <p class="card-text">Retorno Previsto: R$ 800,00</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="mt-0 header-title mb-3">Gráficos</h4>
                        <hr>
                        <div class="inbox-wid">
                            <div class="inbox-item">
                                <canvas id="estoqueChart" width="400" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="mt-0 header-title mb-3">Gráficos</h4>
                        <hr>
                        <div class="inbox-wid">
                            <div class="inbox-item">
                                <canvas id="pieChart" width="400" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('script')

<script>
    var quantidades = @json($quantidades);

    var ctx = document.getElementById('estoqueChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [...Array(quantidades.length).keys()],
            datasets: [{
                label: 'Quantidade em Estoque',
                data: quantidades,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    var estoqueChart = document.getElementById('estoqueChart');
    estoqueChart.style.maxHeight = '300px';
</script>

<script>
    var ctx = document.getElementById('pieChart').getContext('2d');
    var data = @json($data);

    var pieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: Object.keys(data), // Nomes das categorias
            datasets: [{
                data: Object.values(data), // Contagem de produtos por categoria
                backgroundColor: [
                    'rgba(255, 99, 132, 0.7)', // Cor da categoria 1
                    'rgba(54, 162, 235, 0.7)', // Cor da categoria 2
                    'rgba(255, 206, 86, 0.7)', // Cor da categoria 3
                    // Adicione mais cores conforme necessário
                ],
            }],
        },
    });

    // Defina a altura máxima do gráfico
    var pieCanvas = document.getElementById('pieChart');
    pieCanvas.style.maxHeight = '300px';
</script>


@endsection



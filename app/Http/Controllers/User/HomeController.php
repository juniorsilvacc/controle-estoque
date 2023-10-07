<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Produto;
use App\Repositories\EstatisticaRepositoryInterface;

class HomeController extends Controller
{
    public function __construct(
        protected EstatisticaRepositoryInterface $repository
    ) {
    }

    public function index()
    {
        $totalClientes = $this->repository->getTotalClientes();
        $totalCategorias = $this->repository->getTotalCategorias();
        $totalProdutos = $this->repository->getTotalProdutos();
        $totalFornecedores = $this->repository->getTotalFornecedores();

        $produtosEstoqueMinimo = Produto::where('estoque', '<=', 5)->get();
        $produtosEstoqueZero = Produto::where('estoque', '=', 0)->count();

        // Gráfico da quantidade de estoque
        $produtos = Produto::all();
        $quantidades = $produtos->pluck('estoque');

        // Gráfico de distribuição de produtos por categoria
        $categorias = Categoria::all();
        $data = [];

        foreach ($categorias as $categoria) {
            $data[$categoria->nome] = $categoria->produtos->count();
        }

        return view('user.home.index', compact(
            'totalClientes',
            'totalCategorias',
            'totalProdutos',
            'totalFornecedores',
            'quantidades',
            'data',
            'produtosEstoqueMinimo',
            'produtosEstoqueZero'
        ));
    }
}

<?php

namespace App\Repositories\Eloquent;

use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Fornecedor;
use App\Models\Produto;
use App\Repositories\EstatisticaRepositoryInterface;

class EstatisticaRepository implements EstatisticaRepositoryInterface
{
    public function getTotalClientes()
    {
        return Cliente::count();
    }

    public function getTotalCategorias()
    {
        return Categoria::count();
    }

    public function getTotalProdutos()
    {
        return Produto::count();
    }

    public function getTotalFornecedores()
    {
        return Fornecedor::count();
    }
}

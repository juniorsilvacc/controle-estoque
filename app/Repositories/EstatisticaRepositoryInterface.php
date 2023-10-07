<?php

namespace App\Repositories;

interface EstatisticaRepositoryInterface
{
    public function getTotalClientes();

    public function getTotalCategorias();

    public function getTotalProdutos();

    public function getTotalFornecedores();
}

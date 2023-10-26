<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Entrada;
use App\Services\ProdutoService;
use App\Services\SaidaService;
use Illuminate\Http\Request;

class ConsultasController extends Controller
{
    private $produtoService;
    private $saidaService;

    public function __construct(
        ProdutoService $produtoService,
        SaidaService $saidaService,
    ) {
        $this->produtoService = $produtoService;
        $this->produtoService = $produtoService;
    }

    public function entrysQueries(Request $request)
    {
        $registros = Entrada::with('produto')->get();

        return view('user.consultas.consultas-entradas', compact('registros'));
    }

    public function exitQueries()
    {
    }
}

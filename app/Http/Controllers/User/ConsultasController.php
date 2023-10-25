<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\EntradaService;
use App\Services\SaidaService;

class ConsultasController extends Controller
{
    private $entradaService;
    private $saidaService;

    public function __construct(
        EntradaService $entradaService,
        SaidaService $saidaService,
    ) {
        $this->service = $entradaService;
        $this->service = $saidaService;
    }

    public function entrysQueries()
    {
        return view('user.consultas.consultas-entradas');
    }

    public function exitQueries()
    {
    }
}

<?php

namespace App\Http\Controllers;

use App\Services\ClienteService;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    private $service;

    public function __construct(
        ClienteService $service
    ) {
        $this->service = $service;
    }

    public function listar(Request $request)
    {
        $clientes = $this->service->getAll(
            filter: $request->get('filter', '')
        );

        return view('clientes.lista-clientes', compact('clientes'));
    }

    public function cadastrar()
    {
        return view('clientes.cadastrar-clientes');
    }
}

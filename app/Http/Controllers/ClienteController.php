<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCliente;
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

    public function index(Request $request)
    {
        $clientes = $this->service->getAll();

        return view('clientes.lista-clientes', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.cadastrar-clientes');
    }

    public function createAction(StoreCliente $request)
    {
        $this->service->create($request->validated());

        return redirect()
            ->route('clientes.lista-clientes')
            ->with('message', 'Cliente criado com sucesso');
    }
}

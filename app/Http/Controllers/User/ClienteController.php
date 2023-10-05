<?php

namespace App\Http\Controllers\User;

use App\DTO\CreateClienteDTO;
use App\DTO\UpdateClienteDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCliente;
use App\Http\Requests\UpdateCliente;
use App\Models\Cliente;
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

        return view('user.clientes.lista-clientes', compact('clientes'));
    }

    public function create()
    {
        return view('user.clientes.cadastrar-clientes');
    }

    public function createAction(CreateCliente $request)
    {
        // $user = auth()->user();

        // $this->service->create(CreateClienteDTO::makeFromRequest($request));
        $this->service->create(CreateClienteDTO::makeFromRequest($request));

        return redirect()
            ->route('clientes.lista-clientes')
            ->with('message', 'Cadastrado com Sucesso.');
    }

    public function edit(string $id)
    {
        if (!$cliente = $this->service->findById($id)) {
            return back();
        }

        return view('user.clientes.edit', compact('cliente'));
    }

    public function editAction(UpdateCliente $request, Cliente $cliente)
    {
        $cliente = $this->service->update(
            UpdateClienteDTO::makeFromRequest($request),
        );

        if (!$cliente) {
            return back();
        }

        return redirect()
                ->route('clientes.lista-clientes')
                ->with('message', 'Atualizado com Sucesso.');
    }

    public function deleteAction(string $id)
    {
        $this->service->delete($id);

        return redirect()
                ->route('clientes.lista-clientes')
                ->with('message', 'Deletado com Sucesso.');
    }
}

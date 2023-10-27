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

    public function search(Request $request)
    {
        $filters = $request->all();

        $clientes = Cliente::where('nome', 'LIKE', "%{$request->search}%")
            ->orWhere('email', 'LIKE', "%{$request->search}%")
            ->paginate(5);

        return view('user.clientes.lista-clientes', compact('clientes', 'filters'));
    }

    public function create()
    {
        return view('user.clientes.cadastrar-clientes');
    }

    public function createAction(CreateCliente $request)
    {
        // Obtém o ID do usuário logado
        $userId = auth()->id();

        // Verifica se o usuário está logado
        if ($userId) {
            // Crie o cliente associado ao ID do usuário logado
            $clienteData = CreateClienteDTO::makeFromRequest($request);
            $clienteData->user_id = $userId; // Associa o usuário ao cliente

            $cliente = $this->service->create($clienteData);

            if ($cliente) {
                return redirect()
                    ->route('clientes.lista-clientes')
                    ->with('success', 'Cadastrado com sucesso');
            } else {
                return redirect()
                    ->back()
                    ->with('alert', 'Você não está logado.');
            }
        }
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
        $userId = auth()->id();

        if ($userId) {
            $clienteData = UpdateClienteDTO::makeFromRequest($request);
            $clienteData->user_id = $userId;

            $cliente = $this->service->update($clienteData);

            if ($cliente) {
                return redirect()
                    ->route('clientes.lista-clientes')
                    ->with('success', 'Atualizado com sucesso');
            } else {
                return redirect()
                    ->back()
                    ->with('alert', 'Você não está logado.');
            }
        }
    }

    public function deleteAction(string $id)
    {
        $this->service->delete($id);

        return redirect()
                ->route('clientes.lista-clientes')
                ->with('success', 'Deletado com sucesso');
    }

    public function details(string $id)
    {
        if (!$cliente = $this->service->findById($id)) {
            return back();
        }

        return view('user.clientes.detalhes-clientes', compact('cliente'));
    }
}

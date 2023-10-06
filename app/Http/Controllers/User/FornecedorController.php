<?php

namespace App\Http\Controllers\User;

use App\DTO\CreateFornecedorDTO;
use App\DTO\UpdateFornecedorDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateFornecedor;
use App\Http\Requests\UpdateFornecedor;
use App\Models\Fornecedor;
use App\Services\FornecedorService;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    private $service;

    public function __construct(
        FornecedorService $service,
    ) {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $fornecedores = $this->service->getAll();

        return view('user.fornecedores.lista-fornecedores', compact('fornecedores'));
    }

    public function create()
    {
        $tiposFornecedores = json_decode(file_get_contents(public_path('tiposFornecedores.json')), true);

        return view('user.fornecedores.cadastrar-fornecedores', compact('tiposFornecedores'));
    }

    public function createAction(CreateFornecedor $request)
    {
        $userId = auth()->id();

        if ($userId) {
            $fornecedorData = CreateFornecedorDTO::makeFromRequest($request);
            $fornecedorData->user_id = $userId;

            $fornecedor = $this->service->create($fornecedorData);

            if ($fornecedor) {
                return redirect()
                    ->route('fornecedores.lista-fornecedores')
                    ->with('message', 'Cadastrado com Sucesso.');
            } else {
                return redirect()
                    ->back()
                    ->with('alert', 'Você não está logado.');
            }
        }
    }

    public function edit(string $id)
    {
        $tiposFornecedores = json_decode(file_get_contents(public_path('tiposFornecedores.json')), true);

        if (!$fornecedor = $this->service->findById($id)) {
            return back();
        }

        return view('user.fornecedores.edit', compact('fornecedor', 'tiposFornecedores'));
    }

    public function editAction(UpdateFornecedor $request, Fornecedor $fornecedor)
    {
        $userId = auth()->id();

        if ($userId) {
            $fornecedorData = UpdateFornecedorDTO::makeFromRequest($request);
            $fornecedorData->user_id = $userId;

            $fornecedor = $this->service->update($fornecedorData);

            if ($fornecedor) {
                return redirect()
                    ->route('fornecedores.lista-fornecedores')
                    ->with('message', 'Atualizado com Sucesso.');
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
                ->route('fornecedores.lista-fornecedores')
                ->with('message', 'Deletado com Sucesso.');
    }

    public function details(string $id)
    {
        if (!$fornecedor = $this->service->findById($id)) {
            return back();
        }

        return view('user.fornecedores.detalhes-fornecedores', compact('fornecedor'));
    }
}

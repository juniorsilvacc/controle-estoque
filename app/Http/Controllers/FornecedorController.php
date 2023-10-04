<?php

namespace App\Http\Controllers;

use App\DTO\CreateFornecedorDTO;
use App\DTO\UpdateFornecedorDTO;
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

        return view('fornecedores.lista-fornecedores', compact('fornecedores'));
    }

    public function create()
    {
        return view('fornecedores.cadastrar-fornecedores');
    }

    public function createAction(CreateFornecedor $request)
    {
        $this->service->create(CreateFornecedorDTO::makeFromRequest($request));

        return redirect()
            ->route('fornecedores.lista-fornecedores')
            ->with('message', 'Cadastrado com Sucesso.');
    }

    public function edit(string $id)
    {
        if (!$fornecedor = $this->service->findById($id)) {
            return back();
        }

        return view('fornecedores.edit', compact('fornecedor'));
    }

    public function editAction(UpdateFornecedor $request, Fornecedor $fornecedor)
    {
        $fornecedor = $this->service->update(
            UpdateFornecedorDTO::makeFromRequest($request),
        );

        if (!$fornecedor) {
            return back();
        }

        return redirect()
                ->route('fornecedores.lista-fornecedores')
                ->with('message', 'Atualizado com Sucesso.');
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

        return view('fornecedores.detalhes-fornecedores', compact('fornecedor'));
    }
}

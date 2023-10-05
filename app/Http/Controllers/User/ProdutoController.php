<?php

namespace App\Http\Controllers\User;

use App\DTO\CreateProdutoDTO;
use App\DTO\UpdateProdutoDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProduto;
use App\Http\Requests\UpdateProduto;
use App\Models\Categoria;
use App\Models\Fornecedor;
use App\Models\Produto;
use App\Services\ProdutoService;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    private $service;

    public function __construct(
        ProdutoService $service,
    ) {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $produtos = $this->service->getAll();

        return view('user.produtos.lista-produtos', compact('produtos'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        $fornecedores = Fornecedor::all();

        return view('user.produtos.cadastrar-produtos', compact('categorias', 'fornecedores'));
    }

    public function createAction(CreateProduto $request)
    {
        $this->service->create(CreateProdutoDTO::makeFromRequest($request));

        return redirect()
            ->route('produtos.lista-produtos')
            ->with('message', 'Cadastrado com Sucesso.');
    }

    public function edit(string $id)
    {
        if (!$produto = $this->service->findById($id)) {
            return back();
        }

        return view('user.produtos.edit', compact('produto'));
    }

    public function editAction(UpdateProduto $request, Produto $produto)
    {
        $produto = $this->service->update(
            UpdateProdutoDTO::makeFromRequest($request),
        );

        if (!$produto) {
            return back();
        }

        return redirect()
                ->route('produtos.lista-produtos')
                ->with('message', 'Atualizado com Sucesso.');
    }

    public function deleteAction(string $id)
    {
        $this->service->delete($id);

        return redirect()
                ->route('produtos.lista-produtos')
                ->with('message', 'Deletado com Sucesso.');
    }

    public function details(string $id)
    {
        if (!$produto = $this->service->findById($id)) {
            return back();
        }

        return view('user.produtos.detalhes-produtos', compact('produto'));
    }
}

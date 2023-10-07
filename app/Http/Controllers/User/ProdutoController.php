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
        $unidadesMedidas = json_decode(file_get_contents(public_path('unidadesMedidas.json')), true);

        return view('user.produtos.cadastrar-produtos', compact('categorias', 'fornecedores', 'unidadesMedidas'));
    }

    public function createAction(CreateProduto $request)
    {
        $userId = auth()->id();

        if ($userId) {
            $produtoData = CreateProdutoDTO::makeFromRequest($request);
            $produtoData->user_id = $userId;

            $produto = $this->service->create($produtoData);

            if ($produto) {
                return redirect()
                    ->route('produtos.lista-produtos')
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
        $categorias = Categoria::all();
        $fornecedores = Fornecedor::all();
        $unidadesMedidas = json_decode(file_get_contents(public_path('unidadesMedidas.json')), true);

        if (!$produto = $this->service->findById($id)) {
            return back();
        }

        return view('user.produtos.edit', compact('produto', 'categorias', 'fornecedores', 'unidadesMedidas'));
    }

    public function editAction(UpdateProduto $request, Produto $produto)
    {
        $userId = auth()->id();

        if ($userId) {
            $produtoData = UpdateProdutoDTO::makeFromRequest($request);
            $produtoData->user_id = $userId;

            $produto = $this->service->update($produtoData);

            if ($produto) {
                return redirect()
                    ->route('produtos.lista-produtos')
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
                ->route('produtos.lista-produtos')
                ->with('success', 'Deletado com sucesso');
    }

    public function details(string $id)
    {
        if (!$produto = $this->service->findById($id)) {
            return back();
        }

        return view('user.produtos.detalhes-produtos', compact('produto'));
    }
}

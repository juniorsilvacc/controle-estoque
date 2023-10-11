<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProduto;
use App\Http\Requests\UpdateProduto;
use App\Http\Requests\UploadImagem;
use App\Models\Categoria;
use App\Models\Fornecedor;
use App\Services\ProdutoService;
use App\Services\UploadFile;
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
        $produtoData = $request->validated();
        $userId = auth()->id();

        if (!$userId) {
            return redirect()
                ->back()
                ->with('alert', 'Você não está logado.');
        }

        $produtoData['user_id'] = $userId;
        $produto = $this->service->create($produtoData);

        if ($produto) {
            return redirect()
                ->route('produtos.lista-produtos')
                ->with('success', 'Cadastrado com sucesso');
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

    public function editAction(UpdateProduto $request, $id)
    {
        $data = $request->all();
        $userId = auth()->id();

        if (!$userId) {
            return redirect()
                ->back()
                ->with('alert', 'Você não está logado.');
        }

        $data['user_id'] = $userId;
        if (!$this->service->update($id, $data)) {
            return back();
        }

        return redirect()->route('produtos.lista-produtos');
    }

    public function details(string $id)
    {
        if (!$produto = $this->service->findById($id)) {
            return back();
        }

        return view('user.produtos.detalhes-produtos', compact('produto'));
    }

    public function image($id)
    {
        if (!$produto = $this->service->findById($id)) {
            return back();
        }

        return view('user.produtos.image', compact('produto'));
    }

    public function uploadAction(UploadImagem $request, UploadFile $upload, $id)
    {
        $path = $upload->store($request->image, 'produtos');

        if (!$this->service->update($id, ['image' => $path])) {
            return back();
        }

        return redirect()
                ->route('produtos.lista-produtos')
                ->with('success', 'Upload com sucesso');
    }
}

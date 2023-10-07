<?php

namespace App\Http\Controllers\User;

use App\DTO\CreateCategoriaDTO;
use App\DTO\UpdateCategoriaDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoria;
use App\Http\Requests\UpdateCategoria;
use App\Models\Categoria;
use App\Services\CategoriaService;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    private $service;

    public function __construct(
        CategoriaService $service
    ) {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $categorias = $this->service->getAll();

        return view('user.categorias.lista-categorias', compact('categorias'));
    }

    public function create()
    {
        return view('user.categorias.cadastrar-categorias');
    }

    public function createAction(CreateCategoria $request)
    {
        $this->service->create(CreateCategoriaDTO::makeFromRequest($request));

        return redirect()
            ->route('categorias.lista-categorias')
            ->with('success', 'Cadastrado com sucesso');
    }

    public function edit(string $id)
    {
        if (!$categoria = $this->service->findById($id)) {
            return back();
        }

        return view('user.categorias.edit', compact('categoria'));
    }

    public function editAction(UpdateCategoria $request, Categoria $categoria)
    {
        $categoria = $this->service->update(
            UpdateCategoriaDTO::makeFromRequest($request),
        );

        if (!$categoria) {
            return back();
        }

        return redirect()
                ->route('categorias.lista-categorias')
                ->with('success', 'Atualizado com sucesso');
    }

    public function deleteAction(string $id)
    {
        $this->service->delete($id);

        return redirect()
                ->route('categorias.lista-categorias')
                ->with('success', 'Deletado com sucesso');
    }

    public function details(string $id)
    {
        if (!$categoria = $this->service->findById($id)) {
            return back();
        }

        return view('user.categorias.detalhes-categorias', compact('categoria'));
    }
}

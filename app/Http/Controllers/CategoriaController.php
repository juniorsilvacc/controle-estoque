<?php

namespace App\Http\Controllers;

use App\DTO\CreateCategoriaDTO;
use App\DTO\UpdateCategoriaDTO;
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

        return view('categorias.lista-categorias', compact('categorias'));
    }

    public function create()
    {
        return view('categorias.cadastrar-categorias');
    }

    public function createAction(CreateCategoria $request)
    {
        $this->service->create(CreateCategoriaDTO::makeFromRequest($request));

        return redirect()
            ->route('categorias.lista-categorias')
            ->with('message', 'Cadastrado com Sucesso.');
    }

    public function edit(string $id)
    {
        if (!$categoria = $this->service->findById($id)) {
            return back();
        }

        return view('categorias.edit', compact('categoria'));
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
                ->with('message', 'Atualizado com Sucesso.');
    }

    public function deleteAction(string $id)
    {
        $this->service->delete($id);

        return redirect()
                ->route('categorias.lista-categorias')
                ->with('message', 'Deletado com Sucesso.');
    }
}

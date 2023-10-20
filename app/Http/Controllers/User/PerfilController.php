<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUser;
use App\Services\PerfilService;

class PerfilController extends Controller
{
    private $service;

    public function __construct(
        PerfilService $service,
    ) {
        $this->service = $service;
    }

    public function details($id)
    {
        if (!$usuario = $this->service->details($id)) {
            return back();
        }

        return view('user.perfil.detalhes-usuario-perfil', compact('usuario'));
    }

    public function edit($id)
    {
        if (!$usuario = $this->service->details($id)) {
            return back();
        }

        return view('user.perfil.edit-usuario-perfil', compact('usuario'));
    }

    public function editAction(UpdateUser $request, $id)
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

        return redirect()->route('perfil.detalhes-usuario-perfil', $userId);
    }
}

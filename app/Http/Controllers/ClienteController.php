<?php

namespace App\Http\Controllers;

class ClienteController extends Controller
{
    public function listar()
    {
        return view('clientes.lista-clientes');
    }

    public function cadastrar()
    {
        return view('clientes.cadastrar-clientes');
    }
}

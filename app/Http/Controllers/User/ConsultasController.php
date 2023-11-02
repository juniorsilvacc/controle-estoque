<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Entrada;
use App\Models\Saida;
use Illuminate\Http\Request;

class ConsultasController extends Controller
{
    public function entrysQueries(Request $request)
    {
        $registros = Entrada::with('produto')->paginate(6);

        return view('user.consultas.consultas-entradas', compact('registros'));
    }

    public function searchEntrys(Request $request)
    {
        $dataInicial = $request->input('data_entrada');
        $dataFinal = $request->input('data_final');

        // Realize a consulta para filtrar os registros com base nas datas
        $registros = Entrada::whereBetween('data_entrada', [$dataInicial, $dataFinal])
            ->paginate(6); // Você pode ajustar o número de itens por página conforme necessário

        return view('user.consultas.consultas-entradas', compact('registros'));
    }

    public function exitQueries()
    {
        $registros = Saida::with('produto')->paginate(6);

        return view('user.consultas.consultas-saidas', compact('registros'));
    }

    public function searchExit(Request $request)
    {
        $dataInicial = $request->input('data_saida');
        $dataFinal = $request->input('data_final');

        // Realize a consulta para filtrar os registros com base nas datas
        $registros = Saida::whereBetween('data_saida', [$dataInicial, $dataFinal])
            ->paginate(6); // Você pode ajustar o número de itens por página conforme necessário

        return view('user.consultas.consultas-saidas', compact('registros'));
    }
}

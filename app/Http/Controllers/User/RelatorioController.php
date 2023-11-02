<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Entrada;
use App\Models\Saida;

class RelatorioController extends Controller
{
    public function generatePDFInput()
    {
        $entradas = Entrada::with('produto')->get();

        $pdf = \PDF::loadView('user.relatorios.pdf-entrada', compact('entradas'));

        return $pdf->setPaper('a4')->download('Relatorio_Entradas.pdf');
    }

    public function generatePDFOutput()
    {
        $saidas = Saida::with('produto')->get();

        $pdf = \PDF::loadView('user.relatorios.pdf-saida', compact('saidas'));

        return $pdf->setPaper('a4')->download('Relatorio_Saidas.pdf');
    }
}

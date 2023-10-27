<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSaida;
use App\Models\Cliente;
use App\Models\Produto;
use App\Services\ProdutoService;
use App\Services\SaidaService;

class SaidaController extends Controller
{
    private $service;
    private $produtoservice;

    public function __construct(
        SaidaService $service,
        ProdutoService $produtoservice,
    ) {
        $this->service = $service;
        $this->produtoservice = $produtoservice;
    }

    public function exit()
    {
        $produtos = Produto::all();
        $clientes = Cliente::all();

        return view('user.saida.saida-produtos', compact('produtos', 'clientes'));
    }

    public function exitAction(CreateSaida $request)
    {
        $saidaData = $request->validated();
        $saidaData['preco_unitario'] = 0.00;

        $saida = $this->service->create($saidaData);

        // Agora atualize o estoque do produto após a criação da saida bem-sucedida

        // Pegar o Id do produto que o usuário está passando e acessar o estoque atual de produtos
        $produto = $this->produtoservice->findById($request->produto_id);
        $estoque_atual = $produto->estoque;

        if ($estoque_atual == 0) {
            return redirect()
                ->route('saida.saida-produtos')
                ->with('error', 'Não existe mais produto nesse estoque');
        }

        // Pegar a quantidade de produtos que o usuário está passando
        $quantidade_saida = $request->quantidade;

        // Calcular o novo estoque com o estoque atual MENOS a quantidade de produtos que o usuário está passando
        $novo_estoque = $estoque_atual - $quantidade_saida;

        // Atualizar o estoque atual com o novo estoque
        $produto->update(['estoque' => $novo_estoque]);

        return redirect()
            ->route('saida.saida-produtos')
            ->with('success', 'Saída de produto registrada com sucesso');
    }
}

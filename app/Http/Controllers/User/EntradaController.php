<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateEntrada;
use App\Models\Entrada;
use App\Models\Fornecedor;
use App\Models\Produto;
use App\Services\EntradaService;
use App\Services\ProdutoService;

class EntradaController extends Controller
{
    private $service;
    private $produtoservice;
    private $fornecedorService;

    public function __construct(
        EntradaService $service,
        ProdutoService $produtoservice,
    ) {
        $this->service = $service;
        $this->produtoservice = $produtoservice;
    }

    public function entry()
    {
        $produtos = Produto::all();
        $fornecedores = Fornecedor::all();

        return view('user.entrada.entrada-produtos', compact('produtos', 'fornecedores'));
    }

    public function entryAction(CreateEntrada $request)
    {
        $entradaData = $request->validated();
        $entradaData['preco_unitario'] = 0.00;

        $entrada = $this->service->create($entradaData);

        // Agora atualize o estoque do produto após a criação da entrada bem-sucedida

        // Pegar o Id do produto que o usuário está passando e acessar o estoque atual de produtos
        $produto = $this->produtoservice->findById($request->produto_id);
        $estoque_atual = $produto->estoque;

        // Pegar a quantidade de produtos que o usuário está passando
        $quantidade_entrada = $request->quantidade;

        // Calcular o novo estoque com o estoque atual MAIS a quantidade de produtos que o usuário está passando
        $novo_estoque = $estoque_atual + $quantidade_entrada;

        // Atualizar o estoque atual com o novo estoque
        $produto->update(['estoque' => $novo_estoque]);

        return redirect()
            ->route('entrada.entrada-produtos')
            ->with('success', 'Entrada de produto registrada com sucesso');
    }
}

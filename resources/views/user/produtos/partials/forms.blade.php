@include('components.includes.alert')

@csrf
<div class="col-md-6 form-group">
    <label for="nome">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome" value="{{ $produto->nome ?? old("nome")}}">
</div>
<div class="col-md-6 form-group">
    <label for="fornecedor">Fornecedor</label>
    <select class="form-select" name="fornecedor_id" value="{{ $produto->fornecedor_id ?? old("fornecedor_id")}}">
        <option selected>Seleciona o fornecedor</option>

        @foreach ($fornecedores as $fornecedor)
            <option value="{{ $fornecedor->id }}">{{ $fornecedor->nome }}</option>
        @endforeach

    </select>
</div>
<div class="col-md-6 form-group">
    <label for="categoria">Categoria</label>
    <select class="form-select" name="categoria_id" value="{{ $produto->categoria_id ?? old("categoria_id")}}">
        <option selected>Selecione a categoria</option>

        @foreach ($categorias as $categoria)
            <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
        @endforeach

    </select>
</div>
<div class="col-md-3 form-group ">
    <label for="preco">Preço</label>
    <input type="number" class="form-control" id="preco" name="preco" value="{{ $produto->preco ?? old("preco")}}">
</div>
<div class="col-md-3 form-group ">
    <label for="preco_venda">Preço de Venda</label>
    <input type="number" class="form-control" id="preco_venda" name="preco_venda" value="{{ $produto->preco_venda ?? old("preco_venda")}}">
</div>
<div class="col-md-4 form-group ">
    <label for="estoque_inicial">Estoque Inicial</label>
    <input type="number" class="form-control" id="estoque_inicial" name="estoque_inicial" value="{{ $produto->estoque_inicial ?? old("estoque_inicial")}}">
</div>
<div class="col-md-4 form-group ">
    <label for="estoque_minimo">Estoque Mínimo</label>
    <input type="number" class="form-control" id="estoque_minimo" name="estoque_minimo" value="{{ $produto->estoque_minimo ?? old("estoque_minimo")}}">
</div>
<div class="col-md-4 form-group ">
    <label for="data">Data</label>
    <input type="date" class="form-control" id="data_produto" name="data_produto" value="{{ $produto->data_produto ?? old("data_produto")}}">
</div>

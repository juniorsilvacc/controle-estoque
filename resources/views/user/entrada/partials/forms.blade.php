@include('components.includes.alert')

@csrf
<div class="col-md-6 form-group">
    <label for="fornecedor_id">Fornecedor</label>
    <select class="form-select" name="fornecedor_id" value="{{ $entrada->fornecedor_id ?? old('fornecedor_id') }}">
        <option selected>Selecione o fornecedor</option>

        @foreach ($fornecedores as $fornecedor)
            <option value="{{ $fornecedor->id }}">{{ $fornecedor->nome }}</option>
        @endforeach

    </select>
</div>
<div class="col-md-6 form-group">
    <label for="produto_id">Produto</label>
    <select class="form-select" name="produto_id" value="{{ $entrada->produto_id ?? old('produto_id') }}">
        <option selected>Selecione o produto</option>

        @foreach ($produtos as $produto)
            <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
        @endforeach

    </select>
</div>
<div class="col-md-4 form-group ">
    <label for="number">Quantidade</label>
    <input type="number" class="form-control" id="quantidade" name="quantidade"
        value="{{ $entrada->quantidade ?? old('quantidade') }}">
</div>
<div class="col-md-4 form-group ">
    <label for="data_entrada">Data de Entrada</label>
    <input type="date" class="form-control" id="data_entrada" name="data_entrada"
        value="{{ $entrada->data_entrada ?? old('data_entrada') }}">
</div>
<div class="col-md-4 form-group ">
    <label for="observacoes">Observações</label>
    <input type="text" class="form-control" id="observacoes" name="observacoes"
        value="{{ $entrada->observacoes ?? old('observacoes') }}">
</div>

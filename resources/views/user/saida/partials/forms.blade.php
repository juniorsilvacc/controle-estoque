@include('components.includes.alert')

@csrf
<div class="col-md-6 form-group">
    <label for="cliente_id">Cliente</label>
    <select class="form-select" name="cliente_id" value="{{ $saida->cliente_id ?? old('cliente_id') }}">
        <option selected>Selecione o cliente</option>

        @foreach ($clientes as $cliente)
            <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
        @endforeach

    </select>
</div>
<div class="col-md-6 form-group">
    <label for="produto_id">Produto</label>
    <select class="form-select" name="produto_id" value="{{ $saida->produto_id ?? old('produto_id') }}">
        <option selected>Selecione o produto</option>

        @foreach ($produtos as $produto)
            <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
        @endforeach

    </select>
</div>
<div class="col-md-4 form-group ">
    <label for="number">Quantidade</label>
    <input type="number" class="form-control" id="quantidade" name="quantidade"
        value="{{ $saida->quantidade ?? old('quantidade') }}">
</div>
<div class="col-md-4 form-group ">
    <label for="data_saida">Data de saida</label>
    <input type="date" class="form-control" id="data_saida" name="data_saida"
        value="{{ $saida->data_saida ?? old('data_saida') }}">
</div>
<div class="col-md-4 form-group ">
    <label for="observacoes">Observações</label>
    <input type="text" class="form-control" id="observacoes" name="observacoes"
        value="{{ $saida->observacoes ?? old('observacoes') }}">
</div>

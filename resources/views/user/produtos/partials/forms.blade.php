@include('components.includes.alert')

@csrf
<div class="col-md-6 form-group">
    <label for="nome">Nome (*)</label>
    <input type="text" class="form-control" id="nome" name="nome" value="{{ $produto->nome ?? old('nome') }}">
</div>
<div class="col-md-6 form-group">
    <label for="fornecedor">Fornecedor</label>
    <select class="form-select" name="fornecedor_id" value="{{ $produto->fornecedor_id ?? old('fornecedor_id') }}">
        <option selected>Seleciona o fornecedor</option>

        @foreach ($fornecedores as $fornecedor)
            <option value="{{ $fornecedor->id }}">{{ $fornecedor->nome }}</option>
        @endforeach

    </select>
</div>
<div class="col-md-3 form-group ">
    <label for="cod_referencia">Código Referência (*)</label>
    <input type="number" class="form-control" id="cod_referencia" name="cod_referencia"
        value="{{ $produto->cod_referencia ?? old('cod_referencia') }}">
</div>



<div class="col-md-2 form-group ">
    <label for="preco_unitario">Preço Unitário (*)</label>
    <input type="text" class="form-control" id="preco1" name="preco_unitario"
        value="{{ $produto->preco_unitario ?? old('preco_unitario') }}">
</div>
<div class="col-md-2 form-group ">
    <label for="preco_venda">Preço Venda (*)</label>
    <input type="text" class="form-control" id="preco2" name="preco_venda"
        value="{{ $produto->preco_unitario ?? old('preco_venda') }}">
</div>



<div class="col-md-2 form-group ">
    <label for="estoque">Estoque (*)</label>
    <input type="number" class="form-control" id="estoque" name="estoque"
        value="{{ $produto->estoque ?? old('estoque') }}">
</div>
<div class="col-md-3 form-group">
    <label for="categoria_id">Categoria</label>
    <select class="form-select" name="categoria_id" value="{{ $produto->categoria_id ?? old('categoria_id') }}">
        <option selected>Selecione a categoria</option>

        @foreach ($categorias as $categoria)
            <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
        @endforeach

    </select>
</div>
<div class="col-md-6 form-group ">
    <label for="descricao">Descrição</label>
    <input type="text" class="form-control" id="descricao" name="descricao"
        value="{{ $produto->descricao ?? old('descricao') }}">
</div>
<div class="col-md-2 form-group">
    <label for="unidade_medida">Unidade de Medida</label>
    <select class="form-select" id="unidade_medida" name="unidade_medida">
        <option>Selecione a Und. Medida</option>
        @foreach ($unidadesMedidas as $medidas)
            <option value="{{ $medidas['nome'] }}">{{ $medidas['nome'] }}</option>
        @endforeach
    </select>
</div>
<div class="col-md-2 form-group ">
    <label for="data_fabricacao">Data Fabricação (*)</label>
    <input type="date" class="form-control" id="data_fabricacao" name="data_fabricacao"
        value="{{ $produto->data_fabricacao ?? old('data_fabricacao') }}">
</div>
<div class="col-md-2 form-group ">
    <label for="data_validade">Data Validade (*)</label>
    <input type="date" class="form-control" id="data_validade" name="data_validade"
        value="{{ $produto->data_validade ?? old('data_validade') }}">
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var precoInput1 = document.getElementById("preco1");
        var precoInput2 = document.getElementById("preco2");

        var numberFormat = new Intl.NumberFormat('pt-BR', {
            style: 'currency',
            currency: 'BRL'
        });

        precoInput1.addEventListener("input", function() {
            this.value = formatPrice(this.value);
        });

        precoInput2.addEventListener("input", function() {
            this.value = formatPrice(this.value);
        });

        function formatPrice(value) {
            // Remove caracteres não numéricos
            var numericValue = parseFloat(value.replace(/\D/g, '')) / 100;
            return numberFormat.format(numericValue);
        }
    });
</script>

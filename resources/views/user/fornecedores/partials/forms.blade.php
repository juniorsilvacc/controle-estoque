@include('components.includes.alert')

@csrf
<div class="col-md-6 form-group">
    <label for="nome">Nome (*)</label>
    <input type="text" class="form-control" id="nome" name="nome"
        value="{{ $fornecedor->nome ?? old('nome') }}">
</div>
<div class="col-md-6 form-group">
    <label for="empresa">Empresa (*)</label>
    <input type="text" class="form-control" id="empresa" name="empresa"
        value="{{ $fornecedor->empresa ?? old('empresa') }}">
</div>
<div class="col-md-4 form-group">
    <label for="email">E-mail</label>
    <input type="email" class="form-control" id="email" name="email"
        value="{{ $fornecedor->email ?? old('email') }}">
</div>
<div class="col-md-4 form-group">
    <label for="telefone">Telefone (*)</label>
    <input type="text" class="form-control" id="telefone" name="telefone"
        value="{{ $fornecedor->telefone ?? old('telefone') }}">
</div>
<div class="col-md-4 form-group">
    <label for="cnpj">CNPJ (*)</label>
    <input type="text" class="form-control" id="cnpj" name="cnpj"
        value="{{ $fornecedor->cnpj ?? old('cnpj') }}">
</div>
<div class="col-md-5 form-group">
    <label for="endereco">Endereço</label>
    <input type="text" class="form-control" id="endereco" name="endereco"
        value="{{ $fornecedor->endereco ?? old('endereco') }}">
</div>
<div class="col-md-3 form-group">
    <label for="cnpj">Tipo</label>
    <select class="form-select" id="tipo" name="tipo">
        <option>Selecione o tipo</option>
        @foreach ($tiposFornecedores as $tipo)
            <option value="{{ $tipo['nome'] }}">{{ $tipo['nome'] }}</option>
        @endforeach
    </select>
</div>
<div class="col-md-4 form-group">
    <label for="observacoes">Observações</label>
    <input type="text" class="form-control" id="observacoes" name="observacoes"
        value="{{ $fornecedor->observacoes ?? old('observacoes') }}">
</div>

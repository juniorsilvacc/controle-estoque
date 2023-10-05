@include('components.includes.alert')

@csrf
<div class="col-md-6 form-group">
    <label for="nome">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome" value="{{ $fornecedor->nome ?? old('nome') }}">
</div>
<div class="col-md-6 form-group">
    <label for="empresa">Empresa</label>
    <input type="text" class="form-control" id="empresa" name="empresa"
        value="{{ $fornecedor->empresa ?? old('empresa') }}">
</div>
<div class="col-md-3 form-group ">
    <label for="email">E-mail</label>
    <input type="email" class="form-control" id="email" name="email"
        value="{{ $fornecedor->email ?? old('email') }}">
</div>
<div class="col-md-3 form-group ">
    <label for="cnpj">CNPJ</label>
    <input type="text" class="form-control" id="cnpj" name="cnpj"
        value="{{ $fornecedor->cnpj ?? old('cnpj') }}">
</div>
<div class="col-md-3 form-group ">
    <label for="estado">Estado</label>
    <select class="form-select" name="estado_id" value="{{ $fornecedor->estado_id ?? old("estado_id")}}">
        <option selected>Selecione o estado</option>

        @foreach ($estados as $estado)
            <option value="{{ $estado['id'] }}">{{ $estado['nome'] }}</option>
        @endforeach

    </select>
</div>
<div class="col-md-3 form-group ">
    <label for="cidade">Cidade</label>
    <input type="text" class="form-control" id="cidade">
</div>

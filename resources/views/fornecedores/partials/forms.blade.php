@include('includes.alert')

@csrf
<div class="col-md-8 form-group">
    <label for="nome">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome" value="{{ $fornecedor->nome ?? old("nome")}}">
  </div>
  <div class="col-md-4 form-group">
    <label for="empresa">Empresa</label>
    <input type="text" class="form-control" id="empresa" name="empresa" value="{{ $fornecedor->empresa ?? old("empresa")}}">
  </div>
  <div class="col-md-4 form-group ">
    <label for="cnpj">CNPJ</label>
    <input type="text" class="form-control" id="cnpj" name="cnpj" value="{{ $fornecedor->cnpj ?? old("cnpj")}}">
  </div>
  <div class="col-md-6 form-group ">
    <label for="endereco">Endereço</label>
    <input type="text" class="form-control" id="endereco" name="endereco" value="{{ $fornecedor->endereco ?? old("endereco")}}">
  </div>
  <div class="col-md-2 form-group ">
    <label for="numero">Número</label>
    <input type="text" class="form-control" id="numero" name="numero" value="{{ $fornecedor->numero ?? old("numero")}}">
  </div>
  <div class="col-md-3 form-group ">
    <label for="cidade">Cidade</label>
    <input type="text" class="form-control" id="cidade">
  </div>
  <div class="col-md-3 form-group ">
    <label for="estado">Estado</label>
    <input type="text" class="form-control" id="estado">
  </div>
  <div class="col-md-6 form-group ">
    <label for="email">E-mail</label>
    <input type="email" class="form-control" id="email" name="email" value="{{ $fornecedor->email ?? old("email")}}">
  </div>

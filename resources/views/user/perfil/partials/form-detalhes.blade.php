@include('components.includes.alert')

@csrf
<div class="col-md-12 form-group">
    <label for="nome_usuario" class="small">Nome Usuário</label>
    <input type="text" class="form-control" id="nome_usuario" name="nome_usuario" value="{{ $usuario->name ?? old('nome_usuario') }}" disabled>
</div>
<div class="col-md-6 form-group">
    <label for="primeiro_nome" class="small">Primeiro Nome</label>
    <input type="text" class="form-control" id="primeiro_nome" name="primeiro_nome" value="{{ $usuario->name ?? old('primeiro_nome') }}" disabled>
</div>
<div class="col-md-6 form-group ">
    <label for="ultimo_nome" class="small">Último Nome</label>
    <input type="text" class="form-control" id="ultimo_nome" name="ultimo_nome" value="{{ $usuario->email ?? old('ultimo_nome') }}" disabled>
</div>
<div class="col-md-12 form-group ">
    <label for="email" class="small">E-mail</label>
    <input type="email" class="form-control" id="email" name="email" value="{{ $usuario->email ?? old('email') }}" disabled>
</div>
<div class="col-md-6 form-group">
    <label for="telefone" class="small">Número de Telefone</label>
    <input type="text" class="form-control" id="telefone" name="telefone" value="{{ $usuario->name ?? old('telefone') }}" disabled>
</div>
<div class="col-md-6 form-group ">
    <label for="data_nascimento" class="small">Data de Nascimento</label>
    <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="{{ $usuario->email ?? old('data_nascimento') }}" disabled>
</div>

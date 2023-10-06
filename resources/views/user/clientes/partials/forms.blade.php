@include('components.includes.alert')

@csrf
<div class="col-md-6 form-group">
    <label for="nome">Nome (*)</label>
    <input type="text" class="form-control" id="nome" name="nome" value="{{ $cliente->nome ?? old('nome') }}">
</div>
<div class="col-md-6 form-group ">
    <label for="email">E-mail</label>
    <input type="email" class="form-control" id="email" name="email" value="{{ $cliente->email ?? old('email') }}">
</div>

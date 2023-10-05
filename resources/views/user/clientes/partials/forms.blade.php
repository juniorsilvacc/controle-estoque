@include('components.includes.alert')

@csrf
{{-- <input type="hidden" name="user_id" value="{{ $user->id }}"> --}}
<div class="col-md-6 form-group">
    <label for="cliente">Nome</label>
    <input type="cliente" class="form-control" id="cliente" name="nome" value="{{ $cliente->nome ?? old("nome")}}">
</div>
<div class="col-md-6 form-group ">
    <label for="email">E-mail</label>
    <input type="email" class="form-control" id="email" name="email" value="{{ $cliente->email ?? old("email")}}">
</div>


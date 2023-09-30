@include('includes.alert')

@csrf
<div class="col-md-12 form-group">
    <label for="categoria">Nome</label>
    <input type="categoria" class="form-control" id="categoria" name="nome" value="{{ $categoria->nome ?? old("nome")}}">
</div>



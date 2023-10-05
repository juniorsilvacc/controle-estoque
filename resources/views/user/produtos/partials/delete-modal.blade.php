<!-- Button trigger modal -->
<button type="button" class="btn btn-danger col-md-3" data-bs-toggle="modal" data-bs-target="#exampleModal-{{$produto->id}}">
    Excluir
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal-{{$produto->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmação de exclusão</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Tem certeza que deseja excluir?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <a href=" {{ route('produtos.deleteAction', $produto->id) }} " class="btn btn-danger">Excluir</a>
            </div>
        </div>
    </div>
</div>

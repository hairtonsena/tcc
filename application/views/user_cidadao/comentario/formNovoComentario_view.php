<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title"> Comentário </h4>
</div>
<div class="modal-body">
    <form class="form" name="frmComentarProblema" method="post" action="salvar.php" onsubmit="return Problema.salvarComentario()">

        <input type="hidden" id="idProblema" nome="idProblema" value="<?php echo $idProblema ?>">
        <div class="form-group">
            <label for="comentário"> Comentario: </label> 
            <textarea id="comentario" nome="comentario" rows="4" class="form-control" required="true" placeholder="Comentario ..."></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Salvar </button> <button type="button" onclick="Tela.fecharModal()" class="btn btn-default pull-right">Cancelar</button>

    </form>
</div>

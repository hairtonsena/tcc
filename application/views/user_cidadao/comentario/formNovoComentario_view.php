<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title"> Comentários </h4>
</div>
<div class="modal-body">

    <div class="list-group">
        <?php foreach ($problemaComentario as $pc) { ?>
            <div class = "list-group-item" style="background-color: #e9e9e9"><strong>
                    <img src="<?php echo base_url("icone/icone" . $pc->idTipo . '.png') ?>" />
                    <?php echo $pc->tipo
                    ?></strong><span class='pull-right'> <?php echo implode("/", array_reverse(explode("-", $pc->data))) ?></span>
                <br/>
                <?php echo $pc->descricao ?>
                <br/>



            </div>
        <?php } ?>

        <form class="form" name="frmComentarProblema" method="post" action="salvar.php" onsubmit="return Problema.salvarComentario()">

            <input type="hidden" id="idProblema" nome="idProblema" value="<?php echo $idProblema ?>">
            <div class="form-group">
                
<!--                <label for="comentário"> Comentario: </label> -->
                <textarea id="comentario" nome="comentario" rows="2" class="form-control" required="true" placeholder="Comentario ..."></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Salvar </button> <button type="button" onclick="Tela.fecharModal()" class="btn btn-default pull-right">Cancelar</button>

        </form>
    </div>

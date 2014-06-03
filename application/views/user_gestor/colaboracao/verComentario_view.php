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
        <?php
        
        if(count($comentarios_problema)==0){ ?>
        <div class="list-group-item"> Nenhum comentário </div>
       <?php }
        foreach ($comentarios_problema as $cm) {
            if (($cm->nomeCidadao != null) || ($cm->nomeCidadao != '')) {
                ?>
                <div class="list-group-item" id="blocoComentario<?php echo $cm->idComentario ?>"><strong>
                        <?php echo $cm->nomeCidadao ?></strong><span class='pull-right'> <?php echo implode("/", array_reverse(explode("-", $cm->datacomentario))) ?></span>
                    <br/>
                    <?php echo $cm->textoComentario ?>
                    <br/>

                    <a class="btn btn-primary btn-xs" href="javascript:void(0)"   >
                        <i class="glyphicon glyphicon-thumbs-up"></i>
                        <span class="text-info badge"> <?php echo $cm->qtde_apoio_comentario ?></span>
                    </a>  
                    <a class="btn btn-default btn-xs" href="javascript:void(0)"  >
                        <i class="glyphicon glyphicon-thumbs-down"></i>
                        <span class="text-error badge"><?php echo $cm->qtde_reprovado_comentario ?></span>
                    </a> 

                    <?php if ($cm->statusComentario == 0) { ?>
                        <div id="linkModeracaoComentario<?php echo $cm->idComentario ?>">
                            <br/>
                            <button class="btn btn-primary pull-left" onclick="Problema.aceitarComentario2('<?php echo $cm->idComentario ?>')" type="button">Aceitar</button> <button onclick="Problema.rejeitarComentario('<?php echo $cm->idComentario ?>')" class="btn btn-danger pull-right" type="button">Rejeitar</button>
                            <br/>
                            <br/>
                        </div>
                    <?php } ?>

                </div>
                <?php
            }
        }
        ?>
    </div>
</div>
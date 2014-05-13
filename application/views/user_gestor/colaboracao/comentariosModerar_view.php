<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title"> Moderar comentários </h4>
</div>
<div class="modal-body">
    <div class="list-group">
        <?php
        $verificadoId = -1;
        foreach ($cometarios_moderar as $cm) {
            ?>

            <?php if($verificadoId!=$cm->idProblema) {?>  
                <?php if($verificadoId!=-1){echo '<br/>';} ?>
                <div class="list-group-item" style="background-color: #e9e9e9">
                    <strong>
                        <img src="<?php echo base_url("icone/icone".$cm->idTipo.'.png') ?>" />
                        <?php echo $cm->tipo ?>
                    </strong>
                    <span class='pull-right'><?php echo implode("/", array_reverse(explode("-", $cm->data))) ?></span>
                    <br/>
                    <?php echo $cm->descricao ?>
                </div>
            
            <?php }
                $verificadoId = $cm->idProblema;
                ?>
                <div class="list-group-item" id="blocoComentario<?php echo $cm->idComentario ?>">
                    <strong>
                        <?php echo $cm->nomeCidadao ?>
                    </strong><span class='pull-right'> <?php echo implode("/", array_reverse(explode("-", $cm->dataComentario))) ?></span>
                    <br/>
                    <?php echo $cm->textoComentario ?>
                    <br/>
                    <br/>
                    <button class="btn btn-primary pull-left" onclick="Problema.aceitarComentario('<?php echo $cm->idComentario ?>')" type="button">Aceitar</button> <button onclick="Problema.rejeitarComentario('<?php echo $cm->idComentario ?>')" class="btn btn-danger pull-right" type="button">Rejeitar</button>
                    <br/>
                    <br/>
                </div>   
<!--            </div>-->
            <?php
        }
        ?>
    </div>
</div>
<div class="list-group">
    <?php
    foreach ($comentarios as $cm) {

        if (($cm->nomeCidadao != null) || ($cm->nomeCidadao != '')) {

            $data = explode('-', $cm->datacomentario);
            $dataBrasil = $data[2] . '/' . $data[1] . '/' . $data[0];
            ?>
            <div class="list-group-item"><strong>
                    <?php echo $cm->nomeCidadao ?></strong><span class='pull-right'> <?php echo $dataBrasil ?></span>
                <br/>
                <?php echo $cm->textoComentario ?>
                <br/>



                <?php
                if ($userLogado == TRUE) {
                    if ($cm->jaAproiei == 'nao') {
                        ?>
                        <button type="button" id="botaoApoiocomentario<?php echo $cm->idComentario ?>" class="btn btn-primary btn-xs" onclick="Problema.apoiaComentario('<?php echo $cm->idComentario ?>')" >
                            <i class="glyphicon glyphicon-thumbs-up"></i>
                            <span class="text-info badge" id="numApoioComentario<?php echo $cm->idComentario ?>">
                                <?php echo $cm->qtde_apoio_comentario ?>
                            </span> 
                        </button>

                    <?php } else if($cm->jaAproiei == 'sim'){ ?>

                        <button type="button"  class="btn btn-primary btn-xs" disabled="true" >
                            <i class="glyphicon glyphicon-thumbs-up"></i>
                            <span class="text-info badge">
                                <?php echo $cm->qtde_apoio_comentario ?>
                            </span> 
                        </button>
                    <?php } ?>
                <?php if($cm->jaReprovei == 'nao'){ ?>
                    <button type="button" id="botaoReprovaComentario<?php echo $cm->idComentario ?>" class="btn btn-default btn-xs" onclick="Problema.reprovadoComentario('<?php echo $cm->idComentario ?>')"  >
                        <i class="glyphicon glyphicon-thumbs-down"></i>
                        <span class="text-error badge" id="numReprovaComentario<?php echo $cm->idComentario ?>">
                            <?php echo $cm->qtde_reprovado_comentario ?>
                        </span> 
                    </button>
                <?php }else if($cm->jaReprovei=='sim'){ ?> 
                <button type="button" class="btn btn-default btn-xs" disabled="true" >
                        <i class="glyphicon glyphicon-thumbs-down"></i>
                        <span class="text-error badge" >
                            <?php echo $cm->qtde_reprovado_comentario ?>
                        </span> 
                    </button>
                <?php } ?>
                <?php } else { ?>
                    <a class="btn btn-primary btn-xs" href="javascript:void(0)" onclick="alert('Desculpe, Você não esta logado!')"  >
                        <i class="glyphicon glyphicon-thumbs-up"></i>
                        <span class="text-info badge"> <?php echo $cm->qtde_apoio_comentario ?></span>
                    </a>  
                    <a class="btn btn-default btn-xs" href="javascript:void(0)" onclick="alert('Desculpe, Você não esta logado!')" >3
                        <i class="glyphicon glyphicon-thumbs-down"></i>
                        <span class="text-error badge"><?php echo $cm->qtde_reprovado_comentario ?></span>
                    </a> 
                <?php } ?>
            </div>
            <?php
        }
    }
    ?>
</div>
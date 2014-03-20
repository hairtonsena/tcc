<div class="list-group">
    <?php
    foreach ($comentarios as $cm) {

        if (($cm->nomeCidadao != null) || ($cm->nomeCidadao != '')) {

            $data = explode('-', $cm->dataComentario);
            $dataBrasil = $data[2] . '/' . $data[1] . '/' . $data[0];
            ?>
            <div class="list-group-item"><strong>
                    <?php echo $cm->nomeCidadao ?></strong><span class='pull-right'> <?php echo $dataBrasil ?></span>
                <br/>
                <?php echo $cm->textoComentario ?>
                </br>
                <?php if ($userLogado == TRUE) { ?>
                    <a class="btn btn-primary btn-xs" href="javascript:void(0)" onclick="Problema.apoiaComentario('<?php echo $cm->idProblema ?>', '<?php echo $cm->idComentario ?>', '<?php echo $cm->apoiadoComentario ?>')" >
                        <i class="glyphicon glyphicon-thumbs-up"></i>
                        <span class="text-info badge">
                            <?php echo $cm->apoiadoComentario ?>
                        </span> 
                    </a>

                    <a class="btn btn-default btn-xs" href="javascript:void(0)" onclick="Problema.reprovadoComentario('<?php echo $cm->idProblema ?>', '<?php echo $cm->idComentario ?>', '<?php echo $cm->reprovadoComentario ?>')"  >
                        <i class="glyphicon glyphicon-thumbs-down"></i>
                        <span class="text-error badge">
                            <?php echo $cm->reprovadoComentario ?>
                        </span> 
                    </a>

                <?php } else { ?>
                    <a href="javascript:void(0)" onclick="alert('Desculpe, Você não esta logado!')"  ><i class="icon-thumbs-up"></i></a> <span class="text-info"> <?php echo $cm->apoiadoComentario ?></span>  |<a href="javascript:void(0)" onclick="alert('Desculpe, Você não esta logado!')" ><i class="icon-thumbs-down"></i></a> <span class="text-error"><?php echo $cm->reprovadoComentario ?></span> 
                <?php } ?>
            </div>
            <?php
        }
    }
    ?>
</div>
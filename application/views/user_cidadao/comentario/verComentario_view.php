<?php
foreach ($comentarios as $cm) {

    if (($cm->nomeCidadao != null) || ($cm->nomeCidadao != '')) {

        $data = explode('-', $cm->dataComentario);
        $dataBrasil = $data[2] . '/' . $data[1] . '/' . $data[0];
        ?>
        <div class="thumbnail"><strong>
                <?php echo $cm->nomeCidadao ?></strong><span class='pull-right'> <?php echo $dataBrasil ?></span>
            <br/>
            <?php echo $cm->textoComentario ?>
            </br>
            <?php if ($userLogado == TRUE) { ?>
                <a href="javascript:void(0)" onclick="Problema.apoiaComentario('<?php echo $cm->idProblema ?>', '<?php echo $cm->idComentario ?>', '<?php echo $cm->apoiadoComentario ?>')" >
                    <i class="icon-thumbs-up"></i>
                </a>
                <span class="text-info">
                    <?php echo $cm->apoiadoComentario ?>
                </span> 
                |<a href="javascript:void(0)" onclick="Problema.reprovadoComentario('<?php echo $cm->idProblema ?>', '<?php echo $cm->idComentario ?>', '<?php echo $cm->reprovadoComentario ?>')"  >
                    <i class="icon-thumbs-down"></i>
                </a>
                <span class="text-error">
                    <?php echo $cm->reprovadoComentario ?>
                </span> 
            <?php } else { ?>
                <a href="javascript:void(0)" onclick="alert('Desculpe, Você não esta logado!')"  ><i class="icon-thumbs-up"></i></a> <span class="text-info"> <?php echo $cm->apoiadoComentario ?></span>  |<a href="javascript:void(0)" onclick="alert('Desculpe, Você não esta logado!')" ><i class="icon-thumbs-down"></i></a> <span class="text-error"><?php echo $cm->reprovadoComentario ?></span> 
                <?php } ?>
        </div>
    <?php }
}
?>

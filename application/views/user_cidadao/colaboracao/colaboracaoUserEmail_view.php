<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

    <h4 class="modal-title">Problema urbano</h4>
</div>
<div class="modal-body">
    <?php foreach ($colaboracao as $cl) { ?>
        <div style="font-size: 12;">
            <strong class="tituloProblema"> <img src="<?php echo base_url('icone/icone' . $cl->idTipo . '.png') ?>"/> <?php echo $cl->tipo ?> </strong>
            <span class="pull-right"> <?php echo implode("/", array_reverse(explode("-", $cl->data))) ?></span>
            <br/> <?php echo $cl->descricao ?>
            <br/>
            <strong class="tituloProblema">Situação:</strong>
            <?php echo $cl->nomeStatus ?> 
            <div class="" style="text-align: right"> 
            </div>
        </div>
    <?php } ?>
</div>
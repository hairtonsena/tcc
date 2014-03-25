<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

    <h4 class="modal-title">Entre ou cadastre-se</h4>
</div>
<div class="modal-body">
    <?php if (isset($local)) { 
     
        ?>
        <a href ="javascript:void(0)" onclick="Cadastro.formeCadastroCidadao('<?php echo $local; ?>')" class="btn btn-default pull-right" ><span class="glyphicon glyphicon-list-alt"></span> Cadastrar </a>
        <a href="javascript:void(0)" onclick="Cadastro.formeLoginCidadao('<?php echo $local; ?>')" class="btn btn-default pull-left"><span class="glyphicon glyphicon-log-in"></span> Entrar </a>
    <?php } else {
        ?>
        <a href ="javascript:void(0)" onclick="Cadastro.formeCadastroCidadao('no')" class="btn btn-default pull-right" ><span class="glyphicon glyphicon-list-alt"></span> Cadastrar </a>
        <a href="javascript:void(0)" onclick="Cadastro.formeLoginCidadao('no')" class="btn btn-default pull-left"><span class="glyphicon glyphicon-log-in"></span> Entrar </a>
    <?php } ?> 
</div>
<br/> 

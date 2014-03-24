<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">Alterar Nome</h4>
</div>
<div class="modal-body">
    <form class="form" name="frmLogin" action="asfds" onsubmit="Cadastro.alterarNome();return false" method="post">
            
            <span class="text-danger"> 
                <?php echo validation_errors() ;?>
            </span>
        <div class="form-group">
            <label for="alterarNome"> Alterar Nome: </label>
            <input type="text" id="alterarNome" name="alterarNome" class="form-control" required value="<?php echo $this->session->userdata('nomeCidadao') ?>" />
        </div>
        <div class="form-group">
            <label for="senhaAtual"> Senha Atual: </label>
            <input type="password" id="senhaAtual" name="senhaAtual" maxlength="12" class="form-control" required />
        </div>
            <input type="submit" name="acao" class="btn btn-primary pull-left" value="Salvar"/>
            <a href="javascript:void(0)" onclick="Tela.fecharModal()" class="btn btn-default pull-right" >Cancelar </a>
        
    </form>
</div>
<br/>
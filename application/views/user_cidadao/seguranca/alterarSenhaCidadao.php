<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">Alterar Senha</h4>
</div>
<div class="modal-body">
    <form name="frmLogin" class="form" action="sdf" onsubmit="Cadastro.alterarSenha();return false;" method="post">

            <span class="text-danger"> 
                <?php echo validation_errors() ;?>
            </span>
        <div class="form-group">
            <label for="senhaAlrual" > Senha Atual: </label>
            <input type="password" id="senhaAtual" name="senhaAtual" maxlength="20" class="form-control" required />
        </div>
        <div class="form-group">
            <label for="novaSenha"> Nova Senha: </label>
            <input type="password" id="novaSenha" name="novaSenha" maxlength="20" class="form-control" required /> 
        </div>
        <div class="form-group">
            <label for="confirmarNovaSenha"> Confirmar Nova Senha: </label>
            <input type="password" id="confirmarNovaSenha" name="confirmarNovaSenha" maxlength="20" class="form-control" required />
        </div>
            <input type="submit" name="acao" class="btn btn-primary pull-left" value="Salvar"/>
            <a href="javascript:void(0)" onclick="Tela.fecharModal()" class="btn btn-default pull-right" >Cancelar </a>

        
    </form>
</div>
<br/>
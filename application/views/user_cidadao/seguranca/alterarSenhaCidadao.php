<span class="pull-right"><a href="javascript:void(0)" onclick="Tela.fecharModal()"><i class="icon-remove"></i></a></span><br/>

<div class="thumbnail" style="background-color: #eee;" id="pnlLogin">
    <form name="frmLogin" action="sdf" onsubmit="Cadastro.alterarSenha();return false;" method="post">
        <fieldset>
            <legend> Alterar Senha </legend>
            <span class="text-error"> 
                <?php echo validation_errors() ;?>
            </span>
            <label> Senha Atual: </label>
            <input type="password" id="senhaAtual" name="senhaAtual" maxlength="20" class="span3" required /><br/>
            <label> Nova Senha: </label>
            <input type="password" id="novaSenha" name="novaSenha" maxlength="20" class="span3" required /><br/>                       
            <label> Confirmar Nova Senha: </label>
            <input type="password" id="confirmarNovaSenha" name="confirmarNovaSenha" maxlength="20" class="span3" required /><br/>

            <input type="submit" name="acao" class="btn btn-primary pull-left" value="Salvar"/>
            <a href="javascript:void(0)" onclick="Tela.fecharModal()" class="btn pull-right" >Cancelar </a>

        </fieldset>
    </form>
</div>
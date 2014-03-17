<span class="pull-right"><a href="javascript:void(0)" onclick="Tela.fecharModal()"><i class="icon-remove"></i></a></span><br/>

<div class="thumbnail " style="background-color: #eee;" id="pnlLogin">
    <form name="frmLogin" action="asfds" onsubmit="Cadastro.alterarNome();return false" method="post">
        <fieldset>
            <legend> Alterar Senha </legend>
            <span class="text-error"> 
                <?php echo validation_errors() ;?>
            </span>

            <label> Alterar Nome: </label>
            <input type="text" id="alterarNome" name="alterarNome" class="span3" required value="<?php echo $this->session->userdata('nomeCidadao') ?>" /><br/>
            <label> Senha Atual: </label>
            <input type="password" id="senhaAtual" name="senhaAtual" maxlength="12" class="span3" required /><br/>
            <input type="submit" name="acao" class="btn btn-primary pull-left" value="Salvar"/>
            <a href="javascript:void(0)" onclick="Tela.fecharModal()" class="btn pull-right" >Cancelar </a>
        </fieldset>
    </form>
</div>
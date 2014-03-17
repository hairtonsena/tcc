<span class="pull-right"><a href="javascript:void(0)" onclick="Tela.fecharModal()"><i class="icon-remove"></i></a></span><br/>

<div class="thumbnail" style="background-color: #eee;" id="pnlLogin">
    <form name="frmLogin" action="asdf" onsubmit="Cadastro.VerificarUserCidadao(); return false;" method="post">
        <fieldset>

            <legend> Login Cidadão </legend>
            <span class="text-error"> 
            <?php echo validation_errors(); ?>
            </span>
            <label> Email: </label>
            <input type="email" name="email" id="email" class="span3" value="<?php echo set_value('email') ?>" required /><br/>
            <label> Senha: </label>
            <input type="password" name="senha" id="senha" class="span3" required />
            <span ><a href="javascript:void(0)" onclick="Cadastro.gerarNovaSenha()"> Esquece minha senha. </a></span>
            <br/>
            <br/>
            <label>Codigo de Validação:</label>
            <?php echo $imagemCaptcha ?>
            <input type="text" name="textoImagem" id="textoImagem" class="input-small" required />
            <br/>
            <br/>
            <input type="submit" name="acao" class="btn pull-left btn-primary" value="Entrar"/> <button type="button" class="btn pull-right" onclick="Tela.fecharModal()">Cancelar</button>

        </fieldset>
    </form>
</div>
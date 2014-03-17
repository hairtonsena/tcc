<span class="pull-right"><a href="javascript:void(0)" onclick="Tela.fecharModal()"><i class="icon-remove"></i></a></span><br/>
<div class="thumbnail " style="background-color: #eee;" id="pnlLogin">
    <form name="frmLogin" action="kdksd" onsubmit="Cadastro.gerarNovaSenhaEXE(); return false" method="post">
        <fieldset>
            <legend> Gerar Nova Senha </legend>
            <span >
            </span>
            <label> Email: </label>
            <input type="email" id="email" name="email" class="span3" required /><br/>
            <input type="submit" name="acao" class="btn pull-left btn-primary" value="Gerar Senha"/>
            <button type="button" class="btn pull-right" onclick="Tela.fecharModal()">Cancelar </a>
        </fieldset>
    </form>
</div>
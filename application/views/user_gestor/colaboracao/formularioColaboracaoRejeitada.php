<span class="pull-right"><a href="javascript:void(0)" onclick="Tela.fecharModal()"><i class="icon-remove"></i></a></span><br/>

<div class="thumbnail " style="background-color: #eee;" id="pnlLogin">

    <form action="#" onsubmit="return Problema.rejeitarColaboracao()" method="post">
        <fieldset>
            <legend> Rejeitar Colaboração </legend>
            <label>Mensagens Para o usuario</label>
            <textarea rows="4" name="textoUsuario" id="textoUsuario" class="span3" >Sua colaboração rejeitado por não respeitar os termos de uso. Grato</textarea>
            <input type="hidden" name="idProblema" id="idProblema" value="<?php echo $idProblema ?>" />
            <br/>
            <button class="btn pull-left btn-primary" type="submit"> Enviar </button> <button type="button" onclick="Tela.fecharModal()" class="btn pull-right">Cancelar</button>
        </fieldset>

    </form>
</div>
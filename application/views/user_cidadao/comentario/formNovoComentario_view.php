<span class="pull-right"><a href="javascript:void(0)" onclick="Tela.fecharModal()"><i class="icon-remove"></i></a></span><br/>
<div  class="thumbnail" style="background-color: #eee;">
<form name="frmComentarProblema" method="post" action="salvar.php" onsubmit="return Problema.salvarComentario()">
    <fieldset>
        <input type="hidden" id="idProblema" nome="idProblema" value="<?php echo $idProblema ?>">
        <legend> Comentario </legend> 
        <textarea id="comentario" nome="comentario" rows="4" class="span3" required="true" placeholder="Comentario ..."></textarea>
        <br/>
        <button type="submit" class="btn btn-primary">Salvar </button> <button type="button" onclick="Tela.fecharModal()" class="btn pull-right">Cancelar</button>
    </fieldset>
</form>
</div>

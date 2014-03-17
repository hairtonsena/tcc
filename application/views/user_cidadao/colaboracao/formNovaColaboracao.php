<span class="pull-right"><a href="javascript:void(0)" onclick="Tela.fecharModal()"><i class="icon-remove"></i></a></span><br/>
<div class="thumbnail" style="background-color: #eee;">
<form name="frmNovoProblema" method="post" action="salvar.php" onsubmit="return Problema.salvarProblema()">
    <fieldset>
        <legend>Novo Problema</legend>
        <label> Tipo de Problema </label>
        <select id="tipo" name="tipo" class="span3">
            <?php foreach ($tipo as $ti) { ?>
                <option value=" <?php echo $ti->idTipo ?>"> <?php echo $ti->tipo ?></option>
            <?php } ?>  
        </select>	
        <input type="hidden" id="latitude" nome="latitude" value="<?php echo $latitude ?>">
        <input type="hidden" id="longitude" nome="longitude" value="<?php echo $longitude ?>">
        <label>Descrição do problema</label>
        <textarea id="descricao" nome="descricao" rows="4" class="span3" required="true" placeholder="Descrição ..."></textarea>
        <br/>
        <button type="submit" class="btn pull-left btn-primary">Salvar </button> <button type="button" onclick="Tela.fecharModal()" class="btn pull-right">Cancelar</button>
    </fieldset>
</form>
</div>
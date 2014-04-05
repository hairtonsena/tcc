<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title"> Nova Colaboração</h4>
</div>
<div class="modal-body">
    <form name="frmNovoProblema" class="form" method="post" action="salvar.php" onsubmit="return Problema.salvarProblema()">
        <div class="form-group">
        <label for="tipo"> Tipo de Problema </label>
        <select id="tipo" name="tipo" class="form-control">
            <?php foreach ($tipo as $ti) { ?>
                <option value=" <?php echo $ti->idTipo ?>"> <?php echo $ti->tipo ?></option>
            <?php } ?>  
        </select>	
        </div>
        <input type="hidden" id="latitude" nome="latitude" value="<?php echo $latitude ?>">
        <input type="hidden" id="longitude" nome="longitude" value="<?php echo $longitude ?>">
        <div class="form-group">
            <label for="descricao">Descrição do problema</label>
        <textarea id="descricao" nome="descricao" rows="4" class="form-control" required="true" placeholder="Descrição ..."></textarea>
        </div>
        <button type="submit" class="btn btn-default pull-left btn-primary">Salvar </button> <button type="button" onclick="Tela.fecharModal()" class="btn pull-right">Cancelar</button>
    
</form>
</div>
<br/>
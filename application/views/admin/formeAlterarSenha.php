<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">Alterar Senha </h4>
</div>
<div class="modal-body">
    <form onsubmit="Gestor.alterarSenha(); return false;">
        <?php foreach ($gestor as $gt) { ?>
            <input type="hidden" class="form-control" name="idGestor" id="idGestor" value="<?php echo $gt->idGestor ?>"/>

            <div class="form-group">
                <label for="senhaGestor">Nova senha :</label>
                <input type="password" class="form-control" required placeholder="********" name="senhaGestor" id="senhaGestor" value=""/> 
                <span class="text-danger">
                    <?php echo form_error('senhaGestor') ?>
                </span>
            </div>
            <div class="form-group">
                <label for="senhaAtual">Senha atual:</label>
                <input type="password" class="form-control" required placeholder="********" name="senhaAtual" id="senhaAtual" value=""/> 
                <span class="text-danger">
                    <?php echo form_error('senhaAtual') ?>
                </span>
            </div>
            <input type="submit" class="form-control btn btn-primary " value="Salvar"/>
            <input type="button" onclick="Tela.fecharModal()" class="form-control btn btn-default btn-cancelar" value="Cancelar"/>
        <?php } ?>

    </form>
</div> 

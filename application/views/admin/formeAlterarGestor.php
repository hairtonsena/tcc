<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title"> Alterar Nome </h4>
</div>
<div class="modal-body">
    <form onsubmit="Problema.alterarGestor(); return false;">
        <?php foreach ($gestor as $gt) { ?>
            <input type="hidden" class="span4" name="idGestor" id="idGestor" value="<?php echo $gt->idGestor ?>"/>

            <div class="form-group">
                <label for="nomeGestor">Nome :</label>

                <input type="text" class="form-control" placeholder="José Sobrenome" required name="nomeGestor" id="nomeGestor" value="<?php echo $gt->nomeGestor ?>"/> 
                <span class="text-danger">
                    <?php echo form_error('nomeGestor') ?>
                </span>
            </div> 

            <div class="form-group">
                <label for="emailGestor"> Email :</label>
                <input type="email" class="form-control" placeholder="email@site.com" required name="emailGestor" id="emailGestor" value="<?php echo $gt->emailGestor ?>"/> 
                <span class="text-danger">
                    <?php echo form_error('emailGestor') ?>
                </span>
            </div>

            <input type="submit" class="btn btn-primary form-control" value="Salvar"/>
            <input type="button" onclick="Gestor.editarGestor()" class="btn btn-default btn-cancelar form-control" value="Cancelar"/>
        <?php } ?>

    </form>
</div> 

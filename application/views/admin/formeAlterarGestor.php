<div class="col-sm-4">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Alterar nome
        </div>
        <div class="panel-body">
            <form onsubmit="Gestor.alterarGestor(); return false;">
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
                        <label for="emailGestor"> E-mail :</label>
                        <input type="email" class="form-control" placeholder="email@site.com" required name="emailGestor" id="emailGestor" value="<?php echo $gt->emailGestor ?>"/> 
                        <span class="text-danger">
                            <?php echo form_error('emailGestor') ?>
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="senhaAtual">Senha atual:</label>
                        <input type="password" class="form-control" maxlength="20" required placeholder="********" name="senhaAtual" id="senhaAtual" value=""/> 
                        <span class="text-danger">
                            <?php echo form_error('senhaAtual') ?>
                        </span>
                    </div>

                    <input type="submit" class="btn btn-primary form-control" value="Salvar"/>
                    <input type="button" onclick="Gestor.editarGestor()" class="btn btn-default btn-cancelar form-control" value="Cancelar"/>
                <?php } ?>

            </form>
        </div> 
    </div>
</div>

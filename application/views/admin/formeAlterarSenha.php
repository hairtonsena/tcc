<div class="col-sm-4">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Alterar senha
        </div>
        <div class="panel-body">
            <form name="frmLogin" class="form" action="sdf" onsubmit="Gestor.alterarSenhaGestor();return false;" method="post">
                <?php foreach ($gestor as $gt) { ?>
                    <input type="hidden" class="form-control" name="idGestor" id="idGestor" value="<?php echo $gt->idGestor ?>"/>

                    <div class="form-group">
                        <label for="senhaGestor">Nova senha :</label>
                        <input type="password" class="form-control" maxlength="20" required placeholder="********" name="senhaGestor" id="senhaGestor" value=""/> 
                        <span class="text-danger">
                            <?php echo form_error('senhaGestor') ?>
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="senhaAtual">Senha atual:</label>
                        <input type="password" class="form-control" maxlength="20" required placeholder="********" name="senhaAtual" id="senhaAtual" value=""/> 
                        <span class="text-danger">
                            <?php echo form_error('senhaAtual') ?>
                        </span>
                    </div>
                    <input type="submit" class="form-control btn btn-primary " value="Salvar"/>
                    <input type="button" onclick="Gestor.editarGestor()" class="form-control btn btn-default btn-cancelar" value="Cancelar"/>
                <?php } ?>

            </form>
        </div>
    </div>
</div>

<div class="col-sm-4">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Alterar Senha Gestor
        </div>
        <div class="panel-body">
            <form onsubmit="Gestor.alterarSenha(); return false;">
                <?php foreach ($gestor as $gt) { ?>
                    <input type="hidden" class="form-control" name="idGestor" id="idGestor" value="<?php echo $gt->idGestor ?>"/>

                    <div class="form-group">
                        <label for="senhaGestor">Senha :</label>
                        <input type="password" class="form-control" required placeholder="********" name="senhaGestor" id="senhaGestor" value=""/> 
                        <span class="text-danger">
                            <?php echo form_error('senhaGestor') ?>
                        </span>
                    </div>
                    <input type="submit" class="form-control btn btn-primary " value="Salvar"/>
                    <input type="button" onclick="Gestor.editarGestor()" class="form-control btn btn-default btn-cancelar" value="Cancelar"/>
                <?php } ?>

            </form>
        </div> 

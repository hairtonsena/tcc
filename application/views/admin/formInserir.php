<div class="col-sm-4">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Inserir Gestor
        </div>
        <div class="panel-body">
            <form onsubmit="Gestor.inserirGestor(); return false;">
                <div class="form-group">
                    <label for="nomeGestor">Nome :</label>
                    <input type="text" class="form-control" placeholder="José Sobrenome" required name="nomeGestor" id="nomeGestor" value="<?php echo set_value("nomeGestor") ?>"/> 
                    <span class="text-danger">
                        <?php echo form_error('nomeGestor') ?>
                    </span>
                </div>
                <div class="form-group">
                    <label for="cpfGestor">CPF :</label>
                    <input type="text" class="form-control" placeholder="99999999999" pattern="[0-9]{11}" maxlength="11" required name="cpfGestor" id="cpfGestor" value="<?php echo set_value("cpfGestor") ?>"/> 
                    <span class="text-danger">
                        <?php echo form_error('cpfGestor') ?>
                    </span>
                </div>


                <div class="form-group">
                    <label for="emailGestor"> Email :</label>
                    <input type="email" class="form-control" placeholder="email@site.com" required name="emailGestor" id="emailGestor" value="<?php echo set_value("emailGestor") ?>"/> 
                    <span class="text-danger">
                        <?php echo form_error('emailGestor') ?>
                    </span>                
                </div>
                <div class="form-group">
                    <label for="senhaGestor"> Senha :</label>
                    <input type="password" placeholder="********" class="form-control" required name="senhaGestor" id="senhaGestor" value=""/>
                    <span class="text-danger">
                        <?php echo form_error('senhaGestor') ?>
                    </span>
                </div>
                <input type="submit" class="btn btn-primary form-control" value="Salvar"/>
                <input type="button" onclick="Gestor.editarGestor()" class="btn btn-default btn-cancelar form-control" value="Cancelar"/>
            </form>
        </div>
    </div> 
</div>

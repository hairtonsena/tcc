<div class="span4 thumbnail">
    <form onsubmit="Gestor.inserirGestor(); return false;">
        <fieldset>
            <legend> Inserir Gestor </legend>
            <span class="text-error">
                <?php echo form_error('nomeGestor') ?>
            </span>
            <label>Nome :</label>
            <input type="text" class="span4" placeholder="José Sobrenome" required name="nomeGestor" id="nomeGestor" value="<?php echo set_value("nomeGestor") ?>"/> 
            <span class="text-error">
                <?php echo form_error('cpfGestor') ?>
            </span>
            <label>CPF :</label>
            <input type="text" class="span4 error" placeholder="99999999999" pattern="[0-9]{11}" maxlength="11" required name="cpfGestor" id="cpfGestor" value="<?php echo set_value("cpfGestor") ?>"/> 
            <span class="text-error">
                <?php echo form_error('emailGestor') ?>
            </span>
            <label> Email :</label>
            <input type="email" class="span4" placeholder="email@site.com" required name="emailGestor" id="emailGestor" value="<?php echo set_value("emailGestor") ?>"/> 
            <span class="text-error">
                <?php echo form_error('senhaGestor') ?>
            </span>
            <label> Senha :</label>
            <input type="password" placeholder="********" class="span4" required name="senhaGestor" id="senhaGestor" value=""/>
            <br/>
            <input type="submit" class="btn btn-primary pull-right" value="Salvar"/>

        </fieldset>
    </form>
</div> 

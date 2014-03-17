<div class="span4 thumbnail">
    <form onsubmit="Gestor.alterarSenha();
            return false;">
        <fieldset>
<?php foreach ($gestor as $gt) { ?>
                <legend> Alterar Senha Gestor </legend>
                <span class="text-error">
    <?php echo form_error('senhaGestor') ?>
                </span>
                <label>Senha :</label>
                <input type="password" class="span4" required placeholder="********" name="senhaGestor" id="senhaGestor" value=""/> 
                <input type="hidden" class="span4" name="idGestor" id="idGestor" value="<?php echo $gt->idGestor ?>"/>
                <br/>
                <input type="submit" class="btn btn-primary pull-right" value="Salvar"/>
<?php } ?>
        </fieldset>
    </form>
</div> 

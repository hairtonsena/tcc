<div class="span4 thumbnail">
    <form onsubmit="Gestor.alterarGestor(); return false;">
        <fieldset>
            <?php foreach ($gestor as $gt) { ?>
                <legend> Alterar Dados Gestor </legend>
                <span class="text-error">
                    <?php echo form_error('nomeGestor') ?>
                </span>
                <label>Nome :</label>
                <input type="hidden" class="span4" name="idGestor" id="idGestor" value="<?php echo $gt->idGestor ?>"/>
                <input type="text" class="span4" placeholder="José Sobrenome" required name="nomeGestor" id="nomeGestor" value="<?php echo $gt->nomeGestor ?>"/> 
                <span class="text-error">
                    <?php echo form_error('cpfGestor') ?>
                </span>
                <label>CPF :</label>
                <input type="text" class="span4" placeholder="99999999999" required name="cpfGestor" id="cpfGestor" value="<?php echo $gt->cpfGestor ?>"/> 
                <span class="text-error">
                    <?php echo form_error('emailGestor') ?>
                </span>
                <label> Email :</label>
                <input type="email" class="span4" placeholder="email@site.com" required name="emailGestor" id="emailGestor" value="<?php echo $gt->emailGestor ?>"/> 
                <br/>
                <input type="submit" class="btn btn-primary pull-right" value="Salvar"/>
            <?php } ?>
        </fieldset>
    </form>
</div> 

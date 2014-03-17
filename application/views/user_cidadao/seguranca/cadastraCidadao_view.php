<span class="pull-right"><a href="javascript:void(0)" onclick="Tela.fecharModal()"><i class="icon-remove"></i></a></span><br/>
<div class="thumbnail" style="background-color: #eee;">
    <form name="formeCadastrarCidadao" method="post" onsubmit="Cadastro.validarFormularioCadastro();
            return false" action="<?php echo base_url() ?>seguranca/cadastraCidadaoEXE">
        <fieldset>
            <legend> Cadastro Cidadão </legend>
            <span class="text-error" id="MensagemErro">
                <?php echo form_error('nomeCidadaoCadastro'); ?>
            </span>
            <label>Nome:</label>
            <input type="text" required class="span3" id="nomeCidadaoCadastro" name="nomeCidadaoCadastro" value="<?php echo set_value('nomeCidadaoCadastro'); ?>" />
            <span class="text-error" id="MensagemErro">
                <?php echo form_error('cpfCidadaoCadastro'); ?>
            </span>
            <label>CPF:</label>
            <input type="text" required pattern="[0-9]{11}" class="span3" id="cpfCidadaoCadastro" name="cpfCidadaoCadastro" value="<?php echo set_value('cpfCidadaoCadastro'); ?>" />
            <span class="text-error" id="MensagemErro">
                <?php echo form_error('emailCidadaoCadastro'); ?>
            </span>
            <label>Email:</label>
            <input type="email" required  class="span3" id="emailCidadaoCadastro" name="emailCidadaoCadastro" value="<?php echo set_value('emailCidadaoCadastro'); ?>"/>
            <span class="text-error" id="MensagemErro">
                <?php echo form_error('senhaCidadaoCadastro'); ?>
            </span>
            <label>Senha:</label>
            <input type="password" required maxlength="12" class="span3" id="senhaCidadaoCadastro" name="senhaCidadaoCadastro" value="" />
            <span class="text-error" id="MensagemErro">
                <?php echo form_error('confirmaSenhaCidadaoCadastro'); ?>
            </span>
            <label>Confirmar Senha:</label>
            <input type="password" required maxlength="12" class="span3" id="confirmaSenhaCidadaoCadastro" name="confirmaSenhaCidadaoCadastro" value="" />
            <br/>
            <button class="btn btn-primary pull-left" type="submit" > Castastrar </button><button class="btn pull-right" type="button" onclick="Tela.fecharModal()" > Cancelar </button>
        </fieldset>
    </form>                                        
</div>

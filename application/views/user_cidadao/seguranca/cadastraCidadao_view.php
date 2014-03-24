<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

    <h4 class="modal-title">Cadastro Cidadão</h4>
</div>
<div class="modal-body">

          <form class="form" name="formeCadastrarCidadao" method="post" onsubmit="Cadastro.validarFormularioCadastro();
              return false" action="<?php echo base_url("seguranca/cadastraCidadaoEXE") ?>">
        <div class="form-group">
            <span class="text-danger" id="MensagemErro">
                <?php echo form_error('nomeCidadaoCadastro'); ?>
            </span>
            <label for="nomeCidadaoCadastro">Nome:</label>
            <input type="text" required class="form-control" id="nomeCidadaoCadastro" name="nomeCidadaoCadastro" value="<?php echo set_value('nomeCidadaoCadastro'); ?>" />
        </div>
        <div class="form-group">
            <span class="text-danger" id="MensagemErro">
                <?php echo form_error('cpfCidadaoCadastro'); ?>
            </span>
            <label for="cpfCidadaoCadastro">CPF:</label>
            <input type="text" required pattern="[0-9]{11}" class="form-control" id="cpfCidadaoCadastro" name="cpfCidadaoCadastro" value="<?php echo set_value('cpfCidadaoCadastro'); ?>" />
        </div>
        <div class="form-group">
            <span class="text-danger" id="MensagemErro">
                <?php echo form_error('emailCidadaoCadastro'); ?>
            </span>
            <label for="emailCidadaoCadastro">Email:</label>
            <input type="email" required  class="form-control" id="emailCidadaoCadastro" name="emailCidadaoCadastro" value="<?php echo set_value('emailCidadaoCadastro'); ?>"/>
        </div>
        <div class="form-group">
            <span class="text-danger" id="MensagemErro">
                <?php echo form_error('senhaCidadaoCadastro'); ?>
            </span>
            <label for="senhaCidadaoCadastro">Senha:</label>
            <input type="password" required maxlength="12" class="form-control" id="senhaCidadaoCadastro" name="senhaCidadaoCadastro" value="" />
        </div>
        <div class="form-group">
            <span class="text-danger" id="MensagemErro">
                <?php echo form_error('confirmaSenhaCidadaoCadastro'); ?>
            </span>
            <label for="confirmaSenhaCidadaoCadastro">Confirmar Senha:</label>
            <input type="password" required maxlength="12" class="form-control" id="confirmaSenhaCidadaoCadastro" name="confirmaSenhaCidadaoCadastro" value="" />
        </div>
        <button class="btn btn-primary pull-left" type="submit" > Castastrar </button><button class="btn btn-default pull-right" type="button" onclick="Tela.fecharModal()" > Cancelar </button>
    </form>                                        
</div>
<br/>
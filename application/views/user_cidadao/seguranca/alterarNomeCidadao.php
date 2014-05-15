<script>
    $('#alterarNome').keydown(function(e) {
        // if(e.shiftKey) e.preventDefault();    // Verifica se o shift esta precionado.
        if (!((e.keyCode == 46) || (e.keyCode == 8) || (e.keyCode == 9) || (e.keyCode == 186) || (e.keyCode == 32) 		//DEL, TAB, Ç, space e Backspace
                || ((e.keyCode >= 35) && (e.keyCode <= 40)) 	//HOME, END, Setas
                || ((e.keyCode >= 65) && (e.keyCode <= 90))     // A-Z ,a-z
                // || ((e.keyCode>=48) && (e.keyCode<=57))
                )
                )
            e.preventDefault(); //Números
    });
</script>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">Alterar nome</h4>
</div>
<div class="modal-body">
    <form class="form" name="frmLogin" action="asfds" onsubmit="Cadastro.alterarNome();
        return false" method="post">

        <span class="text-danger"> 
            <?php echo validation_errors(); ?>
        </span>
        <div class="form-group">
            <label for="alterarNome"> Alterar nome: </label>
            <input type="text" id="alterarNome" name="alterarNome" placeholder="Alterar nome." class="form-control" required value="<?php echo $this->session->userdata('nomeCidadao') ?>" />
        </div>
        <div class="form-group">
            <label for="senhaAtual"> Senha atual: </label>
            <input type="password" id="senhaAtual" name="senhaAtual" placeholder="********" maxlength="12" class="form-control" required />
        </div>
        <input type="submit" name="acao" class="btn btn-primary pull-left" value="Salvar"/>
        <a href="javascript:void(0)" onclick="Tela.fecharModal()" class="btn btn-default pull-right" >Cancelar </a>

    </form>
</div>
<br/>
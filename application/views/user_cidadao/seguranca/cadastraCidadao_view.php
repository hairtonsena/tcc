<script>

    
//        $(function(){
//            $('#emailCidadaoCadastro').bind('keydown',soNums123); // o "#input" é o input que vc quer aplicar a funcionalidade
//          
//        });
  
    $('#cpfCidadaoCadastro').keydown(function(e) {
        if(e.shiftKey) e.preventDefault();    // Verifica se o shift esta precionado.
        if (
            !((e.keyCode==46) || (e.keyCode==8)||(e.keyCode==9) 		//DEL, TAB e Backspace
            || ((e.keyCode>=35) && (e.keyCode<=40)) 	//HOME, END, Setas
            || ((e.keyCode>=96) && (e.keyCode<=105)) //Númerod Pad
            || ((e.keyCode>=48) && (e.keyCode<=57))) //Números
    ) e.preventDefault(); 
    });
    
    $('#nomeCidadaoCadastro').keydown(function(e) {
        // if(e.shiftKey) e.preventDefault();    // Verifica se o shift esta precionado.
        if (!((e.keyCode==46) || (e.keyCode==8)||(e.keyCode==9)||(e.keyCode==186)||(e.keyCode==32) 		//DEL, TAB, Ç, space e Backspace
            || ((e.keyCode>=35) && (e.keyCode<=40)) 	//HOME, END, Setas
            || ((e.keyCode>=65) && (e.keyCode<=90))     // A-Z ,a-z
        // || ((e.keyCode>=48) && (e.keyCode<=57))
    )
    ) e.preventDefault(); //Números
    });
    
    $('#emailCidadaoCadastro').keydown(function(e) {
        if(e.shiftKey){
            if(!((e.keyCode==50)||(e.keyCode==189)))
            e.preventDefault()
        };
        //{ };
        
        if (!((e.keyCode==46) || (e.keyCode==8)||(e.keyCode==9)||(e.keyCode==186)||(e.keyCode==190)||(e.keyCode==189) //		//DEL, TAB, Ç, ponto e Backspace
            || ((e.keyCode>=35) && (e.keyCode<=40)) 	//HOME, END, Setas
            || ((e.keyCode>=65) && (e.keyCode<=90)) // A-Z ,a-z
            || ((e.keyCode>=96) && (e.keyCode<=105)) //Númerod Pad
            || ((e.keyCode>=48) && (e.keyCode<=57)) // Número
    )
    ) e.preventDefault(); //Números
    });
 
    function soNums123(e){
 

        var resultado="";
        for (propriedade in e) {
            resultado += propriedade + ": " + e[propriedade] + "\n"; 
        };
        alert(resultado);
     
        //Verifica se a tecla digitada é permitida
        if ($.inArray(keyCode,keyCodesPermitidos) != -1){
            return true;
        }    
        return false;
    }

</script>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

    <h4 class="modal-title">Cadastro cidadão</h4>
</div>
<div class="modal-body">

          <form class="form" name="formeCadastrarCidadao" method="post" onsubmit="Cadastro.validarFormularioCadastro();
        return false" action="<?php echo base_url("seguranca/cadastraCidadaoEXE") ?>">
        <div class="form-group">

            <label for="nomeCidadaoCadastro">Nome:</label>
            <div class="input-group">
                <input type="text" required="true" placeholder="Informe seu nome" title="Informe seu nome" class="form-control" id="nomeCidadaoCadastro" name="nomeCidadaoCadastro" value="<?php echo set_value('nomeCidadaoCadastro'); ?>" />
                <span class="input-group-addon" title="Campo obrigatorio">*</span>
            </div>
            <span class="text-danger" id="MensagemErro">
                <?php echo form_error('nomeCidadaoCadastro'); ?>
            </span>    
        </div>
        <div class="form-group">
            <label for="cpfCidadaoCadastro">CPF:</label>
            <div class="input-group">
                <input type="text" required="true" pattern="[0-9]{11}" maxlength="11" placeholder="Informe seu CPF" title="Informe seu CPF" class="form-control" id="cpfCidadaoCadastro" name="cpfCidadaoCadastro" value="<?php echo set_value('cpfCidadaoCadastro'); ?>" />
                <span class="input-group-addon" title="Campo obrigatorio">*</span>
            </div>
            <p class="help-block">Somente números.</p>   
            <span class="text-danger" id="MensagemErro">
                <?php echo form_error('cpfCidadaoCadastro'); ?>
            </span>   
        </div>
        <div class="form-group">

            <label for="emailCidadaoCadastro">E-mail:</label>
            <div class="input-group">
                <input type="email" required placeholder="Seu e-mail" title="informe seu e-mail" class="form-control" id="emailCidadaoCadastro" name="emailCidadaoCadastro" value="<?php echo set_value('emailCidadaoCadastro'); ?>"/>
                <span class="input-group-addon" title="Campo obrigatorio">*</span>
            </div>  
            <span class="text-danger" id="MensagemErro">
                <?php echo form_error('emailCidadaoCadastro'); ?>
            </span>
        </div>
        <div class="form-group">

            <label for="senhaCidadaoCadastro">Senha:</label>
            <div class="input-group">
                <input type="password" required maxlength="20" placeholder="********" title="Informe uma senha" class="form-control" id="senhaCidadaoCadastro" name="senhaCidadaoCadastro" value="" />
                <span class="input-group-addon" title="Campo obrigatorio">*</span>
            </div>
            <span class="text-danger" id="MensagemErro">
                <?php echo form_error('senhaCidadaoCadastro'); ?>
            </span> 
        </div>
        <div class="form-group">

            <label for="confirmaSenhaCidadaoCadastro">Confirmar senha:</label>
            <div class="input-group">
                <input type="password" required maxlength="20" placeholder="********" title="Repita a senha informada" class="form-control" id="confirmaSenhaCidadaoCadastro" name="confirmaSenhaCidadaoCadastro" value="" />
                <span class="input-group-addon" title="Campo obrigatorio">*</span>
            </div>
            <span class="text-danger" id="MensagemErro">
                <?php echo form_error('confirmaSenhaCidadaoCadastro'); ?>
            </span>

            <span class="help-block text-danger">( * ) Campos obrigatórios </span>
        </div>
        <button class="btn btn-primary pull-left" type="submit" > Castastrar </button><button class="btn btn-default pull-right" type="button" onclick="Tela.fecharModal()" > Cancelar </button>
    </form>                                        
</div>
<br/>
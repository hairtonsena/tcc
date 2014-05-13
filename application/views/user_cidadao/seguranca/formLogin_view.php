<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

    <h4 class="modal-title">Login</h4>
</div>
<div class="modal-body">

    <form class="form" name="frmLogin" action="#" onsubmit="Cadastro.VerificarUserCidadao(); return false;" method="post">

        <span class="text-danger"> 
            <?php echo validation_errors(); ?>
        </span>
        <div class="form-group">
            <label for="email"> E-mail: </label>
            <input type="email" name="email" id="email" placeholder="E-mail" class="form-control" value="<?php echo set_value('email') ?>" required />
        </div>
        <div class="form-group">
            <label for="senha"> Senha: </label>
            <input type="password" name="senha" id="senha" class="form-control" required />
            <span ><a href="javascript:void(0)" onclick="Cadastro.gerarNovaSenha()"> Esquece minha senha. </a></span>
        </div>
        <div class="form-group">
            <label for="testoImagem" >Código antispam:</label>
            <?php echo $imagemCaptcha ?>
            <input type="text" name="textoImagem" id="textoImagem" class="form-control" required />
        </div>

        <input type="submit" name="acao" class="btn pull-left btn-primary" value="Entrar"/>
        <button type="button" class="btn btn-default pull-right" onclick="Tela.fecharModal()">Cancelar</button>
    </form>
</div>
<br/>
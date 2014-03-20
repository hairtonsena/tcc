<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">Gerar Nova Senha</h4>
</div>
<div class="modal-body">
    <form name="frmLogin" class="form" action="#" onsubmit="Cadastro.gerarNovaSenhaEXE(); return false" method="post">
      
           
        <div class="form-group">
            <label for="email"> Email: </label>
            <input type="email" id="email" name="email" class="form-control" required />
        </div>
            <input type="submit" name="acao" class="btn pull-left btn-primary" value="Gerar Senha"/>
            <button type="button" class="btn btn-default pull-right" onclick="Tela.fecharModal()">Cancelar </a>
 
    </form>
</div>
<br/>
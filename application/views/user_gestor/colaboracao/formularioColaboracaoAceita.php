<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title"> Aceitar Colaboração </h4>
</div>
<div class="modal-body">
    <form action="#" onsubmit="return Problema.aceitaColaboracao()" method="post">
        <input type="hidden" name="idProblema" id="idProblema" value="<?php echo $idProblema ?>" />
        <div class="form-group">
            <label for="textoUsusario">Mensagens para o usuário</label>
            <textarea rows="4" name="textoUsuario" id="textoUsuario" class="form-control" > [usuário], o problema que você nos apresentou foi aceito. Nossa administração estará trabalhando para suas melhorias e satisfações.
A administração pública esta trabalhando para sua satisfação.</textarea>
        </div>

        <button class="btn pull-left btn-primary" type="submit"> Enviar </button> <button type="button" onclick="Tela.fecharModal()" class="btn pull-right">Cancelar</button>
        <br/>

    </form>
</div>  


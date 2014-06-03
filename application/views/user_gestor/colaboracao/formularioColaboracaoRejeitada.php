<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">Rejeitar colaboração </h4>
</div>
<div class="modal-body">

    <form action="#" onsubmit="return Problema.rejeitarColaboracao()" method="post">
        <input type="hidden" name="idProblema" id="idProblema" value="<?php echo $idProblema ?>" />
        <div class="form-group">
            <label>Mensagens para o usuário</label>
            <textarea rows="4" name="textoUsuario" id="textoUsuario" class="form-control" >[usuário], infelizmente o problema urbano que você apresentou foi rejeitado por não estar de acordo com os termos de uso.
Pedimos, por favor, releia os termos de usuário, antes de nos apresentar um novo problema. Agradecemos a sua compreensão.</textarea>
        </div>
        <button class="btn pull-left btn-primary" type="submit"> Enviar </button> <button type="button" onclick="Tela.fecharModal()" class="btn pull-right">Cancelar</button>
        <br/>
    </form>
</div>
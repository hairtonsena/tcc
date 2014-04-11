<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">Rejeitar Colaboração </h4>
</div>
<div class="modal-body">

    <form action="#" onsubmit="return Problema.rejeitarColaboracao()" method="post">
        <input type="hidden" name="idProblema" id="idProblema" value="<?php echo $idProblema ?>" />
        <div class="form-group">
            <label>Mensagens Para o usuario</label>
            <textarea rows="4" name="textoUsuario" id="textoUsuario" class="form-control" >[usuário], infelizmente o problema urbano com o códito [código] foi rejeitado por não respeitar os termos de uso.
Pedimos que leia os temos de usuário antes de reportar um novo problema. Agradecemos a sua compreenção.</textarea>
        </div>
        <button class="btn pull-left btn-primary" type="submit"> Enviar </button> <button type="button" onclick="Tela.fecharModal()" class="btn pull-right">Cancelar</button>
        <br/>
    </form>
</div>
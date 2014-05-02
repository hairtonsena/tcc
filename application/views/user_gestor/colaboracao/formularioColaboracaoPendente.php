<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title"> Tornar Pendente Colaboração </h4>
</div>
<div class="modal-body">

    <form action="#" onsubmit="return Problema.tornaPendenteColaboracao()" method="post">
        <input type="hidden" name="idProblema" id="idProblema" value="<?php echo $idProblema ?>" />
        <div class="form-group">
            <label for="textoUsuario">Mensagens Para o usuario</label>
            <textarea rows="4" name="textoUsuario" id="textoUsuario" class="form-control" >[Usuario], O problema urbando que você reportou não esta claro ou precisa de mais informações. Por favor click no link abaixo para acesse o sistema e complemente seu problema, obrigado</textarea>
        </div>
        <button class="btn pull-left btn-primary" type="submit"> Enviar </button> <button type="button" onclick="Tela.fecharModal()" class="btn pull-right">Cancelar</button>
        <br/>
    </form>
</div>
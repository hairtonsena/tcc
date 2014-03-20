<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title"> Editar Problema Pendente</h4>
</div>
<div class="modal-body">
    <form class="form" name="frmNovoProblema" method="post" action="salvar.php" onsubmit="return Problema.alterarColaboracaoPendente()">
    <?php foreach ($colaboracao as $cl) { ?>
        
        <div class="form-group">
            <label for="tipo"> Tipo de Problema </label>
            <select id="tipo" name="tipo" class="form-control">
                <?php
                foreach ($tipo as $tp) {
                    if ($cl->idTipo == $tp->idTipo) { ?>
                        <option selected="true" value='<?php echo $tp->idTipo ?>'><?php echo  $tp->tipo ?></option>
                  <?php  } else { ?>
                        <option value='<?php echo $tp->idTipo ?>'><?php echo $tp->tipo ?></option>
                   <?php }
                }
                ?>  
            </select>
        </div> 
        <input type="hidden" id="idProblema" nome="idProblema" value="<?php echo $idProblema; ?>">
        <div class="form-group">
           
            <label for="descricao">Descrição do problema</label>
            <textarea id="descricao" nome="descricao" rows="4" class="form-control" required="true" placeholder="Descrição ..."><?php echo $cl->descricao ?></textarea>
        </div>
            
            <button type="submit" class="btn btn-primary">Salvar </button> <button type="button" onclick="Tela.fecharModal()" class="btn btn-default pull-right">Cancelar</button>
        
    <?php }; ?>
</form>
</div>
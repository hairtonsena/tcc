<span class="pull-right"><a href="javascript:void(0)" onclick="Tela.fecharModal()"><i class="icon-remove"></i></a></span><br/>
<div  class="thumbnail" style="background-color: #eee;">
<form name="frmNovoProblema" method="post" action="salvar.php" onsubmit="return Problema.alterarColaboracaoPendente()">
    <?php foreach ($colaboracao as $cl) { ?>
        <fieldset>
            <legend>Editar Problema Pendente</legend>
            <label> Tipo de Problema </label>
            <select id="tipo" name="tipo" class="span3">
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
            <input type="hidden" id="idProblema" nome="idProblema" value="<?php echo $idProblema; ?>">
            <label>Descrição do problema</label>
            <textarea id="descricao" nome="descricao" rows="4" class="span3" required="true" placeholder="Descrição ..."><?php echo $cl->descricao ?></textarea>
            <br/>
            <button type="submit" class="btn btn-primary">Salvar </button> <button type="button" onclick="Tela.fecharModal()" class="btn btn-small">Cancelar</button>
        </fieldset>
    <?php }; ?>
</form>
</div>
<h2>Gestor</h2>
<table class="col-lg-12 thumbnail table table-striped">
    
    <thead>
        <tr>
            <th> Nome </th>
            <!--<th> CPF </th>-->
            <th> Email</th>
            <th> Alterar Senha</th>                
            <th> Alterar Dados</th>
            <!--<th> Excluir </th>-->
            <!--<th> Bloqueio </th>-->
        </tr>
    </thead>
    <tbody>
        <?php foreach ($gestor as $gt) { ?>
            <tr>
                <td><?php echo $gt->nomeGestor ?></td>
                <!--<td><?php // echo $gt->cpfGestor ?></td>-->
                <td><?php echo $gt->emailGestor ?></td>
                <td><button class="btn btn-default" onclick="Gestor.formeAlterarSenha('<?php echo base64_encode($gt->idGestor) ?>')"> Alterar Senha </buttton></td>
                <td><button class="btn btn-default" onclick="Gestor.formeAlterarGestor('<?php echo base64_encode($gt->idGestor) ?>')"> Alterar Dados </buttton></td>
               
            </tr>
        <?php } ?> 
    </tbody>

</table>

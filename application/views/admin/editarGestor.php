<table class="span12 thumbnail table table-striped">
    <caption>Gestores</caption>
    <thead>
        <tr>
            <th> Nome </th>
            <th> CPF </th>
            <th> Email</th>
            <th> Alterar Senha</th>                
            <th> Alterar Dados</th>
            <th> Excluir </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($gestor as $gt) { ?>
        <tr>
            <td><?php echo $gt->nomeGestor ?></td>
            <td><?php echo $gt->cpfGestor ?></td>
            <td><?php echo $gt->emailGestor ?></td>
            <td><button class="btn" onclick="Gestor.formeAlterarSenha('<?php echo base64_encode($gt->idGestor) ?>')"> Alterar Senha </buttton></td>
            <td><button class="btn" onclick="Gestor.formeAlterarGestor('<?php echo base64_encode($gt->idGestor) ?>')"> Alterar Dados </buttton></td>
            <?php if ($gt->estadoGestor==0) ?>
            <td><?php if ($gt->estadoGestor==0){ ?>
                <button class="btn" onclick="Gestor.excluirGestor('<?php echo base64_encode($gt->idGestor) ?>')"> Excluir </buttton>
                    <?php
                    }else{
                    echo ".....";
                    }
                    ?>
            </td>

        </tr>
<?php } ?> 
    </tbody>

</table>

<button type="button" class="btn btn-primary" onclick="Gestor.formeInserirGestor()" >Inserir Novo</button>
<table class="col-lg-12 thumbnail table table-striped">
    
    <thead>
        <tr>
            <th> Nome </th>
            <th> CPF </th>
            <th> Email</th>
            <th> Alterar Senha</th>                
            <th> Alterar Dados</th>
            <th> Excluir </th>
            <th> Bloqueio </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($gestor as $gt) { ?>
            <tr>
                <td><?php echo $gt->nomeGestor ?></td>
                <td><?php echo $gt->cpfGestor ?></td>
                <td><?php echo $gt->emailGestor ?></td>
                <td><button class="btn btn-default" onclick="Gestor.formeAlterarSenha('<?php echo base64_encode($gt->idGestor) ?>')"> Alterar Senha </buttton></td>
                <td><button class="btn btn-default" onclick="Gestor.formeAlterarGestor('<?php echo base64_encode($gt->idGestor) ?>')"> Alterar Dados </buttton></td>
                <?php if ($gt->estadoGestor == 0)  ?>
                <td><?php if ($gt->estadoGestor == 0) { ?>
                        <button class="btn btn-danger" onclick="Gestor.excluirGestor('<?php echo base64_encode($gt->idGestor) ?>')"> Excluir </buttton>
                            <?php
                        } else {
                            echo ".....";
                        }
                        ?>
                </td>
                <td> <?php if ($gt->estadoGestor == 1) { ?>
                    <button class="btn btn-danger" onclick="Gestor.ativarDesativarGestor('<?php echo base64_encode($gt->idGestor) ?>')"> Bloquear </button>
                <?php } else { ?>
                   <button class="btn btn-primary" onclick="Gestor.ativarDesativarGestor('<?php echo base64_encode($gt->idGestor) ?>')"> Ativar </button>
                <?php } ?></td>
            </tr>
        <?php } ?> 
    </tbody>

</table>

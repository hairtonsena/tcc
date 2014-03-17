<table class="span8 thumbnail table table-striped">
    <caption>Gestores</caption>
    <thead>
        <tr>
            <th> Nome </th>
            <th> CPF </th>
            <th> Email</th>
            <th> Bloqueia </th>

        </tr>
    </thead>
    <tbody>
        <?php foreach ($gestor as $gt) { ?>
            <tr>
                <td><?php echo $gt->nomeGestor ?></td>
                <td><?php echo $gt->cpfGestor ?></td>
                <td><?php echo $gt->emailGestor ?></td>
                <?php if ($gt->estadoGestor == 1) { ?>
                <td><button class="btn" onclick="Gestor.ativarDesativarGestor('<?php echo base64_encode($gt->idGestor) ?>')"> Bloqueia </buttton></td>
                <?php } else { ?>
                <td><button class="btn" onclick="Gestor.ativarDesativarGestor('<?php echo base64_encode($gt->idGestor) ?>')"> Ativar </buttton></td>
                <?php }
            }
            ?>
        </tr>
    </tbody>
</table>

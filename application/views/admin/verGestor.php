<table class="span8 thumbnail table table-striped">
    <caption>Gestores</caption>
    <thead>
        <tr>
            <th> Nome </th>
            <th> CPF </th>
            <th> Email</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($gestor as $gt) {?>
        <tr>
            <td><?php echo $gt->nomeGestor ?> </td>
            <td><?php echo $gt->cpfGestor ?></td>
            <td><?php echo $gt->emailGestor ?></td>
        </tr>
        <?php } ?>
</tbody>
</table>



<html>
    <head>
        <title> Administrador </title>
        <meta charset="utf-8"/>
        <link href="<?php echo base_url() ?>bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
        <link href="<?php echo base_url() ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="<?php echo base_url() ?>bootstrap/css/bootstrap-responsive.css" rel="stylesheet" media="screen">
        <link href="<?php echo base_url() ?>bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="<?php echo base_url() ?>css/style_Admin.css" rel="stylesheet" media="screen">        
    </head>
    <body onload="Gestor.verGestor()">
        <div class="" id="tela" >
            <div class="container-fluid" id="menu">
                <div class="span3"> <h1> Administrador </h1></div>
                <div class="span6">
                    <button class="btn" onclick="Gestor.verGestor()">Ver Gestos</button>
                    <button class="btn" onclick="Gestor.formeInserirGestor()">Inserir Gestos</button>
                    <button class="btn" onclick="Gestor.editarGestor()">Editar Gestos</button>
                    <button class="btn" onclick="Gestor.bloqueioGestor()">Bloquear Gestos</button>
                </div>
                <div class="span3 pull-right">
                    Olá,  <?php echo $this->session->userdata('nomeAdmin') ?> 
                    <a href="<?php echo base_url() ?>administrador/seguranca/logoutUser" title="Sair" >Sair</a>
                </div>
            </div>
            <div class="window" id="mapa">

            </div>
        </div>

        <script type="text/javascript" src="<?php echo base_url() ?>js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>js/conteudoAdministrador.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>bootstrap/js/bootstrap.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>js/configuracao.js"></script>

    </body>
</html>

<html>
    <head>
        <title> Administrador </title>
        <meta charset="utf-8"/>
        <link href="<?php echo base_url("css/bt3/css/bootstrap.min.css"); ?>" rel="stylesheet">  
        <style type="text/css">
            
            .btn-cancelar {
                background-color: #f6f6f6;
            }
            
            
            
        </style>
    </head>
    <body onload="Gestor.editarGestor()">

        <nav class="navbar navbar-default" role="navigation">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"> Administrador</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="javascript:void(0)" onclick="Gestor.editarGestor()">Gestores</a></li>

                    </ul>
                    <a class="pull-right btn btn-danger navbar-btn" href="<?php echo base_url() ?>administrador/seguranca/logoutUser" title="Sair" > Sair </a>
                    
                    <ul class="nav navbar-nav navbar-right">
                        <li> <a class="btn" href="#"> Olá,  <?php echo $this->session->userdata('nomeAdmin') ?> </a> </li>
                    </ul>

                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="container-fluid">
            <div class="row col-lg-12" id="windowModal">
            </div>
        </div>


        <script type="text/javascript" src="<?php echo base_url("jsn/jquery.js") ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("jsn/conteudoAdministrador.js") ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("bootstrap/js/bootstrap.js") ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("bootstrap/js/bootstrap.min.js") ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("jsn/configuracao.js") ?>"></script>

    </body>
</html>

<?php
$configuraPagina = array();
foreach ($configuracao as $cf) {
    $configuraPagina = $cf;
}
?>

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

        <script type="text/javascript">
        
            Config = {
                base_url: "<?php echo base_url("") ?>",
                
                latitudeCentralMaps : <?php echo $configuraPagina->latitudeCentralMunicipio ?>,
                longitudeCentralMaps : <?php echo $configuraPagina->longitudeCentralMunicipio ?>,
                zoomMapsInicial : <?php echo $configuraPagina->zoomMapsInicial ?>,
                streetViewMaps : <?php
if ($configuraPagina->streetViewMaps == 1) {
    echo 'true';
} else {
    echo 'false';
}
?>
                

    };
    
        </script>

    </head>
    <body onload="Gestor.configuracaoGeral()">

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
                    <a class="navbar-brand" href="<?php echo base_url("cpainel/home") ?>">Módulo Gestor</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class=""><a  href="<?php echo base_url("cpainel/home") ?>" >Inicio</a></li>
                        

                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        
                        <li class="active"><a href="javascript:void(0)" onclick="Gestor.configuracaoGeral()">Configuração</a></li>
                        
                        <li> <a class="btn" href="#"><span class="glyphicon glyphicon-user"></span><?php echo $this->session->userdata('nomeGestor') ?> <b class="caret"></b></a> </li>
                    </ul>

                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="container-fluid">
            <div class="row col-lg-12" id="windowModal">
            </div>
        </div>


        <script src="<?php echo base_url("css/bt3/js/bootstrap.min.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("jsn/jquery.js") ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("jsn/conteudoAdministrador.js") ?>"></script>


        <script type="text/javascript" src="<?php echo base_url("jsn/configuracao.js") ?>"></script>


        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
        
        
        <script src="<?php echo base_url("jsn/jquery-ui.custom.min.js") ?>"></script>

    </body>
</html>

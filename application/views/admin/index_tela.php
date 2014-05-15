<?php
$configuraPagina = array();
foreach ($configuracao as $cf) {
    $configuraPagina = $cf;
}
?>

<html>
    <head>
        <title> Problema urbano </title>
        <meta charset="utf-8"/>
        <link rel="shortcut icon" href="<?php echo base_url("icone/pu.ico"); ?>" type="image/x-icon" />
        <link href="<?php echo base_url("css/bt3/css/bootstrap.min.css"); ?>" rel="stylesheet">  
        <style type="text/css">

            .btn-cancelar {
                background-color: #f6f6f6;
            }


        </style>



        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]--> 
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

        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>


                    <a class="navbar-brand" style="margin: 0px 0px 0px 0px; padding:0px 0px 0px 0px;"  href="">
                        <img src="<?php echo base_url("icone/PU321.png") ?>" height="50px" />
                        Problema urbano
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class=""><a  href="<?php echo base_url("cpainel/home") ?>" >Inicio</a></li>
                        <li class=""><a href="javascript:void(0)" onclick="Gestor.editarGestor()">Gestor</a></li>                                                
                    </ul>


                    <ul class="nav navbar-nav navbar-right">

                        <li class="active"><a href="<?php echo base_url("cpainel/configuracao") ?>" >Configuração</a></li>
                        <li class="dropdown">
                            <a href="javascript:void(0)" class="btn dropdown-toggle" data-toggle="dropdown" href="#"> 
                                <span class="glyphicon glyphicon-user"></span>
                                <?php echo $this->session->userdata('nomeGestor') ?> <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu" >
                                <li class="divider"></li>
                                <li><a href="<?php echo base_url("cpainel/seguranca/logoutUser"); ?>" title=" Sair "><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
                            </ul>

                        </li>
                    </ul>

                    <ul class="nav navbar-nav col-md-3 navbar-right">
                        <li> <a class="" href="#"><span style="font-size: 20"> <?php echo $cf->nomeMunicipio ?></span></a></li>

                    </ul>

                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="container-fluid">
            <div class="row col-lg-12" id="windowModal">
            </div>
        </div>

        <script type="text/javascript" src="<?php echo base_url("jsn/jquery.js") ?>"></script>
        <script src="<?php echo base_url("css/bt3/js/bootstrap.min.js"); ?>"></script>

        <script type="text/javascript" src="<?php echo base_url("jsn/conteudoAdministrador.js") ?>"></script>


        <script type="text/javascript" src="<?php echo base_url("jsn/configuracao.js") ?>"></script>


        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>


        <script src="<?php echo base_url("jsn/jquery-ui.custom.min.js") ?>"></script>

    </body>
</html>

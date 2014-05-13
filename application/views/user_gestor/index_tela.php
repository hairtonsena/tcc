<?php
$configuraPagina = array();

foreach ($configuracao as $cf) {
    $configuraPagina = $cf;
}
?>
<html>
    <head>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
        <title> Problema urbano </title>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />

        <!-- Bootstrap -->
        <link href="<?php echo base_url("css/bt3/css/bootstrap.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("css/style_pagina_gestor.css"); ?>" rel="stylesheet">


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link rel="shortcut icon" href="<?php echo base_url("icone/PU.ico"); ?>" type="image/x-icon" />

        <script type="text/javascript">
            Config = {
                base_url: "<?php echo base_url() ?>",
                
                nomeMunicipio:"<?php echo $configuraPagina->nomeMunicipio ?>" ,
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
    <body>
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
                    <!--<a class="navbar-brand" href="#"> <?php // echo $cf->nomeMunicipio  ?> </a>-->

                    <a class="navbar-brand" style="margin: 0px 0px 0px 0px; padding:0px 0px 0px 0px;"  href="">
                        <img src="<?php echo base_url("icone/PU321.png") ?>" height="50px" />
                        Problema urbano
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                    <ul class="nav navbar-nav">
                        <!--<li class=""><a href="<?php // echo base_url("cpainel/home")  ?>" >Início</a></li>-->


                    </ul>


                    <ul class="nav navbar-nav navbar-right">



                        <?php if (($this->session->userdata('nomeGestor')) && ($this->session->userdata('emailGestor')) && ($this->session->userdata('senhaGestor'))) { ?>

                            <li>
                                <a href="<?php echo base_url("cpainel/configuracao") ?>" >Configuração</a>
                            </li>
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
                        <?php } else { ?>
                            <li><a href="javascript:void(0)" onclick="Cadastro.formeLoginCidadao('no')"><span class="glyphicon glyphicon-log-in"></span> Entrar</a></li>
                            <li><a href="javascript:void(0)" onclick="Cadastro.formeCadastroCidadao('no')"><span class="glyphicon glyphicon-list-alt"></span> Cadastrar</a></li>
                        <?php }
                        ?>

                    </ul>

                    <ul class="nav navbar-nav col-md-3 navbar-right">
                        <li> <a class="" href="#"><span style="font-size: 20"> <?php echo $cf->nomeMunicipio ?></span></a></li>

                    </ul>


                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>


        <div class="container-fluid" >
            <div class="row">

                <div class="col-sm-9 col-sm-offset-0 col-md-9 col-md-offset-0 main" id="generateLink">
                    <div id="map_canvas">

                    </div>
                </div>
                <div class="col-sm-3 col-md-3 sidebar" id="calunaDireita">
                    <div id="filtros" >

                        <div class="form-group col-md-6 semMarge" >
                            <?php if (($this->session->userdata('nomeGestor')) && ($this->session->userdata('emailGestor')) && ($this->session->userdata('senhaGestor'))) { ?>        
                                <label onclick="Problema.verCometarioModerar()"  class="text-pequino form-control btn btn-default">
                                    Comentário  <span class="badge pull-right" id="qtdeComentarioMederar"><?php echo $qtdeComentarioAvaliar ?></span>
                                    <!--<input onclick="" class="text-pequino form-control btn btn-default" type="button" id="avaliarComentario" value="Avaliar Comentário">--> 
                                </label>
                            <?php } else { ?>
                                <label onclick="" class="text-pequino form-control btn btn-default">
                                    <!--<input type="checkbox" id="minhasColaboracoes" disabled="true"> Minhas Colaborações-->
                                </label>
                            <?php } ?>
                        </div>
                        <div class="form-group col-md-6 semMarge">
                            <select name="ordem" id="ordem" onchange="Problema.verColaboracoes('a');" class="text-pequino semMarge form-control" >
                                <option value="0"> Ordenar por: </option>
                                <option value="0"> Mais atual </option>
                                <option value="1"> Mais antigo </option>
                                <option value="2"> Mais comentádo </option>
                                <option value="3"> Menos comentádo </option>
                                <option value="4"> Mais apoiado </option>
                                <option value="5"> Menos apoiado </option>
                                <option value="6"> Mais reprovado </option>
                                <option value="7"> Menos reprovado </option>
                            </select>
                        </div>
                        <div class="form-group col-md-6 semMarge">
                            <select name="status" id="status" onchange="Problema.verColaboracoes('a');" class="text-pequino semMarge form-control" >
                                <option value="0"> Status - Todos </option>

                                <?php
                                foreach ($statusProblema as $sp) {
                                    ?>
                                    <option value="<?php echo $sp->idStatus ?>"> <?php echo $sp->nomeStatus ?> </option> 
                                    <?php
                                };
                                ?>

                            </select>
                        </div>
                        <div class="form-group col-md-6 semMarge">
                            <select name="categoria" id="categoria" onchange="Problema.verColaboracoes('a');" class="text-pequino semMarge form-control" >
                                <option value="0"> Categoria - Todas </option>
                                <?php foreach ($tipoProblema as $tp) { ?>
                                    <option value=" <?php echo $tp->idTipo ?>"> <?php echo $tp->tipo ?> </option> ";
                                <?php } ?>

                            </select>
                        </div>
                    </div>
                    <div class="list-group" id="menuDireito" >

                    </div>
                    <div id="legenda" >
                        <strong>Legenda:</strong> <br/>
                        <?php
                        foreach ($tipoProblema as $tp) {
                            $icone = base_url("icone/icone" . $tp->idTipo . ".png");
                            ?>
                            <span class="pull-left" style="display: table"><img src='<?php echo $icone ?>'/><font style="font-size: 10px"><?php echo $tp->tipo ?></font></span>
                        <?php }
                        ?>  
                    </div> 
                </div>
            </div>
            <div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content" id="windowModal">

                    </div>
                </div>
            </div>

        </div>

        <!--    <div class="window" id="janela1">
            </div>-->


        <!-- mascara para cobrir o site -->	
        <!--<div id="mascara" onclick="Tela.fecharModal()" ></div>-->


        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?php echo base_url("css/bt3/js/bootstrap.min.js"); ?>"></script>


        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

        <script type="text/javascript" src="<?php echo base_url("jsn/carregarMapsGestor.js"); ?>"></script>        
        <script type="text/javascript" src="<?php echo base_url("jsn/problemaGestor.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("jsn/configuracaoGestor.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("jsn/conteudoAdministrador.js") ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("jsn/jqxcore.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("jsn/jqxmenu.js"); ?>"></script>
    </body>
</html>
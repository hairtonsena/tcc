
<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Projeto TCC </title>

        <!-- Bootstrap -->
        <link href="<?php echo base_url("css/bt3/css/bootstrap.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("css/style_pagina_cidadao_nova.css"); ?>" rel="stylesheet">


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
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
                    <a class="navbar-brand" href="#">Montes Claros</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <div class="" >
                        <label onclick="Tela.alternarButao()" class="btn btn-primary navbar-btn navbar-left pull-left">
                            <input type="checkbox" id="addColaboracao"><!-- <span class="glyphicon glyphicon-ok-circle"></span>--> Reportar Problema
                        </label>
                    </div>
                    <form class="navbar-form navbar-left" onsubmit="Problema.pesquisaLocal(); return false;" role="search">

                        <div class="form-group">

                            <input type="text"  class="form-control" id="textoPesquisa" placeholder="informe o Local aqui!">
                        </div>
                        <button type="button" onclick="Problema.pesquisaLocal();"  class="btn btn-default"><span class="glyphicon glyphicon-search"></span>.</button>
                    </form>


                    <ul class="nav navbar-nav navbar-right">



                        <?php if (($this->session->userdata('nomeCidadao')) && ($this->session->userdata('emailCidadao')) && ($this->session->userdata('senhaCidadao'))) { ?>

                            <li><a href="javascript:void(0)" class="btn" onclick="Problema.verColaboracoesCidadao()"  data-toggle="tooltip" data-placement="left" title="Minhas Colaborações"> 
                                    <span class="glyphicon glyphicon-th-list"></span>
                                </a></li>
                            <li class="dropdown">

                                <a href="javascript:void(0)" class="btn dropdown-toggle" data-toggle="dropdown" href="#"> 
                                    <span class="glyphicon glyphicon-user"></span>
                                    <?php echo $this->session->userdata('nomeCidadao') ?> <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu" >
                                    <li><a href="javascript:void(0)" onclick="Cadastro.formeAlterarNome()"><span class="glyphicon glyphicon-pencil"></span> Alterar Nome </a></li>
                                    <li><a href="javascript:void(0)" onclick="Cadastro.formeAlterarSenha()"><span class="glyphicon glyphicon-pencil"></span> Alterar Senha </a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?php echo base_url("seguranca/logoutUser") ?>" title=" Sair "><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
                                </ul>

                            </li>
                        <?php } else { ?>
                            <li><a href="javascript:void(0)" onclick="Cadastro.formeLoginCidadao('no')"><span class="glyphicon glyphicon-log-in"></span> Entrar</a></li>
                            <li><a href="javascript:void(0)" onclick="Cadastro.formeCadastroCidadao('no')"><span class="glyphicon glyphicon-list-alt"></span> Cadastrar</a></li>
                        <?php }
                        ?>

                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>



        <div class="container-fluid" >
            <div class="row">
                <div class="col-sm-3 col-md-3 sidebar" id="calunaDireita">
                    <div id="filtros" >
                        <div class="form-group col-md-6 semMarge" >
                            <label onclick="Tela.alternarButao()" class="btn semMarge">
                                <input type="checkbox" id="addColaboracao"> Minhas Colaborações
                            </label>
                        </div>
                        <div class="form-group col-md-6 semMarge">
                            <select name="ordem" id="ordem" onchange="Problema.verColaboracoes('a');" class="text-pequino semMarge form-control" >
                                <option value="0"> Mais Atual </option>
                                <option value="1"> Mais Antigo </option>
                                <option value="2"> Mais comentádos </option>
                                <option value="3"> Menos comentádos </option>
                            </select>
                        </div>
                        <div class="form-group col-md-6 semMarge">
                            <select name="status" id="status" onchange="Problema.verColaboracoes('a');" class="text-pequino semMarge form-control" >
                                <option value="0"> Status - Todos </option>

                                <?php
                                foreach ($statusProblema as $sp) {
                                    if ($sp->idStatus > 3) {
                                        ?>
                                        <option value="<?php echo $sp->idStatus ?>"> <?php echo $sp->nomeStatus ?> </option> 
                                        <?php
                                    };
                                }
                                ?>

                            </select>
                        </div>
                        <div class="form-group col-md-6 semMarge">
                            <select name="categoria" id="categoria" onchange="Problema.verColaboracoes('a');" class="text-pequino semMarge form-control" >
                                <option value="0"> Categoria - Todos </option>
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
                            $icone = base_url() . "icone/icone" . $tp->idTipo . ".png";
                            ?>
                            <span class="pull-left" style="display: table"><img src='<?php echo $icone ?>'/><font style="font-size: 10px; font-family: verdana"> <?php echo $tp->tipo ?> </font></span>
                        <?php }
                        ?>  
                    </div>  
                </div>



                <div class="col-sm-9 col-sm-offset-0 col-md-9 col-md-offset-0 main" id="generateLink">

                    <div id="map_canvas">

                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content" id="windowModal">

                </div>
            </div>
        </div>


        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?php echo base_url("css/bt3/js/bootstrap.min.js"); ?>"></script>


        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

        <script type="text/javascript" src="<?php echo base_url("jsn/carregarMapsCidadao.js"); ?>"></script>        
        <script type="text/javascript" src="<?php echo base_url("jsn/problemaCidadao.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("jsn/configuracao.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("jsn/jqxcore.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("jsn/jqxmenu.js"); ?>"></script>

        <!--        <div id='jqxWidget' style='vertical-align: middle; text-align: center; background: #eee;
                     height: 400px; width: 400px;'>
        
                    <span style='font-size: 14px; position: relative; top: 180px; font-family: Verdana Arial;'>
                        Right-Click here to Open the Menu </span>
                </div>-->
        <div id='jqxMenu' class="list-group">

            <a class="list-group-item" href="#" onclick="Conteudo.adicionarPontoBotaoDireito()">Reportar problema</a>

        </div>
        <?php
        if ($this->session->userdata('local')) {
            ?>
            <input type="hidden" id="local" name="local" value="<?php echo $this->session->userdata('local') ?>"/>


        <?php } else { ?>
            <input type="hidden" id="local" name="local" value="0"/>
        <?php }
        ?>

    </body>
</html>


<html>
    <head>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
        <title> Projeto Tcc </title>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
        <!-- Bootstrap -->
        <link href="<?php echo base_url(); ?>bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
        <link href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="<?php echo base_url(); ?>bootstrap/css/bootstrap-responsive.css" rel="stylesheet" media="screen">
        <link href="<?php echo base_url(); ?>bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="<?php echo base_url(); ?>css/style_pagina_cidadao.css" rel="stylesheet">
        <link rel="shortcut icon" href="<?php echo base_url(); ?>icone/favicon.ico" type="image/x-icon" />
    </head>
    <body>
        <div id="tela" >
            <div class="semMarge thumbnail" style="height: 7%">
                <div class="span10 tamanhoColunaEsquedo semMarge" style="margin: 3px 0px 0px 0px">
                    <div class="span5" style="margin: 6px 0px 0px 20px" >

                        <h2 class="semMarge"> Módulo Gestor </h2>

                    </div>

                    <div class="pull-right" style="margin: 0px 5px 0px 0px">



                        <?php if (($this->session->userdata('nomeGestor')) && ($this->session->userdata('emailGestor')) && ($this->session->userdata('senhaGestor'))) { ?>
                            <div class="">
                                <a href="javascript:void(0)" class="btn " data-toggle="dropdown" href="#">
                                    <img src="<?php echo base_url(); ?>icone/11983_32x32.png"/>
                                    <?php echo $this->session->userdata('nomeGestor') ?>
                                </a>
                                <a href="<?php echo base_url() . "cpainel/seguranca/logoutUser"; ?>" class="btn" title=" Sair ">
                                    <img src="<?php echo base_url(); ?>icone/7143_32x32.png"/>
                                </a>
                            </div>

                        <?php }
                        ?>
                    </div>           

                </div>
                <div class="span2 tamanhoColunaDireita semMarge"  >
                    <div class="" style="margin: 0px 0px 0px 1px;">
                        <a href="http://www.montesclaros.mg.gov.br/" target="_blank" title="Montes Claros" ><img src="<?php echo base_url(); ?>icone/moc.png" style="height: 100%"  /> Montes Claros </a>   
                        <a href="#"><img src="<?php echo base_url(); ?>icone/5_32x32.png" class="pull-right" style="margin-top: 3px;margin-right: 2px;" /></a>
                    </div>
                </div>
            </div>

            <div id="generateLink">
            </div>

            <div class="span9 tamanhoColunaEsquedo" id="map_canvas" >
            </div>

            <div class="span3 tamanhoColunaDireita" id="calunaDireita" style="background-color: #eeeeee">
                <div id="filtros" >
                    <select name="status" id="status" onchange="Problema.verColaboracoes();" class="text-pequino semMarge span1 tamanho-radio pull-left" >
                        <option value="0"> Status - Todos </option>

                        <?php
                        foreach ($statusProblema as $sp) {
                            ?>
                            <option value="<?php echo $sp->idStatus ?>"> <?php echo $sp->nomeStatus ?> </option> 
                            <?php
                        }
                        ?>

                    </select>
                    <select name="categoria" id="categoria" onchange="Problema.verColaboracoes();" class="text-pequino semMarge span1 tamanho-radio pull-left" >
                        <option value="0"> Categoria - Todos </option>
                        <?php foreach ($tipoProblema as $tp) { ?>
                            <option value=" <?php echo $tp->idTipo ?>"> <?php echo $tp->tipo ?> </option> ";
                        <?php } ?>

                    </select>
                    <button type="submit" class="btn pull-right" onclick="Problema.verColaboracoes();" > <i class="icon-filter"></i> Filtrar </button>
                </div>
                <div class="" id="menuDireito" >

                </div>
                <div id="legenda" >
                    <strong>Legenda:</strong> <br/>
                    <?php
                    foreach ($tipoProblema as $tp) {
                        $icone = base_url() . "icone/icone" . $tp->idTipo . ".png";
                        ?>
                        <span class="pull-left" style="display: table"><img src='<?php echo $icone ?>'/><font style="font-size: 10px"><?php echo $tp->tipo ?></font></span>
                    <?php }
                    ?>  
                </div>      
            </div>

        </div>

        <div class="window" id="janela1">
        </div>


        <!-- mascara para cobrir o site -->	
        <div id="mascara" onclick="Tela.fecharModal()" ></div>
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>       
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>bootstrap/js/bootstrap.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/carregarMapsGestor.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/problemaGestor.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/configuracao.js"></script>
    </body>
</html>
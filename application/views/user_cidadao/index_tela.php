<html>
    <head>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
        <title> Projeto Tcc </title>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
        <!-- Bootstrap -->

        <link href="<?php echo base_url() ?>bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
        <link href="<?php echo base_url() ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="<?php echo base_url() ?>bootstrap/css/bootstrap-responsive.css" rel="stylesheet" media="screen">
        <link href="<?php echo base_url() ?>bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="<?php echo base_url() ?>css/style_pagina_cidadao.css" rel="stylesheet">
        <link rel="shortcut icon" href="<?php echo base_url(); ?>icone/favicon.ico" type="image/x-icon" />
    </head>
    <body>
        <div id="tela" >
            <div class="semMarge thumbnail" style="height: 7%">
                <div class="span10 tamanhoColunaEsquedo semMarge" style="margin: 3px 0px 0px 0px">


                    <div class="span1 " style="margin: 3px 0px 0px 10px">
                        <input type="checkbox"  id="addColaboracao" /> <img src="<?php echo base_url() ?>icone/7657_32x32.png"/>
                    </div>
                    <div class="span1 semMarge"> Adicionar <br/> Colaboração 
                    </div> 
                    <div class="span5" style="margin: 6px 0px 0px 20px" >
                        <div class="input-append"> 
                            <select  id="opcaoPesquisa" class="span1">
                                <option value="Rua">Rua:</option>
                                <option value="Avenida">Avenida:</option>
                                <option value="Bairro">Bairro:</option>
                            </select>    
                            <input type="text" onchange="Problema.pesquisaLocal()" class=" span3" id="textoPesquisa" placeholder="Digite o local desejado">
                            <button type="button" class="btn"><i class="icon-search"></i> Pesquisa  </button>
                        </div>
                    </div>
                    
                    
<!--                    <div class="btn" data-toggle="button">Single toggle</button>-->
                   
                    
                    <!--</form>-->
                    <div class="pull-right" style="margin: 0px 5px 0px 0px">



                        <?php if (($this->session->userdata('nomeCidadao')) && ($this->session->userdata('emailCidadao')) && ($this->session->userdata('senhaCidadao'))) { ?>
                            <div class="dropdown">
                                <a href="javascript:void(0)" class="btn" onclick="Problema.verColaboracoesCidadao()" title="Minhas Colaborações"> 
                                    <img src="<?php echo base_url() ?>icone/7674_32x32.png"/>
                                </a>
                                <a href="javascript:void(0)" class="btn dropdown-toggle" data-toggle="dropdown" href="#"> <img src="<?php echo base_url() ?>icone/11983_32x32.png"/>
                                    <?php echo $this->session->userdata('nomeCidadao') ?>
                                </a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                                    <li><a href="javascript:void(0)" onclick="Cadastro.formeAlterarNome()"><img src="<?php echo base_url() ?>icone/6059_32x32.png"/> Editar Nome </a></li>
                                    <li><a href="javascript:void(0)" onclick="Cadastro.formeAlterarSenha()"><img src="<?php echo base_url() ?>icone/6059_32x32.png"/> Editar Senha </a></li>
                                </ul>
                                <a href=<?php base_url() ?>"seguranca/logoutUser" class="btn" title=" Sair "><img src="<?php echo base_url() ?>icone/7143_32x32.png"/></a>
                            </div>
                        <?php } else { ?>
                            <a href="javascript:void(0)" onclick="Cadastro.formeCadastroCidadao()" class="btn" ><img src="<?php echo base_url() ?>icone/7818_32x32.png"> Cadastrar </a>
                            <a href="javascript:void(0)" onclick="Cadastro.formeLoginCidadao()" class="btn"><img src="<?php echo base_url() ?>icone/503_32x32.png"> Entrar </a>
                        <?php }
                        ?>
                    </div>           

                </div>
                <div class="span2 tamanhoColunaDireita semMarge"  >
                    <div class="" style="margin: 0px 0px 0px 1px;">
                        <a href="http://www.montesclaros.mg.gov.br/" target="_blank" title="Montes Claros" ><img src="<?php echo base_url() ?>icone/moc.png" style="height: 100%"  /> Montes Claros   </a> 

                        <a href="#"><img src="<?php echo base_url(); ?>icone/5_32x32.png" class="pull-right" style="margin-top: 3px;margin-right: 2px;" /></a>
                    </div>
                </div>
            </div>

            <div id="generateLink">
            </div>

            <div class="span9 tamanhoColunaEsquedo" id="map_canvas" >
            </div>

            <div class="span3 tamanhoColunaDireita" id="calunaDireita" style="background-color: #eeeeee">
                        <div id = "filtros" >
                        <select name = "status" id = "status" onchange = "Problema.verColaboracoes('a');" class = "text-pequino semMarge span1 tamanho-radio pull-left" >
                        <option value = "0"> Status - Todos </option>

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
                        <select name="categoria" id="categoria" onchange="Problema.verColaboracoes('a');" class="text-pequino semMarge span1 tamanho-radio pull-left" >
                            <option value="0"> Categoria - Todos </option>
                            <?php foreach ($tipoProblema as $tp) { ?>
                                <option value=" <?php echo $tp->idTipo ?>"> <?php echo $tp->tipo ?> </option> ";
<?php } ?>

                        </select>
                        <button type="button" class="btn pull-right" onclick="Problema.verColaboracoes('a');" > <i class="icon-filter"></i> Filtrar </button>
                    </div>
                    <div class="" id="menuDireito" >

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

            </div>

            <div class="window" id="janela1">
            </div>

            <!-- mascara para cobrir o site -->	
            <div id="mascara" onclick="Tela.fecharModal()" ></div>
            <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
            <script src="<?php echo base_url() ?>bootstrap/js/bootstrap.js"></script>
            <script src="<?php echo base_url() ?>js/jquery.js"></script>

            <script src="<?php echo base_url() ?>bootstrap/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url() ?>js/carregarMapsCidadao.js"></script>
            <script type="text/javascript" src="<?php echo base_url() ?>js/problemaCidadao.js"></script>
            <script type="text/javascript" src="<?php echo base_url() ?>js/configuracao.js"></script>

    </body>
</html>
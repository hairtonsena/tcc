<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of instalar
 *
 * @author User
 */
class instalar extends CI_controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('UTC');
        $this->load->helper('url');
        $this->load->database();
        $this->load->library('session');
        $this->load->model('instalar_model');
    }

    function index() {


        echo '<html>
    <head>
        <title> Problemas urbanos  </title>
        <meta charset="utf-8"/>
        <link href="' . base_url("css/bt3/css/bootstrap.min.css") . '" rel="stylesheet">
        <link rel="shortcut icon" href="' . base_url("icone/pu.ico") . '" type="image/x-icon" />
        <style type="text/css">
            html {
                height: 100%;
            }
            body {
                margin: 10% 0% 0% 0%;
                background-color: #fcfcfc;
            }

        </style>
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

                    <a class="navbar-brand" style="margin: 0px 0px 0px 0px; padding:0px 10px 0px 0px;"  href="">
                        <img src="' . base_url("icone/PU321.png") . '" height="50px" />
                        Problemas urbanos
                    </a>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form name="frmLogin" method="post">
                        <div class="col-lg-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title"> Instalar problemas urbanos </h3>
                                </div>
                                <div class="panel-body">

                                    <div class="form-group">
                                       <p> Para instalar o banco de dados no sistema click no botão abaixo "Instalar banco de dados", em seguida você será encaminhado para a tela de login do gestor.</p>
                                        <p>
                                   <span class="text-danger"> 
                                        Atenção! : </span> é importante assistir os tutoriais para obter sucesso na intalação.
                                    
                                    </p>
                                    </div>


                                    <a href="' . base_url("instalar/criarBanco") . '" name="acao" class="form-control btn pull-right btn-primary"> Instalar banco de dados </a>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </body>
</html>';
    }

    function criarBanco() {



        $this->instalar_model->cria_tabela_admin();

        $this->instalar_model->cria_tabela_status();
        $this->instalar_model->cria_tabela_tipo();
        $this->instalar_model->cria_tabela_apoiocomentario();
        $this->instalar_model->cria_tabela_apoioproblema();
        $this->instalar_model->cria_tabela_cidadao();
        $this->instalar_model->cria_tabela_comentarioproblema();
        $this->instalar_model->cria_tabela_denunciaproblema();
        $this->instalar_model->cria_tabela_gestor();
        $this->instalar_model->cria_tabela_problema();
        $this->instalar_model->cria_tabela_reprovacomentario();
        $this->instalar_model->cria_tabela_configuracao();

        $this->instalar_model->cria_view_vw_qtde_apoio();
        $this->instalar_model->cria_view_vw_qtde_apoio_comentario();
        $this->instalar_model->cria_view_vw_qtde_comentario();
        $this->instalar_model->cria_view_vw_qtde_denuncia();
        $this->instalar_model->cria_view_vw_qtde_reprovado_comentario();
        $this->instalar_model->cria_view_vw_problema_com_apo_den();
        $this->instalar_model->cria_view_vw_consulta_comentario();
        $this->instalar_model->cria_view_vw_consulta_principal();

        $this->instalar_model->inserir_dados_status();
        $this->instalar_model->inserir_dados_tipo();
        $this->instalar_model->inserir_dados_configuracao();


        redirect(base_url("administrativo"));
    }

}

?>

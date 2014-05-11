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
        $this->load->helper('url');
        $this->load->database();
        $this->load->library('session');
        $this->load->model('instalar_model');
        date_default_timezone_set('UTC');
    }

    function index() {


        echo '<html>
    <head>
        <title> cPainel - Gestor  </title>
        <meta charset="utf-8"/>
        <link href="' . base_url("css/bt3/css/bootstrap.min.css") . '" rel="stylesheet">

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

        </nav>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form name="frmLogin" method="post">
                        <div class="col-lg-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title"> Instalar Problemas Urbanos </h3>
                                </div>
                                <div class="panel-body">

                                    <div class="form-group">
                                       <p> Para intalar o banco de dados no sistema click no botão abaixo "Instalar Banco de Dados", em seguida você será encaminhado para a tela de login do gestor.</p>
                                        <p>
                                   <span class="text-danger"> 
                                        Atenção! : </span> é importante ler o X passo do manual de intalação para obter sucesso na instalação.
                                    
                                    </p>
                                    </div>


                                    <a href="' . base_url("instalar/criarBanco") . '" name="acao" class="form-control btn pull-right btn-primary"> Intalar Banco de Dados </a>

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

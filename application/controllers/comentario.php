<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Comentario extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->library('session');
        $this->load->model('manimaps/comentario_model');
    }

    public function index() {
        echo "ola";
    }

    function verComentarios() {
        $idProblema = $_POST['idProblema'];

        $userLogado = FALSE;

        if (($this->session->userdata('idCidadao')) && ($this->session->userdata('nomeCidadao')) && ($this->session->userdata('emailCidadao')) && ($this->session->userdata('senhaCidadao'))) {
            $userLogado = TRUE;
            $dado = array('idProblema' => $idProblema);
            $this->load->view('user_cidadao/comentario/formNovoComentario_view', $dado);
        } else {
            $this->load->view('user_cidadao/seguranca/linkLogin_view');
        }


        $dados = array(
            'comentarios' => $this->comentario_model->obterComentarioPorColaboracao($idProblema)->result(),
            'userLogado' => $userLogado,
        );

        $this->load->view('user_cidadao/comentario/verComentario_view', $dados);
    }

    function salvarNovoComentarioProblema() {


        $idProblema = $_POST['idProblema'];
        $comentario = $_POST['comentario'];

        $this->session->userdata('idCidadao');

        $data = date('y-m-d');

        $dadosComentario = array(
            'idComentario' => '',
            'textoComentario' => $comentario,
            'dataComentario' => $data,
            'idProblema' => $idProblema,
            'idCidadao' => $this->session->userdata('idCidadao')
        );

        $this->comentario_model->salvarNovoComentario($dadosComentario);
        echo "<script> Problema.verTodosComentario('" . $idProblema . "')</script>";
    }

    function apoiaComentario() {

        $idComentario = $_POST['a'];
        $qtde = $_POST['qtde'];
        $idProblema = $_POST['ip'];

        $qtde++;

        $dados = array(
            'apoiadoComentario' => $qtde,
        );
        $this->comentario_model->apoiarComentario($dados, $idComentario);

        echo "<script> Problema.verTodosComentario('" . $idProblema . "') </script>";
    }

    function reprovarComentario() {



        $idComentario = $_POST['a'];
        $qtde = $_POST['qtde'];
        $idProblema = $_POST['ip'];
        $qtde++;
       

        if ($qtde < 3) {
            
           //  echo $qtde;
            $dados = array(
                'reprovadoComentario' => $qtde,
            );
            $this->comentario_model->reporvarComentario($dados, $idComentario);

           echo "<script> Problema.verTodosComentario('" . $idProblema . "') </script>";
        } else {
            $this->comentario_model->excluirComentario($idComentario);
            echo "<script> Problema.verTodosComentario('" . $idProblema . "') </script>";
        }
    }

}


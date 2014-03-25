<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class colaboracao extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->library('session');
        $this->load->model('manimaps/tipo_model');
        $this->load->model('manimaps/colaboracao_model');
    }

    function index() {
        
    }

    function formularioNovaColaboracao() {
        $this->session->unset_userdata('local');
        $valor = $this->input->post('local');

        if (($this->session->userdata('idCidadao')) && ($this->session->userdata('nomeCidadao')) && ($this->session->userdata('emailCidadao')) && ($this->session->userdata('senhaCidadao'))) {
            //$valor = $this->session->userdata('local');

            $pontos = array("(", ")");
            $result = str_replace($pontos, "", $valor);
            $latlng = explode(",", $result);

            $latlng;
            $dados = array(
                'tipo' => $this->tipo_model->obterTodosTiposProblema()->result(),
                'latitude' => $latlng[0],
                'longitude' => $latlng[1],
            );

            $this->load->view('user_cidadao/colaboracao/formNovaColaboracao', $dados);
        } else {
            $dados = array(
                'local' => $valor
            );
            $this->load->view('user_cidadao/seguranca/linkLogin_view', $dados);
        }
    }

    function salvarNovaColaboracao() {

        $dadosColaboracao = array(
            'idProblema' => '',
            'descricao' => $this->input->post('descricao'),
            'data' => date('y-m-d'),
            'latitude' => $this->input->post('latitude'),
            'longitude' => $this->input->post('longitude'),
            'idTipo' => $this->input->post('tipo'),
            'idStatus' => '1',
            'idCidadao' => $this->session->userdata('idCidadao'),
        );

        $this->colaboracao_model->inserirNovaColaboracao($dadosColaboracao);

        $query = $this->colaboracao_model->obterColaboracaoInserida($dadosColaboracao)->result();

        $idProblema = 0;
        foreach ($query as $qr) {
            $idProblema = $qr->idProblema;
        }
        echo '
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

    <h4 class="modal-title"> Registro de Problema</h4>
</div>            
<div class="modal-body"> O problema foi registrado com sucesso. <br/>
<a href="javascript:void(0)" class="btn btn-default">ok</a>
</div>';
        echo "<script> Conteudo.generateRandomMarkers(-1,-1,0) </script>";
    }

    function formeEditarColaboracao() {
        if (($this->session->userdata('idCidadao')) && ($this->session->userdata('nomeCidadao')) && ($this->session->userdata('emailCidadao')) && ($this->session->userdata('senhaCidadao'))) {

            $userLogado = TRUE;

            $idProblema = $_POST['idProblema'];

            $dados = array(
                'colaboracao' => $this->colaboracao_model->obterColaboracaoEdicao($idProblema)->result(),
                'tipo' => $this->tipo_model->obterTodosTiposProblema()->result(),
                'idProblema' => $idProblema,
            );
            $this->load->view('user_cidadao/colaboracao/formEditarColaboracao_view', $dados);
        }
    }

    function alterarColaboracaoPendente() {
        if (($this->session->userdata('idCidadao')) && ($this->session->userdata('nomeCidadao')) && ($this->session->userdata('emailCidadao')) && ($this->session->userdata('senhaCidadao'))) {

            $idProblema = $_POST['idProblema'];
            $tipo = $_POST['tipo'];
            $descricao = $_POST['descricao'];

            $dados = array(
                'descricao' => $descricao,
                'idTipo' => $tipo,
                'idStatus' => '1',
            );

            $this->colaboracao_model->alterarColaboracaoPendente($dados, $idProblema);

            echo "<h4> O problema foi registrado <br/> com sucesso. </h4>";
            echo "<script> Problema.focaProblemaAdicionado('$idProblema') </script>";
        }
    }

    function confirmaConclusaoProblema() {

        $idProblema = $_POST['idProblema'];

        $dados = array(
            'idStatus' => '7',
        );

        $this->colaboracao_model->alterarStatusConclusao($dados, $idProblema);

        echo "<script> Problema.verColaboracoes(0) </script>";
    }

}

?>

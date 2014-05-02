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
        date_default_timezone_set('UTC');
    }

    function index() {
        
    }

    function formularioNovaColaboracao() {
        // isto é uma sessão.
        $this->session->unset_userdata('local');
        $this->session->unset_userdata('opcao');
        // isto é uma atribição POST.
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

        echo '<script>        var colabocaoCidadao = 0;
        if ($("#minhasColaboracoes").is(\':checked\', true)) {
            colabocaoCidadao = 1;
        } else {
            colabocaoCidadao = 0;
        }
        var status = $("#status").val();
        var categoria = $("#categoria").val();
        var ordem = $("#ordem").val();

        Conteudo.generateRandomMarkers(status, categoria, ordem, colabocaoCidadao, 0); </script>';
        echo '
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

            <h4 class="modal-title"> Registro de Problema</h4>
        </div>            
        <div class="modal-body"> O problema foi registrado com sucesso. <br/>
            <button type="button" onclick="Tela.fecharModal()" class="btn btn-default">ok</a>
        </div>';
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

            echo '<script>        var colabocaoCidadao = 0;
        if ($("#minhasColaboracoes").is(\':checked\', true)) {
            colabocaoCidadao = 1;
        } else {
            colabocaoCidadao = 0;
        }
        var status = $("#status").val();
        var categoria = $("#categoria").val();
        var ordem = $("#ordem").val();

        Conteudo.generateRandomMarkers(status, categoria, ordem, colabocaoCidadao, 0); Tela.fecharModal() </script>';
        }
    }

    function visualizarProblemaEmail() {

        if (($this->session->userdata('idCidadao')) && ($this->session->userdata('nomeCidadao')) && ($this->session->userdata('emailCidadao')) && ($this->session->userdata('senhaCidadao'))) {
            $valor = $this->input->post('problema');
            $pontos = array("(", ")");
            $result = str_replace($pontos, "", $valor);
            $latlng = explode(",", $result);

            $latlng;
            $dados = array(
                'latitude' => $latlng[0],
                'longitude' => $latlng[1],
            );

            $colaboracao = $this->colaboracao_model->obterColaboracaoUserEmail($dados)->result();

            if (count($colaboracao) == 0) {
                echo '<script>  Tela.fecharModal(); </script>';
            } else {
                foreach ($colaboracao as $cl) {
                    if ($this->session->userdata('idCidadao') == $cl->idCidadao) {
                        $dados2 = array(
                            'colaboracao' => $colaboracao,
                        );

                        $this->load->view('user_cidadao/colaboracao/colaboracaoUserEmail_view', $dados2);
                    } else {
                        echo '<script>  Tela.fecharModal(); </script>';
                    }
                }
            }

            $this->session->unset_userdata('local');
            $this->session->unset_userdata('opcao');
        } else {
            $this->load->view('user_cidadao/seguranca/linkLogin_view');
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

    function apoiarProblema() {

        // if (($this->session->userdata('idCidadao')) && ($this->session->userdata('nomeCidadao')) && ($this->session->userdata('emailCidadao')) && ($this->session->userdata('senhaCidadao'))) {

        $idProblema = $_POST['idProblema'];
        $dados = array(
            'idProblema' => $idProblema,
            'idCidadao' => $this->session->userdata('idCidadao'),
            'statusApoio' => '1',
        );

        $this->colaboracao_model->persistirApoiarProblema($dados);



        //  }
    }

    function reprovaProblema() {
        // if (($this->session->userdata('idCidadao')) && ($this->session->userdata('nomeCidadao')) && ($this->session->userdata('emailCidadao')) && ($this->session->userdata('senhaCidadao'))) {

        $idProblema = $_POST['idProblema'];
        $dados = array(
            'idProblema' => $idProblema,
            'idCidadao' => $this->session->userdata('idCidadao'),
            'statusDenuncia' => '1',
        );

        $this->colaboracao_model->persistirReprovarProblema($dados);



        //  }
    }

}

?>

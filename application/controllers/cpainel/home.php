<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('UTC');
        $this->load->library('session');
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('cpainel/tipo_modal');
        $this->load->model('cpainel/status_model');
        $this->load->model('cpainel/colaboracao_model');
    }

    function index() {

        if (($this->session->userdata('idGestor')) && ($this->session->userdata('nomeGestor')) && ($this->session->userdata('emailGestor')) && ($this->session->userdata('senhaGestor'))) {

            $comentariaNaoAvaliados = $this->colaboracao_model->obterComentarioNaoModerados()->result();

            // echo count($comentariaNaoAvaliados);

            $dados = array(
                'configuracao' => $this->colaboracao_model->obterConfiguracoa()->result(),
                'tipoProblema' => $this->tipo_modal->obiterTipo()->result(),
                'statusProblema' => $this->status_model->obiterStatus()->result(),
                'qtdeComentarioAvaliar' => count($comentariaNaoAvaliados),
            );


            $this->load->view('user_gestor/index_tela.php', $dados);
        } else {
            redirect(base_url() . "cpainel/seguranca");
        }
    }

    public function informacao() {
        
        $dados = array(
            'configuracao' => $this->colaboracao_model->obterConfiguracoa()->result()
        );


        $this->load->view('user_gestor/informacaoGeral_view', $dados);
    }

//put your code here  91751504
}

// exposo de michely o frank de januaria 
?>

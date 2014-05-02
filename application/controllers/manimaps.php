<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Manimaps extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->database();
        $this->load->helper('html');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('manimaps/status_model');
        $this->load->model('manimaps/tipo_model');

        $this->load->library('pagination');
    }

    public function index() {

        if(!empty($_GET['problema'])){
        $teste = base64_decode($_GET['problema']);
        $this->session->set_userdata('local',$teste);
        $this->session->set_userdata('opcao','2');
         redirect(base_url());
        }
        
        $dados = array(
            'statusProblema' => $this->status_model->obterTodosStatusProblema()->result(),
            'tipoProblema' => $this->tipo_model->obterTodosTiposProblema()->result()
        );
        
        
        $this->load->view('user_cidadao/index_tela',$dados);
    }

    
        public function nova() {

        $dados = array(
            'statusProblema' => $this->status_model->obterTodosStatusProblema()->result(),
            'tipoProblema' => $this->tipo_model->obterTodosTiposProblema()->result()
        );


        $this->load->view('user_cidadao/index_tela_old',$dados);
    }
}
<?php

if (!defined('BASEPATH'))
    exit
            ('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of seguranca
 *
 * @author hairton
 * 
 */
class seguranca extends CI_Controller {

    public
            function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('captcha');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->library('session');
        $this->load->model('cpainel/gestor_model');
    }

    function index() {

        $wordCp = rand(000000, 999999);
        $this->session->set_userdata(array('textCaptcha' => $wordCp));
        $vals = array(
            'word' => $wordCp,
            'img_path' => './captcha/',
            'img_url' => base_url() . 'captcha/',
            // 'font_path' => './path/to/fonts/texb.ttf',
            'img_width' => '130',
            'img_height' => 30,
            'expiration' => 7200
        );

        $cap = create_captcha($vals);

        $dados = array(
            'imagemCaptcha' => $cap['image'],
        );

        $this->load->view('user_gestor/seguranca/formLogin_view', $dados);
    }

    function logarUsuario() {

        $teste = false;
         $this->form_validation->set_rules('textoImagem', 'Codigo', 'callback_codigoValidacao_check');
        if ($this->form_validation->run() == TRUE) {
            $teste = TRUE;
        }
        if ($teste == TRUE) {
            $this->form_validation->set_rules('textoImagem', 'Codigo', '');
            $this->form_validation->set_rules('email', 'Email', 'required|trim|min_length[5]|valid_email');
            $this->form_validation->set_rules('senha', 'Senha', 'required|min_length[6]|callback_validarUsuario_check');
        }

        if ($this->form_validation->run() == FALSE) {

            $wordCp = rand(000000, 999999);
            $this->session->set_userdata(array('textCaptcha' => $wordCp));
            $vals = array(
                'word' => $wordCp,
                'img_path' => './captcha/',
                'img_url' => base_url() . 'captcha/',
                // 'font_path' => './path/to/fonts/texb.ttf',
                'img_width' => '130',
                'img_height' => 30,
                'expiration' => 7200
            );

            $cap = create_captcha($vals);

            $dados = array(
                'imagemCaptcha' => $cap['image'],
            );

            $this->load->view('user_gestor/seguranca/formLogin_view', $dados);
        } else {

            redirect(base_url() . "cpainel/home"); 
        }
    }

    function validarUsuario_check() {
        
        $dados = array(
            'emailGestor' => $this->input->post('email'),
            'senhaGestor' => md5($this->input->post('senha')),
            'nomeGestor' => "Gestor",
            'estadoGestor' => 1
        ); 
        
        
        $testeUsuarios = $this->gestor_model->obterTodosGestor()->result();
        
    
        if(count($testeUsuarios)==0){
            $this->gestor_model->inserirGestor($dados);
        }
        
        

       $dadosLogin = array(
            'emailGestor' => $this->input->post('email'),
            'senhaGestor' => md5($this->input->post('senha'))
        ); 
 
        $userLogin = $this->gestor_model->obterGestorLogin($dadosLogin)->result();

        if (empty($userLogin)) {

            $this->form_validation->set_message('validarUsuario_check', 'Email ou senha incorretos!');
            return FALSE;
        } else {
            foreach ($userLogin as $ul) {
                if ($ul->estadoGestor == 0) {
                    $this->form_validation->set_message('validarUsuario_check', 'Desculpe! usuário bloqueado <br/> Entre em contato com o administrador');
                    return FALSE;
                } else {
                    $dadosUser = array(
                        'idGestor' => $ul->idGestor,
                        'nomeGestor' => $ul->nomeGestor,
                        'emailGestor' => $ul->emailGestor,
                        'senhaGestor' => $ul->senhaGestor
                    );
                    $this->session->set_userdata($dadosUser);
                }
            }
            return TRUE;
        }
    }

    function codigoValidacao_check($cod) {
        if ($this->input->post('textoImagem') != $this->session->userdata('textCaptcha')) {
            $this->form_validation->set_message('codigoValidacao_check', 'O %s esta incorreta!');
            return FALSE;
        } else {
            $this->session->unset_userdata('textCaptcha');
            return TRUE;
        }
    }

    function logoutUser() {
        $this->session->unset_userdata('idGestor');
        $this->session->unset_userdata('nomeGestor');
        $this->session->unset_userdata('emailGestor');
        $this->session->unset_userdata('senhaGestor');

        redirect(base_url() . "cpainel/home");
    }

}

?>

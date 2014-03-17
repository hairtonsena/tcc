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
        $this->load->model('admin/admin_model');
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

        $this->load->view('admin/seguranca/formLogin_view', $dados);
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

            $this->load->view('admin/seguranca/formLogin_view', $dados);
        } else {

            redirect(base_url() . "administrador/cpainel");
        }
    }

    function validarUsuario_check() {
        $dadosLogin = array(
            'emailAdmin' => $this->input->post('email'),
            'senhaAdmin' => md5($this->input->post('senha'))
        );

        $userLogin = $this->admin_model->obterAdminLogin($dadosLogin)->result();

        if (empty($userLogin)) {

            $this->form_validation->set_message('validarUsuario_check', 'Email ou senha incorretos!');
            return FALSE;
        } else {
            foreach ($userLogin as $ul) {

                $dadosUser = array(
                    'idAdmin' => $ul->idAdmin,
                    'nomeAdmin' => $ul->nomeAdmin,
                    'emailAdmin' => $ul->emailAdmin,
                    'senhaAdmin' => $ul->senhaAdmin
                );
                $this->session->set_userdata($dadosUser);
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
        $this->session->unset_userdata('idAdmin');
        $this->session->unset_userdata('nomeAdmin');
        $this->session->unset_userdata('emailAdmin');
        $this->session->unset_userdata('senhaAdmin');

        redirect(base_url() . "administrador/cpainel");
    }

}

?>

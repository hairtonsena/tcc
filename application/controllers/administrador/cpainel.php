<?php

class cpainel extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('cpainel/gestor_model');
    }

    function index() {

        if (($this->session->userdata('idAdmin')) && ($this->session->userdata('nomeAdmin')) && ($this->session->userdata('emailAdmin')) && ($this->session->userdata('senhaAdmin'))) {

            $this->load->view('admin/index_tela');
        } else {
            redirect(base_url() . "administrador/seguranca");
        }
    }

    function formeInserir() {

        $this->load->view('admin/formInserir');
    }

    function inserirGestor() {
        if (($this->session->userdata('idAdmin')) && ($this->session->userdata('nomeAdmin')) && ($this->session->userdata('emailAdmin')) && ($this->session->userdata('senhaAdmin'))) {

            $this->form_validation->set_rules('nomeGestor', 'Nome', 'required|trim|min_length[4]|max_length[50]');
            $this->form_validation->set_rules('cpfGestor', 'CPF', 'callback_cpf_check|required|trim|min_length[11]|max_length[11]|is_unique[gestor.cpfGestor]');
            $this->form_validation->set_rules('emailGestor', 'Email', 'required|trim|min_length[5]|max_length[70]|valid_email|is_unique[gestor.emailGestor]');
            $this->form_validation->set_rules('senhaGestor', 'Senha', 'required|min_length[6]|max_length[20]');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/formInserir');
            } else {
                $nomeGestor = $_POST['nomeGestor'];
                $cpfGestor = $_POST['cpfGestor'];
                $emailGestor = $_POST['emailGestor'];
                $senhaGestor = md5($_POST['senhaGestor']);

                $dadosGestorInserir = array(
                    'idGestor' => '',
                    'nomeGestor' => $nomeGestor,
                    'cpfGestor' => $cpfGestor,
                    'emailGestor' => $emailGestor,
                    'senhaGestor' => $senhaGestor,
                    'estadoGestor' => '0',
                );

                $this->gestor_model->inserirGestor($dadosGestorInserir);

                echo "<script> Gestor.bloqueioGestor(); </script>";
            }
        } else {
            redirect(base_url() . "administrador/seguranca");
        }
    }

    public function cpf_check($cpf) {

        $j = 0;
        for ($i = 0; $i < (strlen($cpf)); $i++) {
            if (is_numeric($cpf[$i])) {
                $num[$j] = $cpf[$i];
                $j++;
            }
        }

        if (count($num) != 11) {
            $isCpfValid = false;
        } else {
            for ($i = 0; $i < 10; $i++) {
                if ($num[0] == $i && $num[1] == $i && $num[2] == $i && $num[3] == $i && $num[4] == $i && $num[5] == $i && $num[6] == $i && $num[7] == $i && $num[8] == $i) {
                    $isCpfValid = false;
                    break;
                }
            }
        }

        if (!isset($isCpfValid)) {
            $j = 10;
            for ($i = 0; $i < 9; $i++) {
                $multiplica[$i] = $num[$i] * $j;
                $j--;
            }
            $soma = array_sum($multiplica);
            $resto = $soma % 11;
            if ($resto < 2) {
                $dg = 0;
            } else {
                $dg = 11 - $resto;
            }
            if ($dg != $num[9]) {
                $isCpfValid = false;
            }
        }

        if (!isset($isCpfValid)) {
            $j = 11;
            for ($i = 0; $i < 10; $i++) {
                $multiplica[$i] = $num[$i] * $j;
                $j--;
            }
            $soma = array_sum($multiplica);
            $resto = $soma % 11;
            if ($resto < 2) {
                $dg = 0;
            } else {
                $dg = 11 - $resto;
            }
            if ($dg != $num[10]) {
                $isCpfValid = false;
            } else {
                $isCpfValid = true;
            }
        }

        if ($isCpfValid == FALSE) {
            $this->form_validation->set_message('cpf_check', 'O %s é invalido, Verirfique se digitou corretamente!');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function verGestor() {
        $dados = array(
            'gestor' => $this->gestor_model->obterTodosGestorAtivos()->result(),
        );

        $this->load->view('admin/verGestor', $dados);
    }

    function formeAlterarSenha() {
        if (($this->session->userdata('idAdmin')) && ($this->session->userdata('nomeAdmin')) && ($this->session->userdata('emailAdmin')) && ($this->session->userdata('senhaAdmin'))) {

            $idGestor = base64_decode($_POST['idGestor']);

            $dados = array(
                'gestor' => $this->gestor_model->obterGestor($idGestor)->result(),
            );

            $this->load->view('admin/formeAlterarSenha', $dados);
        }else {
            redirect(base_url() . "administrador/seguranca");
        }
    }

    function alterarSenha() {
        if (($this->session->userdata('idAdmin')) && ($this->session->userdata('nomeAdmin')) && ($this->session->userdata('emailAdmin')) && ($this->session->userdata('senhaAdmin'))) {

            $this->form_validation->set_rules('senhaGestor', 'Senha', 'required|min_length[6]|max_length[20]');

            if ($this->form_validation->run() == FALSE) {
                $idGestor = $_POST['idGestor'];

                $dados = array(
                    'gestor' => $this->gestor_model->obterGestor($idGestor)->result(),
                );

                $this->load->view('admin/formeAlterarSenha', $dados);
            } else {
                $idGestor = base64_decode($_POST['idGestor']);
                $senhaGestor = md5($_POST['senhaGestor']);

                $alterarGestor = array(
                    'senhaGestor' => $senhaGestor,
                );

                $this->gestor_model->alterarDadosGestor($alterarGestor, $idGestor);
                echo "<script> Gestor.editarGestor() </script>";
            }
        }else {
            redirect(base_url() . "administrador/seguranca");
        }
    }

    function editarGestor() {
        if (($this->session->userdata('idAdmin')) && ($this->session->userdata('nomeAdmin')) && ($this->session->userdata('emailAdmin')) && ($this->session->userdata('senhaAdmin'))) {

            $dados = array(
                'gestor' => $this->gestor_model->obterTodosGestor()->result(),
            );

            $this->load->view('admin/editarGestor', $dados);
        }else {
            redirect(base_url() . "administrador/seguranca");
        }
    }

    function formeAlterarGestor() {

        if (($this->session->userdata('idAdmin')) && ($this->session->userdata('nomeAdmin')) && ($this->session->userdata('emailAdmin')) && ($this->session->userdata('senhaAdmin'))) {

            $idGestor = base64_decode($_POST['idGestor']);

            $dados = array(
                'gestor' => $this->gestor_model->obterGestor($idGestor)->result(),
            );

            $this->load->view('admin/formeAlterarGestor', $dados);
        }else {
            redirect(base_url() . "administrador/seguranca");
        }
    }

    function alterarGestor() {
        if (($this->session->userdata('idAdmin')) && ($this->session->userdata('nomeAdmin')) && ($this->session->userdata('emailAdmin')) && ($this->session->userdata('senhaAdmin'))) {

            $this->form_validation->set_rules('nomeGestor', 'Nome', 'required|trim|min_length[4]|max_length[50]');
            $this->form_validation->set_rules('cpfGestor', 'CPF', 'callback_cpf_check|required|trim|min_length[11]|max_length[11]');
            $this->form_validation->set_rules('emailGestor', 'Email', 'required|trim|min_length[5]|max_length[70]|valid_email');
            //$this->form_validation->set_rules('senhaGestor', 'Senha', 'required|min_length[6]|max_length[20]');

            if ($this->form_validation->run() == FALSE) {
                $idGestor = $_POST['idGestor'];
                $dados = array(
                    'gestor' => $this->gestor_model->obterGestor($idGestor)->result(),
                );

                $this->load->view('admin/formeAlterarGestor', $dados);
            } else {


                $idGestor = $_POST['idGestor'];
                $nomeGestor = $_POST['nomeGestor'];
                $cpfGestor = $_POST['cpfGestor'];
                $emailGestor = $_POST['emailGestor'];




                $alterarGestor = array(
                    'nomeGestor' => $nomeGestor,
                    'cpfGestor' => $cpfGestor,
                    'emailGestor' => $emailGestor,
                );
                $this->gestor_model->alterarDadosGestor($alterarGestor, $idGestor);


                echo "<script> Gestor.editarGestor() </script>";
            }
        }else {
            redirect(base_url() . "administrador/seguranca");
        }
    }

    function excluirGestor() {
        if (($this->session->userdata('idAdmin')) && ($this->session->userdata('nomeAdmin')) && ($this->session->userdata('emailAdmin')) && ($this->session->userdata('senhaAdmin'))) {

            $idGestor = base64_decode($_POST['idGestor']);

            $this->gestor_model->excluirGestor($idGestor);

            echo "<script> Gestor.editarGestor() </script>";
        }else {
            redirect(base_url() . "administrador/seguranca");
        }
    }

    function bloqueioGestor() {
        if (($this->session->userdata('idAdmin')) && ($this->session->userdata('nomeAdmin')) && ($this->session->userdata('emailAdmin')) && ($this->session->userdata('senhaAdmin'))) {

            $dados = array(
                'gestor' => $this->gestor_model->obterTodosGestor()->result(),
            );

            $this->load->view('admin/bloqueioGestor', $dados);
        }else {
            redirect(base_url() . "administrador/seguranca");
        }
    }

    function ativarDesativarGestor() {
        if (($this->session->userdata('idAdmin')) && ($this->session->userdata('nomeAdmin')) && ($this->session->userdata('emailAdmin')) && ($this->session->userdata('senhaAdmin'))) {

            $idGestor = base64_decode($_POST['idGestor']);

            $queryGestor = $this->gestor_model->obterGestor($idGestor)->result();

            foreach ($queryGestor as $qg) {

                if ($qg->estadoGestor == 1) {

                    $dados = array(
                        'estadoGestor' => '0'
                    );

                    $this->gestor_model->alterarEstadosGestor($dados, $idGestor);
                } else {

                    $dados = array(
                        'estadoGestor' => '1'
                    );

                    $this->gestor_model->alterarEstadosGestor($dados, $idGestor);
                }
                echo "<script> Gestor.bloqueioGestor() </script>";
            }
        }else {
            redirect(base_url() . "administrador/seguranca");
        }
    }
}

?>

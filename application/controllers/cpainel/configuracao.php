<?php

class configuracao extends CI_Controller {

    function __construct() {
        parent::__construct();
        date_default_timezone_set('UTC');
        $this->load->library('session');
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('cpainel/gestor_model');
        $this->load->model('admin/admin_model');
    }

    function index() {

        if (($this->session->userdata('idGestor')) && ($this->session->userdata('nomeGestor')) && ($this->session->userdata('emailGestor')) && ($this->session->userdata('senhaGestor'))) {


            $dados = array(
                'configuracao' => $this->admin_model->obterConfiguracao()->result(),
            );

            $this->load->view('admin/index_tela', $dados);
        } else {
            redirect(base_url() . "administrador/seguranca");
        }
    }

    function formeInserir() {
        if (($this->session->userdata('idAdmin')) && ($this->session->userdata('nomeAdmin')) && ($this->session->userdata('emailAdmin')) && ($this->session->userdata('senhaAdmin'))) {

            $this->load->view('admin/formInserir');
        } else {
            redirect(base_url("administrador/seguranca"));
        }
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
                    'estadoGestor' => '1',
                );

                $this->gestor_model->inserirGestor($dadosGestorInserir);

                echo "<script> Gestor.bloqueioGestor(); </script>";
            }
        } else {
            redirect(base_url("administrador/seguranca"));
        }
    }

    public function configuracaoGeral() {
        if (($this->session->userdata('idGestor')) && ($this->session->userdata('nomeGestor')) && ($this->session->userdata('emailGestor')) && ($this->session->userdata('senhaGestor'))) {

            $dados = array(
                'configuracao' => $this->admin_model->obterConfiguracao()->result(),
            );


            $this->load->view('admin/verConfiguracao_view', $dados);
        } else {
            redirect(base_url("administrador/seguranca"));
        }
    }

    public function editarConfiguracao() {
        if (($this->session->userdata('idGestor')) && ($this->session->userdata('nomeGestor')) && ($this->session->userdata('emailGestor')) && ($this->session->userdata('senhaGestor'))) {

            $dados = array(
                'configuracao' => $this->admin_model->obterConfiguracao()->result(),
            );


            $this->load->view('admin/formConfiguracao_view', $dados);
        } else {
            redirect(base_url("administrador/seguranca"));
        }
    }

    public function salvarConfiguracao() {
        if (($this->session->userdata('idGestor')) && ($this->session->userdata('nomeGestor')) && ($this->session->userdata('emailGestor')) && ($this->session->userdata('senhaGestor'))) {

            $idMunicipio = $_POST["idMunicipio"];
            $nomeMunicipio = $_POST["nomeMunicipio"];
            $cnpjMunicipio = $_POST["cnpjMunicipio"];
            $cepMunicipio = $_POST["cepMunicipio"];
            $telefoneMunicipio = $_POST["telefoneMunicipio"];
            $emailMunicipio = $_POST["emailMunicipio"];
            $siteMunicipio = $_POST["siteMunicipio"];
            $latitudeMunicipio = $_POST["latitudeMunicipio"];
            $longitudeMunicipio = $_POST["longitudeMunicipio"];
            $zoomMapsInicial = $_POST["zoomMapsInicial"];
            $streetViewMaps = $_POST["streetViewMaps"];

            $dados = array(
                "nomeMunicipio" => $nomeMunicipio,
                "cnpjMunicipio" => $cnpjMunicipio,
                "cepMunicipio" => $cepMunicipio,
                "telefoneMunicipio" => $telefoneMunicipio,
                "emailMunicipio" => $emailMunicipio,
                "siteMunicipio" => $siteMunicipio,
                "latitudeCentralMunicipio" => $latitudeMunicipio,
                "longitudeCentralMunicipio" => $longitudeMunicipio,
                "zoomMapsInicial" => $zoomMapsInicial,
                "streetViewMaps" => $streetViewMaps,
            );


            $this->admin_model->alterarConfiguracao($idMunicipio, $dados);


            echo '<script language="javascript" type="text/javascript">';
          //  echo 'window.alert("Nome alterado com sucesso!");';
            echo 'window.location.href="' . base_url("cpainel/configuracao") . '";';
            echo '</script>';
            // $this->configuracaoGeral();
        } else {
            redirect(base_url("administrador/seguranca"));
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
        if (($this->session->userdata('idGestor')) && ($this->session->userdata('nomeGestor')) && ($this->session->userdata('emailGestor')) && ($this->session->userdata('senhaGestor'))) {

            $idGestor = $this->session->userdata('idGestor');

            $dados = array(
                'gestor' => $this->gestor_model->obterGestor($idGestor)->result(),
            );

            $this->load->view('admin/formeAlterarSenha', $dados);
        } else {
            redirect(base_url() . "administrador/seguranca");
        }
    }

    function alterarSenha() {
        if (($this->session->userdata('idGestor')) && ($this->session->userdata('nomeGestor')) && ($this->session->userdata('emailGestor')) && ($this->session->userdata('senhaGestor'))) {

            $this->form_validation->set_rules('senhaGestor', 'Nova senha', 'required|min_length[6]|max_length[20]');
            $this->form_validation->set_rules('senhaAtual', 'Senha atual', 'required|min_length[6]|max_length[20]');
            if ($this->form_validation->run() == FALSE) {
                $idGestor = $this->session->userdata('idGestor');

                $dados = array(
                    'gestor' => $this->gestor_model->obterGestor($idGestor)->result(),
                );

                $this->load->view('admin/formeAlterarSenha', $dados);
            } else {
                $idGestor = $_POST['idGestor'];
                $senhaGestor = md5($_POST['senhaGestor']);

                $senhaAtual = md5($_POST['senhaAtual']);


                $testeGestor = FALSE;
                $gestorVerifica = $this->gestor_model->obterGestor($idGestor)->result();
                foreach ($gestorVerifica as $gv) {
                    if ($gv->senhaGestor == $senhaAtual) {
                        $testeGestor = TRUE;
                    }
                }

                if ($testeGestor == TRUE) {
                    $alterarGestor = array(
                        'senhaGestor' => $senhaGestor,
                    );

                    $this->gestor_model->alterarDadosGestor($alterarGestor, $idGestor);
                    echo "<script> alert('Senha alterada com sucesso!'); Gestor.editarGestor() </script>";
                } else {
                    echo "<script> alert('Devido à divergência de informações a senha não pode ser alterada!'); Gestor.editarGestor() </script>";
                }
            }
        } else {
            redirect(base_url() . "administrador/seguranca");
        }
    }

    function editarGestor() {
        if (($this->session->userdata('idGestor')) && ($this->session->userdata('nomeGestor')) && ($this->session->userdata('emailGestor')) && ($this->session->userdata('senhaGestor'))) {

            $dados = array(
                'gestor' => $this->gestor_model->obterTodosGestor()->result(),
            );

            $this->load->view('admin/editarGestor', $dados);
        } else {
            redirect(base_url() . "administrador/seguranca");
        }
    }

    function formeAlterarGestor() {

        if (($this->session->userdata('idGestor')) && ($this->session->userdata('nomeGestor')) && ($this->session->userdata('emailGestor')) && ($this->session->userdata('senhaGestor'))) {

            $idGestor = $this->session->userdata('idGestor');

            $dados = array(
                'gestor' => $this->gestor_model->obterGestor($idGestor)->result(),
            );


            $this->load->view('admin/formeAlterarGestor', $dados);
        } else {
            redirect(base_url() . "administrador/seguranca");
        }
    }

    function alterarGestor() {
        if (($this->session->userdata('idGestor')) && ($this->session->userdata('nomeGestor')) && ($this->session->userdata('emailGestor')) && ($this->session->userdata('senhaGestor'))) {

            $this->form_validation->set_rules('nomeGestor', 'Nome', 'required|trim|min_length[4]|max_length[50]');
            //  $this->form_validation->set_rules('cpfGestor', 'CPF', 'callback_cpf_check|required|trim|min_length[11]|max_length[11]');
            $this->form_validation->set_rules('emailGestor', 'Email', 'required|trim|min_length[5]|max_length[70]|valid_email');
            $this->form_validation->set_rules('senhaAtual', 'Senha atual', 'required|min_length[6]|max_length[20]');

            if ($this->form_validation->run() == FALSE) {
                $idGestor = $_POST['idGestor'];
                $dados = array(
                    'gestor' => $this->gestor_model->obterGestor($idGestor)->result(),
                );

                $this->load->view('admin/formeAlterarGestor', $dados);
            } else {


                $idGestor = $_POST['idGestor'];
                $nomeGestor = $_POST['nomeGestor'];

                $emailGestor = $_POST['emailGestor'];
                $senhaAtual = md5($_POST['senhaAtual']);

                $testeGestor = FALSE;
                $gestorVerifica = $this->gestor_model->obterGestor($idGestor)->result();
                foreach ($gestorVerifica as $gv) {
                    if ($gv->senhaGestor == $senhaAtual) {
                        $testeGestor = TRUE;
                    }
                }

                if ($testeGestor == TRUE) {

                    $alterarGestor = array(
                        'nomeGestor' => $nomeGestor,
                        //   'cpfGestor' => $cpfGestor,
                        'emailGestor' => $emailGestor,
                    );
                    $this->gestor_model->alterarDadosGestor($alterarGestor, $idGestor);

                    $this->session->set_userdata('nomeGestor', $nomeGestor);
                    $this->session->set_userdata('emailGestor', $emailGestor);

                    echo "<script> alert('Os dados foram alterados com sucesso!'); location.href='" . base_url("cpainel/configuracao/") . "'; </script>";
                } else {
                    echo "<script> alert('Devido à divergência de informações os dados não podem ser alterados!'); Gestor.editarGestor()</script>";
                }
            }
        } else {
            redirect(base_url() . "administrador/seguranca");
        }
    }

    function excluirGestor() {
        if (($this->session->userdata('idAdmin')) && ($this->session->userdata('nomeAdmin')) && ($this->session->userdata('emailAdmin')) && ($this->session->userdata('senhaAdmin'))) {

            $idGestor = base64_decode($_POST['idGestor']);

            $this->gestor_model->excluirGestor($idGestor);

            echo "<script> Gestor.editarGestor() </script>";
        } else {
            redirect(base_url() . "administrador/seguranca");
        }
    }

    function bloqueioGestor() {
        if (($this->session->userdata('idAdmin')) && ($this->session->userdata('nomeAdmin')) && ($this->session->userdata('emailAdmin')) && ($this->session->userdata('senhaAdmin'))) {

            $dados = array(
                'gestor' => $this->gestor_model->obterTodosGestor()->result(),
            );

            $this->load->view('admin', $dados);
        } else {
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
                echo "<script> Gestor.editarGestor() </script>";
            }
        } else {
            redirect(base_url() . "administrador/seguranca");
        }
    }

}

?>

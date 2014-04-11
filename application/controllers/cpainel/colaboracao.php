<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class colaboracao extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->library('session');
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('cpainel/colaboracao_model');
        date_default_timezone_set('UTC');
        $this->load->library('email');
    }

    function index() {
        echo "ola";
    }

    function formularioColaboracaoAceita() {
        $dados = array(
            'idProblema' => $_POST['idProblema'],
        );

        $this->load->view('user_gestor/colaboracao/formularioColaboracaoAceita', $dados);
    }

    function formularioColaboracaoRejeitada() {
        $dados = array(
            'idProblema' => $_POST['idProblema'],
        );

        $this->load->view('user_gestor/colaboracao/formularioColaboracaoRejeitada', $dados);
    }

    function formularioColaboracaoPendente() {
        $dados = array(
            'idProblema' => $_POST['idProblema'],
        );

        $this->load->view('user_gestor/colaboracao/formularioColaboracaoPendente', $dados);
    }

    function aceitarColaboracao() {

        $idProblema = $_POST['idProblema'];
        $textoUsuario = $_POST['textoUsuario'];

        $dados = array(
            'idStatus' => '4',
        );
        $this->colaboracao_model->alterarStatus($dados, $idProblema);
        $cidadaoProblema = $this->colaboracao_model->obiterCidadaoProblema($idProblema)->result();

        $cp = get_object_vars($cidadaoProblema[0]);

        $ocorrenciasUser = array("[Usuário]", "[Usuario]", "[usuário]", "[usuario]", "[USUÁRIO]", "[USUARIO]");

        $textoUsuario = str_replace($ocorrenciasUser, $cp['nomeCidadao'], $textoUsuario);

        $ocorrenciasCod = array("[Código]", "[Codigo]", "[código]", "[codigo]", "[CÓDOGO]", "[CODIGO]");

        $textoUsuario = str_replace($ocorrenciasCod, $cp['idProblema'], $textoUsuario);

        echo $textoUsuario;


        $assunto = 'Colaboração aceita';
        $this->email->from('hairtontcc@yahoo.com.br', 'Problema urbano');
        $this->email->to($cp['emailCidadao']);
        $this->email->subject($assunto);
        $this->email->message($textoUsuario);

        if (!$this->email->send()) {
            echo $this->email->print_debugger();
        }

        echo "<script> Problema.verColaboracoes(1); Tela.fecharModal(); </script>";
    }

    function rejeitarColaboracao() {
        $idProblema = $_POST['idProblema'];
        $textoUsuario = $_POST['textoUsuario'];

        $dados = array(
            'idStatus' => '2',
        );
        $this->colaboracao_model->alterarStatus($dados, $idProblema);
        $cidadaoProblema = $this->colaboracao_model->obiterCidadaoProblema($idProblema)->result();

        $cp = get_object_vars($cidadaoProblema[0]);

        $ocorrenciasUser = array("[Usuário]", "[Usuario]", "[usuário]", "[usuario]", "[USUÁRIO]", "[USUARIO]");

        $textoUsuario = str_replace($ocorrenciasUser, $cp['nomeCidadao'], $textoUsuario);

        $ocorrenciasCod = array("[Código]", "[Codigo]", "[código]", "[codigo]", "[CÓDOGO]", "[CODIGO]");

        $textoUsuario = str_replace($ocorrenciasCod, $cp['idProblema'], $textoUsuario);

        echo $textoUsuario;

        $assunto = 'Colaboração Rejeitada';
        $this->email->from('hairtontcc@yahoo.com.br', 'Projeto TCC');
        $this->email->to($cp['emailCidadao']);
        $this->email->subject($assunto);
        $this->email->message($textoUsuario);

        if (!$this->email->send()) {
            echo $this->email->print_debugger();
        }

        echo "<script> Problema.verColaboracoes(1); Tela.fecharModal(); </script>";
    }

    function tornaPendenteColaboracao() {



        echo $idProblema = $_POST['idProblema'];
        $textoUsuario = $_POST['textoUsuario'];

        $dados = array(
            'idStatus' => '3',
        );
        $this->colaboracao_model->alterarStatus($dados, $idProblema);
        $cidadaoProblema = $this->colaboracao_model->obiterCidadaoProblema($idProblema)->result();

        foreach ($cidadaoProblema as $cp) {

            $assunto = 'Colaboração Pendente';
            $this->email->from('hairtontcc@yahoo.com.br', 'Projeto TCC');
            $this->email->to($cp->emailCidadao);
            $this->email->subject($assunto);
            $this->email->message($textoUsuario);

            if (!$this->email->send()) {
                echo $this->email->print_debugger();
            }
        }

        echo "<script> Problema.verColaboracoes(1);  </script>";
    }

    function iniciarObrasColaboracao() {
        $idProblema = $_POST['idProblema'];

        $dataConclusaoManutencao = date('Y-m-d');


        $textoMensagem = 'O problema que você manifestou no Projeto TCC esta em manutenção. Acesso os sistema e confira as outras manifestações.';

        $dados = array(
            'idStatus' => '5',
        );
        $this->colaboracao_model->alterarStatus($dados, $idProblema);
        $cidadaoProblema = $this->colaboracao_model->obiterCidadaoProblema($idProblema)->result();

        foreach ($cidadaoProblema as $cp) {

            $assunto = 'Colaboração em manutenção';
            $this->email->from('hairtontcc@yahoo.com.br', 'Projeto TCC');
            $this->email->to($cp->emailCidadao);
            $this->email->subject($assunto);
            $this->email->message($textoMensagem);

            if (!$this->email->send()) {
                echo $this->email->print_debugger();
            }
        }

        echo "<script> Problema.verColaboracoes(3); Tela.fecharModal(); </script>";
    }

    function alterarStatusConcluido() {
        $idProblema = $_POST['idProblema'];

        $dataConclusaoManutencao = date('Y-m-d');

        $textoMensagem = 'O problema que você manifestou no Projeto TCC esta Cocluido. Acesse os sistema e cofirma se a mesma foi realmente foi concluido. </br>Grato';

        $dados = array(
            'idStatus' => '6',
        );
        $this->colaboracao_model->alterarStatus($dados, $idProblema);
        $cidadaoProblema = $this->colaboracao_model->obiterCidadaoProblema($idProblema)->result();

        foreach ($cidadaoProblema as $cp) {


            $assunto = 'Colaboração Concluida';
            $this->email->from('hairtontcc@yahoo.com.br', 'Projeto TCC');
            $this->email->to($cp->emailCidadao);
            $this->email->subject($assunto);
            $this->email->message($textoMensagem);

            if (!$this->email->send()) {
                echo $this->email->print_debugger();
            }
        }
        echo "<script> Problema.verColaboracoes(4); Tela.fecharModal(); </script>";
    }

}

?>

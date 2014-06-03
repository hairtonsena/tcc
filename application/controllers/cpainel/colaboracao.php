<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class colaboracao extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('UTC');
        $this->load->library('session');
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('cpainel/colaboracao_model');
        $this->load->library('email');
    }

    function index() {
        redirect(base_url("cpainel/home"));
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

        $latLog = base64_encode('(' . $cp['latitude'] . ',' . $cp['longitude'] . ')');

        $problemaUrbanoEmail = '<br/><br/><strong>Dados do problema</strong><br/>Tipo: ' . $cp['tipo'] . '<br/>Descrição: ' . $cp['descricao'] . '<br/>Data de abertura: ' . implode("/", array_reverse(explode("-", $cp['data']))) . ' <br/>Situação: ' . $cp['nomeStatus'];

        $textoUsuario = $textoUsuario . $problemaUrbanoEmail;

        $textoUsuario = $textoUsuario . '<br/>
            <br/>Para visualizar o problema clique <a href="' . base_url("?problema=" . $latLog) . '">aqui</a></br> ';

        $assunto = 'Colaboração aceita';
        $this->email->from('hairtontcc@yahoo.com.br', 'Problemas urbanos');
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


        $latLog = base64_encode('(' . $cp['latitude'] . ',' . $cp['longitude'] . ')');
        $problemaUrbanoEmail = '<br/><br/><strong>Dados do problema</strong><br/>Tipo: ' . $cp['tipo'] . '<br/>Descrição: ' . $cp['descricao'] . '<br/>Data de abertura: ' . implode("/", array_reverse(explode("-", $cp['data']))) . ' <br/>Situação: ' . $cp['nomeStatus'];
        $textoUsuario = $textoUsuario . $problemaUrbanoEmail;
        $textoUsuario = $textoUsuario . '<br/>
            <br/>Para visualizar o problema clique <a href="' . base_url("?problema=" . $latLog) . '">aqui</a></br> ';


        $assunto = 'Colaboração rejeitada';
        $this->email->from('hairtontcc@yahoo.com.br', 'Problemas urbanos');
        $this->email->to($cp['emailCidadao']);
        $this->email->subject($assunto);
        $this->email->message($textoUsuario);

        if (!$this->email->send()) {
            $this->email->print_debugger();
        }

        echo "<script> Problema.verColaboracoes(1); Tela.fecharModal(); </script>";
    }

    function tornaPendenteColaboracao() {


        $idProblema = $_POST['idProblema'];
        $textoUsuario = $_POST['textoUsuario'];

        $dados = array(
            'idStatus' => '3',
        );
        $this->colaboracao_model->alterarStatus($dados, $idProblema);
        $cidadaoProblema = $this->colaboracao_model->obiterCidadaoProblema($idProblema)->result();

        $cp = get_object_vars($cidadaoProblema[0]);

        $ocorrenciasUser = array("[Usuário]", "[Usuario]", "[usuário]", "[usuario]", "[USUÁRIO]", "[USUARIO]");
        $textoUsuario = str_replace($ocorrenciasUser, $cp['nomeCidadao'], $textoUsuario);
        $ocorrenciasCod = array("[Código]", "[Codigo]", "[código]", "[codigo]", "[CÓDOGO]", "[CODIGO]");
        $textoUsuario = str_replace($ocorrenciasCod, $cp['idProblema'], $textoUsuario);


        $latLog = base64_encode('(' . $cp['latitude'] . ',' . $cp['longitude'] . ')');
        $problemaUrbanoEmail = '<br/><br/><strong>Dados do problema</strong><br/>Tipo: ' . $cp['tipo'] . '<br/>Descrição: ' . $cp['descricao'] . '<br/>Data de abertura: ' . implode("/", array_reverse(explode("-", $cp['data']))) . ' <br/>Situação: ' . $cp['nomeStatus'];
        $textoUsuario = $textoUsuario . $problemaUrbanoEmail;
        $textoUsuario = $textoUsuario . '<br/>
            <br/>Para visualizar o problema clique <a href="' . base_url("?problema=" . $latLog) . '">aqui</a></br> ';


        $assunto = 'Colaboração pendente';
        $this->email->from('hairtontcc@yahoo.com.br', 'Problemas urbanos');
        $this->email->to($cp['emailCidadao']);
        $this->email->subject($assunto);
        $this->email->message($textoUsuario);

        if (!$this->email->send()) {
            echo $this->email->print_debugger();
        }


        echo "<script> Problema.verColaboracoes(1);  </script>";
    }

    function iniciarObrasColaboracao() {
        $idProblema = $_POST['idProblema'];

        $dados = array(
            'idStatus' => '5',
        );
        $this->colaboracao_model->alterarStatus($dados, $idProblema);
        $cidadaoProblema = $this->colaboracao_model->obiterCidadaoProblema($idProblema)->result();

        $cp = get_object_vars($cidadaoProblema[0]);

        $textoMensagem = $cp['nomeCidadao'] . ', o problema que você nos apresentou, já está em execução, confira no link abaixo. <a href="' . base_url() . '">Click aqui</a> e acesso os sistema e confira as outras reportagens.';


        //$latLog = base64_encode('(' . $cp['latitude'] . ',' . $cp['longitude'] . ')');
        $problemaUrbanoEmail = '<br/><br/><strong>Dados do problema</strong><br/>Tipo: ' . $cp['tipo'] . '<br/>Descrição: ' . $cp['descricao'] . '<br/>Data de abertura: ' . implode("/", array_reverse(explode("-", $cp['data']))) . ' <br/>Situação: ' . $cp['nomeStatus'];
        $textoMensagem = $textoMensagem . $problemaUrbanoEmail;
        $textoUsuario = $textoUsuario . '<br/>
            <br/>Para visualizar o problema clique <a href="' . base_url("?problema=" . $latLog) . '">aqui</a></br> ';



        $assunto = 'Colaboração em manutenção';
        $this->email->from('hairtontcc@yahoo.com.br', 'Problemas urbanos');
        $this->email->to($cp['emailCidadao']);
        $this->email->subject($assunto);
        $this->email->message($textoMensagem);

        if (!$this->email->send()) {
            echo $this->email->print_debugger();
        }


        echo "<script> Problema.verColaboracoes(3); Tela.fecharModal(); </script>";
    }

    function alterarStatusConcluido() {
        $idProblema = $_POST['idProblema'];


        $dados = array(
            'idStatus' => '6',
        );
        $this->colaboracao_model->alterarStatus($dados, $idProblema);
        $cidadaoProblema = $this->colaboracao_model->obiterCidadaoProblema($idProblema)->result();

        $cp = get_object_vars($cidadaoProblema[0]);

        $latLog = base64_encode('(' . $cp['latitude'] . ',' . $cp['longitude'] . ')');

        $textoMensagem = $cp['nomeCidadao'] . ', o problema que você aprensentou já foi concluído. Para visualizar <a href="' . base_url("?problema=" . $latLog) . '">Clique aqui</a>.';

        //     $textoMensagem =  ', o problema urbano que você reportou esta em manutenção.  e acesso os sistema e confira as outras reportagens.';

        $problemaUrbanoEmail = '<br/><br/><strong>Dados do problema</strong><br/>Tipo: ' . $cp['tipo'] . '<br/>Descrição: ' . $cp['descricao'] . '<br/>Data de abertura: ' . implode("/", array_reverse(explode("-", $cp['data']))) . ' <br/>Situação: ' . $cp['nomeStatus'];
        $textoMensagem = $textoMensagem . $problemaUrbanoEmail;
//        $textoUsuario = $textoUsuario . '<br/>
//            <br/>Para visualizar o problema click <a href="' . base_url("?problema=" . $latLog) . '">aqui</a></br> ';


        $assunto = 'Colaboração concluída';
        $this->email->from('hairtontcc@yahoo.com.br', 'Problemas urbanos');
        $this->email->to($cp['emailCidadao']);
        $this->email->subject($assunto);
        $this->email->message($textoMensagem);

        if (!$this->email->send()) {
            echo $this->email->print_debugger();
        }

        echo "<script> Problema.verColaboracoes(4); Tela.fecharModal(); </script>";
    }

    function verCometarioModerar() {

        $dados = array(
            'cometarios_moderar' => $this->colaboracao_model->obterComentarioNaoModerados()->result(),
        );

        $this->load->view('user_gestor/colaboracao/comentariosModerar_view', $dados);
    }

    function aceitarComentario() {
        if (isset($_POST['idComentario'])) {
            $idComentario = $_POST['idComentario'];
            $dados = array(
                'statusComentario' => 1,
            );

            $this->colaboracao_model->alterarComentario($idComentario, $dados);
            $comentariaNaoAvaliados = $this->colaboracao_model->obterComentarioNaoModerados()->result();
            echo count($comentariaNaoAvaliados);
        }
    }

    function rejeitarComentario() {
        if (isset($_POST['idComentario'])) {
            $idComentario = $_POST['idComentario'];
            $this->colaboracao_model->excluirComentarioRejeitado($idComentario);
            $comentariaNaoAvaliados = $this->colaboracao_model->obterComentarioNaoModerados()->result();
            echo count($comentariaNaoAvaliados);
        }
    }

    function verComentariosPorPorblema() {
        if (isset($_POST['idProblema'])) {
            $idProblema = $_POST['idProblema'];

            $dados = array(
                'problemaComentario' => $this->colaboracao_model->obiterProblema($idProblema)->result(),
                'comentarios_problema' => $this->colaboracao_model->obterComentarioPorColaboracao($idProblema)->result(),
            );

            $this->load->view('user_gestor/colaboracao/verComentario_view', $dados);
        }
    }

}

?>

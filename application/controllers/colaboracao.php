<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class colaboracao extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('UTC');
        $this->load->helper('url');
        $this->load->database();
        $this->load->library('session');
        $this->load->library('email');
        $this->load->library('form_validation');
        $this->load->library('upload');
        $this->load->model('manimaps/tipo_model');
        $this->load->model('manimaps/colaboracao_model');
        $this->load->model('cpainel/gestor_model');
    }

    function index() {
        redirect(base_url());
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
        if (($this->session->userdata('idCidadao')) && ($this->session->userdata('nomeCidadao')) && ($this->session->userdata('emailCidadao')) && ($this->session->userdata('senhaCidadao'))) {

            $this->form_validation->set_rules('descricao', 'Descrição', 'required|min_length[6]');

            if ($this->form_validation->run() == FALSE) {
                echo "<script> alert('A colaboração não foi realizada, descrição deve ter mais de seis letras.'); Tela.fecharModal(); </script>";
            } else {

                $descricao = strip_tags($this->input->post('descricao'));

                if (strlen($descricao) < 7) {
                    echo "<script> alert('A colaboração não foi realizada, descrição deve ter mais de seis letras.'); Tela.fecharModal(); </script>";
                    exit();
                };


                $dadosColaboracao = array(
                    'idProblema' => '',
                    'descricao' => $descricao,
                    'data' => date('y-m-d'),
                    'latitude' => $this->input->post('latitude'),
                    'longitude' => $this->input->post('longitude'),
                    'idTipo' => $this->input->post('tipo'),
                    'idStatus' => '1',
                    'idCidadao' => $this->session->userdata('idCidadao'),
                );

                $this->colaboracao_model->inserirNovaColaboracao($dadosColaboracao);

                $query = $this->colaboracao_model->obterColaboracaoInserida($dadosColaboracao)->result();

                $textoMensagem = "Uma nova reclamação e/ou sugestação foi recebido.<br/>  
                                Click <a href='" . base_url("administrativo") . "'>aqui</a> para acessar o sistema e avaliar a colaboração.    
                               ";

                $tituloMensagem = 'Problema urbano, nova Colaboração';

                $gestorEmail = $this->gestor_model->obterTodosGestor()->result();
                $ge = get_object_vars($gestorEmail[0]);

                $assunto = $tituloMensagem;

                // $assunto = 'Novo Email Projeto TCC';
                $this->email->from('hairtontcc@yahoo.com.br', 'Problema urbano');
                $this->email->to($ge['emailGestor']);
                $this->email->subject($assunto);
                $this->email->message($textoMensagem);

                if (!$this->email->send()) {
                    $this->email->print_debugger();
                }

                $idProblema = 0;
                foreach ($query as $qr) {
                    $idProblema = $qr->idProblema;
                }

                echo '<script> Problema.verColaboracoesAposSalvar() </script>';

                $this->formEnviarImagem($idProblema);
//                
//                echo '
//                <div class="modal-header">
//                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
//
//                    <h4 class="modal-title"> Registro de problema</h4>
//                </div>            
//                <div class="modal-body"> O problema foi registrado com sucesso. <br/>
//                    <button type="button" onclick="Tela.fecharModal()" class="btn btn-default">ok</a>
//                </div>';
            }
        }
    }

    public function formEnviarImagem($idProblema = NULL) {
        if (($this->session->userdata('idCidadao')) && ($this->session->userdata('nomeCidadao')) && ($this->session->userdata('emailCidadao')) && ($this->session->userdata('senhaCidadao'))) {

            if ($idProblema == NULL) {
                echo '<script> Tela.fecharModal(); </script> ';
            } else {
                $dados = array(
                    'problema' => $idProblema,
                );

                $this->load->view("user_cidadao/colaboracao/formUploadImagem", $dados);
            }
        }
    }

    public function salvarImagem() {
        if (($this->session->userdata('idCidadao')) && ($this->session->userdata('nomeCidadao')) && ($this->session->userdata('emailCidadao')) && ($this->session->userdata('senhaCidadao'))) {

            $id_problema = $this->input->post('problema');

            $diretorio_anexo_mural = 'imagem/';

            $field_name = "arquivo";


            $config['remove_spaces'] = TRUE;
            $config['encrypt_name'] = TRUE;
            $config['upload_path'] = $diretorio_anexo_mural; // server directory
            $config['allowed_types'] = 'jpg|jpeg|png'; // by extension, will check for whether it is an image
            $config['max_size'] = '100000000000000'; // in kb
            $config['is_image'] = 1;


            $this->upload->initialize($config);

            $files = $this->upload->do_upload($field_name);

            if (!$files) {

                $error = $this->upload->display_errors('<div class="alert alert-danger">', '<div>');

                echo $error;
            } else {

                $dadosImagem = $this->upload->data();

              //  $this->load->library('image_lib');
             //   $config = array();

//                $config['source_image'] = $diretorio_anexo_mural . $dadosImagem['file_name'];
//                $config['create_thumb'] = false;
//                $config['maintain_ratio'] = TRUE;
//                $config['largura'] = 300;
//                $config['altura'] = 200;
//                $config['master_dim'] = 'auto';
//                $config['new_image'] = $diretorio_anexo_mural . $dadosImagem['file_name'];

//
//                $config['image_library'] = 'gd';
//                $config['source_image'] = $diretorio_anexo_mural.$dadosImagem['file_name'];
//                $config['create_thumb'] = TRUE;
//                $config['maintain_ratio'] = TRUE;
//                $config['width'] = 75;
//                $config['height'] = 50;



               // $this->image_lib->initialize($config);

                // $this->image_lib->resize();

//                if (!$this->image_lib->resize()) {
//                    echo $this->image_lib->display_errors();
//                } 
//                else {
//                    echo "deu certo";
//                }



                // print_r($dadosImagem);


                $dados = array(
                    'imagemProblema' => $dadosImagem['file_name']
                );

                $this->colaboracao_model->alterarDadosColaboracao($dados, $id_problema);

                echo '<script> Problema.verColaboracoesAposSalvar() </script>';
                echo "<div class=\"alert alert-success\"> Imagem enviado com sucesso!</div>";
//                $dados = array(
//                    'nome_arquivo_am' => $nome_arquivo,
//                    'arquivo_am' => $nome_anexo,
//                    'id_mural' => $id_mural,
//                    'data_am' => date("Y-m-d"),
//                    'status_am' => 0
//                );
                //$this->mural_model->salvarAnexoMural($dados);
            }
        }
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
            $this->form_validation->set_rules('descricao', 'Descrição', 'required|min_length[6]');

            if ($this->form_validation->run() == FALSE) {
                echo "<script> alert('A colaboração não foi alterada, descrição deve ter mais de seis letras.'); Tela.fecharModal(); </script>";
            } else {

                $descricao = strip_tags($this->input->post('descricao'));

                if (strlen($descricao) < 7) {
                    echo "<script> alert('A colaboração não foi alterada, descrição deve ter mais de seis letras.'); Tela.fecharModal(); </script>";
                    exit();
                };


                $idProblema = $this->input->post('idProblema');
                $tipo = $this->input->post('tipo');


                $dados = array(
                    'descricao' => $descricao,
                    'idTipo' => $tipo,
                    'idStatus' => '1',
                );

                $this->colaboracao_model->alterarColaboracaoPendente($dados, $idProblema);

                echo '<script> Problema.verColaboracoesAposSalvar() </script>';
                echo '
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                    <h4 class="modal-title"> Alterar problema </h4>
                </div>            
                <div class="modal-body"> O problema foi alterado com sucesso. <br/>
                    <button type="button" onclick="Tela.fecharModal()" class="btn btn-default">ok</a>
                </div>';
            }
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
        if (($this->session->userdata('idCidadao')) && ($this->session->userdata('nomeCidadao')) && ($this->session->userdata('emailCidadao')) && ($this->session->userdata('senhaCidadao'))) {

            $idProblema = $_POST['idProblema'];
            $dados = array(
                'idStatus' => '7',
            );

            $this->colaboracao_model->alterarStatusConclusao($dados, $idProblema);
            echo "<script> Problema.verColaboracoes(0) </script>";
        }
    }

    function apoiarProblema() {

        if (($this->session->userdata('idCidadao')) && ($this->session->userdata('nomeCidadao')) && ($this->session->userdata('emailCidadao')) && ($this->session->userdata('senhaCidadao'))) {

            $idProblema = $_POST['idProblema'];


            $qtdeApoioProblema = $this->colaboracao_model->verificarUserApoio($idProblema, $this->session->userdata('idCidadao'));

            if ($qtdeApoioProblema < 1) {

                $dados = array(
                    'idProblema' => $idProblema,
                    'idCidadao' => $this->session->userdata('idCidadao'),
                    'statusApoio' => '1',
                );

                $this->colaboracao_model->persistirApoiarProblema($dados);
            }

            echo $this->colaboracao_model->quatidadeApoioProblema($idProblema);
        }
    }

    function reprovaProblema() {
        if (($this->session->userdata('idCidadao')) && ($this->session->userdata('nomeCidadao')) && ($this->session->userdata('emailCidadao')) && ($this->session->userdata('senhaCidadao'))) {

            $idProblema = $_POST['idProblema'];

            $qtdeReprovaProblema = $this->colaboracao_model->verificarUserReprovado($idProblema, $this->session->userdata('idCidadao'));

            if ($qtdeReprovaProblema < 1) {
                $dados = array(
                    'idProblema' => $idProblema,
                    'idCidadao' => $this->session->userdata('idCidadao'),
                    'statusDenuncia' => '1',
                );

                $this->colaboracao_model->persistirReprovarProblema($dados);
            }
            echo $this->colaboracao_model->quatidadeDenunciaProblema($idProblema);
        }
    }

}

?>

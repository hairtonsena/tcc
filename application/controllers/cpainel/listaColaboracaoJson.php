<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// configurando a classe
class listaColaboracaoJson extends CI_Controller {
    
    // construtor da classe
    public function __construct() {
        parent::__construct();
        // carregando as bibliotecas, os model, os helper e as configurações do CI
        $this->load->library('session');
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('cpainel/colaboracao_model');
    }

    // função inicial da classe
    function index() {

        $colaboracoesListadas;
        // verificando se o Get foi enviado pelo json
        if ((isset($_GET['status'])) && (isset($_GET['categoria']))) {
            // capturando os Get;
            $status = $_GET['status'];
            $categoria = $_GET['categoria'];
            // fazendo um consulta de acordo com o status e a categoria e atribuindo no array. 
            $colaboracoesListadas = $this->colaboracao_model->obterColaboracoes($status, $categoria)->result();
        }


        // declarando um array.
        $dados = array();
        // percorrendo o array para modificar a data.
        foreach ($colaboracoesListadas as $cl) {
            // pegando a data e dividindo pelo traço
            $data = explode('-', $cl->data);
            // modificando a data para o medelo brasileiro
            $dataBrasil = $data[2] . '/' . $data[1] . '/' . $data[0];
            // incluindo novamento no array.
            $cl->dataProblema = "$dataBrasil";
            // incrementando o array declarado
            $dados[] = $cl;
        }
        // Gerando a resposta json apartir do array php.
        echo json_encode($dados);
    }
    //
}

?>

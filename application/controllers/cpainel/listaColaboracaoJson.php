<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// configurando a classe
class listaColaboracaoJson extends CI_Controller {
    
    // construtor da classe
    public function __construct() {
        parent::__construct();
        // carregando as bibliotecas, os model, os helper e as configurações do CI
        date_default_timezone_set('UTC');
        $this->load->library('session');
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('cpainel/colaboracao_model');
        
    }

    // função inicial da classe
    function index() {

        $colaboracoesListadas;
        // verificando se o Get foi enviado pelo json
        if ((isset($_GET['status'])) && (isset($_GET['categoria']))&&(isset($_GET['ordem']))) {
            // capturando os Get;
            $status = $_GET['status'];
            $categoria = $_GET['categoria'];
            $ordem = $_GET['ordem'];
            // fazendo um consulta de acordo com o status e a categoria e atribuindo no array. 
            $colaboracoesListadas = $this->colaboracao_model->obterColaboracoes($status, $categoria,$ordem)->result();
        }


        // declarando um array.
        $dados = array();
        // percorrendo o array para modificar a data.
        foreach ($colaboracoesListadas as $cl) {
            
            
            $dataAtual = strtotime(date("y-m-d"));
            $dataAbertura = strtotime($cl->data);
            $diferenca = $dataAtual - $dataAbertura; // 19522800 segundos
            $dias = (int) floor($diferenca / (60 * 60 * 24)); // 225 dias

            $tempo = '';

            if ($dias == 0) {
                $tempo = 'Aberto hoje';
            } else if ($dias < 7) {
                if ($dias == 1) {
                    $tempo = 'Aberto ontem';
                } else {

                    $tempo = 'Aberto há ' . $dias . ' dias';
                }
            } else if ($dias < 30) {
                $semana = (int) floor($dias / 7);
                if ($semana == 1) {
                    $tempo = 'Aberto há ' . $semana . ' semana';
                } else {
                    $tempo = 'Aberto há ' . $semana . ' semanas';
                }
            } else if ($dias < 365) {
                $mes = (int) floor($dias / 30);
                if ($mes == 1) {
                    $tempo = 'Aberto há ' . $mes . ' mês';
                } else {
                    $tempo = 'Aberto há ' . $mes . ' meses';
                }
            } else {
                $ano = (int) floor($dias / 365);
                if ($ano == 1) {
                    $tempo = 'Aberto há ' . $ano . ' ano';
                } else {
                    $tempo = 'Aberto há ' . $ano . ' anos';
                }
            }
            // pegando a data e dividindo pelo traço
           // $data = explode('-', $cl->data);
            // modificando a data para o medelo brasileiro
            $dataBrasil = $tempo;   // $data[2] . '/' . $data[1] . '/' . $data[0];
            
            
            
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

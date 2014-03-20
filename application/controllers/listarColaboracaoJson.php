<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ListarColaboracaoJson extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->library('session');
        $this->load->model('manimaps/colaboracao_model');
    }

    public function index() {


        $colaboracoesListadas;

        $userLogado = 'nao';
        if (($this->session->userdata('idCidadao')) && ($this->session->userdata('nomeCidadao')) && ($this->session->userdata('emailCidadao')) && ($this->session->userdata('senhaCidadao'))) {
            $userLogado = 'sim';
        } else {
            $userLogado = 'nao';
        }



        if ((isset($_GET['status'])) && (isset($_GET['categoria'])) && (isset($_GET['idProblema']))) {
            $status = $_GET['status'];
            $categoria = $_GET['categoria'];
            $idProblema = $_GET['idProblema'];

            $colaboracoesListadas = $this->colaboracao_model->obterColaboracoes($status, $categoria, $idProblema, $userLogado)->result();
        }


        $todasManifestacoes = array();

        foreach ($colaboracoesListadas as $cl) {

            $quantidadeComentario = 0;
            $quantidadeComentario = $this->colaboracao_model->quatidadeComentarioPorColaboracao($cl->idProblema);


            $user = 'nao';


            //$data = explode('-', $cl->data);

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

                    $tempo = 'Aberto a ' . $dias . ' dias';
                }
            } else if ($dias < 30) {
                $semana = (int) floor($dias / 7);
                if ($semana == 1) {
                    $tempo = 'Aberto a ' . $semana . ' semana';
                } else {
                    $tempo = 'Aberto a ' . $semana . ' semanas';
                }
            } else if ($dias < 365) {
                $mes = (int) floor($dias / 30);
                if ($mes == 1) {
                    $tempo = 'Aberto a ' . $mes . ' mês';
                } else {
                    $tempo = 'Aberto a ' . $mes . ' mêses';
                }
            } else {
                $ano = (int) floor($dias / 365);
                if ($ano == 1) {
                    $tempo = 'Aberto a ' . $ano . ' ano';
                } else {
                    $tempo = 'Aberto a ' . $ano . ' anos';
                }
            }





            $dataBrasil = $tempo;    //$data[2] . '/' . $data[1] . '/' . $data[0];


            $cl->dataProblema = "$dataBrasil";
            $cl->userLogado = $userLogado;
            $cl->quantidadeComentario = "$quantidadeComentario";
            $cl->user = "$userLogado";

            $todasManifestacoes[] = $cl;
        }

        echo json_encode($todasManifestacoes);
    }

}
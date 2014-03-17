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

            $colaboracoesListadas = $this->colaboracao_model->obterColaboracoes($status, $categoria, $idProblema,$userLogado)->result();
        }


        $todasManifestacoes = array();

        foreach ($colaboracoesListadas as $cl) {

            $quantidadeComentario = 0;
            $quantidadeComentario = $this->colaboracao_model->quatidadeComentarioPorColaboracao($cl->idProblema);


            $user = 'nao';


            $data = explode('-', $cl->data);
            $dataBrasil = $data[2] . '/' . $data[1] . '/' . $data[0];


            $cl->dataProblema = "$dataBrasil";
            $cl->userLogado = $userLogado;
            $cl->quantidadeComentario = "$quantidadeComentario";
            $cl->user = "$userLogado";

            $todasManifestacoes[] = $cl;
        }

        echo json_encode($todasManifestacoes);
    }

}
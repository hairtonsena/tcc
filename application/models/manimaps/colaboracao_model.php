<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of colaboracao_model
 *
 * @author hairton
 */
class colaboracao_model extends CI_Model {

    function obterColaboracoes($status, $categoria, $ordem, $idProblema, $userLogado) {
        $opcaoOrdem = "";
        $tipoOrdem = "";
        switch ($ordem) {
            // ordenado por data decrescente
            case 0: {
                    $opcaoOrdem = "data";
                    $tipoOrdem = "desc";
                }
                break;
            // ordenado por data crescente
            case 1: {
                    $opcaoOrdem = "data";
                    $tipoOrdem = "cres";
                }
                break;
            // ordenar por mais comentado 
            case 2: {
                    $opcaoOrdem = "qtde_comentario";
                    $tipoOrdem = "desc";
                }
                break;
            // ordenar por menos comentados    
            case 3 : {
                    $opcaoOrdem = "qtde_comentario";
                    $tipoOrdem = "cres";
                }
                break;
        }
        if (($status == 0) && ($categoria == 0)) {

            $this->db->select('*');
            $this->db->from('vw_consulta_problema');
            // $this->db->join('tipo', 'tipo.idTipo = problema.idTipo');
            // $this->db->join('status', 'status.idStatus = problema.idStatus');
            $this->db->where('idStatus >', '3');
            $this->db->where('idStatus <', '8');
            $this->db->order_by($opcaoOrdem, $tipoOrdem);
            return $query = $this->db->get();
        } else if (($status == 0) && ($categoria > 0)) {


            $this->db->select('*');
            $this->db->from('problema');
            $this->db->join('tipo', 'tipo.idTipo = problema.idTipo');
            $this->db->join('status', 'status.idStatus = problema.idStatus');
            $this->db->where('problema.idStatus >', '3');
            $this->db->where('problema.idStatus <', '8');
            $this->db->where('problema.idTipo =', $categoria);
            return $query = $this->db->get();
        } else if ((($status > 0) && ($status < 8)) && ($categoria == 0)) {


            $this->db->select('*');
            $this->db->from('problema');
            $this->db->join('tipo', 'tipo.idTipo = problema.idTipo');
            $this->db->join('status', 'status.idStatus = problema.idStatus');
            $this->db->where('problema.idStatus =', $status);
            $this->db->order_by("data", "desc");
            return $query = $this->db->get();
        } elseif ((($status > 0) && ($status < 8)) && ($categoria > 0)) {

            $this->db->select('*');
            $this->db->from('problema');
            $this->db->join('tipo', 'tipo.idTipo = problema.idTipo');
            $this->db->join('status', 'status.idStatus = problema.idStatus');
            $this->db->where('problema.idStatus =', $status);
            $this->db->where('problema.idTipo =', $categoria);
            return $query = $this->db->get();
        } else if ($idProblema != 0) {

            $this->db->select('*');
            $this->db->from('problema');
            $this->db->join('tipo', 'tipo.idTipo = problema.idTipo');
            $this->db->join('status', 'status.idStatus = problema.idStatus');
            $this->db->where('problema.idProblema =', $idProblema);
            return $this->db->get();
        } elseif (($userLogado == 'sim') && ($status == -1) && ($categoria == -1) && ($idProblema == 0)) {

            $idCidadao = $this->session->userdata('idCidadao');
            $this->db->select('*');
            $this->db->from('problema');
            $this->db->join('tipo', 'tipo.idTipo = problema.idTipo');
            $this->db->join('status', 'status.idStatus = problema.idStatus');
            $this->db->where('problema.idCidadao =', $idCidadao);
            return $this->db->get();
        };
        // }
    }

    function inserirNovaColaboracao($dados) {
        $this->db->insert('problema', $dados);
    }

    function persistirApoiarProblema($dados) {
        $this->db->insert('apoioProblema', $dados);
    }

    function obterColaboracaoInserida($dados) {
        return $this->db->get_where('problema', array('longitude' => $dados['longitude'], 'latitude' => $dados['latitude']));
    }

    function quatidadeApoioProblema($problema) {

        $this->db->from('apoioProblema');
        $this->db->where('idProblema =', $problema);

        return $this->db->count_all_results();
    }

    function quatidadeDenunciaProblema($problema) {
        $this->db->from('denuciarProblema');
        $this->db->where('idProblema =', $problema);

        return $this->db->count_all_results();
    }

    function obterColaboracaoEdicao($idColaboracao) {
        return $this->db->get_where('problema', array('idProblema' => $idColaboracao));
    }

    function alterarColaboracaoPendente($dados, $idPoblema) {
        $this->db->where('idProblema', $idPoblema);
        $this->db->update('problema', $dados);
    }

    function alterarStatusConclusao($dados, $idPoblema) {
        $this->db->where('idProblema', $idPoblema);
        $this->db->update('problema', $dados);
    }

}

?>

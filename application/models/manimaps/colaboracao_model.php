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

    function obterColaboracoes($status, $categoria, $ordem, $idProblema, $minhasColaboracoes, $userLogado) {
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
            case 4 : {
                    $opcaoOrdem = "qtde_apoio";
                    $tipoOrdem = "desc";
                }
                break;
            case 5 : {
                    $opcaoOrdem = "qtde_apoio";
                    $tipoOrdem = "cres";
                }
                break;
            case 6 : {
                    $opcaoOrdem = "qtde_denuncia";
                    $tipoOrdem = "desc";
                }
                break;
            case 7 : {
                    $opcaoOrdem = "qtde_denuncia";
                    $tipoOrdem = "cres";
                }
                break;
        }
        if (($status == 0) && ($categoria == 0)) {

            $this->db->select('*');
            $this->db->from('vw_consulta_principal');

            if (($userLogado == 'sim') && ($minhasColaboracoes == 1)) {
                $idCidadao = $this->session->userdata('idCidadao');
                $this->db->where('idCidadao =', $idCidadao);
            } else {
                $this->db->where('idStatus >', '3');
                $this->db->where('idStatus <', '8');
            }
            $this->db->order_by($opcaoOrdem, $tipoOrdem);

            return $query = $this->db->get();
        } else if (($status == 0) && ($categoria > 0)) {


            $this->db->select('*');
            $this->db->from('vw_consulta_principal');

            if (($userLogado == 'sim') && ($minhasColaboracoes == 1)) {
                $idCidadao = $this->session->userdata('idCidadao');
                $this->db->where('idCidadao =', $idCidadao);
            } else {
                $this->db->where('idStatus >', '3');
                $this->db->where('idStatus <', '8');
            }

            $this->db->where('idTipo =', $categoria);

            $this->db->order_by($opcaoOrdem, $tipoOrdem);
            return $query = $this->db->get();
        } else if ((($status > 0) && ($status < 8)) && ($categoria == 0)) {


            $this->db->select('*');

            $this->db->from('vw_consulta_principal');

            if (($userLogado == 'sim') && ($minhasColaboracoes == 1)) {
                $idCidadao = $this->session->userdata('idCidadao');
                $this->db->where('idCidadao =', $idCidadao);
            }

            $this->db->where('idStatus =', $status);
            $this->db->order_by($opcaoOrdem, $tipoOrdem);

            return $query = $this->db->get();
        } elseif ((($status > 0) && ($status < 8)) && ($categoria > 0)) {

            $this->db->select('*');
            $this->db->from('vw_consulta_principal');
            if (($userLogado == 'sim') && ($minhasColaboracoes == 1)) {
                $idCidadao = $this->session->userdata('idCidadao');
                $this->db->where('idCidadao =', $idCidadao);
            }
            $this->db->where('idStatus =', $status);
            $this->db->where('idTipo =', $categoria);

            $this->db->order_by($opcaoOrdem, $tipoOrdem);
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
        $this->db->insert('apoioproblema', $dados);
    }

    function persistirReprovarProblema($dados) {
        $this->db->insert('denunciaproblema', $dados);
    }

    function obterColaboracaoInserida($dados) {
        return $this->db->get_where('problema', array('longitude' => $dados['longitude'], 'latitude' => $dados['latitude']));
    }

    function obterColaboracaoUserEmail($dados) {
        $this->db->select('*');
        $this->db->from('problema');
        $this->db->join('tipo', 'tipo.idTipo = problema.idTipo');
        $this->db->join('status', 'status.idStatus = problema.idStatus');
        $this->db->where(array('longitude' => $dados['longitude'], 'latitude' => $dados['latitude']));
//      
        return $this->db->get();
    }

    function obterProblema($idProblema) {
        $this->db->select('*');
        $this->db->from('problema');
        $this->db->join('tipo', 'tipo.idTipo = problema.idTipo');
        $this->db->join('status', 'status.idStatus = problema.idStatus');
        $this->db->where(array('idProblema' => $idProblema));
        return $this->db->get();
    }

    function quatidadeApoioProblema($problema) {

        $this->db->from('apoioproblema');
        $this->db->where('idProblema =', $problema);

        return $this->db->count_all_results();
    }

    function verificarUserApoio($idProblema, $idUser) {
        $this->db->from('apoioproblema');
        $this->db->where('idProblema =', $idProblema);
        $this->db->where('idCidadao =', $idUser);
        return $this->db->count_all_results();
    }

    function verificarUserReprovado($idProblema, $idUser) {
        $this->db->from('denunciaproblema');
        $this->db->where('idProblema =', $idProblema);
        $this->db->where('idCidadao =', $idUser);
        return $this->db->count_all_results();
    }

    function quatidadeDenunciaProblema($problema) {
        $this->db->from('denunciaproblema');
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

    
    function obterConfiguracoa(){
        return $this->db->get('configuracao');
    }
}

?>

<?php

class colaboracao_model extends CI_Model {

    function obterColaboracoes($status, $categoria, $ordem) {

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

            $this->db->where('idStatus <>', '2');

            $this->db->order_by($opcaoOrdem, $tipoOrdem);

            return $query = $this->db->get();
        } else if (($status == 0) && ($categoria > 0)) {

            $this->db->select('*');
            $this->db->from('vw_consulta_principal');

            $this->db->where('idTipo =', $categoria);
            $this->db->order_by($opcaoOrdem, $tipoOrdem);
            return $query = $this->db->get();
        } else if ((($status > 0) && ($status < 8)) && ($categoria == 0)) {


            $this->db->select('*');
            $this->db->from('vw_consulta_principal');
            $this->db->where('idStatus =', $status);
            $this->db->order_by($opcaoOrdem, $tipoOrdem);
            return $query = $this->db->get();
        } elseif ((($status > 0) && ($status < 8)) && ($categoria > 0)) {

            $this->db->select('*');
            $this->db->from('vw_consulta_principal');
            $this->db->where('idStatus =', $status);
            $this->db->where('idTipo =', $categoria);
            $this->db->order_by($opcaoOrdem, $tipoOrdem);
            return $query = $this->db->get();
        }
    }

        function obiterProblema($idProblema) {
        $this->db->select('*');
        $this->db->from('problema');
        $this->db->join('tipo', 'tipo.idTipo = problema.idTipo');
        $this->db->join('status', 'status.idStatus = problema.idStatus');
        $this->db->where('problema.idProblema =', $idProblema);
        return $query = $this->db->get();
    }
    
    function obiterCidadaoProblema($idProblema) {

        $this->db->select('*');
        $this->db->from('problema');
        $this->db->join('cidadao', 'cidadao.idCidadao = problema.idCidadao');
        $this->db->join('tipo', 'tipo.idTipo = problema.idTipo');
        $this->db->join('status', 'status.idStatus = problema.idStatus');
        $this->db->where('problema.idProblema =', $idProblema);
        return $query = $this->db->get();
    }

    function alterarStatus($dados, $idPoblema) {
        $this->db->where('idProblema', $idPoblema);
        $this->db->update('problema', $dados);
    }

    function obterComentarioNaoModerados() {

        $this->db->select('*');
        $this->db->from('problema');
        $this->db->join('comentarioproblema', 'problema.idProblema = comentarioproblema.idProblema');
        $this->db->join('cidadao', 'cidadao.idCidadao = comentarioproblema.idCidadao');
        $this->db->join('tipo', 'tipo.idTipo = problema.idTipo');
        $this->db->join('status', 'status.idStatus = problema.idStatus');
        $this->db->where('comentarioproblema.statusComentario =', 0);
        $this->db->order_by('problema.idProblema','cres');
       // $this->db->order_by($opcaoOrdem, $tipoOrdem);
        return $query = $this->db->get();
    }

    function alterarComentario($idComentario, $dados) {
        $this->db->where('idComentario', $idComentario);
        $this->db->update('comentarioproblema', $dados);
    }

    function excluirComentarioRejeitado($idComentario) {
//        $this->db->delete('apoioComentario', array('idComentario' => $idComentario));
//        $this->db->delete('reprovaComentario', array('idComentario' => $idComentario));
        $this->db->delete('comentarioproblema', array('idComentario' => $idComentario));
    }

    function obterComentarioPorColaboracao($problema) {
        $this->db->from('vw_consulta_comentarios');
        $this->db->join('cidadao', 'cidadao.idCidadao=vw_consulta_comentarios.idCidadao');
        $this->db->where(array('idProblema' => $problema));
        $this->db->order_by("idComentario", "desc");
        return $this->db->get();
    }

    function obterConfiguracoa() {
        return $this->db->get('configuracao');
    }
    
}

?>

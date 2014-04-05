<?php

class colaboracao_model extends CI_Model {

    function obterColaboracoes($status, $categoria) {

        if (($status == 0) && ($categoria == 0)) {

            $this->db->select('*');
            $this->db->from('problema');
            $this->db->join('tipo', 'tipo.idTipo = problema.idTipo');
            $this->db->join('status', 'status.idStatus = problema.idStatus');
            $this->db->where('problema.idStatus <>', '2');
            return $query = $this->db->get();
        } else if (($status == 0) && ($categoria > 0)) {


            $this->db->select('*');
            $this->db->from('problema');
            $this->db->join('tipo', 'tipo.idTipo = problema.idTipo');
            $this->db->join('status', 'status.idStatus = problema.idStatus');
            $this->db->where('problema.idTipo =', $categoria);
            return $query = $this->db->get();
        } else if ((($status > 0) && ($status < 8)) && ($categoria == 0)) {


            $this->db->select('*');
            $this->db->from('problema');
            $this->db->join('tipo', 'tipo.idTipo = problema.idTipo');
            $this->db->join('status', 'status.idStatus = problema.idStatus');
            $this->db->where('problema.idStatus =', $status);
            return $query = $this->db->get();
        } elseif ((($status > 0) && ($status < 8)) && ($categoria > 0)) {

            $this->db->select('*');
            $this->db->from('problema');
            $this->db->join('tipo', 'tipo.idTipo = problema.idTipo');
            $this->db->join('status', 'status.idStatus = problema.idStatus');
            $this->db->where('problema.idStatus =', $status);
            $this->db->where('problema.idTipo =', $categoria);
            return $query = $this->db->get();
        }
    }

    function obiterCidadaoProblema($idProblema) {

        $this->db->select('*');
        $this->db->from('problema');
        $this->db->join('cidadao', 'cidadao.idCidadao = problema.idCidadao');
        $this->db->where('problema.idProblema =', $idProblema);
        return $query = $this->db->get();
    }

    function alterarStatus($dados, $idPoblema) {
        $this->db->where('idProblema', $idPoblema);
        $this->db->update('problema', $dados);
    }

}

?>

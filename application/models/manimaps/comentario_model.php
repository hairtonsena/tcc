<?php

class Comentario_model extends CI_Model {

    function obterComentarioPorColaboracao($problema) {
        $this->db->from('comentarioproblema');
        $this->db->join('cidadao', 'cidadao.idCidadao=comentarioproblema.idCidadao');
        $this->db->where(array('idProblema' => $problema));
        $this->db->order_by("idComentario", "desc");
        return $this->db->get();
    }

    function salvarNovoComentario($dados) {
        $this->db->insert('comentarioproblema', $dados);
    }

    function apoiarComentario($dados, $idComentario) {
        $this->db->where('idComentario', $idComentario);
        $this->db->update('comentarioproblema', $dados);
    }

    function reporvarComentario($dados,$idComentario) {
        $this->db->where('idComentario', $idComentario);
        $this->db->update('comentarioproblema', $dados);
    }
    
    function excluirComentario($idComentario){
        $this->db->delete('comentarioproblema', array('idComentario' => $idComentario)); 
    }

}

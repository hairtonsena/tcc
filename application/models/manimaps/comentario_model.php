<?php

class Comentario_model extends CI_Model {

    function obterComentarioPorColaboracao($problema) {
        $this->db->from('vw_consulta_comentarios');
        $this->db->join('cidadao', 'cidadao.idCidadao=vw_consulta_comentarios.idCidadao');
        $this->db->where(array('idProblema' => $problema));
        $this->db->order_by("idComentario", "desc");
        return $this->db->get();
    }

    function salvarNovoComentario($dados) {
        $this->db->insert('comentarioproblema', $dados);
    }

    function apoiarComentario($dados) {
        $this->db->insert('apoiocomentario', $dados);
    }

    function verificarUserApoioComentario($idComentario, $idUser) {
        $this->db->from('apoiocomentario');
        $this->db->where('idComentario =', $idComentario);
        $this->db->where('idCidadao =', $idUser);
        return $this->db->count_all_results();
    }

    function verificarUserReprovaComentario($idComentario, $idUser) {
        $this->db->from('reprovacomentario');
        $this->db->where('idComentario =', $idComentario);
        $this->db->where('idCidadao =', $idUser);
        return $this->db->count_all_results();
    }

    function reprovaComentario($dados) {
        $this->db->insert('reprovacomentario', $dados);
    }

    function verificarUserReprovadoComentario($idComentario, $idUser) {
        $this->db->from('reprovacomentario');
        $this->db->where('idComentario =', $idComentario);
        $this->db->where('idCidadao =', $idUser);
        return $this->db->count_all_results();
    }

    function excluirComentario($idComentario) {
        $this->db->delete('comentarioproblema', array('idComentario' => $idComentario));
    }

}

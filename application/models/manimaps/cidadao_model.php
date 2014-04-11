<?php

class cidadao_model extends CI_Model {

    function obterCidadaoCadastrado($dados) {
        return $this->db->get_where('cidadao', array('cpfCidadao' => $dados['cpfCidadao'], 'emailCidadao' => $dados['emailCidadao']));
    }

    function obterCidadaoLogin($dados) {
        return $this->db->get_where('cidadao', array('emailCidadao' => $dados['emailCidadao'], 'senhaCidadao' => $dados['senhaCidadao']));
    }

    function salvarNovoCidadao($data) {

        $this->db->insert('cidadao', $data);
    }

    function obterTodosCidadaos() {
        return $this->db->get('cidadao');
    }

    function alterarStatusConclusao($dados, $idCidadao) {
        $this->db->where('idCidadao', $idCidadao);
        $this->db->update('cidadao', $dados);
    }

}

?>

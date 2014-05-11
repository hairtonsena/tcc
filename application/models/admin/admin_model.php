<?php

class admin_model extends CI_Model {

    function obterAdminLogin($dados) {
        return $this->db->get_where('admin', array('emailAdmin' => $dados['emailAdmin'], 'senhaAdmin' => $dados['senhaAdmin']));
    }

    function obterConfiguracao() {
        return $this->db->get('configuracao');
    }

    function alterarConfiguracao($idConfiguracao, $dados) {
        $this->db->where('idConfiguracao', $idConfiguracao);
        $this->db->update('configuracao', $dados);
    }

    //put your code here
}

?>

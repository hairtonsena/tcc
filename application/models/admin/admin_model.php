<?php

class admin_model extends CI_Model {

    function obterAdminLogin($dados) {
        return $this->db->get_where('admin', array('emailAdmin' => $dados['emailAdmin'], 'senhaAdmin' => $dados['senhaAdmin']));
    }

    //put your code here
}

?>

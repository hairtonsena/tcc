<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tipo_model
 *
 * @author hairton
 */
class Tipo_model extends CI_Model {

    function obterTodosTiposProblema() {
        return $this->db->get("tipo");
    }

}

?>

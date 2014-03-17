<?php

class Status_model extends CI_Model {
    
    function obterTodosStatusProblema (){
        return $this->db->get("status");
    }

    
    
    

}
?>
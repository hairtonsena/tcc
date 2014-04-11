<?php

class status_model extends CI_Model {
    
    function obiterStatus(){
        return $this->db->get('status');
    }
    
    
    
}

?>

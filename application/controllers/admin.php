<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of admin
 *
 * @author hairton
 */
class admin extends CI_Controller{
    
    
    
    function index(){
        
        $this->load->helper('url');
        
        redirect(base_url());
    }
    //put your code here
}

?>

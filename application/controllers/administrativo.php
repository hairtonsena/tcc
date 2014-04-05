<?php

class administrativo extends CI_Controller{
    function index(){

        $this->load->helper('url');
        redirect(base_url()."cpainel/home");
    }
}

?>

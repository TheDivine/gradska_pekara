<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class MY_Exceptions extends CI_Exceptions {

    public function __construct()
    {
        parent::__construct();
    }

    public function show_404()
    { 
        header("HTTP/1.1 404 Not Found"); 

        $CI =& get_instance();

        $CI->load->view('includes/_404');
        
        echo $CI->output->get_output();
    }
}

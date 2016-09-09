<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');//teste git

class Blog extends CI_Controller 
{

    var $data;

    public function __construct()
    {
        parent::__construct();
    }
    
    public function homepage($id_usuario)
    {
        $this->load->view('mostratec/blog/list_blog', $this->data);
    }
}   
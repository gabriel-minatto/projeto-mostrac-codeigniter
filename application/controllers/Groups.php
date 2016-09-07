<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Groups extends CI_Controller 
{

    var $data;

    public function __construct()
    {
        parent::__construct();
    }
    
    public function homepage($id_usuario)
    {
        $this->load->view('mostratec/grupos/list_groups', $this->data);
    }
}   
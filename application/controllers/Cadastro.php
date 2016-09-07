<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cadastro extends CI_Controller 
{

    var $data;

    public function __construct()
    {
        parent::__construct();
    }
    
    public function users()
    {
        $this->load->view('mostratec/cadastro/cadastro_usuarios', $this->data);
    }
}   
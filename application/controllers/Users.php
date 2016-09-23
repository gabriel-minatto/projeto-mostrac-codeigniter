<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller 
{

    var $data;

    public function __construct() {

        parent::__construct();
        
    }

     public function login()
    {
        $this->load->model("Users_model","user");
        $this->paciente->login = $this->input->post('login', TRUE);
        $this->paciente->senha = md5($this->input->post('senha', TRUE));
        if(!$this->user->check_login())
        {
            redirect(base_url(), 'refresh');
        }
        $paciente = $this->$user->load_obj_login();
        $this->session->set_userdata('user_id', $user->id);
        $this->session->set_userdata('user_nome', $user->nome);
        $this->session->set_userdata('user_login', $user->login);
        $this->session->set_userdata('user_email', $user->email);
        var_dump($this->session); exit;
        redirect(base_url(), 'refresh');
    }
    
    public function logout()
    {
        $this->session->sess_destroy();
        echo "Saindo...";
        redirect(base_url(), 'refresh');
    }
        
}   





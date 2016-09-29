<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller 
{

    var $data;

    public function __construct() {

        parent::__construct();
        
    }

    public function login()
    {
        $this->load->model("Users_model","user");
        $this->user->login = $this->input->post('login', TRUE);
        $this->user->email = $this->input->post('email', TRUE);
        $this->user->senha = md5($this->input->post('senha', TRUE));
        if(!$this->user->check_login())
        {
            redirect(base_url(), 'refresh');
        }
        $this->user = $this->user->load_obj_login();
        $this->session->set_userdata('user_id', $this->user->id);
        $this->session->set_userdata('user_nome', $this->user->nome);
        $this->session->set_userdata('user_login', $this->user->login);
        $this->session->set_userdata('user_email', $this->user->email);
        $this->session->set_userdata('user_type', $this->user->type);
        redirect(base_url('blog/home'), 'refresh');
    }
    
    public function logout()
    {
        $this->session->sess_destroy();
        echo "Saindo...";
        redirect(base_url(), 'refresh');
    }
    
    public function register()
    {
        $this->load->view('mostratec/cadastro/cadastro_usuarios', $this->data);
    }
    
    public function save_user()
    {
        $this->load->model("Users_model","user");
        $this->user->nome = $this->input->post('nome', TRUE);
        $this->user->school = $this->input->post('school', TRUE);
        $this->user->email = $this->input->post('email', TRUE);
        $this->user->login = $this->input->post('login', TRUE);
        $this->user->senha = md5($this->input->post('senha', TRUE));
        $this->user->active = 0;
        $this->user->type = "student";
        if($this->user->insert())
            redirect(base_url(), 'refresh');
            
        redirect(base_url('blog/home'), 'refresh');
        
    }
        
}   





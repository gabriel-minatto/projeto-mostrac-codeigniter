<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller 
{

    var $data;

    public function __construct()
    {
        parent::__construct();
        $this->data["site_area"] = "admin";
    }
    
    public function homepage()
    {
        unset($this->data["site_area"]);//desativa flag de area do site pra usar o tema do site principal na tela de login
        $this->load->view('mostratec/admin/admin_login', $this->data);
    }
    
    public function login()
    {
        $this->load->model("Users_model","user");
        $this->user->email = $this->input->post('email', TRUE);
        $this->user->senha = md5($this->input->post('senha', TRUE));
        
        if(!$this->user->check_login())
        {
            $this->session->set_flashdata("error","Login e senha não correspondem!");
            redirect(base_url(), 'refresh');
        }
        
        $this->user = $this->user->load_obj_login();
        
        if($this->user->type == "student")
        {
            $this->session->set_flashdata("error","Você não tem permissão para entrar nesta área do site!");
            redirect(base_url(), 'refresh');
        }
        
        $this->session->set_userdata('user_id', $this->user->id);
        $this->session->set_userdata('user_nome', $this->user->nome);
        $this->session->set_userdata('user_login', $this->user->login);
        $this->session->set_userdata('user_email', $this->user->email);
        $this->session->set_userdata('user_type', $this->user->type);
        redirect(base_url('admin/painel'), 'refresh');
    }
    
    public function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata("error","Logoff efetuado com sucesso!");
        redirect(base_url(), 'refresh');
    }
    
    public function dashboard()
    {
        
        $this->load->view('mostratec/admin/dashboard/dashboard', $this->data);
    }
    
}   
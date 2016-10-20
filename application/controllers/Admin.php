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
        if(is_teacher())
            redirect(base_url('admin/painel'), 'refresh');
        unset($this->data["site_area"]);//desativa flag de area do site pra usar o tema do site principal na tela de login
        $this->load->view('mostratec/admin/admin_login', $this->data);
    }
    
    public function login()
    {
        if(is_teacher())
            redirect(base_url('admin/painel'), 'refresh');
            
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
        if(!is_teacher())
        {
            $this->session->set_flashdata("error","Você não tem permissão para acessar essa área do site!");
            redirect(base_url(), 'refresh');
        }
        $this->load->view('mostratec/admin/dashboard/dashboard', $this->data);
    }
    
    public function new_school()
    {
        if(is_admin())
            $this->load->view('mostratec/admin/cadastros/schools', $this->data);
    }
    
    public function save_school()
    {
        if(is_admin())
        {
            $this->load->model("Schools_model","school");
            $this->school->nome = $this->input->post('name', TRUE);
            $this->school->cidade = $this->input->post('cidade', TRUE);
            $this->school->tipo = $this->input->post('rede', TRUE);
            echo $this->school->insert();
        }
    }
    
    public function list_all_with_filter()
    {
        if(!is_admin())
        {
            $this->session->set_flashdata("error","Você não tem permissão para acessar essa área do site!");
            redirect(base_url("admin/painel"), 'refresh');
        }
        $this->load->model("Schools_model","school");
        if(!empty($_POST))
        {
            $filter = array(
                'nome' => $this->input->post('name', TRUE),
                'cidade' => $this->input->post('cidade', TRUE),
                'tipo' => $this->input->post('rede', TRUE)
                );
            
        }
        $this->data["escolas"] = $this->school->select_all_with_filter((isset($filter) ? $filter : null ));
        $this->load->view("mostratec/admin/schools/schools_list",$this->data);
    }
    
}   
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
        $this->user->email = $this->input->post('email', TRUE);
        $this->user->senha = md5($this->input->post('senha', TRUE));
        if(!$this->user->check_login())
        {
            return false;
        }
        $this->user = $this->user->load_obj_login();
        $this->session->set_userdata('user_id', $this->user->id);
        $this->session->set_userdata('user_nome', $this->user->nome);
        $this->session->set_userdata('user_email', $this->user->email);
        $this->session->set_userdata('user_type', $this->user->type);
        echo $this->user->check_login();
    }
    
    public function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata("success","Logoff efetuado com sucesso!");
        redirect(base_url(), 'refresh');
    }
    
    public function register()
    {
        $this->load->view('mostratec/cadastro/cadastro_usuarios', $this->data);
    }
    
    public function save_user()
    {
        $this->load->model("Users_model","user");
        $this->load->model("Users_model","teacher");
        $this->teacher->code = $this->input->post('teacher_code', TRUE);
        if(!$this->teacher->check_code() || $this->input->post('terms', TRUE) != 1)
        {
            echo 0;
            exit;
        }
        $name = $this->input->post('name', TRUE);
        
        $this->user->nome = $name;
        $this->user->email = $this->input->post('email', TRUE);
        $this->user->senha = md5($this->input->post('senha', TRUE));
        $this->user->active = 1;
        $this->user->type = "student";
        $insert = $this->user->insert();
        if($insert)
        {
            $this->user->id = $insert;
            $this->user->code = explode(' ',strtolower($name))[0].substr($insert,0,4);
            $this->user->update();
            echo 1;
            exit;
        }
        echo 0;
    }
        
}   





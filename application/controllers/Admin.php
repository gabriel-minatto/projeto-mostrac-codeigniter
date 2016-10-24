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
    
    public function add_school()
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
    
    public function list_all_schools_with_filter()
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
    
    public function my_schools()
    {
        if(!is_teacher())
        {
            $this->session->set_flashdata("error","Você não tem permissão para acessar essa área do site!");
            redirect(base_url(), 'refresh');
        }
        $this->load->model("Group_moderators_model","group_moderator");
        $this->group_moderator->user = $this->session->user_id;
        if(!empty($_POST))
        {
            $filter = array(
                's.nome' => $this->input->post('name', TRUE),
                's.cidade' => $this->input->post('cidade', TRUE),
                's.tipo' => $this->input->post('rede', TRUE),
                'g.nome' => $this->input->post('grupo', TRUE),
                );
        }
        $this->data["escolas"] = $this->group_moderator->select_schools_by_groups_user((isset($filter) ? $filter : null ));
        $this->load->view("mostratec/admin/schools/my_schools_list", $this->data);
    }
    
    public function my_groups()
    {
        if(!is_teacher())
        {
            $this->session->set_flashdata("error","Você não tem permissão para acessar essa área do site!");
            redirect(base_url(), 'refresh');
        }
        $this->load->model("Group_moderators_model","group_moderator");
        $this->group_moderator->user = $this->session->user_id;
        if(!empty($_POST))
        {
            $filter = array(
                'g.nome' => $this->input->post('name', TRUE),
                's.nome' => $this->input->post('escola', TRUE),
                'g.categoria' => $this->input->post('categoria', TRUE)
                );
        }
        $this->data["grupos"] = $this->group_moderator->select_my_groups_with_filter((isset($filter) ? $filter : null ));
        $this->load->view("mostratec/admin/groups/my_groups_list",$this->data);
    }
    
    public function group_users($id)
    {
        if(!is_moderator($id))
        {
            $this->session->set_flashdata("error","Você não tem permissão para acessar essa área do site!");
            redirect(base_url(), 'refresh');
        }
        $this->load->model("Group_users_model","group_user");
        $this->load->model("Groups_model","group");
        $this->group->id = $this->group_user->group = $id;
        $this->data["alunos"] = $this->group_user->select_users_by_group();
        $this->data["grupo"] = $this->group->load_by_id();
        $this->load->view("mostratec/admin/groups/group_users_list",$this->data);
    }
    
    public function add_group()
    {
        if(is_teacher())
        {
            $this->load->model("Groups_model","group");
            $this->group->description = $this->input->post('description', TRUE);
            $this->group->nome = $this->input->post('name', TRUE);
            $this->group->school = $this->input->post('escola', TRUE);
            $this->group->categoria = $this->input->post('categoria', TRUE);
            echo $this->group->insert();
        }
    }
    
    public function all_groups()
    {
        if(!is_admin())
        {
            $this->session->set_flashdata("error","Você não tem permissão para acessar essa área do site!");
            redirect(base_url("admin/painel"), 'refresh');
        }
        $this->load->model("Groups_model","group");
        if(!empty($_POST))
        {
            $filter = array(
                'g.nome' => $this->input->post('name', TRUE),
                's.nome' => $this->input->post('escola', TRUE),
                'g.categoria' => $this->input->post('categoria', TRUE)
                );
        }
        $this->data["grupos"] = $this->group->select_groups_with_filter((isset($filter) ? $filter : null ));
        $this->load->view("mostratec/admin/groups/groups_list",$this->data);
        
    }
    
    public function manage_group($id)
    {
        if(!is_moderator($id))
        {
            $this->session->set_flashdata("error","Você não tem permissão para acessar essa área do site!");
            redirect(base_url(), 'refresh');
        }
        $this->load->model("Group_users_model","group_user");
        $this->load->model("Groups_model","group");
        $this->group->id = $this->group_user->group = $id;
        if(!empty($_POST))
        {
            $filter = array(
                'u.nome' => $this->input->post('name', TRUE),
                'u.email' => $this->input->post('email', TRUE),
                's.nome' => $this->input->post('escola', TRUE),
                'g.categoria' => $this->input->post('categoria', TRUE)
                );
        }
        $this->data["alunos"] = $this->group_user->select_users_by_group((isset($filter) ? $filter : null ));
        $this->data["grupo"] = $this->group->load_by_id();
        $this->load->view("mostratec/admin/groups/group_manage",$this->data);
    }
    
    public function remove_user_group($grupo,$user)
    {
        if(!is_moderator($grupo))
        {
            $this->session->set_flashdata("error","Você não tem permissão para acessar essa área do site!");
            redirect(base_url(), 'refresh');
        }
        $this->load->model("Group_users_model","group_user");
        $this->group_user->group = $grupo;
        $this->group_user->user = $user;
        if($this->group_user->delete_by_group_and_user())
        {
            $this->session->set_flashdata("success","Aluno removido com sucesso.");
            redirect(base_url('admin/grupos/gerenciar/'.$grupo), 'refresh');
        }
    }
}   
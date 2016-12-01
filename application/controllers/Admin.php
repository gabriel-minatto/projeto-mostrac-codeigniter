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
        if(is_student())
            $this->session->sess_destroy();
        
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
            exit;
        }
        echo 0;
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
    
    public function add_group()
    {
        if(is_teacher())
        {
            $this->load->model("Groups_model","group");
            $this->group->description = $this->input->post('description', TRUE);
            $this->group->nome = $this->input->post('name', TRUE);
            $this->group->school = $this->input->post('escola', TRUE);
            $this->group->categoria = $this->input->post('categoria', TRUE);
            $this->group->active = 1;
            $this->group->closed = 0;
            
            $this->load->model("Group_moderators_model","group_moderator");
            $this->group_moderator->group = $this->group->insert();
            $this->group_moderator->user =  $this->session->user_id;
            echo $this->group_moderator->insert();
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
        $this->load->model("Posts_model","post");
        $this->load->model("Relatorios_model","relatorio");
        $this->load->model("Group_moderators_model","group_moderator");
        $this->group_moderator->group = $this->relatorio->group = $this->post->group = $this->group->id = $this->group_user->group = $id;
        $this->data["grupo"] = $this->group->load_by_id();
        if($this->data["grupo"]->closed == 1 && !is_superadmin())
        {
            $this->session->set_flashdata("error","Este grupo já foi finalizado.");
            redirect(base_url('admin/grupos/todos'), 'refresh');
        }
        if($this->data["grupo"]->active == 0 && !is_admin())
        {
            $this->session->set_flashdata("error","Este grupo está desativado.");
            redirect(base_url('admin/grupos/meus-grupos'), 'refresh');
        }
        
        if(!empty($_POST["student_filter"]))
        {
            $student_filter = array(
                'u.nome' => $this->input->post('student_name', TRUE),
                'u.email' => $this->input->post('student_email', TRUE)
                );
        }
        if(!empty($_POST["moderator_filter"]))
        {
            $moderator_filter = array(
                'u.nome' => $this->input->post('moderator_name', TRUE),
                'u.email' => $this->input->post('moderator_email', TRUE)
                );
                $this->session->set_flashdata("selected_tab","moderadores");
        }
        $this->data["moderators"] = $this->group_moderator->select_group_moderators((isset($moderator_filter) ? $moderator_filter : null ));
        $this->data["reports"] = $this->relatorio->select_by_group_with_group();
        $this->data["posts"] = $this->post->select_manage_group_posts();
        $this->data["alunos"] = $this->group_user->select_users_by_group((isset($student_filter) ? $student_filter : null ));
        $this->load->view("mostratec/admin/groups/group_manage",$this->data);
    }
    
    public function add_user_group()
    {
        $this->load->model("Group_users_model","group_user");
        $this->group_user->group = $this->input->post("grupo",true);
        
        if(!is_moderator($this->group_user->group))
        {
            $this->session->set_flashdata("error","Você não tem permissão para acessar essa área do site!");
            redirect(base_url(), 'refresh');
        }
        $this->group_user->user = $this->input->post("aluno",true);
        echo $this->group_user->insert();
    }
    
    public function add_moderator_group()
    {
        $this->load->model("Group_moderators_model","group_moderator");
        $this->group_moderator->group = $this->input->post("grupo",true);
        
        if(!is_moderator($this->group_moderator->group))
        {
            $this->session->set_flashdata("error","Você não tem permissão para acessar essa área do site!");
            redirect(base_url(), 'refresh');
        }
        $this->session->set_flashdata("selected_tab","moderadores");
        $this->group_moderator->user = $this->input->post("moderador",true);
        echo $this->group_moderator->insert();
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
    
    public function load_add_student_to_group()
    {
        $this->load->model("Groups_model","group");
        $this->group->id = $this->input->post("grupo",TRUE);
        $this->group = $this->group->load_by_id();
        $student_form = json_decode($this->input->post("student_form"));
        if($student_form)
        {
            $student_filter = array(
                "u.nome" => $student_form[0]->value,
                "u.email" => $student_form[1]->value
                );
            $student_form = $student_filter;
        }
        print_add_student_to_group_modal(
            $this->group, 
            $student_form,
            $this->input->post("refresh"));
    }
    
    public function load_add_moderator_to_group()
    {
        $this->load->model("Groups_model","group");
        $this->group->id = $this->input->post("grupo",TRUE);
        $this->group = $this->group->load_by_id();
        $moderator_form = json_decode($this->input->post("moderator_form"));
        if($moderator_form)
        {
            $moderator_filter = array(
                "u.nome" => $moderator_form[0]->value,
                "u.email" => $moderator_form[1]->value
                );
            $moderator_form = $moderator_filter;
        }
        print_add_moderator_to_group_modal(
            $this->group, 
            $moderator_form,
            $this->input->post("refresh"));
    }
    
    public function activate_post($grupo,$id)
    {
        if(!is_moderator($grupo))
        {
            $this->session->set_flashdata("error","Você não tem permissão para acessar essa área do site!");
            redirect(base_url(), 'refresh');
        }
        $this->load->model("Posts_model","post");
        $this->post->id = $id;
        if($this->post->activate_by_id())
        {
            $this->session->set_flashdata("success","Post ativado com sucesso.");
            $this->session->set_flashdata("selected_tab","posts");
            redirect(base_url('admin/grupos/gerenciar/'.$grupo), 'refresh');
        }
        $this->session->set_flashdata("error","Algo deu errado durante a operação, tente novamente mais tarde.");
        $this->session->set_flashdata("selected_tab","posts");
        redirect(base_url('admin/grupos/gerenciar/'.$grupo), 'refresh');
    }
    
    public function activate_group($grupo)
    {
        if(!is_admin())
        {
            $this->session->set_flashdata("error","Você não tem permissão para acessar essa área do site!");
            redirect(base_url(), 'refresh');
        }
        $this->load->model("Groups_model","group");
        $this->group->id = $grupo;
        if($this->group->activate_by_id())
        {
            $this->session->set_flashdata("success","Grupo ativado com sucesso.");
            redirect(base_url('admin/grupos/gerenciar/'.$grupo), 'refresh');
        }
        $this->session->set_flashdata("error","Algo deu errado durante a operação, tente novamente mais tarde.");
        redirect(base_url('admin/grupos/gerenciar/'.$grupo), 'refresh');
    }
    
    public function deactivate_group($grupo)
    {
        if(!is_admin())
        {
            $this->session->set_flashdata("error","Você não tem permissão para acessar essa área do site!");
            redirect(base_url(), 'refresh');
        }
        $this->load->model("Groups_model","group");
        $this->group->id = $grupo;
        if($this->group->deactivate_by_id())
        {
            $this->session->set_flashdata("success","Grupo desativado com sucesso.");
            redirect(base_url('admin/grupos/todos'), 'refresh');
        }
        $this->session->set_flashdata("error","Algo deu errado durante a operação, tente novamente mais tarde.");
        redirect(base_url('admin/grupos/gerenciar/'.$grupo), 'refresh');
    }
    
    
    public function deactivate_post($grupo,$id)
    {
        if(!is_moderator($grupo))
        {
            $this->session->set_flashdata("error","Você não tem permissão para acessar essa área do site!");
            redirect(base_url(), 'refresh');
        }
        $this->load->model("Posts_model","post");
        $this->post->id = $id;
        if($this->post->deactivate_by_id())
        {
            $this->session->set_flashdata("success","Post desativado com sucesso.");
            $this->session->set_flashdata("selected_tab","posts");
            redirect(base_url('admin/grupos/gerenciar/'.$grupo), 'refresh');
        }
        $this->session->set_flashdata("error","Algo deu errado durante a operação, tente novamente mais tarde.");
        $this->session->set_flashdata("selected_tab","posts");
        redirect(base_url('admin/grupos/gerenciar/'.$grupo), 'refresh');
    }
    
    public function delete_post($grupo,$id)
    {
        if(!is_moderator($grupo))
        {
            $this->session->set_flashdata("error","Você não tem permissão para acessar essa área do site!");
            redirect(base_url(), 'refresh');
        }
        $this->load->model("Posts_model","post");
        $this->load->helper("file");
        $this->post->id = $id;
        $this->post = $this->post->load_by_id();
        $post_dir = './uploads/groups/posts/'.string_to_slug($this->post->title).'_'.$this->post->id;
        if($this->post->delete())
        {
            if(delete_files($post_dir, true))
            {
                if(rmdir($post_dir))
                {
                    $this->session->set_flashdata("success","Post deletado com sucesso.");
                    $this->session->set_flashdata("selected_tab","posts");
                    redirect(base_url('admin/grupos/gerenciar/'.$grupo), 'refresh');
                }
            }
        }
        $this->session->set_flashdata("error","Algo deu errado durante a operação, tente novamente mais tarde.");
        $this->session->set_flashdata("selected_tab","posts");
        redirect(base_url('admin/grupos/gerenciar/'.$grupo), 'refresh');
    }
    
    public function add_report($grupo)
    {
        if(!is_moderator($grupo))
        {
            echo 0;
            exit;
        }
        $this->load->model("Relatorios_model","relatorio");
        $this->relatorio->group = $grupo;
        $this->relatorio->nome = $this->input->post("title",TRUE);
        $this->relatorio->content = $this->input->post("content",TRUE);
        $this->session->set_flashdata("selected_tab","relatorios");
        echo $this->relatorio->insert();
    }
    
    public function edit_report($grupo,$id)
    {
        if(!is_moderator($grupo))
        {
            echo 0;
            exit;
        }
        $this->load->model("Relatorios_model","relatorio");
        $this->relatorio->id = $id;
        $this->relatorio = $this->relatorio->load_by_id();
        $this->relatorio->nome = $this->input->post("title",TRUE);
        $this->relatorio->content = $this->input->post("content",TRUE);
        $this->session->set_flashdata("selected_tab","relatorios");
        echo $this->relatorio->update();
    }
    
    public function delete_report($grupo,$id)
    {
        if(!is_moderator($grupo))
        {
            $this->session->set_flashdata("error","Você não tem permissão para acessar essa área do site!");
            redirect(base_url(), 'refresh');
        }
        $this->load->model("Relatorios_model","relatorio");
        $this->relatorio->id = $id;
        if($this->relatorio->delete())
        {
            $this->session->set_flashdata("success","Relatório deletado com sucesso.");
            $this->session->set_flashdata("selected_tab","relatorios");
            redirect(base_url('admin/grupos/gerenciar/'.$grupo), 'refresh');
        }
        $this->session->set_flashdata("error","Algo deu errado durante a operação, tente novamente mais tarde.");
        $this->session->set_flashdata("selected_tab","relatorios");
        redirect(base_url('admin/grupos/gerenciar/'.$grupo), 'refresh');
    }
    
    public function delete_group_moderator($id)
    {
        if(!is_admin())
        {
            $this->session->set_flashdata("error","Você não tem permissão para acessar essa área do site!");
            redirect(base_url(), 'refresh');
        }
        $this->load->model("Group_moderators_model","group_moderator");
        $this->group_moderator->id = $id;
        $this->group_moderator = $this->group_moderator->load_by_id();
        if($this->group_moderator->delete())
        {
            $this->session->set_flashdata("success","Moderador deletado com sucesso.");
            $this->session->set_flashdata("selected_tab","moderadores");
            redirect(base_url('admin/grupos/gerenciar/'.$this->group_moderator->group), 'refresh');
        }
        $this->session->set_flashdata("error","Algo deu errado durante a operação, tente novamente mais tarde.");
        $this->session->set_flashdata("selected_tab","moderadores");
        redirect(base_url('admin/grupos/gerenciar/'.$this->group_moderator->group), 'refresh');
    }
    
    public function delete_group($id)
    {
        if(!is_moderator($id))
        {
            $this->session->set_flashdata("error","Você não tem permissão para acessar essa área do site!");
            redirect(base_url(), 'refresh');
        }
        $this->load->model("Groups_model","group");
        $this->load->model("Posts_model","post");
        $this->load->helper('file');
        
        $this->group->id = $this->post->group = $id;
        $posts = $this->post->select_group_posts();
        $upload_path = "./uploads/groups/posts/";
        foreach($posts as $post)
        {
            $path = $upload_path.string_to_slug($post->title).'_'.$post->id;
            if(!delete_files($path, true))
            {
                $this->session->set_flashdata("error","Algo deu errado durante a operação, tente novamente mais tarde.");
                $this->session->set_flashdata("selected_tab","posts");
                redirect(base_url('admin/grupos/gerenciar/'.$id), 'refresh');
            }
            rmdir($path);
        }
        if($this->group->delete())
        {
            $this->session->set_flashdata("success","Grupo deletado com sucesso.");
            redirect(base_url('admin/grupos/meus-grupos'), 'refresh');
        }
        $this->session->set_flashdata("error","Algo deu errado durante a operação, tente novamente mais tarde.");
        redirect(base_url('admin/grupos/gerenciar/'.$id), 'refresh');
    }
    
    public function finish_group($id)
    {
        if(!is_moderator($id))
        {
            $this->session->set_flashdata("error","Você não tem permissão para acessar essa área do site!");
            redirect(base_url(), 'refresh');
        }
        $this->load->model("Groups_model","group");
        $this->group->id = $id;
        if($this->group->finish_group())
        {
            $this->session->set_flashdata("success","Grupo finalizado com sucesso.");
            redirect(base_url('admin/grupos/meus-grupos'), 'refresh');
        }
        $this->session->set_flashdata("error","Algo deu errado durante a operação, tente novamente mais tarde.");
        redirect(base_url('admin/grupos/gerenciar/'.$id), 'refresh');
    }
    
    public function unfinish_group($id)
    {
        if(!is_superadmin())
        {
            $this->session->set_flashdata("error","Você não tem permissão para acessar essa área do site!");
            redirect(base_url(), 'refresh');
        }
        $this->load->model("Groups_model","group");
        $this->group->id = $id;
        if($this->group->unfinish_group())
        {
            $this->session->set_flashdata("success","Grupo reaberto com sucesso.");
            redirect(base_url('admin/grupos/gerenciar/'.$grupo), 'refresh');
        }
        $this->session->set_flashdata("error","Algo deu errado durante a operação, tente novamente mais tarde.");
        redirect(base_url('admin/grupos/gerenciar/'.$grupo), 'refresh');
        
    }
}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Groups extends CI_Controller 
{

    var $data;

    public function __construct()
    {
        parent::__construct();
    }
    
    public function homepage()
    {
        if(!logged())
        {
            $this->data["logged"] = 0;
        }
        $this->load->model("Group_users_model","group_users");
        $this->group_users->user = $this->session->user_id;
        $this->data["my_groups"] = $this->group_users->select_by_user();
        $this->data["other_groups"] = $this->group_users->select_all_others();
        $this->load->view('mostratec/grupos/list_groups', $this->data);
    }
    
    public function post_group($id)
    {
        if(!logged())
        {
            $this->data["logged"] = 0;
        }
        $this->load->model("Posts_model","post");
        $this->post->user = $this->session->user_id;
        $this->post->group = $id;
        $this->data["posts"] = $this->post->select_by_group_user();
        $this->load->view('mostratec/grupos/list_posts', $this->data);
    }
    
    public function view_post($id)
    {
        if(!logged())
        {
            $this->data["logged"] = 0;
        }
        $this->load->model("Posts_model","post");
        $this->load->model("Post_coments_model","post_coments");
        $this->load->model("Post_images_model","post_images");
        $this->load->model("Users_model","user");
        $this->post->id = $this->post_coments->post = $this->post_images->post = $id;
        $this->data["post"] = $this->post->load_by_id();
            if($this->data["post"])
            {
                $this->data["post_coments"] = $this->post_coments->select_by_post_with_user();
                $this->data["post_images"] = $this->post_images->select_by_post();
                $this->user->id = $this->data["post"]->user;
                $this->data["autor"] = $this->user->load_by_id();
                
                $this->post->user = $this->session->user_id;
                $this->post->group = $this->data["post"]->group;
                $this->data["group_posts"] = $this->post->select_group_posts();
                
                $this->load->view('mostratec/grupos/view_post', $this->data);    
            }
    }
    
    public function save_post_coment($id)
    {
        if(logged())
        {
            $this->load->model("Post_coments_model","post_coments");
            $this->post_coments->post = $id;
            $this->post_coments->text = $this->input->post('comentario', TRUE);
            $this->post_coments->user = $name = $this->session->userdata('user_id');
            $this->post_coments->insert();
            redirect(base_url('grupos/posts/view/'.$id), 'refresh');
        }
    }
    
    public function view_report($id)
    {
        if(logged())
        {
            $this->load->model("Relatorios_model","relatorio");
            $this->load->model("Relat_coments_model","relat_coments");
            $this->load->model("Posts_model","post");
            
            $this->relatorio->group = $this->relat_coments->group = $id;
            $this->data["relatorios"] = $this->relatorio->select_with_coments();
            $this->data["comentarios"] = $this->relat_coments->select_by_group_with_autor();
            $this->data["group"] = $id;
            
            $this->post->user = $this->session->user_id;
            $this->post->group = $id;
            $this->data["group_posts"] = $this->post->select_group_posts();
            $this->load->view('mostratec/grupos/view_reports', $this->data);
        }
    }
    
    public function save_report_coment($id)
    {
        if(logged())
        {
            $this->load->model("Relat_coments_model","relat_coments");
            $this->relat_coments->user = $this->session->userdata('user_id');
            $this->relat_coments->group = $id;
            $this->relat_coments->recado = $this->input->post('comentario', TRUE);
            $this->relat_coments->insert();
            redirect(base_url('grupos/relatorios/'.$id), 'refresh');
        }
    }
}   
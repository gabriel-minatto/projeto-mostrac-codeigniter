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
        if(logged())
        {
            $this->load->model("Group_users_model","group_users");
            $this->group_users->user = $this->session->user_id;
            $this->data["grupos"] = $this->group_users->select_by_user();
            $this->load->view('mostratec/grupos/list_groups', $this->data);
        }
    }
    
    public function post_group($id)
    {
        if(logged())
        {
            $this->load->model("Blog_post_model","blog");
            $this->data["posts"] = $this->blog->select_all();
            $this->load->view('mostratec/blog/homepage', $this->data);
        }
        
    }
    
    public function view_post($id)
    {
        if(logged())
        {
            $this->load->model("Blog_post_model","blog_post");
            $this->load->model("Post_coments_model","post_coments");
            $this->load->model("Post_images_model","post_images");
            $this->load->model("Users_model","user");
            
            $this->blog_post->id = $this->post_coments->post = $this->post_images->post = $postagem;
            $this->data["blog_post"] = $this->blog_post->load_by_id();
            $this->data["post_coments"] = $this->post_coments->select_by_post_with_user();
            $this->data["post_images"] = $this->post_images->select_by_post();
            
            $this->user->id = $this->data["blog_post"]->user;
            $this->data["autor"] = $this->user->load_by_id();
            
            $this->load->view('mostratec/blog/view_post', $this->data);    
        }
        
    }
    
    public function save_coment($postagem)
    {
        if(logged())
        {
            $this->load->model("Post_coments_model","post_coments");
            $this->post_coments->post = $postagem;
            $this->post_coments->text = $this->input->post('comentario', TRUE);
            $this->post_coments->user = $name = $this->session->userdata('user_id');
            $this->post_coments->insert();
            redirect(base_url('blog/postagens/'.$this->post_coments->post), 'refresh');
        }
    }
}   
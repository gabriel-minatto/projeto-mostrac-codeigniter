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
}   
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
        $this->load->view('mostratec/grupos/list_groups', $this->data);
    }
    
    public function post_group($id)
    {
        if(!logged())
        {
            $this->data["logged"] = 0;
        }
        $this->load->model("Posts_model","post");
        $this->load->helper("format_helper");
        $this->post->user = $this->session->user_id;
        $this->post->group = $id;
        $this->data["cover"] = $this->post->select_group_cover();
        $this->data["posts"] = $this->post->select_group_posts($this->data["cover"]->id);//passa o id da capa para que ela n seja trazida na busca por outros posts
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
    
    public function new_post($group)
    {
        var_dump($_POST);
        var_dump($_FILES);
        exit;
        /*//upload da thumb
        if(isset($_FILES['thumb']['name']) && !empty($_FILES['thumb']['name'])) {
            //upload da imagem da aula
            $upload_path = 'monitorings/images/';
            // verificar se existe o diretório
            if (!is_ftp_folder($upload_path)){
                create_ftp_folder($upload_path);
            }
            $upload_path =  $this->config->item("upload_path").$upload_path;
            // configurações de upload
            $config['upload_path'] = $upload_path;
            $config['file_name'] = $this->monitoring->slug.".".pathinfo($_FILES['thumb']['name'], PATHINFO_EXTENSION);
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['overwrite'] = TRUE;
            $this->load->library('upload', $config, 'upload_image');
            $this->upload_image->initialize($config);

            // se falhar ou não for preenchido a imagem usamos a imagem anterior
            if (!$this->upload_image->do_upload("thumb")) {
                $this->session->set_flashdata('error', $this->upload_image->display_errors());
                $image = "";
            }else{
                $uploaded_image = $this->upload_image->data();
                $image = $uploaded_image["file_name"];
            }
        } else {
            $image = $this->input->post("thumb", TRUE);
        }
        $this->monitoring->image = $image;*/
        
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
            $this->data["relatorios"] = $this->relatorio->select_by_group();
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
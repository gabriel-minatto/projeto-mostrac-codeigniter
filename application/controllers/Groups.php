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
        $this->load->model("Groups_model","group");
        $this->load->helper("format_helper");
        $this->post->user = $this->session->user_id;
        $this->group->id = $this->post->group = $id;
        $this->data["group"] = $this->group->select_by_id();
        $this->data["cover"] = $this->post->select_group_cover();
        $this->data["posts"] = $this->post->select_group_posts((isset($this->data["cover"]->id) ? $this->data["cover"]->id :null));//passa o id da capa para que ela n seja trazida na busca por outros posts
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
        $this->load->model("Groups_model","group");
        $this->load->helper("format_helper");
        
        $this->post->id = $this->post_coments->post = $this->post_images->post = $id;
        $this->data["post"] = $this->post->load_by_id();
            if($this->data["post"])
            {
                $this->data["post_coments"] = $this->post_coments->select_by_post_with_user();
                $this->data["post_images"] = $this->post_images->select_by_post();
                $this->user->id = $this->data["post"]->user;
                $this->data["autor"] = $this->user->load_by_id();
                
                $this->post->user = $this->session->user_id;
                $this->group->id = $this->post->group = $this->data["post"]->group;
                $this->data["group_posts"] = $this->post->select_group_posts();
                $this->data["group"] = $this->group->select_by_id();
                
                $this->load->view('mostratec/grupos/view_post', $this->data);    
            }
    }
    
    public function new_post($grupo)
    {
        if(!is_user($grupo))
        {
            echo 0;
            exit;
        }
        $upload_path = "./uploads/groups/posts/";
        
        if(isset($_FILES['capa']['name']) && !empty($_FILES['capa']['name']))
        {
            $this->load->model("Posts_model","post");
            $this->load->helper("format_helper");
            
            $this->post->title = $this->input->post('title', TRUE);
            $this->post->description = $this->input->post('description', TRUE);
            $this->post->content = $this->input->post('content', TRUE);
            $this->post->video = $this->input->post('video', TRUE);
            $this->post->active = 1;
            $this->post->group = $grupo;
            $this->post->user = $this->session->user_id;
            $postagem = $this->post->insert_with_image($_FILES['capa']['name']);
            
            $post_dir = $upload_path.string_to_slug($this->post->title)."_".$postagem;
            $cover_dir = $post_dir."/cover/";
            $carrossel_dir = $post_dir."/carrossel/";
            
            if(!is_dir($cover_dir))
            {
                if(!is_dir($post_dir))
                    mkdir($post_dir);
                mkdir($cover_dir);
            }
            if(!is_dir($carrossel_dir))
            {
                mkdir($carrossel_dir);
            }
            
            // configurações de upload
            $config['upload_path'] = $cover_dir;
            $config['file_name'] = $this->post->image;
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['overwrite'] = TRUE;
            $this->load->library('upload', $config, 'upload_image');
            $this->upload_image->initialize($config);
            
            if (!$this->upload_image->do_upload("capa"))
            {
                $this->post->delete();
                echo 0;
                exit;
            }
        }
        if(isset($_FILES['carrossel']['name'][0]) && (!empty($_FILES['carrossel']['name'][0])))
        {
            $imagem = array();
            $imagens = array();
            $files = $_FILES['carrossel'];
            
            foreach($files['name'] as $names)
            {
                $imagem = array();
                foreach($files as $key=>&$dados)
                {
                    $imagem[$key]= array_shift($dados);
                }
                $imagens[$names] = $imagem;
            }
            $_FILES = $imagens;
            echo 0;
            foreach($imagens as $imagem)
            {
                $this->load->model("Post_images_model","post_images");
                
                $nome_file = string_to_slug($this->post->title)."_".$cont.".".pathinfo($imagem['name'],PATHINFO_EXTENSION);
                
                $this->post_images->nome = $nome_file;
                $this->post_images->post = $postagem;
                $this->post_images->insert();
                
                // configurações de upload
                $config['upload_path'] = $carrossel_dir;
                $config['file_name'] = $nome_file;
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['overwrite'] = TRUE;
                $this->load->library('upload', $config, 'upload_image');
                $this->upload_image->initialize($config);
                
                if (!$this->upload_image->do_upload($imagem["name"]))
                {
                    $this->post_images->delete_by_post();
                    $this->post->delete();
                    echo 0;
                    exit;
                }
                $cont++;
            }
        }
        echo 1;
    }
    
    public function edit_post($post)
    {
        $this->load->model("Posts_model","post");
        $this->post->id = $post;
        if(!is_author($post, $this->post->group))
        {
            echo 0;
            exit;
        }
        $this->load->helper("format_helper");
        
        $upload_path = "./uploads/groups/posts/";
        
        $this->post = $this->post->load_by_id();
        
        $post_dir = $upload_path.string_to_slug($this->post->title)."_".$post;
        $new_post_dir = $upload_path.string_to_slug($this->input->post('title', TRUE))."_".$post;
        
        $cover_dir = $post_dir."/cover/";
        
        $new_cover_dir = $new_post_dir."/cover/";
        $new_carrossel_dir = $new_post_dir."/carrossel/";
        
        if(!is_dir($new_cover_dir))
        {
            if(!is_dir($new_post_dir))
            {
                rename($post_dir,$new_post_dir);
            }
            rename($cover_dir,$new_cover_dir);
        }
        
        if(!is_dir($new_carrossel_dir))
        {
            mkdir($new_carrossel_dir);
        }
        
        $this->post->title = $this->input->post('title', TRUE);
        $this->post->description = $this->input->post('description', TRUE);
        $this->post->content = $this->input->post('content', TRUE);
        $this->post->video = $this->input->post('video', TRUE);
        
        if($this->post->update_with_image(isset($_FILES['capa']['name']) ? $_FILES['capa']['name'] : null));
        {
            if(isset($_FILES['capa']['name']) && !empty($_FILES['capa']['name']))
            {
                // configurações de upload
                $config['upload_path'] = $cover_dir;
                $config['file_name'] = $this->post->image;
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['overwrite'] = TRUE;
                $this->load->library('upload', $config, 'upload_image');
                $this->upload_image->initialize($config);
                
                if (!$this->upload_image->do_upload("capa"))
                {
                    $this->post->delete();
                    echo 0;
                    exit;
                }
            
            }
            
        }
        
        
        echo 1;
        
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
            $this->load->model("Groups_model","group");
            $this->load->model("Relat_coments_model","relat_coments");
            $this->load->model("Posts_model","post");
            
            $this->group->id = $this->post->group = $this->relatorio->group = $this->relat_coments->group = $id;
            $this->data["relatorios"] = $this->relatorio->select_by_group();
            $this->data["comentarios"] = $this->relat_coments->select_by_group_with_autor();
            $this->data["group"] = $this->group->load_by_id();
            
            $this->post->user = $this->session->user_id;
             
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
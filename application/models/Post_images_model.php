<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post_images_model extends CI_Model
{
    var $id;
    var $nome;
    var $post;
    
    function __construct()
    {
        parent::__construct();
    }
    
    public function insert()
    {
        $this->db->insert("post_images", $this);
        return $this->db->insert_id();
    }
    
    public function delete()
    {
        $this->db->where("id", $this->id);
        $this->db->delete("post_images");
    }
    
    public function load_by_id()
    {
    	$sql = "select * from post_images where id=?";
    	$query = $this->db->query($sql, array($this->id_usuario));
        return $query->row(0, "Post_images_model");
    }
    
    public function select_by_post()
    {
        $this->db->from("post_images");
	    $this->db->where("post", $this->post);
    	$query = $this->db->get();
        return $query->result();
    }
    
    public function update()
	{
		$this->db->where("id", $this->id);
		$this->db->update("post_images", $this);
		return $this->db->trans_status();
	}
	
	public function delete_by_post()
	{
	    $this->db->where("post", $this->post);
	    $this->db->delete("post_images");
	}
	
	public function delete_by_img_slug()
	{
	    $this->db->where("nome", $this->nome);
	    $this->db->delete("post_images");
	}
	
	public function select_last_id()
	{
	    $this->db->from("post_images");
	    $this->db->order_by("id","desc");
	    $this->db->where("post",$this->post);
	    $query = $this->db->get();
	    return $query->row()->id;
	}
	
}

?>
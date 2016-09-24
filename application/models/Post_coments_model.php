<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post_coments_model extends CI_Model
{
    var $id;
    var $post;
    var $user;
    var $text;
    var $date;
    
    function __construct()
    {
        parent::__construct();
    }
    
    public function insert()
    {
        $this->db->insert("post_coments", $this);
        return $this->db->insert_id();
    }
    
    public function delete()
    {
        $this->db->where("id", $this->id);
        $this->db->delete("post_coments");
    }
    
    public function load_by_id()
    {
    	$sql = "select * from post_coments where id=?";
    	$query = $this->db->query($sql, array($this->id_usuario));
        return $query->row(0, "Post_coments_model");
    }
    
    public function select_by_post()
    {
        $this->db->from("post_coments");
	    $this->db->where("post", $this->post);
    	$query = $this->db->get();
        return $query->result();
    }
    
    public function select_by_post_with_user()
    {
        $this->db->from("post_coments");
        $this->db->join("users","users.id = post_coments.user");
	    $this->db->where("post", $this->post);
    	$query = $this->db->get();
        return $query->result();
    }
    
    public function update()
	{
		$this->db->where("id", $this->id);
		$this->db->update("post_coments", $this);
		return $this->db->trans_status();
	}
}

?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog_post_model extends CI_Model
{
    var $id;
    var $title;
    var $description;
    var $content;
    var $video;
    var $user;
    var $date;
    
    function __construct()
    {
        parent::__construct();
    }
    
    public function insert()
    {
        $this->db->insert("blog_post", $this);
        return $this->db->insert_id();
    }
    
    public function delete()
    {
        $this->db->where("id", $this->id);
        $this->db->delete("blog_post");
    }
    
    public function load_by_id()
    {
    	$sql = "select * from blog_post where id=?";
    	$query = $this->db->query($sql, array($this->id_usuario));
        return $query->row(0, "Blog_post_model");
    }
    
    public function update()
	{
		$this->db->where("id", $this->id);
		$this->db->update("blog_post", $this);
		return $this->db->trans_status();
	}
}

?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Posts_model extends CI_Model
{
    var $id;
    var $titulo;
    var $description;
    var $content;
    var $video;
    var $active;
    var $group;
    var $user;
    var $date;
    
    function __construct()
    {
        parent::__construct();
    }
    
    public function insert()
    {
        $this->db->insert("posts", $this);
        return $this->db->insert_id();
    }
    
    public function delete()
    {
        $this->db->where("id", $this->id);
        $this->db->delete("posts");
    }
    
    public function load_by_id()
    {
    	$sql = "select * from posts where id=?";
    	$query = $this->db->query($sql, array($this->id));
        return $query->row(0, "Posts_model");
    }
    
    public function update()
	{
		$this->db->where("id", $this->id);
		$this->db->update("posts", $this);
		return $this->db->trans_status();
	}
	
	public function select_group_cover()
	{
	    $this->db->select("*");
	    $this->db->from("posts p");
	    $this->db->where("p.active", 1);
	    $this->db->where("p.group", $this->group);
	    $this->db->order_by("p.date", "asc");
	    $query = $this->db->get();
	    return $query->row();
	}
	
	public function select_group_posts($cover=NULL)
	{
	    $this->db->select("*");
	    $this->db->from("posts p");
	    $this->db->where("p.active", 1);
	    $this->db->where("p.group", $this->group);
	    if($cover)
	        $this->db->where("p.id !=", $cover);
	    $query = $this->db->get();
	    return $query->result();
	}
	
}

?>
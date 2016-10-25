<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Posts_model extends CI_Model
{
    var $id;
    var $title;
    var $description;
    var $content;
    var $video;
    var $image;
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
    
    public function insert_with_image($image)
    {
        $this->db->insert("posts", $this);
        $this->id = $this->db->insert_id();
        $this->image = string_to_slug($this->title)."_".$this->id;
        $this->image .= ".".pathinfo($image, PATHINFO_EXTENSION);
        $this->update();
        return $this->id;
    }
    
    public function delete()
    {
        $this->db->where("id", $this->id);
        $this->db->delete("posts");
    }
    
    public function load_by_id()
    {
    	$this->db->select("*");
    	$this->db->from("posts");
    	$this->db->where("id", $this->id);
    	$query = $this->db->get();
        return $query->row(0, "Posts_model");
    }
    
    public function update()
	{
		$this->db->where("id", $this->id);
		$this->db->update("posts", $this);
		return $this->db->trans_status();
	}
	
	public function update_with_image($image=NULL)
	{
		$this->db->where("id", $this->id);
		if($image)
		{
		    $this->image = string_to_slug($this->title)."_".$this->id;
            $this->image .= ".".pathinfo($image, PATHINFO_EXTENSION);
		}
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
        $this->db->order_by("p.date", "desc");
	    $query = $this->db->get();
	    return $query->result();
	}
	
	public function check_author()
	{
	   $this->db->select("*");
	   $this->db->from("posts");
	   $this->db->where("user", $this->user);
	   $this->db->where("id", $this->id);
	   $query = $this->db->get();
	   if($query->num_rows() > 0)
	        return true;
	   return false;
	}
	
}

?>
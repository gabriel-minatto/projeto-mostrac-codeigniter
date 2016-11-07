<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Group_moderators_model extends CI_Model
{
    var $id;
    var $user;
    var $group;
    
    function __construct()
    {
        parent::__construct();
    }
    
    public function insert()
    {
        $this->db->insert("group_moderators", $this);
        return $this->db->trans_status();
    }
    
    public function delete()
    {
        $this->db->where("id", $this->id);
        $this->db->delete("group_moderators");
        return $this->db->trans_status();
    }
    
    public function load_by_id()
    {
    	$this->db->from("group_moderators");
    	$this->db->where("id",$this->id);
    	$query = $this->db->get();
        return $query->row(0, "Group_moderators_model");
    }
    
    public function update()
	{
		$this->db->where("id", $this->id);
		$this->db->update("group_moderators", $this);
		return $this->db->trans_status();
	}
	
	public function select_my_groups_with_filter($filter)
	{
	   $this->db->select("g.*,s.nome as escola");
	   $this->db->from("group_moderators gm");
	   $this->db->join("groups g","gm.group = g.id");
	   $this->db->join("schools s","g.school = s.id");
	   $this->db->where("gm.user", $this->user);
	   if($filter)
	   {
	       foreach($filter as $key=>$value)
	       {
	            if(!empty($value))
	            {
	                $this->db->like($key,$value);
	            }
	       }
	   }
	   $query = $this->db->get();
	   return $query->result();
	}
	
	public function check_moderation()
	{
	   $this->db->select("*");
	   $this->db->from("group_moderators");
	   $this->db->where("user", $this->user);
	   $this->db->where("group", $this->group);
	   $query = $this->db->get();
	   if($query->num_rows() > 0)
	        return true;
	   return false;
	}
	
	public function select_schools_by_groups_user($filter)
	{
		$this->db->select("s.*,g.nome as grupo");
		$this->db->from("schools s");
		$this->db->join("groups g","g.school = s.id");
		$this->db->join("group_moderators gm","gm.group = g.id");
		$this->db->where("gm.user", $this->user);
		if($filter)
		{
	       foreach($filter as $key=>$value)
	       {
	            if(!empty($value))
	            {
	                $this->db->like($key,$value);
	            }
	       }
		}
		$query = $this->db->get();
		return $query->result();
	}
	
	public function select_group_moderators()
	{
		$this->db->select("gm.id as moderation_id,u.*");
		$this->db->from("group_moderators gm");
		$this->db->join("users u","u.id = gm.user");
		$this->db->where("gm.group",$this->group);
		$query = $this->db->get();
		return $query->result();
	}
	
}

?>
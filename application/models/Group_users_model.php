<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Group_users_model extends CI_Model
{
    var $id;
    var $group;
    var $user;
    
    function __construct()
    {
        parent::__construct();
    }
    
    public function insert()
    {
        $this->db->insert("group_users", $this);
        return $this->db->insert_id();
    }
    
    public function delete()
    {
        $this->db->where("id", $this->id);
        $this->db->delete("group_users");
    }
    
    public function load_by_id()
    {
    	$sql = "select * from group_users where id=?";
    	$query = $this->db->query($sql, array($this->id));
        return $query->row(0, "Group_users_model");
    }
    
    public function update()
	{
		$this->db->where("id", $this->id);
		$this->db->update("group_users", $this);
		return $this->db->trans_status();
	}
	
	public function select_by_user()
	{
	    $this->db->select("g.*,gu.id as have_group");
	    $this->db->from("group_users gu");
	    $this->db->join("groups g","g.id = gu.group and gu.user=".$this->user,"right outer");
    	$query = $this->db->get();
    // 	var_dump($query->result()); exit;
	    return $query->result();   
	}
    
    public function select_users_by_group($filter)
    {
        $this->db->select("u.*,u.nome as aluno,g.nome as grupo,s.nome as escola,g.categoria as categoria");
        $this->db->from("group_users gu");
        $this->db->join("users u","u.id = gu.user");
        $this->db->join("groups g","g.id = gu.group");
        $this->db->join("schools s","s.id = g.school");
        $this->db->where("gu.group",$this->group);
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
    
    public function delete_by_group_and_user()
    {
        $this->db->where("user", $this->user);
        $this->db->where("group", $this->group);
        $this->db->delete("group_users");
        return $this->db->trans_status();
    }
}

?>
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
	    $sql = "select * from group_users gu inner join groups g on g.id = gu.group where gu.user=? ";
    	$query = $this->db->query($sql, array($this->user));
	    return $query->result();   
	}
	
	public function select_all_others()
    {
        $this->db->select("*");
        $this->db->from("groups g");
        $this->db->join("group_users gu","g.id = gu.group");
        $this->db->where("gu.user !=",$this->user);
        $query = $this->db->get();
        return $query->result();
    }
}

?>
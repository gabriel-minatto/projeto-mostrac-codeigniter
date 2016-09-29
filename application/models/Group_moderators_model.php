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
        return $this->db->insert_id();
    }
    
    public function delete()
    {
        $this->db->where("id", $this->id);
        $this->db->delete("group_moderators");
    }
    
    public function load_by_id()
    {
    	$sql = "select * from group_moderators where id=?";
    	$query = $this->db->query($sql, array($this->id));
        return $query->row(0, "Group_moderators_model");
    }
    
    public function update()
	{
		$this->db->where("id", $this->id);
		$this->db->update("group_moderators", $this);
		return $this->db->trans_status();
	}
}

?>
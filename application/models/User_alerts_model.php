<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_alerts_model extends CI_Model
{
    var $id;
    var $alert;
    var $user;
    var $embed;
    var $group;
    var $active;
    
    function __construct()
    {
        parent::__construct();
    }
    
    public function insert()
    {
        $this->db->insert("user_alerts", $this);
        return $this->db->insert_id();
    }
    
    public function delete()
    {
        $this->db->where("id", $this->id);
        $this->db->delete("user_alerts");
    }
    
    public function load_by_id()
    {
    	$sql = "select * from user_alerts where id=?";
    	$query = $this->db->query($sql, array($this->id_usuario));
        return $query->row(0, "User_alerts_model");
    }
    
    public function update()
	{
		$this->db->where("id", $this->id);
		$this->db->update("user_alerts", $this);
		return $this->db->trans_status();
	}
}

?>
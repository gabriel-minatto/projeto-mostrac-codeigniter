<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model
{
    var $id;
    var $nome;
    var $school;
    var $email;
    var $login;
    var $senha;
    var $active;
    var $type;
    
    function __construct()
    {
        parent::__construct();
    }
    
    public function insert()
    {
        $this->db->insert("users", $this);
        return $this->db->insert_id();
    }
    
    public function delete()
    {
        $this->db->where("id", $this->id);
        $this->db->delete("users");
    }
    
    public function load_by_id()
    {
    	$sql = "select * from users where id=?";
    	$query = $this->db->query($sql, array($this->id));
        return $query->row(0, "Users_model");
    }
    
    public function load_obj_login()
    {
        $this->db->select("*");
        $this->db->from("users");
	    $this->db->where("email", $this->email);
	    $this->db->where("senha", $this->senha);
	    $this->db->where("active", 1);
    	$query = $this->db->get();
        return $query->row(0, "Users_model");
    }
    
    public function update()
	{
		$this->db->where("id", $this->id);
		$this->db->update("users", $this);
		return $this->db->trans_status();
	}
	
	public function check_login()
	{
	    $this->db->select("*");
	    $this->db->from("users");
	    $this->db->where("email", $this->email);
	    $this->db->where("senha", $this->senha);
	    $this->db->where("active", 1);
	    $query = $this->db->get();
	   // echo $this->db->last_query(); exit;
	    if($query->num_rows() == 1)
	        return true;
	    return false;
	}
}

?>
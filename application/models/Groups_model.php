<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Groups_model extends CI_Model
{
    var $id;
    var $description;
    var $nome;
    var $school;
    var $categoria;
    var $active;
    var $closed;
    
    function __construct()
    {
        parent::__construct();
    }
    
    public function insert()
    {
        $this->db->insert("groups", $this);
        return $this->db->insert_id();
    }
    
    public function delete()
    {
        $this->db->where("id", $this->id);
        $this->db->delete("groups");
        return $this->db->trans_status();
    }
    
    public function load_by_id()
    {
    	$this->db->select("*");
    	$this->db->from("groups");
    	$this->db->where("id", $this->id);
    	$query = $this->db->get();
        return $query->row(0, "Groups_model");
    }
    
    public function update()
	{
		$this->db->where("id", $this->id);
		$this->db->update("groups", $this);
		return $this->db->trans_status();
	}
	
	public function select_by_id()
	{
	    $this->db->select("*");
    	$this->db->from("groups");
    	$this->db->where("id", $this->id);
    	$query = $this->db->get();
    	return $query->row();
	}
	
	public function select_groups_with_filter($filter)
	{
	   $this->db->select("g.*,s.nome as escola");
	   $this->db->from("groups g");
	   $this->db->join("schools s","g.school = s.id");
	   //$this->db->where("active", 1);
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
	   $this->db->order_by("closed","asc");
	   $this->db->order_by("active","desc");
	   $this->db->order_by("g.id","desc");
	   $query = $this->db->get();
	   return $query->result();
	}
	public function finish_group()
	{
		$this->db->set('closed', 1);
		$this->db->where('id',$this->id);
		$this->db->update('groups');
		return $this->db->trans_status();
	}
	
	public function activate_by_id()
	{
		$this->db->set('active', 1);
		$this->db->where('id',$this->id);
		$this->db->update('groups');
		return $this->db->trans_status();
	}
	
	public function deactivate_by_id()
	{
		$this->db->set('active', 0);
		$this->db->where('id',$this->id);
		$this->db->update('groups');
		return $this->db->trans_status();
	}

}

?>
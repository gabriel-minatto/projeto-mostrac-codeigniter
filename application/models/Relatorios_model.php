<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Relatorios_model extends CI_Model
{
    var $id;
    var $nome;
    var $group;
    var $content;
    
    function __construct()
    {
        parent::__construct();
    }
    
    public function select_by_group()
    {
        $this->db->select("*");
        $this->db->from("relatorios r");
        $this->db->where("r.group",$this->group);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function select_by_group_with_group()
    {
        $this->db->select("r.*");
        $this->db->from("relatorios r");
        $this->db->where("r.group",$this->group);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function insert()
    {
        $this->db->insert("relatorios", $this);
        return $this->db->trans_status();
    }
    
    public function delete()
    {
        $this->db->where("id", $this->id);
        $this->db->delete("relatorios");
        return $this->db->trans_status();
    }
    
    public function load_by_id()
    {
        $this->db->select("*");
    	$this->db->from("relatorios");
    	$this->db->where("id", $this->id);
    	$query = $this->db->get();
        return $query->row(0, "Relatorios_model");
    }
    
    public function update()
	{
		$this->db->where("id", $this->id);
		$this->db->update("relatorios", $this);
		return $this->db->trans_status();
	}
}

?>
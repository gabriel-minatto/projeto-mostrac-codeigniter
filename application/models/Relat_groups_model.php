<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Relat_groups_model extends CI_Model
{
    var $id;
    var $relatorio;
    var $group;
    
    function __construct()
    {
        parent::__construct();
    }
    
    public function insert()
    {
        $this->db->insert("relat_groups", $this);
        return $this->db->insert_id();
    }
    
    public function delete()
    {
        $this->db->where("id", $this->id);
        $this->db->delete("relat_groups");
    }
    
    public function load_by_id()
    {
    	$sql = "select * from relat_groups where id=?";
    	$query = $this->db->query($sql, array($this->id));
        return $query->row(0, "Relat_groups_model");
    }
    
    public function update()
	{
		$this->db->where("id", $this->id);
		$this->db->update("relat_groups", $this);
		return $this->db->trans_status();
	}
}

?>
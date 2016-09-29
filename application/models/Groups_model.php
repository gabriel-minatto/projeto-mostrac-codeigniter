<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Groups_model extends CI_Model
{
    var $id;
    var $description;
    var $relatorio;
    var $nome;
    var $school;
    var $categoria;
    
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
    }
    
    public function load_by_id()
    {
    	$sql = "select * from groups where id=?";
    	$query = $this->db->query($sql, array($this->id));
        return $query->row(0, "Groups_model");
    }
    
    public function update()
	{
		$this->db->where("id", $this->id);
		$this->db->update("groups", $this);
		return $this->db->trans_status();
	}
}

?>
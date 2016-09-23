<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cronograma_model extends CI_Model
{
    var $id;
    var $group;
    var $data;
    var $tarefa;
    
    function __construct()
    {
        parent::__construct();
    }
    
    public function insert()
    {
        $this->db->insert("cronograma", $this);
        return $this->db->insert_id();
    }
    
    public function delete()
    {
        $this->db->where("id", $this->id);
        $this->db->delete("cronograma");
    }
    
    public function load_by_id()
    {
    	$sql = "select * from cronograma where id=?";
    	$query = $this->db->query($sql, array($this->id_usuario));
        return $query->row(0, "Cronograma_model");
    }
    
    public function update()
	{
		$this->db->where("id", $this->id);
		$this->db->update("cronograma", $this);
		return $this->db->trans_status();
	}
}

?>
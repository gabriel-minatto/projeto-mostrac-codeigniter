<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Diarios_model extends CI_Model
{
    var $id;
    var $data;
    var $text;
    
    function __construct()
    {
        parent::__construct();
    }
    
    public function insert()
    {
        $this->db->insert("diarios", $this);
        return $this->db->insert_id();
    }
    
    public function delete()
    {
        $this->db->where("id", $this->id);
        $this->db->delete("diarios");
    }
    
    public function load_by_id()
    {
    	$sql = "select * from diarios where id=?";
    	$query = $this->db->query($sql, array($this->id_usuario));
        return $query->row(0, "Diarios_model");
    }
    
    public function update()
	{
		$this->db->where("id", $this->id);
		$this->db->update("diarios", $this);
		return $this->db->trans_status();
	}
}

?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Murais_model extends CI_Model
{
    var $id;
    var $title;
    var $recado;
    var $data;
    
    function __construct()
    {
        parent::__construct();
    }
    
    public function insert()
    {
        $this->db->insert("murais", $this);
        return $this->db->insert_id();
    }
    
    public function delete()
    {
        $this->db->where("id", $this->id);
        $this->db->delete("murais");
    }
    
    public function load_by_id()
    {
    	$sql = "select * from murais where id=?";
    	$query = $this->db->query($sql, array($this->id_usuario));
        return $query->row(0, "Murais_model");
    }
    
    public function update()
	{
		$this->db->where("id", $this->id);
		$this->db->update("murais", $this);
		return $this->db->trans_status();
	}
}

?>
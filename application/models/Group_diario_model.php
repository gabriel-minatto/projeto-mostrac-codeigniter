<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gruop_diario_model extends CI_Model
{
    var $id;
    var $group;
    var $diario;

    function __construct()
    {
        parent::__construct();
    }
    
    public function insert()
    {
        $this->db->insert("group_diario", $this);
        return $this->db->insert_id();
    }
    
    public function delete()
    {
        $this->db->where("id", $this->id);
        $this->db->delete("group_diario");
    }
    
    public function load_by_id()
    {
    	$sql = "select * from group_diario where id=?";
    	$query = $this->db->query($sql, array($this->id_usuario));
        return $query->row(0, "Group_diario_model");
    }
    
    public function update()
	{
		$this->db->where("id", $this->id);
		$this->db->update("group_diario", $this);
		return $this->db->trans_status();
	}
}

?>
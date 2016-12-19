<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Relat_coments_model extends CI_Model
{
    var $id;
    var $user;
    var $relatorio;
    var $recado;
    var $data;
    
    function __construct()
    {
        parent::__construct();
    }
    
    public function select_by_relat_with_autor()
    {
        $this->db->select("rc.id,rc.data as coment_date, rc.recado, u.nome,u.id as user");
        $this->db->from("relat_coments rc");
        $this->db->join("users u","u.id = rc.user");
        $this->db->where("rc.relatorio",$this->relatorio);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function insert()
    {
        $this->db->insert("relat_coments", $this);
        return $this->db->insert_id();
    }
    
    public function delete()
    {
        $this->db->where("id", $this->id);
        $this->db->delete("relat_coments");
        return $this->db->trans_status();
    }
    
    public function load_by_id()
    {
    	$sql = "select * from relat_coments where id=?";
    	$query = $this->db->query($sql, array($this->id));
        return $query->row(0, "Relat_coments_model");
    }
    
    public function update()
	{
		$this->db->where("id", $this->id);
		$this->db->update("relat_coments", $this);
		return $this->db->trans_status();
	}
	
}

?>
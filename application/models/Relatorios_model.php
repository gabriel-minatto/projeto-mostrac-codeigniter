<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Relatorios_model extends CI_Model
{
    var $id;
    var $tema;
    var $pergunta;
    var $objetivos;
    var $dados;
    var $resultado;
    
    function __construct()
    {
        parent::__construct();
    }
    
    public function insert()
    {
        $this->db->insert("relatorios", $this);
        return $this->db->insert_id();
    }
    
    public function delete()
    {
        $this->db->where("id", $this->id);
        $this->db->delete("relatorios");
    }
    
    public function load_by_id()
    {
    	$sql = "select * from relatorios where id=?";
    	$query = $this->db->query($sql, array($this->id_usuario));
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
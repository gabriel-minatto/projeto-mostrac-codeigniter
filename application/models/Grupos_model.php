<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Grupos_model extends CI_Model
{
    var $id_grupo;
    var $id_relatorios;
    var $id_mural;
    var $nome_grupo;
    
    function __construct()
    {
        parent::__construct();
    }
    
    public function insert()
    {
        $this->db->insert("grupos", $this);
    }
    
    public function delete()
    {
        $this->db->where("id_grupo", $this->id_grupo);
        $this->db->delete("grupos");
    }
    
    public function load_by_id()
    {
    	$sql = "select * from grupos where id_grupo=?";
    	$query = $this->db->query($sql, array($this->id_grupo));
        return $query->row(0, "Grupos_model");
    }
    
    public function update()
	{
		$all_fields = array(
			'id_relatorios' => $this->id_relatorios,
			'id_mural' => $this->id_mural,
			'nome_grupo' => $this->nome_grupo
		);
		$this->db->where("id_grupo", $this->id_grupo);
		$this->db->update("grupos", $all_fields);
		return $this->db->trans_status();
	}
    
    
    
}

?>
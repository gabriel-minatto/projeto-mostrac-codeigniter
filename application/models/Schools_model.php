<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Schools_model extends CI_Model
{
    var $id;
    var $nome;
    var $pais;
    var $uf;
    var $cidade;
    
    function __construct()
    {
        parent::__construct();
    }
    
    public function insert()
    {
        $this->db->insert("schools", $this);
        return $this->db->insert_id();
    }
    
    public function delete()
    {
        $this->db->where("id", $this->id);
        $this->db->delete("schools");
    }
    
    public function load_by_id()
    {
    	$sql = "select * from schools where id=?";
    	$query = $this->db->query($sql, array($this->id_usuario));
        return $query->row(0, "Schools_model");
    }
    
    public function update()
	{
		$this->db->where("id", $this->id);
		$this->db->update("schools", $this);
		return $this->db->trans_status();
	}
}

?>
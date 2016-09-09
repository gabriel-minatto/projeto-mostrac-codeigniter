<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios_model extends CI_Model
{
    var $id_usuario;
    var $tipo_usuario;
    var $nome;
    var $senha;
    var $email;
    var $data_nascimento;
    var $id_instituicao;
    
    function __construct()
    {
        parent::__construct();
    }
    
    public function insert()
    {
        $this->db->insert("usuarios", $this);
    }
    
    public function delete()
    {
        $this->db->where("id_usuario", $this->id_usuario);
        $this->db->delete("usuarios");
    }
    
    public function load_by_id()
    {
    	$sql = "select * from usuario where id_usuario=?";
    	$query = $this->db->query($sql, array($this->id_usuario));
        return $query->row(0, "Usuarios_model");
    }
    
    public function update()
	{
		$all_fields = array(
			'tipo_usuario' => $this->tipo_usuario,
			'nome' => $this->nome,
			'senha' => $this->senha,
			'email' => $this->email,
			'data_nascimento' => $this->data_nascimento,
			'id_instituicao' => $this->id_instituicao		
		);
		$this->db->where("id_usuario", $this->id_usuario);
		$this->db->update("usuarios", $all_fields);
		return $this->db->trans_status();
	}
}

?>
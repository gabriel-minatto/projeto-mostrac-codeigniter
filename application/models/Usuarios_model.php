<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');//isso aq eh igual em todas

class Usuarios_model extends CI_Model//o nome da classe imita o nome da tabela no banco, com _model no final e começando com letra maiuscula
{
    //esse conjunto de variaveis imita as colunas no banco, com EXATAMENTE o mesmo nome
    var $id_usuario;
    var $tipo_usuario;
    var $nome;
    var $senha;
    var $email;
    var $data_nascimento;
    var $id_instituicao;
    
    function __construct()//essa função construtora por enquanto tambem vai ser identica em todas as models
    {
        parent::__construct();
    }
    
    public function insert()
    {
        $this->db->insert("usuarios", $this);//essa função é igual em todas as models, exceto pelo nome da tabela, alocando no primeiro parametro
    }
    
    public function delete()
    {
        $this->db->where("id_usuario", $this->id_usuario);//essa tambem é igual em todas, mudando apenas q ela deve se referir a coluna index da tabela em questao
        $this->db->delete("usuarios");//muda apenas a tabela em questao
    }
    
    public function load_by_id()//aqui retornamos um objeto model carregado com uma linha do banco
    {
    	$sql = "select * from usuario where id_usuario=?"; //eh necessario alterar a tabela e tambem a coluna usada como index
    	$query = $this->db->query($sql, array($this->id_usuario)); //aqui passamos o valor que a coluna index deve filtrar, atraves de this->index
        return $query->row(0, "Usuarios_model");//aqui alteramos qual tipo de model deve ser utilizada
    }
    
    public function update()//essa funcao serve pra atualizar uma linha no banco usando os valores de um obj model
	{
		$all_fields = array(//aqui temos um array com todas as colunas do banco igualadas as colunas do obj
			'tipo_usuario' => $this->tipo_usuario,
			'nome' => $this->nome,
			'senha' => $this->senha,
			'email' => $this->email,
			'data_nascimento' => $this->data_nascimento,
			'id_instituicao' => $this->id_instituicao		
		);
		$this->db->where("id_usuario", $this->id_usuario);//coluna index / valor de index
		$this->db->update("usuarios", $all_fields); //nome da tabela / array com todos os campos
		return $this->db->trans_status();
	}
}

?>
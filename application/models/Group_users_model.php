<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Group_users_model extends CI_Model
{
    var $id;
    var $group;
    var $user;
    
    function __construct()
    {
        parent::__construct();
    }
    
    public function insert()
    {
        $this->db->insert("group_users", $this);
        return $this->db->trans_status();
    }
    
    public function delete()
    {
        $this->db->where("id", $this->id);
        $this->db->delete("group_users");
    }
    
    public function load_by_id()
    {
    	$sql = "select * from group_users where id=?";
    	$query = $this->db->query($sql, array($this->id));
        return $query->row(0, "Group_users_model");
    }
    
    public function update()
	{
		$this->db->where("id", $this->id);
		$this->db->update("group_users", $this);
		return $this->db->trans_status();
	}
	
	public function select_by_user($filter)
	{
	    $this->db->from("groups g");
	    if($this->user)
	    {
	        if(!is_teacher())
	        {
	            $this->db->select("g.*,gu.id as have_group");
	            $this->db->join("group_users gu","g.id = gu.group and gu.user=".$this->user,"left outer");
	        }
            else
            {
                $this->db->select("g.*,gm.id as have_group");
                $this->db->join("group_moderators gm","g.id = gm.group and gm.user=".$this->user,"left outer");
            }
	    }
	    else
	        $this->db->select("g.*");
        $this->db->where("active", 1);
        if($filter)
            $this->db->like('g.nome',$filter);
    	$query = $this->db->get();
	    return $query->result();   
	}
    
    public function select_users_by_group($filter)
    {
        $this->db->select("u.*,u.nome as aluno,g.nome as grupo");
        $this->db->from("group_users gu");
        $this->db->join("users u","u.id = gu.user");
        $this->db->join("groups g","g.id = gu.group");
        $this->db->where("gu.group",$this->group);
        if($filter)
		{
	       foreach($filter as $key=>$value)
	       {
	            if(!empty($value))
	            {
	                $this->db->like($key,$value);
	            }
	       }
		}
		$this->db->order_by("aluno","asc");
        $query = $this->db->get();
        return $query->result();
    }
    
    public function check_user()
	{
	   $this->db->select("*");
	   $this->db->from("group_users");
	   $this->db->where("user", $this->user);
	   $this->db->where("group", $this->group);
	   $query = $this->db->get();
	   if($query->num_rows() > 0)
	        return true;
	   return false;
	}
    
    public function delete_by_group_and_user()
    {
        $this->db->where("user", $this->user);
        $this->db->where("group", $this->group);
        $this->db->delete("group_users");
        return $this->db->trans_status();
    }
    
    public function select_all_other_active($filter) //seleciona todos os q estiverem ativos mas n estao no grupo
    {
        $this->db->select("u.*,gu.group AS is_on_group");
        $this->db->from("users u");
        $this->db->join("group_users gu","u.id = gu.user and gu.group=$this->group","left outer");
        $this->db->where("u.active", 1);
        $this->db->where("u.type", 'student');
        if($filter)
		{
	       foreach($filter as $key=>$value)
	       {
	            if(!empty($value))
	            {
	                $this->db->like($key, $value);
	            }
	       }
		}
		$this->db->order_by("u.nome","asc");
        $query = $this->db->get();
        if($query->num_rows() == 0)
        {
            echo 0;
            exit;
        }
        return $query->result();
    }
}

?>
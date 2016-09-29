<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Group_post_model extends CI_Model
{
    var $id;
    var $titulo;
    var $description;
    var $content;
    var $video;
    var $group;
    var $user;
    var $date;
    
    function __construct()
    {
        parent::__construct();
    }
    
    public function insert()
    {
        $this->db->insert("group_post", $this);
        return $this->db->insert_id();
    }
    
    public function delete()
    {
        $this->db->where("id", $this->id);
        $this->db->delete("group_post");
    }
    
    public function load_by_id()
    {
    	$sql = "select * from group_post where id=?";
    	$query = $this->db->query($sql, array($this->id));
        return $query->row(0, "Group_post_model");
    }
    
    public function update()
	{
		$this->db->where("id", $this->id);
		$this->db->update("group_post", $this);
		return $this->db->trans_status();
	}
	
	public function select_by_user()
	{
	    $sql = "select * from group_users gu inner join groups g on g.id = gu.group where gu.user=? ";
    	$query = $this->db->query($sql, array($this->user));
	    return $query->result();   
	}
}

?>
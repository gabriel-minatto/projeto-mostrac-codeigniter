<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modals_model extends CI_Model
{
    var $data = array();
    
    function __construct()
    {
        parent::__construct();
    }
    
   public function print_all()
   {
       
        $this->print_school();
        
        $this->print_group();
       
   }
   
   public function print_school()
   {
       //modal para cadastro de escolas
        $new_school = array(
          "formulario"=>"mostratec/admin/forms/new_school",
          "action"=>base_url('admin/salvar-escola'),
          "title"=>"Cadastro de Escolas",
          "modal_id"=>"new_school",
          "form_id"=>"new_school_form",
          "data"=>$this->data
          );
        $this->load->view("mostratec/modals/form_modal",$new_school);
        // #end //
   }
   
   public function print_group()
   {
        //modal para cadastro de grupos
        $new_group = array(
          "formulario"=>"mostratec/admin/forms/new_group",
          "action"=>base_url('admin/salvar-group'),
          "title"=>"Cadastro de Grupos",
          "modal_id"=>"new_group",
          "form_id"=>"new_group_form",
          "data"=>$this->data
          );
        $this->load->view("mostratec/modals/form_modal",$new_group);
        // #end //
   }
}

?>
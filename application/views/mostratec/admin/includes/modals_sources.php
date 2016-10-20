<?php
//carregamento dos arquivos modals do site

//modal para cadastro de escolas
$new_school = array(
  "formulario"=>"mostratec/admin/forms/schools",
  "action"=>base_url('admin/salvar-escola'),
  "title"=>"Cadastro de Escolas",
  "modal_id"=>"new_school",
  "form_id"=>"new_school_form"
  );
$this->load->view("mostratec/modals/form_modal",$new_school);
// #end //



?>

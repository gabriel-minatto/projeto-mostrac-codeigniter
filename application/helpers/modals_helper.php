<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	if( !function_exists( 'print_all_modal' ) ) 
	{
		function print_all_modal()
		{
			$CI =& get_instance();
			
			print_school_modal();
        
        	print_group_modal();
        	
        	print_user_modal();
		
		}
	}
	
	if( !function_exists( 'print_admin_modal' ) ) 
	{
		function print_admin_modal()
		{
			$CI =& get_instance();
			
			print_school_modal();
        
        	print_group_modal();
		
		}
	}
	
	if( !function_exists( 'print_user_area_modal' ) ) 
	{
		function print_user_area_modal()
		{
			$CI =& get_instance();
        	
        	print_student_register_modal();
        	print_login_student_modal();
        	print_new_post_modal();
		
		}
	}
	
	if( !function_exists( 'print_school_modal' ) ) 
	{
		function print_school_modal()
		{
			$CI =& get_instance();
			//modal para cadastro de escolas
	        $new_school = array(
	          "formulario"=>"mostratec/forms/new_school",
	          "action"=>base_url('admin/escola/adicionar'),
	          "title"=>"Cadastro de Escolas",
	          "modal_id"=>"new_school",
	          "form_id"=>"new_school_form",
	          "success"=>"Escola adicionada com sucesso.",
	          "data"=>$CI->data
	          );
	        $CI->load->view("mostratec/modals/form_modal",$new_school);
	        // #end //
		
		}
	}
	if( !function_exists( 'print_group_modal' ) ) 
	{
		function print_group_modal()
		{
			$CI =& get_instance();
			$CI->load->model("Schools_model","school");
			$CI->data["new_group_modal_schools"] = $CI->school->select_all();
			//modal para cadastro de grupos
	        $new_group = array(
	          "formulario"=>"mostratec/forms/new_group",
	          "action"=>base_url('admin/grupos/adicionar'),
	          "title"=>"Cadastro de Grupos",
	          "modal_id"=>"new_group",
	          "form_id"=>"new_group_form",
	          "success"=>"Grupo adicionado com sucesso.",
	          "data"=>$CI->data
	          );
	        $CI->load->view("mostratec/modals/form_modal",$new_group);
	        // #end //
		}
	}
	
	if( !function_exists( 'print_student_register_modal' ) ) 
	{
		function print_student_register_modal()
		{
			$CI =& get_instance();
			//modal para cadastro de grupos
			$CI->data = array();
	        $new_student = array(
	          "formulario"=>"mostratec/forms/new_student",
	          "action"=>base_url('usuario/salvar'),
	          "title"=>"Cadastro de Alunos",
	          "modal_id"=>"new_student",
	          "form_id"=>"new_student_form",
	          "success"=>"Cadastro efetuado com sucesso, verifique sua caixa de entrada para confirmar seu email.",
	          "data"=>$CI->data
	          );
	        $CI->load->view("mostratec/modals/form_modal",$new_student);
	        // #end //
		}
	}
	
	if( !function_exists( 'print_login_student_modal' ) ) 
	{
		function print_login_student_modal()
		{
			$CI =& get_instance();
			//modal para cadastro de grupos
			$CI->data = array();
	        $login_student = array(
	          "formulario"=>"mostratec/forms/login_student",
	          "action"=>base_url('login'),
	          "title"=>"Faça login abaixo!",
	          "modal_id"=>"login_student",
	          "form_id"=>"login_student_form",
	          "redirect"=>base_url('grupos/home'), //envia para esse endereco caso login == true
	          "data"=>$CI->data
	          );
	        $CI->load->view("mostratec/modals/login_form_modal",$login_student);
	        // #end //
		}
	}
	
	if( !function_exists( 'print_new_post_modal' ) ) 
	{
		function print_new_post_modal($grupo)
		{
			$CI =& get_instance();
			//modal para cadastro de grupos
			$CI->data = array();
	        $new_post = array(
	          "formulario"=>"mostratec/forms/new_post",
	          "action"=>base_url('grupos/posts/novo/'.$grupo->id),
	          "title"=>"Nova Postagem / ".$grupo->nome,
	          "modal_id"=>"new_group_post_".$grupo->id,
	          "form_id"=>"new_group_post_form_".$grupo->id,
	          "data"=>$CI->data
	          );
	        $CI->load->view("mostratec/modals/new_post_form_modal",$new_post);
	        // #end //
		}
	}
	
?>
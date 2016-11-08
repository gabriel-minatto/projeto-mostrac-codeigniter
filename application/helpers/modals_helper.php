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
	          "grupo"=>$grupo->id,
	          "success"=>"Post criado com sucesso, clique em ok para ser redirecionado para área de postagens.",
	          "data"=>$CI->data
	          );
	        $CI->load->view("mostratec/modals/new_post_form_modal",$new_post);
	        // #end //
		}
	}
	
	if( !function_exists( 'print_edit_post_modal' ) ) 
	{
		function print_edit_post_modal($post)
		{
			$CI =& get_instance();
			//modal para cadastro de grupos
			$CI->data = array();
	        $edit_post = array(
	          "formulario"=>"mostratec/forms/edit_post",
	          "action"=>base_url('grupos/posts/editar/'.$post->id),
	          "title"=>"Editar Post / ".$post->title,
	          "modal_id"=>"edit_group_post_".$post->id,
	          "form_id"=>"edit_group_post_form_".$post->id,
	          "success"=>"Post editado com sucesso, clique em ok para recarregar a página.",
	          "post"=>$post,
	          "data"=>$CI->data
	          );
	        $CI->load->view("mostratec/modals/edit_post_form_modal",$edit_post);
	        // #end //
		}
	}
	
	if( !function_exists( 'print_add_student_to_group_modal' ) ) 
	{
		function print_add_student_to_group_modal($grupo,$form,$refresh)
		{
			$CI =& get_instance();
			$CI->data = array();
			//modal para cadastro de estudantes nos grupos
			$CI->load->model("Group_users_model","group_user");
			$CI->group_user->group = $grupo->id;
			$CI->data["alunos"] = $CI->group_user->select_all_other_active($form);
	        $add_student = array(
	          "formulario"=>"mostratec/forms/add_student_to_group",
	          "action"=>base_url('admin/grupos/alunos/adicionar/'.$grupo->id),
	          "success"=>"Aluno adicionado com sucesso, clique em ok para recarregar a página.",
	          "refresh"=>$refresh,
	          "grupo"=>$grupo,
	          "data"=>$CI->data
	          );
	        $CI->load->view("mostratec/forms/add_student_to_group",$add_student);
	        // #end //
		}
	}
	
	if( !function_exists( 'print_add_moderator_to_group_modal' ) ) 
	{
		function print_add_moderator_to_group_modal($grupo,$form,$refresh)
		{
			$CI =& get_instance();
			$CI->data = array();
			//modal para cadastro de moderadores nos grupos
			$CI->load->model("Group_moderators_model","group_moderator");
			$CI->group_moderator->group = $grupo->id;
			$CI->data["moderators"] = $CI->group_moderator->select_all_other_active($form);
	        $add_moderator = array(
	          "action"=>base_url('admin/grupos/moderadores/adicionar/'.$grupo->id),
	          "success"=>"Moderador adicionado com sucesso, clique em ok para recarregar a página.",
	          "refresh"=>$refresh,
	          "grupo"=>$grupo,
	          "data"=>$CI->data
	          );
	        $CI->load->view("mostratec/forms/add_moderator_to_group",$add_moderator);
	        // #end //
		}
	}
	
	if( !function_exists( 'print_add_report_modal' ) ) 
	{
		function print_add_report_modal($grupo)
		{
			$CI =& get_instance();
			//modal para cadastro de grupos
			$CI->data = array();
	        $new_report = array(
	          "formulario"=>"mostratec/forms/new_report",
	          "action"=>base_url('admin/grupos/reports/adicionar/'.$grupo->id),
	          "title"=>"Novo Relatório / ".$grupo->nome,
	          "modal_id"=>"new_report_".$grupo->id,
	          "form_id"=>"new_report_form",
	          "success"=>"Relatório criado com sucesso.",
	          "reload"=>1,
	          "data"=>$CI->data
	          );
	        $CI->load->view("mostratec/modals/form_modal",$new_report);
	        // #end //
		}
	}
	
	if( !function_exists( 'print_edit_report_modal' ) ) 
	{
		function print_edit_report_modal($grupo,$report)
		{
			$CI =& get_instance();
			//modal para cadastro de grupos
			$CI->data = array("report"=>$report);
	        $edit_report = array(
	          "formulario"=>"mostratec/forms/edit_report",
	          "action"=>base_url('admin/grupos/reports/editar/'.$grupo->id.'/'.$report->id),
	          "title"=>"Editar Relatório ".$report->nome,
	          "modal_id"=>"edit_report_".$report->id,
	          "form_id"=>"edit_report_form_".$report->id,
	          "success"=>"Relatório editado com sucesso.",
	          "reload"=>1,
	          "data"=>$CI->data
	          );
	        $CI->load->view("mostratec/modals/form_modal",$edit_report);
	        // #end //
		}
	}
	
?>
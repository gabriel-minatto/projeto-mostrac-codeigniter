<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	if( !function_exists( 'logged' ) ) 
	{
		function logged()
		{
			$CI =& get_instance();
			$CI->load->helper('login');
			return ( $CI->session->userdata('user_id') != "" );
		}
	}
	
	if( !function_exists( 'is_teacher' ) )
	{
		function is_teacher()
		{
			$CI =& get_instance();
			$CI->load->helper('login');
			$type = $CI->session->userdata('user_type');
			return ($type  == "teacher" || $type == "admin" || $type == "superadmin" );
		}
	}
	
	if( !function_exists( 'is_student' ) )
	{
		function is_student()
		{
			return (logged() && !is_teacher());
		}
	}
	
	if( !function_exists( 'is_admin' ) )
	{
		function is_admin()
		{
			$CI =& get_instance();
			$CI->load->helper('login');
			$type = $CI->session->userdata('user_type');
			return ($type == "admin" || $type == "superadmin" );
		}
	}
	
	if( !function_exists( 'is_superadmin' ) )
	{
		function is_superadmin()
		{
			$CI =& get_instance();
			$CI->load->helper('login');
			$type = $CI->session->userdata('user_type');
			return ($type == "superadmin" );
		}
	}
	
	if( !function_exists( 'is_moderator' ) )
	{
		function is_moderator($grupo)
		{
			$CI =& get_instance();
			$CI->load->helper('login');
			$CI->load->model("Group_moderators_model","group_moderator");
			$CI->group_moderator->group = $grupo;
			$CI->group_moderator->user = $CI->session->user_id;
			if(is_admin() || $CI->group_moderator->check_moderation())
				return true;
			return false;
		}
	}
	
	if( !function_exists( 'is_user' ) )
	{
		function is_user($grupo)
		{
			$CI =& get_instance();
			$CI->load->helper('login');
			$CI->load->model("Group_users_model","group_user");
			$CI->group_user->group = $grupo;
			$CI->group_user->user = $CI->session->user_id;
			if(is_admin() || $CI->group_user->check_user() || is_moderator($grupo))
				return true;
			return false;
		}
	}
	
	if( !function_exists( 'is_author' ) )
	{
		function is_author($post,$grupo)
		{
			$CI =& get_instance();
			$CI->load->helper('login');
			$CI->load->model("Posts_model","post");
			$CI->post->id = $post;
			$CI->post->user = $CI->session->user_id;
			if($CI->post->check_author() || is_moderator($grupo))
				return true;
			return false;
		}
	}
	
?>
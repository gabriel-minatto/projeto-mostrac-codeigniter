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
	
?>
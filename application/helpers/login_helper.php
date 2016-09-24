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
	
?>
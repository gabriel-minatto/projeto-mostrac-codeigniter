<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	if( !function_exists( 'sql_date_to_br' ) ) 
	{
		function sql_date_to_br($data_sql)
		{
			$data = new DateTime($data_sql);
			return $data->format('d/m/Y');
		}
	}
	
	if( !function_exists( 'youtube_url_to_embed' ) ) 
	{
		function youtube_url_to_embed($url)
		{
			$embed = end(explode("watch?v=",$url));
			return "https://www.youtube.com/embed/$embed";
		}
	}
	
	
?>
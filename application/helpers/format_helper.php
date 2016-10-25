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
	
	if( !function_exists( 'string_to_slug' ) ) 
	{
		function string_to_slug($text)
		{
			 // replace non letter or digits by -
		  $text = preg_replace('~[^\pL\d]+~u', '-', $text);
		
		  // transliterate
		  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
		
		  // remove unwanted characters
		  $text = preg_replace('~[^-\w]+~', '', $text);
		
		  // trim
		  $text = trim($text, '-');
		
		  // remove duplicate -
		  $text = preg_replace('~-+~', '-', $text);
		
		  // lowercase
		  $text = strtolower($text);
		
		  if (empty($text)) {
		    return 'n-a';
		  }
		
		  return $text;
			
		}
	}

	
?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	if( !function_exists( 'show_messages' ) ) 
	{
		function show_messages()
		{
			$CI =& get_instance();
			$flashdatas = $CI->session->flashdata();
			foreach($flashdatas as $key=>$value)
			{
				if($key=="error"){ ?>
					<div class="row">
                    	<div class="col-lg-8 col-lg-offset-2">
                        <div class="alert alert-danger alert-dismissable">
                            <?= $value ?>
                        </div>
                    	</div>
                	</div>
					
			<?php }	if($key=="warning"){ ?>
					
					<div class="row">
                    	<div class="col-lg-8 col-lg-offset-2">
                        <div class="alert alert-warning alert-dismissable">
                            <?= $value ?>
                        </div>
                    	</div>
                	</div>
					
			<?php }	if($key=="success"){ ?>
			
					<div class="row">
                    	<div class="col-lg-8 col-lg-offset-2">
                        <div class="alert alert-success alert-dismissable">
                            <?= $value ?>
                        </div>
                    	</div>
                	</div>
					
				<?php }
				
			}
		
		}
	}
	
	
?>
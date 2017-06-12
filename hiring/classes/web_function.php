<?php
class web_function{
	/* function to enable main menu */
	function set_menu_active($page){ 
		$file_name = basename($_SERVER['REQUEST_URI']);
		foreach($page as $link){ 
			if($file_name == $link.'.php'){	
				return 'active';
			}else{
				// return '';
			}
		}
		
	}
	
}
$wfn = new web_function();
?>
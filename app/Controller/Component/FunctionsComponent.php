<?php
App::uses('Component', 'Controller');
class FunctionsComponent extends Component {

	/* initialize component to get data */
	public function initialize(Controller $controller) {
		$this->controller = $controller;
	}
	
	/* func tion to show the show date with time */
	public function get_current_date(){
		return date('Y-m-d H:i:s');
	}
	
	/* function to decrypt */
	function decrypt($cypher) {
		$cypher =str_replace('%20','+',str_replace(' ','+',$cypher));			
		return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, Configure::read('Security.key'), base64_decode($cypher), MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)));
    }
	
	/* function to encrypt */
	 function encrypt($plain) {	
        return trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, Configure::read('Security.key'), $plain, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND))));
    }
	
	/* function to create url variables */
	public function create_url($url,$model){ 
		$count = count($url) - 1;
		foreach($url  as $key => $param){ 	
			if(!empty($this->controller->request->data[$model][$param])){		
				$url_var .= $param.'='.str_replace('&', '||', $this->controller->request->data[$model][$param]).'&';
			}
		}
		$url_var = substr($url_var, 0, strlen($url_var)-1);
		return $url_var;
	}
	
		
	/* function to format the search keyword */
	public function format_search_keyword($keyword){
		$prefix_key = '+'.$keyword;
		$format = str_replace(' ', ' +', $prefix_key);
		$format_amp = str_replace('||', '&', $format);
		return $format_amp;
	}
	
	/* function to format the date to save */
	public function format_date_save($date){
		if(!empty($date)){
			$exp_date = explode('/', $date); 
			return $exp_date[2].'-'.$exp_date[1].'-'.$exp_date[0];
		}
	}
	
	/* function to format the date to show */
	public function format_date_show($date){ 
		$exp_date = explode('-', $date);
		return $exp_date[2].'/'.$exp_date[1].'/'.$exp_date[0];
	}
	
	/* function to get experience */
	public function get_experience(){	
		$exp['1'] = '1 Year';
		for($i = 2; $i <= 50; $i++){			
			$exp[$i] = $i.' Years';
		}
		return $exp;
	}
	
	/* function to format the drop down  */
	public function format_list($data, $model,$field1, $field2){
		foreach($data as $record){
			$format_list[$record[$model][$field1]] =  ucwords($record[$model][$field2]);
		}
		return $format_list;
	}
	
		/* function to format the drop down  */
	public function format_list_key($data, $model,$field1, $field2){
		foreach($data as $record){
			$format_list[$record[$model][$field1]] =  ucwords($record[0][$field2]);
		}	
		return $format_list;
	}
	
	 /* function to format the data for drop down */	
	function format_dropdown($list,$model, $id, $label1, $label2){ 
		foreach($list as $key => $value){ 
			$data_list[$value[$model][$id]] = ucwords($value[$model][$label1].' '.$value[$model][$label2]);		
		}	
		return $data_list;
	}
	

	
}
?>
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
	
	/* function to filter the file */
	public function filter_file($snap_file_name){
		return str_replace(array('.','_','-','(',')',' '), '', $snap_file_name);
	}	
	
	/* validate email */
	public function email_validation($email){
		if(!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)){
			return true;
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
	
	/* function to read the resume */	
	function read_document($filename){
		$file_extension = substr($filename, strlen($filename)-4, 4);
		if($file_extension == 'docx'){
			$doc = $this->read_file_docx($filename);
		}else{
			$doc = $this->read_file_doc($filename);
		}
		$match = array("'",'"',"’","‘",'“','”','–','–','-');
		$replace = array("'",'"',"'","'",'"','"','-','-','');
		$doc = str_replace($match, $replace , $doc);
		$doc = htmlentities($doc);
		return $doc;
	}
	

	
	/* function to read the docx file */
	function read_file_docx($filename){	
		$striped_content = '';
		$content = '';
		if(!$filename || !file_exists($filename)){ return false;}
		$zip = zip_open($filename);
		if (!$zip || is_numeric($zip)) return false;
		while ($zip_entry = zip_read($zip)) {
			if (zip_entry_open($zip, $zip_entry) == FALSE) continue;
			if (zip_entry_name($zip_entry) != "word/document.xml") continue;
			$content .= zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));
			zip_entry_close($zip_entry);
		}// end while
		
		zip_close($zip);
		$content = str_replace('</w:r></w:p></w:tc><w:tc>', "  ", $content);
		$content = str_replace('</w:r></w:p>', "\r\n", $content);
		$content = str_replace('</w:p>', "\r\n\n", $content);		
		$content = str_replace(array('.com', '.in'), array(".com \r\n", ".in \r\n"), $content);
		$content = str_replace(array(':'), ": ", $content);
		$striped_content = strip_tags($content);
		return $striped_content;
	}
		
	/* function to read the doc file */
	function read_file_doc($filename){	
		// ini_set('memory_limit', '-1');
		if(file_exists($filename)){
			if(($fh = fopen($filename, 'r')) !== false){
				$headers = fread($fh, 0xA00);
				// 1 = (ord(n)*1) ; Document has from 0 to 255 characters
				$n1 = ( ord($headers[0x21C]) - 1 );
				// 1 = ((ord(n)-8)*256) ; Document has from 256 to 63743 characters
				$n2 = ( ( ord($headers[0x21D]) - 8 ) * 256 );
				// 1 = ((ord(n)*256)*256) ; Document has from 63744 to 16775423 characters
				$n3 = ( ( ord($headers[0x21E]) * 256 ) * 256 );				// 1 = (((ord(n)*256)*256)*256) ; Document has from 16775424 to 4294965504 characters
				$n4 = ( ( ( ord($headers[0x21F]) * 256 ) * 256 ) * 256 );
				// Total length of text in the document
				$textLength = ($n1 + $n2 + $n3 + $n4);
				if($textLength <= 0)
				  return '';
				$extracted_plaintext = fread($fh, filesize($filename));
				
				// simple print character stream without new lines
				//echo $extracted_plaintext;
				// if you want to see your paragraphs in a new line, do this
				return  $extracted_plaintext;
				// need more spacing after each paragraph use another nl2br
			}
		}
	}
	
	 /* function to find the min and max exp */
   public function check_exp($value){ 		
		if($value == '0'){
			$str =  'Fresher';
		}else if($value < 1 && $value != ''){			
			$str = preg_replace('/^0./', '', $value).' Month';
			$value = 2;
		}else if($value >= 1){
			$str = $value.' Year';
		}
		
		if($value > 1){
			$suffix = 's';
		}
		
		return $str.$suffix;
   }
   
       /* function to get interview level text */
   public function get_level_text($level){
		switch($level){
			case '1':
			$value = 'First Interview';
			break;
			case '2':
			$value = 'Second Interview';
			break;	
			case '3':
			$value = 'Final Interview';
			break;				
		}
		return $value;
   }
   

   
  
	
	
}
?>
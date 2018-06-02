<?php
/* 
Purpose : To add database functions.
Created : Nikitasa
Date : 21-01-2017
*/
include 'configs/dbconfig.php';
class mysql{
	var $link;
	// connect database function 
	public function connect_database(){		
		$this->link = mysqli_connect(Host,Username,Password,Database);
		if(!$this->link){
			die('Unable to connect');
		}
		// return $this->link;
   }
	// query execution
	public function execute_query($query){		  
		$result = mysqli_query( $this->link, $query);  
		// mysqli_more_results($this->link);   
		return $result;
	}
  	
	
	// next query execution
	public function next_query(){		      
		mysqli_next_result($this->link);		
	}
	
	// result display	    
	public function display_result($result){ 
		$obj = mysqli_fetch_assoc($result);
		return $obj;
	} 
	
	// clear the results	    
	public function clear_result($result){ 
		mysqli_free_result($result);
   } 

	// real escape string 
	public function real_escape_str($str){
		$str = addslashes($str);
		return mysqli_real_escape_string($this->link, $str);
	}	
	// number of rows	
	public function num_rows($result){ 
		$num = mysqli_num_rows($result);
	   return $num;
	}            
	// close connection
	public function close_connection(){
		//mysqli_close($res);	
		mysqli_close($this->link);	
	}
	
	/* function to auth record */
	public function auth_billing_action($id,$st_id){ 
		// get the billing approval status		
		$query = "call check_billing_status('".$st_id."')";
		$result = $this->execute_query($query);
		$record = $this->display_result($result);	
		// check the req belongs to the user
		if($record['users_id'] == $_SESSION['user_id'] && $record['status'] == 'W'){	
			return 'pass';
		}else{
			return 'fail';
		}
	}
	
	public function auth_incentive_action($id,$st_id){ 
		// get the incentive approval status		
		$query = "call check_incentive_status('".$id."')";
		$result = $this->execute_query($query);
		$record = $this->display_result($result);	
		// check the req belongs to the user
		if($record['status'] == 'W'){	
			return 'pass';
		}else{
			return 'fail';
		}
	}
} 
$mysql = new mysql();
?>
<?php
session_start(); 
error_reporting(0);
// remote search
// include mysql class
include('classes/class.mysql.php');
// Connecting Database
$mysql->connect_database();
// include function validation class
include('classes/class.function.php');
//get search term
$keyword = $_GET['q'];
$term = $_GET['q'];
if($_GET['page'] == 'list_grade'){
	// get matched data from grade
	$query = "CALL search_grade('".$keyword."')";
	try{	
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing grade page');
		}
		// iterate until get the matched results
		while($obj = $mysql->display_result($result)){
			$data[] = strtolower($fun->match_results($keyword,$obj['grade']));		
		}
		
		// filter the duplicate values
		$unique_result = array_unique($data);	
		// display the search results
		foreach($unique_result as $res){
			if(!empty($res)){ 
				$unique[] = $res;
			}
		}
		// free the memory
		$mysql->clear_result($result);		
   }catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
   }
}elseif($_GET['page'] == 'list_base_target'){
	// get matched data from base target
	$query = "CALL search_base_target('".$keyword."')";
	try{	
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing base target page');
		}
		// iterate until get the matched results
		while($obj = $mysql->display_result($result)){
			$data[] = strtolower($fun->match_results($keyword,$obj['grade']));		
		}
		
		// filter the duplicate values
		$unique_result = array_unique($data);	
		// display the search results
		foreach($unique_result as $res){
			if(!empty($res)){ 
				$unique[] = $res;
			}
		}
		// free the memory
		$mysql->clear_result($result);		
   }catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
   }
}elseif($_GET['page'] == 'mail_box'){
	// get matched data from base target
	$query = "CALL search_mail_box('".$keyword."')";
	try{	
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing mail box page');
		}
		// iterate until get the matched results
		while($obj = $mysql->display_result($result)){
			$data[] = strtolower($fun->match_results($keyword,$obj['client_name']));		
			$data[] = strtolower($fun->match_results($keyword,$obj['candidate_name']));
		}
		
		// filter the duplicate values
		$unique_result = array_unique($data);	
		// display the search results
		foreach($unique_result as $res){
			if(!empty($res)){ 
				$unique[] = $res;
			}
		}
		// free the memory
		$mysql->clear_result($result);		
   }catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
   }
}
/*
elseif($_GET['page'] == 'list_eligibility'){
	// get matched data from eligibility
	$query = "CALL search_eligibility('".$keyword."')";
	try{	
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing eligibility page');
		}
		// iterate until get the matched results
		while($obj = $mysql->display_result($result)){
			$data[] = strtolower($fun->match_results($keyword,$obj['type']));		
		}
		
		// filter the duplicate values
		$unique_result = array_unique($data);	
		// display the search results
		foreach($unique_result as $res){
			if(!empty($res)){ 
				$unique[] = $res;
			}
		}
		// free the memory
		$mysql->clear_result($result);		
   }catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
   }
}
*/elseif($_GET['page'] == 'list_sharing_criteria'){
	// get matched data from sharing criteria
	$query = "CALL search_sharing('".$keyword."')";
	try{	
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing sharing criteria page');
		}
		// iterate until get the matched results
		while($obj = $mysql->display_result($result)){
			$data[] = strtolower($fun->match_results($keyword,$obj['type']));		
		}
		
		// filter the duplicate values
		$unique_result = array_unique($data);	
		// display the search results
		foreach($unique_result as $res){
			if(!empty($res)){ 
				$unique[] = $res;
			}
		}
		// free the memory
		$mysql->clear_result($result);		
   }catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
   }
}elseif($_GET['page'] == 'list_bonus_share'){
	// get matched data from sharing criteria
	$query = "CALL search_bonus_share('".$keyword."')";
	try{	
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing bonus share page');
		}
		// iterate until get the matched results
		while($obj = $mysql->display_result($result)){
			$data[] = strtolower($fun->match_results($keyword,$obj['type']));		
		}
		
		// filter the duplicate values
		$unique_result = array_unique($data);	
		// display the search results
		foreach($unique_result as $res){
			if(!empty($res)){ 
				$unique[] = $res;
			}
		}
		// free the memory
		$mysql->clear_result($result);		
   }catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
   }
}elseif($_GET['page'] == 'list_billing'){
	// get matched data from billing
	$query = "CALL search_billing('".$keyword."','".$_SESSION['user_id']."')";
	try{	
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing billing page');
		}
		// iterate until get the matched results
		while($obj = $mysql->display_result($result)){
			$data[] = strtolower($fun->match_results($keyword,$obj['job_title']));	
			$data[] = strtolower($fun->match_results($keyword,$obj['client_name']));	
			$data[] = strtolower($fun->match_results($keyword,$obj['candidate_name']));		
		}
		
		// filter the duplicate values
		$unique_result = array_unique($data);	
		// display the search results
		foreach($unique_result as $res){
			if(!empty($res)){ 
				$unique[] = $res;
			}
		}
		
		
		// free the memory
		$mysql->clear_result($result);		
   }catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
   }
}elseif($_GET['page'] == 'list_interview'){
	// get matched data from interview
	$query = "CALL search_interview('".$keyword."', '".$_SESSION['user_id']."', '".$_SESSION['roles_id']."')";
	try{	
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing interview page');
		}
		// iterate until get the matched results
		while($obj = $mysql->display_result($result)){
			$data[] = strtolower($fun->match_results($keyword,$obj['full_name']));
			$data[] = strtolower($fun->match_results($keyword,$obj['position']));	
			$data[] = strtolower($fun->match_results($keyword,$obj['company']));		
		}
		
		// filter the duplicate values
		$unique_result = array_unique($data);	
		// display the search results
		foreach($unique_result as $res){
			if(!empty($res)){ 
				$unique[] = $res;
			}
		}
		
		// free the memory
		$mysql->clear_result($result);		
   }catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
   }
}elseif($_GET['page'] == 'list_users'){
	// get matched data from users
	$query = "CALL search_users('".$keyword."')";
	try{	
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing users page');
		}
		// iterate until get the matched results
		while($obj = $mysql->display_result($result)){
			$data[] = strtolower($fun->match_results($keyword,$obj['full_name']));
			$data[] = strtolower($fun->match_results($keyword,$obj['email_id']));	
			$data[] = strtolower($fun->match_results($keyword,$obj['mobile']));	
			$data[] = strtolower($fun->match_results($keyword,$obj['role_name']));		
		}
		
		// filter the duplicate values
		$unique_result = array_unique($data);	
		// display the search results
		foreach($unique_result as $res){
			if(!empty($res)){ 
				$unique[] = $res;
			}
		}
		
		// free the memory
		$mysql->clear_result($result);		
   }catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
   }
}elseif($_GET['page'] == 'list_roles'){
	// get matched data from roles
	$query = "CALL search_roles('".$keyword."')";
	try{	
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing roles page');
		}
		// iterate until get the matched results
		while($obj = $mysql->display_result($result)){
			$data[] = strtolower($fun->match_results($keyword,$obj['role_name']));		
		}
		
		// filter the duplicate values
		$unique_result = array_unique($data);	
		// display the search results
		foreach($unique_result as $res){
			if(!empty($res)){ 
				$unique[] = $res;
			}
		}
		
		// free the memory
		$mysql->clear_result($result);		
   }catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
   }
}elseif($_GET['page'] == 'list_designation'){
	// get matched data from designation
	$query = "CALL search_designation('".$keyword."')";
	try{	
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing designation page');
		}
		// iterate until get the matched results
		while($obj = $mysql->display_result($result)){
			$data[] = strtolower($fun->match_results($keyword,$obj['designation']));		
		}
		
		// filter the duplicate values
		$unique_result = array_unique($data);	
		// display the search results
		foreach($unique_result as $res){
			if(!empty($res)){ 
				$unique[] = $res;
			}
		}
		
		// free the memory
		$mysql->clear_result($result);		
   }catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
   }
}elseif($_GET['page'] == 'list_contact_branch'){
	// get matched data from contact branch
	$query = "CALL search_contact_branch('".$keyword."')";
	try{	
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing contact branch page');
		}
		// iterate until get the matched results
		while($obj = $mysql->display_result($result)){
			$data[] = strtolower($fun->match_results($keyword,$obj['branch']));		
		}
		
		// filter the duplicate values
		$unique_result = array_unique($data);	
		// display the search results
		foreach($unique_result as $res){
			if(!empty($res)){ 
				$unique[] = $res;
			}
		}
		
		// free the memory
		$mysql->clear_result($result);		
   }catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
   }
}elseif($_GET['page'] == 'list_functional_area'){
	// get matched data from functional area
	$query = "CALL search_functional_area('".$keyword."')";
	try{	
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing functional area page');
		}
		// iterate until get the matched results
		while($obj = $mysql->display_result($result)){
			$data[] = strtolower($fun->match_results($keyword,$obj['function']));		
		}
		
		// filter the duplicate values
		$unique_result = array_unique($data);	
		// display the search results
		foreach($unique_result as $res){
			if(!empty($res)){ 
				$unique[] = $res;
			}
		}
		
		// free the memory
		$mysql->clear_result($result);		
   }catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
   }
}elseif($_GET['page'] == 'list_holidays'){
	// get matched data from holidays
	$query = "CALL search_holidays('".$keyword."')";
	try{	
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing holidays page');
		}
		// iterate until get the matched results
		while($obj = $mysql->display_result($result)){
			$data[] = strtolower($fun->match_results($keyword,$obj['event']));		
		}
		
		// filter the duplicate values
		$unique_result = array_unique($data);	
		// display the search results
		foreach($unique_result as $res){
			if(!empty($res)){ 
				$unique[] = $res;
			}
		}
		
		// free the memory
		$mysql->clear_result($result);		
   }catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
   }
}elseif($_GET['page'] == 'list_salary'){
	// get matched data from salary
	$query = "CALL search_salary('".$keyword."')";
	try{	
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing salary page');
		}
		// iterate until get the matched results
		while($obj = $mysql->display_result($result)){
			$data[] = strtolower($fun->match_results($keyword,$obj['employee']));		
		}
		
		// filter the duplicate values
		$unique_result = array_unique($data);	
		// display the search results
		foreach($unique_result as $res){
			if(!empty($res)){ 
				$unique[] = $res;
			}
		}
		
		// free the memory
		$mysql->clear_result($result);		
   }catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
   }
}elseif($_GET['page'] == 'list_emp_leaves'){
	// get matched data from employee leaves
	$query = "CALL search_emp_leaves('".$keyword."')";
	try{	
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing employee leavespage');
		}
		// iterate until get the matched results
		while($obj = $mysql->display_result($result)){
			$data[] = strtolower($fun->match_results($keyword,$obj['employee']));		
		}
		
		// filter the duplicate values
		$unique_result = array_unique($data);	
		// display the search results
		foreach($unique_result as $res){
			if(!empty($res)){ 
				$unique[] = $res;
			}
		}
		
		// free the memory
		$mysql->clear_result($result);		
   }catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
   }
}
/* elseif($_GET['page'] == 'add_billing_candidate_search'){
	// get matched data from joined candidate
	$query = "CALL get_billing_candidate_name('".$term."')";
	try{	
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing add billing page');
		}
		$i = 0;
		// iterate until get the matched results
		while($obj = $mysql->display_result($result)){
			if($i <= 25){
			// $data[] = ucwords($fun->match_results($keyword,$obj['first_name'])).' '.$obj['last_name'].', '.$obj['email_id'].', '.$obj['mobile'].', '.$obj['resume_id'].', '.$obj['requirements_id'].', '.$obj['clients_id'];	
			$data[] = ucwords($fun->match_results($keyword,$obj['candidate'])).', '.$obj['email_id'];
			// $data[$obj['resume_id']] = ucwords($fun->match_results($keyword,$obj['first_name'])).' '.$obj['last_name'].', '.$obj['email_id'];
			// $data_id[] = $obj['resume_id'];
			$i++;
			}
		}
		
		// filter the duplicate values
		$unique_result = array_unique($data);	
		// display the search results
		foreach($unique_result as $key => $res){
			if(!empty($res)){ 
				$unique[$key] = $res;				
				
				$email_split = explode(';', $res);
				$name_split = explode(',', $res);
				if(!empty($email_split[1])){
					$unique[$key] = '<strong>'.$name_split[0].'</strong>'.', '.$name_split[1].'<br>'.$email_split[1];
				}else{					
					$unique[$key] = '<strong>'.$name_split[0].'</strong>'.', '.$name_split[1];
				}
				
			}
		}
		// free the memory
		$mysql->clear_result($result);
	
   }catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
   }	
}

if($_GET['page'] == 'get_billing_info'){
	// get all billing details 
	$query = "CALL get_billing('".$_GET['resume_id']."')";
	// $query = "CALL get_billing('74654')";

	try{	
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing get billing data');
		}
		// iterate until get the matched results
		$obj = $mysql->display_result($result);
		// $data[] =ucwords($fun->match_results($keyword,$obj['position'])).'('.$obj['client'].')'.'('.$obj['ctc_offer'].')'.'('.$obj['billing_amount'].')'.'('.$obj['billing_date'].')'.'('.$obj['joined_date'].')';	
		$obj['billing_date'] = $fun->convert_date_to_display($obj['billing_date']);
		$obj['joined_date'] = $fun->convert_date_to_display($obj['joined_date']);
		// filter the duplicate values
		// $unique_result = array_unique($data);	
		// display the search results
		foreach($obj as $res){
			$unique[] = $res;
		}
		// free the memory
		$mysql->clear_result($result);		
   }catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
   }
} */


if(!empty($unique)){
	// display the search results
	foreach($unique as $res):
		if(!empty($res)): 
			echo $res."\n";
		endif;
	endforeach;
}else{
	echo $no_data = 'No Results!';
	// echo json_encode($no_data); 
}

/*
if(!empty($unique)){
	echo json_encode($unique); 
}else{
	$no_data[] = 'No Results!';
	echo json_encode($no_data); 
} */
// calling mysql close db connection function
$c_c = $mysql->close_connection(); 
?>
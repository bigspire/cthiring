<?php
// show no records found if no results are matching
//if(empty($results)): echo "No Results Found"; endif;
// execute only when it is not empty

if(!empty($results)): 
	
	// iterate until get the matched results
	foreach($results as $data):
	
		$result[] = $this->Functions->match_results($keyword,$data['User']['first_name']);
		$result[] = $this->Functions->match_results($keyword,$data['Location']['location']);
		$result[] = $this->Functions->match_results($keyword,$data['User']['email_id']);

		
	endforeach;
	

	// filter the duplicate values
	$unique_result = array_unique($result);
	
	// display the search results
	foreach($unique_result as $res):
		if(!empty($res)): 
			echo $res."\n";
		endif;
	endforeach;
	
endif;
?>
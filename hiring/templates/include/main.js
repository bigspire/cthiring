/* placement enquiry */
 
 function validate_placement_enquiry() {	
		//Note: assign field name
		var field_name = new Array('ins_name', 'placement_coord', 'email_address');
		//Note: assign field type
		var field_type = new Array("required", "required", "email");
		
		var field_msg = new Array('','','','','','','','','','','');
		
		var field_error_msg = new Array('Pls enter the inst. name', 'Please enter the placement co-ordinator', 'Pls enter the email id');
		
		var field_adv_error_msg = new Array('', '', '');
		
		var field_length=field_name.length;

		
		var validation = item_validation(field_name, field_type,field_msg,field_error_msg,field_adv_error_msg,'');
		
		if (validation == true) {
			return true;
		} else {
			return false;
		}
		// 
		return false;
 }
 
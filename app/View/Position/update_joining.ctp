<div id="container">
		<div id="content">
			<div id="maincontainer" class="clearfix">
			
			<!-- main content -->
            <div id="contentwrapper">
               <div class="main_content" style="min-height:auto;">
            <div class="row-fluid">
				 <div class="span12">
		<?php
		if($cv_update_status == '1'):?>					
		<div id="flashMessage" class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert-success">×</button>Joining Status Updated Successfully</div>
		Redirecting now...
		<?php endif; ?>	

		
	<?php
		if($cv_update_status == ''):?>								
<?php echo $this->Form->create('Position', array('id' => '', 'class' => 'formID')); ?>
	<div class="box">
	<div class="box-title mb5">
			<h4><?php echo $headLabel;?></h4>
	</div>
	
	
	<div class="row-fluid">
		<div class="span6">
			<table class="table table-bordered dataTable" align="centre">
				<tbody> 
				
				<tr class="tbl_row" >
					<td width="120" class="tbl_column">Candidate Name
					</td>
						<td>
						<?php echo $this->Form->input('candidate', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'span8', 'readonly' => 'readonly', 'value' => $candidate_name,   'required' => false, 'placeholder' => '')); ?> 					
						</td>	
				</tr>
	<?php if(!$validation):?>			
				<tr class="tbl_row" >
					<td width="120" class="tbl_column"><?php echo $field_label;?> <span class="f_req">*</span>
					</td>
						<td>
						<?php echo $this->Form->input($field_name, array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'span8 datepick',  'required' => false, 'placeholder' => '',
						'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 					
						</td>	
				</tr>
				
				
	<?php endif; ?>			
			
<?php if($valid_st == 'not_joined' || $valid_st == 'deferred'):?>
				
				<tr class="" >
					<td width="120" class="tbl_column">Reason <span class="f_req">*</span>
					</td>
						<td>
					<?php echo $this->Form->input('reason_id', array('div'=> false,'type' => 'select', 'label' => false, 
		'class' => 'span8', 'id' => '', 'empty' => 'Select', 'required' => false, 'placeholder' => '', 
		'style' => "clear:left", 'options' => $rejectList, 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 
							
 					
						</td>	
				</tr>			
				
	<?php endif; ?>			
				<tr class="tbl_row" >
					<td width="120" class="tbl_column">Remarks
					
					<?php if($validation):?>
					<!--span class="f_req">*</span-->
					<?php endif; ?>
					
					
					</td>
						<td>
					<?php echo $this->Form->input('note', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'span8',  'rows' => '3',
  'required' => false, 'placeholder' => '',	'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 

						</td>	
				</tr>
				</tbody>
			</table>
			<div class="form-actions">
			<input name="submit" class="btn btn-gebo theForm" value="Submit"  type="submit"/>
					<a class="jsRedirect toggleSearch"  href="javascript:window.close()">
					<input type="button" value="Cancel" id="cancel" class="btn cancel"/></a>
					

					<?php if($field_name == 'plan_join_date'):?>
					<input type="hidden" id="start_date" name="start_date" value="<?php echo date('d/m/Y', strtotime('+1 day'));?>">
					<?php endif; ?>
					
					<?php if($field_name == 'joined_on'):?>
					<input type="hidden" id="start_date" name="start_date" value="<?php echo date('d/m/Y', strtotime($offer_select_date));?>">
					<?php endif; ?>
					
					
			</div>
		</div>
	</div>
</div>
</form>

<?php endif; ?>	

<input type="hidden" id="success_page" value="<?php echo $this->webroot;?>position/view/<?php echo $this->request->params['pass'][1]?>/?tab=cv_status"/>


  </div>
</div>
</div> 
</div>
</div>
</div>
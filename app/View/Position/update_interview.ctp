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
		<button type="button" class="close" data-dismiss="alert-success">×</button>Interview Status Updated Successfully</div>
		Redirecting now...
		<?php endif; ?>	

		
									<?php echo $this->Session->flash();?>

									
									
	<?php if($cv_update_status == ''):?>							
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
				
				<tr class="" >
					<td width="120" class="tbl_column">Reject Reason <span class="f_req">*</span>
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
					
					<?php if(!$validation):?>
					<!--span class="f_req">*</span-->
					<?php endif; ?>
					
					</td>
						<td>
					<?php echo $this->Form->input('note', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'span8',  'rows' => '3',
  'required' => false, 'placeholder' => '',	'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 

						</td>	
				</tr>
					<?php if($validation && $this->request->params['pass'][4] != '5'):?>
					<tr class="" >
					<td width="120" class="tbl_column">Next Interview
					
					<span class="f_req">*</span>
					
					</td>
						<td>
						<?php echo $this->Form->input('next_interview', array('div'=> false,'type' => 'radio', 'label' => false,  'style' => 'margin:4px 2px', 'class' => 'next_inter', 
	'options' => array('Y' => 'Applicable', 'N' => 'Not Applicable'), 'separator' => ' ', 'id' => 'next_inter',  'required' => false, 'placeholder' => '', 
	'legend' => false, 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?>

	<div id="flashMessage" class="dn alert offer-info" style="width:65%;margin-top:15px">
	This CV will now be moved to Offer Status </div>
						</td>	
				</tr>
				<?php endif; ?>
				
				</tbody>
			</table>
			<div class="form-actions">
			<input name="submit" class="btn btn-gebo theForm" value="Submit"  type="submit"/>
					<a class="jsRedirect toggleSearch"  href="javascript:window.close()">
					<input type="button" value="Cancel" id="cancel" class="btn cancel"/></a>
					
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
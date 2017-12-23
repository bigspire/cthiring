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
		<button type="button" class="close" data-dismiss="alert-success">×</button>CV Sent Successfully</div>
		Redirecting now...
		<?php endif; ?>		 		
			
				
		<?php
		if($cv_update_status == ''):?>					
<?php echo $this->Form->create('Position', array('id' => '', 'class' => 'formID')); ?>
	<div class="box">
	<div class="box-title mb5">
			<h4>Send CV to Client</h4>
	</div>
	
	
	<div class="row-fluid">
		<div class="span12">
			<table class="table table-bordered dataTable" align="centre">
				<tbody> 
				
				<tr class="tbl_row" >
					<td width="120" class="tbl_column">Client  
					</td>
						<td>
						<?php echo $this->Form->input('client_name', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'span8', 'readonly' => 'readonly', 'value' => $this->request->query['client_name'],   'required' => false, 'placeholder' => '')); ?> 					
						</td>	
				</tr>
				
				<tr class="tbl_row" >
					<td width="120" class="tbl_column">Candidate(s) 
					</td>
						<td>
						<?php echo $this->Form->input('candidate', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'span8', 'readonly' => 'readonly', 'value' => $candidate_to,   'required' => false, 'placeholder' => '')); ?> 					
						</td>	
				</tr>
				
					<tr class="tbl_row" >
					<td width="120" class="tbl_column">Subject <span class="f_req">*</span>
					</td>
						<td>
						<?php echo $this->Form->input('subject', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'span8', 'value' => $subject_1,
						'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')), 'required' => false, 'placeholder' => '')); ?> 					
						</td>	
				</tr>
				
			
				
				
				<tr class="tbl_row" >
					<td width="120" class="tbl_column">Message <span class="f_req">*</span>
					</td>
						<td>
					<?php echo $this->Form->input('message', array('div'=> false,'type' => 'text', 'label' => false, 
					'class' => 'span10 wysiwyg',  'cols' => '6', 'style' => 'height:180px;font-size:11px;', 
					'required' => false, 'placeholder' => '', 'value' => $body_1, 
					'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 

						</td>	
				</tr>
				</tbody>
			</table>
				
								<input type="hidden" id="tiny_readonly" name="tiny_readonly" value="<?php echo $tiny_readonly;?>">

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


	<input type="hidden" id="success_page" value="<?php echo $this->webroot;?>position/view/<?php echo $spec_id;?>/?tab=sent"/>

  </div>
</div>
</div> 
</div>
</div>
</div>
<div id="container">
		<div id="content">
			<div id="maincontainer" class="clearfix">
			
			<!-- main content -->
            <div id="contentwrapper">
               <div class="main_content" style="min-height:auto;">
            <div class="row-fluid">
				 <div class="span12">
		<?php
		if($this->request->query['cv_update_status'] == '1'):?>					
		<div id="flashMessage" class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert-success">×</button>CV Sent Successfully</div>
		Redirecting now...
		<?php endif; ?>	

		
	<?php if($this->request->query['cv_update_status'] != '1'):?>							
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
						<?php echo $this->Form->input('candidate', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'input-large', 'readonly' => 'readonly', 'value' => $candidate_name,   'required' => false, 'placeholder' => '')); ?> 					
						</td>	
				</tr>
				
				
				<tr class="tbl_row" >
					<td width="120" class="tbl_column">Remarks
					
					<?php if(!$validation):?>
					<span class="f_req">*</span>
					<?php endif; ?>
					</td>
						<td>
					<?php echo $this->Form->input('note', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'span8', 'cols' => '10', 'rows' => '3',
  'required' => false, 'placeholder' => '',	'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 

						</td>	
				</tr>
				</tbody>
			</table>
			<div class="form-actions">
			<input name="submit" class="btn btn-gebo theForm" value="Submit"  type="submit"/>
					<a class="jsRedirect toggleSearch"  href="javascript:window.close()">
					<input type="button" value="Cancel" id="cancel" class="btn cancel"/></a>
					<input type="hidden" id="success_page" value="<?php echo $this->webroot;?>position/view/<?php echo $this->request->params['pass'][1]?>/?tab=cv_status"/>
			</div>
		</div>
	</div>
</div>
</form>

<?php endif; ?>	
  </div>
</div>
</div> 
</div>
</div>
</div>
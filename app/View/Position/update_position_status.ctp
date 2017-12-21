<div id="container">
		<div id="content">
			<div id="maincontainer" class="clearfix">
			
			<!-- main content -->
            <div id="contentwrapper">
               <div class="main_content" style="min-height:auto;">
            <div class="row-fluid">
				 <div class="span12">
		<?php
		if($form_status == '1'):?>					
		<div id="flashMessage" class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert-success">×</button>Position Status Changed Successfully</div>
		Redirecting now...
		<?php endif; ?>	

		
	<?php if($form_status == ''):?>							
<?php echo $this->Form->create('Position', array('id' => '', 'class' => 'formID')); ?>
	<div class="box">
	<div class="box-title mb5">
			<h4>Change Position Status</h4>
	</div>
	
	
	<div class="row-fluid">
		<div class="span6">
			<table class="table table-bordered dataTable" align="centre">
				<tbody> 
				
		
				
				
				<tr class="tbl_row" >
					<td width="120" class="tbl_column">New Status <span class="f_req">*</span>
					</td>
						<td>
					<?php echo $this->Form->input('req_status_id', array('div'=> false,'type' => 'select', 'label' => false, 
		'class' => 'span8', 'id' => '', 'empty' => 'Select', 'required' => false, 'placeholder' => '', 
		'style' => "clear:left", 'options' => $stList, 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 
							
 					
						</td>	
				</tr>
				
				
				
				<tr class="" >
					<td width="120" class="tbl_column">Remarks
					
					<?php if($this->request->params['pass']['1'] == '10'):?>
					 <span class="f_req">*</span>
					<?php endif; ?>
					 
					</td>
						<td>
					<?php echo $this->Form->input('status_remark', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'span8',  'rows' => '3',
  'required' => false, 'placeholder' => '',	'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 

						</td>	
				</tr>
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

<input type="hidden" id="success_page" value="<?php echo $this->webroot;?>position/view/<?php echo $this->request->params['pass'][0]?>/<?php echo $this->request->params['pass'][1]?>/"/>
  </div>
</div>
</div> 
</div>
</div>
</div>
<div id="container">
		<div id="content">
			<div id="maincontainer" class="clearfix">
			
			<!-- main content -->
            <div id="contentwrapper">
               <div class="main_content" style="min-height:auto;">
            <div class="row-fluid">
				 <div class="span12">
		<?php
		if($this->request->query['update'] == 'approved'):	?>					
		<div id="flashMessage" class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert-success">×</button>Position Approved Successfully</div>
		<?php endif; ?>		 		
			
		<?php
		if($this->request->query['update'] == 'rejected'):	?>					
		<div id="flashMessage" class="alert alert-error">
		<button type="button" class="close" data-dismiss="alert-error">×</button>Position Rejected Successfully</div>
		<?php endif; ?>				
						
<?php echo $this->Form->create('Position', array('id' => '', 'class' => 'formID')); ?>
	<div class="box">
	<div class="box-title mb5">
	
			<h4>
			<?php if($this->request->params['pass'][0] == 'approve'):?>
			Approve Position
			<?php else:?>
			Reject Position
			<?php endif; ?>

			</h4>
	</div>
	
	
	<div class="row-fluid">
		<div class="span6">
			<table class="table table-bordered dataTable" align="centre">
				<tbody> 
				<tr class="tbl_row" >
					<td width="120" class="tbl_column">Remarks
					<?php if($this->request->params['pass']['0'] == 'reject'):?>
					<span class="f_req">*</span>
					<?php endif; ?>
					</td>
						<td>
					<?php echo $this->Form->input('remarks', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'span8', 'cols' => '10', 'rows' => '6',
  'required' => false, 'placeholder' => '',	'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 

						</td>	
				</tr>
				</tbody>
			</table>
			<div class="form-actions">
			<input name="submit" class="btn btn-gebo theForm" value="Send"  type="submit"/>
					<a class="jsRedirect toggleSearch"  href="javascript:window.close()">
					<input type="button" value="Cancel" id="cancel" class="btn cancel"/></a>
					<input type="hidden" id="success_page" value="<?php echo $this->webroot;?>position/index/pending/"/>
					<input type="hidden" id="action" value="<?php echo $this->request->params['pass'][1];?>"/>
			</div>
		</div>
	</div>
</div>
</form>
  </div>
</div>
</div> 
</div>
</div>
</div>
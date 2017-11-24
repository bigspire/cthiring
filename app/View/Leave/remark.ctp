<div id="container">
		<div id="content">
			<div id="maincontainer" class="clearfix">
			
			<!-- main content -->
            <div id="contentwrapper">
               <div class="main_content" style="min-height:auto;">
            <div class="row-fluid">
				 <div class="span12">
		
		<?php if($form_status == '1'):	?>					
		<div id="flashMessage" class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert-success">×</button>Leave <?php echo $action_status;?> Successfully</div>
		<?php endif; ?>		 		
			
	
<?php if($form_status == ''):	?>		
						
<?php echo $this->Form->create('Leave', array('id' => '', 'class' => 'formID')); ?>
	<div class="box">
	<div class="box-title mb5">
	
			<h4>
			<?php if($this->request->params['pass'][3] == 'A'):?>
			Approve Leave
			<?php elseif($this->request->params['pass'][3] == 'R'):?>
			Reject Leave
			<?php else:?>
			Cancel Leave
			<?php endif; ?>

			</h4>
	</div>
	
	
	<div class="row-fluid">
		<div class="span6">
			<table class="table table-bordered dataTable" align="centre">
				<tbody> 
				<tr class="tbl_row" >
					<td width="120" class="tbl_column">Remarks
				<?php if($this->request->params['pass'][3] == 'R' || $this->request->params['pass'][3] == 'C'):?>
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
					<input type="hidden" id="action" value="<?php echo $this->request->params['pass'][3];?>"/>
			</div>
		</div>
	</div>
</div>
</form>
<?php endif; ?>	
		<?php $action =  $this->request->params['pass'][3] == 'C' ? '' : 'pending';?>
		<input type="hidden" id="success_page" value="<?php echo $this->webroot;?>leave/index/<?php echo $action;?>"/>

  </div>
</div>
</div> 
</div>
</div>
</div>
<div id="maincontainer" class="clearfix">
<?php echo $this->element('header');?>			
			<!-- main content -->
            <div id="contentwrapper">
               <div class="main_content">
            <div class="row-fluid">
				 <div class="span12">
				  <nav>
                        <div id="jCrumbs" class="breadCrumb module">
                            <ul>
                                <li>
                                    <a href="<?php echo $this->webroot;?>home/"><i class="icon-home"></i></a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->webroot;?>event/">Event</a>
                                </li>
                            
                                <li>
                                   Edit Event
                                </li>
                            </ul>
                        </div>
                    </nav>
			
	<?php echo $this->Form->create('Event', array('id' => '', 'class' => 'formID', 'enctype' => 'multipart/form-data')); ?>
			
	<?php echo $this->Session->flash();?>

			
	<div class="box">
	
		<div class="row-fluid">
		<div class="span12">
		<div class="mbox">
			<div class="tabbable">
				
		<div class="tab-content" style="overflow:visible">
		<div class="tab-pane active" id="basic">
			<div class="span6">
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
				<tbody>
					  	<tr class="tbl_row">
										<td width="120" class="tbl_column">Event Details <span class="f_req">*</span></td>
										<td> 
										
	<?php echo $this->Form->input('title', array('div'=> false, 'id' => 'field0', 'type' => 'text', 'label' => false, 'class' => 'input-xlarge',  'required' => false, 'placeholder' => '', 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 	
					

				
		<input type="hidden" id="start_date" name="start_date" value="<?php echo date('d/m/Y');?>">

			
									

		</td>
									</tr>

							   <tr class="">
										<td width="120" class="tbl_column">Start Time <span class="f_req">*</span></td>
										<td>	
										
	<?php echo $this->Form->input('start', array('div'=> false, 'id' => 'field1', 'type' => 'text', 'label' => false, 'class' => 'input-xlarge datetimepicker',  'required' => false, 'placeholder' => '', 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 		
	
										</td>	
									</tr>	
						
																	
					
						
				    
																										
				</tbody>
			</table>
		</div>
							
		<div class="span6">		
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
				<tbody>
					
					
					<tr class="tbl_row">
							<td width="135" class="tbl_column">End Time </td>
							<td>										
			<?php echo $this->Form->input('end', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'input-xlarge datetimepicker',  'required' => false, 'placeholder' => '', 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 													
				
							</td>	
						</tr>	
						
									
				</tbody>
			</table>
		</div>
		
		
		</div>

		
		</div>
		</div>
		</div>	
</div>
</div>
<div class="form-actions">



<?php echo $this->Form->input('Event.id', array('type' => 'hidden')); ?>


<?php echo $this->Form->input('webroot', array('type' => 'hidden', 'value' => $this->webroot.'event/', 'id' => 'webroot')); ?>

						<?php echo $this->Form->input('page', array('type' => 'hidden', 'value' => 'edit'));?>

									<input type="hidden" id="start_time" value="<?php echo date('d/m/Y');?>">

				<input type="submit" class="btn btn-gebo" type="submit" value="Submit">
				
				<a href="javascript:void(0)" class="cancelBtn cancel_event jsRedirect">
				<input type="button" value="Cancel" class="btn"></a>

</div>
                    </div>
                    
				</form>
         </div>
       </div> 
	</div>
</div>
</div>
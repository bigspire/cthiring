<div id="maincontainer" class="clearfix">
			<?php echo $this->element('header');?>
            <!-- main content -->
            <div id="contentwrapper">
                <div class="main_content">
                
			
					
					<div class="row-fluid printArea">
					
						 <div class="span12">

 <nav>
                        <div id="jCrumbs" class="breadCrumb module no-print">
                            <ul>
                                <li>
                                    <a href="<?php echo $this->webroot;?>home/"><i class="icon-home"></i></a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->webroot;?>leave/">Leave</a>
                                </li>
                            
                                <li>
                                   View Leave
                                </li>
                            </ul>
                        </div>
                    </nav>
					
				
							
							
							
							
								<div class="row-fluid">
							<div class="span12">
							<div class="mbox">
							<div class="tabbable">
						
							
							
							<div class="tab-content"  style="overflow:auto;max-height:300px;">
										<div class="tab-pane active" id="mbox_basic">
										<div class="span6">
							<table class="table table-striped table-bordered dataTable" style="margin-bottom:0">
								<tbody>
									<tr>
										
										<td width="120" class="tbl_column">Leave From</td>
										<td><?php echo $this->Functions->format_date($leave_data['Leave']['leave_from']);?></td>
											
									</tr>
								
										<tr>
										
										<td class="tbl_column">Session</td>
										<td><?php echo $this->Functions->get_session($leave_data['Leave']['session']);?></td>
											
									</tr>
									
										<tr>
										
										<td class="tbl_column">Reason</td>
										<td><?php echo $leave_data['Leave']['reason_leave'];?></td>
											
									</tr>
									
									
										
				<tr>
										
										<td class="tbl_column">Created On</td>
										<td><?php echo $this->Functions->format_date($leave_data['Leave']['created_date']);?></td>
											
									</tr>
									
									

	
								</tbody>
							</table>
							</div>
							
								<div class="span6 no-print">
							<table class="table  table-striped  table-bordered dataTable" style="margin-bottom:0">
								<tbody>									
									<tr>
										
										<td class="tbl_column">Leave To </td>
										<td><?php echo $this->Functions->format_date($leave_data['Leave']['leave_to']);?></td>
											
									</tr>
									
									<tr>
										
										<td class="tbl_column" style="width:140px;">Leave Type</td>
						<td><?php echo $this->Functions->get_leave_type($leave_data['Leave']['leave_type']);?></td>

									</tr>
									<tr>
										
										<td class="tbl_column">Created By</td>
										<td><?php echo $leave_data['Creator']['first_name'];?></td>
											
									</tr>
							
									
									
								</tbody>
							</table>
							</div>
							</div>
									
					 </div>
					  
		
	
	
                      </div>  
					</div>
					
					
					
					
				
					
					
					
					</div></div>

							<div class="form-actions">
<?php if($leave_data['Leave']['is_approve'] == 'W' &&  $this->request->params['pass'][2] == 'pending'):?>

<a class="iframeBox unreadLink" rel="tooltip" title="Approve Leave" href="<?php echo $this->webroot;?>leave/remark/<?php echo $leave_data['Leave']['id'];?>/<?php echo $this->request->params['pass'][1];?>/<?php echo $leave_data['Leave']['created_by'];?>/A/<?php echo $stmemberID;?>" val="40_55"><input type="button" value="Approve" class="btn btn btn-success"/></a>
<a class="iframeBox unreadLink" rel="tooltip" title="Reject Leave" href="<?php echo $this->webroot;?>leave/remark/<?php echo $leave_data['Leave']['id'];?>/<?php echo $this->request->params['pass'][1];?>/<?php echo $leave_data['Leave']['created_by'];?>/R/<?php echo $stmemberID;?>" val="40_55"><input type="button" value="Reject" class="btn btn btn-danger"/></a>
<a href="<?php echo $this->webroot;?>leave/index/pending/" rel="tooltip" title="Cancel and Back to Leave"  class="jsRedirect"><button class="btn">Cancel</button></a>
<?php else:?>			
<a href="<?php echo $this->webroot;?>leave/index/<?php echo $this->request->params['pass'][2];?>" rel="tooltip" title="Back to Leave"  class="jsRedirect"><button class="btn">Back</button></a>
<?php endif; ?>
						
					</div>
						
		</div>
			


									
			
		   </div>
            
		</div>
		
		</div>
</div>
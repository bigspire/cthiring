
	<div class="container-fluid" id="content">
		<div id="main">
			<div class="container-fluid">
				
			
				<?php echo $this->Session->flash();?>
					<div class="row-fluid">
							
						<div class="span12">
						<div class="box">
							<div class="heading clearfix">
								<h3 class="pull-left">Messages <small>list</small></h3>
					
							</div>
							<div class="box-content nopadding">
								<ul class="messages scrollable replyMsg" style="margin-left:0" data-height="280" data-visible="true" data-start="top">
								
								<?php echo $this->element('reply_msg'); ?>
									
								<?php if(count($reply_data) == 0):?>
								<div class="alert">
											<button type="button" class="close" data-dismiss="alert">×</button>
											<strong>No messages!</strong>

<br><br> Be the first to add! 
										</div>
								<?php endif; ?>
									
								</ul>
								
								
								<div class="typing dn">
										<span class="name"></span> Saving... Pls wait..
									</div>
									
									
									
									<div class="messages insert bdSubmit" style="margin-top:20px;">
											<div class="text">
<textarea  id="reply_msg" name="text" placeholder="Type here..." class="input-block-level form-control autosize-transition Reply"></textarea>
			<input type="button" id="replyMsg" class="btn btn-primary" value="Submit" class=""/>
											</div>
										</div>	
											
									
							
								
							</div>
						</div>
					</div>	
									
									</div>
									
									
								<input type="hidden" value="<?php echo $this->webroot;?>position/" id="webroot"/>

								<input type="hidden" value="<?php echo $this->request->params['pass'][0];?>" id="bd_id"/>	
								<?php echo $this->Form->end(); ?>
							</div>
						
					
				</div>
					
					
				</div>
		
			
		

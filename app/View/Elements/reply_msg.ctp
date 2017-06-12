<?php foreach($reply_data as $key => $reply):?>	
			
			
			<div class="alert" style="color:#2d2d2a;border:1px solid #e5e4e4;background:#efefef">
								
			<span style="color:#1986b2"><strong><?php echo  $reply['Creator']['first_name'].' '.$reply['Creator']['last_name'];?></strong>:
			<?php echo $this->Functions->time_diff($reply['Message']['created_date'], '1', '1');?> 
			</span> <br>					
								<?php echo $reply['Message']['message'];?> 
							</div>

						
								<?php endforeach;?>	
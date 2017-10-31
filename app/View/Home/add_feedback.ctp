<div class="row-fluid">
          
		  <?php echo $this->Session->flash();?>

			<div class="span6">
	<?php echo $this->Form->create('Home', array('class' => 'formID form-horizontal well')); ?>
<form class="form-horizontal well">
										<fieldset>
											<p class="f_legend">Feedback / Suggestions Form</p>
											
											<div class="control-group">
												<label class="control-label">Enter your Message</label>
												<div class="controls">
<?php echo $this->Form->input('message', array('div'=> false,'type' => 'textarea', 'label' => false, 'class' => 'span10',  'id' => 'msg', 'required' => false, 'placeholder' => '',  'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 
												</div>
											</div>
											<div class="control-group">
												<div class="controls">
													<input class="btn" type="submit" value="Send"/>
												</div>
											</div>
										</fieldset>
									</form>
</div>
											</div>
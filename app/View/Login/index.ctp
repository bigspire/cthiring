<style>
body{background:#2E162E;}
</style>
				<div style="background:#fff;padding:10px;width:130px;border-radius:5px;margin-left:42%;margin-bottom:15px;position:absolute;top:9%">
				<a href="http://career-tree.in" target="_blank" style=""><img src="<?php echo $this->webroot;?>img/career-tree-logo-small.png" alt="" class="retina-ready"></a>
				</div>

<h1 style="margin-left:39%;color:#fff;padding-bottom:15px;font-size:44px;">Manage Hiring</h1>
		<div class="login_box">
			<?php echo $this->Form->create('Login', array('id' => 'login_form', 'class' => 'formID')); ?>

				<div class="top_b">Sign in to Manage Hiring 
</div>    
				<?php echo $this->Session->flash();?>
				
				<!--div class="alert alert-info alert-login">
					Thank You, you have logged off.
				</div-->
				<div class="cnt_b">
					<div class="formRow">
						<div class="input-prepend">
							<span class="add-on"><i class="icon-user"></i></span>
							<?php echo $this->Form->input('email', array('div'=> false,'type' => 'text', 'label' => false, 'class' => '',  'required' => false, 'placeholder' => 'Email Address', 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error2')))); ?> 

						</div>
					</div>
					<div class="formRow" style="margin-top:10px;">
						<div class="input-prepend">
							<span class="add-on"><i class="icon-lock"></i></span>
						<?php echo $this->Form->input('mypassword', array('div'=> false,'type' => 'password', 'label' => false, 'class' => '', 'placeholder' => 'Password',  'required' => false, 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error2')))); ?> 
						</div>
					</div>
					
				</div>
				<div class="btm_b clearfix">
					<a href="<?php echo Configure::read('WEBSITE_HOME');?>" class="jsRedirect"><input type="button" class="btn pull-right" value="Cancel" style="margin-left:10px"></a>


					<input class="btn btn-gebo pull-right" value="Sign In"  type="submit">

				</div>  
			</form>
			
		
			
			
		</div>
		
	 
<div class="links_b links_btm clearfix">
			<span class="linkform" style="color:#938f89;">Copyright © <?php echo date('Y');?> Careertree.</span>
		</div>



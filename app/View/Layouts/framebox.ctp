<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
	
	   <!-- Bootstrap framework -->
         <link rel="stylesheet" href="<?php echo $this->webroot;?>hiring/bootstrap/css/bootstrap.min.css" />
         <link rel="stylesheet" href="<?php echo $this->webroot;?>hiring/bootstrap/css/bootstrap-responsive.min.css" />
      <!-- gebo blue theme-->
         <link rel="stylesheet" href="<?php echo $this->webroot;?>hiring/css/blue.css" id="link_theme" />            
      <!-- main styles -->
         <link rel="stylesheet" href="<?php echo $this->webroot;?>hiring/css/style.css" />
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans" />
		<style type="text/css">
		.chzn-container .chzn-results {max-height:150px !important}
		
		</style>
			
</head>
<body  class="menu_hover">
	<div id="container">
		
		<div id="content">

			<?php echo $this->fetch('content'); ?>
		
		</div>
		
	</div>
	<?php echo $this->element('sql_dump'); ?>

	 
	
	 
	 <!-- main bootstrap js -->
	 <script src="<?php echo $this->webroot;?>hiring/js/jquery.min.js"></script>		

	 <script src="<?php echo $this->webroot;?>hiring/bootstrap/js/bootstrap.min.js"></script>	
	 <script src="<?php echo $this->webroot;?>hiring/js/framejs.js"></script>		
	<!-- TinyMce WYSIWG editor -->
   <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

	 <?php if($form_status == '1'): ?>
	<script type="text/javascript">
	$(document).ready(function(){
		var status = $('#action').val() == 'approve' ? 'approved' : 'rejected';
		self.parent.location.href = jQuery('#success_page').val()+'?&update='+status;
		parent.jQuery("#cboxClose").click();
	});

	</script>
<?php endif; ?>

</body>
</html>

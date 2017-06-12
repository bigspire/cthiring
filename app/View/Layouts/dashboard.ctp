<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $this->fetch('title'); ?>
	</title>
	
	   
	    <!-- Bootstrap framework -->
            <link rel="stylesheet" href="<?php echo $this->webroot;?>hiring/bootstrap/css/bootstrap.min.css" />
            <link rel="stylesheet" href="<?php echo $this->webroot;?>hiring/bootstrap/css/bootstrap-responsive.min.css" />
        <!-- gebo blue theme-->
            <link rel="stylesheet" href="<?php echo $this->webroot;?>hiring/css/blue.css" id="link_theme" />
        <!-- breadcrumbs-->
            <link rel="stylesheet" href="<?php echo $this->webroot;?>hiring/lib_cthiring/jBreadcrumbs/css/BreadCrumb.css" />
        <!-- tooltips-->
            <link rel="stylesheet" href="<?php echo $this->webroot;?>hiring/lib_cthiring/qtip2/jquery.qtip.min.css" />
        <!-- colorbox -->
            <link rel="stylesheet" href="<?php echo $this->webroot;?>hiring/lib_cthiring/colorbox/colorbox.css" />    
        <!-- code prettify -->
            <link rel="stylesheet" href="<?php echo $this->webroot;?>hiring/lib_cthiring/google-code-prettify/prettify.css" />    
        <!-- notifications -->
            <link rel="stylesheet" href="<?php echo $this->webroot;?>hiring/lib_cthiring/sticky/sticky.css" />    
        <!-- splashy icons -->
            <link rel="stylesheet" href="<?php echo $this->webroot;?>hiring/img/splashy/splashy.css" />
		<!-- flags -->
            <link rel="stylesheet" href="<?php echo $this->webroot;?>hiring/img/flags/flags.css" />	
		<!-- calendar -->
            <link rel="stylesheet" href="<?php echo $this->webroot;?>hiring/lib_cthiring/fullcalendar/fullcalendar_gebo.css" />
			
			<link rel="stylesheet" media="screen" href="<?php echo $this->webroot;?>hiring/css/datepicker/datepicker.css"/>	   
			
			<link rel="stylesheet" href="<?php echo $this->webroot;?>hiring/css/flexslider.css" />

			<!-- main styles -->
            <link rel="stylesheet" href="<?php echo $this->webroot;?>hiring/css/style.css" />
			
            <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans" />
			
		
   
			
			<?php 
			if($this->request->params['controller'] == 'report'):?>
			<link rel="stylesheet" href="//cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css">
			<?php endif; ?>
			
	
</head>
<?php $login_cls = $this->request->params['controller'] == 'login' ? 'login_page' : '';?>
<body  class="menu_hover <?php echo $login_cls;?>" >
	<div id="container">
		
		<div id="content">

			<?php echo $this->fetch('content'); ?>
		
		</div>
		
	</div>
	<?php echo $this->element('sql_dump'); ?>
	
	<?php if($this->request->params['controller'] == 'login'):?>
	<?php echo $this->element('footer_login'); ?>
	<?php //elseif($this->request->params['action'] != 'add_proposal' && $this->request->params['action'] != 'view_drive' && $this->request->params['action'] != 'view_proposal'):?>
	<?php else: ?>
	<?php if(empty($noHead)):echo $this->element('footer'); endif;?>
	<?php endif; ?>
	

		<!-- datatable -->
		 
		<?php if($this->request->params['controller'] == 'report'):?>
		<script src="//cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
		<?php endif; ?>
		

	
	<a id="toTop" rel="nofollow" style="display: block;" title="Back to Top">Back to top</a>
	
	
</body>
</html>

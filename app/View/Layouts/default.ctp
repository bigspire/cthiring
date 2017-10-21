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
            <!--link rel="stylesheet" href="<?php echo $this->webroot;?>hiring/lib_cthiring/fullcalendar/fullcalendar_gebo.css" /-->
			
			<link rel="stylesheet" href="<?php echo $this->webroot;?>hiring/css/smoke.css" />
			
	<link rel="stylesheet" href="<?php echo $this->webroot;?>hiring/css/bootstrap-tagsinput.css" />


						
			<link rel="stylesheet" media="screen" href="<?php echo $this->webroot;?>hiring/css/datepicker/datepicker.css"/>	   
			
			<link rel="stylesheet" href="<?php echo $this->webroot;?>hiring/css/flexslider.css" />
			<link rel="stylesheet" href="<?php echo $this->webroot;?>hiring/lib_cthiring/chosen/chosen.css" type="text/css">

			<!-- main styles -->
            <link rel="stylesheet" href="<?php echo $this->webroot;?>hiring/css/style.css" />
			
            <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans" />
	
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
	
	 
	
	 
			<script src="<?php echo $this->webroot;?>hiring/js/jquery.min.js"></script>
			<!-- smart resize event -->
			<script src="<?php echo $this->webroot;?>hiring/js/jquery.debouncedresize.min.js"></script>
			<!-- hidden elements width/height -->
			<script src="<?php echo $this->webroot;?>hiring/js/jquery.actual.min.js"></script>
			<!-- js cookie plugin -->
			<script src="<?php echo $this->webroot;?>hiring/js/jquery.cookie.min.js"></script>
			<!-- main bootstrap js -->
			<script src="<?php echo $this->webroot;?>hiring/bootstrap/js/bootstrap.min.js"></script>
			<!-- tooltips -->
			<script src="<?php echo $this->webroot;?>hiring/lib_cthiring/qtip2/jquery.qtip.min.js"></script>
			<!-- jBreadcrumbs -->
			<script src="<?php echo $this->webroot;?>hiring/lib_cthiring/jBreadcrumbs/js/jquery.jBreadCrumb.1.1.min.js"></script>
			<!-- lightbox -->
            <script src="<?php echo $this->webroot;?>hiring/lib_cthiring/colorbox/jquery.colorbox.min.js"></script>
            <!-- fix for ios orientation change -->
			<script src="<?php echo $this->webroot;?>hiring/js/ios-orientationchange-fix.js"></script>
			<!-- scrollbar -->
			<script src="<?php echo $this->webroot;?>hiring/lib_cthiring/antiscroll/antiscroll.js"></script>
			<script src="<?php echo $this->webroot;?>hiring/lib_cthiring/antiscroll/jquery-mousewheel.js"></script>
			<!-- common functions -->
			<script src="<?php echo $this->webroot;?>hiring/js/gebo_common.js"></script>
			<link type="text/css" media="screen" href="<?php echo $this->webroot;?>hiring/css/jquery.autocomplete.css" rel="stylesheet" />

			<script src="<?php echo $this->webroot;?>hiring/lib_cthiring/jquery-ui/jquery-ui-1.8.20.custom.min.js"></script>
            <!-- touch events for jquery ui-->
            <script src="<?php echo $this->webroot;?>hiring/js/forms/jquery.ui.touch-punch.min.js"></script>
            <!-- multi-column layout -->
            <script src="<?php echo $this->webroot;?>hiring/js/jquery.imagesloaded.min.js"></script>
            <script src="<?php echo $this->webroot;?>hiring/js/jquery.wookmark.js"></script>
            <!-- responsive table -->
            <script src="<?php echo $this->webroot;?>hiring/js/jquery.mediaTable.min.js"></script>
            <!-- small charts -->
            <script src="<?php echo $this->webroot;?>hiring/js/jquery.peity.min.js"></script>
            <!-- charts -->
            <script src="<?php echo $this->webroot;?>hiring/lib_cthiring/flot/jquery.flot.min.js"></script>
            <script src="<?php echo $this->webroot;?>hiring/lib_cthiring/flot/jquery.flot.resize.min.js"></script>
            <script src="<?php echo $this->webroot;?>hiring/lib_cthiring/flot/jquery.flot.pie.min.js"></script>
            <!-- calendar -->
            <!--script src="<?php echo $this->webroot;?>hiring/lib_cthiring/fullcalendar/fullcalendar.min.js"></script-->
            <!-- sortable/filterable list -->
            <script src="<?php echo $this->webroot;?>hiring/lib_cthiring/list_js/list.min.js"></script>
            <script src="<?php echo $this->webroot;?>hiring/lib_cthiring/list_js/plugins/paging/list.paging.min.js"></script>
            <!-- dashboard functions -->
            <script src="<?php echo $this->webroot;?>hiring/js/gebo_dashboard.js"></script>
			<!-- flex slider functions -->
			<script src="<?php echo $this->webroot;?>hiring/js/slider/jquery.flexslider.js"></script>
			
			<!-- buttons functions -->
			<script src="<?php echo $this->webroot;?>hiring/js/gebo_btns.js"></script>
			
			<script src="<?php echo $this->webroot;?>hiring/js/bootstrap-tagsinput.js"></script>

						
			<!--script src="<?php echo $this->webroot;?>hiring/js/textcounter.min.js"></script-->

			
			 <!-- TinyMce WYSIWG editor -->
			<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
	
			<script type="text/javascript" src="<?php echo $this->webroot;?>hiring/js/jquery.stickytableheaders.min.js"></script>

			<script>
				$(document).ready(function() {
					//* show all elements & remove preloader
					setTimeout('$("html").removeClass("js")',1000);
				});
			</script>
			<script type="text/javascript" src="<?php echo $this->webroot;?>hiring/lib_cthiring/chosen/chosen.jquery.min.js"></script>
			<script src="<?php echo $this->webroot;?>hiring/js/smoke.min.js"></script>
			<script type="text/javascript" src="<?php echo $this->webroot;?>hiring/js/jquery.autocomplete.min.js"></script>

			<script type="text/javascript" src="<?php echo $this->webroot;?>hiring/js/sheepit-jquery.sheepItPlugin-v1.1.1/jquery.sheepItPlugin.js"></script>
			<script src="<?php echo $this->webroot;?>hiring/js/datepicker/bootstrap-datepicker.min.js"></script>
	
			<script src="<?php echo $this->webroot;?>hiring/js/main.js"></script>
			<script src="<?php echo $this->webroot;?>hiring/js/jquery.slimscroll.min.js"></script>
		    <script src="<?php echo $this->webroot;?>hiring/js/application.js"></script>
	
		<a id="toTop" rel="nofollow" style="display: block;" title="Back to Top">Back to top</a>
	
</body>
</html>

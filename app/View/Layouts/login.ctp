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
            <link rel="stylesheet" href="<?php echo $this->webroot;?>bootstrap/css/bootstrap.min.css" />
            <link rel="stylesheet" href="<?php echo $this->webroot;?>bootstrap/css/bootstrap-responsive.min.css" />
        <!-- gebo blue theme-->
            <link rel="stylesheet" href="<?php echo $this->webroot;?>css/blue.css" id="link_theme" />            
        <!-- main styles -->
            <link rel="stylesheet" href="<?php echo $this->webroot;?>css/style.css" />
			
            <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans" />
		
	
</head>
<?php $login_cls = $this->request->params['controller'] == 'login' ? 'login_page' : '';?>
<body  class="menu_hover <?php echo $login_cls;?>" style="overflow:auto;">
	<div id="container">
		
		<div id="content">

			<?php echo $this->fetch('content'); ?>
		
		</div>
		
	</div>
	<?php echo $this->element('sql_dump'); ?>
	
	  <script src="<?php echo $this->webroot;?>js/jquery.min.js"></script>		
	 <!-- main bootstrap js -->
	 <script src="<?php echo $this->webroot;?>bootstrap/js/bootstrap.min.js"></script>			
	 <script src="<?php echo $this->webroot;?>lib/jquery-ui/jquery-ui-1.8.20.custom.min.js"></script>
	 <script src="<?php echo $this->webroot;?>js/main.js"></script>		

</body>
</html>

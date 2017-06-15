<?php
/*
 * View/FullCalendar/index.ctp
 * CakePHP Full Calendar Plugin
 *
 * Copyright (c) 2010 Silas Montgomery
 * http://silasmontgomery.com
 *
 * Licensed under MIT
 * http://www.opensource.org/licenses/mit-license.php
 */
?>
<style>

	body {
		margin: 0;
		padding: 0;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		font-size: 14px;
	}

	

</style>

<script type="text/javascript">
plgFcRoot = '<?php echo $this->Html->url('/'); ?>' + "full_calendar";


</script>
<?php

// echo $this->Html->script(array('/full_calendar/js/jquery-1.5.min', '/full_calendar/js/jquery-ui-1.8.9.custom.min', '/full_calendar/js/fullcalendar.min', '/full_calendar/js/ready'), array('inline' => 'false'));
?>



<!-- Grid CSS File (only needed for demo page) -->
<link rel="stylesheet" href="<?php echo $this->webroot;?>hiring/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo $this->webroot;?>hiring/lib_cthiring/fullcalendar/fullcalendar_gebo.css">


<!--link rel="stylesheet" href="<?php echo $this->webroot;?>full_calendar/css/fullcalendar.css">
<link rel="stylesheet" href="<?php echo $this->webroot;?>full_calendar/css/fullcalendar.print.css"  media='print'-->
	
<div class="Calendar index" style="height:450px">
	<div id="calendar_new" style="height:450px"></div>
</div>

<script src="<?php echo $this->webroot;?>hiring/lib_cthiring/fullcalendar_new/lib/moment.min.js"></script>

<script src="<?php echo $this->webroot;?>hiring/js/jquery.min.js"></script>

<!-- calendar -->
<script src="<?php echo $this->webroot;?>hiring/lib_cthiring/fullcalendar_new/lib/jquery-ui.min.js"></script>
<!-- touch events for jquery ui-->
<script src="<?php echo $this->webroot;?>hiring/lib_cthiring/fullcalendar/fullcalendar.min.js"></script>

<script src="<?php echo $this->webroot;?>full_calendar/js/ready.js"></script>
<input type="hidden" value="" id="event_theme">
<!--div class="actions">
	<ul>
	    <li><?php echo $this->Html->link(__('New Event', true), array('plugin' => 'full_calendar', 'controller' => 'events', 'action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Manage Events', true), array('plugin' => 'full_calendar', 'controller' => 'events')); ?></li>
		<li><?php echo $this->Html->link(__('Manage Events Types', true), array('plugin' => 'full_calendar', 'controller' => 'event_types')); ?></li>
	</ul>
</div-->

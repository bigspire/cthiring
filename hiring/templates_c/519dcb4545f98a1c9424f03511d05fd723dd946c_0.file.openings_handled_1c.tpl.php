<?php
/* Smarty version 3.1.29, created on 2018-04-11 21:17:13
  from "C:\xampp\htdocs\ctsvn\cthiring\hiring\templates\openings_handled_1c.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5ace2e019962e7_02158142',
  'file_dependency' => 
  array (
    '519dcb4545f98a1c9424f03511d05fd723dd946c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ctsvn\\cthiring\\hiring\\templates\\openings_handled_1c.tpl',
      1 => 1523461631,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/header.tpl' => 1,
    'file:include/sidebar.tpl' => 1,
    'file:include/footer.tpl' => 1,
  ),
),false)) {
function content_5ace2e019962e7_02158142 ($_smarty_tpl) {
?>

   

			<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

		     <div id="contentwrapper">
                <div class="main_content">
                
				
					
										
					<div class="row-fluid">
						
					  
					  <div class="span12" style="margin:0;">
					 
				
							<form method="post">
															
						<div class="dn dataTables_filter srchBox homeSrchBox" id="dt_gal_filter" style="display: block;">
							
							
							<span id="sandbox-container">
						<span class="input-daterange" id="datepicker">	
							<label style="margin-left:0" >From Date: <input placeholder="dd/mm/yyyy" type="text" class="input-small" name="data[Position][from]" value="" aria-controls="dt_gal"></label>

							<label>To Date: <input placeholder="dd/mm/yyyy" type="text" name="data[Position][to]" value="" class="input-small" aria-controls="dt_gal"></label>

						</span>	
						</span>	
							
							
							<label>
							Client: 
							<select name="data[Position][loc]" class="input-medium" placeholder="" style="clear:left" id="PositionLoc">
<option value="">Select</option>
<option value="104">Maruti</option>
<option value="102">Daimler</option>
<option value="103">Hero Honda</option>


</select> 
							</label>
							
											
							</label>
							
							<label>
							Role: 
							<select name="data[Position][loc]" class="input-medium" placeholder="" style="clear:left" id="PositionLoc">
<option value="">Select</option>
<option value="104">Recruiter</option>
<option value="102">CRM</option>
<option value="103">Team Lead</option>
<option value="105">Branch Head</option>
<option value="105">BD Executive</option>
<option value="105">BD Head</option>
<option value="105">Business Head</option>
<option value="105">Director</option>

</select> 
							</label>
							
							
							
							
							
							
												
							
							<label>
							Branch: 
							<select name="data[Position][loc]" class="input-medium" placeholder="" style="clear:left" id="PositionLoc">
<option value="">Select</option>
<option value="104">Ahmedabad</option>
<option value="102">Bangalore</option>
<option value="103">Chennai</option>
<option value="105">Hyderabad</option>
</select> 
							</label>
							
							
														<label>Employee: 
						<select name="data[Position][emp_id]" class="input-medium" placeholder="" style="clear:left" id="PositionEmpId">
<option value="">Select</option>
<option value="4">Admin </option>
<option value="97">Anand </option>
<option value="66">Bhargavi M</option>
<option value="98">Chetan S</option>
<option value="96">Eresh Choudhary</option>
<option value="102">Guru Vishnu Test</option>
<option value="94">Jagadeesh </option>
<option value="91">Kamesh K</option>
<option value="74">Karthick Kumar </option>
<option value="37">Karthikeyan S</option>
<option value="95">Kumaresh </option>
<option value="89">Kumari </option>
<option value="45">Lavanya Venkateshappa</option>
<option value="92">Magimai Tamil Azhagan </option>
<option value="54">Mary Paulina </option>
<option value="86">Mohammed Aslam 0</option>
<option value="79">Mohan Reddy </option>
<option value="100">Muthu Kumar</option>
<option value="76">Nandhakumar </option>
<option value="29">Praveena E</option>
<option value="80">Prerna Khanudi </option>
<option value="58">Priyanka </option>
<option value="33">Rajalakshmi S</option>
<option value="38">Ranjeet Rajpurohit</option>
<option value="101">Siva Kumar</option>
<option value="81">Suganya Pillai </option>
<option value="90">Sumir </option>
<option value="93">Sumitha </option>
<option value="103">Vinoth Kumar</option>
<option value="99">Vinoth Kumar</option>
</select> 					
							</label>
												
					<!--label>
							Type: 
							<select name="data[Position][loc]" class="input-small" placeholder="" style="clear:left" id="PositionLoc">
<option value="">Select</option>
<option value="104" selected="selected">Table</option>
<option value="102">Graph</option>

</select> 
							</label-->
						
							
							
							

				<label style="margin-top:18px;"><input type="submit" value="Submit" class="btn btn-gebo"></label>

							<label style="margin-top:18px;"><a class="jsRedirect" href=""><input value="Reset" type="button" class="btn"></a></label>

					
		
														</div>
					
<input type="hidden" name="data[srchSubmit]" id="srchSubmit"/>
<input type="hidden" value="1" id="SearchKeywords">
<input type="hidden" value="home/" id="webroot">	
<input type="hidden" name="data[type]" id="type"/>	
					
						</form>
						
						<div class="row-fluid <?php echo $_smarty_tpl->tpl_vars['format_type_chart']->value;?>
">		
				<div class="span12">	
				
						<h3 class="heading" style="margin-bottom:0;border:;clear:left;">Month Wise Client Openings Handled <small> For the year 2018 - 2019</small>
						<div class="pull-right">Table View: 
						
						<a href="javascript:void(0)" rel="printAreaTable" class="printBtn"><input value="Print" type="button" class="btn btn-success"/></a>

						<a href="openings_handled_1a.php?export=1"><input value="Export" type="button" class="btn btn-warning"/></a>
							
						</div>
						
							</h3>
						
							<table class="table table-hover table-bordered table-striped printAreaTable" style="margin: 15px 0px;">
								<thead>
									
									<tr>

										<th width="" style="min-width: 0px; max-width: none;"></th>										
										<th width="" style="text-align:center;min-width: 0px; max-width: none;" colspan="14">
										Month Wise Client Openings Handled (Recruiter: Lavanya)										

										</th>
										
									</tr>
								
									<tr>

										<th width="100" style="min-width: 0px; max-width: none;"><a href="#">Client</a></th>										
										
										
										<th width="50" style="min-width: 0px; max-width: none;text-align:center"><a href="#">Apr 18</a></a></th>
										<th width="50" style="min-width: 0px; max-width: none;text-align:center" ><a href="#">May 18</a></th>
										<th width="50" style="min-width: 0px; max-width: none;text-align:center"><a href="#">Jun 18</a> </th>
										<th width="50" style="min-width: 0px; max-width: none;text-align:center"><a href="#">Jul 18</a> </th>
										
										<th width="50" style="min-width: 0px; max-width: none;text-align:center"><a href="#">Aug 18</a></th>
										<th width="50" style="min-width: 0px; max-width: none;text-align:center" ><a href="#">Sep 18</a></th>
										<th width="50" style="min-width: 0px; max-width: none;text-align:center"><a href="#">Oct 18</a> </th>
										<th width="50" style="min-width: 0px; max-width: none;text-align:center"><a href="#">Nov 18</a> </th>
										<th width="50" style="min-width: 0px; max-width: none;text-align:center" ><a href="#">Dec 18</a></th>
											<th width="50" style="min-width: 0px; max-width: none;text-align:center" ><a href="#">Jan 19</a></th>
												<th width="50" style="min-width: 0px; max-width: none;text-align:center" ><a href="#">Feb 19</a></th>
													<th width="50" style="min-width: 0px; max-width: none;text-align:center" ><a href="#">Mar 19</a></th>
										<th width="50" style="min-width: 0px; max-width: none;text-align:center"><a href="#">Total</a> </th>
										
										
									</tr>
								
								
								</thead>
								


								<tbody>
								
								
										
																		<tr>
																				<td width="">Maruti</td>
										
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">33</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">23</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">54</a></td>
										
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">2</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">13</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">36</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">23</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">54</a></td>
										
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">54</a></td>
										
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">2</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">13</a></td>
									
										
									
						
						<th width="" style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">88</th>
						
					
								</tr>
								
								<tr>
																				<td width="">Hero Honda</td>
										
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">2</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">12</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">23</a></td>
										
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">16</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">13</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">10</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">12</a></td>
											<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
									
										
									<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">54</a></td>
										
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">2</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">13</a></td>
										
									
						
						<th width="" style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">90</a>						</th>
						
					
								</tr>
								
								
								<tr>
																				<td width="">Sony</td>
										
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">33</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">76</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">23</a></td>
										
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">33</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">76</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">23</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<td width="" style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">56</a></td>
						
					<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">54</a></td>
										
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">2</a></td>
										<th style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">13</a></th>
								</tr>
								
								<tr>
																				<td width="">Daimler</td>
										
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">33</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">76</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">23</a></td>
										
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">33</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">76</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">23</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<td width="" style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">56</a></td>
						
					<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">54</a></td>
										
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">2</a></td>
										<th style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">13</a></th>
								</tr>
								
									<tr>
																				<td width="">Infosys</td>
										
											<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">33</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">76</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">23</a></td>
										
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">33</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">76</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">23</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<td width="" style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">56</a></td>
						<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">54</a></td>
										
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">2</a></td>
										<th style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">13</a></th>
					
								</tr>

								<tr>
																				<td width="">Wipro</td>
										
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">33</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">76</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">23</a></td>
										
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">33</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">76</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">23</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<td width="" style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">56</a></td>
						
					<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">54</a></td>
										
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">2</a></td>
										<th style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">13</a></th>
								</tr>
								
								
								<tr>
																				<td width="">TCS</td>
										
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">33</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">76</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">23</a></td>
										
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">33</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">76</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">23</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<td width="" style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">56</a></td>
					<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">54</a></td>
										
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">2</a></td>
										<th style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">13</a></th>
								</tr>
								
								<tr>
																				<td width="">Tata Motors</td>
										
											<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">33</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">76</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">23</a></td>
										
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">33</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">76</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">23</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<td width="" style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">56</a></td>
						
					<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">54</a></td>
										
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">2</a></td>
										<th style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">13</a></th>
								</tr>
								
								<tr>
																				<td width="">Oracle</td>
										
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">33</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">76</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">23</a></td>
										
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">33</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">76</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">23</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<td width="" style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">56</a></td>
						
					<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">54</a></td>
										
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">2</a></td>
										<th style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">13</a></th>
								</tr>
								
								<tr>
																				<td width="">Mind Tree</td>
										
											<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">33</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">76</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">23</a></td>
										
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">33</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">76</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">23</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<td width="" style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">56</a></td>
					<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">54</a></td>
										
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">2</a></td>
										<th style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">13</a></th>
								</tr>
								
								<tr>
																				<td width="">Mahindra</td>
										
											<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">33</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">76</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">23</a></td>
										
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">33</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">76</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">23</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<td width="" style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">56</a></td>
						
					<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">54</a></td>
										
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">2</a></td>
										<th style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">13</a></th>
								</tr>
								
								<tr>
																				<td width="">Renault</td>
										
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">33</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">76</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">23</a></td>
										
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">33</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">76</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">23</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<td width="" style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">56</a></td>
						
					<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">54</a></td>
										
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">2</a></td>
										<th style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">13</a></th>
								</tr>
								
								
									<tr>
																				<th width="">Total Openings Handled</th>
										
										<th style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">33</a></th>
										<th style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></th>
										<th style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">76</a></th>
										<th style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">23</a></th>
										
										<th style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">33</a></th>
										<th style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></th>
										<th style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">76</a></th>
										<th style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">23</a></th>
										<th style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></th>
										<th width="" style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">56</a></th>
						
					<th style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">54</a></th>
										
										<th style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">2</a></th>
										<th style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">13</a></th>
								</tr>
								
								
																</tbody>
							</table>
				</div></div>
				
				

				
				<div class="row-fluid <?php echo $_smarty_tpl->tpl_vars['format_type_table']->value;?>
">						


		<div class="span12">
						<h3 class="heading" style="margin-bottom:0;border:;clear:left;">Month Wise Client Openings Handled  <small> For the year 2018 - 2019</small>
							
								<div class="pull-right">Graph View: 
								
									<a href="javascript:void(0)" rel="printAreaGraph" class="printBtn"><input value="Print" type="button" class="btn btn-success"/></a>

							
							
								</div>
								
								</h3>
							
							
							<div class="graph printAreaGraph"  id="ctc_wise" style="height:600px">
							</div>

							
				
						
						
				</div>	

				
				
					</div>
					
			
				
              </div>	          
					
					</div>
                    
					
				

				    
                </div>
            </div>
            
		<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

		
		
		

		
		 <?php echo '<script'; ?>
 type="text/javascript" src="https://www.gstatic.com/charts/loader.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Client', 'Apr - Jun 18', 'Jul - Sep 18', 'Oct - Dec 18', 'Jan - Mar 19 '],
        ['Maruti', 26, 3, 5, 3],
        ['Hero Honda', 33, 5, 5, 1],
        ['Sony', 12, 6, 4, 0],
		['Daimler', 28, 7, 3, 0],
		['Infosys', 25, 12, 0, 1],
		['Wipro', 16, 14, 0, 0],
		['TCS', 26, 7, 2, 1],
		['Tat Motors', 35, 12, 8, 2],
		['Oracle', 22, 19, 6, 2],
		['Mind Tree', 22, 11, 0, 1],
		['Mahindra', 28, 12, 3, 2],
		['Renault', 17, 9, 1, 2]
      ]);
	  
	  

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,{ calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
						 2,
						 { calc: "stringify",
                         sourceColumn: 2,
                         type: "string",
                         role: "annotation" },
						 3,{ calc: "stringify",
                         sourceColumn: 3,
                         type: "string",
                         role: "annotation" },
						 4
                      
                      ]);

      var options = {
        title: "",
		// CTC Wise Monthly Openings Handled (Recruiter: Lavanya)
      
		  vAxis: {
          title: 'Clients',
        },
		 hAxis: {
          title: 'No. of Openings',
		//   gridlines:{color:'#fff'},
		 //  textPosition : 'none',
        },
		
        bar: {groupWidth: "90%"},
       //  legend: { position: "none" },
		isStacked:true,
		//  colors: ['#6688e9', '#09418d', '#12de6d', '#811905', '#ab1f57', '#23E5FF', '#ab1f57',  '#811905','#09418d', '#fabec2', '#0dac01','#d7f477'],
		  legend: {position: 'top', maxLines:1, textStyle: {color: '#000000', fontSize: 14}},
          dataOpacity: 0.6,
		  isStacked: true,
		  bar: { groupWidth: '70%' },
		  chartArea:{width:"98%",left:100},
		  tooltip:{textStyle: {color: '#000000', fontSize: 15}},
		  titleTextStyle:{ fontSize: 15},
		  explorer: { actions: ['dragToPan', 'rightClickToReset'] }
      };
      var chart = new google.visualization.BarChart(document.getElementById("ctc_wise"));
      chart.draw(view, options);
  }
  <?php echo '</script'; ?>
>

		<!--script type="text/javascript" src="https://www.google.com/jsapi"><?php echo '</script'; ?>
>
		
	 <?php echo '<script'; ?>
 type="text/javascript" src="https://www.gstatic.com/charts/loader.js"><?php echo '</script'; ?>
> 


	<?php echo '<script'; ?>
>
	  google.charts.load('current', {'packages':['corechart', 'column']});
      google.charts.setOnLoadCallback(drawChart_1);
      
	function drawChart_1() {       
		 
		var data = new google.visualization.DataTable();
		
		data.addColumn('string', 'Month / CTC');
		data.addColumn('number', '0-8');
		data.addColumn('number', '8-20');
		data.addColumn('number', '20-30');
		data.addColumn('number', '30-40');
		data.addColumn('number', 'Above 40');
		
		
		data.addRows([
		  ['Apr 2018',155,122,15],
          ['May 2018',120,78,12],
          ['Jun 2018',44,55,8],
		  ['Jul 2018',12,33,1 ],
		  ['Aug 2018',12,233,2 ],
		  ['Sep 2018',112,33,6 ],
		  ['Oct 2018',12,33,3 ],
		  ['Nov 2018',132,133,6 ],
		  ['Dec 2018',12,33,6 ],
		  ['Jan 2019',212,33,16 ],
		  ['Feb 2019',12,333,6 ],
		  ['Mar 2019',122,33,62 ]
		 ]);
		 
		 /*
		 var data = google.visualization.arrayToDataTable([
          ['Amount','Positions Worked', 'Profiles Submitted','Positions Closed'],
          ['< 10 lacs',155,122,15],
          ['10 - 25 lacs',120,78,12],
          ['25 - 40 lacs',44,55,8],
		  ['> 40 lacs',12,33,6 ]
        ]);
		*/
		
	function getValueAt(column, dataTable, row) {
			return dataTable.getFormattedValue(row, column);
	}
	
	var view = new google.visualization.DataView(data);
      view.setColumns([0, 
	  1,{ calc: getValueAt.bind(undefined, 1),  sourceColumn: 1,     type: "string",   role: "annotation" },
	  2, { calc: "stringify", sourceColumn: 2, type: "string", role: "annotation" }, 
	  3, { calc: "stringify", sourceColumn: 3, type: "string", role: "annotation" }]
	  );
					   
		  var options = {
		  title: 'Suganya\'s Performance (in bar chart)',

          chart: {
            title: 'Profile Performance',
            subtitle: 'Aug, 2016',
			
          }, 
		  vAxis: {
          title: 'CTC wise',
        },
		 hAxis: {
          title: 'Numbers',
		  gridlines:{color:'#fff'},
		  textPosition : 'none',
        },
		
			colors: ['#6688e9', '#fcea54', '#12de6d'],
		   legend: {position: 'right', maxLines:1, textStyle: {color: '', fontSize: 12}},
          dataOpacity: 0.8,
		  isStacked: true,
		  bar: { groupWidth: '55%' },
		  chartArea:{width:"67%",left:110},
		  tooltip:{textStyle: {color: '', fontSize: 13}},
		  titleTextStyle:{ fontSize: 15},
        };
		var chart = new google.visualization.BarChart(document.getElementById('ctc_wise'));
       // var chart = new google.charts.Bar(document.getElementById('profile_work'));
		chart.draw(view, options);
        // chart.draw(data, options);
      }
	  
      

	
	  <?php echo '</script'; ?>
-->
	
		
		</div>
		
	</div>
		
		
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

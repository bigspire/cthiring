{* Purpose : To show recruiter performance.
   Created : Nikitasa
   Date : 19-06-2017 *}
   
{literal}
<style type="text/css">
.printAreaTable a{color:#000000 !important}
.printAreaTable tr td{font-size:14px;padding:8px;}
.printAreaTable tr th{font-size:14px;padding:8px;}
</style>
{/literal}
<?php echo $this->element('header');?>		 

    <div id="contentwrapper">
                <div class="main_content">
                
										
					<div class="row-fluid">
						
					  
					  <div class="span12" style="margin:0;">
					 
				
						<?php echo $this->Form->create('Report', array('id' => 'formID','class' => 'formID')); ?>

															
						<div class="dn dataTables_filter srchBox homeSrchBox" id="dt_gal_filter" style="display: block;">
							
							
							<span id="sandbox-container">
						<span class="input-daterange" id="datepicker">	
							<label style="margin-left:0" >From Date: <input placeholder="dd/mm/yyyy" type="text" class="input-small" name="data[Report][from]" value="" aria-controls="dt_gal"></label>

							<label>To Date: <input placeholder="dd/mm/yyyy" type="text" name="data[Report][to]" value="" class="input-small" aria-controls="dt_gal"></label>

						</span>	
						</span>	
							
							
							<label>
							Client: 
		
	<?php echo $this->Form->input('loc', array('div'=> false,'type' => 'select', 'label' => false, 'class' => 'input-medium', 'empty' => 'Select', 
	'selected' => $this->params->query['loc'], 'required' => false, 'placeholder' => '', 'style' => "clear:left", 'options' => $clientList)); ?> 
	
	
							</label>
							
											
							</label>
							
							<label>
							Role: 
							
							
							<?php echo $this->Form->input('role_id', array('div'=> false,'type' => 'select', 'label' => false, 'class' => 'input-medium', 'empty' => 'Select', 
	'selected' => $this->params->query['role_id'], 'required' => false, 'placeholder' => '', 'style' => "clear:left", 'options' => $roleList)); ?> 

							</label>
							
							
							
							
							
							
												
							
							<label>
							Branch: 
					<?php echo $this->Form->input('branch_id', array('div'=> false,'type' => 'select', 'label' => false, 'class' => 'input-medium', 'empty' => 'Select', 
	'selected' => $this->params->query['branch_id'], 'required' => false, 'placeholder' => '', 'style' => "clear:left", 'options' => $locList)); ?> 
			</label>
							
							
														<label>Employee: 
							<?php echo $this->Form->input('emp_id', array('div'=> false,'type' => 'select', 'label' => false, 'class' => 'input-medium', 'empty' => 'Select', 
	'selected' => $this->params->query['emp_id'], 'required' => false, 'placeholder' => '', 'style' => "clear:left", 'options' => $empList)); ?> 

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
						
						<div class="row-fluid {$format_type_chart}">		
				<div class="span12">	
				
						<h3 class="heading" style="margin-bottom:0;border:;clear:left;">Client Wise CV Status 
						<div class="pull-right">Table View: 
						
						<a href="javascript:void(0)" rel="printAreaTable" class="printBtn"><input value="Print" type="button" class="btn btn-success"/></a>

						<a href="openings_handled_1a.php?export=1"><input value="Export" type="button" class="btn btn-warning"/></a>
							
						</div>
						
							</h3>
						
							<table class="table table-hover table-bordered table-striped printAreaTable" style="margin: 15px 0px;">
								<thead>
									
									<tr>

										<th width="" style="min-width: 0px; max-width: none;"></th>										
										<th width="" style="text-align:center;min-width: 0px; max-width: none;padding:10px; font-size:15px;" colspan="18">
										Client Wise CV Status (Recruiter: Lavanya)										

										</th>
										
									</tr>
								
									<tr>

										<th width="150" style="min-width: 0px; max-width: none;"><a href="#">Client</a></th>										
										
										
										<th width="50" style="min-width: 0px; max-width: none;text-align:center"><a rel="tooltip" title="Openings Worked" href="#">OW</a></th>
										<th width="50" style="min-width: 0px; max-width: none;text-align:center" ><a rel="tooltip" title="CV Sent"href="#">Sent</a></th>
										<th width="50" style="min-width: 0px; max-width: none;text-align:center"><a rel="tooltip" title="CV Shortlisted" href="#">CVS</a> </th>
										<th width="50" style="min-width: 0px; max-width: none;text-align:center"><a rel="tooltip" title="CV Rejected" href="#">CVR</a> </th>
										
										<th width="50" style="min-width: 0px; max-width: none;text-align:center"><a rel="tooltip" title="CV Feedback Awaited" href="#">FA</a></th>
										<th width="50" style="min-width: 0px; max-width: none;text-align:center" ><a rel="tooltip" title="Interview Schedule Awaited" href="#">ISA</a></th>
										<th width="50" style="min-width: 0px; max-width: none;text-align:center"><a rel="tooltip" title="Preliminary Interviews Attended" href="#">PIA</a> </th>
										<th width="50" style="min-width: 0px; max-width: none;text-align:center"><a rel="tooltip" title="Final Interview Attended" href="#">FIA</a> </th>
										<th width="50" style="min-width: 0px; max-width: none;text-align:center"><a rel="tooltip" title="Offer Pending" href="#">OP</a></th>
										<th width="50" style="min-width: 0px; max-width: none;text-align:center"><a rel="tooltip" title="Offer Accepted" href="#">OA</a> </th>
										
										<th width="50" style="min-width: 0px; max-width: none;text-align:center"><a rel="tooltip" title="Offer Rejected" href="#">OR</a> </th>
										<th width="50" style="min-width: 0px; max-width: none;text-align:center"><a rel="tooltip" title="Joining Awaited" href="#">JA</a> </th>
										<th width="50" style="min-width: 0px; max-width: none;text-align:center"><a rel="tooltip" title="Candidate Joined" href="#">Joined</a> </th>
										<th width="50" style="min-width: 0px; max-width: none;text-align:center"><a rel="tooltip" title="Not Joined" href="#">NJ</a></th>
										<th width="50" style="min-width: 0px; max-width: none;text-align:center"><a rel="tooltip" title="Joining Deferred" href="#">JD</a> </th>
										<th width="50" style="min-width: 0px; max-width: none;text-align:center"><a rel="tooltip" title="Billing Pending" href="#">BP</a> </th>
										<th width="50" style="min-width: 0px; max-width: none;text-align:center"><a rel="tooltip" title="Candidate Billed" href="#">Billed</a> </th>
									
									</tr>
								
								
								</thead>
								


								<tbody>
								
								<?php 
								$j = 0;
								foreach($clientList as $id => $client): ?>
								
								
										
										
								<tr>
										<td width=""><?php echo ucwords($client);?> </td>
										
										<td style="text-align:center"><a class="iframeBox" href="<?php echo $this->webroot;?>position/index/ow/<?php echo $id;?>/?iframe=1" val="90_80">
										<?php 
										$ow_total += $OPENING_WORKED[$j][0][0]['no_job'];
										echo $OPENING_WORKED[$j][0][0]['no_job'] ? $OPENING_WORKED[$j][0][0]['no_job'] : '0';?></a></td>
										
										<td style="text-align:center"><a class="iframeBox" href="<?php echo $this->webroot;?>resume/index/cvs/<?php echo $id; ?>/?iframe=1" val="90_80">
										<?php $sent_total += $CV_SENT[$j];
										echo $CV_SENT[$j] ? $CV_SENT[$j] : '0';?></a></td>
										
										<td style="text-align:center"><a class="iframeBox" href="<?php echo $this->webroot;?>resume/index/short/<?php echo $id; ?>/?iframe=1" val="90_80">
										<?php $shortlist_total += $CV_SHORTLIST[$j];
										echo $CV_SHORTLIST[$j] ? $CV_SHORTLIST[$j] : '0';?></a></td>
										
										
										<td style="text-align:center"><a class="iframeBox" href="<?php echo $this->webroot;?>resume/index/cvr/<?php echo $id; ?>/?iframe=1" val="90_80">
										<?php $reject_total += $CV_REJECT[$j];
										echo $CV_REJECT[$j] ? $CV_REJECT[$j] : '0';?></a></td>
										
										<td style="text-align:center"><a class="iframeBox" href="<?php echo $this->webroot;?>resume/index/fba/<?php echo $id; ?>/?iframe=1" val="90_80">
										<?php $feedback_total += $FEEDBACK_AWAITING[$j];
										echo $FEEDBACK_AWAITING[$j] ? $FEEDBACK_AWAITING[$j] : '0';?></a></td>
										
										<td style="text-align:center"><a class="iframeBox" href="<?php echo $this->webroot;?>resume/index/ia/<?php echo $id; ?>/?iframe=1" val="90_80">										
										<?php $interview_await_total += $INTERVIEW_AWAITING[$j];
										echo $INTERVIEW_AWAITING[$j] ? $INTERVIEW_AWAITING[$j] : '0';?>
										</a></td>
										
										<td style="text-align:center"><a class="iframeBox" href="<?php echo $this->webroot;?>resume/index/pia/<?php echo $id; ?>/?iframe=1" val="90_80">
										<?php $prili_interview_attend_total += $PRILIMINARY_INTERVIEW_ATTEND[$j];
										echo $PRILIMINARY_INTERVIEW_ATTEND[$j] ? $PRILIMINARY_INTERVIEW_ATTEND[$j] : '0';?>
										</a></td>
										
										
										<td style="text-align:center"><a class="iframeBox" href="<?php echo $this->webroot;?>resume/index/fi/<?php echo $id; ?>/?iframe=1" val="90_80">
										<?php $final_interview_total += $FINAL_INTERVIEW_ATTEND[$j];
										echo $FINAL_INTERVIEW_ATTEND[$j] ? $FINAL_INTERVIEW_ATTEND[$j] : '0';?>
										</a></td>
						
										<td style="text-align:center"><a class="iframeBox" href="<?php echo $this->webroot;?>resume/index/op/<?php echo $id; ?>/" val="90_80">
										<?php $op_total += $OFFER_PENDING[$j];
										echo $OFFER_PENDING[$j] ? $OFFER_PENDING[$j] : '0';?></a></td>
										
										<td style="text-align:center"><a class="iframeBox" href="<?php echo $this->webroot;?>resume/index/oa/<?php echo $id; ?>/?iframe=1" val="90_80">
										<?php $oa_total += $OFFER_ACCEPT[$j];
										echo $OFFER_ACCEPT[$j] ? $OFFER_ACCEPT[$j] : '0';?></a></td>
										
										<td style="text-align:center"><a class="iframeBox" href="<?php echo $this->webroot;?>resume/index/or/<?php echo $id; ?>/" val="90_80">
										<?php $or_total += $OFFER_REJECT[$j];
										echo $OFFER_REJECT[$j] ? $OFFER_REJECT[$j] : '0';?></a></td>
										
																
										<td style="text-align:center"><a class="iframeBox" href="<?php echo $this->webroot;?>resume/index/jp/<?php echo $id; ?>/?iframe=1" val="90_80">
										<?php $jp_total += $JOIN_PENDING[$j];
										echo $JOIN_PENDING[$j] ? $JOIN_PENDING[$j] : '0';?></a></td>
										
										<td style="text-align:center"><a class="iframeBox" href="<?php echo $this->webroot;?>resume/index/ja/<?php echo $id; ?>/?iframe=1" val="90_80">
										<?php $ja_total += $JOIN_ACCEPT[$j];
										echo $JOIN_ACCEPT[$j] ? $JOIN_ACCEPT[$j] : '0';?></a></td>
																												

										<td style="text-align:center"><a class="iframeBox" href="<?php echo $this->webroot;?>resume/index/nj/<?php echo $id; ?>/?iframe=1" val="90_80">
										<?php $nj_total += $NOT_JOIN[$j];
										echo $NOT_JOIN[$j] ? $NOT_JOIN[$j] : '0';?></a></td>

																																								
										<td style="text-align:center"><a class="iframeBox" href="<?php echo $this->webroot;?>resume/index/jd/<?php echo $id; ?>/?iframe=1" val="90_80">
										<?php $jd_total += $JOIN_DEFER[$j];
										echo $JOIN_DEFER[$j] ? $JOIN_DEFER[$j] : '0';?></a></td>
										
										<td style="text-align:center"><a class="iframeBox" href="<?php echo $this->webroot;?>resume/index/nb/<?php echo $id; ?>/?iframe=1" val="90_80">
										<?php $not_bill_total += $NOT_BILLED[$j];
										echo $NOT_BILLED[$j] ? $NOT_BILLED[$j] : '0';?></a></td>
										
										<td style="text-align:center"><a class="iframeBox" href="<?php echo $this->webroot;?>resume/index/bil/<?php echo $id; ?>/?iframe=1" val="90_80">
										<?php $bill_total += $BILLED[$j];
										echo $BILLED[$j] ? $BILLED[$j] : '0';?></a></td>
														
								</tr>
								
							<?php 
							
							
							
							$cv_sent_shortlist[] = round(($CV_SHORTLIST[$j]/$CV_SENT[$j]) * 100);							
							$cv_sent_interview[] =  round(($PRILIMINARY_INTERVIEW_ATTEND[$j]/$CV_SENT[$j]) * 100); 							
							$cv_sent_offer[] =  round((($OFFER_PENDING[$j]+$OFFER_ACCEPT[$j])/$CV_SENT[$j]) * 100);
							$cv_sent_join[] =  round(($JOIN_ACCEPT[$j]/$CV_SENT[$j]) * 100); 
							$cv_sent_billed[] =  round(($BILLED[$j]/$CV_SENT[$j]) * 100); 
							$opening_work_billed[] =  round(($BILLED[$j]/$OPENING_WORKED[$j][0][0]['no_job']) * 100); 
							
							$j++;
							
						
							
							endforeach; ?>
								
								<tr>
										<th width="">Total </th>
										
										<th style="text-align:center"><?php echo  $ow_total;?></th>
										
										<th style="text-align:center"><?php	echo $sent_total;?></a></th>
										
										<th style="text-align:center"><?php echo $shortlist_total;?></a></th>
										
										<th style="text-align:center"><?php echo $reject_total;?></th>
										
										<th style="text-align:center"><?php echo $feedback_total;?></th>
																				
										<th style="text-align:center"><?php echo $interview_await_total;?></th>
										
										<th style="text-align:center"><?php echo $prili_interview_attend_total; ?></th>
										
										<th style="text-align:center"><?php echo $final_interview_total; ?></th>
										
										<th style="text-align:center"><?php echo $op_total; ?></th>
										
										<th style="text-align:center"><?php echo $oa_total; ?></th>
										
										<th style="text-align:center"><?php echo $or_total; ?></th>
										
										<th style="text-align:center"><?php echo $jp_total; ?></th>
										
										<th style="text-align:center"><?php echo $ja_total; ?></th>
										
										<th style="text-align:center"><?php echo $nj_total; ?></th>
										
										<th style="text-align:center"><?php echo $jd_total; ?></th>
										
										<th style="text-align:center"><?php echo $not_bill_total; ?></th>
										
										<th style="text-align:center"><?php echo $bill_total; ?></th>
					
								</tr>
									
									
								
																</tbody>
							</table>
							
							
																	
<ul class="status_row statusLegend" style="margin-left:0px;">	
<li><span class="btn-mini legendBg" > OW </span> &nbsp; Openings Worked</li>
<li><span class="btn-mini legendBg" style="padding:0px 10px !important"> Sent </span> &nbsp; CV Sent	</li>
<li><span class="btn-mini legendBg"> CVS  </span> &nbsp; CV Shortlisted	</li>
<li><span class="btn-mini legendBg"> CVR </span> &nbsp; CV Rejected</li>
<li><span class="btn-mini legendBg"> FA </span> &nbsp; CV Feedback Awaited</li>
<li><span class="btn-mini legendBg" style="padding:0px 7px !important"> ISA  </span> &nbsp; Interview Schedule Awaited</li>
<li><span class="btn-mini legendBg"> PIA </span> &nbsp; Preliminary Interviews Attended</li>
<li><span class="btn-mini legendBg" > FIA </span> &nbsp; Final Interview Attended</li>
<li><span class="btn-mini legendBg"> OP  </span> &nbsp; Offer Pending</li>
<li><span class="btn-mini legendBg"> OA </span> &nbsp; Offer Accepted</li>
<li><span class="btn-mini legendBg"> OR </span> &nbsp; Offer Rejected</li>

<li><span class="btn-mini legendBg" style="padding:0px 7px !important"> JA </span> &nbsp; Joining Awaited</li>
<li><span class="btn-mini legendBg" style="padding:0px 7px !important"> Joined </span> &nbsp; Candidate Joined</li>
<li><span class="btn-mini legendBg" style="padding:0px 10px !important"> NJ </span> &nbsp; Not Joined </li>

<li><span class="btn-mini legendBg" style="padding:0px 7px !important"> JD </span> &nbsp; Joining Deferred</li>
<li><span class="btn-mini legendBg" style="padding:0px 7px !important"> BP </span> &nbsp; Billing Pending</li>
<li><span class="btn-mini legendBg" style="padding:0px 10px !important"> Billed </span> &nbsp; Candidate Billed </li>


</ul>
		
		<div class="alert alert-login no_record dn">
								<a class="close" data-dismiss="alert">×</a>
								<strong>Oops!</strong> No records found!.
							</div>
							
							
				</div></div>
				
				

				
				<div class="row-fluid {$format_type_table}">						


		<div class="span12">
						<h3 class="heading" style="margin-bottom:0;border:;clear:left;">Client Wise CV Status
							
								<div class="pull-right">Graph View: 
								
									<a href="javascript:void(0)" rel="printAreaGraph" class="printBtn"><input value="Print" type="button" class="btn btn-success"/></a>

							
							
								</div>
								
								</h3>
							
							
							<div class="graph printAreaGraph"  id="ctc_wise2" style="height:<?php echo $chart_height;?>px">
							</div>

							
				
						
						
				</div>	

				
				
					</div>
					
			
				
              </div>	          
					
					</div>
                    
					
				

				    
                </div>
            </div>
            
	
		
		<?php echo $this->element('sidebar');?>		 

	
		 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Client', 'CV Sent to Shortlisted %', 'CV Sent to Interviewed %', 'CV Sent to Offered %', 'CV Sent to Joined %','CV Sent to Billed %', 'Openings Worked to Billed %'],
		<?php $i = 0; 
		foreach($clientList as $id => $client): ?>
		<?php //if($cv_sent_shortlist[$i] != '' || $cv_sent_interview[$i] != '' || $cv_sent_offer[$i] != '' || $cv_sent_join[$i] != '' || $cv_sent_billed[$i] != '' || 	$opening_work_billed[$i] != ''):?>
        ['<?php echo ucwords($client);?>', <?php echo $cv_sent_shortlist[$i];?>, <?php echo $cv_sent_interview[$i];?>, <?php echo $cv_sent_offer[$i];?>, <?php echo $cv_sent_join[$i];?>, <?php echo $cv_sent_billed[$i];?>,<?php echo $opening_work_billed[$i];?>],   
		
		<?php //endif; 
			$i++;
			endforeach; ?>
      ]);
	  
	  var formatPercent = new google.visualization.NumberFormat({
   // pattern: '#,##0.0%'
	pattern:'#.#%'
  });

      var view = new google.visualization.DataView(data);
      view.setColumns([0,
	  1,{
      calc: function (dt, row) {
        return   formatPercent.formatValue(dt.getValue(row, 1)/100 );
      },
      type: "string",
      role: "annotation"
    },
	  2,{
      calc: function (dt, row) {
        return   formatPercent.formatValue(dt.getValue(row, 2)/100 );
      },
      type: "string",
      role: "annotation"
    },
	  3,{
      calc: function (dt, row) {
        return   formatPercent.formatValue(dt.getValue(row, 3)/100 );
      },
      type: "string",
      role: "annotation"
    },
	  4,{
      calc: function (dt, row) {
        return   formatPercent.formatValue(dt.getValue(row, 4)/100 );
      },
      type: "string",
      role: "annotation"
    },
	  5,{
      calc: function (dt, row) {
        return   formatPercent.formatValue(dt.getValue(row, 5)/100 );
      },
      type: "string",
      role: "annotation"
    },
	  6,{
      calc: function (dt, row) {
        return   formatPercent.formatValue(dt.getValue(row, 6)/100 );
      },
      type: "string",
      role: "annotation"
    },
	  ]);

      var options = {
        title: "",
		// CTC Wise Monthly Openings Handled (Recruiter: Lavanya)
        annotations: {
         //  alwaysOnTop: true,
          textStyle: {
             fontSize: 15,
             color: '#000',
             auraColor: 'none'
          }
		  
        },
		  vAxis: {
          title: 'Clients',
		  gridlines:{color:'#ccc', count: 4},
		   textStyle: {
             fontSize: 12
			 }
		  

        },
		hAxis: {
           title: 'No. of Openings',
		   gridlines:{color:'#fff'},
		    textPosition : 'none',
		   // format:'#.##%'
		   format:'#%'
        },
		
      // legend: { position: "bottom" },
		
		
		  // '#453d7e', '#2f97d3', '#bdcd40', '#ffcc2b', '#f58634'
		
		
		// '#ea3639','#f58634', '#ffcc2b', '#bdcd40', '#2f97d3', '#453d7e'
		
		
		  colors: ['#453d7e','#2f97d3', '#bdcd40', '#ffcc2b', '#f58634', '#ea3639'],

		//  colors: ['#6688e9', '#f58634', '#12de6d', '#811905', '#ab1f57', '#23E5FF', '#ab1f57',  '#811905','#09418d', '#fabec2', '#0dac01','#d7f477'],
		  legend: {position: 'bottom',alignment: 'start', maxLines:5, textStyle: {color: '#000000', fontSize: 14}},
         dataOpacity: 0.8,
		  isStacked:'percent',
		  bar: { groupWidth: '65%'},
		  chartArea:{width:"85%",left:120, top:30},
		  tooltip:{textStyle: {color: '#000000', fontSize: 14}},
		  titleTextStyle:{ fontSize: 15},
      };
	  
	  function getValueAt(column, dataTable, row) {
			return dataTable.getFormattedValue(row, column);
	}
	
      var chart = new google.visualization.BarChart(document.getElementById("ctc_wise2"));
      chart.draw(view, options);
  }
  
  
  </script>

		
	
		
		</div>
		
	</div>
		
		


				
				<div class="row-fluid printArea" style="padding:15px 0px;">
											
	
						<div class="span12">
							<h3 class="heading" style="margin:0px 15px;">Daily Activity <small>Overview</small>
							<div  style="float:right;font-size:13px;margin-right:100px;color:#fff" class="no-print">
							<ul class="nav nav-pills">
									<li class="dropdown">
										<a  style="color: #fff !important; background-color: #206484; border-color: #999;" class="dropdown-toggle" data-toggle="dropdown" href="#">
										
										<?php if($this->request->query['type'] == 'req'):
										echo 'Requirement Graph';
										else:
										echo 'As Is Graph ';
										endif;
										?>						
										
										<b class="caret" style="color: #fff !important;"></b></a>
										<ul class="dropdown-menu sort-by">
											<li><a href="<?php echo $this->webroot;?>home/?action=view_graph&type=req&from=<?php echo $this->request->query['from'];?>&to=<?php echo $this->request->query['to'];?>" class="sort" data-sort="sl_name2">Requirement Graph</a></li>
											<li><a href="<?php echo $this->webroot;?>home/?action=view_graph&from=<?php echo $this->request->query['from'];?>&to=<?php echo $this->request->query['to'];?>" class="sort" data-sort="sl_date2">As Is Graph</a></li>
											<li><a href="#" class="sort"  id="printId"  data-sort="sl_date2">Print Graph</a></li>

										</ul>
										
										
									</li>
									</ul>
							</div>		
							
							</h3>
							
							<div id="piechart" style="height:468px"></div>
							
						</div>	

						
				</div>			
					
		<input type="hidden" id="graph_pos" value="top"/>
		
</div>

<?php echo $this->element('graph_api');?>
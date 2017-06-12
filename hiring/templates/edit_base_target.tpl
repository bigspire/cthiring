{* Purpose : To add base target.
 Created : Nikitasa
   Date : 28-01-2017 *}
   

			{include file='include/header.tpl'}
			
			<!-- main content -->
            <div id="contentwrapper">
               <div class="main_content">
            <div class="row-fluid">
				 <div class="span12">
				<nav>
                        <div id="jCrumbs" class="breadCrumb module">
                            <ul>
                                <li>
                                    <a href="{$smarty.const.webroot}home"><i class="icon-home"></i></a>
                                </li>
                                <li>
                                    <a href="base_target.php">Base Target</a>
                                </li>
                            
                                <li>
                                   Edit Base Target
                                </li>
                            </ul>
                        </div>
                    </nav>
				{if $EXIST_MSG}
				 <div id="flashMessage" class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button>{$EXIST_MSG}</div>					
				{/if}
<form action="" id="formID" class="formID" method="post" accept-charset="utf-8">
	<div class="box">
		<div class="box-title mb5">
			<h4><i class="icon-list"></i> Base Target Details </h4>
		</div>
		<div class="row-fluid">
		<div class="span6">
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
				<tbody>
						<tr class="tbl_row">
							<td width="120" class="tbl_column">Grade <span class="f_req">*</span></td>
							<td>										
							<select name="grade_name" class="span8" tabindex="1" id="grade_name">
							<option value="">Select</option>	
								{html_options options=$g_name selected=$grade_id}									
							</select>
								<label for="reg_city" generated="true" class="error">{$gradenameErr}</label>									
							</td>	
						</tr>	
						
						<tr>
							<td width="120" class="tbl_column">Type <span class="f_req">*</span></td>
							<td>		
							<select name=type class="span8" tabindex="3">								
								{html_options  options=$grade_type selected=$type}		
							</select>				
								<label for="reg_city" generated="true" class="error">{$typeErr}</label>									
							</td>	
						</tr>																											
				</tbody>
			</table>
		</div>
							
		<div class="span6">		
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
				<tbody>	 
				  	<tr>
							<td width="120" class="tbl_column">No. of times <span class="f_req">*</span></td>
							<td>										
								<select name="no_of_times" class="span8" tabindex="2" id="no_of_times">
								<option value="">Select</option>	
									{html_options options=$no_of_times selected=$no_times}										
								</select>
								<label for="reg_city" generated="true" class="error">{$no_of_timesErr}</label>									
							</td>	
				  </tr>	
						 
				  <tr class="tbl_row">
						<td width="120" class="tbl_column">Status <span class="f_req">*</span></td>
						<td>	
							{html_options name=status class="span8" tabindex="4" options=$grade_status selected=$status}										
							<label for="reg_city" generated="true" class="error">{$statusErr}</label>											
						</td>	
				  </tr>						
				</tbody>
			</table>
		</div>
		</div>	
	<div>
</div>
</div>
<div class="form-actions">
				<input name="submit" class="btn btn-gebo" value="Submit" type="submit"/>
				<input type="button" value="Cancel" class="btn" onclick="window.location='base_target.php'">
</div>
                    </div>
				</form>
         </div>
       </div> 
	</div>
</div>
</div>
 </div>
</div>		
{include file='include/footer.tpl'}
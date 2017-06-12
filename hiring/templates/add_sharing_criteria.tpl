{* Purpose : To add sharing criteria.
   Created : Nikitasa
   Date : 29-01-2017 *}
   

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
                                    <a href="sharing_criteria.php">Sharing Criteria</a>
                                </li>
                            
                                <li>
                                   Add Sharing Criteria
                                </li>
                            </ul>
                        </div>
                    </nav>
				{if $EXIST_MSG}
				 <div id="flashMessage" class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button>{$EXIST_MSG}</div>					
				{/if}
<form action="add_sharing_criteria.php" id="formID" class="formID" method="post" accept-charset="utf-8">
	<div class="box">
		<div class="box-title mb5">
			<h4><i class="icon-list"></i> Sharing Criteria Details </h4>
		</div>
		<div class="row-fluid">
		<div class="span6">
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
				<tbody>
						<tr class="tbl_row">
							<td width="120" class="tbl_column">Type  <span class="f_req">*</span></td>
							<td>										
								<select name="type" class="span8" tabindex="1" id="type">
								<option value="">Select</option>	
									{html_options options=$type_name selected=$smarty.post.type}								
								</select>
								<label for="reg_city" generated="true" class="error">{$typeErr}</label>									
							</td>	
						</tr>
						<tr>
							<td width="120" class="tbl_column">% of Share <span class="f_req">*</span></td>
							<td>										
								<input type="text" tabindex="3" name="share" value="{$share}" class="span8">
								<label for="reg_city" generated="true" class="error">{$shareErr}</label>									
							</td>	
				  		</tr>
																																	
				</tbody>
			</table>
		</div>
							
		<div class="span6">		
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
				<tbody>	 
					<tr class="tbl_row"> 
						<td width="120" class="tbl_column">Status <span class="f_req">*</span></td>
						<td>	
						<select name=status tabindex="2" class="span8"  id="status" >
							{if isset($status)}
									{html_options options=$grade_status selected=$status}	
											{else}
									{html_options options=$grade_status selected='1'}	
							{/if}
							</select>
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
				<input type="button" value="Cancel" class="btn" onclick="window.location='sharing_criteria.php'">
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
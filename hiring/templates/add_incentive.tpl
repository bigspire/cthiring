{* Purpose : To add incentive.
 Created : Nikitasa
   Date : 22-01-2017 *}
   

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
                                    <a href="incentive.php">Incentive</a>
                                </li>
                            
                                <li>
                                   Add Incentive
                                </li>
                            </ul>
                        </div>
                    </nav>

<form action="" id="formID" class="formID" method="post" accept-charset="utf-8">
	<div class="box">
		<div class="box-title mb5">
			<h4><i class="icon-list"></i> Incentive Details </h4>
		</div>
		<div class="row-fluid">
		<div class="span6">
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
				<tbody>
						<tr class="tbl_row">
							<td width="120" class="tbl_column inline">Select Quarter <span class="f_req">*</span></td>
							<td>																			
								<select name="month" class="span6 input-medium" placeholder="" style="clear:left" id="month">
								{html_options options=$months selected=$smarty.post.month}							
								</select> 
								<select name="year" class="span6 input-medium" placeholder="" style="clear:left;display:inline" id="year">
								<option value="">Year</option>
								{html_options options=$years selected=$smarty.post.year}							
								</select>								

								<label for="reg_city" generated="true" class="error">{$quarterErr}</label>									
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
				<a href="incentive.php"><button type="button" class="btn">Cancel</button></a>
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
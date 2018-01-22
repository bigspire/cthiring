{* Purpose : To edit resume api.
Created : Nikitasa
Date : 22-01-2018 *}
   
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
                                    <a href="view_resume_api.php">Resume API</a>
                                </li>
                            
                                <li>
                                   Edit Resume API
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
			<h4><i class="icon-list"></i> API Details </h4>
		</div>
		<div class="row-fluid">
		<div class="span6">
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
				<tbody>
						<tr class="tbl_row">
							<td width="165" class="tbl_column">HTML2PDF Rocket API Key <span class="f_req">*</span></td>
							<td>										
								<input type="text" tabindex="1" name="api_key" value="{$api_key}" class="span8 ui-autocomplete-input" autocomplete="off">
								<label for="reg_city" generated="true" class="error">{$api_keyErr}</label>									
							</td>	
						</tr>			

							<tr class="tbl_row">
							<td width="165" class="tbl_column">ILOVEPDF Secret Key <span class="f_req">*</span></td>
							<td>										
								<input type="text" tabindex="1" name="secret_key" value="{$secret_key}" class="span8 ui-autocomplete-input" autocomplete="off">
								<label for="reg_city" generated="true" class="error">{$secret_keyErr}</label>									
							</td>	
						</tr>	
				</tbody>
			</table>
		</div>
							
		<div class="span6">		
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
				<tbody>	  
				  <tr class="tbl_row">
						<td width="155" class="tbl_column">ILOVEPDF Public Key <span class="f_req">*</span></td>
						<td>	
							<input type="text" tabindex="1" name="public_key" value="{$public_key}" class="span8 ui-autocomplete-input" autocomplete="off">
							<label for="reg_city" generated="true" class="error">{$public_keyErr}</label>																		
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
				<input type="hidden" name="data[Client][webroot]" value="view_resume_api.php" id="webroot">

	<a href="javascript:void(0)" class="jsRedirect cancelBtn cancel_event">
	<input type="button" value="Cancel" class="btn">
	</a></div>
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
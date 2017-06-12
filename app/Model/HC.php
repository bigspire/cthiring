<?php
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

class HC extends AppModel {
	
	public $name = 'HC';
	 
	//public $useTable = 'HC_RESUME_ORIGINAL_DOC';	
	public $userTable = 'HC_REQ_RESUME';
	
	public $primaryKey = 'RID';
	
	public $useDbConfig = 'sqlserver_db';
	  
	/* function to get the resume data */
	public function get_resume_data($id){		
		$status = $this->connect_database();
		// if connected successfully
		if($status != 'error_connect'){
			$sql = "select ResumeFileExtension, ResumeData from HC_RESUME_ORIGINAL_DOC where ResumeID = '$id'";	
			/*
			$sql2 = "select FaceSheet from HC_REQ_RESUME where ResID = '$id'";	
			$result2 = mssql_query($sql2);

			$sql3 = "select  MailBody  from HCM_TEMPLATE_LIBRARY where RID = '47'";
			$result3 = mssql_query($sql3);
			*/
			$result = mssql_query($sql);
			if (!mssql_num_rows($result)){
				return 'no_data';
				//echo 'No records found';
			}
			$content = mssql_result($result, 0, 'ResumeData');
			$file = mssql_result($result, 0, 'ResumeFileExtension');
			//$type = strtolower(strrchr($file, '.'));
			header('Content-type: application/download');
			//$file = 'ManojSharm.docx';
			//header("Content-Type: image/png");	 		
			header("Content-Disposition: attachment; filename=\"".$file."\";");
			echo $content; 
			die;
		}else{
			return 'error_connect';
		}
	}
	
	/* function to get the JD */
	public function get_jd($id){		
		$status = $this->connect_database();
		// if connected successfully
		if($status != 'error_connect'){
			$sql = "select  [JobDescription],[ReqTitle]  from [HC_REQUISITIONS] where RID = '$id'";			
			$result = mssql_query($sql);
			if (!mssql_num_rows($result)){
				return 'no_data';
				//echo 'No records found';
			}
			$content = mssql_result($result, 0, 'JobDescription');
			$file = mssql_result($result, 0, 'ReqTitle').'.doc';			
			//$type = strtolower(strrchr($file, '.'));
			header('Content-type: application/msword'); 
			header("Content-Disposition: attachment; filename=\"".$file."\";" );
			echo $content; 
			die;
		}else{
			return 'error_connect';
		}
	}
	
	/* function to connect to db */
	public function connect_database(){
		$link = mssql_connect('122.165.98.119', 'sa', 'CtHrs@12345');
		//$link = mssql_connect('BIGSPIRE', 'sa', 'spire789');
		if (!$link) {
			return 'error_connect';
			//die('Something went wrong while connecting to MSSQL');
		}else{
			$link_con = mssql_select_db('HCLIVE', $link);
		}
		
	}

	
}
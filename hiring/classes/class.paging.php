<?php
/* Author: Ravi */
class Paging
{
	var $koneksi;
	var $p;
	var $page;
	var $q;
	var $query;
	var $next;
	var $prev;
	var $number;
	var $model;
	var $paging_no;

	function Paging($baris=10, $langkah=10, $prev="Prev", $next="Next", $number="%%number%%", $paging_no='')
	{
		
		$this->model = '';
		$this->paging_no = $paging_no;
		$this->next=$next;
		$this->prev=$prev;
		$this->number=$number;
		$this->p["baris"]=$baris;
		$this->p["langkah"]=$langkah;

		$_SERVER["QUERY_STRING"]= preg_replace("/&page$this->paging_no=[0-9]*/","",$_SERVER["QUERY_STRING"]);
		if (empty($_GET["page$this->paging_no"])) {
			$this->page=1;
		} else {
			$this->page=$_GET["page$this->paging_no"];
		}
	}

	
	function query($num)
	{
		$kondisi=false;			

		$this->p["count"]= $num;
		// total page
		$this->p["total_page"]=ceil($this->p["count"]/$this->p["baris"]);

		// filter page
		if  ($this->page<=1)
			$this->page=1;
		elseif ($this->page>$this->p["total_page"])
			$this->page=$this->p["total_page"];
		if($this->page==0) $this->page=1;
    	 $this->p["mulai"]=$this->page*$this->p["baris"]-$this->p["baris"];
	
	}

	function print_no()
	{
	
		$number=$this->p["mulai"]+=1;

		return $number;
	}
	
	function print_color($color1,$color2)
	{

		if (empty($this->p["count_color"]))
			$this->p["count_color"] = 0;
		if ( $this->p["count_color"]++ % 2 == 0 ) {
			return $color=$color1;
		} else {
			return $color=$color2;
		}
	}

	function print_info()
	{

		$page=array();
		
		$page["start"]=$this->p["mulai"]+1;
		$page["end"]=$this->p["mulai"]+$this->p["baris"];
		$page["total"]=$this->p["count"];
		$page["total_pages"]=$this->p["total_page"];
			if ($page["end"] > $page["total"]) {
				$page["end"]=$page["total"];
			}
			if (empty($this->p["count"])) {
				$page["start"]=0;
			}

		return $page;
	}
	function posturl($url){ 
		 $this->search_url = $url;
	}
	
	
	function print_link()
	{
	
		function number($i,$number)
		{
			return ereg_replace("^(.*)%%number%%(.*)$","\\1$i\\2",$number);
		}
		
		//pagination query string is replaced
		$_SERVER["QUERY_STRING"] = str_replace('pagination=no','pagination=yes',$_SERVER["QUERY_STRING"]);
		$print_link = false;
			// print start
		if ($this->p["count"]>$this->p["baris"]) {

		if($this->page!=1)
	      	$print_link .= "<div class=\"button2-right on\"><div class=\"start\"><a href=\"".$_SERVER["PHP_SELF"]."?".($_POST?'':$_SERVER["QUERY_STRING"])."&page=$i".$this->search_url."\" title='Start'>Start</span></a></div></div>\n";
			else
			$print_link .= "<div class=\"button2-right off\"><div class=\"start\"><a style=\"cursor:default;color:#333333\">Start</span></a></div></div>\n";
	   
				// print prev
          if($this->page==1)
		   $print_link .= "<div class=\"button2-right off\"><div class=\"prev\"><a style=\"cursor:default;color:#333333\">".$this->prev."</a></div></div>\n";
		  else 
         $print_link .= "<div class=\"button2-right on\"><div class=\"prev\"><a href=\"".$_SERVER["PHP_SELF"]."?".($_POST?'':$_SERVER["QUERY_STRING"])."&page=".($this->page-1)."".$this->search_url."\">".$this->prev."</a></div></div>\n";
			// set number
			$this->p["bawah"]=$this->page-$this->p["langkah"];
				if ($this->p["bawah"]<1) $this->p["bawah"]=1;
			$this->p["atas"]=$this->page+$this->p["langkah"];
				if ($this->p["atas"]>$this->p["total_page"]) $this->p["atas"]=$this->p["total_page"];
			
			 $print_link .= "<div class=\"button2-left\"><div class=\"page\">";	
           for ($i=$this->p["bawah"];$i<=$this->page-1;$i++){
		                   $print_link .="<a href=\"".$_SERVER["PHP_SELF"]."?".($_POST?'':$_SERVER["QUERY_STRING"])."&page=$i".$this->search_url."\">".number($i,$this->number)."</a>";
			}
			// print active
			if ($this->p["total_page"]>1)
			$print_link .="<b><span>".number($this->page,$this->number)."</span></b>\n";
                 $n=number($this->page,$this->number)-1;$nn=number($this->page,$this->number);
			
		      for ($i=$this->page+1;$i<=$this->p["atas"];$i++){
			                $print_link .="<a href=\"".$_SERVER["PHP_SELF"]."?".($_POST?'':$_SERVER["QUERY_STRING"])."&page=$i".$this->search_url."\">".number($i,$this->number)."</a>";
				}
		
	            $print_link .="</div></div>\n";
			// print next
            if($this->page ==  $this->p["total_page"])
			{
			$print_link .= "<div class=\"button2-left off\"><div class=\"next\"><a style=\"cursor:default;color:#333333\">".$this->next."</a></div></div>\n"; 
			$print_link .= "<div class=\"button2-left off\"><div class=\"end\"><a style=\"cursor:default;color:#333333\">End</span></a></div></div>\n";
			}
			else {
					$print_link .= "<div class=\"button2-left\"><div class=\"next\"><a href=\"".$_SERVER["PHP_SELF"]."?".($_POST?'':$_SERVER["QUERY_STRING"])."&page=".($this->page+1)."".$this->search_url."\">".$this->next."</a></div></div>\n"; 			// print end
			$i=$this->p["total_page"] ;
			$print_link .= "<div class=\"button2-left\"><div class=\"end\"><a href=\"".$_SERVER["PHP_SELF"]."?".($_POST?'':$_SERVER["QUERY_STRING"])."&page=$i".$this->search_url."\" title='End'>End</span></a></div></div>\n";
		   
			
		}

			return $print_link;

			
		}
	}
	function number($i,$number){ 
		return $i;
		// return ereg_replace("^(.*)%%number%%(.*)$","\\1$i\\2",$number);
	}
	function print_link_frontend(){

				
		$print_link = false;

		if ($this->p["count"] > $this->p["baris"]){

		
			$page_name = $_SERVER['SCRIPT_NAME'];
			// print prev
			
			if ($this->page>1)
			$print_link .= "<span><a  href='".$page_name."?".($_POST?'':$_SERVER["QUERY_STRING"])."&page$this->paging_no=".($this->page-1)."".$this->search_url."'>".$this->prev."</a></span>";

			// set number
			$this->p["bawah"]=$this->page-$this->p["langkah"];
				if ($this->p["bawah"]<1) $this->p["bawah"]=1;

			$this->p["atas"]=$this->page+$this->p["langkah"];
				if ($this->p["atas"]>$this->p["total_page"]) $this->p["atas"]=$this->p["total_page"];
			// print start
			if ($this->page<>1)
			{
				for ($i=$this->p["bawah"];$i<=$this->page-1;$i++){
					 $print_link .="<span><a  href='".$page_name."?".($_POST?'':$_SERVER["QUERY_STRING"])."&page$this->paging_no=$i"."".$this->search_url."' title='Start'>".$this->number($i,$this->number)."</a></span>";
					}
			}
			// print active
			if ($this->p["total_page"]>1){
    			
				$print_link .= "<span class=\"active\"><a class='active'>".$this->number($this->page,$this->number)."</a></span>";
	
				}

			// print next numbers
			for ($i=$this->page+1;$i<=$this->p["atas"];$i++)
			$print_link .= "<span><a  href='".$page_name."?".($_POST?'':$_SERVER["QUERY_STRING"])."&page$this->paging_no=$i"."".$this->search_url."'>".$this->number($i,$this->number)."</a></span>";

			// print next
			if ($this->page<$this->p["total_page"])
			$print_link .= "<span><a  href='".$page_name."?".($_POST?'':$_SERVER["QUERY_STRING"])."&page$this->paging_no=".($this->page+1)."".$this->search_url."'>".$this->next."</a></span>";
			
			return $print_link;
			
		}
		
	}
	
}
?>
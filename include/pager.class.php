<?php

    class Pager
    {
      var   $_total;                          //total
      var  $pagesize;                       //
      var     $pages;                         //pages number
      var   $_cur_page;                    //now page
      var  $offset;                      //
      var  $pernum = 10;                //
    
      function Pager($total,$pagesize,$_cur_page)
        {   
        $this->_total=$total;
        $this->pagesize=$pagesize;
        $this->_offset();
        $this->_pager();
        $this->cur_page($_cur_page);
    }
    
    function _pager()//total
    { 
    return $this->pages = ceil($this->_total/$this->pagesize);
    }
   
   
     function cur_page($_cur_page) //
    {     
   	    if (isset($_cur_page)&&$_cur_page!=0)
           {
           $this->_cur_page=intval($_cur_page);
           }
           else
           {
            $this->_cur_page=1; //first page
           }
        return  $this->_cur_page;
   }
   
 //
  function _offset()
   {
   return $this->offset=$this->pagesize*($this->_cur_page-1);
   }
      //html
 function num_link($tex='?',$url='')
  {
       $setpage  = $this->_cur_page ? ceil($this->_cur_page/$this->pernum) : 1;
        $pagenum   = ($this->pages > $this->pernum) ? $this->pernum : $this->pages;
        if ($this->_total  <= $this->pagesize) {
            $text  = '';
        } else {
            $text = '<span class=list_total>'.$this->_cur_page.'/'.$this->pages.'&nbsp;</span>';
            if ($setpage > 1) {
                $lastsetid = ($setpage-1)*$this->pernum;
                $text .= '<a  class=webdings href='.$tex.'pager='.$lastsetid.$url.'> 8 </a>';
            }
            if ($this->_cur_page > 1) {
                $pre = $this->_cur_page-1;
                $text .= '<a    class=webdings  href='.$tex.'pager='.$pre.$url.'>3</a>';
            }
            $i = ($setpage-1)*$this->pernum;
            for($j=$i; $j<($i+$pagenum) && $j<$this->pages; $j++) {
                $newpage = $j+1;
                if ($this->_cur_page == $j+1) {
                    $text .= '<span>'.($j+1).'</span>';
                } else {
                    $text .= '<a href='.$tex.'pager='.$newpage.$url.'>'.($j+1).'</a>';
                }
            }            
            if ($this->_cur_page < $this->pages){
                $next = $this->_cur_page+1;
                $text .= '<a  class=webdings href='.$tex.'pager='.$next.$url.'>4</a>';
            }
            if ($setpage < $this->_total) {
                $nextpre = $setpage*($this->pernum+1);
                if($nextpre<$this->pages)
                $text .= '<a  class=webdings  href='.$tex.'pager='.$nextpre.$url.'>7</a>';
            }
         }
            return $text;
         }
 //html
function link($url, $exc='')
  {
      global $lang_PageTotal,$lang_Page,$lang_PageLocation,$lang_PageHome,$lang_PageEnd,$lang_PagePre,$lang_PageNext,$lang_PageGo,$met_pageskin,$total_count;
	  global $lang_Total,$lang_Pagenum,$met_url;
 if($met_pageskin=='' or $met_pageskin==0 or $met_pageskin>9)$met_pageskin=1;
  switch($met_pageskin){
case 1:
            $text= "$lang_PageTotal<span>$this->pages</span>$lang_Page $lang_PageLocation<span style='color:#990000'>$this->_cur_page</span>$lang_Page ";
      if ($this->_cur_page == 1 && $this->pages>1) 
        {
            //first page
            $text.= "$lang_PageHome $lang_PagePre <a href=".$url.($this->_cur_page+1).$exc.">$lang_PageNext</a>  <a href=".$url.$this->pages.$exc.">$lang_PageEnd</a>";
        } 
        elseif($this->_cur_page == $this->pages && $this->pages>1) 
        {
            //last page
             $text.= "<a href=".$url.'1'.$exc.">$lang_PageHome</a> <a href=".$url.($this->_cur_page-1).$exc.">$lang_PagePre</a> $lang_PageNext $lang_PageEnd";
        } 
        elseif ($this->_cur_page > 1 && $this->_cur_page <= $this->pages) 
        {
            //middle
             $text.= "<a href=".$url.'1'.$exc.">$lang_PageHome</a> <a href=".$url.($this->_cur_page-1).$exc.">$lang_PagePre</a> <a href=".$url.($this->_cur_page+1).$exc.">$lang_PageNext</a>  <a href=".$url.$this->pages.$exc.">$lang_PageEnd</a>";
        }
            $text.=" $lang_PageGo <select onchange='javascript:window.location.href=this.options[this.selectedIndex].value'>";
         for($i=1;$i<=$this->pages;$i++){
            if($i==$this->_cur_page){
              $text.="<option selected='selected' value='".$url.$i.$exc."' >".$i."</option>";
            }else{
              $text.="<option value='".$url.$i.$exc."' >".$i."</option>";
            }
          }
              $text.="</select> $lang_Page ";

  break;
  
  case 2:
 
      if ($this->_cur_page == 1 && $this->pages>1) 
        {

            $text= "$lang_PageHome $lang_PagePre <a href=".$url.($this->_cur_page+1).$exc.">$lang_PageNext</a>  <a href=".$url.$this->pages.$exc.">$lang_PageEnd</a>";
        } 
        elseif($this->_cur_page == $this->pages && $this->pages>1) 
        {
             $text.= "<a href=".$url.'1'.$exc.">$lang_PageHome</a> <a href=".$url.($this->_cur_page-1).$exc.">$lang_PagePre</a> $lang_PageNext $lang_PageEnd";
        } 
        elseif ($this->_cur_page > 1 && $this->_cur_page <= $this->pages) 
        {
             $text.= "<a href=".$url.'1'.$exc.">$lang_PageHome</a> <a href=".$url.($this->_cur_page-1).$exc.">$lang_PagePre</a> <a href=".$url.($this->_cur_page+1).$exc.">$lang_PageNext</a>  <a href=".$url.$this->pages.$exc.">$lang_PageEnd</a>";
        }
		
		 $text .="&nbsp;&nbsp;".$lang_PageTotal."<span>$this->_total</span>$lang_Total $lang_PageLocation<span style='color:#990000'>$this->_cur_page</span>/".$this->pages.$lang_Pagenum;
        
  break;
  
  case 3:
    if ($this->_cur_page == 1){
         $text="<a style='font-family: Tahoma, Verdana;' href=".$url."1".$exc."><b>«</b></a> <a style='font-size:12px;font-family: Tahoma, Verdana;' href=".$url.'1'.$exc.">‹</a>";
		}else{
		 $text="<a style='font-family: Tahoma, Verdana;' href=".$url."1".$exc."><b>«</b></a> <a style='font-family: Tahoma, Verdana;' href=".$url.($this->_cur_page-1).$exc.">‹</a>";
		}
	if($this->pages >10 ){
	   if($this->_cur_page>5){
	     if(($this->pages-$this->_cur_page)>5){
	        $startnum=$this->_cur_page-4;
		    $endnum=$this->_cur_page+5;
		  }else{
		    $startnum=$this->pages-9;
		    $endnum=$this->pages;
		   }
		}else{
		    $startnum=1;
		    $endnum=10;		
		}
	 }else{
	   	$startnum=1;
		$endnum=$this->pages;	
	 }
	for($i=$startnum;$i<=$endnum;$i++){
	   if($i==$this->_cur_page)$page_stylenow="style='font-weight:bold;'";
	    $text.=" <a $page_stylenow href=".$url.$i.$exc.">[".$i."]</a> ";
		$page_stylenow='';
	   }
	 if ($this->_cur_page == $this->pages){
        $text.="<a style='font-family: Tahoma, Verdana;' href=".$url.$this->pages.$exc.">›</a> <a style='font-family: Tahoma, Verdana;' href=".$url.$this->pages.$exc."><b>»</b></a>";
	  }else{
	    $text.="<a style='font-family: Tahoma, Verdana;' href=".$url.($this->_cur_page+1).$exc.">›</a> <a style='font-family: Tahoma, Verdana;'  href=".$url.$this->pages.$exc."><b>»</b></a>";
	   }
  break;
  
  case 4 or 5 or 6 or 7 or 8 or 9:
  if($met_pageskin==4){
   $text.="<style>";
   $text.=".digg4 { padding:3px; margin:3px; text-align:center; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px;}";
   $text.=".digg4 a { border:1px solid #aaaadd; padding:2px 5px 2px 5px; margin:2px; color:#000099; text-decoration:none;}";
   $text.=".digg4 a:hover { border:1px solid #000099; color:#000000;}";
   $text.=".digg4 a:active {border:1px solid #000099; color:#000000;}";
   $text.=".digg4 span.current { border:1px solid #000099; background-color:#000099; padding:2px 5px 2px 5px; margin:2px; color:#FFFFFF; text-decoration:none;}";
   $text.=".digg4 span.disabled { border:1px solid #eee; padding:2px 5px 2px 5px; margin:2px; color:#ddd;}";
   $text.="</style>";
  }elseif($met_pageskin==5){
   $text.="<style>";
   $text.=".digg4 { padding:3px; margin:3px; text-align:center; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px;}";
   $text.=".digg4  a { border:1px solid #ccdbe4; padding:2px 8px 2px 8px; background-position:50%; margin:2px; color:#0061de; text-decoration:none;}";
   $text.=".digg4  a:hover { border:1px solid #2b55af; color:#fff; background-color:#3666d4;}";
   $text.=".digg4  a:active {border:1px solid #000099; color:#000000;}";
   $text.=".digg4  span.current { padding:2px 8px 2px 8px; margin:2px; color:#000; text-decoration:none;}";
   $text.=".digg4  span.disabled { border:1px solid #ccdbe4; padding:2px 8px 2px 8px; margin:2px; color:#ddd;}";
   $text.=" </style>";
  }elseif($met_pageskin==6){
   $text.="<style>";
   $text.=".digg4 { padding:3px; color:#ff6500; margin:3px; text-align:center; font-family: Tahoma, Arial, Helvetica, Sans-serif; font-size: 12px;}";
   $text.=".digg4 a { border:1px solid  #ff9600; padding:2px 7px 2px 7px; background-position:50% bottom; margin:2px; color:#ff6500; background-image:url(".$met_url."images/page6.jpg); text-decoration:none;}";
   $text.=".digg4 a:hover { border:1px solid #ff9600; color:#ff6500; background-color:#ffc794;}";
   $text.=".digg4 a:active {border:1px solid #ff9600; color:#ff6500; background-color:#ffc794;}";
   $text.=".digg4 span.current {border:1px solid #ff6500; padding:2px 7px 2px 7px; margin:2px; color:#ff6500; background-color:#ffbe94; text-decoration:none;}";
   $text.=".digg4 span.disabled { border:1px solid #ffe3c6; padding:2px 7px 2px 7px; margin:2px; color:#ffe3c6;}";
   $text.=" </style>";  
  }elseif($met_pageskin==7){
   $text.="<style>";
   $text.=".digg4  { padding:3px; margin:3px; text-align:center; font-family: Tahoma, Arial, Helvetica, Sans-serif, sans-serif; font-size: 12px;}";
   $text.=".digg4  a { border:1px solid  #2c2c2c; padding:2px 5px 2px 5px; background:url(".$met_url."images/page7.gif) #2c2c2c; margin:2px; color:#fff; text-decoration:none;}";
   $text.=".digg4  a:hover { border:1px solid #aad83e; color:#fff;background:url(".$met_url."images/page7_2.gif) #aad83e;}";
   $text.=".digg4  a:active { border:1px solid #aad83e; color:#fff;background:urlurl(".$met_url."images/page7_2.gif) #aad83e;}";
   $text.=".digg4  span.current {border:1px solid #aad83e; padding:2px 5px 2px 5px; margin:2px; color:#fff;background:url(".$met_url."images/page7_2.gif) #aad83e; text-decoration:none;}";
   $text.=".digg4  span.disabled { border:1px solid #f3f3f3; padding:2px 5px 2px 5px; margin:2px; color:#ccc;}";
   $text.=" </style>";  
  }elseif($met_pageskin==8){
   $text.="<style>";
   $text.=".digg4  { padding:3px; margin:3px; text-align:center; font-family:Tahoma, Arial, Helvetica, Sans-serif;  font-size: 12px;}";
   $text.=".digg4  a { border:1px solid #ddd; padding:2px 5px 2px 5px; margin:2px; color:#aaa; text-decoration:none;}";
   $text.=".digg4  a:hover { border:1px solid #a0a0a0; }";
   $text.=".digg4  a:hover { border:1px solid #a0a0a0; }";
   $text.=".digg4  span.current {border:1px solid #e0e0e0; padding:2px 5px 2px 5px; margin:2px; color:#aaa; background-color:#f0f0f0; text-decoration:none;}";
   $text.=".digg4  span.disabled { border:1px solid #f3f3f3; padding:2px 5px 2px 5px; margin:2px; color:#ccc;}";
   $text.=" </style>";  
  }elseif($met_pageskin==9){
   $text.="<style>";
   $text.=".digg4 { padding:3px; margin:3px; text-align:center; font-family:Tahoma, Arial, Helvetica, Sans-serif;  font-size: 12px;}"; 
   $text.=".digg4  a { border:1px solid #ddd; padding:2px 5px 2px 5px; margin:2px; color:#88af3f; text-decoration:none;}"; 
   $text.=".digg4  a:hover { border:1px solid #85bd1e; color:#638425; background-color:#f1ffd6; }"; 
   $text.=".digg4  a:hover { border:1px solid #85bd1e; color:#638425; background-color:#f1ffd6; }"; 
   $text.=".digg4  span.current {border:1px solid #b2e05d; padding:2px 5px 2px 5px; margin:2px; color:#fff; background-color:#b2e05d; text-decoration:none;}"; 
   $text.=".digg4  span.disabled { border:1px solid #f3f3f3; padding:2px 5px 2px 5px; margin:2px; color:#ccc;}"; 
   $text.=" </style>";  
  }
   if($this->pages >12 ){
     $startnum=floor(($this->_cur_page/10))*10+1;
	 if(floor(($this->_cur_page/10))==($this->_cur_page/10))$startnum=floor(($this->_cur_page/10))*10+1-10;
	   if(($this->pages-$startnum)>=12){
	      if($startnum!=1){
		    $endnum=$startnum+9;
			$middletext="...";
			$prepagenow="<a href='".$url.($startnum-1).$exc."' style='font-family: Tahoma, Verdana;'>‹</a>";
			$nextpagenow="<a href='".$url.($startnum+10).$exc."' style='font-family: Tahoma, Verdana;'>›</a>";
		   }else{
			$endnum=$startnum+9;
			$middletext="...";
			$prepagenow="<span class='disabled' style='font-family: Tahoma, Verdana;'>‹</span>";
			$nextpagenow="<a href='".$url.($startnum+10).$exc."' style='font-family: Tahoma, Verdana;'>›</a>";
		   }
		 }else{
		    $prepagenow="<a href='".$url.($startnum-1).$exc."' style='font-family: Tahoma, Verdana;'>‹</a>";
			$nextpagenow="<span class='disabled' style='font-family: Tahoma, Verdana;'>›</span>";
		    $endnum=$this->pages-2;
			$middletext="";
		  }
	 }else{
	   	$startnum=1;
		$endnum=$this->pages-2;	
		$middletext="";
		$prepagenow="<span class='disabled' style='font-family: Tahoma, Verdana;'>‹</span>";
		$nextpagenow="<span class='disabled' style='font-family: Tahoma, Verdana;'>›</span>";
	 }
	  $text.="<div class='digg4'>";
    if ($this->_cur_page == 1){
         $text.="<span class='disabled' style='font-family: Tahoma, Verdana;'><b>«</b></span>".$prepagenow;
		}else{
		 $text.="<a style='font-family: Tahoma, Verdana;' href=".$url."1".$exc."><b>«</b></a>".$prepagenow;
		}   
   for($i=$startnum;$i<=$endnum;$i++){
	   if($i==$this->_cur_page){
	    $text.="<span class='current'>".$i."</span>";
		}else{
	    $text.=" <a href=".$url.$i.$exc.">".$i."</a> ";
		}
	   }   
        $text.=$middletext;
 if($this->pages>1){
	if(($this->pages-1)==$this->_cur_page){
	     $text.="<span class='current'>".($this->pages-1)."</span>";
	 }else{
        $text.=" <a href=".$url.($this->pages-1).$exc.">".($this->pages-1)."</a> ";
	 }
	}
	if($this->pages==$this->_cur_page){
	     $text.="<span class='current'>".$this->pages."</span>";
	 }else{
        $text.=" <a href=".$url.$this->pages.$exc.">".$this->pages."</a> ";
	 }
    if ($this->_cur_page == $this->pages){
         $text.=$nextpagenow."<span class='disabled' style='font-family: Tahoma, Verdana;'><b>»</b></span>";
		}else{
		$text.=$nextpagenow."<a style='font-family: Tahoma, Verdana;' href=".$url.$this->pages.$exc."><b>»</b></a>";
		}  
        $text.="</div>";
  break;
  
  }
         return $text; 
  }
  
  
 }

?>
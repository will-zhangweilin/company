<!--<?php
require_once template('head'); 
echo <<<EOT
-->
<div id="index">
<!--
EOT;
if($PublicOk==1){	
echo <<<EOT
-->
     <div class="public">
	    <div class="con">
	      <h3 class="ti fl">
		      <span>{$Index_Column1}：</span>
		  </h3>
		  <div class="soroll fl">
		  <ul class="scul">
<!--
EOT;
$i=0;
foreach(methtml_getarray($Mark1,'com','time','') as $key=>$val){
$i++;	
echo <<<EOT
-->
			   <li> 
			       <a href="{$val[url]}" title="{$val[title]}" $metblank>{$val[title]}</a>
			       <span>{$val[updatetime]}</span>
			   </li>
<!--
EOT;
if($i>=$lang_annomax)break;
}
echo <<<EOT
-->
		  </ul>
		  </div>
<!--
EOT;
if($otherinfo[info9] <> ''){
echo <<<EOT
-->	  
		  <div class="jathis fr">{$otherinfo[info9]}</div>
<!--
EOT;
}
echo <<<EOT
--> 
		</div>
              <i class="lt"></i>
              <i class="rt"></i>
              <i class="lb"></i>
              <i class="rb"></i>
	 </div>
<!--
EOT;
}	
echo <<<EOT
-->
<div class="indexcontaner"> 
<div class="indexlf fl">
<!--
EOT;
if($CompanyOk==1){	
echo <<<EOT
-->
     <div class="combox about mrt lfpd tupAple">  
          <div class="LT">
              <h3>
		      <a href="{$Url2}" title="{$More}" $metblank class="more">{$More}</a>
			  <span>{$Index_Column2}</span>
              </h3>
		  </div>
		  <div class="con editor">{$index[content]}<div class="clear"></div></div>
              <i class="lt"></i>
              <i class="rt"></i>
              <i class="lb"></i>
              <i class="rb"></i>
	 </div>
<!--
EOT;
}
if($ProductOk==1){	
echo <<<EOT
-->	 
      <div class="combox product mrt lfpd">
<div class="procontaner">
          <div class="LT">
              <h3>
			  <span>{$Index_Column3}</span>
              </h3>		   			  
		  </div>
		   <div class="prolist tupAple" id="newbookslides">
		      <div class="slides_container">
<!--
EOT;
$slheight=($met_productimg_y)*2+40+(14*2);
echo <<<EOT
-->
		       <ul class="slide" style=" height:{$slheight}px;">
<!--
EOT;
$t=methtml_getarray($Mark3,'com','','product');
for($i=0;$i<8;$i++){	
$t[$i][title]=utf8substr($t[$i][title], 0, $lang_proTinum);
echo <<<EOT
-->
			         <li style="width:{$met_productimg_x}px;" class="dgpro">
					      <a href="{$t[$i][url]}" title="{$t[$i][title]}" $metblank>
						       <img src="{$t[$i][imgurls]}" alt="{$t[$i][title]}" title="{$t[$i][title]}" width="{$met_productimg_x}" height="{$met_productimg_y}"/>
							   <h2>{$t[$i][title]}</h2>
						  </a>
					 </li>
<!--
EOT;
}
echo <<<EOT
-->
			   </ul>
		       <ul class="slide" style="height:{$slheight}px;">
<!--
EOT;
$t=methtml_getarray($Mark3,'com','','product');
for($i=8;$i<16;$i++){	
echo <<<EOT
-->
			         <li style="width:{$met_productimg_x}px;" class="dgpro">
					      <a href="{$t[$i][url]}" title="{$t[$i][title]}" $metblank>
						       <img src="{$t[$i][imgurls]}" alt="{$t[$i][title]}" title="{$t[$i][title]}" width="{$met_productimg_x}" height="{$met_productimg_y}"/>
							   <h2>{$t[$i][title]}</h2>
						  </a>
					 </li>
<!--
EOT;
}
echo <<<EOT
-->
			   </ul>
			   </div>
		   </div>
</div>		   
              <i class="lt"></i>
              <i class="rt"></i>
              <i class="lb"></i>
              <i class="rb"></i>
	  </div>
<!--
EOT;
}	
if($TownewsOk==1){
echo <<<EOT
-->		  
	  <div class="contentNews tupAple">
<!--
EOT;
$Nddw=334-$met_newsimg_x-15;
echo <<<EOT
-->
	       <div class="combox lfNe fl mrt lfpd">
		        <h3 class="ti"><span>{$Index_Column4}</span></h3>
				<div class="newlist01">
				     <ul>
<!--
EOT;
$i=0;
foreach(methtml_getarray($Mark4,'all','time','') as $key=>$val){
$val[description]=utf8substr($val[description], 0, $lang_newsdescripnum);	
$val[title]=utf8substr($val[title], 0, $lang_newsTinum);
$i++;	
echo <<<EOT
-->   
<!--
EOT;
if($i==1){
echo <<<EOT
-->              
                          <li class="toliTi">
						        <h3><a href="{$val[url]}" title="{$val[title]}" $metblank>{$val[title]}</a></h3>
								<span>{$val[updatetime]}&nbsp;/&nbsp;{$lang_Inew_hits}&nbsp;{$val[hits]}</span>
						  </li> 
						  <li class="toliimdes">
						        <dl style="height:{$met_newsimg_y}px;">
								     <dt style="width:{$met_newsimg_x}px;" class="fl">
									     <a href="{$val[url]}" title="{$val[title]}" $metblank>
										      <img src="{$val[imgurls]}" alt="{$val[title]}" title="{$val[title]}" width="{$met_newsimg_x}" height="{$met_newsimg_y}"/>
										 </a>
									 </dt>
									 <dd style="width:{$Nddw}px;" class="fr">{$val[description]}</dd>
								</dl>
						  </li> 
<!--
EOT;
}
else{
echo <<<EOT
-->                       
					      <li class="newli">
						       <span>{$val[updatetime]}</span>
						       <a href="{$val[url]}" title="{$val[title]}" $metblank>{$val[title]}</a>{$val[top]}{$val[news]}{$val[hot]}
						  </li>
<!--
EOT;
}
echo <<<EOT
--> 
<!--
EOT;
}
echo <<<EOT
-->
					 </ul>
				</div>
				<div class="ptio">
				     <a href="{$Url4}" title="{$More}" class="More" $metblank>{$More}</a>
<!--
EOT;
$zl=count(methtml_getarray($Mark4,'all','time',''));
echo <<<EOT
--> 
					 <span>{$lang_ztotal}{$zl}{$lang_article}</span>
				</div>
			  <i class="lt"></i>
              <i class="rt"></i>
              <i class="lb"></i>
              <i class="rb"></i>
		   </div>
		   <div class="combox riNe fr mrt lfpd">
		        <h3 class="ti"><span>{$Index_Column5}</span></h3>
				<div class="newlist02">
				     <ul>
<!--
EOT;
$i=0;
foreach(methtml_getarray($Mark5,'all','time','') as $key=>$val){
$val[description]=utf8substr($val[description], 0, $lang_newsdescripnum);
$val[title]=utf8substr($val[title], 0, $lang_newsTinum);		
$i++;	
echo <<<EOT
-->   
<!--
EOT;
if($i==1){
echo <<<EOT
-->              
                          <li class="toliTi">
						        <h3><a href="{$val[url]}" title="{$val[title]}" $metblank>{$val[title]}</a></h3>
								<span>{$val[updatetime]}&nbsp;/&nbsp;{$lang_Inew_hits}&nbsp;{$val[hits]}</span>
						  </li> 
						  <li class="toliimdes">
						        <dl style="height:{$met_newsimg_y}px;">
								     <dt style="width:{$met_newsimg_x}px;" class="fl">
									     <a href="{$val[url]}" title="{$val[title]}" $metblank>
										      <img src="{$val[imgurls]}" alt="{$val[title]}" title="{$val[title]}" width="{$met_newsimg_x}" height="{$met_newsimg_y}"/>
										 </a>
									 </dt>
									 <dd style="width:{$Nddw}px;" class="fr">{$val[description]}</dd>
								</dl>
						  </li> 
<!--
EOT;
}
else{
echo <<<EOT
-->                       
					      <li class="newli">
						       <span>{$val[updatetime]}</span>
						       <a href="{$val[url]}" title="{$val[title]}" $metblank>{$val[title]}</a>{$val[top]}{$val[news]}{$val[hot]}
						  </li>
<!--
EOT;
}
echo <<<EOT
--> 
<!--
EOT;
}
echo <<<EOT
-->
					 </ul>
				</div>
				<div class="ptio">
				     <a href="{$Url5}" title="{$More}" class="More" $metblank>{$More}</a>
<!--
EOT;
$zl=count(methtml_getarray($Mark5,'all','time',''));
echo <<<EOT
--> 
					 <span>{$lang_ztotal}{$zl}{$lang_article}</span>
				</div>
			  <i class="lt"></i>
              <i class="rt"></i>
              <i class="lb"></i>
              <i class="rb"></i>
		   </div>
		   <div class="clear"></div>
	  </div>
<!--
EOT;
}
echo <<<EOT
-->	  
</div>	
<div class="indexri fr">
<!--
EOT;
if($CaseOk==1){
echo <<<EOT
-->	
      <div class="case mrt">
	       <div class="bT">
		       <a href="{$Url6}" title="{$More}" $metblank class="more">{$More}</a>
               <h3 class="caseTix">
		       <span>{$Index_Column6}</span>
               </h3>
		   </div>
<!--
EOT;
$hex=$met_imgs_y+14;	
echo <<<EOT
-->  
           <div class="combox riconte">
		       <div class="caseimg focus" style="height:{$hex}px;width:{$met_imgs_x}px;">
		        <ul class="rslides f426x240" style="height:{$met_imgs_y}px;width:{$met_imgs_x}px;">
<!--
EOT;
foreach(methtml_getarray($Mark6,'com','time','img') as $key=>$val){	
echo <<<EOT
-->
				     <li>
					      <a href="{$val[url]}" title="{$val[title]}" $metblank>
						      <img src="{$val[imgurls]}" alt="{$val[title]}" title="{$val[title]}" width="{$met_imgs_x}" height="{$met_imgs_y}"/>
						  </a>
					 </li>
<!--
EOT;
}
echo <<<EOT
-->
				</ul>
		      </div>
			  <div class="clear"></div>
              <i class="rt"></i>
              <i class="lb"></i>
              <i class="rb"></i>
		   </div>
	  </div>
<!--
EOT;
}
if($SolutionOk==1){
echo <<<EOT
-->	
      <div class="solution mrt">
	       <div class="bT">
		       <a href="{$Url7}" title="{$More}" $metblank class="more">{$More}</a>
               <h3 class="newTix">
		       <span>{$Index_Column7}</span>
               </h3>
		   </div>
		   <div class="combox riconte">
		       <ul class="Newlist">
<!--
EOT;
foreach(methtml_getarray($Mark7,'all','time','',$lang_rinewsOnum) as $key=>$val){
$val[title]=utf8substr($val[title], 0, $lang_rinewsTinum);		
echo <<<EOT
-->
				      <li>
						  <a href="{$val[url]}" title="{$val[title]}" $metblank>{$val[title]}</a>
						  <p>{$lang_addtime}<span>{$val[updatetime]}</span></p>
					  </li>
<!--
EOT;
}	
echo <<<EOT
-->
		      </ul>
              <i class="rt"></i>
              <i class="lb"></i>
              <i class="rb"></i>
		   </div>
	  </div>
<!--
EOT;
}
if($FaqOk==1){	
echo <<<EOT
-->
      <div class="FAQ mrt">
	       <div class="bT">
		       <a href="{$Url8}" title="{$More}" $metblank class="more">{$More}</a>
               <h3 class="faqTix">
		       <span>{$Index_Column8}</span>
               </h3>
		   </div>
		   <div class="combox riconte">
		       <ul class="Newlist">
<!--
EOT;
foreach(methtml_getarray($Mark8,'all','time','',$lang_rinewsTnum) as $key=>$val){
$val[title]=utf8substr($val[title], 0, $lang_rinewsTinum);			
echo <<<EOT
-->
				      <li>
						  <a href="{$val[url]}" title="{$val[title]}" $metblank>{$val[title]}</a>
						  <p>{$lang_addtime}<span>{$val[updatetime]}</span></p>
					  </li>
<!--
EOT;
}	
echo <<<EOT
-->
		      </ul>
              <i class="rt"></i>
              <i class="lb"></i>
              <i class="rb"></i>
		   </div>
	  </div>
<!--
EOT;
}	
echo <<<EOT
-->	  
</div>	
<div class="clear"></div>  
</div>  	  
</div>
<!--
EOT;
require_once template('foot');
?>
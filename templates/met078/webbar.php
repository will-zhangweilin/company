<!--<?php
$thismod=$class_list[$classnow]['module'];
$leftnavlist=$thismod==11?methtml_advsearch():($thismod==10?membernavlist():($nav_list2[$class1]!=''?metlabel_navnow(2):0));
if($thismod>99)$leftnavlist=metlabel_navnow(2);
$leftnavtitle=$class_list[$class1]['name'];
if($thismod==11 || $thismod==10)$leftnavtitle=$class_list[$classnow]['name'];
$classnows=$classnow;
if($cvidnow)$classnows=$cvidnow;
echo <<<EOT
-->
<div id="web">
<!--
EOT;
if($leftnavlist || $lang_Web_Contactok){
echo <<<EOT
-->
    <div class="web-left fl">
<!--
EOT;
if($leftnavlist){
echo <<<EOT
-->
		<h3 class="title"><span>{$leftnavtitle}</span></h3>
		<div class="box" id="sidebar">{$leftnavlist}<i class="lb"></i>
              <i class="rb"></i></div>
		<script type="text/javascript">partnav('{$classnows}','{$class3}','{$lang_Web_jsok}');</script>
<!--
EOT;
$line='line';
}
echo <<<EOT
-->
<!--
EOT;
if($lang_Web_Contactok && $otherinfo[imgurl1]<>''){
echo <<<EOT
-->
		<div class="{$line}">
             <a href="{$class_index[$lang_web_clMk1][url]}" title="{$lang_Web_Column1}">
                <img src="{$otherinfo[imgurl1]}" alt="{$lang_Web_Column1}" title="{$lang_Web_Column1}"/>
             </a>
        </div>
<!--
EOT;
}
echo <<<EOT
-->
<!--
EOT;
if($lang_Web_newok){
echo <<<EOT
-->
		<h3 class="title mrt"><span>{$lang_Web_Column2}</span></h3>
		<div class="box">
		       <ul class="Newlist">
<!--
EOT;
foreach(methtml_getarray($lang_web_clMk2,'all','time','',$lang_nylfnewnum) as $key=>$val){	
echo <<<EOT
-->
				      <li>
						  <a href="{$val[url]}" title="{$val[title]}" $metblank>{$val[title]}</a>
					  </li>
<!--
EOT;
}	
echo <<<EOT
-->
		      </ul>
              <i class="lb"></i>
              <i class="rb"></i>
        </div>
<!--
EOT;
}
echo <<<EOT
-->
    </div>
<!--
EOT;
}else{
$tclass='metwd100';
}
echo <<<EOT
-->
<!--
EOT;
require_once template('webtop'); 
echo <<<EOT
-->
<!--
EOT;
?>
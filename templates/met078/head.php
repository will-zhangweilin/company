<!--<?php
require_once template('config');
echo <<<EOT
-->
{$methtml_head}
<link href="{$navurl}public/css/reset.css" rel="stylesheet" type="text/css" />
<script src="{$img_url}js/fun.inc.js" type="text/javascript" language="javascript"></script>
<body>
    <div class="metinfo">
         <div id="top">
              <div class="fl logo">
				   <a href="{$index_url}" title="{$met_webname}">
                      <img src="{$met_logo}" alt="{$met_webname}" title="{$met_webname}" style="margin-top:{$lang_LogoTop}px; margin-left:{$lang_LogoLeft}px;"/>
                   </a>
              </div>
              <div class="fr ot-tp">
              {$metlang}
              <br/>
              {$met_seo}
              </div>
              <div class="clear"></div>
         </div>
<!--
EOT;
$ulwz=1000-190;
$g=count($nav_list)+1;
$lj=($g)*1;
$cwz=$ulwz-($lj)-115;
$dk=($cwz)/($g-1);
echo <<<EOT
-->
<style type="text/css">
     #nav li.class1{width:{$dk}px;}
</style>
         <div id="nav">
              <ul class="meanu1" style="width:{$ulwz}px;">
                   <li class="home" id="nav_10001">
                       <a href="{$index_url}" title="{$lang_home}"><span>{$lang_home}</span></a>
                   </li>
<!--
EOT;
foreach($nav_list as $key=>$val){
$j=count($nav_list2[$val[id]]);
echo <<<EOT
-->
                   <li class="line"></li>
                   <li class="class1" id="nav_$val[id]">
                        <a href="{$val[url]}" title="{$val[name]}"><span>{$val[name]}</span></a>
<!--
EOT;
if($j>0){
echo <<<EOT
-->
                        <dl class="meanu2" style="display:none;">
<!--
EOT;
foreach($nav_list2[$val[id]] as $key=>$val2){
echo <<<EOT
-->
                             <dd class="class2">
                                   <a href="{$val2[url]}" title="{$val2[name]}"><span>{$val2[name]}</span></a>

                             </dd>
<!--
EOT;
}
echo <<<EOT
-->
                        </dl>
<!--
EOT;
}
echo <<<EOT
-->
                   </li>
<!--
EOT;
}
echo <<<EOT
-->
                   <li class="line"></li>
              </ul>
              <div class="metsearch">
                   {$topsearch}
              </div>
         </div>
<script type="text/javascript" language="javascript">
       var b={$navdown};
	   if(b==10001) $('#nav_'+b).addClass('indexnavdown');
	   else $('#nav_'+b).addClass('navdown');
</script>         
    </div>   
    <div class="metinfo">
         <div id="flash">{$methtml_flash} </div>
<!--
EOT;
?>
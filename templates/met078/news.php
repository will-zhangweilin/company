<!--<?php
require_once template('head'); 
require_once template('webbar'); 
echo <<<EOT
-->
        <div class="newslist webbox mrt">
			<ul class="metlist">
<!--
EOT;
$i=0;
foreach($news_list as $key=>$val){
$i++;	
echo <<<EOT
-->
			     <li>
				      <h5><span>{$val[updatetime]}</span><a href="{$val[url]}" title="{$val[title]}" $metblank>{$val[title]}</a>{$val[top]}{$val[news]}{$val[hot]}</h5>
					  <p>{$val[description]}</p>
				 </li>
<!--
EOT;
if($i>=$met_news_list)break;
}
echo <<<EOT
-->
			</ul>
			<div id="flip">{$page_list}</div>
              <i class="lt"></i>
              <i class="rt"></i>
              <i class="lb"></i>
              <i class="rb"></i>
		</div>
	</div>
    <div class="clear"></div>
</div>
<!--
EOT;
require_once template('foot'); 
?>
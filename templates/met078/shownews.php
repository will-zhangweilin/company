<!--<?php
require_once template('head'); 
require_once template('webbar'); 
$methits=methtml_hits('news');
$met_newsnext=methtml_prenextinfo(1);
$weblist=metlabel_news(0);
echo <<<EOT
-->
        <div class="shownews webbox mrt">
            <h1 class="title">{$news[title]}</h1>
            <div class="editor">{$news[content]}<div class="clear"></div></div>
			<div class="hits">{$methits}</div>
            <div class="page">{$met_newsnext}</div>
              <i class="lt"></i>
              <i class="rt"></i>
              <i class="lb"></i>
              <i class="rb"></i>
        </div>
<!--
EOT;
if($lang_NewsRelatedKO==1){
echo <<<EOT
-->
			<h4 class="related"><span>{$lang_NewsRelated}</span></h4>
			<div class='relatedlist'>{$weblist}<div class="clear"></div><i class="rt"></i><i class="lb"></i><i class="rb"></i></div>
<!--
EOT;
}
echo <<<EOT
-->
    </div>
    <div class="clear"></div>
</div>
<!--
EOT;
require_once template('foot'); 
?>
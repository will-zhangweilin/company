<!--<?php
require_once template('head'); 
require_once template('webbar'); 
$met_img=methtml_showimg('all');
$methits=methtml_hits('img');
$met_next=methtml_prenextinfo(1);
echo <<<EOT
-->
        <div class="showimg webbox mrt">
		    <h1 class="title">$img[title]</h1>
            <div class="para">{$met_img}</div>
            <div class="editor">{$img[content]}<div class="clear"></div></div>
			<div class="hits">$methits</div>
            <div class="page">$met_next</div>
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
<!--<?php
require_once template('head'); 
require_once template('webbar'); 
$weblist=metlabel_download();
echo <<<EOT
-->
        <div class="downloadlist webbox mrt">
			{$weblist}
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
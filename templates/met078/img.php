<!--<?php
require_once template('head'); 
require_once template('webbar'); 
$weblist=metlabel_img();
echo <<<EOT
-->
        <div class="imglist tupAple mrt" id="metimgli">
			{$weblist}
			<script type="text/javascript">metaddwdht($('#metimgli li.list'),0);</script>
			<div class="clear"></div>
			<div id="flip">{$page_list}</div>
		</div>
	</div>
    <div class="clear"></div>
</div>
<!--
EOT;
require_once template('foot'); 
?>
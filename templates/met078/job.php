<!--<?php
require_once template('head'); 
require_once template('webbar'); 
$weblist=metlabel_job();
echo <<<EOT
-->
        <div class="joblist webbox mrt">
			{$weblist}
<script type="text/javascript">
$(document).ready(function(){
		proxy($('.joblist dd.list'),'hover');
});
</script>
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
<!--<?php
require_once template('head'); 
require_once template('webbar');
$addlinkform=metlabel_addlink();
echo <<<EOT
-->
        <div class="linksubmit webbox mrt tupAple">
            {$addlinkform}
              <i class="lt"></i>
              <i class="rt"></i>
              <i class="lb"></i>
              <i class="rb"></i>
        </div>
    </div>
    <div class='clear'></div>
</div>
<!--
EOT;
require_once template('foot'); 
?>
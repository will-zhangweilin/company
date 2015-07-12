<!--<?php
require_once template('head'); 
require_once template('webbar');
$cvform=metlabel_cv();
echo <<<EOT
-->
        <div class="cvlist webbox mrt">
            {$cvform}
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
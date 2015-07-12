<!--<?php
require_once template('head'); 
require_once template('webbar');
$feedbacktabel=metlabel_feedback();
echo <<<EOT
-->
        <div class="feedback webbox mrt">
            {$feedbacktabel}
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
<!--<?php
# 文件名称
require_once template('head'); 
require_once template('webbar'); 
echo <<<EOT
-->
        <div class="memberbox webbox mrt">
            <!--
EOT;
include templatemember($mfname);
echo <<<EOT
-->
              <i class="lt"></i>
              <i class="rt"></i>
              <i class="lb"></i>
              <i class="rb"></i>
        </div>
    </div>
    <div style="clear:both;"></div>
</div>
<!--
EOT;
require_once template('foot'); 
?>
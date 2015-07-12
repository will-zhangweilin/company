<!--<?php
require_once template('head'); 
require_once template('webbar');
$messagetable=messagelabel_table();
echo <<<EOT
-->
       <div class="messagetable webbox mrt">
<!--
EOT;
if($class_list[$classnow][releclass]!=0){
echo <<<EOT
-->
            <div class="inside"><a href="$message[listurl]" class="hover-none">{$lang_ReadInfo}</a></div>
<!--
EOT;
}
echo <<<EOT
-->
            {$messagetable}
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
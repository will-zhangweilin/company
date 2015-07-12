<!--<?php
require_once template('head'); 
require_once template('webbar');
$messagelist=metlabel_messagelist();
echo <<<EOT
-->
       <div class="messagelist webbox mrt">
<!--
EOT;
if($class_list[$classnow][releclass]!=0){
echo <<<EOT
-->
            <div class="inside"><a href="$addmessage_url" class="hover-none">{$lang_SubmitInfo}</a><div class="clear"></div></div>
<!--
EOT;
}
echo <<<EOT
-->
            {$messagelist}
        <div id="flip">$page_list</div>
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
<!--<?php
require_once template('head'); 
require_once template('webbar');
$metlinkimg=methtm_link('img','all','0','100','1');
$metlinktext=methtm_link('text','all','0','100','1');
echo <<<EOT
-->
        <div class="linklist webbox mrt tupAple">
<!--
EOT;
if($class_list[$classnow][releclass]!=0){
echo <<<EOT
-->
            <div class="inside"><a href="$addlink_url" class="hover-none">{$lang_ApplyLink}</a></div>
<!--
EOT;
}
echo <<<EOT
-->
            <dl class="metlist">
                <dt>{$lang_PictureLink}</dt>
                <dd>$metlinkimg</dd>
            </dl>
            <dl class="metlist">
                <dt>{$lang_TextLink}</dt>
                <dd>$metlinktext</dd>
            </dl>
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
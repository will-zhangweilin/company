<!--<?php
require_once template('head'); 
require_once template('webbar'); 
$methtml_searchlist=methtml_searchlist();
echo <<<EOT
-->
        <div class="searchlist webbox mrt">
            $methtml_searchlist
            <div id="flip">$page_list</div>
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
<!--<?php
require_once template('head'); 
require_once template('webbar');
$methits=methtml_hits('download');
$metdownload=methtml_showdownload();
$met_next=methtml_prenextinfo(1);
echo <<<EOT
-->
        <div class="showdownload webbox mrt">
            <ul class="Para">
			    <li class="title"><span class="name">{$lang_showdownload1}</span><h1>$download[title]</h1></li>
<!--
EOT;
foreach($download_paralist as $key=>$val){
echo <<<EOT
-->
                <li>
					<span class="name">{$val[name]}</span>{$download[$val[para]]}
				</li>
<!--
EOT;
}
echo <<<EOT
-->
                <li><span class="name">{$lang_showdownload2}</span>$download[updatetime]</li>
                <li>
				    <span class="name">{$lang_showdownload3}</span>
				    <a href="$download[downloadurl]" target="_blank" title="{$lang_ShowDownload_Column4}">
					    {$lang_showdownload4}
					</a>
				</li>
				<li><span class="name">{$lang_showdownload5}</span>$download[description]</li>
			</ul>
<script type="text/javascript">
    function DownWdith(group) {
	    tallest = 0;
	    group.each(function(){
		    thisWdith = $(this).width();
		    if(thisWdith > tallest) {
			tallest = thisWdith;
		    }
	    });
	    group.width(tallest);
    }
$(document).ready(function(){
     DownWdith($("span.name"));
});
</script>
			    <div class="text editor"">
                    $download[content]
					<div class="clear"></div>
				</div>
			<div class="hits">$methits</div>
            <div class="page">$met_next</div>
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
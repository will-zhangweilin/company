<!--<?php
require_once template('head'); 
require_once template('webbar'); 
$met_product=methtml_imgdisplay('product');
$met_productnext=methtml_prenextinfo(1);
$methits=methtml_hits('product');
echo <<<EOT
-->
        <div class="showproduct webbox mrt tupAple">
			<h1 class='title'>{$product[title]}</h1>
<!--
EOT;
$dtwidth=$met_productdetail_x + 8;
echo <<<EOT
-->
            <dl class='productshow'>
                <dt style="width:{$dtwidth}px;">{$met_product}</dt>
		        <dd style="margin-left:-{$dtwidth}px;">
				    <div style="margin-left:{$dtwidth}px;">
		            <ul>
<!--
EOT;
foreach($product_paralist as $key=>$val2){
echo <<<EOT
-->
                        <li>$val2[name] : <span>{$product[$val2[para]]}</span></li>
<!--
EOT;
}
echo <<<EOT
-->
			        </ul>
					<div class="text">$product[description]</div>
<!--
EOT;
if($lang_prdctfeedbakok==1){
$fid=$class_index[$lang_prdctfeedbakmark]['id'];
$product[title]=urlencode($product[title]);
echo <<<EOT
-->
<div class="feedback">
<a href="{$addfeedback_url}{$product[title]}&id={$fid}" {$metblank} title="{$lang_prdctfeedbak}" class='hover-none'><span>{$lang_prdctfeedbak}</span></a>
</div>
<!--
EOT;
}
echo <<<EOT
-->
                    </div>
		        </dd>
	        </dl>
			<div style="clear:both;"></div>
			<h3 class="conttitle"><span>{$lang_productdetailed}</span></h3>
			<div class='contbox'>
				<div class="editor">{$product[content]}<div class="clear"></div></div>
				<div class="hits">{$methits}</div>
				<div class="page">{$met_productnext}</div>
			</div>
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
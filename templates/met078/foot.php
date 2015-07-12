<!--<?php
echo <<<EOT
-->
    <div class="fotnav-link mrt">
	     <div class="fotnav">
		      <div class="backhome fl"><a href="{$index_url}" title="{$lang_backhome}">{$lang_backhome}</a></div>
			  <div class="nav fr">{$met_foot_nav}</div>
		 </div>
<!--
EOT;
if($index_link_ok==1){
echo <<<EOT
--> 
		 <div class="friendlink">
		      <h3>
			       <a href="{$class_index[$linkMk][url]}" title="{$lang_Index_More}" class="more">{$lang_Index_More}</a>
				   <span>{$linkTi}</span>
			  </h3>
			  <div class="imglink">{$metlinkimg}<div class="clear"></div></div>
			  <div class="wzlink">{$metlinktxt}<div class="clear"></div></div>
		 </div>
<!--
EOT;
}
echo <<<EOT
--> 
		 <div class="lklt ix"></div>
         <div class="lkrt ix"></div>
<!--
EOT;
if($index_link_ok==1){
echo <<<EOT
-->		 
         <div class="lklb ix"></div>
         <div class="lkrb ix"></div>
<!--
EOT;
}
echo <<<EOT
-->
	</div>
	<div id="footer">
            <div class="text">
                {$met_foot_txt}
<!--以下是版权信息，购买商业授权之后方可去除！-->
			<div class="powered_by_metinfo">
				Powered&nbsp;by&nbsp;<a href="http://www.MetInfo.cn" target="_blank" title="{$lang_Info1}">MetInfo&nbsp;{$metcms_v}</a>
				&copy;2008-{$m_now_year}&nbsp;
				<a href="http://www.MetInfo.cn" target="_blank" title="{$lang_Info3}">www.metinfo.cn</a>
			</div>
<!--版权信息结束-->
            </div>
	</div>
</div>
<script src="{$img_url}js/IE6-png.js" type="text/javascript" language="javascript"></script>
<script src="{$img_url}js/jquery.slider.min.js" type="text/javascript" language="javascript"></script>
<script src="{$img_url}js/index.js" type="text/javascript" language="javascript"></script>
<script type="text/javascript">
  $(document).ready(function(){
//导航下拉菜单效果,MetinfoNav($("导航ID或者Class"),导航缺省宽度,1|2|3种效果);
	    MetinfoNav($("#nav li.class1"),0,3); 
  });
</script>
{$metonline}
</body>
</html>
<!--
EOT;
?>-->
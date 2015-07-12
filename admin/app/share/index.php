<?php
$depth='../';
require_once $depth.'../login/login_check.php';
if($action=='modify'){
	require_once $depth.'../include/config.php';
	metsave('../app/share/index.php?anyid='.$anyid.'&lang='.$lang,'',$depth);
}
$jiathis_lang1[$lang]="checked='checked'";
$met_jiathis_ok1[$met_jiathis_ok]="checked='checked'";
$met_tools_ok1[$met_tools_ok]="checked='checked'";
$css_url=$depth."../templates/".$met_skin."/css";
$img_url=$depth."../templates/".$met_skin."/images";
include template_app('share/index',$EXT="html");
footer();
?>
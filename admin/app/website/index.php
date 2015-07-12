<?php
$depth='../';
require_once $depth.'../login/login_check.php';
if($action=='modify'){
	$query="update $met_config set value='$met_website' where name='met_website' and lang='metinfo'";
	$db->query($query);
	$index_content=str_replace('\"','"',$index_content);
	if($met_website==0){
		//copy(ROOTPATH_ADMIN.'app/website/webc.html',ROOTPATH.'index.html');
		$config_save="<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>{$met_webname}</title>
<meta name='description' content='{$met_description}' />
</head>
<body>";
		$config_save.=$index_content;
		$config_save.="</body></html>";
		$filname=ROOTPATH.'index.html';
		$fp = fopen($filname,w);
		fputs($fp, $config_save);
		fclose($fp);
		$filname='webc.html';
		$config_save=$index_content;
		$fp = fopen($filname,w);
		fputs($fp, $config_save);
		fclose($fp);
	}else{
		$htmjs=indexhtm();
		unlink(ROOTPATH.'index.html');
	}
	if($met_webhtm==0){
		metsave('../app/website/index.php?anyid='.$anyid.'&lang='.$lang,'',$depth);
	}
	else{
		metsave('../app/website/index.php?anyid='.$anyid.'&lang='.$lang,'',$depth,$htmjs);
	}
	
}
$index_content=file_get_contents(ROOTPATH_ADMIN.'app/website/webc.html');
$met_website1[$met_website]="checked='checked'";
$css_url=$depth."../templates/".$met_skin."/css";
$img_url=$depth."../templates/".$met_skin."/images";
include template_app('website/index',$EXT="html");
footer();
?>
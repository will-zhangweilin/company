<?php
# MetInfo Enterprise Content Management System 
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved. 
require_once '../login/login_check.php';
$column_list = $db->get_one("SELECT * FROM $met_column WHERE id='$id'");
$lev=0;
if(!$column_list){
	metsave('-1',$lang_dataerror);
}
$classtype=1;
if($column_list['list_order']==0)$column_list['list_order']=1;
$list_order[$column_list['list_order']]="checked='checked'";
$list_orderok="none";
if($column_list[module]==2 || $column_list[module]==3 || $column_list[module]==4 || $column_list[module]==5)$list_orderok="";
$module[$column_list[module]]="selected='selected'";
$nav[$column_list[nav]]="checked='checked'";
if($column_list[wap_ok])$wap_ok="checked='checked'";
$bigclass=$lang_modClass1;
$addtitle=$lang_modClass1;
$foldername="";
$class=$column_list[bigclass];
if($column_list[classtype]!=1&&$column_list[module]==$met_class[$column_list[bigclass]][module])$releclassok="disabled='disabled'";
if(count($met_class2[$column_list[id]]))$releclassok="disabled='disabled'";
else{$if_out_p="none";}
if($column_list[new_windows]=="target='_blank'"){
	$new_windows[1]="checked";
}else{
	$new_windows[0]="checked";
}

if($column_list[bigclass]!=0){
$class2_list = $db->get_one("SELECT * FROM $met_column WHERE id='$column_list[bigclass]'");
$lev=$class2_list['access'];
$bigclass=$class2_list[name];
if($class2_list[bigclass]!=0){
$addtitle=$lang_modClass3;
$classtype=3;
}
else{
$addtitle=$lang_modClass2;
$classtype=2;
}
}

switch($column_list['access'])
{
	case '1':$access1="selected='selected'";break;
	case '2':$access2="selected='selected'";break;
	case '3':$access3="selected='selected'";break;
	default:$access0="selected='selected'";break;
}

$level="";
switch(intval($lev))
{
	case 0:$level.="<option value='0' $access0>$lang_access0</option>";
	case 1:$level.="<option value='1' $access1>$lang_access1</option>";
	case 2:$level.="<option value='2' $access2>$lang_access2</option>";
	case 3:$level.="<option value='3' $access3>$lang_access3</option>";
}
$column_list['name']=str_replace('"', '&#34;', str_replace("'", '&#39;',$column_list['name']));
$column_list['ctitle']=str_replace('"', '&#34;', str_replace("'", '&#39;',$column_list['ctitle']));
$isshowcheck[$column_list['isshow']]='checked';
if($column_list['module']!=1 || $column_list['classtype']==3) $filenameok="none";
if((!$metadmin['pagename'] and $column_list['module']>6) or $column_list['module']>8)$filenameok1="none";
if($column_list['module']>6 and $column_list['module']<13) $filenameok="none";
$releclass=$column_list['releclass'];
$edjs= "<script language='javascript'>var metadminpagename=$metadmin[pagename];</script>";
$css_url="../templates/".$met_skin."/css";
$img_url="../templates/".$met_skin."/images";
include template('column/column_editor');
footer();
# This program is an open source system, commercial use, please consciously to purchase commercial license.
# Copyright (C) MetInfo Co., Ltd. (http://www.metinfo.cn). All rights reserved.
?>
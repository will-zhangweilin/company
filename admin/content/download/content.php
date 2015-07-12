<?php
# MetInfo Enterprise Content Management System 
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved. 
$depth='../';
require_once $depth.'../login/login_check.php';
require_once $depth.'global.func.php';
if($action=="editor"){
	$download_list=$db->get_one("select * from $met_download where id='$id'");
	$download_list['title']=str_replace('"', '&#34;', str_replace("'", '&#39;',$download_list['title']));
	$download_list['ctitle']=str_replace('"', '&#34;', str_replace("'", '&#39;',$download_list['ctitle']));
	if($met_member_use){
		$lev=$met_class[$download_list['class1']][access];
		switch($download_list['access']){
			case '1':$access1="selected";break;
			case '2':$access2="selected";break;
			case '3':$access3="selected";break;
			default:$access0="selected";break;
		}
		switch($download_list['downloadaccess']){
			case '1':$downloadaccess1="selected='selected'";break;
			case '2':$downloadaccess2="selected='selected'";break;
			case '3':$downloadaccess3="selected='selected'";break;
			default:$downloadaccess0="selected='selected'";break;
		}
	}
	if(!$download_list)metsave('-1',$lang_dataerror,$depth);
	$query = "select * from $met_plist where module='4' and listid='$id'";
	$result = $db->query($query);
	while($list = $db->fetch_array($result)){
		$nowpara="para".$list[paraid];
		$download_list[$nowpara]=$list[info];
		$nowparaname="";
		if($list[imgname]<>"")$nowparaname=$nowpara."name";$download_list[$nowparaname]=$list[imgname];
	}
	$class1=$download_list[class1];
	if($download_list[new_ok]==1)$new_ok="checked";
	if($download_list[com_ok]==1)$com_ok="checked";
	if($download_list[top_ok]==1)$top_ok="checked";
	if($download_list[wap_ok]==1)$wap_ok="checked";
	$class2x[$download_list[class2]]="selected";
	$class3x[$download_list[class3]]="selected";	
}else{
	$class2x[$class2]="selected";
	$class3x[$class3]="selected";
	$download_list[class2]=$class2;
	$download_list[issue]=$metinfo_admin_name;
	$download_list[hits]=0;
	$download_list[no_order]=0;
	$download_list[addtime]=$m_now_date;
	$download_list[access]="0";
	$lang_editinfo=$lang_addinfo;
	$lev=$met_class[$class1][access];
}
if($met_member_use){
	$level="";
	switch(intval($lev)){
		case 0:$level.="<option value='0' $access0>$lang_access0</option>";
		case 1:$level.="<option value='1' $access1>$lang_access1</option>";
		case 2:$level.="<option value='2' $access2>$lang_access2</option>";
		case 3:$level.="<option value='3' $access3>$lang_access3</option>";
	}
	$leve2="";
	$leve2.="<option value='0' $downloadaccess0>$lang_access0</option>";
	$leve2.="<option value='1' $downloadaccess1>$lang_access1</option>";
	$leve2.="<option value='2' $downloadaccess2>$lang_access2</option>";
	$leve2.="<option value='3' $downloadaccess3>$lang_access3</option>";
}
$listjs=listjs();
$para_list=para_list_with($download_list);
$css_url=$depth."../templates/".$met_skin."/css";
$img_url=$depth."../templates/".$met_skin."/images";
include template('content/download/content');
footer();
# This program is an open source system, commercial use, please consciously to purchase commercial license.
# Copyright (C) MetInfo Co., Ltd. (http://www.metinfo.cn). All rights reserved.
?>
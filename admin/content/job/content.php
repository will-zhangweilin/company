<?php
# MetInfo Enterprise Content Management System 
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.
$depth='../';
require_once $depth.'../login/login_check.php';
require_once $depth.'global.func.php';
$settingse = parse_ini_file($depth.'../../config/job_'.$lang.'.inc.php');
@extract($settingse);
$job_list=$db->get_one("select * from $met_job where id='$id'");
$job_list['position']=str_replace('"', '&#34;', str_replace("'", '&#39;',$job_list['position']));
$job_list1=$db->get_one("SELECT * FROM $met_column where id=$class1 order by no_order");
if($met_member_use){
	$lev=$job_list1[access];
	switch($job_list['access']){
		case '1':$access1="selected";break;
		case '2':$access2="selected";break;
		case '3':$access3="selected";break;
		default:$access0="selected";break;
	}
}
if($job_list[top_ok]==1)$top_ok="checked";
if($job_list[wap_ok]==1)$wap_ok="checked";
if($met_member_use){
	$level="";
	switch(intval($lev)){
		case 0:$level.="<option value='0' $access0>$lang_access0</option>";
		case 1:$level.="<option value='1' $access1>$lang_access1</option>";
		case 2:$level.="<option value='2' $access2>$lang_access2</option>";
		case 3:$level.="<option value='3' $access3>$lang_access3</option>";
	}
}
$term=0;
foreach($column_lang[6] as $key=>$val){
    if($val[lang]!=$lang)$term++;
}
if($action=="add"){
$lang_editinfo=$lang_addinfo;
$job_list[addtime]=$m_now_counter;
$job_list[no_order]=0;
}
$css_url=$depth."../templates/".$met_skin."/css";
$img_url=$depth."../templates/".$met_skin."/images";
include template('content/job/content');
footer();
# This program is an open source system, commercial use, please consciously to purchase commercial license.
# Copyright (C) MetInfo Co., Ltd. (http://www.metinfo.cn). All rights reserved.
?>
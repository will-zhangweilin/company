<?php
# MetInfo Enterprise Content Management System 
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved. 
$depth='../';
require_once $depth.'../login/login_check.php';
require_once $depth.'global.func.php';
$navoks[3]='ui-btn-active';
	$class2x[$class2]="selected='selected'";
	$class3x[$class3]="selected='selected'";
	$news_list[class2]=$class2;
	$news_list[issue]=$metinfo_admin_name;
	$news_list[hits]=0;
	$news_list[no_order]=0;
	$news_list[addtime]=$m_now_date;
	$news_list[access]=0;
	$lang_editinfo=$lang_addinfo;
	$lev=$met_class[$class1][access];
if($met_member_use){
	$level="";
	switch(intval($lev)){
		case 0:$level.="<option value='0' $access0>$lang_access0</option>";
		case 1:$level.="<option value='1' $access1>$lang_access1</option>";
		case 2:$level.="<option value='2' $access2>$lang_access2</option>";
		case 3:$level.="<option value='3' $access3>$lang_access3</option>";
	}
}
$listjs=listjs();
$css_url=$depth."../templates/".$met_skin."/css";
$img_url=$depth."../templates/".$met_skin."/images";
include template('mobile/add/news_add');
footer();
# This program is an open source system, commercial use, please consciously to purchase commercial license.
# Copyright (C) MetInfo Co., Ltd. (http://www.metinfo.cn). All rights reserved.
?>
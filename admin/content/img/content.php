<?php
# MetInfo Enterprise Content Management System 
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved. 
$depth='../';
require_once $depth.'../login/login_check.php';
require_once $depth.'global.func.php';
if($action=="editor"){
	$img_list=$db->get_one("select * from $met_img where id='$id'");
	$img_list['title']=str_replace('"', '&#34;', str_replace("'", '&#39;',$img_list['title']));
	$img_list['ctitle']=str_replace('"', '&#34;', str_replace("'", '&#39;',$img_list['ctitle']));
	if($met_member_use){
		$lev=$met_class[$img_list['class1']][access];
		switch($img_list['access']){
			case '1':$access1="selected";break;
			case '2':$access2="selected";break;
			case '3':$access3="selected";break;
			default:$access0="selected";break;
		}
	}
	if(!$img_list)metsave('-1',$lang_dataerror,$depth);
	$query = "select * from $met_plist where module='5' and listid='$id'";
	$result = $db->query($query);
	while($list = $db->fetch_array($result)){
		$nowpara="para".$list[paraid];
		$img_list[$nowpara]=$list[info];
		$nowparaname="";
		if($list[imgname]<>"")$nowparaname=$nowpara."name";$img_list[$nowparaname]=$list[imgname];
	}
	$class1=$img_list[class1];
	if($img_list[new_ok]==1)$new_ok="checked";
	if($img_list[com_ok]==1)$com_ok="checked";
	if($img_list[top_ok]==1)$top_ok="checked";
	if($img_list[wap_ok]==1)$wap_ok="checked";
	$class2[$img_list[class2]]="selected";
	$class3[$img_list[class3]]="selected";
	$displaylist='';
	if($img_list['displayimg']!=''){
		$displayimg=explode(',',$img_list['displayimg']);
		for($i=0;$i<count($displayimg);$i++){
			$newdisplay=explode('-',$displayimg[$i]);
			$displaylist[$i]['name']=$newdisplay[0];
			$displaylist[$i]['imgurl']=$newdisplay[1];
		}
	}
	$class2x[$img_list[class2]]="selected='selected'";
	$class3x[$img_list[class3]]="selected='selected'";	
}else{
	$class2x[$class2]="selected='selected'";
	$class3x[$class3]="selected='selected'";
	$img_list[class2]=$class2;
	$img_list[issue]=$metinfo_admin_name;
	$img_list[hits]=0;
	$img_list[no_order]=0;
	$img_list[addtime]=$m_now_date;
	$img_list[access]="0";
	$lang_editinfo=$lang_addinfo;
	$lev=$met_class[$class1][access];
}
	$img_list[contentinfo]=$lang_contentinfo;
	$img_list[contentinfo1]=$lang_contentinfo1;
	$img_list[contentinfo2]=$lang_contentinfo2;
	$img_list[contentinfo3]=$lang_contentinfo3;
	$img_list[contentinfo4]=$lang_contentinfo4;
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
$para_list=para_list_with($img_list);
$imgnum=$displaylist?count($displaylist):0;
$css_url=$depth."../templates/".$met_skin."/css";
$img_url=$depth."../templates/".$met_skin."/images";
include template('content/img/content');
footer();
# This program is an open source system, commercial use, please consciously to purchase commercial license.
# Copyright (C) MetInfo Co., Ltd. (http://www.metinfo.cn). All rights reserved.
?>
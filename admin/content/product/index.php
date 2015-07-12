<?php
# MetInfo Enterprise Content Management System 
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved. 
$depth='../';
require_once $depth.'../login/login_check.php';
$class1_info=$met_class[$class1];	
if(!$class1_info)metsave('-1',$lang_dataerror,$depth);
$serch_sql=" where lang='$lang' and (recycle='0' or recycle='-1') and class1=$class1 ";
if($admincp_ok[admin_issueok]==1)$serch_sql .= " and(issue='$metinfo_admin_name' or issue='') ";
if($class2)$serch_sql .= " and class2=$class2";
if($class3){$serch_sql .= " and class3=$class3"; }
$classnow=$class3?$class3:($class2?$class2:$class1);
$order_sql=list_order($met_class[$classnow][list_order]);
if($search == "detail_search") {			
	if($title)$serch_sql .= " and title like '%$title%' "; 
	if(isset($new) && $new!="all" && $new!="") { $serch_sql .= " and new_ok ='$new' "; }
	if(isset($recommend) && $recommend!="all" && $recommend!="") { $serch_sql .= " and com_ok ='$recommend' "; }
	if(isset($top) && $top!="all" && $top!="") { $serch_sql .= " and top_ok ='$top' "; }
	$total_count = $db->counter($met_product, "$serch_sql", "*");
} else {
	$total_count = $db->counter($met_product, "$serch_sql", "*");
}
require_once 'include/pager.class.php';
$page = (int)$page;
if($page_input){$page=$page_input;}
$list_num = 20;
$rowset = new Pager($total_count,$list_num,$page);
$from_record = $rowset->_offset();
$query = "SELECT * FROM $met_product $serch_sql $order_sql LIMIT $from_record, $list_num";
$result = $db->query($query);
while($list= $db->fetch_array($result)){
	if($met_member_use){
	switch($list['access']){
		case '1':$list['access']=$lang_access1;break;
		case '2':$list['access']=$lang_access2;break;
		case '3':$list['access']=$lang_access3;break;
		default:$list['access']=$lang_access0;break;
	}
	}
	$list[new_ok1] = $list[new_ok] ? $lang_yes : $lang_no;
	$list[com_ok1] = $list[com_ok] ? $lang_yes : $lang_no;
	$list[top_ok1] = $list[top_ok] ? $lang_yes : $lang_no;
	$list[wap_ok1] = $list[wap_ok] ? $lang_yes : $lang_no;
	$list[updatetime] = date('Y-m-d',strtotime($list[updatetime]));
	$num = 38;
	if (preg_match("/[\x7f-\xff]/",$list['title']))$num=20;
	$list['titles']=utf8substr($list['title'],0,$num);
	$product_list[]=$list;
}
$page_list = $rowset->link("index.php?anyid={$anyid}&lang=$lang&class1=$class1&class2=$class2&class3=$class3&search=$search&title=$title&page=");
switch($new){
	case '1':$new1="selected='selected'";break;
	case '0':$new2="selected='selected'";break;
	default:$new0="selected='selected'";break;
}
switch($recommend){
	case '1':$recommend1="selected='selected'";break;
	case '0':$recommend2="selected='selected'";break;
	default:$recommend0="selected='selected'";break;
}
switch($top){
	case '1':$top1="selected='selected'";break;
	case '0':$top2="selected='selected'";break;
	default:$top0="selected='selected'";break;
}
$cengci=$class3?3:($class2?2:1);
$css_url=$depth."../templates/".$met_skin."/css";
$img_url=$depth."../templates/".$met_skin."/images";
include template('content/product/product');
footer();
# This program is an open source system, commercial use, please consciously to purchase commercial license.
# Copyright (C) MetInfo Co., Ltd. (http://www.metinfo.cn). All rights reserved.
?>
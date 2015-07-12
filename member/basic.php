<?php
# MetInfo Enterprise Content Management System 
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.
require_once 'login_check.php';
require_once ROOTPATH.'member/index_member.php';
$admin_list = $db->get_one("SELECT * FROM $met_admin_table WHERE admin_id='$metinfo_member_name' ");
if(!$admin_list){
	session_unset();
	$returnurl="login.php?lang=".$lang;
	header("Location: $returnurl");
	exit();
}
switch($admin_list['usertype']){
	case '1':$access=$lang_memberbasicType1;break;
	case '2':$access=$lang_memberbasicType2;break;
	case '3':$access=$lang_memberbasicType3;break;
	default:$access=$lang_memberbasicType1;break;
}
$feedback_totalcount = $db->counter($met_feedback, " where customerid='$metinfo_member_name' and lang='$lang' ", "*");
$feedback_totalcount_readyes = $db->counter($met_feedback, " where customerid='$metinfo_member_name' and readok='1' and lang='$lang' ", "*");
$feedback_totalcount_readno = $db->counter($met_feedback, " where customerid='$metinfo_member_name' and readok='0' and lang='$lang' ", "*");

$message_totalcount = $db->counter($met_message, " where customerid='$metinfo_member_name' and lang='$lang' ", "*");
$message_totalcount_readyes = $db->counter($met_message, " where customerid='$metinfo_member_name' and readok='1' and lang='$lang' ", "*");
$message_totalcount_readno = $db->counter($met_message, " where customerid='$metinfo_member_name' and readok='0' and lang='$lang' ", "*");

$cv_totalcount = $db->counter($met_cv, " where customerid='$metinfo_member_name' and lang='$lang' ", "*");
$cv_totalcount_readyes = $db->counter($met_cv, " where customerid='$metinfo_member_name' and readok='1' and lang='$lang' ", "*");
$cv_totalcount_readno = $db->counter($met_cv, " where customerid='$metinfo_member_name' and readok='0' and lang='$lang' ", "*");

$mfname='basic';
include template('member');
footermember();

?>
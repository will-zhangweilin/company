<?php

require_once '../include/common.inc.php';
$download=$db->get_one("select * from $met_download where id='$id'");
	if(!$download){
	okinfo('../',$lang_error);
	}
if($type=='para'){
    $metinfodown=$db->get_one("select * from $met_parameter where id='$paraid'");
    $download[downloadaccess]=$metinfodown[access];
	$metinfoparadown=$db->get_one("select * from $met_plist where id='$listid' and module='4'");
	$download[downloadurl]=$metinfoparadown[info];
	}
if(intval($metinfo_member_type)>=intval($download[downloadaccess])){
    header("location:$download[downloadurl]");exit;
	}else{
	session_unset();
$_SESSION['metinfo_member_name']=$metinfo_member_name;
$_SESSION['metinfo_member_pass']=$metinfo_member_pass;
$_SESSION['metinfo_member_type']=$metinfo_member_type;
$_SESSION['metinfo_admin_name']=$metinfo_admin_name;
	okinfo('../member/'.$member_index_url,$lang_downloadaccess);
	}

?>

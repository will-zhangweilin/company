<?php

require_once 'common.inc.php';
if($met_webhtm==0){
$member_login_url="login.php?lang=".$lang;
$member_register_url="register.php?lang=".$lang;
}else{
$member_login_url="login".$met_htmtype;
$member_register_url="register".$met_htmtype;
}
$navurl=($index=='index')?'':'../';
$met_js_ac=" document.body.innerHTML=''; alert('".$lang_access."'); location.href='".$navurl."member/".$member_index_url."&referer='+encodeURIComponent(window.location.href);";
if($met_member_use!=0){
if($metuser=='para'){
if(intval($metinfo_member_type)>=intval($metaccess)){
$listinfo=codetra($listinfo,0);
$met_js_ac='document.write("'.authcode($listinfo, 'DECODE', $met_member_force).'")';
}else{
	$met_js_ac='document.write("'."【<a href='".$navurl."member/$member_login_url'>$lang_login</a>】【<a href='".$navurl."member/$member_register_url'>$lang_register</a>】".'")';
}
}else{
if(intval($metinfo_member_type)>=intval($metaccess)){
    $met_js_ac="";
  }else{
session_unset();
$_SESSION['metinfo_member_name']=$metinfo_member_name;
$_SESSION['metinfo_member_pass']=$metinfo_member_pass;
$_SESSION['metinfo_member_type']=$metinfo_member_type;
$_SESSION['metinfo_admin_name']=$metinfo_admin_name;
  }
}
}
echo $met_js_ac;

?>
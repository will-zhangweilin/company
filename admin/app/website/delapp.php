<?php

$depth='../';
require_once $depth.'../login/login_check.php';
if($met_website==0){
$htmjs=indexhtm();
unlink('../../../index.html');
}
$query="delete from $met_config where name='met_website' and lang='metinfo'";
$db->query($query);
deldir('../website');
$query="delete from $met_app where no=4 and download=1";
$db->query($query);
echo "卸载成功";
if($met_webhtm==0){
	metsave('../app/dlapp/index.php?anyid='.$anyid.'&lang='.$lang,'',$depth);
}
else{
	metsave('../app/dlapp/index.php?anyid='.$anyid.'&lang='.$lang,'',$depth,$htmjs);
}

?>
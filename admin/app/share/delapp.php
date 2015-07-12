<?php

$depth='../';
require_once $depth.'../login/login_check.php';
foreach($met_langok as $key=>$val){
	$query="delete from $met_config where name='met_jiathis_code' and lang='$val[mark]'";
	$db->query($query);
	$query="delete from $met_config where name='met_jiathis_ok' and lang='$val[mark]'";
	$db->query($query);
}
deldir('../share');
$query="delete from $met_app where no=6 and download=1";
$db->query($query);
echo "卸载成功";
metsave('../app/dlapp/index.php?anyid='.$anyid.'&lang='.$lang,'',$depth);


?>
<?php
foreach($met_langok as $key=>$val){
	$query="delete from $met_config where name='met_jiathis_code' and lang='$val[mark]'";
	$db->query($query);
	$query="INSERT INTO $met_config set name='met_jiathis_code',value='',columnid=0,flashid=0,lang='$val[mark]'";
	$db->query($query);
	$query="delete from $met_config where name='met_jiathis_ok' and lang='$val[mark]'";
	$db->query($query);
	$query="INSERT INTO $met_config set name='met_jiathis_ok',value='0',columnid=0,flashid=0,lang='$val[mark]'";
$db->query($query);
}
?>
<?php
$query="select * from $met_config where name='met_file_format'";
$format=$db->get_all($query);
foreach($format as $key=>$val){
	if(stripos($val['value'],'ico')===false){
		$query="update $met_config set value=concat(value,'|ico') where id='$val[id]'";
		$format=$db->query($query);
	}
}
?>
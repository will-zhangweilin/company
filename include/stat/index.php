<?php

require_once '../common.inc.php';
require_once 'global.func.php';
$vsip=$db->get_all("SELECT * FROM {$met_visit_day} order by acctime desc"); 
foreach($vsip as $key=>$val){
	$lc=keytype($val['antepage']);
	if(count($lc)){
		$m_now_date = date('Y-m-d H:i:s',$val['acctime']);
		echo $m_now_date.'<br/>'.$val['antepage'].'<br/>=>'.$lc[0].'<br/><br/>';
	}
}

?>
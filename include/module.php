<?php
require_once 'common.inc.php';
$modulefname[1] = array(0=>'show.php',1=>'show.php',2=>$met_column);
$modulefname[2] = array(0=>'news.php',1=>'shownews.php',2=>$met_news);
$modulefname[3] = array(0=>'product.php',1=>'showproduct.php',2=>$met_product);
$modulefname[4] = array(0=>'download.php',1=>'showdownload.php',2=>$met_download);
$modulefname[5] = array(0=>'img.php',1=>'showimg.php',2=>$met_img);
$modulefname[6] = array(0=>'job.php',1=>'showjob.php',2=>$met_job);
$modulefname[8] = array(0=>'feedback.php',1=>'feedback.php',2=>$met_column);
$modulefname[100] = array(0=>'product.php',1=>'showproduct.php',2=>$met_product);
$modulefname[101] = array(0=>'product.php',1=>'showproduct.php',2=>$met_product);
if(isset($metid) && $met_pseudo){
	/*if(is_numeric($metid)){
		if($list){
		}else{
			$modulelang=$lang?$lang:$met_index_type;	
			$numerok = $db->get_one("SELECT * FROM $met_column WHERE foldername='$filpy' and (bigclass='0' or releclass!='0') and module<100 and lang='$modulelang'");
		}
	}else{
		$dname = is_numeric($metid)?"id=$metid":"filename='$metid'";
	}*/
	$dname = is_numeric($metid)?"id=$metid":"filename='$metid'";
	if($list){/*禁止纯数字*/
		$anyone = $db->get_one("SELECT * FROM $met_column WHERE $dname and lang ='$lang'");	
		if(!is_array($anyone)){
			$metids=explode('-',$metid);
			$metidcount=count($metids)-1;
			$page=$metids[$metidcount];
			$metid='';
			foreach($metids as $keymetid=>$valmetid){
				if($keymetid!=$metidcount){
					$metid.=$valmetid.'-';
				}
			}
			if(!$metid||!$page){okinfo('../404.html');exit();}
			$metid=rtrim($metid,'-');
			$dname = is_numeric($metid)?"id=$metid":"filename='$metid'";
			$anyone = $db->get_one("SELECT * FROM $met_column WHERE $dname and lang ='$lang'");
		}
		if(!is_array($anyone) && is_numeric($metid)){
			$dname = "filename='$metid'";
			$anyone = $db->get_one("SELECT * FROM $met_column WHERE $dname and lang ='$lang'");
		}
		if(!is_array($anyone)){okinfo('../404.html');exit();}
		if($anyone['releclass']){
			$class1=$metid;
		}
		else{
			if($anyone['classtype']==1)$class1= $anyone['id'];
			if($anyone['classtype']==2)$class2= $anyone['id'];
			if($anyone['classtype']==3)$class3= $anyone['id'];
		
		}
		$mdle = $anyone['module'];
		$mdtp = '0';
		$lang = $anyone['lang'];
	}else{
		$anybody = $db->get_one("SELECT * FROM $met_column WHERE foldername='$filpy' and lang='$lang'");
		$danmy = $modulefname[$anybody['module']][2];
		if($anybody['module']==8)$metid=$anybody['id'];
		$anyone = $db->get_one("SELECT * FROM $danmy WHERE $dname and lang ='$lang'");
		if(!$anyone && is_numeric($metid)){
			$dname = "filename='$metid'";
			$anyone = $db->get_one("SELECT * FROM $danmy WHERE $dname and lang ='$lang'");
		}
		$mdtp = '1';
		$id = $anybody['module']==8?$anybody['id']:$anyone['id'];
		$mdle = $anybody['module'];
	}
}else{
	$modulelang=$lang?$lang:$met_index_type;
	$query="SELECT * FROM $met_column WHERE foldername='$filpy' and (bigclass='0' or releclass!='0') and module<100 and lang='$modulelang'";
	$anyone = $db->get_one($query);	
	$class1 = $anyone['id'];
	/*简介只做栏目，当直接访问地址的时候，直接跳转到下级栏目*/
	if(!$anyone['isshow'] && $anyone['module'] == 1){
		$anytwo = $db->get_one("SELECT * FROM $met_column WHERE bigclass='$class1' and lang='$modulelang' order by no_order");
		if($anytwo['module']!=1){
			$countlang = count($met_langok);
			if($met_index_type==$lang)$countlang=1;
			$jumpurl="../$anytwo[foldername]/";
			if($anytwo['module']==100||$anytwo['module']==101){
				$jumpurl.="$anytwo[foldername].php?lang=$lang";
			}
			else{
				if($countlang>1){
					$jumpurl.="index.php?lang=$lang";
				}
			}
			header("Location:$jumpurl");
			exit();
		}
		$id = $anytwo['id'];
		$lang = $anytwo['lang'];
		$class1 = 0;
		if(!$anytwo['isshow']&& $anytwo['module'] == 1){
			$anysry = $db->get_one("SELECT * FROM $met_column WHERE bigclass='$id' and lang='$modulelang' order by no_order");
			if($anytwo['module']!=1){
				$countlang = count($met_langok);
				if($met_index_type==$lang)$countlang=1;
				$jumpurl="../$anytwo[foldername]/";
				if($anytwo['module']==100||$anytwo['module']==101){
					$jumpurl.="$anytwo[foldername].php?lang=$lang";
				}
				else{
					if($countlang>1){
						$jumpurl.="index.php?lang=$lang";
					}
				}
				header("Location:$jumpurl");
				exit();
			}
			$id = $anysry['id'];
		}
	}
	$mdle = $anyone['module'];
	$mdtp = '0';
}
if($fmodule!=7){
	if($mdle==100)$mdle=3;
	if($mdle==101)$mdle=5;
	$module = $modulefname[$mdle][$mdtp];
	if($module==NULL){okinfo('../404.html');exit();}
	if($mdle==2||$mdle==3||$mdle==4||$mdle==5||$mdle==6){
		if($fmodule==$mdle){
			$module = $modulefname[$mdle][$mdtp];
		}
		else{
			okinfo('../404.html');exit();
		}
	}
	else{
		if($list){
			okinfo('../404.html');exit();
		}
		else{
			$module = $modulefname[$mdle][$mdtp];
		}
	}
	if($mdle==8){
	if(!$id)$id=$class1;
	$module = '../feedback/index.php';
	}
}
?>
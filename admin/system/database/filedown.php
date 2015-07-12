<?php
# MetInfo Enterprise Content Management System 
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved. 
$depth='../';
require_once $depth.'../login/login_check.php';
require_once 'global.func.php';
$rurls='../system/database/filedown.php?anyid='.$anyid.'&cs=5&lang='.$lang;
if($action=='delete'){
    if(is_array($filenames)) {
        foreach($filenames as $filename){
            if(fileext($filename)=='sql'){
				if(substr_count(trim($filename),'../'))die('met2');
                @unlink('../databack/'.$filename);
            }
        }
    }else{
	if(substr_count(trim($filenames),'../'))die('met2');
        if(fileext($filenames)=='sql'){
		$filenamearray=explode(".sql",$filenames);
            @unlink('../../databack/'.$filenames);
			@unlink('../../databack/sql/metinfo_'.$filenamearray[0].".zip");
        }else{
		    @unlink('../../databack/'.$fileon.'/'.$filenames);
		}
    }
	metsave($rurls,'',$depth);
}else{
/*sql*/
		 $sqlfiles = glob('../../databack/sql/*.zip');
		 if(is_array($sqlfiles)){
			 $prepre = '';
			 $info = $infos = array();
			 foreach($sqlfiles as $id=>$sqlfile){
				 preg_match("/([a-z0-9_]+_[0-9]{8}_[0-9a-z]{4}_)([0-9]+)\.zip/i",basename($sqlfile),$num);
				 $info['filename'] = basename($sqlfile);
				 $info['filesize'] = round(filesize($sqlfile)/(1024*1024), 2);
				 $info['maketime'] = date('Y-m-d H:i:s', filemtime($sqlfile));
				 $info['pre'] = $num[1];
				 $info['number'] = $num[2];
				 if(!$id) $prebgcolor = '#E4EDF9';
				 if($info['pre'] == $prepre)
				 {
					 $info['bgcolor'] = $prebgcolor;
				 }
				 else
				 {
					 $info['bgcolor'] = $prebgcolor == '#E4EDF9' ? '#F1F3F5' : '#E4EDF9';
				 }
				 $prebgcolor = $info['bgcolor'];
				 $prepre = $info['pre'];
				 $info['typename']=$lang_database;
				 $info['type']='sql';
				 $infosql[] = $info;
				 $metinfodata[]=$info;
			 }
		 }
/*config*/
		 $sqlfiles = glob('../../databack/config/*.zip');
		 if(is_array($sqlfiles))
		 {
			 $prepre = '';
			 $info = $infos = array();
			 foreach($sqlfiles as $id=>$sqlfile)
			 {
				 preg_match("/([a-z0-9_]+_[0-9]{8}_[0-9a-z]{4}_)([0-9]+)\.zip/i",basename($sqlfile),$num);
				 $info['filename'] = basename($sqlfile);
				 $info['filesize'] = round(filesize($sqlfile)/(1024*1024), 2);
				 $info['maketime'] = date('Y-m-d H:i:s', filemtime($sqlfile));
				 $info['pre'] = $num[1];
				 $info['number'] = $num[2];
				 if(!$id) $prebgcolor = '#E4EDF9';
				 if($info['pre'] == $prepre)
				 {
					 $info['bgcolor'] = $prebgcolor;
				 }
				 else
				 {
					 $info['bgcolor'] = $prebgcolor == '#E4EDF9' ? '#F1F3F5' : '#E4EDF9';
				 }
				 $prebgcolor = $info['bgcolor'];
				 $prepre = $info['pre'];
				 $info['typename']=$lang_physicalfile4;
				 $info['type']='config';
				 $infoconfig[] = $info;
				 $metinfodata[]=$info;
			 }
		 }
/*upload*/
		 $sqlfiles = glob('../../databack/upload/*.zip');
		 if(is_array($sqlfiles))
		 {
			 $prepre = '';
			 $info = $infos = array();
			 foreach($sqlfiles as $id=>$sqlfile)
			 {
				 preg_match("/([a-z0-9_]+_[0-9]{8}_[0-9a-z]{4}_)([0-9]+)\.zip/i",basename($sqlfile),$num);
				 $info['filename'] = basename($sqlfile);
				 $info['filesize'] = round(filesize($sqlfile)/(1024*1024), 2);
				 $info['maketime'] = date('Y-m-d H:i:s', filemtime($sqlfile));
				 $info['pre'] = $num[1];
				 $info['number'] = $num[2];
				 if(!$id) $prebgcolor = '#E4EDF9';
				 if($info['pre'] == $prepre)
				 {
					 $info['bgcolor'] = $prebgcolor;
				 }
				 else
				 {
					 $info['bgcolor'] = $prebgcolor == '#E4EDF9' ? '#F1F3F5' : '#E4EDF9';
				 }
				 $prebgcolor = $info['bgcolor'];
				 $prepre = $info['pre'];
				 $info['typename']=$lang_uploadfile;
				 $info['type']='upload';
				 $infoupload[] = $info;
				 $metinfodata[]=$info;
			 }
		 }
/*all files*/
		 $sqlfiles = glob('../../databack/web/*.zip');
		 if(is_array($sqlfiles))
		 {
			 $prepre = '';
			 $info = $infos = array();
			 foreach($sqlfiles as $id=>$sqlfile)
			 {
				 preg_match("/([a-z0-9_]+_[0-9]{8}_[0-9a-z]{4}_)([0-9]+)\.zip/i",basename($sqlfile),$num);
				 $info['filename'] = basename($sqlfile);
				 $info['filesize'] = round(filesize($sqlfile)/(1024*1024), 2);
				 $info['maketime'] = date('Y-m-d H:i:s', filemtime($sqlfile));
				 $info['pre'] = $num[1];
				 $info['number'] = $num[2];
				 if(!$id) $prebgcolor = '#E4EDF9';
				 if($info['pre'] == $prepre)
				 {
					 $info['bgcolor'] = $prebgcolor;
				 }
				 else
				 {
					 $info['bgcolor'] = $prebgcolor == '#E4EDF9' ? '#F1F3F5' : '#E4EDF9';
				 }
				 $prebgcolor = $info['bgcolor'];
				 $prepre = $info['pre'];
				 $info['typename']=$lang_webcompre;
				 $info['type']='web';
				 $infoweb[] = $info;
				 $metinfodata[]=$info;
			 }
		 }
foreach($metinfodata as $key=>$val){
	$val['time']=strtotime($val['maketime']);
	$metinfodata1[]=$val;
}
function array_sort($arr,$keys,$type='asc'){ 
	$keysvalue = $new_array = array();
	foreach ($arr as $k=>$v){
		$keysvalue[$k] = $v[$keys];
	}
	if($type == 'asc'){
		asort($keysvalue);
	}else{
		arsort($keysvalue);
	}
	reset($keysvalue);
	foreach ($keysvalue as $k=>$v){
		$new_array[$k] = $arr[$k];
	}
	return $new_array; 
} 
$metinfodata=array_sort($metinfodata1,'time','we');
$listclass[6]='class="now"';
$css_url=$depth."../templates/".$met_skin."/css";
$img_url=$depth."../templates/".$met_skin."/images";
include_once template('system/database/filedown');footer();
}
# This program is an open source system, commercial use, please consciously to purchase commercial license.
# Copyright (C) MetInfo Co., Ltd. (http://www.metinfo.cn). All rights reserved.
?>
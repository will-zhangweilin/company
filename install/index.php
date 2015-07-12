<?php

header("Content-type: text/html;charset=utf-8");
error_reporting(E_ERROR | E_WARNING | E_PARSE);
@set_time_limit(0);
set_magic_quotes_runtime(0);
define('VERSION','5.1.1');
if(PHP_VERSION < '4.1.0') {
	$_GET         = &$HTTP_GET_VARS;
	$_POST        = &$HTTP_POST_VARS;
	$_COOKIE      = &$HTTP_COOKIE_VARS;
	$_SERVER      = &$HTTP_SERVER_VARS;
	$_ENV         = &$HTTP_ENV_VARS;
	$_FILES       = &$HTTP_POST_FILES;
}
function randStr($i){
  $str = "abcdefghijklmnopqrstuvwxyz";
  $finalStr = "";
  for($j=0;$j<$i;$j++)
  {
    $finalStr .= substr($str,mt_rand(0,25),1);
  }
  return $finalStr;
}
define('MAGIC_QUOTES_GPC', get_magic_quotes_gpc());
isset($_REQUEST['GLOBALS']) && exit('Access Error');
foreach(array('_COOKIE', '_POST', '_GET') as $_request) {
	foreach($$_request as $_key => $_value) {
		$_key{0} != '_' && $$_key = daddslashes($_value);
	}
}
$m_now_time     = time();
$m_now_date     = date('Y-m-d H:i:s',$m_now_time);
$nowyear    = date('Y',$m_now_time);
$localurl="http://";
$localurl.=$_SERVER['HTTP_HOST'].$_SERVER["PHP_SELF"];
$install_url=$localurl;
if(file_exists('../config/install.lock')){
	exit('对不起，该程序已经安装过了。<br/>
	      如您要重新安装，请手动删除config/install.lock文件。');
}
switch ($action)
{
	case 'inspect':
	{
		$mysql_support = (function_exists( 'mysql_connect')) ? ON : OFF;
		if(function_exists( 'mysql_connect')){
			$mysql_support  = 'ON';
			$mysql_ver_class ='OK';
		}else {
			$mysql_support  = 'OFF';
			$mysql_ver_class ='WARN';
		}
		if(PHP_VERSION<'5.0.0'){
			$ver_class = 'WARN';
			$errormsg['version']='php 版本过低';
		}else {
			$ver_class = 'OK';
			$check=1;
		}
		$function='OK';
		if(!function_exists('file_put_contents')){
			$function='WARN';
			$fstr.="<li class='WARN'>空间不支持file_put_contents函数，系统无法写文件。</li>";
		}
		if(!function_exists('fsockopen')&&!function_exists('pfsockopen')&&!function_exists('stream_socket_client')){
			$function='WARN';
			$fstr.="<li class='WARN'>空间不支持fsockopen，pfsockopen,stream_socket_client函数，系统邮件功能不能使用。请至少开启其中一个。</li>";
		}
		if(!function_exists('copy')){
			$function='WARN';
			$fstr.="<li class='WARN'>空间不支持copy函数，无法上传文件。</li>";
		}
		if(!function_exists('fsockopen')&&!function_exists('pfsockopen')&&!get_extension_funcs('curl')){
			$function='WARN';
			$fstr.="<li class='WARN'>空间不支持fsockopen，pfsockopen函数，curl模块，系统在线更新，短信发送功能无法使用。请至少开启其中一个。</li>";
		}
		if(!get_extension_funcs('gd')){
			$function='WARN';
			$fstr.="<li class='WARN'>空间不支持gd模块，图片打水印和缩略生成功能无法使用。</li>";
		}
		$w_check=array(
		'../',
		'../about',
		'../download',
		'../product',
		'../news',
		'../img',
		'../job',
		'../search',
		'../sitemap',
		'../link',
		'../member',
		'../wap',
		'../upload',
		'../config',
		'../config/config_db.php',
		'../upload/file',
		'../upload/image',
		'../message',
		'../feedback',
		'../admin/databack',
		);
		$class_chcek=array();
		$check_msg = array();
		$count=count($w_check);
		for($i=0; $i<$count; $i++){
			if(!file_exists($w_check[$i])){
				$check_msg[$i].= '文件或文件夹不存在请上传';$check=0;
				$class_chcek[$i] = 'WARN';
			} elseif(is_writable($w_check[$i])){
				$check_msg[$i].= '通 过';
				$class_chcek[$i] = 'OK';
				$check=1;
			} else{
				$check_msg[$i].='777属性检测不通过'; $check=0;
				$class_chcek[$i] = 'WARN';
			}
			if($check!=1 and $disabled!='disabled'){$disabled = 'disabled';}
		}
		include template('inspect');
		break;
	}
	case 'db_setup':
	{
		if($setup==1){
			$db_prefix      = trim(strip_tags($db_prefix));
			$db_host        = trim(strip_tags($db_host));
			$db_username    = trim(strip_tags($db_username));
			$db_pass        = trim(strip_tags($db_pass));
			$db_name        = trim(strip_tags($db_name));
			$config="<?php
                   /*
                   con_db_host = \"$db_host\"
                   con_db_id   = \"$db_username\"
                   con_db_pass	= \"$db_pass\"
                   con_db_name = \"$db_name\"
                   tablepre    =  \"$db_prefix\"
                   db_charset  =  \"utf8\";
                  */
                  ?>";

			$fp=fopen("../config/config_db.php",'w+');
			fputs($fp,$config);
			fclose($fp);
			$db = mysql_connect($db_host,$db_username,$db_pass) or die('连接数据库失败: ' . mysql_error());
			if(!@mysql_select_db($db_name)){
				mysql_query("CREATE DATABASE $db_name ") or die('创建数据库失败'.mysql_error());
			}
			mysql_select_db($db_name);
			//
			if(mysql_get_server_info()>='4.1'){
				mysql_query("set names utf8"); 
				$content=readover("sql.sql");
			}else {
				echo "<SCRIPT language=JavaScript>alert('您的mysql版本过低，请确保你的数据库编码为utf-8,官方建议您升级到mysql4.1.0以上');</SCRIPT>";
				die();
				$content=readover("sql.sql");
				$content=str_replace('ENGINE=MyISAM DEFAULT CHARSET=utf8','TYPE=MyISAM',$content);
			}
			if($cndata=="yes" or ($cndata<>"yes" and $endata<>"yes")){
				$content.=readover("cn_config.sql");
            }			
		    if($endata=="yes"){
				$content.=readover("en_config.sql");
            }	
			if($showdata=='yes'){
				if($cndata=="yes" or ($cndata<>"yes" and $endata<>"yes"))$content.=readover("cn.sql");
				if($endata=="yes")$content.=readover("en.sql"); 
			}			
			$content=preg_replace("/{#(.+?)}/eis",'$lang[\\1]',$content);	
			$installinfo=creat_table($content);		
			header("location:index.php?action=adminsetup&cndata={$cndata}&endata={$endata}");exit;
		}else {
			include template('databasesetup');
		}
		break;
	}
	case 'adminsetup':
	{
		if($setup==1){
			if($regname=='' || $regpwd=='' || $email==''){
				echo("<script type='text/javascript'> alert('请填写管理员信息！'); history.go(-1); </script>");
			}
			$regname = trim(strip_tags($regname));
			$regpwd  = md5(trim(strip_tags($regpwd)));
			$email   = trim(strip_tags($email));
		    $m_now_time = time();
			$config = parse_ini_file('../config/config_db.php','ture');
			@extract($config);
			$link = mysql_connect($con_db_host,$con_db_id,$con_db_pass) or die('连接数据库失败: ' . mysql_error());
			mysql_select_db($con_db_name);
			if(mysql_get_server_info()>4.1){
			 mysql_query("set names utf8"); 
			}
			if(mysql_get_server_info()>'5.0.1'){
			 mysql_query("SET sql_mode=''",$link);
			}
			$met_admin_table = "{$tablepre}admin_table";
			$met_config      = "{$tablepre}config";
			$met_index       = "{$tablepre}index";
			$met_column      = "{$tablepre}column";
			 $query = " INSERT INTO $met_admin_table set
                      admin_id           = '$regname',
                      admin_pass         = '$regpwd',
					  admin_introduction = '创始人',
					  admin_group        = '10000',
				      admin_type         = 'metinfo',
					  admin_email        = '$email',
					  admin_mobile       = '$tel',
					  admin_register_date= '$m_now_date',
					  usertype        	 = '3',
					  admin_ok           = '1'";
			mysql_query($query) or die('写入数据库失败: ' . mysql_error());
			$query = " UPDATE $met_config set value='$webname_cn' where name='met_webname' and lang='cn'";
			mysql_query($query) or die('写入数据库失败: ' . mysql_error());
			$query = " UPDATE $met_config set value='$webkeywords_cn' where name='met_keywords' and lang='cn'";
			mysql_query($query) or die('写入数据库失败: ' . mysql_error());
			$query = " UPDATE $met_config set value='$webname_en' where name='met_webname' and lang='en'";
			mysql_query($query) or die('写入数据库失败: ' . mysql_error());
			$query = " UPDATE $met_config set value='$webkeywords_en' where name='met_keywords' and lang='en'";
			mysql_query($query) or die('写入数据库失败: ' . mysql_error());
			$force =randStr(7);
			$query = " UPDATE $met_config set value='$force' where name='met_member_force'";
			mysql_query($query) or die('写入数据库失败: ' . mysql_error());
			$install_url=str_replace("install/index.php","",$install_url);
			$query = " UPDATE $met_config set value='$install_url' where name='met_weburl'";
			mysql_query($query) or die('写入数据库失败: ' . mysql_error());
			$adminurl=$install_url.'admin/';
			$query = " UPDATE $met_column set out_url='$adminurl' where module='0'";
			mysql_query($query) or die('写入数据库失败: ' . mysql_error());
			if($cndata=="yes"&&$endata=="yes"){
				$query = "UPDATE $met_config set value='$lang_index_type' where name='met_index_type' and lang='metinfo'";
			}
			else{
				if($cndata=="yes" or ($cndata<>"yes" and $endata<>"yes")){
					$query = "UPDATE $met_config set value='cn' where name='met_index_type' and lang='metinfo'";
				}
				else{
					$query = "UPDATE $met_config set value='en' where name='met_index_type' and lang='metinfo'";
				}
			}
			mysql_query($query) or die('写入数据库失败: ' . mysql_error());
			@chmod('../config/config_db.php',0554);
			require_once '../include/mysql_class.php';
			$db = new dbmysql();
			$db->dbconn($con_db_host,$con_db_id,$con_db_pass,$con_db_name);
			$conlist = $db->get_one("SELECT * FROM $met_config WHERE name='met_weburl'");
			$met_weburl=$conlist[value];
			$indexcont = $db->get_one("SELECT * FROM $met_index WHERE lang='cn'");
			if($indexcont){
				$index_content=str_replace("#metinfo#",$met_weburl,$indexcont[content]);
				$query = "update $met_index SET content = '$index_content' where lang='cn'";
				$db->query($query);
			}
			$showlist = $db->get_all("SELECT * FROM $met_column WHERE module='1'");
			if($showlist){
				foreach($showlist as $key=>$val){
					$contentx=str_replace("#metinfo#",$met_weburl,$val[content]);
					$query = "update $met_column SET content = '$contentx' where id='$val[id]'";
					$db->query($query);
				}
			}
			$webname=$webname_cn?$webname_cn:($webname_en?$webname_en:'');
			$webkeywords=$webkeywords_cn?$webkeywords_cn:($webkeywords_en?$webkeywords_en:'');
			$spt = '<script type="text/javascript" src="http://api.metinfo.cn/record_install.php?';
			$spt .= "url=" .$install_url;
			$spt .= "&email=".$email."&installtime=".$m_now_date."&softtype=1";
			$spt .= "&webname=".$webname."&webkeywords=".$webkeywords."&tel=".$tel;
			$spt .= "&version=".VERSION."&php_ver=" .PHP_VERSION. "&mysql_ver=" .mysql_get_server_info()."&browser=".$_SERVER['HTTP_USER_AGENT'].'|'.$se360;
			$spt .= '"></script>';
			echo $spt;
			$fp  = fopen('../config/install.lock', 'w');
			fwrite($fp," ");
			fclose($fp);
			@chmod('../config/install.lock',0554);				
			include template('finished');
		}else {
			$langnum=($cndata=="yes"&&$endata=="yes")?2:1;
			$lang=$langnum==2?'中文':($endata=="yes"&&$cndata<>"yes"?'英文':'中文');
			include template('adminsetup');
		}
		break;
	}
	case 'license':
		include template('license');
	break;
	default:
	{
		include template('index');
	}
}

function creat_table($content) {
	global $installinfo,$db_prefix,$db_setup;
	$sql=explode("\n",$content);
	$query='';
	$j=0;
	foreach($sql as $key => $value){
		$value=trim($value);
		if(!$value || $value[0]=='#') continue;
		if(eregi("\;$",$value)){
			$query.=$value;
			if(eregi("^CREATE",$query)){
				$name=substr($query,13,strpos($query,'(')-13);
				$c_name=str_replace('met_',$db_prefix,$name);
				$i++;
			}
			$query = str_replace('met_',$db_prefix,$query);
			$query = str_replace('metconfig_','met_',$query);
			//echo $query;
			if(!mysql_query($query)){
				$db_setup=0;
				if($j!='0'){
				echo '<li class="WARN">出错：'.mysql_error().'<br/>sql:'.$query.'</li>';
				}
			}else {
			     
				if(eregi("^CREATE",$query)){
					$installinfo=$installinfo.'<li class="OK"><font color="#0000EE">建立数据表'.$i.'</font>'.$c_name.' ... <font color="#0000EE">完成</font></li>';
				}
				$db_setup=1;
			}
			$query='';
		} else{
			$query.=$value;
		}
		$j++;
	}
	return $installinfo;
}
function readover($filename,$method="rb"){
	if($handle=@fopen($filename,$method)){
		flock($handle,LOCK_SH);
		$filedata=@fread($handle,filesize($filename));
		fclose($handle);
	}
	return $filedata;
}
function daddslashes($string, $force = 0) {
	!defined('MAGIC_QUOTES_GPC') && define('MAGIC_QUOTES_GPC', get_magic_quotes_gpc());
	if(!MAGIC_QUOTES_GPC || $force) {
		if(is_array($string)) {
			foreach($string as $key => $val) {
				$string[$key] = daddslashes($val, $force);
			}
		} else {
			$string = addslashes($string);
		}
	}
	return $string;
}
function template($template,$EXT="htm"){
	global $met_skin_user,$skin;
	unset($GLOBALS[con_db_id],$GLOBALS[con_db_pass],$GLOBALS[con_db_name]);
	$path = "templates/$template.$EXT";
	return  $path;
}

?>
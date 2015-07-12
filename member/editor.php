<?php

require_once 'login_check.php';
$admin_list = $db->get_one("SELECT * FROM $met_admin_table WHERE admin_id='$metinfo_member_name' ");
require_once ROOTPATH.'member/index_member.php';
$mfname='editor';
include template('member');
footermember();

?>
<?php
header('Content-Type: text/html; charset=utf-8');
require_once('wpdb.php');
global $vars;


if(@$_GET['action'] =='register') {
	$registered = date('Y-m-d H:i:s');
	$sql = 'UPDATE  `member` set `register`=1 ,`created` ="'.$registered.'",
	device ='.$_POST['device'].' where `id` ='.$_POST['member_id'].';';

	$res = mysql_query($sql);
	$resp = array('status' => 'completed');
	echo json_encode($resp);
}

function update_member() {
$dir    = 'member';
$members = scandir($dir);
echo '<pre>';

$i=0;
foreach ($members as $member) {
	if($member !='.' && $member !='..') {
		$array_member = explode(' ', $member);
		$lastname = explode('.', $array_member[1]);
		$sql = "INSERT INTO `member` (`firstname`, `lastname`, `photo`,`register`,`created`)
		VALUES ('".$array_member[0]."', '".$lastname[0]."', '".$member."', '','');";
		$res = mysql_query($sql);
		echo $sql.'<br/>';
	}

	}
}
function get_member() {
	$sql = "SELECT * from `member` where register =0";
	$res = mysql_query($sql);
    while($rows = mysql_fetch_array($res)) { $_display[] = $rows; }
	return $_display;  
}

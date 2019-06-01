<?php
session_start();
include('connection.php');

$id = $_SESSION['id'];
$type = $_GET['type'];
$date1 = $_GET['date1'];
$stime = $_GET['stime'];
$etime = $_GET['etime'];
$dayNo = $_GET['dayNo'];
$flag = $_GET['flag'];

if($flag == "0"){
	if($_SESSION['ival'] == $_SESSION['cval'])
		header('location: show_schedule.php');
	else
		header('location: show_details.php?date1='.$date1.'&stime='.$stime.'&etime='.$etime.'&dayNo='.$dayNo);
}
else{
	$name = $_GET['name'];
	$lat = $_GET['lat'];
	$lng = $_GET['lng'];

	$_SESSION['ulike'] .= $type.",";
	$_SESSION[$type] = $name;
	$_SESSION['lat'][$_SESSION['index']] = $lat;
	$_SESSION['lng'][$_SESSION['index']] = $lng;
	$_SESSION['index'] = $_SESSION['index'] + 1;

	if($_SESSION['ival'] == $_SESSION['cval'])
	header('location: show_schedule.php');
	else
	header('location: show_details.php?date1='.$date1.'&stime='.$stime.'&etime='.$etime.'&dayNo='.$dayNo);
}
?>
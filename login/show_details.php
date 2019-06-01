<?php
session_start();
include('connection.php');

$id = $_SESSION['id'];
$date1 = $_GET['date1'];
$stime = $_GET['stime'];
$etime = $_GET['etime'];
$dayNo = $_GET['dayNo'];

$sql1 = "SELECT * FROM schedule1 WHERE userId='$id' AND date1='$date1' AND stime='$stime' AND etime='$etime'";
$result1 = $conn->query($sql1);

if($result1->num_rows > 0){
	$row1 = $result1->fetch_assoc();
	$var1 = $row1['likes'];
	$city = $row1['city'];
	$lstime = $row1['lstime'];
	$letime = $row1['letime'];
	$_SESSION['cval'] = strlen($var1);
	//$_SESSION['ulike'] = $var1;
	$_SESSION['ucity'] = $city;
	$str1 = "";
	
	if($stime>=$lstime || $etime>$lstime || $stime < $lstime){
		for($i=$_SESSION['ival']; $i < strlen($var1); $i++){
			if($var1[$i] != ",")
			$str1 .= $var1[$i];
			else{
				$_SESSION['ival'] = $i+1;
				header('location: getlocation.php?date1='.$date1.'&city='.$city.'&query1='.$str1.'&dayNo='.$dayNo.'&stime='.$stime.'&etime='.$etime);
				break;
			}
		}
	}
	else{
		$msg = "not correct time";
		header('location: home.php?msg='.$msg);
	}
}
?>
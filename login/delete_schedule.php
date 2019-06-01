<?php
session_start();
include('connection.php');

$id = $_SESSION['id'];
$date1 = $_GET['date1'];
$stime = $_GET['stime'];
$etime = $_GET['etime'];
$city = $_GET['city'];
$lat = $_GET['lat'];
$lng = $_GET['lng'];

$sql = "DELETE FROM schedule1 WHERE userId='$id' AND date1='$date1' AND stime='$stime' AND etime='$etime' AND city='$city'";
if($conn->query($sql))
header('location: home.php');
?>
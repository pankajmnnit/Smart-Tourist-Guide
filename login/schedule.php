<?php 
	//error_reporting(0 
	session_start();
	include("connection.php");
	
	$id = $_SESSION['id'];
	$date = $_POST['date'];
	$city = $_POST['city'];
	$stime = $_POST['stime'];
	$etime = $_POST['etime'];
	$dayNo = date('w', strtotime($date));
	$lstime = "9:00";
	$letime = "23:00";
	
	$likes="";
	$habits="";
	for($i=1; $i<=9; $i++){
		$var1 = $_POST['like'.$i];
		if(isset($var1)){
			$likes .= $var1;
			$likes .= ",";
		}
	}
	
    $sql = "INSERT INTO schedule1(userId,day,city,stime,etime,date1,likes,lstime,letime) 
	VALUES('$id','$dayNo','$city','$stime','$etime','$date','$likes','$lstime','$letime')";     
        	
    if(! $conn->query( $sql)) {
        echo 'Could not enter data: ' . $conn->error;
    }
	else{
		header('location:home.php');
	}
    $conn->close();  
?>
<?php 
	//error_reporting(0 
	session_start();
	include("connection.php");
	
	$id = $_SESSION['id'];
	$habits="";
	
	for($i=1; $i<=3; $i++){
		$var1 = $_POST['habit'.$i];
		if(isset($var1)){
			$habits .= $var1;
			$habits .= ",";
		}
	}
	
        $sql = "INSERT INTO habits(userId,habits) VALUES('$id','$habits')";     
        
		
        if(! $conn->query( $sql)) {
            echo 'Could not enter data: ' . $conn->error;
        }
		else{
			header('location:schedule.html');
		}
			
        //header("location: welcome.php");
        $conn->close();  
?>
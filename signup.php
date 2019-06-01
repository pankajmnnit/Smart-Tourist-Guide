<?php 
	//error_reporting(0 
	//session_start();
	include("connection.php");
	
		$name = $_POST['name'];
		$email = $_POST['email'];
		$gen = $_POST['gender'];
        $phone = $_POST['phone'];
        $dob = $_POST['dob'];
        $pass = $_POST['pass'];                             
        $sql = "INSERT INTO registration(name,dob,gender,email,mob,pass) VALUES('$name','$dob','$gen','$email','$phone','$pass')";     
        
		
        if(! $conn->query( $sql)) {
            echo 'Could not enter data: ' . $conn->error;
        }
		else{
			$msg='Congratulations!! you have signed up successfully.';
			$_SESSION['msg']=$msg;
			
			header('location:index.html');
		}
			
        //header("location: welcome.php");
        $conn->close();
    
?>
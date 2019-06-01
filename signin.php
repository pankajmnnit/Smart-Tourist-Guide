
<html>
<div id="loading">
	<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
  <center><img id="loading-image" img src="images/giphy.gif"  class="center"/></center>


<body onload="javascript: getLocation(showPosition)">
<script>
function getLocation() {
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(showPosition);
		} else {
		x.innerHTML = "Geolocation is not supported by this browser.";
		}
	}

	function showPosition(position) {
		x1 = position.coords.latitude; 
		y1 = position.coords.longitude;
		console.log(x1+" "+y1);
		window.location = "login/session_vars.php?lat="+x1+"&lng="+y1;
	}
</script>
</div><script language="javascript" type="text/javascript">
     $(window).load(function() {
     $('#loading').hide();
  });
</script>
</body>
</html>
<?php 
	//error_reporting(0);
	session_start();
	include("connection.php"); 

		// username and password sent from form 
		$email = $_POST['email'];
		$password = $_POST['pass']; 
		$sql = "SELECT * FROM registration WHERE email = '$email' and pass = '$password'";
		$result = $conn->query($sql);   
		if($result->num_rows > 0 ) {
			$row = $result->fetch_assoc();
			$_SESSION['email']=$email;
			$_SESSION['id']=$row['id'];
			//header('location:login/home.php');
		}
		else{
			$message = "Username and/or Password incorrect.\\nTry again.";
			echo "<script type='text/javascript'>alert('$message');";
			echo 'window.location.href = "index.html"</script>';
			//header('location:index.html');
		}
?>
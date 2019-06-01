<?php
session_start();
include('connection.php');

$id = $_SESSION['id'];
$_SESSION['ival'] = 0;
$_SESSION['index'] = 1;
$sql2 = "SELECT * FROM schedule1 where userId='$id'";
$result2 = $conn->query($sql2);

$_SESSION['ulike'] = "";
$_SESSION['likes'] = array();
$_SESSION['lat'] = array();
$_SESSION['lng'] = array();
?>
<html>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	
<!--===============================================================================================-->
	
<head>
<title>home</title>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<!-- Header -->
<div class="header">
  <a href="home.php" class="logo">Smart City Traveller</a>
  <div class="header-right">
    <a class="active" href="home.php">Home</a>
	<a href="signout.php">signout<img src="images/icons/user_ironman.png"/></a>
	<a href="../aboutus/aboutus.html">About us</a>
  </div>
</div>


<!-- Content -->
		<div class="bg-contact3" style="background-image: url('images/home_slider.jpg');">
			<div class="container-contact3 container-fluid">
			<div class="wrap-contact3 container-fluid">
		
<?php
if($result2->num_rows > 0){
	echo "<div class=\"panel-group\">";
	echo "<center><h2  color=\"#ffffff\" style = \"font-size:26px;font-style:bold;\"><font color=\"white\">SMART CITY APP</font></h2></center><br/>";
	while($row = $result2->fetch_assoc()){
		$date1 = $row['date1'];
		$stime = $row['stime'];
		$etime = $row['etime'];
		$dayNo = $row['day'];
		$city = $row['city'];
		$sd = strtotime($date1);
		
		if(strtotime(date('Y-M-D')) > $sd){
			$sql1 = "DELETE FROM schedule1 where userId='$id' AND date1='$date1'";
			if($conn->query($sql1)){
				header('location: home.php');
			}
		}
		else{
		
			echo "<div class=\"panel panel-warning\">
					<div class=\"panel-heading\">
						<div class=\"row\">
							<div class=\"col-md-2\"><h4>Date</h4></div>
							<div class=\"col-md-2\"><h4>Start Time</h4></div>
							<div class=\"col-md-2\"><h4>End Time</h4></div>
							<div class=\"col-md-2\"><h4>City</h4></div>
							<div class=\"col-md-2\"><h4>Show</h4></div>
							<div class=\"col-md-2\"><h4>Option</h4></div>
						</div>
					</div>
					<div class=\"panel-body\">
						<div class=\"row\">
							<div class=\"col-md-2\">".$date1."</div>
							<div class=\"col-md-2\">".$stime."</div>
							<div class=\"col-md-2\">".$etime."</div>
							<div class=\"col-md-2\">".$city."</div>
							<div class=\"col-md-2\"><a href=\"show_details.php?date1=".$date1."&dayNo=".$dayNo."&stime=".$stime."&etime=".$etime."\">Click</a></div>
							<div class=\"col-md-2\"><button class=\"btn btn-success\" onclick=\"delete1('$date1','$stime','$etime','$city')\"><font size=1>Erase</font></button></div>
						</div>
					</div>
				</div>";
		}
	}
	echo "</div>";
}
?>
<br/>
<form class="contact3-form validate-form" name="myForm" onsubmit="return validateForm()" class="login100-form validate-form"  method="POST" action="schedule.html">
	<center><button class="btn btn-danger" type ="submit" name="signin">
		Create New Schedule
	</button></center>
</form>

</div>
</div>
</div>

<div id="dropDownSelect1"></div>

<script>
function delete1(date1, stime, etime, city){
	window.location = "delete_schedule.php?date1="+date1+"&stime="+stime+"&etime="+etime+"&city="+city;
}
</script>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
</body>
</html>
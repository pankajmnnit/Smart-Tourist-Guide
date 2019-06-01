<?php
	include('connection.php');
   session_start();
   $user_check = $_SESSION['login_user'];
   $ses_sql = $conn->query("select id from registration where email = '$user_check'");
   $row = $ses_sql->fetch_assoc();
   $login_session = $row['id'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
      die();
   }
?>
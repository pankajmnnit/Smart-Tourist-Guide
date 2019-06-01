<?php
/*
@author Aman Srivastava
@date 27-03-2019
*/
	$dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
	$dbname = "sctdb";
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);    
    if ($conn->connect_error)
    die("Connection failed: " . $conn->connect_error);
?>
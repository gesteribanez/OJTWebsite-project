<?php
session_start();
require 'auth.php';
include 'dbconnection.php';
$uid=$_SESSION['login_id'];
$mysqli -> autocommit(FALSE);
$location=strtoupper(mysqli_real_escape_string($mysqli,$_POST['location']));

			$mysqli->query("INSERT INTO `tbl_truck_location` ( `location` ) VALUES ('$location')")or die("Error description: " . $mysqli -> error);

mysqli_commit($mysqli);	
?>

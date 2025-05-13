<?php
session_start();
require 'auth.php';
include 'dbconnection.php';
$uid=$_SESSION['login_id'];
$mysqli -> autocommit(FALSE);
$truckid=strtoupper(mysqli_real_escape_string($mysqli,$_POST['truckid']));
$truckdetails=strtoupper(mysqli_real_escape_string($mysqli,$_POST['truckdetails']));
$mysqli->query("INSERT INTO `tbl_truck_details` (`truckid`,`details`) VALUES ('$truckid','$truckdetails')")or die("Error description: " . $mysqli -> error);
mysqli_commit($mysqli);	
?>

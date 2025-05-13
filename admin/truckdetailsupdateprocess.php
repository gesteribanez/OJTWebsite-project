<?php
session_start();
$uid=$_SESSION['login_id'];
include 'dbconnection.php';
$id=strtoupper(mysqli_real_escape_string($mysqli,$_POST['id']));
$truckdetails=mysqli_real_escape_string($mysqli,$_POST['truckdetails']);
		
$mysqli->query("update tbl_truck_details set details = '$truckdetails' where id='$id'")or die("Error description: ". $mysqli -> error);
?>
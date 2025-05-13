<?php
session_start();
$uid=$_SESSION['login_id'];
include 'dbconnection.php';

$id=strtoupper(mysqli_real_escape_string($mysqli,$_POST['id']));
$location=mysqli_real_escape_string($mysqli,$_POST['location']);
		
$mysqli->query("update tbl_truck_location set location='$location' WHERE id = '$id'")or die("Error description: ". $mysqli -> error);
?>
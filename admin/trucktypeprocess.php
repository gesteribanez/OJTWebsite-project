<?php
session_start();
$uid=$_SESSION['login_id'];
include 'dbconnection.php';

$id=strtoupper(mysqli_real_escape_string($mysqli,$_POST['id']));
$type=mysqli_real_escape_string($mysqli,$_POST['type']);
		
$mysqli->query("update tbl_truck_type set truck_type='$type' WHERE id = '$id'")or die("Error description: ". $mysqli -> error);
?>
<?php
session_start();
require 'auth.php';
include 'dbconnection.php';
$uid=$_SESSION['login_id'];
$date = DATE('Y-m-d');
$mysqli -> autocommit(FALSE);
$id=strtoupper(mysqli_real_escape_string($mysqli,$_GET['id']));
$truckdetails=strtoupper(mysqli_real_escape_string($mysqli,$_POST['truckdetails']));
$mysqli->query("update tbl_truck_pictures set deleteby='$uid', deletedt='$date',statid='4' where id='$id' ");
mysqli_commit($mysqli);	
?>

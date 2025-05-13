<?php
session_start();
require 'auth.php';
include 'dbconnection.php';
$uid=$_SESSION['login_id'];
$mysqli -> autocommit(FALSE);
$type=strtoupper(mysqli_real_escape_string($mysqli,$_POST['type']));

$mysqli->query("INSERT INTO `tbl_truck_type` ( `truck_type` ) VALUES ('$type')")or die("Error description: " . $mysqli -> error);

mysqli_commit($mysqli);	
?>

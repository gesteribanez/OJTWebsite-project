<?php
session_start();
require 'auth.php';
include 'dbconnection.php';
$uid=$_SESSION['login_id'];
$mysqli -> autocommit(FALSE);

$datepurchase=strtoupper(mysqli_real_escape_string($mysqli,$_POST['datepurchase']));
$truckcode=strtoupper(mysqli_real_escape_string($mysqli,$_POST['truckcode']));
$truckname=strtoupper(mysqli_real_escape_string($mysqli,$_POST['truckname']));
$truckprice=strtoupper(mysqli_real_escape_string($mysqli,$_POST['truckprice']));
$trucklink=strtoupper(mysqli_real_escape_string($mysqli,$_POST['trucklink']));
$trucktype=strtoupper(mysqli_real_escape_string($mysqli,$_POST['trucktype']));
$truckcolor=strtoupper(mysqli_real_escape_string($mysqli,$_POST['truckcolor']));
$enginemodel=strtoupper(mysqli_real_escape_string($mysqli,$_POST['enginemodel']));
$enginenumber=strtoupper(mysqli_real_escape_string($mysqli,$_POST['enginenumber']));
$chassisnumber=strtoupper(mysqli_real_escape_string($mysqli,$_POST['chassisnumber']));
$serialnumber=strtoupper(mysqli_real_escape_string($mysqli,$_POST['serialnumber']));
$platenumber=strtoupper(mysqli_real_escape_string($mysqli,$_POST['platenumber']));
$yearmodel=strtoupper(mysqli_real_escape_string($mysqli,$_POST['yearmodel']));
$locationid=strtoupper(mysqli_real_escape_string($mysqli,$_POST['locationid']));
$statusid=strtoupper(mysqli_real_escape_string($mysqli,$_POST['statusid']));
$createdt=date('Y-m-d');

			$mysqli->query("INSERT INTO `tbl_trucks` ( `truck_code`, `truck_name`, `truck_price`, `truck_link`,`date_purchase`, `chassis_num`, `engine_num`,  `serial_num`, `engine_model`, `plate_num`, `truck_color`, `year_model`, `locationid`, `statid`, `typeid`, `solddt`, `soldby`, `createddt`, `createdby`, `updatedt`, `updatedby`, `datestamp`) VALUES ('$truckcode', '$truckname', '$truckprice', '$trucklink', '$datepurchase', '$chassisnumber', '$enginenumber', '$serialnumber', '$enginemodel', '$platenumber', '$truckcolor', '$yearmodel', '$locationid', '$statusid', '$trucktype', NULL, NULL, '$createdt', '$uid', NULL, NULL, CURRENT_TIMESTAMP())")or die("Error description: " . $mysqli -> error);

mysqli_commit($mysqli);	
?>

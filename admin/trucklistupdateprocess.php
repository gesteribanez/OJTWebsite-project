<?php
session_start();
$uid=$_SESSION['login_id'];
include 'dbconnection.php';
$id=strtoupper(mysqli_real_escape_string($mysqli,$_POST['id']));
$truckcode=mysqli_real_escape_string($mysqli,$_POST['truckcode']);
$truckname=mysqli_real_escape_string($mysqli,$_POST['truckname']);
$truckprice=mysqli_real_escape_string($mysqli,$_POST['truckprice']);
$trucklink=mysqli_real_escape_string($mysqli,$_POST['trucklink']);
$datepurchase=mysqli_real_escape_string($mysqli,$_POST['datepurchase']);
$chassisnumber=mysqli_real_escape_string($mysqli,$_POST['chassisnumber']);
$enginenumber=mysqli_real_escape_string($mysqli,$_POST['enginenumber']);
$enginemodel=mysqli_real_escape_string($mysqli,$_POST['enginemodel']);
$platenumber=mysqli_real_escape_string($mysqli,$_POST['platenumber']);
$truckcolor=mysqli_real_escape_string($mysqli,$_POST['truckcolor']);
$yearmodel=mysqli_real_escape_string($mysqli,$_POST['yearmodel']);
$locationid=mysqli_real_escape_string($mysqli,$_POST['locationid']);
$statusid=mysqli_real_escape_string($mysqli,$_POST['statusid']);
$typeid=mysqli_real_escape_string($mysqli,$_POST['trucktype']);
$serialnumber=mysqli_real_escape_string($mysqli,$_POST['serialnumber']);
$updatedt=date('Y-m-d');
		
$mysqli->query("update tbl_trucks set truck_code='$truckcode', truck_name ='$truckname' , truck_price = '$truckprice'  , truck_link = '$trucklink' , typeid ='$typeid', date_purchase ='$datepurchase', chassis_num ='$chassisnumber', engine_num ='$enginenumber', serial_num ='$serialnumber', engine_model ='$enginemodel', plate_num ='$platenumber', truck_color ='$truckcolor', year_model ='$yearmodel', statid ='$statusid' , updatedt ='$updatedt', updatedby ='$uid' where id='$id'")or die("Error description: ". $mysqli -> error);
?>
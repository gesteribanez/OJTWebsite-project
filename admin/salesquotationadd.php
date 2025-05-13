<?php
session_start();
require 'auth.php';
include 'dbconnection.php';
$uid=$_SESSION['login_id'];
$mysqli -> autocommit(FALSE);
$datequote=strtoupper(mysqli_real_escape_string($mysqli,$_POST['datequote']));
$snumber=strtoupper(mysqli_real_escape_string($mysqli,$_POST['snumber']));
$cname=strtoupper(mysqli_real_escape_string($mysqli,$_POST['cname']));
$address=strtoupper(mysqli_real_escape_string($mysqli,$_POST['address']));
$mysqli->query("INSERT INTO `tbl_salesquotation` (`sales_quotation_date`,`sales_quotation_num`,`customer_name`,`address`,`statid`,`createdby`,`createdt`,`updatedby`,`updatedt`) VALUES ('$datequote','$snumber','$cname','$address','1','$uid',CURRENT_TIMESTAMP(),'','')")or die("Error description: " . $mysqli -> error);
mysqli_commit($mysqli);	
?>

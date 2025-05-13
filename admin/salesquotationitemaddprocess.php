<?php
session_start();
require 'auth.php';
include 'dbconnection.php';
$uid=$_SESSION['login_id'];
$mysqli -> autocommit(FALSE);
$eid=strtoupper(mysqli_real_escape_string($mysqli,$_POST['eid']));
$item=strtoupper(mysqli_real_escape_string($mysqli,$_POST['item']));
$description=strtoupper(mysqli_real_escape_string($mysqli,$_POST['description']));
$uprice=strtoupper(mysqli_real_escape_string($mysqli,$_POST['uprice']));
$amount=strtoupper(mysqli_real_escape_string($mysqli,$_POST['amount']));
$mysqli->query("INSERT INTO `tbl_salesquotation_details` (`sales_quotation_id`,`item`,`description`,`unit_price`,`amount`) VALUES ('$eid','$item','$description','$uprice','$amount')")or die("Error description: " . $mysqli -> error);
mysqli_commit($mysqli);	
?>

<?php
session_start();
$uid=$_SESSION['login_id'];
include 'dbconnection.php';

			$id=strtoupper(mysqli_real_escape_string($mysqli,$_POST['id']));
			$fname=strtoupper(mysqli_real_escape_string($mysqli,$_POST['fname']));
			$mname=strtoupper(mysqli_real_escape_string($mysqli,$_POST['mname']));
			$lname=strtoupper(mysqli_real_escape_string($mysqli,$_POST['lname']));
			$status=strtoupper(mysqli_real_escape_string($mysqli,$_POST['status']));
			$userlvl=strtoupper(mysqli_real_escape_string($mysqli,$_POST['userlvl']));
			$tdate=date('Y-m-d');


$mysqli->query("update tbl_users set lastname='$lname', firstname='$fname', middlename='$mname', roleid='$userlvl', active='$status', updatedby='$uid', updatedt='$tdate' where id='$id'")or die("Error description: ". $mysqli -> error);



?>
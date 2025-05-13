<?php
session_start();
require 'auth.php';
include 'dbconnection.php';
$uid=$_SESSION['login_id'];
$mysqli -> autocommit(FALSE);
if(!isset($_POST['username']) || !isset($_POST['password']) || !isset($_POST['fname']) || !isset($_POST['mname']) || !isset($_POST['lastname'])){
	if($_POST['username']=='' || $_POST['password']=='' || $_POST['fname']=='' || $_POST['mname']=='' || $_POST['lastname']==''){
			$username=strtoupper(mysqli_real_escape_string($mysqli,$_POST['username']));
			$password=md5(mysqli_real_escape_string($mysqli,$_POST['password']));
			$fname=strtoupper(mysqli_real_escape_string($mysqli,$_POST['fname']));
			$mname=strtoupper(mysqli_real_escape_string($mysqli,$_POST['mname']));
			$lname=strtoupper(mysqli_real_escape_string($mysqli,$_POST['lname']));
			$status=strtoupper(mysqli_real_escape_string($mysqli,$_POST['status']));
			$userlvl=strtoupper(mysqli_real_escape_string($mysqli,$_POST['userlvl']));
			$tdate=date('Y-m-d');

			$mysqli->query("INSERT INTO `tbl_users` ( `username`, `lastname`, `firstname`, `middlename`, `passwordstr`,  `roleid`, `active`, `createdby`, `createdt`, `updatedby`, `updatedt`, `deletedby`, `deletedt`, `lastlogin`) VALUES ( '$username', '$lname', '$fname', '$mname', '$password', '$userlvl', '$status', '$uid','$tdate' , '0', NULL, '0', NULL, NULL)")or die("Error description: " . $mysqli -> error);
	}
	else{
	die('Error: User information must fill-up.');
	}
}else{
	die('Error: User information must fill-up.');
}
mysqli_commit($mysqli);	
?>

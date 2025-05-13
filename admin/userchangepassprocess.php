<?php
session_start();
$uid=$_SESSION['login_id'];
include 'dbconnection.php';

			$id=strtoupper(mysqli_real_escape_string($mysqli,$_POST['id']));
			$cpass=mysqli_real_escape_string($mysqli,$_POST['cpass']);
			$tdate=date('Y-m-d');
			$password=md5($cpass);
            $mysqli->query("update tbl_users set passwordstr='$password', updatedt='$tdate' where id='$id'")or die("Error description: ". $mysqli -> error);



?>
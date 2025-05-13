<?php
session_start();
include 'dbconnection.php';
$uid=$_SESSION['login_id'];
$date = DATE('Y-m-d');
$mysqli -> autocommit(FALSE);
$truckid=strtoupper(mysqli_real_escape_string($mysqli,$_POST['truckid']));
$uploadDir = 'img/upload';
if (!empty($_FILES)) {
 $tmpFile = $_FILES['file']['tmp_name'];
 $filename = $uploadDir.'/'.$_FILES['file']['name'];
 move_uploaded_file($tmpFile,$filename);
}
$mysqli->query("INSERT INTO `tbl_truck_pictures` (`truckid`,`pictures`,`createdby`,`createdt`,`deleteby`,`deletedt`,`statid`) VALUES ('$truckid','$filename','$uid','$date','','','1')")or die("Error description: " . $mysqli -> error);
mysqli_commit($mysqli);	

?>
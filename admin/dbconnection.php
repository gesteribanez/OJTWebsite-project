<?php
$mysqli=new mysqli("localhost","root","","db_kansai");
if($mysqli->connect_errno){
	echo "Failed to connect:(" .$mysqli->connect_errno. ")".$mysqli->connect_error;
}
?>

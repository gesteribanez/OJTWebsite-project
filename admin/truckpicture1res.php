<?php
session_start();
require 'auth.php';
include 'dbconnection.php';
$table = 'tbl_truck_pictures';
$primaryKey = 'id';
$columns = array(
array('db' => 'id', 'dt' => 0 ),
array('db' => 'pictures', 'dt' => 1 ),
array('db' => 'truckid', 'dt' => 2 )
);

// SQL server connection information
include 'dataconfig.php';

require( 'ssp.class.php' );
//for no buttons only
// echo json_encode(
// SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns)

//For custom where queries
//SSP::complex( $_GET, $sql_details, $table, $primaryKey, $columns,null,"id='3'" )
// );

$output= SSP::complex( $_GET, $sql_details, $table, $primaryKey, $columns,null,"statid='1'");
foreach ($output['data'] as $i => $d) {
	$id = $output['data'][$i][0];
	$pid = $output['data'][$i][1];
	$truckid = $output['data'][$i][2];

    $result = $mysqli->query("select * from tbl_trucks where id = '$truckid'");
    $row = mysqli_fetch_assoc($result);
    $output['data'][$i][2] = strtoupper($row['truck_name']);

    $output['data'][$i][1]='<img src="'.$pid.'" height="100px"/>';
	}
echo json_encode(
$output
);

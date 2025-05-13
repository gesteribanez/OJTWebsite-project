<?php
session_start();
require 'auth.php';
include 'dbconnection.php';
$table = 'tbl_truck_details';
$primaryKey = 'id';
$columns = array(
array('db' => 'id', 'dt' => 0 ),
array('db' => 'truckid', 'dt' => 1 ),
array('db' => 'details', 'dt' => 2 )
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

$output= SSP::complex( $_GET, $sql_details, $table, $primaryKey, $columns,null,"");
foreach ($output['data'] as $i => $d) {
	$id = $output['data'][$i][0];
	$truckid = $output['data'][$i][1];
    $result = $mysqli->query("select * from tbl_trucks where id = '$truckid'");
    $row = mysqli_fetch_assoc($result);
    $output['data'][$i][1] = strtoupper($row['truck_name']);
	$output['data'][$i][3]='<button type="button" class="btn btn-alert btn-sm" title="Update " onclick="update('.$id.')"><i class="fal fa-2x fa-pencil"></i></button>';
	}
echo json_encode(
$output
);

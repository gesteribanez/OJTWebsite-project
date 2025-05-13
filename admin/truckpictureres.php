<?php
session_start();
require 'auth.php';
include 'dbconnection.php';
$truckid = $_GET['truckid'];
$table = 'tbl_truck_pictures';
$primaryKey = 'id';
$columns = array(
array('db' => 'id', 'dt' => 0 ),
array('db' => 'pictures', 'dt' => 1 )
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

$output= SSP::complex( $_GET, $sql_details, $table, $primaryKey, $columns,null,"truckid='$truckid' and statid='1'");
foreach ($output['data'] as $i => $d) {
	$id = $output['data'][$i][0];
	$pid = $output['data'][$i][1];
    $output['data'][$i][1]='<img src="'.$pid.'" height="100px"/>';
	$output['data'][$i][2]='<button type="button" class="btn btn-alert btn-sm" title="Remove Image " onclick="delete1('.$id.')"><i class="fal fa-2x fa-trash"></i></button>';
	}
echo json_encode(
$output
);

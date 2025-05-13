<?php
session_start();
require 'auth.php';
include 'dbconnection.php';
$table = 'tbl_truck_location';
$primaryKey = 'id';
$columns = array(
array('db' => 'id', 'dt' => 0 ),
array('db' => 'location', 'dt' => 1 )
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

$output= SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns);
foreach ($output['data'] as $i => $d) {
	$id = $output['data'][$i][0];
	
	$location = $output['data'][$i][0];
	
	$output['data'][$i][2]='<button type="button" class="btn btn-alert btn-sm" title="Update" onclick="update('.$id.')"><i class="fal fa-2x fa-pencil"></i></button>';

}
echo json_encode(
$output
);

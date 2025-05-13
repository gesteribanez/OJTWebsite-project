<?php
session_start();
require 'auth.php';
include 'dbconnection.php';
$table = 'tbl_salesquotation_details';
$primaryKey = 'id';
$columns = array(
array('db' => 'id', 'dt' => 0 ),
array('db' => 'item', 'dt' => 1 ),
array('db' => 'description', 'dt'=> 2),
array('db' => 'unit_price', 'dt'=> 3),
array('db' => 'amount', 'dt'=> 4),
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

$empid=strtoupper(mysqli_real_escape_string($mysqli,$_GET['empid']));
$output= SSP::complex( $_GET, $sql_details, $table, $primaryKey, $columns,null,"sales_quotation_id='$empid'" );
foreach ($output['data'] as $i => $d) {
	$id = $output['data'][$i][0];
	
	//$output['data'][$i][1]='<button type="button" class="btn btn-alert btn-sm" title="Update " onclick="view1('.$id.')"><i class="fal fa-2x fa-arrow-alt-right"></i></button>'.$output['data'][$i][1];
}
echo json_encode(
$output
);

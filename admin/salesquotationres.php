<?php
session_start();
require 'auth.php';
include 'dbconnection.php';
$table = 'tbl_salesquotation';
$primaryKey = 'id';
$columns = array(
array('db' => 'id', 'dt' => 0 ),
array('db' => 'sales_quotation_num', 'dt' => 1 ),
array('db' => 'customer_name', 'dt'=> 2),
array('db' => 'address', 'dt'=> 3),
array('db' => 'sales_quotation_date', 'dt'=> 4),
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
	
	$output['data'][$i][1]='<button type="button" class="btn btn-alert btn-sm" title="Update " onclick="view1('.$id.')"><i class="fal fa-2x fa-arrow-alt-right"></i></button>'.$output['data'][$i][1];
	$output['data'][$i][5]='<button type="button" class="btn btn-alert btn-sm" title="Print " onclick="print('.$id.')"><i class="fal fa-2x fa-print"></i></button>';
}
echo json_encode(
$output
);

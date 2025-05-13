<?php
session_start();
require 'auth.php';
include 'dbconnection.php';
$table = 'tbl_trucks';
$primaryKey = 'id';
$columns = array(
array('db' => 'id', 'dt' => 0 ),
array('db' => 'truck_code', 'dt' => 1 ),
array('db' => 'truck_name', 'dt'=> 2),
array('db' => 'date_purchase', 'dt'=> 3),
array('db' => 'chassis_num', 'dt'=> 4),
array('db' => 'engine_num', 'dt'=> 5),
array('db' => 'serial_num', 'dt'=> 6),
array('db' => 'engine_model', 'dt'=> 7),
array('db' => 'plate_num', 'dt'=> 8),
array('db' => 'truck_color', 'dt'=> 9),
array('db' => 'year_model', 'dt'=> 10),
array('db' => 'locationid', 'dt'=> 11),
array('db' => 'statid', 'dt'=> 12),
array('db' => 'typeid', 'dt'=> 13),
array('db' => 'truck_price', 'dt'=> 15),
array('db' => 'truck_link', 'dt'=> 16),
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
	$locationid = $output['data'][$i][11];
	$statusid = $output['data'][$i][12];
	$typeid = $output['data'][$i][13];
	$datepurchased = $output['data'][$i][3];
	$output['data'][$i][3] = date('Y-m-d',strtotime($datepurchased));
	
	$output['data'][$i][1]='<button type="button" class="btn btn-alert btn-sm" title="Update " onclick="view1('.$id.')"><i class="fal fa-2x fa-arrow-alt-right"></i></button>'.$output['data'][$i][1];
	
	$result = $mysqli -> query("select * from tbl_truck_location where id='$locationid'");
	$row = mysqli_fetch_assoc($result);
	$output['data'][$i][11] = $row['location'];
	
	
	$result = $mysqli -> query("select * from tbl_truck_status where id='$statusid'");
	$row = mysqli_fetch_assoc($result);
	$output['data'][$i][12] = $row['status'];
	
	$result = $mysqli -> query("select * from tbl_truck_type where id='$typeid'");
	$row = mysqli_fetch_assoc($result);
	$output['data'][$i][13] = $row['truck_type'];
	
	$output['data'][$i][14]='<button type="button" class="btn btn-alert btn-sm" title="Update " onclick="update('.$id.')"><i class="fal fa-2x fa-pencil"></i></button>';

}
echo json_encode(
$output
);

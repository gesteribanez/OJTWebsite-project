<?php
session_start();
require 'auth.php';
include 'dbconnection.php';
$table = 'tbl_users';
$primaryKey = 'id';
$columns = array(
array('db' => 'id', 'dt' => 0 ),
array('db' => 'username', 'dt' => 1 ),
array('db' => 'passwordstr', 'dt'=> 2),
array('db' => 'firstname', 'dt'=> 3),
array('db' => 'roleid', 'dt'=> 4),
array('db' => 'active', 'dt'=> 5),
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
	$ulid = $output['data'][$i][5];
	$output['data'][$i][2]='###########';
	
	$result1 = $mysqli->query("select * from tbl_users where id='$id'") or die("user level");
	$row1=mysqli_fetch_assoc($result1);
	$output['data'][$i][3]=$row1['lastname'].', '.$row1['firstname'];
	if($output['data'][$i][4]=='1'){
		$output['data'][$i][4] = 'ACTIVE';
	}else{
		$output['data'][$i][4] = 'INACTIVE';
	}

	$result = $mysqli->query("select * from tbl_userlvl where id='$ulid'") or die("user level");
	$row=mysqli_fetch_assoc($result);
	$output['data'][$i][5]=$row['user_lvl'];
	$output['data'][$i][6]='<button type="button" class="btn btn-alert btn-sm" title="Update " onclick="update('.$id.')"><i class="fal fa-2x fa-pencil"></i></button> <button type="button" class="btn btn-alert btn-sm" title="Update " onclick="changepass('.$id.')"><i class="fal fa-2x fa-lock"></i></button>';

}
echo json_encode(
$output
);

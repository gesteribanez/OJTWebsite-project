<?php
session_start();
include 'dbconnection.php';
$id=strtoupper(mysqli_real_escape_string($mysqli,$_GET['id']));
$result=$mysqli->query("select * from tbl_trucks where id='$id'");
$row=mysqli_fetch_assoc($result);
$tcode = $row['truck_code'];
$tname = $row['truck_name'];
$tprice = $row['truck_price'];
$ttype = $row['typeid'];
$status = $row['statid'];
$datepurchase = date('Y-m-d',strtotime($row['date_purchase']));
$chasis = $row['chassis_num'];
$engine = $row['engine_num'];
$serial = $row['serial_num'];
$model = $row['engine_model'];
$plate = $row['plate_num'];
$tcolor = $row['truck_color'];
$yearmodel = $row['year_model'];
$location = $row['locationid'];

$lresult = $mysqli -> query("select * from tbl_truck_location where id= '$location'");
$lrow = mysqli_fetch_assoc($lresult);
$location = strtoupper($lrow['location']);

$sresult = $mysqli -> query("select * from tbl_truck_status where id='$status'");
$srow = mysqli_fetch_assoc($sresult);
$status = strtoupper($srow['status']);

$tresult = $mysqli -> query("select * from tbl_truck_type where id='$ttype'");
$trow = mysqli_fetch_assoc($tresult);
$ttype = strtoupper($trow['truck_type']);
?>


 <div class="modal fade" id="view_modal" data-backdrop="static" data-keyboard="false"  tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true"><i class="fal fa-times"></i></span>
            	</button>
          </div>
          <div class="modal-body">
          	<div class="row">
          		<div class="col-lg-12">
            	 	<div id="panel-2" class="panel">
                    	<div class="panel-container show">
                            <div class="panel-content p-0">
                                <div class="panel-content">
                                	<div class="form-row">
										<div class="col-lg-9 col-xl-9 col-md-8 col-sm-8">
											<div class="form-row">
	                                            <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                                                    <input type="hidden" name="truckid" id="truckid" value="<?php echo $id ?>" />
                                            		<label class="form-label" for="validationCustom01"><h6><strong>Truck Name: </strong><span class="text-danger"><?php echo $tname ?></span> </h6> </label>
	                                            </div>
											</div>
											<div class="form-row">
	                                            <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                                            		<label class="form-label" for="validationCustom01"><h6><strong>Truck Code: </strong><span class="text-danger"><?php echo $tcode ?></span> </h6></label>
	                                            </div>
											</div>
                                            <div class="form-row">
	                                            <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                                            		<label class="form-label" for="validationCustom01"><h6><strong>Truck Price: </strong><span class="text-danger"><?php echo $tprice ?></span> </h6></label>
	                                            </div>
											</div>
											<div class="form-row">
	                                            <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                                            		<label class="form-label" for="validationCustom01"><h6><strong>Truck Type: </strong><span class="text-danger"><?php echo $ttype ?></span> </h6></label>
	                                            </div>
											</div>
											<div class="form-row">
	                                            <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                                            		<label class="form-label" for="validationCustom01"><h6><strong>Truck Location: </strong><span class="text-danger"><?php echo $location ?></span> </h6></label>
	                                            </div>
											</div>
										</div>
										<div class="col-lg-3 col-xl-3 col-md-4 col-sm-4">
                                			<div class="form-row">
	                                            <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
	                                                <label class="form-label" for="validationCustom01"><h6><strong>Purchased Date: </strong><span class="text-danger"><?php echo $datepurchase ?></span> </h6> </label>
	                                            </div>
											</div>
                                			<div class="form-row">
	                                            <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
	                                                <label class="form-label" for="validationCustom01"><h6><strong>Status: </strong><span class="text-danger"><?php echo $status ?></span> </h6> </label>
	                                            </div>
											</div>
										</div>
									</div>  
									<hr/>
									<div class="form-row">
										<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                                           <table class="table table-sm table-bordered table-hover table-striped w-100">
                                           		<thead>
                                                    <tr align="center">
                                                        <th colspan="8"><strong>Truck Details</strong></th>
                                                    </tr>
                                           			<tr>
                                                        <th>Truck Price</th>
                                           				<th>Chassis No.</th>
                                           				<th>Engine No.</th>
                                           				<th>Engine Model</th>
                                           				<th>Serial No.</th>
                                           				<th>Plate No.</th>
                                           				<th>Truck Color</th>
                                           				<th>Year Model</th>
                                           				<th>Action</th>
                                           			</tr>
                                           		</thead>
                                           		<tbody>
                                           			<tr>
                                                        <td><?php echo strtoupper($tprice) ?></td>              
                                           				<td><?php echo strtoupper($chasis) ?></td>
                                           				<td><?php echo strtoupper($engine) ?></td>
                                           				<td><?php echo strtoupper($model) ?></td>
                                           				<td><?php echo strtoupper($serial) ?></td>
                                           				<td><?php echo strtoupper($plate) ?></td>
                                           				<td><?php echo strtoupper($tcolor) ?></td>
                                           				<td><?php echo strtoupper($yearmodel) ?></td>
                                           				<td></td>
                                           			</tr>
                                           		</tbody>
                                           </table>
										</div>
									</div>
									<hr/>
									<div class="form-row">
										<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                                            <table id="dt-basic-example2" class="table table-bordered  w-100 table-sm ">
                                                <thead>
                                                    <tr>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                    </tr>
                                                </tbody>
                                            </table>
										</div>
									</div>
									<hr/>
									<div class="form-row">
										<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                                            <table id="dt-basic-example3" class="table table-bordered  w-100 table-sm ">
                                                <thead>
                                                    <tr>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                    </tr>
                                                </tbody>
                                            </table>
										</div>
									</div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

          	</div>
          </div>
      </div>
    </div>
</div>
<script>
    
	$(document).ready(function(){ 
		var truckid = document.getElementById('truckid').value;   
        var table1 = $('#dt-basic-example2').DataTable({
            responsive: true,
            order: [[ 0, "desc" ]],
            processing:true,
            searching: false,
            bLengthChange: false,
            scrollY: '200px',
            scrollCollapse: true,
            scroller: true,
            ajax: 'truckdetailsres.php?truckid='+truckid,
            columns: [
                { title: 'ID', visible: false, data: "0" },
                { title: 'Details', data: "1" },
                { title: 'Action', data: "2" },
            ],
            dom:
                "<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'f><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'lB>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            buttons: [{
                extend: '',
                text: 'ADD DETAILS',
                titleAttr: 'Add Document',
                className: 'btn-outline-primary btn-sm mr-1',
                action: function ( e, dt, node, config ) {
                    $.ajax({
                        url:'trucklistdetails.php?truckid='+truckid,
                        data:'',
                        type:'post',
                        success  : function(data) {
                            $("#div_adddesc").html(data);
                            $('#add_itemmodal').modal('show');
                        }
                    });
                }
            }]
        });

    $('#dt-basic-example2 tbody').on('click', 'td.details-control' , function () {
        var tr1 = $(this).closest('tr');
        var row1 = table1.row(tr);
        if ( row1.child.isShown() ) {
            // This row is already open - close it
            row1.child.hide();
            tr1.removeClass('shown');
        }
        else {
            // Open this row
            row1.child(format(row1.data()) ).show();
            tr1.addClass('shown');
        }
    } );
    var table1 = $('#dt-basic-example3').DataTable({
            responsive: true,
            order: [[ 0, "desc" ]],
            processing:true,
            searching: false,
            bLengthChange: false,
            scrollY: '200px',
            scrollCollapse: true,
            scroller: true,
            ajax: 'truckpictureres.php?truckid='+truckid,
            columns: [
                { title: 'ID', visible: false, data: "0" },
                { title: 'Picture', data: "1" },
                { title: 'Action', data: "2" },
            ],
            dom:
                "<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'f><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'lB>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            buttons: [{
                extend: '',
                text: 'ADD PICTURES',
                titleAttr: 'Add Document',
                className: 'btn-outline-primary btn-sm mr-1',
                action: function ( e, dt, node, config ) {
                    $.ajax({
                        url:'trucklistpicture.php?truckid='+truckid,
                        data:'',
                        type:'post',
                        success  : function(data) {
                            $("#div_addpic").html(data);
                            $('#add_picmodal').modal('show');
                        }
                    });
                }
            }]
        });

    $('#dt-basic-example3 tbody').on('click', 'td.details-control' , function () {
        var tr1 = $(this).closest('tr');
        var row1 = table1.row(tr);
        if ( row1.child.isShown() ) {
            // This row is already open - close it
            row1.child.hide();
            tr1.removeClass('shown');
        }
        else {
            // Open this row
            row1.child(format(row1.data()) ).show();
            tr1.addClass('shown');
        }
    } );
});

function delete1(id){
					Swal.fire({
						title: "Are you sure?",
						text: "Do you want to add this details?!",
						type: "warning",
						showCancelButton: true,
						confirmButtonColor: '#3fbbc0',
						confirmButtonText: "Yes, proceed!"
					}).then(function(result){
						if (result.value){
							swal.fire({
								html: '<h4>Loading please wait...</h4>',
								allowOutsideClick: false,
								onBeforeOpen: function onBeforeOpen()
									{ swal.showLoading(); }
							});
							$.ajax({
								type: 'POST',
								url: 'truckpictureremove.php?id='+id,
								data: '',
								contentType: false,
								cache: false,
								processData:false,
								success: function(response){ //console.log(response);
									var result = response;
									var check = response.includes("Error");
									if(response.includes("Error")){
										Swal.fire({
											type: "error",
											title: ""+response,
											showConfirmButton: false,
											timer: 3500
										});
									}else{
										Swal.fire({
											type: "success",
											title: "Truck image remove.",
											showConfirmButton: true,
											allowOutsideClick: false
										});
										$("#dt-basic-example3").DataTable().ajax.reload();
									}
								}
							});
						}
					});
				}
</script>
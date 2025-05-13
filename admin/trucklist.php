<?php
include 'template/header.php';
?>

<main id="js-page-content" role="main" class="page-content">
	<ol class="breadcrumb page-breadcrumb">
		<li class="breadcrumb-item">
			<a href="javascript:void(0);"><?php echo $title; ?></a></li>
		<li class="breadcrumb-item">TRUCK LIST</li>
		<li class="position-absolute pos-top pos-right d-none d-sm-block">
			<span class="js-get-date"></span></li>
	</ol>
	<div class="row">
        <div class="col-sm-6 col-xl-4">
            <div class="p-3 bg-primary-300 rounded overflow-hidden position-relative text-white mb-g">
                <div class="">
                    <h3 class="display-4 d-block l-h-n m-0 fw-500">
                        <?php
                    		$result = $mysqli->query("select count(id) as count from tbl_trucks where statid='1'");
                            $row = mysqli_fetch_assoc($result);
                            echo $row['count'];
                        ?>
                            <small class="m-0 l-h-n">Available Truck</small>
                    </h3>
                </div>
                <i class="fal fa-truck position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n1" style="font-size:6rem"></i>
            </div>
        </div>
        <div class="col-sm-6 col-xl-4">
            <div class="p-3 bg-primary-300 rounded overflow-hidden position-relative text-white mb-g">
                <div class="">
                    <h3 class="display-4 d-block l-h-n m-0 fw-500">
                        <?php
                            $result = $mysqli->query("select count(id) as count from tbl_trucks where statid='3'");
                            $row = mysqli_fetch_assoc($result);
                            echo $row['count'];
                        ?>
                    <small class="m-0 l-h-n">Sold Truck</small>
                    </h3>
                </div>
                <i class="fal fa-truck position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n1" style="font-size:6rem"></i>
            </div>
        </div>
        <div class="col-sm-6 col-xl-4">
            <div class="p-3 bg-primary-300 rounded overflow-hidden position-relative text-white mb-g">
                <div class="">
                    <h3 class="display-4 d-block l-h-n m-0 fw-500">
                        <?php
                            $result = $mysqli->query("select count(id) as count from tbl_trucks where statid='2'");
                            $row = mysqli_fetch_assoc($result);
                            echo $row['count'];
                        ?>
                        <small class="m-0 l-h-n">Trucks Under Repair</small>
                    </h3>
                </div>
                <i class="fal fa-truck position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n1" style="font-size:6rem"></i>
            </div>
        </div>
	</div>
	<div class="row">
		<div class="col-xl-12">
			<div id="panel-1" class="panel">
				<div class="panel-container show">
					<div class="panel-content">
						<!-- datatable start -->
						<table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
							<thead class="bg-primary-600">
								<tr>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<div class="modal fade" id="addmodal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title h4">Add Trucks Information</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">
						<i class="fal fa-times"></i></span>
				</button>
			</div>
			<div class="modal-body">
				<div id="panel-2" class="panel">
					<div class="panel-container show">
						<div class="panel-content p-0">
							<form class="needs-validation" id="addvform">
								<div class="panel-content">
									<div class="form-row">
										<div class="col-md-12 mb-3">
											<label class="form-label" for="validationCustom01">Date Purchase<span class="text-danger"></span> </label>
											<input type="date"   autocomplete="off"class="form-control" name="datepurchase" id="datepurchase" placeholder="Date Purchase" required >
										</div>
									</div>
									<div class="form-row">
										<div class="col-md-12 mb-3">
											<label class="form-label" for="validationCustom01">Truck Code<span class="text-danger"></span> </label>
											<input type="text" class="form-control"  autocomplete="off" name="truckcode" id="truckcode" placeholder="Truck Code" required>
										</div>
									</div>
									<div class="form-row">
										<div class="col-md-12 mb-3">
											<label class="form-label" for="validationCustom01">Truck Facebook Link<span class="text-danger"></span> </label>
											<input type="text" class="form-control"  autocomplete="off" name="trucklink" id="trucklink" placeholder="Truck Facebook Link" required>
										</div>
									</div>
									<div class="form-row">
										<div class="col-md-6 mb-3">
											<label class="form-label" for="validationCustom01">Maker<span class="text-danger"></span> </label>
											<input type="text"   autocomplete="off"class="form-control" name="truckname" id="truckname" placeholder="Maker" required >
										</div>
										<div class="col-md-6 mb-3">
											<label class="form-label" for="validationCustom01">Truck Price<span class="text-danger"></span> </label>
											<input type="text"   autocomplete="off"class="form-control" name="truckprice" id="truckprice" placeholder="Truck Price" required >
										</div>
									</div>
									<div class="form-row">
										<div class="col-md-6 mb-3">
                                            <label class="form-label" for="validationCustom01">Truck Type<span class="text-danger"></span> </label>
											<select name="trucktype" id="trucktype" class="form-control" required="">
												<option value="0"></option>
												<?php
												$result=$mysqli->query("select * from tbl_truck_type");
												while($row=mysqli_fetch_assoc($result)){
												?>
												<option value="<?php echo $row['id'] ?>"><?php echo strtoupper($row['truck_type']) ?></option>
												<?php } ?>
											</select>
										</div>
										
										<div class="col-md-6 mb-3">
											<label class="form-label" for="validationCustom01">Truck Color<span class="text-danger"></span> </label>
											<input type="text"   autocomplete="off"class="form-control" name="truckcolor" id="truckcolor" placeholder="Truck Color" required >
										</div>
									</div>
									<div class="form-row">
										<div class="col-md-6 mb-3">
											<label class="form-label" for="validationCustom01">Engine Model<span class="text-danger"></span> </label>
											<input type="text"   autocomplete="off"class="form-control" name="enginemodel" id="enginemodel" placeholder="Engine Model" required >
										</div>
										<div class="col-md-6 mb-3">
											<label class="form-label" for="validationCustom01">Engine Number<span class="text-danger"></span> </label>
											<input type="text"   autocomplete="off"class="form-control" name="enginenumber" id="enginenumber" placeholder="Engine Number" required >
										</div>
									</div>
									<div class="form-row">
										<div class="col-md-6 mb-3">
											<label class="form-label" for="validationCustom01">Chassis Number<span class="text-danger"></span> </label>
											<input type="text"   autocomplete="off"class="form-control" name="chassisnumber" id="chassisnumber" placeholder="Chassis Number" required >
										</div>
										<div class="col-md-6 mb-3">
											<label class="form-label" for="validationCustom01">Serial Number<span class="text-danger"></span> </label>
											<input type="text"   autocomplete="off"class="form-control" name="serialnumber" id="serialnumber" placeholder="Serial Number" required >
										</div>
									</div>
									<div class="form-row">
										<div class="col-md-6 mb-3">
											<label class="form-label" for="validationCustom01">Plate Number<span class="text-danger"></span> </label>
											<input type="text"   autocomplete="off"class="form-control" name="platenumber" id="platenumber" placeholder="Plate Number" required >
										</div>
										
										<div class="col-md-6 mb-3">
											<label class="form-label" for="validationCustom01">Year Model<span class="text-danger"></span> </label>
											<input type="text"   autocomplete="off"class="form-control" name="yearmodel" id="yearmodel" placeholder="Year Model" required >
										</div>
									</div>
									<div class="form-row">
										<div class="col-md-6 mb-3">
                                            <label class="form-label" for="validationCustom01">Location ID<span class="text-danger"></span> </label>
											<select name="locationid" id="locationid" class="form-control" required="">
												<option value="0"></option>
												<?php
												$result=$mysqli->query("select * from tbl_truck_location");
												while($row=mysqli_fetch_assoc($result)){
												?>
												<option value="<?php echo $row['id'] ?>"><?php echo strtoupper($row['location']) ?></option>
												<?php } ?>
											</select>
										</div>
										<div class="col-md-6 mb-3">
                                            <label class="form-label" for="validationCustom01">Status ID<span class="text-danger"></span> </label>
											<select name="statusid" id="statusid" class="form-control" required="">
												<option value="0"></option>
												<?php
												$result=$mysqli->query("select * from tbl_truck_status");
												while($row=mysqli_fetch_assoc($result)){
												?>
												<option value="<?php echo $row['id'] ?>"><?php echo strtoupper($row['status']) ?></option>
												<?php } ?>
											</select>
										</div>
										
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-primary">Submit form</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
			</div>
		</div>
	</div>
</div>

<div id="uploadimage"></div>
<div id="updatediv"></div>
<div id="updatediv1"></div>
<div id="div_view"></div>
<div id="div_adddesc"></div>
<div id="updatedivd"></div>
<div id="div_addpic"></div>


<?php
include 'template/footer.php';
?>

<script>

	$(document).ready(function() {

		// initialize datatable
		$('#dt-basic-example').dataTable(
		{
			responsive: true,
			lengthChange: false,
			serverSide: true,
			order: [[ 0, "asc" ]],
			ajax: "trucklistres.php",
			columns: [
				{ title: 'ID', data: 0, visible: false },
				{ title: 'TRUCK CODE', data: 1 },
				{ title: 'TRUCK PRICE', data: 15  },
				{ title: 'TRUCK LINK', data: 16 },
				{ title: 'TRUCK MAKER', data: 2  },
				{ title: 'TRUCK TYPE', data: 13  },
				{ title: 'DATE PURCHASED', data: 3  },
				{ title: 'CHASSIS NUMBER', data: 4, visible: false },
				{ title: 'ENGINE NUMBER', data: 5, visible: false  },
				{ title: 'SERIAL NUMBER', data: 6, visible: false  },
				{ title: 'ENGINE MODEL', data: 7, visible: false  },
				{ title: 'PLATE NUMBER', data: 8, visible: false  },
				{ title: 'TRUCK COLOR', data: 9, visible: false  },
				{ title: 'YEAR MODEL', data: 10, visible: false  },
				{ title: 'LOCATION', data: 11  },
				{ title: 'STATUS', data: 12  },
				{ title: 'ACTION', data: 14  }
			],
			dom:

			"<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'f><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'lB>>" +
			"<'row'<'col-sm-12'tr>>" +
			"<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
			buttons: [

				{
					extend: '',
					text: 'ADD TRUCKS INFO',
					titleAttr: 'Add Document',
					className: 'btn-outline-primary btn-sm mr-1',
					action: function ( e, dt, node, config ) {
						$('#addmodal').modal('show');
					}

				}
			]
		});

	});

								 $("#addvform").on('submit', function(e){
							        e.preventDefault();
							        var data = new FormData($('#addvform')[0]);
							        Swal.fire(
				                    {
				                        title: "Are you sure?",
				                        html: "Do you want to continue?",
				                        type: "warning",
				                        showCancelButton: true,
  								        confirmButtonColor: '#3fbbc0',
				                        confirmButtonText: "Yes, proceed!"
				                        
				                    }).then(function(result)
				                    {
				                        if (result.value)
				                        {
				                        	
									        $.ajax({
									            type: 'POST',
									            url: 'trucklistadd.php',
									            data: data,
									            contentType: false,
									            cache: false,
									            processData:false,
									            success: function(response){
									                var result = response;
									            	var check = response.includes("Error");
									                if(response.includes("Error")){
								                		Swal.fire(
															{
																type: "error",
																title: ""+response,
																showConfirmButton: false,
																timer: 3500
															});
													}else{
														Swal.fire(
															{
																type: "success",
																title: "Truck information save.",
																showConfirmButton: true,
																allowOutsideClick: false
															});
														$('#addmodal').modal('hide');
								          				document.getElementById("addvform").reset();
								          				$("#dt-basic-example").DataTable().ajax.reload();
													}
									}
										    });
				                        }
				                    });
								    });
								    
								    
					function update(id){
					$.ajax({
						url:'trucklistupdate.php?id='+id,
						type:'post',
						success  : function(data) {
							$("#updatediv").html(data);
							$('#setup_modal').modal('show');
						}
					});
				}
				
								    
				function updated(id){
					$.ajax({
						url:'truckdetailsupdate.php?id='+id,
						type:'post',
						success  : function(data) {
							$("#updatedivd").html(data);
							$('#setup_modal').modal('show');
						}
					});
				}
				function view1(id){
					$.ajax({
						url:'viewdetails_truck.php?id='+id,
						type:'post',
						success  : function(data) {
							$("#div_view").html(data);
							$('#view_modal').modal('show');
						}
					});
				}
				
</script>

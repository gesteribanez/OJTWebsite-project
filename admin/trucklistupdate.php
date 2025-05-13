<?php
session_start();
include 'dbconnection.php';
$id=$_GET['id'];
$result = $mysqli -> query("select * from tbl_trucks WHERE id= '$id'");
$row = mysqli_fetch_assoc($result);
$truckcode = $row['truck_code'];
$truckname = $row['truck_name'];
$truckprice = $row['truck_price'];
$trucklink = $row['truck_link'];
$truckcolor = $row['truck_color'];
$enginemodel = $row['engine_model'];
$datepurchase= date('Y-m-d',strtotime($row['date_purchase']));
$enginenumber = $row['engine_num'];
$chassisnumber= $row['chassis_num'];
$serialnumber= $row['serial_num'];
$platenumber= $row['plate_num'];
$yearmodel= $row['year_model'];
$typeid = $row['typeid'];
$locationid = $row['locationid'];
$statusid = $row['statid'];
?>
 <div class="modal fade" id="setup_modal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title h4">Edit Truck Information</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true"><i class="fal fa-times"></i></span>
              </button>
          </div>
          <div class="modal-body">
             <div id="panel-2" class="panel">
                    <div class="panel-container show">
                        <div class="panel-content p-0">
                            <form id="addsform" >
								<div class="panel-content">
									<div class="form-row">
										<div class="col-md-12 mb-3">
											<label class="form-label" for="validationCustom01">Date Purchase<span class="text-danger"></span> </label>
											<input type="hidden" autocomplete="off" class="form-control" name="id" id="id" value="<?php echo $id ?>" required >
											<input type="date" autocomplete="off" class="form-control" name="datepurchase" id="datepurchase" placeholder="Date Purchase" value="<?php echo $datepurchase ?>" required >
										</div>
									</div>
									<div class="form-row">
										<div class="col-md-12 mb-3">
											<label class="form-label" for="validationCustom01">Truck Code<span class="text-danger"></span> </label>
											<input type="text" class="form-control"  autocomplete="off" name="truckcode" id="truckcode" placeholder="Truck Code" value="<?php echo $truckcode ?>" required>
										</div>
									</div>
									<div class="form-row">
										<div class="col-md-12 mb-3">
											<label class="form-label" for="validationCustom01">Truck Facebook Link<span class="text-danger"></span> </label>
											<input type="text" class="form-control"  autocomplete="off" name="trucklink" id="trucklink" placeholder="Truck Facebook Link" value="<?php echo $trucklink ?>" required>
										</div>
									</div>
									<div class="form-row">
										<div class="col-md-6 mb-3">
											<label class="form-label" for="validationCustom01">Maker<span class="text-danger"></span> </label>
											<input type="text"   autocomplete="off"class="form-control" name="truckname" id="truckname" placeholder="Maker"  value="<?php echo $truckname ?>" required >
										</div>
										<div class="col-md-6 mb-3">
											<label class="form-label" for="validationCustom01">Truck Price<span class="text-danger"></span> </label>
											<input type="text"   autocomplete="off"class="form-control" name="truckprice" id="truckprice" placeholder="Truck Price"  value="<?php echo $truckprice ?>" required >
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
												<option value="<?php echo $row['id'] ?>" <?php if($typeid == $row['id']){ echo 'selected=""'; } ?>><?php echo strtoupper($row['truck_type']) ?></option>
												<?php } ?>
											</select>
										</div>
										<div class="col-md-6 mb-3">
											<label class="form-label" for="validationCustom01">Truck Color<span class="text-danger"></span> </label>
											<input type="text"   autocomplete="off"class="form-control" name="truckcolor" id="truckcolor" placeholder="Truck Color" value="<?php echo $truckcolor ?>" required >
										</div>
									</div>
									<div class="form-row">
										<div class="col-md-6 mb-3">
											<label class="form-label" for="validationCustom01">Engine Model<span class="text-danger"></span> </label>
											<input type="text"   autocomplete="off"class="form-control" name="enginemodel" id="enginemodel" placeholder="Engine Model" value = "<?php echo $enginemodel ?>" required >
										</div>
										<div class="col-md-6 mb-3">
											<label class="form-label" for="validationCustom01">Engine Number<span class="text-danger"></span> </label>
											<input type="text"   autocomplete="off"class="form-control" name="enginenumber" id="enginenumber" placeholder="Engine Number" value= "<?php echo $enginenumber ?>"required >
										</div>
									</div>
									<div class="form-row">
										<div class="col-md-6 mb-3">
											<label class="form-label" for="validationCustom01">Chassis Number<span class="text-danger"></span> </label>
											<input type="text"   autocomplete="off"class="form-control" name="chassisnumber" id="chassisnumber" placeholder="Chassis Number" value="<?php echo $chassisnumber ?>" required >
										</div>
										<div class="col-md-6 mb-3">
											<label class="form-label" for="validationCustom01">Serial Number<span class="text-danger"></span> </label>
											<input type="text"   autocomplete="off"class="form-control" name="serialnumber" id="serialnumber" placeholder="Serial Number" value="<?php echo $serialnumber ?>"required >
										</div>
									</div>
									<div class="form-row">
										<div class="col-md-6 mb-3">
											<label class="form-label" for="validationCustom01">Plate Number<span class="text-danger"></span> </label>
											<input type="text"   autocomplete="off"class="form-control" name="platenumber" id="platenumber" placeholder="Plate Number" value="<?php echo $platenumber ?>" required >
										</div>
										
										<div class="col-md-6 mb-3">
											<label class="form-label" for="validationCustom01">Year Model<span class="text-danger"></span> </label>
											<input type="text"   autocomplete="off"class="form-control" name="yearmodel" id="yearmodel" placeholder="Year Model" value="<?php echo $yearmodel ?>"required >
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
												<option value="<?php echo $row['id'] ?>" <?php if($locationid == $row['id']){ echo 'selected=""'; } ?>><?php echo strtoupper($row['location']) ?></option>
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
												<option value="<?php echo $row['id'] ?>" <?php if($statusid == $row['id']){ echo 'selected=""'; } ?>><?php echo strtoupper($row['status']) ?></option>
												<?php } ?>
											</select>
										</div>
										
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-primary">Submit Form</button>
								</div>
                            </form>
						</div>
					</div>
				</div>
          </div>
          <div class="modal-footer"></div>
      </div>
    </div>
</div>   

	<link rel="stylesheet" href="js/a/jquery-ui.css" />
	<script src="js/a/jquery-ui.min.js"></script>
	<script>
 		$("#addsform").on('submit', function(e){
			e.preventDefault();
			var data = new FormData($('#addsform')[0]);
			Swal.fire({
				title: "Are you sure?",
				html: "Do you want to continue?",
				type: "warning",
	            showCancelButton: true,
	  			confirmButtonColor: '#3fbbc0',
				confirmButtonText: "Yes, proceed!"
			}).then(function(result){
				if (result.value){
					$.ajax({
						type: 'POST',
						url: 'trucklistupdateprocess.php',
						data: data,
						contentType: false,
						cache: false,
						processData:false,
						success: function(response){
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
									title: "Truck information update.",
									showConfirmButton: true,
									allowOutsideClick: false
								});
								$('#setup_modal').modal('hide');
								document.getElementById("addsform").reset();
								$("#dt-basic-example").DataTable().ajax.reload();
							}
						}
					});
				}
			});
		});
	$(document).ready(function() {
		$(".select").select2({
			dropdownParent: $("#setup_modal")
		});
	});
</script>

	
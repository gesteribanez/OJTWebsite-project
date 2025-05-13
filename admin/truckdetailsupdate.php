<?php
session_start();
include 'dbconnection.php';
$id=$_GET['id'];
$result = $mysqli -> query("select * from tbl_truck_details WHERE id= '$id'");
$row = mysqli_fetch_assoc($result);
$truckdetails = $row['details'];
?>
 <div class="modal fade" id="setup_modal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title h4">Edit Truck Details</h5>
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
											<label class="form-label" for="validationCustom01">Truck Details<span class="text-danger"></span> </label>
											<input type="hidden" autocomplete="off" class="form-control" name="id" id="id" value="<?php echo $id ?>" required >
											<input type="text" autocomplete="off" class="form-control" name="truckdetails" id="truckdetails" placeholder="Truck Details" value="<?php echo $truckdetails ?>" required >
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
						url: 'truckdetailsupdateprocess.php',
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
									title: "Truck details update.",
									showConfirmButton: true,
									allowOutsideClick: false
								});
								$('#setup_modal').modal('hide');
								document.getElementById("addsform").reset();
								$("#dt-basic-example2").DataTable().ajax.reload();
							}
						}
					});
				}
			});
		});
</script>

	
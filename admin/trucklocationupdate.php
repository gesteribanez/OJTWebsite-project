<?php
session_start();
include 'dbconnection.php';
$id=$_GET['id'];
$result = $mysqli -> query("select * from tbl_truck_location WHERE id = '$id'");
$row = mysqli_fetch_assoc($result);
$location = $row['location'];
?>
<div class="modal fade" id="setup_modal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title h4">Edit Truck Location</h5>
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
											<label class="form-label" for="validationCustom01">Truck Location<span class="text-danger"></span> </label>
											<input type="hidden" autocomplete="off" class="form-control" name="id" id="id" value="<?php echo $id ?>" required >
											<input type="text" autocomplete="off"class="form-control" name="location" id="location" placeholder="Truck Location" value="<?php echo $location ?>" required>
										</div>
									</div>
									<div class="panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center">
										<button class="btn btn-primary ml-auto" type="submit">Submit Form</button>
									</div>
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
						url: 'trucklocationprocess.php',
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
									title: "Truck Location update.",
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
</script>

	
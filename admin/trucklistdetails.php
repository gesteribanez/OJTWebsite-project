<?php
session_start();
include 'dbconnection.php';
$id=strtoupper(mysqli_real_escape_string($mysqli,$_GET['truckid']));
?>
<div class="modal fade" id="add_itemmodal" data-backdrop="static" data-keyboard="false"  tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h4">Add Truck Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            	</button>
            </div>
            <form id="addvform1">
                <div class="modal-body">
          	        <div class="row">
          		        <div class="col-lg-12">
            	            <div id="panel-2" class="panel">
                                <div class="panel-container show">
                                    <div class="panel-content p-0">
                                        <div class="panel-content">
                                            <div class="form-row">
                                                <div class="col-md-12 mb-3">
                                                    <label class="form-label" for="validationCustom01">Truck Details<span class="text-danger"></span> </label>
                                                    <input type="hidden" name="truckid" id="truckid" value="<?php echo $id ?>" />
                                                    <input type="text" autocomplete="off" class="form-control" name="truckdetails" id="truckdetails" placeholder="Truck Details" required>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Submit Form</button>
                                        </div>
                                    </div>
                                </div>
          	                </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
$("#addvform1").on('submit', function(e){
	e.preventDefault();
	var data = new FormData($('#addvform1')[0]);
	if(document.getElementById("truckdetails").value.length == 0){
         Swal.fire({
			type: "error",
			title: "Please input truck description!",
			showConfirmButton: false,
			timer: 3500
		});
    }else{
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
				url: 'truckdetailsadd.php',
				data: data,
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
							title: "Truck details update.",
							showConfirmButton: true,
							allowOutsideClick: false
						});
						$('#add_itemmodal').modal('hide');
						document.getElementById("addvform1").reset();
						$("#dt-basic-example2").DataTable().ajax.reload();
					}
				}
			});
		}
		});
	}
});	

</script>
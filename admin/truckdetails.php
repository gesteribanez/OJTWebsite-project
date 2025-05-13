<?php
include 'template/header.php';
?>

<main id="js-page-content" role="main" class="page-content">
	<ol class="breadcrumb page-breadcrumb">
		<li class="breadcrumb-item">
			<a href="javascript:void(0);"><?php echo $title; ?></a></li>
		<li class="breadcrumb-item">TRUCK DETAILS</li>
		<li class="position-absolute pos-top pos-right d-none d-sm-block">
			<span class="js-get-date"></span></li>
	</ol>
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
				<h5 class="modal-title h4">Add Truck Details</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">
						<i class="fal fa-times"></i></span>
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
											<input type="text" autocomplete="off" class="form-control" name="truckdetails" id="truckdetails" placeholder="Truck Details" required>
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
			<div class="modal-footer">
			</div>
		</div>
	</div>
</div>

<div id="uploadimage"></div>
<div id="updatediv"></div>
<div id="updatediv1"></div>


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
			ajax: "truckdetails1res.php",
			columns: [
				{ title: 'ID', data: 0, visible: false },
				{ title: 'TRUCK NAME', data: 1  },
				{ title: 'TRUCK DETAILS', data: 2  },
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
									            url: 'truckdetailsadd.php',
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
						url:'truckdetailsupdate.php?id='+id,
						type:'post',
						success  : function(data) {
							$("#updatediv").html(data);
							$('#setup_modal').modal('show');
						}
					});
				}
</script>

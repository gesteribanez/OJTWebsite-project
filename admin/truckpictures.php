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
<div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title h4">Add User Information</h5>
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
										<div class="col-md-6 mb-3">
											<label class="form-label" for="validationCustom01">Username
												<span class="text-danger"></span> </label>
											<input type="text" class="form-control"  autocomplete="off" name="username" id="username" placeholder="Username" required>
											<input type="hidden" class="form-control" name="action" id="action" value="addmember">
											
										</div>
										
										<div class="col-md-6 mb-3">
											<label class="form-label" for="validationCustom01">Password
												<span class="text-danger"></span> </label>
											<input type="password"   autocomplete="off"class="form-control" name="password" id="password" placeholder="Password" required >
											
										</div>
									</div>
									<div class="form-row">
										<div class="col-md-4 mb-3">
											<label class="form-label" for="validationCustom01">First Name
												<span class="text-danger"></span> </label>
											<input type="text"  autocomplete="off" class="form-control" name="fname" id="fname" placeholder="First Name" required>
											
										</div>
										
										<div class="col-md-4 mb-3">
											<label class="form-label" for="validationCustom01">Middle Name
												<span class="text-danger"></span> </label>
											<input type="text"  autocomplete="off" class="form-control" name="mname" id="mname" placeholder="Middle Name" required>
										
										</div>
										
										<div class="col-md-4 mb-3">
											<label class="form-label" for="validationCustom01">Last Name
												<span class="text-danger"></span> </label>
											<input type="text"  autocomplete="off" class="form-control" name="lname" id="lname" placeholder="Last Name" required>
											
										</div>
									</div>
									
									<div class="form-row">
									
										<div class="col-md-6 mb-3">
											<label class="form-label" for="validationCustom01">User Level
												<span class="text-danger"></span> </label>
											<select class="form-control" name="userlvl" id="userlvl">
												<?php
													$result1=$mysqli->query("select * from tbl_userlvl");
													while ($row=mysqli_fetch_assoc($result1)) {
													?>
																<option value="<?php echo $row['id'] ?>"><?php echo $row['userlvl'] ?></option>
																<?php
												}

													?>
											</select>
										</div>
										
										<div class="col-md-6 mb-3">
											<label class="form-label" for="validationCustom01">User Status
												<span class="text-danger"></span> </label>
											<select class="form-control" name="status" id="status">
												<option value="1">ACTIVE</option>
												<option value="0">INACTIVE</option>
											</select>
										</div>
									</div>
								</div>
								<div class="panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center">
									<button class="btn btn-primary ml-auto" type="submit">Submit Form</button>
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
			ajax: "truckpicture1res.php",
			columns: [
				{ title: 'ID', data: 0 },
				{ title: 'TRUCK ID', data: 2  },
				{ title: 'PICTURES', data: 1 },
			


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
									            url: 'useradd.php',
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
																title: "User information save.",
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
								    
								    
					function update(id)
				{
					$.ajax({
						url:'usersetup.php?id='+id,
						type:'post',
						success  : function(data) {
							$("#updatediv").html(data);
							$('#setup_modal').modal('show');
						}
					});
				}
				
					    
					function changepass(id)
				{
					$.ajax({
						url:'userchangepass.php?id='+id,
						type:'post',
						success  : function(data) {
							$("#updatediv1").html(data);
							$('#setup_modal1').modal('show');
						}
					});
				}

</script>

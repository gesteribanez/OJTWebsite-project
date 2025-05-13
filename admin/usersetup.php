<?php
session_start();
include 'dbconnection.php';
$id=$_GET['id'];
$userresult=$mysqli->query("select * from tbl_users where id='$id'");
$userrow=mysqli_fetch_assoc($userresult);
$userlvl=$userrow['roleid'];
$userstat=$userrow['active'];

?>

 <div class="modal fade" id="setup_modal"  role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title h4">Setup Employee</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true"><i class="fal fa-times"></i></span>
            	</button>
          </div>
          <div class="modal-body">
            	<div id="panel-2" class="panel">
                    <div class="panel-container show">
                        <div class="panel-content p-0">

						<form class="needs-validation" id="addsform">
								<div class="panel-content">
									<div class="form-row">
										<div class="col-md-6 mb-3">
											<label class="form-label" for="validationCustom01">Username
												<span class="text-danger"></span> </label>
											<input type="text" class="form-control"  disabled="disabled" autocomplete="off" name="username" id="username" placeholder="Username" value="<?php echo $userrow['username'] ?>" required>
											<input type="hidden" class="form-control" name="id" id="id" value="<?php echo $userrow['id'] ?>">
											
										</div>
										
										<div class="col-md-6 mb-3">
											<label class="form-label" for="validationCustom01">Password
												<span class="text-danger"></span> </label>
											<input type="password" disabled="disabled"  autocomplete="off"class="form-control" name="password" id="password" placeholder="Password" required >
											
										</div>
									</div>
									<div class="form-row">
										<div class="col-md-4 mb-3">
											<label class="form-label" for="validationCustom01">First Name
												<span class="text-danger"></span> </label>
											<input type="text"  autocomplete="off" class="form-control" name="fname" id="fname" placeholder="First Name" value="<?php echo $userrow['firstname'] ?>" required>
											
										</div>
										
										<div class="col-md-4 mb-3">
											<label class="form-label" for="validationCustom01">Middle Name
												<span class="text-danger"></span> </label>
											<input type="text"  autocomplete="off" class="form-control" name="mname" id="mname" placeholder="Middle Name" required value="<?php echo $userrow['middlename'] ?>">
										
										</div>
										
										<div class="col-md-4 mb-3">
											<label class="form-label" for="validationCustom01">Last Name
												<span class="text-danger"></span> </label>
											<input type="text"  autocomplete="off" class="form-control" name="lname" id="lname" placeholder="Last Name" required value="<?php echo $userrow['lastname'] ?>">
											
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
													<option <?php if($row['id'] == $userlvl) { echo 'selected="selected"'; }  ?> value="<?php echo $row['id'] ?>"><?php echo $row['user_lvl'] ?></option>
												<?php
												}
												?>
											</select>
										</div>
										
										<div class="col-md-6 mb-3">
											<label class="form-label" for="validationCustom01">User Status
												<span class="text-danger"></span> </label>
											<select class="form-control" name="status" id="status">
												<option <?php if($userstat == '1') { echo 'selected="selected"'; }  ?> value="1">ACTIVE</option>
												<option <?php if($userstat == '0') { echo 'selected="selected"'; }  ?> value="0">INACTIVE</option>
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
					url: 'usersetupprocess.php',
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
								title: "User information updated.",
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

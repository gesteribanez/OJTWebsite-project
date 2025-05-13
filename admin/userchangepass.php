<?php
session_start();
include 'dbconnection.php';
$id=$_GET['id'];
$userresult=$mysqli->query("select * from tbl_users where id='$id'");
$userrow=mysqli_fetch_assoc($userresult);
$userlvl=$userrow['roleid'];
$userstat=$userrow['active'];
$allbranches=$userrow['allbranches'];
$branchid=$userrow['branchid'];


?>

 <div class="modal fade" id="setup_modal1"  role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title h4">Change Password Employee</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true"><i class="fal fa-times"></i></span>
            	</button>
          </div>
          <div class="modal-body">
          
            	 <div id="panel-2" class="panel">
                                    <div class="panel-container show">
                                        <div class="panel-content p-0">
                                            <form id="addcform" >
                                                <div class="panel-content">
                                               
									<div class="form-row">
										<div class="col-md-12 mb-12">
											<label class="form-label" for="validationCustom01">New Password
												<span class="text-danger"></span> </label>
											<input type="password"  autocomplete="off" class="form-control" name="cpass" id="cpass" placeholder="New Password" required value="">
											<input type="hidden"  autocomplete="off" class="form-control" name="id" id="id" value="<?php echo $userrow['id'] ?>">
											
										</div>
										
									</div>
									
                                                </div>
                                                
                                                <div class="panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center">
                                                    <button class="btn btn-primary ml-auto" type="submit">Submit form</button>
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
 							 $("#addcform").on('submit', function(e){
							        e.preventDefault();
							        var data = new FormData($('#addcform')[0]);
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
									            url: 'userchangepassprocess.php',
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
																title: "User password update.",
																showConfirmButton: true,
																allowOutsideClick: false
															});
														$('#setup_modal1').modal('hide');
								          				document.getElementById("addsform").reset();
								          				$("#dt-basic-example").DataTable().ajax.reload();
													}
									}
										    });
				                        }
				                    });
								    });
        </script>
        <script>
            $(document).ready(function() {
			  $(".select").select2({
			    dropdownParent: $("#setup_modal")
			  });
			});
        </script>
	
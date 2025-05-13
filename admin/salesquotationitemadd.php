<?php
include 'dbconnection.php';
$id=strtoupper(mysqli_real_escape_string($mysqli,$_GET['empid']));
$result = $mysqli->query("select * from tbl_salesquotation where id ='$id'");
$row = mysqli_fetch_assoc($result);
$edueid = $row['id'];
?>
<div class="modal fade" id="add_itemmodal" tabindex="-1" data-backdrop="false" data-keyboard="false"  role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title h4"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">
						<i class="fal fa-times"></i></span>
				</button>
			</div>
			<div class="modal-body">
				<div id="panel-2" class="panel">
					<div class="panel-container show">
						<div class="panel-content p-0">
							<form id="addveducation">
								<div class="panel-content">
									<div class="form-row">
										<div class="col-md-12 mb-3">
                                            <label class="form-label"><h3>Add Description Info</h3><span class="text-danger"></span> </label>
										</div>
									</div>
									<div class="form-row">
										<div class="col-md-12 mb-3">
                                            <label class="form-label">Item<span class="text-danger"></span> </label>
											<input type="hidden" class="form-control"  autocomplete="off" name="eid" id="eid" value="<?php echo $edueid ?>" required>
											<input type="text" class="form-control"  autocomplete="off" name="item" id="item" placeholder="Item" >
										</div>
									</div>
									<div class="form-row">
										<div class="col-md-12 mb-3">
                                            <label class="form-label">Description<span class="text-danger"></span> </label>
											<input type="text" class="form-control"  autocomplete="off" name="description" id="description" placeholder="Description">
										</div>
									</div>
									<div class="form-row">
										<div class="col-md-12 mb-3">
                                            <label class="form-label">Unit Price<span class="text-danger"></span> </label>
											<input type="text" class="form-control"  autocomplete="off" name="uprice" id="uprice" placeholder="Unit Price" >
										</div>
									</div>
									<div class="form-row">
										<div class="col-md-12 mb-3">
                                            <label class="form-label">Amount<span class="text-danger"></span> </label>
											<input type="text" class="form-control"  autocomplete="off" name="amount" id="amount" placeholder="Amount">
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
<script>
    $("#addveducation").on('submit', function(e){
		e.preventDefault();
		var data = new FormData($('#addveducation')[0]);
		Swal.fire({
			title: "Are you sure?",
			html: "Do you want to continue?",
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
					url: 'salesquotationitemaddprocess.php',
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
								title: "Description information update.",
								showConfirmButton: true,
								allowOutsideClick: false
							});
							$('#setup_modal').modal('hide');
							document.getElementById("addveducation").reset();
							$("#dt-basic-example2").DataTable().ajax.reload();
						}
					}
				});
			}
		});
	});
</script>
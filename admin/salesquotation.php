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
<div class="modal fade" id="addmodal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title h4">Add Sales Quotation Information</h5>
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
											<label class="form-label" for="validationCustom01">Date Quotation<span class="text-danger"></span> </label>
											<input type="date"   autocomplete="off"class="form-control" name="datequote" id="datequote" placeholder="Date Quotation" required >
										</div>
									</div>
									<div class="form-row">
										<div class="col-md-12 mb-3">
											<label class="form-label" for="validationCustom01">Sales Quotation Number<span class="text-danger"></span> </label>
											<input type="text" class="form-control"  autocomplete="off" name="snumber" id="snumber" placeholder="Sales Quotation Number" required>
										</div>
									</div>
									<div class="form-row">
										<div class="col-md-12 mb-3">
											<label class="form-label" for="validationCustom01">Customer Name<span class="text-danger"></span> </label>
											<input type="text" class="form-control"  autocomplete="off" name="cname" id="cname" placeholder="Customer Name" required>
										</div>
									</div>
									<div class="form-row">
										<div class="col-md-12 mb-3">
											<label class="form-label" for="validationCustom01">Address<span class="text-danger"></span> </label>
											<textarea autocomplete="off"class="form-control" name="address" id="address" placeholder="Address" required ></textarea>
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
<div id="div_addeducational"></div>


<?php
include 'template/footer.php';
?>

<script>

	$(document).ready(function() {
		// initialize datatable
		$('#dt-basic-example').dataTable({
			responsive: true,
			lengthChange: false,
			serverSide: true,
			order: [[ 0, "asc" ]],
			ajax: "salesquotationres.php",
			columns: [
				{ title: 'ID', data: 0, visible: false },
				{ title: 'SALES QUOTATION NUMBER', data: 1  },
				{ title: 'CUSTOMER NAME', data: 2 },
				{ title: 'ADDRESS', data: 3  },
				{ title: 'DATE QUOTE', data: 4 },
				{ title: 'ACTION', data: 5 },
			],
			dom:

			"<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'f><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'lB>>" +
			"<'row'<'col-sm-12'tr>>" +
			"<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
			buttons: [{
					extend: '',
					text: 'ADD SALES QUOTATION INFO',
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
									            url: 'salesquotationadd.php',
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
																title: "Sales quotation information save.",
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
								    
				function view1(id){
					$.ajax({
						url:'viewdetails_sales.php?id='+id,
						type:'post',
						success  : function(data) {
							$("#div_view").html(data);
							$('#view_modal').modal('show');
						}
					});
				}
                				    
				function print(id){
                    var url = 'salesquotationprint.php?id='+id; // Replace with your desired URL
                    window.open(url, '_blank');
				}
</script>

<?php
include 'template/header.php';
?>

<main id="js-page-content" role="main" class="page-content">
	<ol class="breadcrumb page-breadcrumb">
		<li class="breadcrumb-item">
			<a href="javascript:void(0);"><?php echo $title; ?></a></li>
		<li class="breadcrumb-item">SETTINGS</li>
		<li class="breadcrumb-item active">USER LEVEL</li>
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
	<div class="modal-dialog modal-dialog-right">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title h4">Add User Level</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">
						<i class="fal fa-times"></i></span>
				</button>
			</div>
			<div class="modal-body">
				<div id="panel-2" class="panel">
					<div class="panel-container show">
						<div class="panel-content p-0">
							<form class="needs-validation" id="addvform" novalidate>
								<div class="panel-content">
									<div class="form-row">
										<div class="col-md-12 mb-3">
											<label class="form-label" for="validationCustom01">User Level
												<span class="text-danger"></span> </label>
											<input type="text" class="form-control"  autocomplete="off" name="userlvl" id="userlevel" placeholder="User Level" required>
											<input type="hidden" class="form-control" name="action" id="action" value="addmember">
											<div class="valid-feedback">
												Looks good!
											</div>
											<div class="invalid-feedback">
												Please enter user level description.
											</div>
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
<div id="uploadview"></div>


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
			order: [[ 1, "asc" ]],
			ajax: "userlevelres.php",
			columns: [
				{ title: 'ID' },
				{ title: 'USER LEVEL DESCRIPTION' },
				{ title: 'ACTION' },


			],
			dom:

			"<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'f><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'lB>>" +
			"<'row'<'col-sm-12'tr>>" +
			"<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
			buttons: [

				{
					extend: '',
					text: 'ADD USER LEVEL',
					titleAttr: 'Add Document',
					className: 'btn-outline-info btn-sm mr-1',
					action: function ( e, dt, node, config ) {
						$('#addmodal').modal('show');
					}

				}
				<?php
				if ($_SESSION['login_userlevel']=='ADMINISTRATOR') {
					?>,
					{
						extend: 'pdfHtml5',
						text: 'PDF',
						titleAttr: 'Generate PDF',
						className: 'btn-outline-danger btn-sm mr-1'
					},
					{
						extend: 'copyHtml5',
						text: 'Copy',
						titleAttr: 'Copy to clipboard',
						className: 'btn-outline-primary btn-sm mr-1'
					}<?php } ?>,
				{
					extend: 'print',
					text: 'Print',
					titleAttr: 'Print Table',
					className: 'btn-outline-primary btn-sm'
				}
			]
		});

	});
	(function() {
		'use strict';
		window.addEventListener('load', function() {
			var forms = document.getElementsByClassName('needs-validation');
			var validation = Array.prototype.filter.call(forms, function(form) {
				form.addEventListener('submit', function(event) {
					if (form.checkValidity() === false) {
						event.preventDefault();
						event.stopPropagation();

					}
					form.classList.add('was-validated');
					$.ajax({
						url: 'adduserlevel.php',
						type: "POST",
						data: $(forms).serialize(),
						success: function(data) {
							if (data=='success') {
								Swal.fire(
								{
									position: "top-end",
									type: "success",
									title: "Branch saved",
									showConfirmButton: false,
									timer: 4000
								});

								$('#addmodal').modal('hide');
								document.getElementById("addvform").reset();
								$("#dt-basic-example").DataTable().ajax.reload();
							} else {
								Swal.fire(
								{
									position: "top-end",
									type: "error",
									title: "Please check input",
									showConfirmButton: false,
									timer: 3500
								});
							}
						}
					});
					event.preventDefault();
					event.stopPropagation();
				}, false);
			});
		}, false);
	})();



</script>

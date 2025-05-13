<?php
session_start();
include 'dbconnection.php';
$id=strtoupper(mysqli_real_escape_string($mysqli,$_GET['id']));
$result=$mysqli->query("select * from tbl_salesquotation where id='$id'");
$row=mysqli_fetch_assoc($result);
?>


 <div class="modal fade" id="view_modal" data-backdrop="static" data-keyboard="false"  tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true"><i class="fal fa-times"></i></span>
            	</button>
          </div>
          <div class="modal-body">
          	<div class="row">
          		<div class="col-lg-12">
            	 	<div id="panel-2" class="panel">
                    	<div class="panel-container show">
                            <div class="panel-content p-0">
                                <div class="panel-content">
                                            <div class="form-row">
                                                <div class="col-md-12 mb-3">
                                                    <div class="form-row" align="center">
                                                        <div class="col-md-12 mb-3">
                                                            <div class="alert alert-primary">
                                                                <div class="d-flex flex-start w-100">
                                                                    <div class="d-flex flex-fill">
                                                                        <div class="flex-fill">
                                                                            <span class="h4">SALES QUOTATION DETAILS</span>
                                                                            <input type="hidden" class="form-control"  autocomplete="off" name="pempid" id="pempid" value="<?php echo $id ?>" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-12 mb-3">
                                                    <table id="dt-basic-example2" class="table table-bordered  w-100 table-sm table-responsive-sm">
                                                        <thead>
                                                            <tr></tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr></tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

          	</div>
          </div>
      </div>
    </div>
</div>
<script>
    
    var pempid = document.getElementById("pempid").value;
	$(document).ready(function(){ 
		var table1 = $('#dt-basic-example2').DataTable({
        responsive: true,
        order: [[ 0, "desc" ]],
        processing:true,
        searching: false,
        scroller: false,
		ordering: false,
		paging:false,
		bLengthChange: false,
		bInfo: false,
        ajax: 'salesquotationitemres.php?empid='+pempid,
        columns: [
            { title: '', visible: false, data: "0" },
            { title: 'ITEM', data: "1" },
            { title: 'DESCRIPTION', data: "2" },
            { title: 'UNIT PRICE', data: "3" },
            { title: 'AMOUNT', data: "4" },
        ],
        dom:
            "<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'f><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'lB>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        buttons: [
            {
            extend: '',
                text: 'ADD DETAILS',
                titleAttr: 'Add Document',
                className: 'btn-outline-primary btn-sm mr-1',
                action: function ( e, dt, node, config ) {
                    $.ajax({
                        url:'salesquotationitemadd.php?empid='+pempid,
                        data:'',
                        type:'post',
                        success  : function(data) {
                            $("#div_addeducational").html(data);
                            $('#add_itemmodal').modal('show');
                        }
                    });
                }
            }]
        });

        $('#dt-basic-example2 tbody').on('click', 'td.details-control' , function () {
            var tr1 = $(this).closest('tr');
            var row1 = table1.row(tr);
            if ( row1.child.isShown() ) {
                // This row is already open - close it
                row1.child.hide();
                tr1.removeClass('shown');
            }
            else {
            // Open this row
                row1.child(format(row1.data()) ).show();
                tr1.addClass('shown');
            }
        } );
});

function delete1(id){
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
								url: 'truckpictureremove.php?id='+id,
								data: '',
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
											title: "Truck image remove.",
											showConfirmButton: true,
											allowOutsideClick: false
										});
										$("#dt-basic-example3").DataTable().ajax.reload();
									}
								}
							});
						}
					});
				}
</script>
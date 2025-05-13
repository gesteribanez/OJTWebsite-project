<?php
session_start();
include 'dbconnection.php';
$id=strtoupper(mysqli_real_escape_string($mysqli,$_GET['truckid']));
?>
<div class="modal fade" id="add_picmodal" data-backdrop="static" data-keyboard="false"  tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h4">Add Truck Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            	</button>
            </div>
            <form action="trucklistpictureprocess.php" class="dropzone" id="mydropzone" enctype="multipart/form-data">
                <div class="modal-body">
          	        <div class="row">
          		        <div class="col-lg-12">
                                    <input type="hidden" name="truckid" id="truckid" value="<?php echo $id ?>" />
                                   
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
	$("#mydropzone").dropzone({
		maxFilesize: 0.5,
   		uploadMultiple: false,
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
		dictDefaultMessage: '<span class="text-center"><span class="font-lg visible-xs-block visible-sm-block visible-lg-block"><span class="font-lg"><i class="fa fa-caret-right text-danger"></i> Drop files <span class="font-xs">to upload</span></span><span>&nbsp&nbsp<h4 class="display-inline"> (Or Click)</h4></span>',
		dictResponseError: 'Error uploading file!',
        init: function() {
            this.on('success', function( file, resp ){
                $("#dt-basic-example3").DataTable().ajax.reload();
            });
        }
        
	});
</script>
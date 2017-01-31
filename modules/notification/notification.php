<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Pemberitahuan
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Utility</a></li>
    <li class="active">Pemberitahuan</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-body">
		<script type="text/javascript" language="javascript" >
			var dTable;
			$(document).ready(function() {
				dTable = $('#datagrid').DataTable( {
					"bProcessing": true,
					"bServerSide": true,
					"bJQueryUI": false,
					"responsive": true,
					"sAjaxSource": "lib/showNotification.php",
					"sServerMethod": "POST",
					"columnDefs": [
					{ "orderable": false, "targets": 0, "searchable": false },
					{ "orderable": true, "targets": 1, "searchable": true },
					{ "orderable": true, "targets": 2, "searchable": true },
					{ "orderable": true, "targets": 3, "searchable": true },
					{ "orderable": true, "targets": 4, "searchable": true }
					]
				} );
				
				$('#datagrid').removeClass( 'display' ).addClass('table table-striped table-bordered');
				$('#datagrid tfoot th').each( function () {
					
					if( $(this).text() != "Action" ){
						var title = $('#datagrid thead th').eq( $(this).index() ).text();
						$(this).html( '<input type="text" placeholder="Search '+title+'" class="form-control" />' );
					}
				} );
				
			} );
		</script>
          <div class="box-header with-border">
              <button onClick="showModals()" type="button" class="btn btn-default btn-flat"> <i class="fa fa-sticky-note-o"></i> Tambah Baru</button>
              <button onClick="RefreshData()" type="button" class="btn btn-success btn-flat"> <i class="fa fa-refresh"></i> Refresh Data</button>
              <button onClick="history.back()" type="button" class="btn btn-info btn-flat" data-toggle="tooltip" data-placement="top" title="Kembali ke menu yang sebelumnya diakses!"> <i class="fa fa-undo"></i> Undo</button>
              <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div><!-- /.box-tools -->
          </div>
        <div class="box-header style="margin-top:-20px"">
        </div><!-- /.box-header -->
        <table id="datagrid"  class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Action</th>
                    <th>Keteranganh</th>
                    <th>Tanggal Dibuat</th>
                    <th>Pengguna</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>		<!-- Modal Popup -->
		<div class="modal fade" id="myModals" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Pemberitahuan</h4>
					</div>
					<div class="modal-body">
						<form class="form-horizontal" id="formData" action="">
							<input type="hidden" class="form-control" id="idnotification" name="idnotification">
							<input type="hidden" class="form-control" id="type" name="type">
							<div class="form-group">
								<label for="real_name" class="col-sm-3 control-label">Keterangan</label>
								<div class="col-sm-9">
                                	<textarea class="form-control" rows="3" name="description" id="description"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="real_name" class="col-sm-3 control-label">Pengguna</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="username" name="username" value="<?php echo $_SESSION['uname']?>" >
								</div>
							</div>
							<div class="form-group">
								<label for="real_name" class="col-sm-3 control-label">Status</label>
								<div class="col-sm-5">
                                 <select class="form-control select2" style="width: 100%;" name="status" id="status">
                                  <option value="0">Active</option>
                                  <option value="1">Not Active</option>
                                </select>								
                             </div>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" onClick="submitUser()" class="btn btn-primary btn-flat">Submit</button>
						<button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		<script>
			function showModals( idnotification )
			{
				clearModals();
				if( idnotification )
				{
					clearModals();
					$.ajax({
						type: "POST",
						url: "lib/Notification.php",
						dataType: 'json',
						data: {idnotification:idnotification,type:"get"},
						success: function(res) {
							waitingDialog.hide();
							setModalData( res );
						}
					});
				}
				else
				{
					$("#myModalLabel").html("New Notification");
					$("#type").val("new"); 
					waitingDialog.hide();
					$("#myModals").modal("show");
				}
			}
			
			function setModalData( data )
			{
				clearModals();
				$("#myModalLabel").html("Edit Notification");
				$("#myModalLabel").html(data.real_name);
				$("#idnotification").val(data.idnotification);
				$("#type").val("edit");
				$("#description").val(data.description);
				$("#username").val(data.username);
				$("#status").val(data.status);
				$("#myModals").modal("show");
				waitingDialog.hide();	
			}
			
			function deleteUser( idnotification )
			{
				clearModals();
				$.ajax({
					type: "POST",
					url: "lib/Notification.php",
					dataType: 'json',
					data: {idnotification:idnotification,type:"get"},
					success: function(data) {
						$("#myModalLabel").html("Delete Notification");
						$("#idnotification").val(data.idnotification);
						$("#description").val(data.description);
						$("#recoreded").val(data.recoreded);
						$("#username").val(data.username);
						$("#status").val(data.status);
						$("#type").val("delete");
						$("#description").val(data.description).attr("disabled","true");
						$("#recoreded").val(data.recoreded).attr("disabled","true");
						$("#username").val(data.username).attr("disabled","true");
						$("#status").val(data.status).attr("disabled","true");
						$("#myModals").modal("show");
						waitingDialog.hide();			
					}
				});
			}

			function submitUser()
			{
				var description = document.getElementById("description").value; 
				if (description == '') {
				  $('#formData').formValidation('validate');
				  } else {
						var formData = $("#formData").serialize();
						//waitingDialog.show();
						$.ajax({
							type: "POST",
							url: "lib/Notification.php",
							dataType: 'json',
							data: formData,
							success: function(data) {
								dTable.ajax.reload(); // Untuk Reload Tables secara otomatis
								//waitingDialog.hide();	
								$('#myModals').modal('hide');
							}
							

						});
	 										dTable.ajax.reload();
						$('#myModals').modal('hide');

				}
			}
			
			function clearModals()
			{
				$("#removeWarning").hide();
				$("#description").val("").removeAttr( "disabled" );
				$("#status").val("").removeAttr( "disabled" );
				$("#idnotification").val("");
				$("#type").val("");
				$("#description").val("");
				$("#recoreded").val("");
				$("#username").val("<?php echo $_SESSION['uname']?>");
			}
		</script>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row --> 
</section><!-- /.content -->


<script type="text/javascript">
$(document).ready(function() {
    $('#formData').formValidation({
        err: {
            container: 'tooltip'
        },
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            description: {
                validators: {
                    stringLength: {
                        enabled: false,
                        min: 4,
                        message: 'The item type must be more than 5 characters'
                    },
                    notEmpty: {
                        message: 'The user type is required'
                    }
                }
            }
        }
    });
});
</script>








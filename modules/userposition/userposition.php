<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    User Log
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Master Data</a></li>
    <li class="active">User Log</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
      <div class="box-header">
        </div><!-- /.box-header -->
        <div class="box-body">
		<script type="text/javascript" language="javascript" >
			var dTable;
			$(document).ready(function() {
				dTable = $('#example').DataTable( {
					"bProcessing": true,
					"bServerSide": true,
					"bJQueryUI": false,
					"responsive": true,
					"sAjaxSource": "lib/serverSide.php",
					"sServerMethod": "POST",
					"columnDefs": [
					{ "orderable": false, "targets": 0, "searchable": false },
					{ "orderable": true, "targets": 1, "searchable": true },
					{ "orderable": true, "targets": 2, "searchable": true },
					{ "orderable": true, "targets": 3, "searchable": true },
					{ "orderable": true, "targets": 4, "searchable": true }
					]
				} );
				
				$('#example').removeClass( 'display' ).addClass('table table-striped table-bordered');
				$('#example tfoot th').each( function () {
					
					if( $(this).text() != "Action" ){
						var title = $('#example thead th').eq( $(this).index() ).text();
						$(this).html( '<input type="text" placeholder="Search '+title+'" class="form-control" />' );
					}
				} );
				
				dTable.columns().every( function () {
					var that = this;
					
					$( 'input', this.footer() ).on( 'keyup change', function () {
						that
						.search( this.value )
						.draw();
					} );
				} );
			} );
		</script>
        <button onClick="showModals()" class="btn btn-primary">ADD Data</button>
        <hr>
        <table id="example"  class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Action</th>
                    <th>Userid</th>
                    <th>Real Name</th>
                    <th>XXX</th>
                    <th>XXX</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
		<!-- Modal Popup -->
		<div class="modal fade" id="myModals" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Add User</h4>
					</div>
					<div class="modal-body">
						
						<div class="alert alert-danger" role="alert" id="removeWarning">
							<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							Anda yakin ingin menghapus user ini
						</div>
						<br>
						<form class="form-horizontal" id="formUser">
							<input type="hidden" class="form-control" id="id" name="id">
							<input type="hidden" class="form-control" id="userid" name="userid">
							<input type="hidden" class="form-control" id="type" name="type">
							<div class="form-group">
								<label for="real_name" class="col-sm-2 control-label">Nama User</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="real_name" name="real_name" >
								</div>
							</div>
							<div class="form-group">
								<label for="npm" class="col-sm-2 control-label">SS</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="npm" name="npm" >
								</div>
							</div>
							<div class="form-group">
								<label for="kelas" class="col-sm-2 control-label">SS</label>
								<div class="col-sm-10">
									<textarea type="text" class="form-control" id="kelas" name="kelas" ></textarea>
								</div>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" onClick="submitUser()" class="btn btn-default" data-dismiss="modal">SAVE</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		
		<script>
		    //Tampilkan Modal 
			function showModals( id )
			{
				waitingDialog.show();
				clearModals();
				
				// Untuk Eksekusi Data Yang Ingin di Edit atau Di Hapus 
				if( id )
				{
					$.ajax({
						type: "POST",
						url: "crud.php",
						dataType: 'json',
						data: {id:id,type:"get"},
						success: function(res) {
							waitingDialog.hide();
							setModalData( res );
						}
					});
				}
				else
				{
					$("#myModals").modal("show");
					$("#myModalLabel").html("New User");
					$("#type").val("new"); 
					waitingDialog.hide();
				}
			}
			
			function setModalData( data )
			{
				$("#myModalLabel").html(data.real_name);
				$("#id").val(data.id);
				$("#type").val("edit");
				$("#userid").val(data.userid);
				$("#real_name").val(data.real_name);
				$("#npm").val(data.npm);
				$("#kelas").val(data.kelas);
				$("#myModals").modal("show");
			}
			
			//Submit Untuk Eksekusi Tambah/Edit/Hapus Data 
			function submitUser()
			{
				var formData = $("#formUser").serialize();
				waitingDialog.show();
				$.ajax({
					type: "POST",
					url: "crud.php",
					dataType: 'json',
					data: formData,
					success: function(data) {
						dTable.ajax.reload(); // Untuk Reload Tables secara otomatis
						waitingDialog.hide();	
					}
				});
			}
			
			//Hapus Data
			function deleteUser( id )
			{
				clearModals();
				$.ajax({
					type: "POST",
					url: "crud.php",
					dataType: 'json',
					data: {id:id,type:"get"},
					success: function(data) {
						$("#removeWarning").show();
						$("#myModalLabel").html("Delete User");
						$("#id").val(data.id);
						$("#userid").val(data.userid);
						$("#type").val("delete");
						$("#real_name").val(data.real_name).attr("disabled","true");
						$("#npm").val(data.npm).attr("disabled","true");
						$("#kelas").val(data.kelas).attr("disabled","true");
						$("#myModals").modal("show");
						waitingDialog.hide();			
					}
				});
			}
			
			//Clear Modal atau menutup modal supaya tidak terjadi duplikat modal
			function clearModals()
			{
				$("#removeWarning").hide();
				$("#id").val("").removeAttr( "disabled" );
				$("#userid").val("").removeAttr( "disabled" );
				$("#real_name").val("").removeAttr( "disabled" );
				$("#npm").val("").removeAttr( "disabled" );
				$("#type").val("");
				$("#kelas").val("").removeAttr( "disabled" );
			}
			
		</script>
					</div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row --> 
</section><!-- /.content -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Otorisasi Menu
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Utility</a></li>
    <li class="active">Otorisasi Menu</li>
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
				dTable = $('#datagrid').DataTable( {
					"bProcessing": true,
					"bServerSide": true,
					"bJQueryUI": false,
					"responsive": true,
					"sAjaxSource": "lib/showUserautorized.php",
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
        
        <table id="datagrid"  class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Action</th>
                    <th>ID Pengguna</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>Tipe Pengguna</th>
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
						<h4 class="modal-title" id="myModalLabel">User Type</h4>
					</div>
					<div class="modal-body">
                    <div class="row">
                       
						<form class="form-horizontal" id="formData" action="">
							<input type="text" class="form-control" id="iduser" name="iduser">
							<input type="hidden" class="form-control" id="type" name="type">
                             <div class="col-md-6">
							<div class="form-group">
								<label for="real_name" class="col-sm-3 control-label">ID Pengguna</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="username" name="username" disabled="disabled" >
								</div>
							</div>
                            
							<div class="form-group">
								<label for="real_name" class="col-sm-3 control-label">Nama Lengkap</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="name" name="name"  disabled="disabled">
								</div>
							</div>
                            </div>
                            <div class="col-md-6">
							<div class="form-group">
								<label for="real_name" class="col-sm-3 control-label">Email</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="email" name="email" disabled="disabled" >
								</div>
							</div>
							<div class="form-group">
								<label for="real_name" class="col-sm-3 control-label">Tipe Pengguna</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="usertypename" name="usertypename" disabled="disabled">
								</div>
							</div>
                            </div>
                            
						</form>
					</div>
					<script type="text/javascript" language="javascript" >
                        var dTable;
                        $(document).ready(function() {
							clearModals();
                            dTable = $('#subdatagrid').DataTable( {
                                "bProcessing": true,
                                "bServerSide": true,
                                "bJQueryUI": false,
                                "responsive": true,
                                "sAjaxSource": "lib/showUserautorizedmenu.php",
                                "sServerMethod": "POST",
                                "columnDefs": [
                                { "orderable": false, "targets": 0, "searchable": false },
                                { "orderable": true, "targets": 1, "searchable": true },
                                { "orderable": true, "targets": 2, "searchable": true },
                                { "orderable": true, "targets": 3, "searchable": true },
								{ "orderable": true, "targets": 4, "searchable": true }
                                ]
                            } );
                            
                            $('#subdatagrid').removeClass( 'display' ).addClass('table table-striped table-bordered');
                            $('#subdatagrid tfoot th').each( function () {
                                
                                if( $(this).text() != "Action" ){
                                    var title = $('#subdatagrid thead th').eq( $(this).index() ).text();
                                    $(this).html( '<input type="text" placeholder="Search '+title+'" class="form-control" />' );
                                }
                            } );
                            
                        } );
                    </script>
                    <table id="subdatagrid"  class="table table-bordered table-striped">
                        <thead>
                            <tr>
                           		<th>Action</th>
                                <th>Nama Menu</th>
                                <th>Icon</th>
                                <th>Seq No</th>
                                <th>Span Class</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>		
                    <!-- Modal Popup -->
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		<script>
			function showModals( iduser )
			{
				clearModals();
				if( iduser )
				{
					clearModals();
					$.ajax({
						type: "POST",
						url: "lib/Userautorized.php",
						dataType: 'json',
						data: {iduser:iduser,type:"get"},
						success: function(res) {
							waitingDialog.hide();
							setModalData( res );
						}
					});
				}
			}
			
			function setModalData( data )
			{
				clearModals();
				$("#myModalLabel").html("Otorisasi Pengguna");
				$("#myModalLabel").html(data.real_name);
				$("#iduser").val(data.iduser);
				$("#type").val("edit");
				$("#username").val(data.username);
				$("#name").val(data.name);
				$("#email").val(data.email);
				$("#usertypename").val(data.usertypename);
				$("#myModals").modal("show");
				waitingDialog.hide();	
			}
			
			function submitUser()
			{
				var x = document.getElementById("usertypename").value; 
				if (x == '') {
				  $('#formData').formValidation('validate');
				  } else {
						var formData = $("#formData").serialize();
						waitingDialog.show();
						$.ajax({
							type: "POST",
							url: "lib/Userautorized.php",
							dataType: 'json',
							data: formData,
							success: function(data) {
								dTable.ajax.reload(); // Untuk Reload Tables secara otomatis
								waitingDialog.hide();	
								$('#myModals').modal('hide');
							}
						});
	 			}
			}
			
			function clearModals()
			{
				$("#removeWarning").hide();
				$("#idusertype").val("").removeAttr( "disabled" );
				$("#usertypename").val("").removeAttr( "disabled" );
				$("#type").val("");
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
            usertypename: {
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
//Textbox event
$("#usertypename").keyup(function(event){
    if(event.keyCode == 13){
        submitUser()
    }
});
</script>


<style>
.modal-dialog {
  width: 95%;
  height: 95%;
  padding: 0;
}

.modal-content {
  height: 95%;
  border-radius: 0;
}
</style>





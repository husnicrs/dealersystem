<style>
.modal-header {
    padding:9px 15px;
    border-bottom:1px solid #eee;
    background-color: #F5F5F5;
 }
 .modal-footer {
    padding:9px 15px;
    border-bottom:1px solid #eee;
    background-color: #F5F5F5;
 }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Visi dan Misi
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Master Data</a></li>
    <li class="active">Visi dan Misi</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-danger">
      <div class="box-header with-border">
          <button onClick="showModals()" type="button" class="btn btn-default btn-flat"> <i class="fa fa-sticky-note-o"></i> Add New</button>
          <button type="button" class="btn btn-warning btn-flat"> <i class="fa fa-print"></i> Print</button>
          <button onClick="RefreshData()" type="button" class="btn btn-success btn-flat"> <i class="fa fa-refresh"></i> Refresh Data</button>
          <button onClick="history.back()" type="button" class="btn btn-info btn-flat" data-toggle="tooltip" data-placement="top" title="Kembali ke menu yang sebelumnya diakses!"> <i class="fa fa-undo"></i> Undo</button>
          <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div><!-- /.box-tools -->
      </div>
      <div class="box-header" style="margin-top:-20px">
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
					"sAjaxSource": "<?php echo $pagepost; ?>visionmision_show.php",
					"sServerMethod": "POST",
					"columnDefs": [
					{ "orderable": false, "targets": 0, "searchable": false },
					{ "orderable": true, "targets": 1, "searchable": true },
					{ "orderable": true, "targets": 2, "searchable": true },
					{ "orderable": true, "targets": 3, "searchable": true },
					{ "orderable": true, "targets": 4, "searchable": true },
					{ "orderable": true, "targets": 5, "searchable": true },
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
                    <th>Tugas</th>
                    <th>Fungsi</th>
                    <th>Visi</th>
                    <th>Misi</th>
                    <th>Kebijakan</th>
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
						<h4 class="modal-title" id="myModalLabel">Visi dan Misi</h4>
					</div>
                    <form class="form-horizontal" id="formData" action="">
                        <div class="modal-body">
							<input type="hidden" class="form-control" id="idvisionmision" name="idvisionmision">
							<input type="hidden" class="form-control" id="type" name="type">
							<div class="form-group">
								<label for="real_name" class="col-sm-2 control-label">Tugas</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="task" name="task" >
								</div>
							</div>
							<div class="form-group">
								<label for="real_name" class="col-sm-2 control-label">Fungsi</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="function" name="function" >
								</div>
							</div>
							<div class="form-group">
								<label for="real_name" class="col-sm-2 control-label">Visi</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="vision" name="vision" >
								</div>
							</div>
							<div class="form-group">
								<label for="real_name" class="col-sm-2 control-label">Misi</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="mision" name="mision" >
								</div>
							</div>
							<div class="form-group">
								<label for="real_name" class="col-sm-2 control-label">Kebijakan</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="policy" name="policy" >
								</div>
							</div>
						
					</div>
					<div class="modal-footer">
                        <button type="submit" onClick="submitDataAdd()" class="btn btn-primary btn-flat">Sumbit and Add </button>
						<button type="submit" onClick="submitData()" class="btn btn-primary btn-flat">Submit</button>
						<button type="button" onclick="ClearVal()" class="btn btn-default btn-flat pull-left" data-dismiss="modal">Close</button>
					</div>
                    </form>
				</div>
			</div>
		</div>
		<script>
			function showModals( idvisionmision )
			{
				clearModals();
				if( idvisionmision )
				{
					clearModals();
					$.ajax({
						type: "POST",
						url: "<?php echo $pagepost; ?>visionmision_post.php",
						dataType: 'json',
						data: {idvisionmision:idvisionmision,type:"get"},
						success: function(res) {
							waitingDialog.hide();
							setModalData( res );
						}
					});
				}
				else
				{
					$("#myModalLabel").html("Tambah Data Visi dan Misi");
					$("#type").val("new"); 
					waitingDialog.hide();
					$("#myModals").modal("show");
				}
			}
			
			function setModalData( data )
			{
				clearModals();
				$("#myModalLabel").html("Edit Data Visi dan Misi");
				$("#myModalLabel").html(data.real_name);
				$("#idvisionmision").val(data.idvisionmision);
				$("#type").val("edit");
				$("#task").val(data.task);
				$("#function").val(data.function);
				$("#vision").val(data.vision);
				$("#mision").val(data.mision);
				$("#policy").val(data.task);
				$("#myModals").modal("show");
				waitingDialog.hide();	
			}
			
			function deleteData( idvisionmision )
			{
				clearModals();
				$.ajax({
					type: "POST",
					url: "<?php echo $pagepost; ?>visionmision_post.php",
					dataType: 'json',
					data: {idvisionmision:idvisionmision,type:"get"},
					success: function(data) {
						$("#myModalLabel").html("Hapus Data Visi dan Misi");
						$("#idvisionmision").val(data.idvisionmision);
						$("#task").val(data.task);
						$("#function").val(data.function);
						$("#vision").val(data.vision);
						$("#mision").val(data.mision);
						$("#policy").val(data.task);
						$("#type").val("delete");
						$("#task").val(data.task).attr("disabled","false");
						$("#function").val(data.function).attr("disabled","false");
						$("#vision").val(data.vision).attr("disabled","false");
						$("#mision").val(data.mision).attr("disabled","false");
						$("#policy").val(data.policy).attr("disabled","false");
						$("#myModals").modal("show");
						waitingDialog.hide();			
					}
				});
			}

			function submitData()
			{
				var counter = document.getElementById("vision").value; 
				if (counter == '') {
				  $('#formData').formValidation('validate');
				  } else {
						var formData = $("#formData").serialize();
						waitingDialog.show();
						$.ajax({
							type: "POST",
							url: "<?php echo $pagepost; ?>visionmision_post.php",
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
			function submitDataAdd()
			{
				var counter = document.getElementById("vision").value; 
				if (counter == '') {
				  $('#formData').formValidation('validate');
				  } else {
						var formData = $("#formData").serialize();
						waitingDialog.show();
						$.ajax({
							type: "POST",
							url: "<?php echo $pagepost; ?>visionmision_post.php",
							dataType: 'json',
							data: formData,
							success: function(data) {
								dTable.ajax.reload();
								waitingDialog.hide();	
								showModals();
							}
						});
	 			}
			}
			function clearModals()
			{
				$("#removeWarning").hide();
				$("#idvisionmision").val("").removeAttr( "disabled" );
				$("#task").val("").removeAttr( "disabled" );
				$("#function").val("").removeAttr( "disabled" );
				$("#vision").val("").removeAttr( "disabled" );
				$("#mision").val("").removeAttr( "disabled" );
				$("#policy").val("").removeAttr( "disabled" );
				$("#type").val("");
			}

			function RefreshData()
			{
				dTable.ajax.reload();
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
            vision: {
                validators: {
                    stringLength: {
                        enabled: false,
                        min: 20,
                        message: 'Visi harus lebih dari 20 karakter'
                    },
                    notEmpty: {
                        message: 'Visi tidak boleh kosong'
                    }
                }
            },
			mision: {
                validators: {
                    stringLength: {
                        enabled: false,
                        min: 20,
                        message: 'Misi harus lebih dari 20 karakter'
                    },
                    notEmpty: {
                        message: 'Misi tidak boleh kosong'
                    }
                }
            }
        }
    })
	 .on('success.form.fv', function(e) {
		var $form     = $(e.target),
			validator = $form.data('formValidation');
		$form
			.formValidation('resetForm', true);    
	});
	
});
</script>








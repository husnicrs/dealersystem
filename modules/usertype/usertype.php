<?php
$subnavmenu = new Subnavmenu();
$modulename=$_GET['mod'];
$datasubnavmenu = $subnavmenu->showsubnavmenu($modulename);
extract($datasubnavmenu);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header" style="margin-top:-15px !important; margin-bottom:-20px !important">
  <h4>
    <?php echo $subnavmenuname; ?>
  </h4>
  <ol class="breadcrumb">
    <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#"><?php echo $navmenuname; ?></a></li>
    <li class="active"><?php echo $subnavmenuname; ?></li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-danger">
      <div class="box-header with-border" style="height:50px !important; margin-top:-2px !important">
          <button onClick="showModals()" type="button" class="btn btn-primary btn-flat"> <i class="fa fa-sticky-note-o"></i> Tambah Baru</button>
          <button onClick="history.back()" type="button" class="btn btn-primary btn-flat" data-toggle="tooltip" data-placement="top" title="Kembali ke menu yang sebelumnya diakses!"> <i class="fa fa-undo"></i> Kembali</button>
          <button onClick="RefreshData()" type="button" class="btn btn-success btn-flat"> <i class="fa fa-refresh"></i> Refresh</button>
          <div class="box-tools pull-right">
          <div class="tableTools-container">
              <button class="btn btn-white btn-primary  btn-bold" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
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
					"pageLength": 50,
					"scrollY": "310px",
					"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
					"sAjaxSource": "<?php echo $pagepost; echo $modulename;?>_show.php",
					"sServerMethod": "POST",
					"columnDefs": [
					{ "orderable": false, "targets": 0, "searchable": false },
					{ "orderable": true, "targets": 1, "searchable": true },
					{ "orderable": true, "targets": 2, "searchable": true },
					{ "orderable": true, "targets": 3, "searchable": true }
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
        <table id="datagrid"  class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Action</th>
                    <th>Tipe Pengguna</th>
                    <th>Jam Mulai Login</th>
                    <th>Jam Terakhir Login</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>		<!-- Modal Popup -->
		<div class="modal fade" id="myModals" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
                 <form class="form-horizontal" id="formData" action="">
                    <div class="modal-content">
                        <div class="modal-header">
                             <div class="form-group pull-right">
                                <label for="real_name" class="col-sm-4 control-label">Status</label>
                                <div class="col-sm-8 pull-right">
                                <select class="form-control" style="width: 100%;" name="status"  id="status">
                                   <option value="0">Active</option>
                                   <option value="1">Not Active</option>
                                </select>
                                </div>
                            </div>
                            <h4 class="modal-title" id="myModalLabel"><?php echo $subnavmenuname; ?></h4>
                        </div>
                        <div class="modal-body">
							<input type="hidden" class="form-control" id="idkey" name="idkey">
							<input type="hidden" class="form-control" id="type" name="type">
							<div class="form-group">
								<label for="real_name" class="col-sm-3 control-label">Tipe Pengguna</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="usertypename" name="usertypename" >
								</div>
							</div>
                            <div class="form-group">
								<label for="real_name" class="col-sm-3 control-label">Jam Mulai Login</label>
								<div class="col-sm-9">
									<div class="bootstrap-timepicker">
                                      <div class="input-group">
                                        <input type="text" class="form-control timepicker" name="stlogtime" id="stlogtime">
                                        <div class="input-group-addon">
                                          <i class="fa fa-clock-o"></i>
                                        </div>
                                      </div><!-- /.input group -->
                                  </div>
								</div>
							</div>

							<div class="form-group">
								<label for="real_name" class="col-sm-3 control-label">Jam Terakhir Login</label>
								<div class="col-sm-9">
                                    <div class="bootstrap-timepicker">
                                      <div class="input-group">
                                        <input type="text" class="form-control timepicker" name="fnlogtime" id="fnlogtime">
                                        <div class="input-group-addon">
                                          <i class="fa fa-clock-o"></i>
                                        </div>
                                      </div><!-- /.input group -->
                                  </div>
                      			</div>
							</div>

						</div>
					<div class="modal-footer">
                    	<button type="submit" id="submitnew" onClick="submitData()" class="btn btn-primary btn-flat pull-right" style="margin-left:5px !important">Simpan</button>
                        <button type="submit" id="submitaddnew" onClick="submitDataAdd()" class="btn btn-primary btn-flat pull-right">Simpan dan Baru </button>
                        <button type="submit" id="submitdelete" onClick="submitData()" class="btn btn-danger btn-flat pull-right">Hapus</button>
						<button type="button" onclick="ClearVal()" class="btn btn-default btn-flat pull-left" data-dismiss="modal">Tutup</button>
					</div>
				</div>
                </form>
			</div>
		</div>
		<script>
			function showModals( idkey )
			{
				clearModals();
				document.getElementById("submitnew").style.display = "block"; 
				document.getElementById("submitaddnew").style.display = "block"; 
				document.getElementById("submitdelete").style.display = "none";
				if( idkey )
				{
					clearModals();
					$.ajax({
						type: "POST",
						url: "<?php echo $pagepost; echo $modulename;?>_post.php",
						dataType: 'json',
						data: {idkey:idkey,type:"get"},
						success: function(res) {
							waitingDialog.hide();
							setModalData( res );
						}
					});
				}
				else
				{
					$("#myModalLabel").html("Add <?php echo $subnavmenuname; ?>");
					$("#type").val("new"); 
					waitingDialog.hide();
					$("#myModals").modal("show");
				}
			}
			
			function setModalData( data )
			{
				clearModals();
				$("#myModalLabel").html("Update <?php echo $subnavmenuname; ?>");
				$("#myModalLabel").html(data.real_name);
				$("#idkey").val(data.idkey);
				$("#type").val("edit");
				$("#usertypename").val(data.usertypename);
				$("#stlogtime").val(data.stlogtime);
				$("#fnlogtime").val(data.fnlogtime);
				var status = data.status;
				$('#status option[value="' + status +'"]').prop("selected", true);
				$("#myModals").modal("show");
				waitingDialog.hide();	
			}
			
			function deleteData( idkey )
			{
				clearModals();
				$.ajax({
					type: "POST",
					url: "<?php echo $pagepost; echo $modulename;?>_post.php",
					dataType: 'json',
					data: {idkey:idkey,type:"get"},
					success: function(data) {
						$("#myModalLabel").html("Delete <?php echo $subnavmenuname; ?>");
						$("#idkey").val(data.idkey);
						$("#stlogtime").val(data.stlogtime);
						$("#fnlogtime").val(data.fnlogtime);
						$("#usertypename").val(data.usertypename);
						$("#type").val("delete");
						$("#usertypename").val(data.usertypename).attr("disabled","false");
						$("#stlogtime").val(data.stlogtime).attr("disabled","false");
						$("#fnlogtime").val(data.fnlogtime).attr("disabled","false");
						
						var status = data.status;
						$('#status option[value="' + status +'"]').prop("selected", true);
				
						$("#myModals").modal("show");
						document.getElementById("submitnew").style.display = "none"; 
						document.getElementById("submitaddnew").style.display = "none"; 
						document.getElementById("submitdelete").style.display = "block";

						waitingDialog.hide();			
					}
				});
			}

			function submitData()
			{
				var counter = document.getElementById("usertypename").value; 
				if (counter == '') {
				  $('#formData').formValidation('validate');
				  } else {
						var formData = $("#formData").serialize();
						waitingDialog.show();
						$.ajax({
							type: "POST",
							url: "<?php echo $pagepost; echo $modulename;?>_post.php",
							dataType: 'json',
							data: formData,
							success: function(data) {
								dTable.ajax.reload();
								waitingDialog.hide();	
								$('#myModals').modal('hide');
							}
						});
	 			}
			}
			function submitDataAdd()
			{
				var counter = document.getElementById("usertypename").value; 
				if (counter == '') {
				  $('#formData').formValidation('validate');
				  } else {
						var formData = $("#formData").serialize();
						waitingDialog.show();
						$.ajax({
							type: "POST",
							url: "<?php echo $pagepost; echo $modulename;?>_post.php",
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
				$("#idkey").val("").removeAttr( "disabled" );
				$("#usertypename").val("").removeAttr( "disabled" );
				$("#stlogtime").val("").removeAttr( "disabled" );
				$("#fnlogtime").val("").removeAttr( "disabled" );
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
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('#formData').formValidation({
		framework: 'bootstrap',
        excluded: ':disabled',
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
                        enabled: true,
                        min: 1,
                        message: ''
                    },
                    notEmpty: {
                        message: 'Location name is required'
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
$('#myModals').on('hidden.bs.modal', function() {
    $('#formData').formValidation('resetForm', true);
});


</script>



<script type="text/javascript">

$(function () {
    $('#stlogtime').datetimepicker({
        use24hours: true
    });
	$('#fnlogtime').datetimepicker({
        use24hours: true
    });
});
	
</script>






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
    Submenu
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Setting</a></li>
    <li class="active">Submenu</li>
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
					"sAjaxSource": "<?php echo $pagepost; ?>submenu_show.php",
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
                    <th>Nama Submenu</th>
                    <th>Seq No</th>
                    <th>Module</th>
                    <th>Nama Manu</th>
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
							<input type="hidden" class="form-control" id="idsubnavmenu" name="idsubnavmenu">
							<input type="hidden" class="form-control" id="type" name="type">
							<div class="form-group">
								<label for="real_name" class="col-sm-2 control-label">Nama Submenu</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="subnavmenuname" name="subnavmenuname" >
								</div>
							</div>
							<div class="form-group">
								<label for="real_name" class="col-sm-2 control-label">Seq No</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="sequencenumber" name="sequencenumber" >
								</div>
							</div>
							<div class="form-group">
								<label for="real_name" class="col-sm-2 control-label">Module</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="submodule" name="submodule" >
								</div>
							</div>
							<div class="form-group">
								<label for="real_name" class="col-sm-2 control-label">Navmenu</label>
								<div class="col-sm-10">
                                <select class="form-control" style="width: 100%;" name="navmenuid"  id="navmenuid">
                                   <?php
                                        $rl = new Navmenu();
                                        $datanavmenu = $rl->shownavmenu();
                                        foreach ($datanavmenu as $value) {
                                            extract($value);
                                            echo "<option value='".$idnavmenu."'>".$navmenuname."</option>";
                                        }
                                    ?>
                                </select>
								</div>
							</div>
					</div>
					<div class="modal-footer">
                        <button type="submit" onClick="submitDataAdd()" class="btn btn-primary btn-flat">Sumbit and Add </button>
						<button type="button" onClick="submitData()" class="btn btn-primary btn-flat">Submit</button>
						<button type="button" onclick="ClearVal()" class="btn btn-default btn-flat pull-left" data-dismiss="modal">Close</button>
					</div>
                    </form>
				</div>
			</div>
		</div>
		<script>
			function showModals( idsubnavmenu )
			{
				clearModals();
				if( idsubnavmenu )
				{
					clearModals();
					$.ajax({
						type: "POST",
						url: "<?php echo $pagepost; ?>submenu_post.php",
						dataType: 'json',
						data: {idsubnavmenu:idsubnavmenu,type:"get"},
						success: function(res) {
							waitingDialog.hide();
							setModalData( res );
						}
					});
				}
				else
				{
					$("#myModalLabel").html("Tambah Data Submenu");
					$("#type").val("new"); 
					waitingDialog.hide();
					$("#myModals").modal("show");
				}
			}
			
			function setModalData( data )
			{
				clearModals();
				$("#myModalLabel").html("Edit Data Submenu");
				$("#myModalLabel").html(data.real_name);
				$("#idsubnavmenu").val(data.idsubnavmenu);
				$("#type").val("edit");
				$("#subnavmenuname").val(data.subnavmenuname);
				$("#sequencenumber").val(data.sequencenumber);
				$("#submodule").val(data.submodule);
				var i = data.navmenuid;
				$('#navmenuid option[value="' + i +'"]').prop("selected", true);

				$("#myModals").modal("show");
				waitingDialog.hide();	
			}
			
			function deleteData( idsubnavmenu )
			{
				clearModals();
				$.ajax({
					type: "POST",
					url: "<?php echo $pagepost; ?>submenu_post.php",
					dataType: 'json',
					data: {idsubnavmenu:idsubnavmenu,type:"get"},
					success: function(data) {
						$("#myModalLabel").html("Hapus Data Submenu");
						$("#idsubnavmenu").val(data.idsubnavmenu);
						$("#subnavmenuname").val(data.subnavmenuname);
						$("#sequencenumber").val(data.sequencenumber);
						$("#submodule").val(data.submodule);
						$("#navmenuid").val(data.navmenuid);
						$("#type").val("delete");
						$("#subnavmenuname").val(data.subnavmenuname).attr("disabled","false");
						$("#sequencenumber").val(data.sequencenumber).attr("disabled","false");
						$("#submodule").val(data.submodule).attr("disabled","false");
						$("#navmenuid").val(data.navmenuid).attr("disabled","false");
						$("#myModals").modal("show");
						waitingDialog.hide();			
					}
				});
			}

			function submitData()
			{
				var counter = document.getElementById("subnavmenuname").value; 
				if (counter == '') {
				  $('#formData').formValidation('validate');
				  } else {
						var formData = $("#formData").serialize();
						waitingDialog.show();
						$.ajax({
							type: "POST",
							url: "<?php echo $pagepost; ?>submenu_post.php",
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
				var counter = document.getElementById("subnavmenuname").value; 
				if (counter == '') {
				  $('#formData').formValidation('validate');
				  } else {
						var formData = $("#formData").serialize();
						waitingDialog.show();
						$.ajax({
							type: "POST",
							url: "<?php echo $pagepost; ?>submenu_post.php",
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
				$("#idsubnavmenu").val("").removeAttr( "disabled" );
				$("#subnavmenuname").val("").removeAttr( "disabled" );
				$("#sequencenumber").val("").removeAttr( "disabled" );
				$("#submodule").val("").removeAttr( "disabled" );
				$("#navmenuid").val("").removeAttr( "disabled" );
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
            subnavmenuname: {
                validators: {
                    stringLength: {
                        enabled: false,
                        min: 20,
                        message: 'Visi harus lebih dari 20 karakter'
                    },
                    notEmpty: {
                        message: 'Submenu tidak boleh kosong'
                    }
                }
            },
			sequencenumber: {
                validators: {
                    stringLength: {
                        enabled: false,
                        min: 20,
                        message: 'Misi harus lebih dari 20 karakter'
                    },
                    notEmpty: {
                        message: 'Seq no tidak boleh kosong'
                    }
                }
            },
			submodule: {
                validators: {
                    stringLength: {
                        enabled: false,
                        min: 20,
                        message: 'Misi harus lebih dari 20 karakter'
                    },
                    notEmpty: {
                        message: 'Module tidak boleh kosong'
                    }
                }
            },
			navmenuid: {
                validators: {
                    stringLength: {
                        enabled: false,
                        min: 20,
                        message: 'Misi harus lebih dari 20 karakter'
                    },
                    notEmpty: {
                        message: 'Navmenu tidak boleh kosong'
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
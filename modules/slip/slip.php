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
    Slip
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Setting</a></li>
    <li class="active">Slip</li>
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
					"sAjaxSource": "<?php echo $pagepost; ?>slip_show.php",
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
                    <th>Slip Name</th>
                    <th>Module</th>
                    <th>Seq No</th>
                    <th>Menu Name</th>
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
						<h4 class="modal-title" id="myModalLabel">Slip</h4>
					</div>
                    <form class="form-horizontal" id="formData" action="">
                        <div class="modal-body">
							<input type="hidden" class="form-control" id="idslip" name="idslip">
							<input type="hidden" class="form-control" id="type" name="type">
							<div class="form-group">
								<label for="real_name" class="col-sm-2 control-label">Slip Name</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="slipname" name="slipname" >
								</div>
							</div>
                            <div class="form-group">
								<label for="real_name" class="col-sm-2 control-label">Module</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="module" name="module" >
								</div>
							</div>
							<div class="form-group">
								<label for="real_name" class="col-sm-2 control-label">Seq No</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="sequencenumber" name="sequencenumber" >
								</div>
							</div>
							<div class="form-group">
								<label for="real_name" class="col-sm-2 control-label">Menu</label>
								<div class="col-sm-10">
                                <select class="form-control" style="width: 100%;" name="subnavmenuid"  id="subnavmenuid">
                                   <?php
                                        $rl = new Combobox();
                                        $datasubnavmenu = $rl->showSubnavmenu();
                                        foreach ($datasubnavmenu as $value) {
                                            extract($value);
                                            echo "<option value='".$idsubnavmenu."'>".$subnavmenuname."</option>";
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
			function showModals( idslip )
			{
				clearModals();
				if( idslip )
				{
					clearModals();
					$.ajax({
						type: "POST",
						url: "<?php echo $pagepost; ?>slip_post.php",
						dataType: 'json',
						data: {idslip:idslip,type:"get"},
						success: function(res) {
							waitingDialog.hide();
							setModalData( res );
						}
					});
				}
				else
				{
					$("#myModalLabel").html("Add Slip");
					$("#type").val("new"); 
					waitingDialog.hide();
					$("#myModals").modal("show");
				}
			}
			
			function setModalData( data )
			{
				clearModals();
				$("#myModalLabel").html("Edit Slip");
				$("#myModalLabel").html(data.real_name);
				$("#idslip").val(data.idslip);
				$("#type").val("edit");
				$("#slipname").val(data.slipname);
				$("#module").val(data.module);
				$("#sequencenumber").val(data.sequencenumber);
				var i = data.subnavmenuid;
				$('#subnavmenuid option[value="' + i +'"]').prop("selected", true);

				$("#myModals").modal("show");
				waitingDialog.hide();	
			}
			
			function deleteData( idslip )
			{
				clearModals();
				$.ajax({
					type: "POST",
					url: "<?php echo $pagepost; ?>slip_post.php",
					dataType: 'json',
					data: {idslip:idslip,type:"get"},
					success: function(data) {
						$("#myModalLabel").html("Delete Slip");
						$("#idslip").val(data.idslip);
						$("#slipname").val(data.slipname);
						$("#sequencenumber").val(data.sequencenumber);
						$("#subnavmenuid").val(data.subnavmenuid);
						$("#type").val("delete");
						$("#slipname").val(data.slipname).attr("disabled","false");
						$("#module").val(data.module).attr("disabled","false");
						$("#sequencenumber").val(data.sequencenumber).attr("disabled","false");
						$("#subnavmenuid").val(data.subnavmenuid).attr("disabled","false");
						$("#myModals").modal("show");
						waitingDialog.hide();			
					}
				});
			}

			function submitData()
			{
				var counter = document.getElementById("slipname").value; 
				if (counter == '') {
				  $('#formData').formValidation('validate');
				  } else {
						var formData = $("#formData").serialize();
						waitingDialog.show();
						$.ajax({
							type: "POST",
							url: "<?php echo $pagepost; ?>slip_post.php",
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
				var counter = document.getElementById("slipname").value; 
				if (counter == '') {
				  $('#formData').formValidation('validate');
				  } else {
						var formData = $("#formData").serialize();
						waitingDialog.show();
						$.ajax({
							type: "POST",
							url: "<?php echo $pagepost; ?>slip_post.php",
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
				$("#idslip").val("").removeAttr( "disabled" );
				$("#slipname").val("").removeAttr( "disabled" );
				$("#module").val("").removeAttr( "disabled" );
				$("#sequencenumber").val("").removeAttr( "disabled" );
				$("#subnavmenuid").val("").removeAttr( "disabled" );
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
        err: {
            container: 'tooltip'
        },
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            slipname: {
                validators: {
                    stringLength: {
                        enabled: false,
                        min: 20,
                        message: ''
                    },
                    notEmpty: {
                        message: 'Slip name is required'
                    }
                }
            },
			module: {
                validators: {
                    stringLength: {
                        enabled: false,
                        min: 20,
                        message: ''
                    },
                    notEmpty: {
                        message: 'Module name is required'
                    }
                }
            },
			sequencenumber: {
                validators: {
                    stringLength: {
                        enabled: false,
                        min: 20,
                        message: ''
                    },
                    notEmpty: {
                        message: 'Seq no is required'
                    }
                }
            },
			submodule: {
                validators: {
                    stringLength: {
                        enabled: false,
                        min: 20,
                        message: ''
                    },
                    notEmpty: {
                        message: 'Module is required'
                    }
                }
            },
			subnavmenuid: {
                validators: {
                    stringLength: {
                        enabled: false,
                        min: 20,
                        message: ''
                    },
                    notEmpty: {
                        message: 'Menu is required'
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
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
    Kecamatan
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Master Data</a></li>
    <li class="active">Kecamatan</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-danger">
      <div class="box-header with-border">
          <button onClick="showModals()" type="button" class="btn btn-default btn-flat"> <i class="fa fa-sticky-note-o"></i> Add New</button>
          <button onClick="RefreshData()" type="button" class="btn btn-success btn-flat"> <i class="fa fa-refresh"></i> Refresh Data</button>
          <button onClick="history.back()" type="button" class="btn btn-info btn-flat" data-toggle="tooltip" data-placement="top" title="Kembali ke menu yang sebelumnya diakses!"> <i class="fa fa-undo"></i> Undo</button>
          <div class="box-tools pull-right">
          <div class="tableTools-container">
              <button class="btn btn-white btn-warning  btn-bold" data-widget="collapse"><i class="fa fa-minus"></i></button>
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
					"scrollY": "290px",
					"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
					"sAjaxSource": "<?php echo $pagepost; ?>districts_show.php",
					"sServerMethod": "POST",
					"columnDefs": [
					{ "orderable": false, "targets": 0, "searchable": false },
					{ "orderable": true, "targets": 1, "searchable": true },
					{ "orderable": true, "targets": 2, "searchable": true }
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
                    <th>Kecamatan</th>
                    <th>Kota/Kabupaten</th>
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
						<h4 class="modal-title" id="myModalLabel">Kecamatan</h4>
					</div>
                    <form class="form-horizontal" id="formData" action="">
                        <div class="modal-body">
							<input type="hidden" class="form-control" id="iddistricts" name="iddistricts">
							<input type="hidden" class="form-control" id="type" name="type">
							<div class="form-group">
								<label for="real_name" class="col-sm-2 control-label">Nama Kecamatan</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="districtsname" name="districtsname" >
								</div>
							</div>
							<div class="form-group">
								<label for="real_name" class="col-sm-2 control-label">Kota/Kabupaten</label>
								<div class="col-sm-10">
                                <select class="form-control" style="width: 100%;" name="cityid"  id="cityid">
                                   <?php
                                        $rl = new Combobox();
                                        $datacity = $rl->showCity();
                                        foreach ($datacity as $value) {
                                            extract($value);
                                            echo "<option value='".$idcity."'>".$cityname."</option>";
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
			function showModals( iddistricts )
			{
				clearModals();
				if( iddistricts )
				{
					clearModals();
					$.ajax({
						type: "POST",
						url: "<?php echo $pagepost; ?>districts_post.php",
						dataType: 'json',
						data: {iddistricts:iddistricts,type:"get"},
						success: function(res) {
							waitingDialog.hide();
							setModalData( res );
						}
					});
				}
				else
				{
					$("#myModalLabel").html("Tambah Data Kecamatan");
					$("#type").val("new"); 
					waitingDialog.hide();
					$("#myModals").modal("show");
				}
			}
			
			function setModalData( data )
			{
				clearModals();
				$("#myModalLabel").html("Edit Data Kecamatan");
				$("#myModalLabel").html(data.real_name);
				$("#iddistricts").val(data.iddistricts);
				$("#type").val("edit");
				$("#districtsname").val(data.districtsname);
				$("#cityid").val(data.cityid);
				var i = data.navmenuid;
				$('#navmenuid option[value="' + i +'"]').prop("selected", true);

				$("#myModals").modal("show");
				waitingDialog.hide();	
			}
			
			function deleteData( iddistricts )
			{
				clearModals();
				$.ajax({
					type: "POST",
					url: "<?php echo $pagepost; ?>districts_post.php",
					dataType: 'json',
					data: {iddistricts:iddistricts,type:"get"},
					success: function(data) {
						$("#myModalLabel").html("Hapus Data Kecamatan");
						$("#iddistricts").val(data.iddistricts);
						$("#districtsname").val(data.districtsname);
						$("#cityid").val(data.cityid);
						$("#type").val("delete");
						$("#districtsname").val(data.districtsname).attr("disabled","false");
						$("#cityid").val(data.cityid).attr("disabled","false");
						$("#myModals").modal("show");
						waitingDialog.hide();			
					}
				});
			}

			function submitData()
			{
				var counter = document.getElementById("districtsname").value; 
				if (counter == '') {
				  $('#formData').formValidation('validate');
				  } else {
						var formData = $("#formData").serialize();
						waitingDialog.show();
						$.ajax({
							type: "POST",
							url: "<?php echo $pagepost; ?>districts_post.php",
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
				var counter = document.getElementById("districtsname").value; 
				if (counter == '') {
				  $('#formData').formValidation('validate');
				  } else {
						var formData = $("#formData").serialize();
						waitingDialog.show();
						$.ajax({
							type: "POST",
							url: "<?php echo $pagepost; ?>districts_post.php",
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
				$("#iddistricts").val("").removeAttr( "disabled" );
				$("#districtsname").val("").removeAttr( "disabled" );
				$("#cityid").val("").removeAttr( "disabled" );
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
                        message: 'Kecamatan tidak boleh kosong'
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
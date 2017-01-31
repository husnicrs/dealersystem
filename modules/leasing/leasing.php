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
					{ "orderable": true, "targets": 3, "searchable": true },
					{ "orderable": true, "targets": 4, "searchable": true },
					{ "orderable": true, "targets": 5, "searchable": true },
					{ "orderable": true, "targets": 6, "searchable": true },
					{ "orderable": true, "targets": 7, "searchable": true },
					{ "orderable": true, "targets": 8, "searchable": true },
					{ "orderable": true, "targets": 9, "searchable": true },
					{ "orderable": true, "targets": 10, "searchable": true }
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
                    <th>Leasing</th>
                    <th>Nama Perusahaan</th>
                    <th>Alamat</th>
                    <th>Pelunasan</th>
                    <th>DP PO</th>
                    <th>OTR</th>
                    <th>Sub Leasing</th>
                    <th>Scheme</th>
                    <th>Accessories</th>
                    <th>Format Surat</th>
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
                            <label for="real_name" class="col-sm-3 control-label">Leasing</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="leasingname" name="leasingname" disabled="disabled">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="real_name" class="col-sm-3 control-label">Nama Perusahaan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="companyname" name="companyname" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="real_name" class="col-sm-3 control-label">Alamat</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="address" name="address" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="real_name" class="col-sm-3 control-label">Pelunasan</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="payment" name="payment" >
                            </div>
                            <div class="col-sm-3">
                                <select class="form-control" style="width: 100%;" name="paymentformat"  id="paymentformat">
                                   <option style="background-color:#0F0 !important" value="Y">Y</option>
                                   <option style="background-color:#F00 !important" value="N">N</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="real_name" class="col-sm-3 control-label">DP PO</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="dppo" name="dppo" >
                            </div>
                            <div class="col-sm-3">
                                <select class="form-control" style="width: 100%;" name="dppoformat"  id="dppoformat">
                                   <option style="background-color:#0F0 !important" value="Y">Y</option>
                                   <option style="background-color:#F00 !important" value="N">N</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="real_name" class="col-sm-3 control-label">OTR</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="otr" name="otr" >
                            </div>
                            <div class="col-sm-3">
                                <select class="form-control" style="width: 100%;" name="otrformat"  id="otrformat">
                                   <option style="background-color:#0F0 !important" value="Y">Y</option>
                                   <option style="background-color:#F00 !important" value="N">N</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="real_name" class="col-sm-3 control-label">Sub Leasing</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="subleasing" name="subleasing" >
                            </div>
                            <div class="col-sm-3">
                                <select class="form-control" style="width: 100%;" name="subleasingformat"  id="subleasingformat">
                                   <option style="background-color:#0F0 !important" value="Y">Y</option>
                                   <option style="background-color:#F00 !important" value="N">N</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="real_name" class="col-sm-3 control-label">Scheme</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="scheme" name="scheme" >
                            </div>
                            <div class="col-sm-3">
                                <select class="form-control" style="width: 100%;" name="schemeformat"  id="schemeformat">
                                   <option style="background-color:#0F0 !important" value="Y">Y</option>
                                   <option style="background-color:#F00 !important" value="N">N</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="real_name" class="col-sm-3 control-label">Accessories</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="accessories" name="accessories" >
                            </div>
                            <div class="col-sm-3">
                                <select class="form-control" style="width: 100%;" name="accessoriesformat"  id="accessoriesformat">
                                   <option style="background-color:#0F0 !important" value="Y">Y</option>
                                   <option style="background-color:#F00 !important" value="N">N</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="real_name" class="col-sm-3 control-label">Format Surat</label>
                            <div class="col-sm-9">
                                <select class="form-control" style="width: 100%;" name="spformat"  id="spformat">
                                   <option value="sp1">sp1</option>
                                   <option value="sp2">sp2</option>
                                   <option value="sp3">sp3</option>
                                </select>
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
				$("#leasingname").val(data.leasingname);
				$("#companyname").val(data.companyname);
				$("#address").val(data.address);
				$("#payment").val(data.payment);
				$("#dppo").val(data.dppo);
				$("#otr").val(data.otr);
				$("#subleasing").val(data.subleasing);
				$("#scheme").val(data.scheme);
				$("#accessories").val(data.accessories);
				var status = data.status;
				$('#status option[value="' + status +'"]').prop("selected", true);
				
				var paymentformat = data.paymentformat;
				$('#paymentformat option[value="' + paymentformat +'"]').prop("selected", true);
				var dppoformat = data.dppoformat;
				$('#dppoformat option[value="' + dppoformat +'"]').prop("selected", true);
				var otrformat = data.otrformat;
				$('#otrformat option[value="' + otrformat +'"]').prop("selected", true);
				var subleasingformat = data.subleasingformat;
				$('#subleasingformat option[value="' + subleasingformat +'"]').prop("selected", true);
				var schemeformat = data.schemeformat;
				$('#schemeformat option[value="' + schemeformat +'"]').prop("selected", true);
				var accessoriesformat = data.accessoriesformat;
				$('#accessoriesformat option[value="' + accessoriesformat +'"]').prop("selected", true);
				
				var spformat = data.spformat;
				$('#spformat option[value="' + spformat +'"]').prop("selected", true);
				
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
						$("#leasingname").val(data.leasingname);
						$("#companyname").val(data.companyname);
						$("#address").val(data.address);
						$("#payment").val(data.payment);
						$("#dppo").val(data.dppo);
						$("#otr").val(data.otr);
						$("#subleasing").val(data.subleasing);
						$("#scheme").val(data.scheme);
						$("#accessories").val(data.accessories);
						$("#type").val("delete");
						$("#leasingname").val(data.leasingname).attr("disabled","false");
						$("#companyname").val(data.companyname).attr("disabled","false");
						$("#address").val(data.address).attr("disabled","false");
						$("#payment").val(data.payment).attr("disabled","false");
						$("#dppo").val(data.dppo).attr("disabled","false");
						$("#otr").val(data.otr).attr("disabled","false");
						$("#subleasing").val(data.subleasing).attr("disabled","false");
						$("#scheme").val(data.scheme).attr("disabled","false");
						$("#accessories").val(data.accessories).attr("disabled","false");
						
						$("#paymentformat").val(data.paymentformat).attr("disabled","false");
						$("#dppoformat").val(data.dppoformat).attr("disabled","false");
						$("#otrformat").val(data.otrformat).attr("disabled","false");
						$("#subleasingformat").val(data.subleasingformat).attr("disabled","false");
						$("#schemeformat").val(data.schemeformat).attr("disabled","false");
						$("#accessoriesformat").val(data.accessoriesformat).attr("disabled","false");
						$("#status").val(data.status).attr("disabled","false");
						$("#spformat").val(data.spformat).attr("disabled","false");
						
						var status = data.status;
						$('#status option[value="' + status +'"]').prop("selected", true);
						
						var paymentformat = data.paymentformat;
						$('#paymentformat option[value="' + paymentformat +'"]').prop("selected", true);
						var dppoformat = data.dppoformat;
						$('#dppoformat option[value="' + dppoformat +'"]').prop("selected", true);
						var otrformat = data.otrformat;
						$('#otrformat option[value="' + otrformat +'"]').prop("selected", true);
						var subleasingformat = data.subleasingformat;
						$('#subleasingformat option[value="' + subleasingformat +'"]').prop("selected", true);
						var schemeformat = data.schemeformat;
						$('#schemeformat option[value="' + schemeformat +'"]').prop("selected", true);
						var accessoriesformat = data.accessoriesformat;
						$('#accessoriesformat option[value="' + accessoriesformat +'"]').prop("selected", true);
						
						var spformat = data.spformat;
						$('#spformat option[value="' + spformat +'"]').prop("selected", true);
				
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
				var counter = document.getElementById("leasingname").value; 
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
				var counter = document.getElementById("leasingname").value; 
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
				$("#leasingname").val("").removeAttr( "disabled" );
				$("#companyname").val("").removeAttr( "disabled" );
				$("#address").val("").removeAttr( "disabled" );
				$("#payment").val("").removeAttr( "disabled" );
				$("#dppo").val("").removeAttr( "disabled" );
				$("#otr").val("").removeAttr( "disabled" );
				$("#subleasing").val("").removeAttr( "disabled" );
				$("#scheme").val("").removeAttr( "disabled" );
				$("#accessories").val("").removeAttr( "disabled" );
				$("#spformat").val("").removeAttr( "disabled" );
				
				$("#paymentformat").val("").removeAttr( "disabled" );
				$("#dppoformat").val("").removeAttr( "disabled" );
				$("#otrformat").val("").removeAttr( "disabled" );
				$("#subleasingformat").val("").removeAttr( "disabled" );
				$("#schemeformat").val("").removeAttr( "disabled" );
				$("#accessoriesformat").val("").removeAttr( "disabled" );
				$("#status").val("").removeAttr( "disabled" );
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
            leasingname: {
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








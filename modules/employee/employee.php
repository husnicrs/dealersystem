<?php
$subnavmenu = new Subnavmenu();
$modulename=$_GET['mod'];
$datasubnavmenu = $subnavmenu->showsubnavmenu($modulename);
extract($datasubnavmenu);
?>
<style>
.datepicker{z-index:1151 !important;}
</style>
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
					{ "orderable": false, "targets": 1, "searchable": false },
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
        <table id="datagrid"  class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Action</th>
                    <th>NIK</th>
                    <th>Nama Pegawai</th>
                    <th>Posisi</th>
                    <th>Departemen</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>	
		<div class="modal fade" id="myModals" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog"  style="width:80% !important">
                    <div class="modal-content">
                    <form class="form-horizontal" id="formData" action="">
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
							<input type="hidden" class="form-control" id="idemployee" name="idemployee">
							<input type="hidden" class="form-control" id="type" name="type">
                             <div class="col-md-6">
							<div class="form-group">
								<label for="real_name" class="col-sm-3 control-label">Nomor Identitas</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="identityno" name="identityno">
								</div>
							</div>
							<div class="form-group">
								<label for="real_name" class="col-sm-3 control-label">Nama Pegawai</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="employeename" name="employeename">
								</div>
							</div>
							<div class="form-group">
								<label for="real_name" class="col-sm-3 control-label">Nama Panggilan</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="nickname" name="nickname">
								</div>
							</div>
							<div class="form-group">
								<label for="real_name" class="col-sm-3 control-label">Tempat Lahir</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="placebirth" name="placebirth">
								</div>
							</div>
							<div class="form-group">
								<label for="real_name" class="col-sm-3 control-label">Tanggal Lahir</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="datebirth" id="datebirth" data-date-format="yyyy-mm-dd">
								</div>
							</div>
							<div class="form-group">
								<label for="real_name" class="col-sm-3 control-label">Alamat</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="address" name="address">
								</div>
							</div>
							<div class="form-group">
								<label for="real_name" class="col-sm-3 control-label">Kota</label>
								<div class="col-sm-9">
								  <select class="form-control"  style="width: 100%;" name="cityid" id="cityid"  placeholder="City">
                                  <option value="<?php echo $idcity; ?>"><?php echo $cityname; ?></option>
                                   <?php
                                        $rl = new Combobox();
                                        $datarl = $rl->showCity();
                                        foreach ($datarl as $value) {
                                            extract($value);
                                            echo "<option value='".$idcity."'>".$cityname."</option>";
                                        }
                                    ?>
                                  </select>
								</div>
							</div>
                            </div>
                            
                            <div class="col-md-6">
                            <div class="form-group">
								<label for="real_name" class="col-sm-3 control-label">NIK</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="nik" name="nik">
								</div>
							</div>
                            <div class="form-group">
								<label for="real_name" class="col-sm-3 control-label">Status Pernikahan</label>
								<div class="col-sm-9">
								  <select class="form-control"  style="width: 100%;" name="maritalstatus" id="maritalstatus"  placeholder="Marital Status">
                                      <option value="1">Lajang</option>
                                      <option value="2">Menikah</option>
                                  </select>
								</div>
							</div>
							<div class="form-group">
								<label for="real_name" class="col-sm-3 control-label">Jenis Kelamin</label>
								<div class="col-sm-9">
								  <select class="form-control"  style="width: 100%;" name="sex" id="sex"  placeholder="Gender">
                                      <option value="1">Laki-Laki</option>
                                      <option value="2">Perempuan</option>
                                  </select>
								</div>
							</div>
							<div class="form-group">
								<label for="real_name" class="col-sm-3 control-label">Pendidikan</label>
								<div class="col-sm-9">
								  <select class="form-control"  style="width: 100%;" name="positionid" id="positionid"  placeholder="Position">
                                  <option value="<?php echo $idposition; ?>"><?php echo $positionname; ?></option>
                                   <?php
                                        $rl = new Combobox();
                                        $datarl = $rl->showEducationlevel();
                                        foreach ($datarl as $value) {
                                            extract($value);
                                            echo "<option value='".$ideducationlevel."'>".$educationlevelname."</option>";
                                        }
                                    ?>
                                  </select>
								</div>
							</div>
							<input type="hidden" name="blood" />				
                            <input type="hidden" class="form-control" id="joindate" name="joindate">
                            <input type="hidden" class="form-control" id="termdate" name="termdate">
                            <input type="hidden" class="form-control" id="insuranceno" name="insuranceno">
                            <input type="hidden" class="form-control" id="npwp" name="npwp">
                            <input type="hidden" class="form-control" id="majorid" name="majorid">
							<div class="form-group">
                                  <label for="real_name" class="col-sm-3 control-label">Posisi</label>
								<div class="col-sm-9">
								  <select class="form-control"  style="width: 100%;" name="positionid" id="positionid"  placeholder="Position">
                                  <option value="<?php echo $idposition; ?>"><?php echo $positionname; ?></option>
                                   <?php
                                        $rl = new Combobox();
                                        $datarl = $rl->showPosition();
                                        foreach ($datarl as $value) {
                                            extract($value);
                                            echo "<option value='".$idposition."'>".$positionname."</option>";
                                        }
                                    ?>
                                  </select>
								</div>
							</div>
							<div class="form-group">
                                  <label for="real_name" class="col-sm-3 control-label">Departemen</label>
								<div class="col-sm-9">
								  <select class="form-control"  style="width: 100%;" name="departmentid" id="departmentid"  placeholder="Department">
                                  <option value="<?php echo $iddepartment; ?>"><?php echo $departmentname; ?></option>
                                   <?php
                                        $rl = new Combobox();
                                        $datarl = $rl->showDepartment();
                                        foreach ($datarl as $value) {
                                            extract($value);
                                            echo "<option value='".$iddepartment."'>".$departmentname."</option>";
                                        }
                                    ?>
                                  </select>
								</div>
							</div>

							<div class="form-group">
                                  <label for="real_name" class="col-sm-3 control-label">Lokasi</label>
								<div class="col-sm-9">
								  <select class="form-control"  style="width: 100%;" name="locationid" id="locationid"  placeholder="Location">
                                  <option value="<?php echo $idlocation; ?>"><?php echo $locationname; ?></option>
                                   <?php
                                        $rl = new Combobox();
                                        $datarl = $rl->showLocation();
                                        foreach ($datarl as $value) {
                                            extract($value);
                                            echo "<option value='".$idlocation."'>".$locationname."</option>";
                                        }
                                    ?>
                                  </select>
								</div>
							</div>
                        </div>
					</div>
                    </form>
					<div class="modal-footer">
                    	<button type="submit" id="submitnew" onClick="submitData()" class="btn btn-primary btn-flat pull-right" style="margin-left:5px !important">Simpan</button>
                        <button type="submit" id="submitaddnew" onClick="submitDataAdd()" class="btn btn-primary btn-flat pull-right">Simpan dan Baru </button>
                        <button type="submit" id="submitdelete" onClick="submitData()" class="btn btn-danger btn-flat pull-right">Hapus</button>
						<button type="button" onclick="ClearVal()" class="btn btn-default btn-flat pull-right" data-dismiss="modal">Tutup</button>
					</div>
				</div>
                
			</div>
		</div>
		<script>
			function showModals( idemployee )
			{
				clearModals();
				document.getElementById("submitnew").style.display = "block"; 
				document.getElementById("submitaddnew").style.display = "block"; 
				document.getElementById("submitdelete").style.display = "none";
				if( idemployee )
				{
					clearModals();
					$.ajax({
						type: "POST",
						url: "<?php echo $pagepost; echo $modulename;?>_post.php",
						dataType: 'json',
						data: {idemployee:idemployee,type:"get"},
						success: function(res) {
							waitingDialog.hide();
							setModalData( res );
						}
					});
				}
				else
				{
					$("#myModalLabel").html("Add Employee");
					$("#type").val("new"); 
					waitingDialog.hide();
					$("#myModals").modal("show");
				}
			}
			
			function setModalData( data )
			{
				clearModals();
				$("#myModalLabel").html("Update Employee");
				$("#myModalLabel").html(data.real_name);
				$("#idemployee").val(data.idemployee);
				$("#type").val("edit");
				$("#identityno").val(data.identityno);
				$("#employeename").val(data.employeename);
				$("#nickname").val(data.nickname);
				$("#placebirth").val(data.placebirth);
				$("#datebirth").val(data.datebirth);
				$("#address").val(data.address);
				$("#cityid").val(data.cityid);
				$("#maritalstatus").val(data.maritalstatus);
				$("#sex").val(data.sex);
				$("#blood").val(data.blood);
				$("#educationlevelid").val(data.educationlevelid);
				$("#nik").val(data.nik);
				$("#joindate").val(data.joindate);
				$("#termdate").val(data.termdate);
				$("#insuranceno").val(data.insuranceno);
				$("#npwp").val(data.npwp);
				$("#departmentid").val(data.departmentid);
				$("#majorid").val(data.majorid);
				$("#locationid").val(data.locationid);
				$("#positionid").val(data.positionid);
				
				var positionid = data.positionid;
				$('#positionid option[value="' + positionid +'"]').prop("selected", true);
				var cityid = data.cityid;
				$('#cityid option[value="' + cityid +'"]').prop("selected", true);
				
				var maritalstatus = data.maritalstatus;
				$('#maritalstatus option[value="' + maritalstatus +'"]').prop("selected", true);
				var sex = data.sex;
				$('#sex option[value="' + sex +'"]').prop("selected", true);
				var departmentid = data.departmentid;
				$('#departmentid option[value="' + departmentid +'"]').prop("selected", true);
				var majorid = data.majorid;
				$('#majorid option[value="' + majorid +'"]').prop("selected", true);
				var educationlevelid = data.educationlevelid;
				$('#educationlevelid option[value="' + educationlevelid +'"]').prop("selected", true);
				var locationid = data.locationid;
				$('#locationid option[value="' + locationid +'"]').prop("selected", true);
				var status = data.status;
				$('#status option[value="' + status +'"]').prop("selected", true);
				$("#myModals").modal("show");
				waitingDialog.hide();	
				
				$("#myModals").modal("show");
				waitingDialog.hide();	
			}
			
			function deleteData( idemployee )
			{
				clearModals();
				$.ajax({
					type: "POST",
					url: "<?php echo $pagepost; echo $modulename;?>_post.php",
					dataType: 'json',
					data: {idemployee:idemployee,type:"get"},
					success: function(data) {
						$("#myModalLabel").html("Delete Employee");
						$("#idemployee").val(data.idemployee);
						$("#identityno").val(data.identityno);
						$("#employeename").val(data.employeename);
						$("#nickname").val(data.nickname);
						$("#placebirth").val(data.placebirth);
						$("#datebirth").val(data.datebirth);
						$("#address").val(data.address);
						$("#cityid").val(data.cityid);
						$("#maritalstatus").val(data.maritalstatus);
						$("#sex").val(data.sex);
						$("#blood").val(data.blood);
						$("#educationlevelid").val(data.educationlevelid);
						$("#nik").val(data.nik);
						$("#joindate").val(data.joindate);
						$("#termdate").val(data.termdate);
						$("#insuranceno").val(data.insuranceno);
						$("#npwp").val(data.npwp);
						$("#departmentid").val(data.departmentid);
						$("#majorid").val(data.majorid);
						$("#locationid").val(data.locationid);
						$("#type").val("delete");
						$("#identityno").val(data.identityno).attr("disabled","false");
						$("#employeename").val(data.employeename).attr("disabled","false");
						$("#nickname").val(data.nickname).attr("disabled","false");
						$("#placebirth").val(data.placebirth).attr("disabled","false");
						$("#datebirth").val(data.datebirth).attr("disabled","false");
						$("#address").val(data.address).attr("disabled","false");
						$("#positionid").val(data.positionid).attr("disabled","false");
						$("#cityid").val(data.cityid).attr("disabled","false");
						$("#maritalstatus").val(data.maritalstatus).attr("disabled","false");
						$("#sex").val(data.sex).attr("disabled","false");
						$("#blood").val(data.blood).attr("disabled","false");
						$("#educationlevelid").val(data.educationlevelid).attr("disabled","false");
						$("#nik").val(data.nik).attr("disabled","false");
						$("#joindate").val(data.joindate).attr("disabled","false");
						$("#termdate").val(data.termdate).attr("disabled","false");
						$("#insuranceno").val(data.insuranceno).attr("disabled","false");
						$("#npwp").val(data.npwp).attr("disabled","false");
						$("#departmentid").val(data.departmentid).attr("disabled","false");
						$("#majorid").val(data.majorid).attr("disabled","false");
						$("#locationid").val(data.locationid).attr("disabled","false");
						
						var cityid = data.cityid;
						$('#cityid option[value="' + cityid +'"]').prop("selected", true);
						var maritalstatus = data.maritalstatus;
						$('#maritalstatus option[value="' + maritalstatus +'"]').prop("selected", true);
						var sex = data.sex;
						$('#sex option[value="' + sex +'"]').prop("selected", true);
						var departmentid = data.departmentid;
						$('#departmentid option[value="' + departmentid +'"]').prop("selected", true);
						var majorid = data.majorid;
						$('#majorid option[value="' + majorid +'"]').prop("selected", true);
						var educationlevelid = data.educationlevelid;
						$('#educationlevelid option[value="' + educationlevelid +'"]').prop("selected", true);
						var locationid = data.locationid;
						$('#locationid option[value="' + locationid +'"]').prop("selected", true);
						var status = data.status;
						$('#status option[value="' + status +'"]').prop("selected", true);
						$("#myModals").modal("show");
						
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
				var counter = document.getElementById("employeename").value; 
				if (counter == '') {
				  $('#formData').formValidation('validate');
				  } else {
						var formData = $("#formData").serialize();
						//waitingDialog.show();
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
						dTable.ajax.reload();
						waitingDialog.hide();	
						$('#myModals').modal('hide');
						RefreshData();
	 			}
			}
			function submitDataAdd()
			{
				var counter = document.getElementById("employeename").value; 
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
						dTable.ajax.reload();
						waitingDialog.hide();	
						showModals();
	 			}
			}
			function clearModals()
			{
				$("#removeWarning").hide();
				$("#idemployee").val("").removeAttr( "disabled" );
				$("#identityno").val("").removeAttr( "disabled" );
				$("#employeename").val("").removeAttr( "disabled" );
				$("#nickname").val("").removeAttr( "disabled" );
				$("#placebirth").val("").removeAttr( "disabled" );
				$("#datebirth").val("").removeAttr( "disabled" );
				$("#address").val("").removeAttr( "disabled" );
				$("#cityid").val("").removeAttr( "disabled" );
				$("#maritalstatus").val("").removeAttr( "disabled" );
				$("#sex").val("").removeAttr( "disabled" );
				$("#positionid").val("").removeAttr( "disabled" );
				$("#blood").val("").removeAttr( "disabled" );
				$("#educationlevelid").val("").removeAttr( "disabled" );
				$("#nik").val("").removeAttr( "disabled" );
				$("#joindate").val("").removeAttr( "disabled" );
				$("#termdate").val("").removeAttr( "disabled" );
				$("#insuranceno").val("").removeAttr( "disabled" );
				$("#npwp").val("").removeAttr( "disabled" );
				$("#departmentid").val("").removeAttr( "disabled" );
				$("#majorid").val("").removeAttr( "disabled" );
				$("#locationid").val("").removeAttr( "disabled" );
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
            employeename: {
                validators: {
                    notEmpty: {
                        message: 'Employee name is required'
                    }
                }
            },
			nik: {
                validators: {
                    notEmpty: {
                        message: 'NIK is required'
                    }
                }
            },
			identityno: {
                validators: {
                    notEmpty: {
                        message: 'Identity no is required'
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
function PopupCenterDual(url, title, w, h) {
// Fixes dual-screen position Most browsers Firefox
var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;
var dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;
width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

var left = ((width / 2) - (w / 2)) + dualScreenLeft;
var top = ((height / 2) - (h / 2)) + dualScreenTop;
var newWindow = window.open(url, title, 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);

// Puts focus on the newWindow
if (window.focus) {
newWindow.focus();
}
}
</script>




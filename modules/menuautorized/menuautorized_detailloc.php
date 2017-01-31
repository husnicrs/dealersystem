<?php
$db=new Database();
$users = new Users();
	if (isset($_GET['key'])) {
	    $key = $_GET['key'];
	    $data = $users->showUpdDetail($key);
	    extract($data);
	}
    if(isset($_REQUEST['deteteuser'])){
        extract($_REQUEST);
        $users->deleteuser($key);
		$users->deleteusermenu($key);
		$users->deleteuserpart($key);
	}   
	if(isset($_REQUEST['updateuser'])){
        extract($_REQUEST);
		$key = $_GET['key'];
        $users->upduserautorized($username, $usertypeid, $email, $name, $key);
	}   

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Otorisasi Lokasi
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Utility</a></li>
    <li class="active">Otorisasi Lokasi</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
    <div class="box box-danger">
        <div class="box-header with-border">
           <div class="box-body">
            <form class="form-horizontal"  method="post" action="" enctype="multipart/form-data">
          <div class="row">
            <div class="col-xs-2">
              <label for="exampleInputEmail1">ID Pengguna</label>
              <input type="text" class="form-control" value="<?php echo $username; ?>" placeholder="ID Pengguna" name="username" data-toggle="tooltip" data-placement="top" title="ID Pengguna">
            </div>            

            <div class="col-xs-4">
              <label for="exampleInputEmail1">Nama Lengkap</label>
              <input type="text" class="form-control" value="<?php echo $name; ?>" placeholder="Nama Lengkap" name="name" data-toggle="tooltip" data-placement="top" title="Nama Lengkap">
            </div>            
            <div class="col-xs-3">
              <label for="exampleInputEmail1">E-mail</label>
              <input type="text" class="form-control" value="<?php echo $email; ?>" placeholder="E-Mail" name="email" data-toggle="tooltip" data-placement="top" title="E-Mail">
            </div>            
            <div class="col-xs-2">
              <label for="exampleInputEmail1"> Tipe Pengguna</label>
<select class="form-control select2" name="usertypeid">
                <option value= "<?php echo $usertypeid; ?>"><?php echo $usertypename; ?></option>
                   <?php
                        $rl = new Users();
                        $datarl = $rl->showusertype();
                        foreach ($datarl as $value) {
                            extract($value);
                            echo "<option value='".$idusertype."'>".$usertypename."</option>";
                        }
                    ?>
              </select>
            </div>            
          </div>
        </div><!-- /.box-body -->
      </div><!-- /.box --></div>
      <div class="box">
      <div class="box-header">
        </div><!-- /.box-header -->
        <div class="box-body">
           <div class="nav-tabs-custom" style="margin-top:-20px !important;">
                 <ul class="nav nav-tabs">
                  <li data-toggle="tooltip" data-placement="top" title="Tambah data otorisasi menu baru"><a href="index.php?mod=menuautorized_detail&key=<?php echo $key ?>" >Otorisasi Menu </a></li>
                  <li class="active" data-toggle="tooltip" data-placement="top" title="Tambah data otorisasi bidang"><a href="index.php?mod=menuautorized_detailpart&key=<?php echo $key ?>">Otorisasi Lokasi </a></li>
                </ul>
            </div>
              <div class="margin" style="margin-left:-5px !important">
                  <button onClick="showModals()" type="button" class="btn btn-default btn-flat"> <i class="fa fa-sticky-note-o"></i> Tambah Baru</button>
                  <button onClick="RefreshData()" type="button" class="btn btn-success btn-flat"> <i class="fa fa-refresh"></i> Refresh Data</button>
                  <a href="?mod=menuautorized" type="button" class="btn btn-info btn-flat"> <i class="fa fa-reply"></i> Kembali</a>
              </div>    

		<script type="text/javascript" language="javascript" >
			var dTable;
			$(document).ready(function() {
				dTable = $('#datagrid').DataTable( {
					"bProcessing": true,
					"bServerSide": true,
					"bJQueryUI": false,
					"responsive": true,
					"sAjaxSource": "<?php echo $pagepost; ?>menuautorized_showdetailloc.php?key=<?php echo $key ?>",
					"sServerMethod": "POST",
					"columnDefs": [
					{ "orderable": true, "targets": 0, "searchable": true },
					{ "orderable": true, "targets": 1, "searchable": true }
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
                    <th>Lokasi</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <!-- Modal Popup -->
          <div class="box-tools pull-right">
              <a href="?mod=menuautorized" type="button" class="btn btn-default btn-flat"> <i class="fa fa-close"></i> Close</a>
                <button class="btn btn-danger btn-flat" name="deteteuser"><i class="fa fa-trash-o"></i> Delete User</button>
                <button class="btn btn-primary btn-flat" name="updateuser"><i class="fa fa-edit"></i> Update User</button>
          </div><!-- /.box-tools -->
          </form>
		<div class="modal fade" id="myModals" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Otorisasi Lokasi</h4>
					</div>
					<div class="modal-body">
                    <div class="row">
						<form class="form-horizontal" id="formData" action="">
							<input type="hidden" class="form-control" id="userid" name="userid" value="<?php echo $key ?>">
                            <input type="hidden" class="form-control" id="iduserautorized" name="iduserautorized">
							<input type="hidden" class="form-control" id="type" name="type">
                             <div class="col-md-12">
							<div class="form-group">
								<label for="real_name" class="col-sm-3 control-label">Nama Lokasi</label>
								<div class="col-sm-8">
                                  <select class="col-sm-2 control-label"  style="width: 100%;" name="locationid" id="locationid">
                                  <option value="">PILIH LOKASI</option>
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
						</form>
					</div>
                    <!-- Modal Popup -->
					<div class="modal-footer">
						<button type="button" onClick="submitUser()" class="btn btn-primary">Submit</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
        </div>
        <div class="modal fade" id="myModalsDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Delete Part Autorized</h4>
					</div>
						<form class="form-horizontal" id="formDataDelete" action="">
                            <input type="hidden" class="form-control" id="iduserautorizeddelete" name="iduserautorizeddelete">
							<input type="hidden" class="form-control" id="typedelete" name="typedelete">
						</form>
                    <!-- Modal Popup -->
					<div class="modal-footer">
						<button type="button" onClick="submitUserDelete()" class="btn btn-danger">Delete</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		<script>
			function showModals( iduserautorized )
			{
				clearModals();
				if( iduserautorized )
				{
					clearModals();
					$.ajax({
						type: "POST",
						url: "<?php echo $pagepost; ?>menuautorized_postloc.php",
						dataType: 'json',
						data: {iduserautorized:iduserautorized,type:"get"},
						success: function(res) {
							waitingDialog.hide();
							setModalData( res );
						}
					});
				}
				else
				{
					$("#myModals").modal("show");
					$("#myModalLabel").html("Tambah Lokasi Pengguna");
					$("#type").val("new"); 
					waitingDialog.hide();
				}
			}
			
			function setModalData( data )
			{
				clearModals();
				$("#myModalLabel").html("Otorisasi Pengguna");
				$("#myModalLabel").html(data.real_name);
				$("#type").val("edit");
				$("#iduserautorized").val(data.iduserautorized);
				var i = data.partid;
				$('#partid option[value="' + i +'"]').prop("selected", true);

				$("#myModals").modal("show");
				waitingDialog.hide();	
			}
			function deleteUser( iduserautorized )
			{
				clearModals();
				$.ajax({
					type: "POST",
					url: "<?php echo $pagepost; ?>menuautorized_postlocdelete.php",
					dataType: 'json',
					data: {iduserautorized:iduserautorized,typedelete:"get"},
					success: function(data) {
						$("#myModalLabel").html("Delete Autorized");
						$("#iduserautorizeddelete").val(data.iduserautorized);
						$("#typedelete").val("delete");
						//$("#iduserautorizeddelete").val(data.iduserautorized).attr("disabled","true");
						$("#myModalsDelete").modal("show");
						waitingDialog.hide();			
					}
				});
			}
			function submitUser()
			{
				var formData = $("#formData").serialize();
				//waitingDialog.show();
				$.ajax({
					type: "POST",
					url: "<?php echo $pagepost; ?>menuautorized_postloc.php",
					dataType: 'json',
					data: formData,
					success: function(data) {
						dTable.ajax.reload(); 
						//waitingDialog.hide();	
						$('#myModals').modal('hide');
					}
				});
			}
			function submitUserDelete()
			{
				var formData = $("#formDataDelete").serialize();
				//waitingDialog.show();
				$.ajax({
					type: "POST",
					url: "<?php echo $pagepost; ?>menuautorized_postlocdelete.php",
					dataType: 'json',
					data: formData,
					success: function(data) {
						dTable.ajax.reload(); 
						//waitingDialog.hide();	
						$('#myModalsDelete').modal('hide');
					}
				});
			}
			function clearModals()
			{
				$("#removeWarning").hide();
				$("#iduserautorized").val("").removeAttr( "disabled" );
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
            partid: {
                validators: {
                    stringLength: {
                        enabled: false,
                        min: 4,
                        message: 'The menu name must be more than 5 characters'
                    },
                    notEmpty: {
                        message: 'The part name is required'
                    }
                }
            }
        }
    });
});

</script>



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
       <table id="datagrid"  class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Action</th>
                    <th>Kode</th>
                    <th>Nama Pelanggan</th>
                    <th>Tipe</th>
                    <th>Alamat</th>
                    <th>Telpon</th>
                    <th>Handphone</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>		
        <!-- Modal Popup -->
		<div class="modal fade" id="myModals" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog" style="width:50% !important">
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
								<label for="real_name" class="col-sm-3 control-label">Kode</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="registrationno" name="registrationno">
								</div>
							</div>
							<div class="form-group">
								<label for="real_name" class="col-sm-3 control-label">Nama Pelanggan</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="customername" name="customername">
								</div>
							</div>
                            <div class="form-group">
                                <label for="real_name" class="col-sm-3 control-label">Tipe Pelanggan</label>
                                <div class="col-sm-9">
                                <select class="form-control"  style="width: 100%;" name="customertypeid" id="customertypeid"  placeholder="Tipe Pelanggan">
                                   <?php
                                        $rl = new Combobox();
                                        $datarl = $rl->showCustomertype();
                                        foreach ($datarl as $value) {
                                            extract($value);
                                            echo "<option value='".$idcustomertype."'>".$customertypename."</option>";
                                        }
                                    ?>
                                  </select>
                                </div>
                            </div>
							<div class="form-group">
								<label for="real_name" class="col-sm-3 control-label">Alamat </label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="address1" name="address1">
								</div>
							</div>
                            <div class="form-group">
								<label for="real_name" class="col-sm-3 control-label">Telp </label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="phone1" name="phone1">
								</div>
							</div>
							<div class="form-group">
								<label for="real_name" class="col-sm-3 control-label">Handphone</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="phone2" name="phone2">
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
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row --> 
</section><!-- /.content -->
</div>

<?php
	echo "<link rel='stylesheet' type='text/css' href='modules/".$modulename."/css/page.css' />";
	echo "<script type='text/javascript' src='modules/".$modulename."/js/page.js'></script>";
?>
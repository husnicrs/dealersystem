<?php
$db=new Database();
$subnavmenu = new Subnavmenu();
$modulename=$_GET['mod'];
$datasubnavmenu = $subnavmenu->showsubnavmenu($modulename);
extract($datasubnavmenu);

$inventoryadj = new Inventoryadj();
    if(isset($_REQUEST['submit'])){
        extract($_REQUEST);
        $inventoryadj->insert($codetrans);
	} 
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
      <div class="box-header with-border">
          <a href="#" data-toggle="modal" data-easein="swoopIn" data-target=".MyModals" type="button" class="btn btn-primary btn-flat"> <i class="fa fa-sticky-note-o"></i> Tambah Baru</a>
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
                    <th>No Pakai</th>
                    <th>Tgl Pakai</th>
                    <th>Jenis Pakai</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                 </tr>
            </thead>
            <tbody>
            </tbody>
        </table>		
        <!-- Modal Popup -->
		<div class="modal fade MyModals" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
			<div class="modal-dialog" style="width:420px !important;">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Pilih kode transaksi</h4>
					</div>
                    <form class="form-horizontal" id="formData" name="formaccount"  method="post" action="" enctype="multipart/form-data">
                        <div class="modal-body">
							<input type="hidden" class="form-control" id="idperiod" name="idperiod">
							<input type="hidden" class="form-control" id="type" name="type">
							<div class="form-group">
								<label for="real_name" class="col-sm-3 control-label">Transaksi</label>
								<div class="col-sm-8">
                                  <select class="form-control"  style="width: 100%;" name="codetrans" id="codetrans"  placeholder="Transaction Code">
                                      <option value="INVA">Koreksi Stok</option>
                                  </select>
								</div>
							</div>
						</div>
					<div class="modal-footer">
                        <button class="btn btn-warning btn-flat">Submit</button>
                        <input type="hidden" value="1" name="submit" />
						<button type="button" onclick="ClearVal()" class="btn btn-default btn-flat pull-left" data-dismiss="modal">Tutup</button>
					</div>
                    </form>
				</div>
			</div>
		</div>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row --> 
</section><!-- /.content -->

<?php
	echo "<link rel='stylesheet' type='text/css' href='modules/".$modulename."/css/page.css' />";
	echo "<script type='text/javascript' src='modules/".$modulename."/js/page.js'></script>";
?>
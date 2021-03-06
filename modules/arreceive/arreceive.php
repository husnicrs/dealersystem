<?php
	$db=new Database();
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
     <!-- Custom Tabs -->
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#tab_1" data-toggle="tab" onClick="RefreshDataOpen()">Belum Pencairan</a></li>
          <li><a href="#tab_2" data-toggle="tab" onClick="RefreshData()">Sudah Pencairan</a></li>
        </ul>
        <div class="tab-content">
         <div class="tab-pane active" id="tab_1">
         <div class="box box-danger">
            <div class="box-body">
              <table id="datagridopen" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No Jual</th>
                    <th>Tgl Jual</th>
                    <th>No SPK</th>
                    <th>No DO</th>
                    <th>No KTP</th>
                    <th>Pelanggan</th>
                    <th>Leasing</th>
                    <th>PO No</th>
                    <th>Model</th>
                    <th>Selisih</th>
                  </tr>
                </thead>
                <tbody>
                </tbody> 
              </table>
        	</div><!-- /.box-body -->
     	</div>
     </div><!-- /.tab-pane -->
     <div class="tab-pane" id="tab_2">
      <div class="box box-danger">
      <div class="box-header with-border">
          <button onClick="history.back()" type="button" class="btn btn-primary btn-flat" data-toggle="tooltip" data-placement="top" > <i class="fa fa-undo"></i> Kembali</button>
          <button onClick="RefreshData()" type="button" class="btn btn-success btn-flat"> <i class="fa fa-refresh"></i> Refresh </button>
          <div class="box-tools pull-right">
              <div class="tableTools-container">
                  <button class="btn btn-white btn-primary  btn-bold" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
          </div><!-- /.box-tools -->
      </div>
      <div class="box-header" style="margin-top:-20px">
        </div><!-- /.box-header -->
        <div class="box-body">
        <table id="datagridlist"  class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No Jual</th>
                    <th>Tgl Cair</th>
                    <th>Nama</th>
                    <th>Model</th>
                    <th>Leasing</th>
                    <th>No Kontrak</th>
                    <th>Penagihan</th>
                    <th>Pencairan</th>
                    <th>Selisih</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>		
        </div><!-- /.box-body -->
      </div><!-- /.box -->
      </div><!-- /.tab-pane -->
  </div>
  </div>
    </div><!-- /.col -->
  </div><!-- /.row --> 
</section><!-- /.content -->
</div>

<?php
	echo "<link rel='stylesheet' type='text/css' href='modules/".$modulename."/css/open/page.css' />";
	echo "<script type='text/javascript' src='modules/".$modulename."/js/open/page.js'></script>";
	echo "<link rel='stylesheet' type='text/css' href='modules/".$modulename."/css/list/page.css' />";
	echo "<script type='text/javascript' src='modules/".$modulename."/js/list/page.js'></script>";
?>
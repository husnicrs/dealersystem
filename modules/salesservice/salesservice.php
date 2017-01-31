<?php
$db=new Database();
$subnavmenu = new Subnavmenu();
$modulename=$_GET['mod'];
$datasubnavmenu = $subnavmenu->showsubnavmenu($modulename);
extract($datasubnavmenu);

$sales = new Salesservice();
    if(isset($_REQUEST['submit'])){
        extract($_REQUEST);
        $sales->insert($codetrans);
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
      <form class="form-horizontal" id="formData" name="formaccount"  method="post" action="" enctype="multipart/form-data">
      	  <input type="hidden" name="codetrans" value="SASV">
          <button class="btn btn-primary btn-flat" name="submit"><i class="fa fa-sticky-note-o"></i> Tambah Baru</button>
          <button onClick="history.back()" type="button" class="btn btn-primary btn-flat" data-toggle="tooltip" data-placement="top"> <i class="fa fa-undo"></i> Kembali</button>
          <button onClick="RefreshData()" type="button" class="btn btn-success btn-flat"> <i class="fa fa-refresh"></i> Refresh</button>
          <div class="box-tools pull-right">
          <div class="tableTools-container">
              <button class="btn btn-white btn-primary  btn-bold" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
          </div><!-- /.box-tools -->
       </form>   
      </div>
      <div class="box-header" style="margin-top:-20px">
        </div><!-- /.box-header -->
        <div class="box-body">
        <table id="datagrid"  class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No Trans</th>
                    <th>Tgl Trans</th>
                    <th>Plat No</th>
                    <th>Pelanggan</th>
                    <th>Jenis Pembayaran</th>
                    <th>No Telp</th>
                    <th>Kasir</th>
                    <th>Mekanik</th>
                    <th>Total</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                 </tr>
            </thead>
            <tbody>
            </tbody>
        </table>		
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
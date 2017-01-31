<?php
$dasboard = new Dasboard();
$core=new Core();
$dataticketcount = $dasboard->ticketcount($user);
$datanotifcount = $dasboard->notifcount();
$datausercount = $dasboard->usercount();
$datavalsales = $dasboard->valsales();
$datavalvalsalessalesservice = $dasboard->valsalessalesservice();
$datavalsalesvehicle = $dasboard->valsalesvehicle();
$datavalsalesvehiclesj = $dasboard->valsalesvehiclesj();
$datavalpurchase = $dasboard->valpurchase();
$datavalcashreceipt = $dasboard->valcashreceipt();
$datavalcashpayment = $dasboard->valcashpayment();
$datavalappayment = $dasboard->valappayment();
$modname="dasboard";
?>
<!-- Full Width Column -->
<div class="content-wrapper">
<div class="container">
  <!-- Content Header (Page header) -->
  <section class="content-header">
	<h1>
    <div id="type"></div>
	</h1>
	<ol class="breadcrumb">
	  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	  <li><a href="#">Index</a></li>
	  <li class="active">Welcome</li>
	</ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
        <div class="col-md-6">
           <!-- TABLE: LATEST ORDERS -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Transaksi hari ini</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div><!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table class="table no-margin">
              <thead style="background-color:#979700 !important">
                <tr>
                  <th>Transaksi</th>
                  <th>Modul</th>
                  <th>Jumlah</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><a href="#">Penjualan Sparepart</a></td>
                  <td>Penjualan</td>
					<?php
                        $i=1;
                        if($datavalsales !=0){
                        foreach ($datavalsales as $value) {
                        extract($value);
                     ?>   
                  <td><?php echo $valsales; ?></td>
                  <?php
					$i++;
						}
						}
				 ?>
                </tr>
                <tr>
                  <td><a href="#">Servis Kendaraan</a></td>
                  <td>Penjualan</td>
					<?php
                        $i=1;
                        if($datavalvalsalessalesservice !=0){
                        foreach ($datavalvalsalessalesservice as $value) {
                        extract($value);
                     ?>   
                  <td><?php echo $valsalesservice; ?></td>
                  <?php
					$i++;
						}
						}
				 ?>
                </tr>
                <tr>
                  <td><a href="#">Penjualan Kendaraan</a></td>
                  <td>Penjualan</td>
					<?php
                        $i=1;
                        if($datavalsalesvehicle !=0){
                        foreach ($datavalsalesvehicle as $value) {
                        extract($value);
                     ?>   
                  <td><?php echo $valsalesvehicle; ?></td>
                  <?php
					$i++;
						}
						}
				 ?>
                </tr>
                 <tr>
                  <td><a href="#">Surat Jalan Kendaraan</a></td>
                  <td>Penjualan</td>
					<?php
                        $i=1;
                        if($datavalsalesvehiclesj !=0){
                        foreach ($datavalsalesvehiclesj as $value) {
                        extract($value);
                     ?>   
                  <td><?php echo $valsalesvehiclesj; ?></td>
                  <?php
					$i++;
						}
						}
				 ?>
                </tr>    
                <tr>
                  <td><a href="#">Pembelian</a></td>
                  <td>Pembelian</td>
					<?php
                        $i=1;
                        if($datavalpurchase !=0){
                        foreach ($datavalpurchase as $value) {
                        extract($value);
                     ?>   
                  <td><?php echo $valpurchase; ?></td>
                  <?php
					$i++;
						}
						}
				 ?>
                </tr> 
                          
              </tbody>
            </table>
          </div><!-- /.table-responsive -->
        </div><!-- /.box-body -->
       
      </div><!-- /.box -->
        </div><!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-green"><i class="fa fa-file-text"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Log Pengguna</span>
            <?php
				$i=1;
				if($datalog !=0){
				foreach ($datalog as $valuenotif) {
				extract($valuenotif);
			 ?>   
          	<span class="info-box-number"><?php echo $iduserlog; ?></span>
           	<?php
				$i++;
					}
					}
			 ?>
             <a href="index.php?mod=userlog">Lihat Log</a>
        </div><!-- /.info-box-content -->
      </div><!-- /.info-box -->
    </div><!-- /.col -->
   <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-globe"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Total Pemberitahuan</span>
		 	<?php
				$i=1;
				if($datanotifcount !=0){
				foreach ($datanotifcount as $valuenotif) {
				extract($valuenotif);
			 ?>   
          	<span class="info-box-number"><?php echo $notificationcount; ?></span>
           	<?php
				$i++;
					}
					}
			 ?>
             <a href="index.php?mod=readnotification">Lihat Pemberitahuan</a>
        </div><!-- /.info-box-content -->
      </div><!-- /.info-box -->
    </div><!-- /.col -->
    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-aqua"><i class="fa fa-envelope"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Pesan Masuk</span>
            <?php
				$i=1;
				if($dataticketcount !=0){
				foreach ($dataticketcount as $value) {
				extract($value);
			 ?>   
          <span class="info-box-number"><?php echo $ticketcount; ?></span>
           <?php
				$i++;
					}
					}
			 ?>
             <a href="index.php?mod=ticket">Lihat Pesan</a>
        </div><!-- /.info-box-content -->
      </div><!-- /.info-box -->
    </div><!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Total Pengguna</span>
            <?php
				$i=1;
				if($datausercount !=0){
				foreach ($datausercount as $value) {
				extract($value);
			 ?>   
          <span class="info-box-number"><?php echo $countuser; ?></span>
           <?php
				$i++;
					}
					}
		   ?>
        </div><!-- /.info-box-content -->
      </div><!-- /.info-box -->
    </div><!-- /.col -->
  </div><!-- /.row -->

  </section><!-- /.content -->
</div><!-- /.container -->
</div><!-- /.content-wrapper -->


<style>
#type {
    margin-bottom: 15px;
    font-size: 18px;
    font-weight: 200;
}
@media screen and (min-width: 768px) {
    #type {
        font-size: 23px;
    }
}
</style>



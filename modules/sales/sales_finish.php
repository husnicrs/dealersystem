<?php
$db=new Database();
$subnavmenu = new Subnavmenu();
$moddetail=$_GET['mod'];
$modulename=str_replace("_finish","", $moddetail );
$datasubnavmenu = $subnavmenu->showsubnavmenu($modulename);
extract($datasubnavmenu);

$salesorder = new Sales();
$slip = new Slip();
	if (isset($_GET['key'])) {
	    $key = $_GET['key'];
	    $data = $salesorder->showDetail($key);
	    extract($data);
		$datadetail = $salesorder->showslipdetail($key);
		$datatotal = $salesorder->showsliptotal($key);

		$submodule= str_replace("modules/","", $modulesname );
		$dataslip = $slip->showSlip($submodule);
	    extract($dataslip);
	}
	
	if(isset($_REQUEST['submit'])){
        extract($_REQUEST);
        $salesorder->insert($codetrans);
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
<div class="pad margin no-print">
</div>
<!-- Main content -->
<section class="invoice">
  <!-- title row -->
  <div class="row">
    <div class="col-xs-12">
        <form class="form-horizontal" id="formData" name="formaccount"  method="post" action="" enctype="multipart/form-data">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> MITRA UTAMA MOTOR
                  <a class="btn btn-default pull-right" onclick="reloadprint()"><i class="fa fa-print"  style="margin-right: 5px;"></i> Cetak</a>
                  <input type="hidden" name="codetrans" value="SALE">
                  <button class="btn btn-primary pull-right" style="margin-right: 5px;" name="submit"><i class="fa fa-plus"></i> Tambah Baru</button>
                 
          </h2>
      </form>   
    </div><!-- /.col -->
  </div>
  <!-- info row -->
  <div class="row invoice-info">
    <div class="col-sm-4 invoice-col">
      <b>No Trans  : <?php echo $notrans; ?></b><br>
      <b>Tgl Trans :</b> <?php echo $datetrans; ?><br>
      <b>Pelanggan :</b> <?php echo $customername; ?><br>
    </div><!-- /.col -->
    <div class="col-sm-4 invoice-col">
      <br>
      <b>Total   :</b> <?php echo number_format($totalamount); ?><br>
      <b>Bayar   :</b> <?php echo number_format($payamount); ?><br>
      <b>Kembali :</b> <?php echo number_format($changeamount); ?><br>
    </div><!-- /.col -->

  </div><!-- /.row -->
<br />
  <!-- Table row -->
  <div class="row">
    <div class="col-xs-12 table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
          	<th>Kode Part</th>
            <th>Nama Part</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Diskon</th>
            <th>Subtotal</th>
          </tr>
        </thead>
        <tbody>
         <?php
			$i=1;
			if($datadetail !=0){
			foreach ($datadetail as $value) {
			extract($value);
		 ?>  

          <tr>
            <td><?php echo $inventorycode ?></td>
            <td><?php echo $inventoryname ?></td>
            <td><?php echo number_format($unitprice) ?></td>
            <td><?php echo $quantity ?></td>
            <td><?php echo $discount ?></td>
            <td><?php echo number_format($amount) ?></td>
          </tr>
		<?php
			$i++;
				}
				} else{
					$core->pesan_warning("Content is emty, please input a data or check your database");
				}
		 ?>   

        </tbody>
      </table>
    </div><!-- /.col -->
  </div><!-- /.row -->

  <div class="row">
    <!-- accepted payments column -->
    <div class="col-xs-6">
      <div class="table-responsive">
        <table class="table">
          
              <?php
				$i=1;
				if($datatotal !=0){
				foreach ($datatotal as $value) {
				extract($value);
			 ?>  
             <tr>
             <th>Total Jumlah:</th>
            <td><?php echo number_format($tquantity) ?></td>
            </tr>
            <tr>
            <th>Total:</th>
            <td><?php echo number_format($tamount) ?></td>
            </tr>
             <?php
				$i++;
					}
					} else{
						$core->pesan_warning("Content is emty, please input a data or check your database");
					}
			 ?>  
        </table>
      </div>
    </div><!-- /.col -->
  </div><!-- /.row -->

  <!-- this row will not appear when printing -->
  <div class="row no-print">
    <div class="col-xs-12">
      
    </div>
  </div>
</section><!-- /.content -->
<div class="clearfix"></div>
</div><!-- /.content-wrapper -->



<script type="text/javascript">
	function PopupCenter(url, title, w, h) {  
		// Fixes dual-screen position                         Most browsers      Firefox  
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
	window.onload = function() {
		var w = PopupCenter('report.php?mod=sales_slip&key=<?php echo $key; ?>','Popup_Window','800','670');
		this.target = 'Popup_Window';
	};
	
	function reloadprint() {
		location.reload();
	}
</script>


<?php
$db=new Database();
$subnavmenu = new Subnavmenu();
$moddetail=$_GET['mod'];
$modulename=str_replace("_detail","", $moddetail);
$datasubnavmenu = $subnavmenu->showsubnavmenu($modulename);
extract($datasubnavmenu);

$username1=$_SESSION['uname'];

$data = $subnavmenu->showfilter();
extract($data);

${"$modulename"} = new Cashother();
$slip = new Slip();
	if (isset($_GET['key'])) {
	    $key = $_GET['key'];
	    $data = ${"$modulename"}->showDetail($key);
	    extract($data);
		$submodule= str_replace("modules/","", $modulesname );
		$dataslip = $slip->showSlip($submodule);
	    extract($dataslip);
	}
	if(isset($_REQUEST['saveclose'])){
        extract($_REQUEST);
		$key = $_GET['key'];
        ${"$modulename"}->saveclose($key, $datetrans, $cashothertype, $amount, $taxamount, $total, $remark);
		
	}
	if(isset($_REQUEST['delete'])){
        extract($_REQUEST);
		$key = $_GET['key'];
        ${"$modulename"}->delete($key);
	}
?>
<style>
fieldset.scheduler-border {
    border: 1px groove #ddd !important;
    padding: 0 0.4em 0.4em 0.4em !important;
    margin: 0 0 0.5em 0 !important;
    -webkit-box-shadow:  0px 0px 0px 0px #000;
            box-shadow:  0px 0px 0px 0px #000;
}
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
        <form class="form-horizontal" id="formData" name="formData"  method="post" action="" enctype="multipart/form-data">
        <input type="hidden" class="form-control" id="idtrans" name="idtrans" value="<?php echo $key; ?>">
        <input type="hidden" class="form-control" id="type" name="type" value="generate">
        <input type="hidden" class="form-control" id="soid" name="soid" value="<?php echo $soid; ?>">
            <div class="box-header with-border">
               <div class="row">
                <!-- Coloumn 1-->
               <div class="col-md-4">
                    <div class="form-group">
                        <label for="real_name" class="col-sm-3 control-label">No Kas</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="notrans" name="notrans"  value="<?php echo $notrans; ?>" disabled="disabled">
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">Tgl Kas</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                               <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                              <input type="text" class="form-control pull-right" id="datetrans"  placeholder="Transaction Date" value="<?php echo $datetrans; ?>"  name="datetrans" data-toggle="tooltip" data-placement="transdate" title="Transaction Date" data-date-format="dd/mm/yyyy">
                            </div><!-- /.input group -->
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">Jenis</label>
                        <div class="col-sm-9">
                            <select class="form-control" style="width: 100%;" name="cashothertype"  id="cashothertype">
                               <option value="REFUND LEASING">REFUND LEASING</option>
                               <option value="BAYAR PAJAK">BAYAR PAJAK</option>
                               <option value="GAJI STAFF">GAJI STAFF</option>
                            </select>
                        </div>
                    </div>
                </div>
                                   
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="real_name" class="col-sm-3 control-label">Nominal</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="amountsw" name="amountsw"  value="<?php echo $amountsw; ?>" oninput="calculate(); calculatetotalbbn();">
                            <input type="hidden" id="amount" name="amount"  value="<?php echo $amount; ?>">
                        </div>
                    </div>
                     <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">Pajak</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="taxamountsw" name="taxamountsw"  value="<?php echo $taxamountsw; ?>" oninput="calculate(); calculatetotalbbn();">
                            <input type="hidden" id="taxamount" name="taxamount"  value="<?php echo $taxamount; ?>">
                        </div>
                    </div>
                     <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">Total</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="totalsw" name="totalsw"  value="<?php echo $totalsw; ?>" oninput="calculate(); calculatetotalbbn();">
                            <input type="hidden" id="total" name="total"  value="<?php echo $total; ?>">
                        </div>
                </div>
            </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="real_name" class="col-sm-3 control-label">Keterangan</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="remark" name="remark"><?php echo $remark; ?></textarea>
                        </div>
                    </div>
                    
            </div>

          </div><!-- /.box-header -->
         <div class="box-footer">
         <div class="pull-right">
            <button class="btn btn-primary" name="saveclose" id="saveclose"><i class="fa fa-save"></i> Simpan</button>
            <button class="btn btn-danger" name="delete" id="delete"><i class="fa fa-save"></i> Hapus</button>
            <a  href="index.php?mod=<?php echo str_replace("_detail","", $modulename ); ?>" type="button" class="btn btn-default"> <i class="fa fa-close"></i> Tutup</a>
        </div>
     </div>
</div>

</section><!-- /.content -->
</div>

<!-- Modal Popup -->
<div class="modal fade MyModals" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog" style="width:420px !important;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Pilih slip</h4>
            </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="idperiod" name="idperiod">
                    <input type="hidden" class="form-control" id="type" name="type">
                   <select multiple class="form-control" id="slipid" class="slipid">
                   <?php
						$i=1;
						if($dataslip !=0){
						foreach ($dataslip as $valueslip) {
						extract($valueslip);
					?>    
                    <option ondblclick="window.open('report.php?mod=<?php echo $module ?>',target='_blank')" value="<?php echo $module ?>"><?php echo $slipname ?></option>
                    <?php
						$i++;
							}
							}
					?> 
                   </select>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-flat" onclick="showslip()"> <i class="fa fa-search"></i> Cetak</button>
                <button type="button" onclick="ClearVal()" class="btn btn-default btn-flat pull-left" data-dismiss="modal"> <i class="fa fa-close"></i> Tutup</button>
            </div>
        </div>
    </div>
</div>

</form>

<script type="text/javascript">

var varcalculateotr = setInterval(function(){ calculate() }, 300);
function calculate() {
	var notasw = document.getElementById('amountsw').value;
	var result = document.getElementById('amount');
		var rsnota = (notasw);
		result.value = rsnota.replace(/,/g, "");
		
	var admsw = document.getElementById('taxamountsw').value;
	var result1 = document.getElementById('taxamount');
		var rsadm = (admsw);
		result1.value = rsadm.replace(/,/g, "");
		
	var totalbbnsw = document.getElementById('totalsw').value;
	var result2 = document.getElementById('total');
		var rstotalbbn = (totalbbnsw);
		result2.value = rstotalbbn.replace(/,/g, "");
	
}

//Calculate BBN
function calculatetotalbbn() {
	var nota = document.getElementById('amount').value;	
	var adm = document.getElementById('taxamount').value;
	var resultx = document.getElementById('totalsw');
		var gettotal1 = Number(nota) - Number(adm)
		if (!isNaN(nota) && !isNaN(adm)) {
		resultx.value = gettotal1;
		}
}


var key = "<?php echo $key; ?>";

</script>
<?php
	echo "<link rel='stylesheet' type='text/css' href='modules/".$modulename."/css/page.css' />";
	echo "<script type='text/javascript' src='modules/".$modulename."/js/page.js'></script>";
?>



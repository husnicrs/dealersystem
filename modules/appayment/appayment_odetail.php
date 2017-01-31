<?php
$db=new Database();
$subnavmenu = new Subnavmenu();
$moddetail=$_GET['mod'];
$modulename=str_replace("_odetail","", $moddetail);
$datasubnavmenu = $subnavmenu->showsubnavmenu($modulename);
extract($datasubnavmenu);

${"$modulename"} = new Appayment();
$key = $_GET['key'];
//Show header
$dataheader = ${"$modulename"}->showOpenHeader($key);
extract($dataheader);
//Show detail
$datadetail = ${"$modulename"}->showOpenDetail($key);
extract($datadetail);
if(isset($_REQUEST['submit'])){
	extract($_REQUEST);
	${"$modulename"}->pickheader($codetrans, $notrans, $datetrans, $supplierid);
	${"$modulename"}->pickdetail($idtrans, $totalpick);
	${"$modulename"}->updateremain($idtrans);
} 

if(isset($_REQUEST['submitpick'])){
	extract($_REQUEST);
	${"$modulename"}->insert($codetrans);
	${"$modulename"}->updateuser($user);
	${"$modulename"}->pickdetail($idtransdet, $totalpick);
} 
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<section class="content-header" style="margin-top:-15px !important; margin-bottom:-20px !important">
  <h4>
    Supplier: <?php echo $suppliername; ?>
  </h4>
</section>
<!-- Main content -->
<section class="content">
 <form id="form" name="formproduk"  class="editprofileform" method="post" action="" enctype="multipart/form-data" onsubmit="return validateForm()">
 <input type="hidden" class="form-control" id="supplierid" name="supplierid" value="<?php echo $idsupplier; ?>">
  <div class="row">
    <div class="col-xs-12">
     <div class="box box-danger">
      <div class="box-header with-border">
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>No Beli</th>
                    <th>Tgl Beli</th>
                    <th>Jatuh Tempo</th>
                    <th>Keterangan</th>
                    <th>Total Beli</th>
                    <th>Total Bayar</th>
                    <th>Total Sisa</th>
                    <th><input type="checkbox" name="selectall" id="selectall" value="" onchange="calculate()"/></th>
                    <th>Total Pick</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                    $i=1;
                    if($datadetail !=0){
                    foreach ($datadetail as $valuepurorder) {
                    extract($valuepurorder);
                ?>    
                <tr>
                    <td><?php echo $i; ?></td>
                    <td class="left"><?php echo $notrans; ?></td>
                    <td class="left"><?php echo $datetrans; ?></td>
                    <td class="left"><?php echo $duedate; ?></td>
                    <td class="left"><?php echo $remark; ?></td>
                    <td class="left"><?php echo number_format($amount); ?></td>
                    <td class="left"><?php echo number_format($payamount); ?></td>
                    <td class="left"><?php echo number_format($remainamount); ?></td>
                    <td class="centeralign">
                        <input type="checkbox" name="checkedid[]" class="checkbox" id="check" value="<?PHP echo $idtrans;?>" onchange="myFunction(this)">
                    </td>
                    <td>
                        <input type="text" class="form-control input-sm" style="height:22px; margin-bottom:-3px; margin-top:-4px !important" name="totalpick[]" id="totalpick<?PHP echo $idtrans;?>" value="<?PHP echo $remainamount;?>" disabled="disabled"  onkeyup="numericFilter(this); updateSum();" >
                    </td>
                </tr>
                <?php
                    $i++;
                        }
                        } else{
                            $core->pesan_warning("Data is empty");
                        }
                ?>   
                </tbody> 
                <tfoot>
                  <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>Total</th>
                    <th ><div id="sum"></div></th>
                  </tr>
                </tfoot>
              </table>
                  <a href="#" data-toggle="modal" data-easein="swoopIn" data-target=".MyModals" type="button"  class="btn btn-primary  btn-flat pull-right" onclick="showModalsPick()"><i class="fa fa-check"></i> Pick Pembayaran</a>
            </div><!-- /.box-body -->
          </div>
      </div>
    </div><!-- /.col -->
  </div><!-- /.row --> 
</section><!-- /.content -->
</div>

<!-- Modal Popup -->
<div class="modal fade MyModals" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog" style="width:420px !important;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Pilih kode transaksi</h4>
            </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="idperiod" name="idperiod">
                    <input type="hidden" class="form-control" id="type" name="type">
                    <div class="form-group">
                        <label for="real_name" class="col-sm-3 control-label">Transaction</label>
                        <div class="col-sm-8">
                          <select class="form-control"  style="width: 100%;" name="codetrans" id="codetrans"  placeholder="Transaction Code">
                              <option value="APPY">Pembayaran Hutang</option>
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

<?php
	echo "<link rel='stylesheet' type='text/css' href='modules/".str_replace("_odetail","", $modulename )."/css/open/page.css' />";
	echo "<script type='text/javascript' src='modules/".str_replace("_odetail","", $modulename )."/js/open/page.js'></script>";
?>

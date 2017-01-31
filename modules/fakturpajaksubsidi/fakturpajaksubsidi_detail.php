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

${"$modulename"} = new Fakturpajaksubsidi();
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
        ${"$modulename"}->saveclose($key, $datetrans, $nourut, $vehiclemodel, $vehicletype, $rangkano, $mechineno, $kuantum, $hargajual, $dpp, 
		$ppn, $jumlahdpp, $remark, $soid);
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
                        <label for="real_name" class="col-sm-3 control-label">Tgl Faktur</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                               <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                              <input type="text" class="form-control pull-right" id="datetrans"  placeholder="Transaction Date" value="<?php echo $datetrans; ?>"  name="datetrans" data-toggle="tooltip" data-placement="transdate" title="Transaction Date" data-date-format="dd/mm/yyyy">
                            </div><!-- /.input group -->
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">No Urut</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nourut" name="nourut" value="<?php echo $nourut; ?>" />
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">Kuantum</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="kuantum" name="kuantum" value="<?php echo $kuantum; ?>" />
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">Keterangan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="remark" name="remark" value="<?php echo $remark; ?>" />
                        </div>
                    </div>
                </div>
                                   
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="real_name" class="col-sm-3 control-label">Model</label>
                        <div class="col-sm-9">
                            <select class="form-control"  style="width: 100%;" name="vehiclemodel" id="vehiclemodel">
                               <option value="<?php echo $vehiclemodel; ?>"><?php echo $vehiclemodel; ?></option>
								  <?php
                                        $rl = new Combobox();
                                        $datarl = $rl->showVehiclemodel();
                                        foreach ($datarl as $value) {
                                            extract($value);
                                            echo "<option value='".$lookupvehiclemodel."'>".$lookupvehiclemodel."</option>";
                                        }
                                    ?>
                             	</select>
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">Tipe</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="vehicletype" name="vehicletype">
                            <option value="<?php echo $vehicletype; ?>"><?php echo $vehicletype; ?></option>
								  <?php
                                        $rl = new Combobox();
                                        $datarl = $rl->showVahicletype1();
                                        foreach ($datarl as $value) {
                                            extract($value);
                                            echo "<option value='".$lookupvehlicetype1."'>".$lookupvehlicetype1."</option>";
                                        }
                                    ?>
                            </select>
                        </div>
                    </div>
                     <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">No Mesin</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="mechineno" name="mechineno"  value="<?php echo $mechineno; ?>">
                        </div>
                    </div>
                     <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">No Rangka</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="rangkano" name="rangkano"  value="<?php echo $rangkano; ?>">
                        </div>
                    </div>

                </div>
                
            	<div class="col-md-4">
                    <div class="form-group">
                        <label for="real_name" class="col-sm-3 control-label">Harga Jual</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="hargajualsw" name="hargajualsw"  value="<?php echo $hargajualsw; ?>" oninput="calculate(); calculatetotalfakturpajaksubsidi(); calculatetotalppn();">
                            <input type="hidden" id="hargajual" name="hargajual"  value="<?php echo $hargajual; ?>">
                        </div>
                    </div>
                     <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">DPP</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="dppsw" name="dppsw"  value="<?php echo $dppsw; ?>" oninput="calculate(); calculatetotalfakturpajaksubsidi(); calculatetotalppn();">
                            <input type="hidden" id="dpp" name="dpp"  value="<?php echo $dpp; ?>">
                        </div>
                    </div>
                     <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">PPN</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="ppnsw" name="ppnsw"  value="<?php echo $ppnsw; ?>" oninput="calculate(); calculatetotalfakturpajaksubsidi(); calculatetotalppn();">
                            <input type="hidden" id="ppn" name="ppn"  value="<?php echo $ppn; ?>">
                        </div>
                    </div>
                     <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">Jml DPP</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="jumlahdppsw" name="jumlahdppsw"  value="<?php echo $jumlahdppsw; ?>" oninput="calculate(); calculatetotalfakturpajaksubsidi(); calculatetotalppn();">
                            <input type="hidden" id="jumlahdpp" name="jumlahdpp"  value="<?php echo $jumlahdpp; ?>">
                        </div>
                    </div>

                    <div class="form-group pull-right">
                    <div class="col-sm-12">
                     <a href="#" data-toggle="modal" onclick="RefreshDataUnit()" data-easein="swoopIn" data-target=".MyModalsunit" type="button" class="btn btn-warning" id="chooseunit"><i class="fa fa-hand-pointer-o"></i> Pilih Unit</a>
                        </div>
                    </div>
                  
                </div>
            </div>
            
          </div><!-- /.box-header -->
         <div class="box-footer">
         <div class="pull-right">
            <button class="btn btn-primary" name="saveclose" id="saveclose"><i class="fa fa-save"></i> Simpan</button>
            <a href="#" onclick="SavePrint1();" data-toggle="modal" data-easein="swoopIn" data-target=".MyModals" type="button" class="btn btn-primary"> <i class="fa fa-print"></i> Simpan & Cetak</a>
            <button class="btn btn-danger" name="delete" id="delete"><i class="fa fa-save"></i> Hapus</button>
            <a  href="index.php?mod=<?php echo str_replace("_detail","", $modulename ); ?>" type="button" class="btn btn-default"> <i class="fa fa-close"></i> Tutup</a>
        </div>
     </div>
</div>

</section><!-- /.content -->
</div>


<div class="modal fade MyModalsunit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog" style="width:89%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Pilih Unit</h4>
            </div>
        <div class="modal-body">
          <script type="text/javascript" language="javascript" >
			var dTableunit;
			$(document).ready(function() {
				dTableunit = $('#datagridunit').DataTable( {
					"bProcessing": true,
					"bServerSide": true,
					"bJQueryUI": false,
					"responsive": true,
					"pageLength": 10,
					"lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "All"]],
					"sAjaxSource": "<?php echo $pagepost;?>showunit.php",
					"sServerMethod": "POST",
					"columnDefs": [
					{ "orderable": false, "targets": 0, "searchable": false },
					{ "orderable": true, "targets": 1, "searchable": true },
					{ "orderable": true, "targets": 2, "searchable": true },
					{ "orderable": true, "targets": 3, "searchable": true },
					{ "orderable": true, "targets": 4, "searchable": true },
					{ "orderable": true, "targets": 5, "searchable": true },
					{ "orderable": true, "targets": 6, "searchable": true },
					{ "orderable": true, "targets": 7, "searchable": true },
					{ "orderable": true, "targets": 8, "searchable": true },
					{ "orderable": true, "targets": 9, "searchable": true },
					{ "orderable": true, "targets": 10, "searchable": true }
					]
				} );
				$('#datagridunit').removeClass( 'display' ).addClass('table table-striped table-bordered');
				$('#datagridunit tfoot th').each( function () {
					if( $(this).text() != "Action" ){
						var title = $('#datagridunit thead th').eq( $(this).index() ).text();
						$(this).html( '<input type="text" placeholder="Search '+title+'" class="form-control" />' );
					}
				} );
				
			} );
		</script>
        <table id="datagridunit"  class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Customer</th>
                    <th>Alamat</th>
                    <th>Kelurahan</th>
                    <th>Kecamatan</th>
                    <th>Kota</th>
                    <th>Model</th>
                    <th>Type</th>
                    <th>Jenis</th>
                    <th>No Mesin</th>
                    <th>No Rangka</th>
                    <th>Pilih</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table> 
        </div>
        <div class="modal-footer">
         <button onClick="RefreshDataUnit()" type="button" class="btn btn-success btn-flat"> <i class="fa fa-refresh"></i> Refresh</button>
            <button type="button" onclick="ClearVal()" class="btn btn-default btn-flat pull-left" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>
</div>
</form>

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


<script type="text/javascript">
function getDataModals( idkey )
{
	if( idkey )
	{
		$.ajax({
			type: "POST",
			url: "<?php echo $pagepost;?>postunit.php",
			dataType: 'json',
			data: {idkey:idkey,type:"generate"},
			success: function(res) {
				setUnitData( res );
			}
		});
	}
}

function setUnitData( data )
{
	$("#idkey").val(data.idkey);
	$("#cusname").val(data.cusname);
	$("#address").val(data.address);
	$("#rangkano").val(data.rangkano);
	$("#mechineno").val(data.mechineno);
	$("#soid").val(data.idkey);
	
	$("#nota").val(0);
	$("#adm").val(0);
	$("#totalfakturpajaksubsidi").val(0);
	
	$("#notasw").val(0);
	$("#admsw").val(0);
	$("#totalfakturpajaksubsidisw").val(0);
	
	var vehicletype = data.vehicletype;
	$('#vehicletype option[value="' + vehicletype +'"]').prop("selected", true);
		
	var vehiclemodel = data.vehiclemodel;
	$('#vehiclemodel option[value="' + vehiclemodel +'"]').prop("selected", true);
	
}
var varcalculateotr = setInterval(function(){ calculate() }, 300);
function calculate() {
	var hargajualsw = document.getElementById('hargajualsw').value;
	var result = document.getElementById('hargajual');
		var rsnota = (hargajualsw);
		result.value = rsnota.replace(/,/g, "");
		
	var dppsw = document.getElementById('dppsw').value;
	var result1 = document.getElementById('dpp');
		var rsadm = (dppsw);
		result1.value = rsadm.replace(/,/g, "");
		
	var ppnsw = document.getElementById('ppnsw').value;
	var result2 = document.getElementById('ppn');
		var rstotalfakturpajaksubsidi = (ppnsw);
		result2.value = rstotalfakturpajaksubsidi.replace(/,/g, "");
		
	var jumlahdppsw = document.getElementById('jumlahdppsw').value;
	var result3 = document.getElementById('jumlahdpp');
		var rsjumlahdpp = (jumlahdppsw);
		result3.value = rsjumlahdpp.replace(/,/g, "");

	
}

//Calculate Faktur Pajak Subsidi
function calculatetotalfakturpajaksubsidi() {
	var dpp = document.getElementById('dpp').value;
	var resultx = document.getElementById('jumlahdppsw');
		var gettotal1 = Number(dpp) + Number(dpp*0.1)
		if (!isNaN(dpp)) {
		resultx.value = gettotal1;
		}
}

//Calculate Faktur Pajak Subsidi
function calculatetotalppn() {
	var dppppn = document.getElementById('dpp').value;
	var resultppn = document.getElementById('ppnsw');
		var gettotal2 = Number(dppppn*0.1)
		if (!isNaN(dppppn)) {
		resultppn .value = gettotal2;
		}
}


var key = "<?php echo $key; ?>";

function SavePrint1()
{
	var formData = $("#formData").serialize();
	$.ajax({
		type: "POST",
		url: "modules/fakturpajaksubsidi/post/post.php",
		dataType: 'json',
		data: formData,
		success: function(data) {
			$("#type").val("generate");
			//refreshgrid();
			//generateMsg();
		}
	});
}

function showslip()
{
	 var slipid = document.getElementById("slipid").value;
	 var url = "report.php?mod=" + slipid + "&key="+ key;
	 PopupCenterDual(url,'Popup_Window','500','650');
}


//Center position window open
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



<?php
	echo "<link rel='stylesheet' type='text/css' href='modules/".$modulename."/css/page.css' />";
	echo "<script type='text/javascript' src='modules/".$modulename."/js/page.js'></script>";
?>



<?php
$db=new Database();
$subnavmenu = new Subnavmenu();
$moddetail=$_GET['mod'];
$modulename=str_replace("_detail","", $moddetail);
$datasubnavmenu = $subnavmenu->showsubnavmenu($modulename);
extract($datasubnavmenu);

${"$modulename"} = new Notadebet();
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
        ${"$modulename"}->saveclose($key, $subtotal, $potongan, $total, $ppn, $grandtotal);
	}
	if(isset($_REQUEST['cancel'])){
        extract($_REQUEST);
		$key = $_GET['key'];
        ${"$modulename"}->cancel($key);
	}
	if(isset($_REQUEST['delete'])){
        extract($_REQUEST);
		$key = $_GET['key'];
        ${"$modulename"}->delete($key);
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
        <form class="form-horizontal" id="formData" name="formData"  method="post" action="" enctype="multipart/form-data">
        <input type="hidden" class="form-control" id="idtrans" name="idtrans" value="<?php echo $key; ?>">
       <input type="hidden" class="form-control" id="type" name="type" value="generate">
            <div class="box-header with-border">
               <div class="row">
                <!-- Coloumn 1-->
               <div class="col-md-4">
               		<div class="form-group">
                        <label for="real_name" class="col-sm-3 control-label">No ND</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="ndno1" name="ndno1" disabled="disabled" value="<?php echo $ndno; ?>">
                            <input type="hidden" id="ndno" name="ndno" value="<?php echo $ndno; ?>">
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">No DO</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="transno" name="transno"  disabled="disabled" value="<?php echo $dono; ?>">
                        </div>
                    </div>
                     <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">Tgl DO</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                               <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                              <input type="text" class="form-control pull-right" id="datetrans"  placeholder="Transaction Date" value="<?php echo $dodate; ?>"  name="datetrans" data-toggle="tooltip" data-placement="transdate" title="Transaction Date" data-date-format="dd/mm/yyyy" disabled="disabled">
                            </div><!-- /.input group -->
                        </div>
                    </div>
                 </div>
                 <!-- Coloumn 2-->               
                <div class="col-md-4" style="margin-bottom:-20px !important">
                     <div class="form-group">
                        <label for="real_name" class="col-sm-3 control-label">Subtotal</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="subtotalsw" name="subtotalsw"  value="<?php echo $subtotalsw; ?>" oninput="calculate(); calculatetotal(); calculategtotal(); calculateppn();">
                            <input type="hidden" id="subtotal" name="subtotal"  value="<?php echo $subtotal; ?>">
                        </div>
                    </div>
                     <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">Potongan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="potongansw" name="potongansw"  value="<?php echo $potongansw; ?>" oninput="calculate(); calculatetotal(); calculategtotal(); calculateppn();">
                            <input type="hidden" id="potongan" name="potongan"  value="<?php echo $potongan; ?>">
                        </div>
                    </div>
                     <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">Total</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="totalsw" name="totalsw"  value="<?php echo $totalsw; ?>" oninput="calculate(); calculatetotal(); calculategtotal(); calculateppn();">
                            <input type="hidden" id="total" name="total"  value="<?php echo $total; ?>">
                        </div>
                    </div>
                </div>
    
                 <!-- Coloumn 3-->                                   
                <div class="col-md-4">
                     <div class="form-group">
                        <label for="real_name" class="col-sm-3 control-label">PPN</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="ppnsw" name="ppnsw"  value="<?php echo $ppnsw; ?>" oninput="calculate(); calculatetotal(); calculategtotal(); calculateppn();">
                            <input type="hidden" id="ppn" name="ppn"  value="<?php echo $ppn; ?>">
                        </div>
                    </div>
                     <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">Grand Total</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="grandtotalsw" name="grandtotalsw"  value="<?php echo $grandtotalsw; ?>" oninput="calculate(); calculatetotal(); calculategtotal(); calculateppn();">
                            <input type="hidden" id="grandtotal" name="grandtotal"  value="<?php echo $grandtotal; ?>">
                        </div>
                    </div>
                </div>
            </div>
          </div><!-- /.box-header -->
          <div class="box-body">
                <table id="dg" style="height:350px"
                        toolbar="#toolbar" pagination="true" idField="idvehicle"
                        rownumbers="true" fitColumns="true" singleSelect="true" showFooter="true" data-options="pagination:true, rownumbers:true,singleSelect:true,
                            autoRowHeight:false,pageSize:50">
                    <thead>
                        <tr>
                            <th field="nik" width="70">NIK</th>
                            <th field="vehicletype" width="120">Type</th>
                            <th field="vehlicemodel" width="100">Model</th>
                            <th field="mechineno" width="100">No Mesin</th>
                            <th field="rangkano" width="100">Rangka</th>
                            <th field="vehiclecolor" width="100">Warna</th>
                            <th field="unitprice" width="150" align="right" editor="{type:'numberbox',options:{min:0,precision:0,groupSeparator:','}}" sortable="true">Harga</th>
                        </tr>
                    </thead>
                </table>
                <div id="toolbar">
                    <table cellpadding="0" cellspacing="0" style="width:100%">
                        <tr>
                             <td>
                                <a href="#" class="easyui-linkbutton" iconCls="icon-save" plain="true" onclick="javascript:$('#dg').edatagrid('saveRow')">Simpan</a>
                                <a href="#" class="easyui-linkbutton" iconCls="icon-undo" plain="true" onclick="javascript:$('#dg').edatagrid('cancelRow')">Batal</a>
                                <a href="#" class="easyui-linkbutton" iconCls="icon-reload" plain="true" onclick="refreshgrid()">Refresh</a>
                            </td>
                            <td style="text-align:right">
                                <input type="text" id="msearchdetail" style="line-height:18px;border:1px solid #ccc" onkeydown="keyCode(event)">
                                <a href="#" class="easyui-linkbutton" iconCls="icon-search" plain="true" onclick="doSearch()"></a>
                            </td>
                         </tr>
                    </table>
                </div>    
           </div><!-- /.col -->
    	</div>
        </div>
        </div>
         <div class="box-footer" style="margin-top:-40px !important">
         	<button class="btn btn-primary" name="saveclose" id="saveclose"><i class="fa fa-save"></i> Simpan</button>
            <a  href="#" onClick="GenerateData()" type="button" class="btn btn-danger"> <i class="fa fa-magic"></i> Generate Harga</a>
            <a  href="index.php?mod=<?php echo str_replace("_detail","", $modulename ); ?>" type="button" class="btn btn-default"> <i class="fa fa-close"></i> Tutup</a>
        </div>
    </form>
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

<script type="text/javascript">
function GenerateData()
{
	var formData = $("#formData").serialize();
	createMsg();
	$.ajax({
		type: "POST",
		url: "<?php echo $pagepost; ?>generatedata.php",
		dataType: 'json',
		data: formData,
		success: function(data) {
			$("#type").val("generate");
			dTable.createMsg.reload();
			createMsg();
			setInterval(function(){ refreshgrid() }, 10000);
		}
	});
	dTable.ajax.reload();
	refreshgrid();
}
function createMsg()
{
	// $.messager.alert('Info','Harga telah disesuaikan!','info',);
	// refreshgrid();
	//$.messager.alert('My Title','Here is a info message!','info');
	$.messager.alert({
		title: 'Info',
		msg: 'Harga telah disesuaikan!',
		fn: function(){
			refreshgrid();
		}
	});
	
}
var varcalculate = setInterval(function(){ calculate() }, 300);
function calculate() {
	var subtotalsw = document.getElementById('subtotalsw').value;
	var result = document.getElementById('subtotal');
		var rssubtotal = (subtotalsw);
		result.value = rssubtotal.replace(/,/g, "");
		
	var potongansw = document.getElementById('potongansw').value;
	var result1 = document.getElementById('potongan');
		var rspotongan = (potongansw);
		result1.value = rspotongan.replace(/,/g, "");
		
	var totalsw = document.getElementById('totalsw').value;
	var result2 = document.getElementById('total');
		var rstotal = (totalsw);
		result2.value = rstotal.replace(/,/g, "");
		
	var ppnsw = document.getElementById('ppnsw').value;
	var result3 = document.getElementById('ppn');
		var rsppn = (ppnsw);
		result3.value = rsppn.replace(/,/g, "");
		
	var grandtotalsw = document.getElementById('grandtotalsw').value;
	var result3 = document.getElementById('grandtotal');
		var rsgrandtotal = (grandtotalsw);
		result3.value = rsgrandtotal.replace(/,/g, "");
	
}

var varcalculatetotal = setInterval(function(){ calculatetotal() }, 300);
var varcalculateotr = setInterval(function(){ calculategtotal() }, 300);
var varcalculateppn = setInterval(function(){ calculateppn() }, 300);

//Calculate Total
function calculatetotal() {
	var subtotal = document.getElementById('subtotal').value;	
	var potongan = document.getElementById('potongan').value;
	var resultx = document.getElementById('totalsw');
		var gettotal1 = Number(subtotal) - Number(potongan)
		if (!isNaN(subtotal) && !isNaN(potongan)) {
		resultx.value = gettotal1;
		}
}

//Calculate Grand Total
function calculategtotal() {
	var subtotal1 = document.getElementById('subtotal').value;	
	var potongan1 = document.getElementById('potongan').value;
	var ppn = document.getElementById('ppn').value;
	var resulty = document.getElementById('grandtotalsw');
		var gettotal2 = Number(subtotal1) - Number(potongan1)  + Number(ppn)
		if (!isNaN(subtotal1) && !isNaN(ppn)) {
		resulty.value = gettotal2;
		}
}

//Calculate Total PPN
/*
function calculateppn() {
	var subtotalppn = document.getElementById('total').value;	
	var ppn = document.getElementById('ppn').value;
	var resultppn = document.getElementById('ppnsw');
		var gettotalppn = Number(subtotalppn) * 0.1
		if (!isNaN(subtotalppn)) {
		resultppn.value = gettotalppn;
		}
}*/

var key = "<?php echo $key; ?>";

$(function(){
   showdetail();
});
</script>
<?php
	echo "<link rel='stylesheet' type='text/css' href='modules/".$modulename."/css/page.css' />";
	echo "<script type='text/javascript' src='modules/".$modulename."/js/page.js'></script>";
?>



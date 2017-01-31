<?php
$subnavmenu = new Subnavmenu();
$modulename=$_GET['mod'];
$datasubnavmenu = $subnavmenu->showsubnavmenu($modulename);
extract($datasubnavmenu);

$data = $subnavmenu->showfilter();
extract($data);

$slip = new Slip();
$submodule= str_replace("modules/","", $modulesname );
$dataslip = $slip->showSlip($submodule);
extract($dataslip);

$user=$_SESSION['uname'];
?>
<style>
.datepicker{z-index:1151 !important;}
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
    <div class="col-xs-8">
      <div class="box box-danger">
      <div class="box-header with-border" style="height:50px !important; margin-top:-2px !important">
        <div class="form-group pull-left" style="margin-left:-30px !important">
            <div class="col-sm-12 pull-right">
           <form class="form-horizontal" id="formData" action="">
            <input type="hidden" class="form-control" id="idkey" name="idkey">
            <input type="hidden" class="form-control" id="type" name="type" value="get">
             <input type="hidden" class="form-control" id="typefilter" name="typefilter" value="generate">
             <input type="hidden" class="form-control" id="username" name="username"  value="<?php echo $_SESSION['uname']; ?>">
             <label for="real_name" class="col-sm-3 control-label">Leasing</label>
                <div class="col-sm-9">
                    <select class="form-control"  style="width: 100%;" name="leasingfilter" id="leasingfilter" onchange="FilterUnit();">
                       <option value="<?php echo $leasingfilter; ?>"><?php echo $leasingfilter; ?></option>
                       <option value="">*KOSONGKAN FILTER*</option>
                           <?php
                                $rl = new Combobox();
                                $datarl = $rl->showLeasing();
                                foreach ($datarl as $value) {
                                    extract($value);
                                    echo "<option value='".$leasingname."'>".$leasingname."</option>";
                                }
                            ?>
                     </select>
                </div>
            </div>
        </div>
         <div class="form-group pull-left" style="margin-left:-30px !important">
            <div class="col-sm-12 pull-right">
             <label for="real_name" class="col-sm-4 control-label">Status</label>
                <div class="col-sm-8">
                    <select class="form-control"  style="width: 100%;" name="billfilter" id="billfilter" onchange="FilterUnit();">
                    	<option value="<?php echo $billfilter; ?>"><?php echo $billfiltername; ?></option>
                    	<option value="">*KOSONGKAN FILTER*</option>
                       <option value="2">N</option>
                       <option value="1">Y</option>
                     </select>
                </div>
            </div>
        </div>
        <div class="form-group pull-left" style="margin-left:-30px !important">
            <div class="col-sm-12 pull-right">
             <label for="real_name" class="col-sm-4 control-label">Tgl Tagih</label>
                <div class="col-sm-8">
                      <input type="text" class="form-control pull-right" id="billdatefilter"  placeholder="Tgl Tagih" value="<?php echo $billdatefilter; ?>" onchange="FilterUnit();" name="billdatefilter" data-toggle="tooltip" data-placement="billdatefilter" title="Tgl Tagih" data-date-format="dd/mm/yyyy">
                </div>
            </div>
        </div>
      </div>

      <div class="box-header" style="margin-top:-20px">
          <button onClick="RefreshData()" type="button" class="btn btn-success btn-flat pull-left"> <i class="fa fa-refresh"></i> Refresh</button>
       </div><!-- /.box-header -->
       <div class="box-body">
       <table id="datagrid"  class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Pilih</th>
                    <th>Nama</th>
                    <th>Leasing</th>
                    <th>Model</th>
                    <th>Tgl Jual</th>
                    <th>Tgl Tagih</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>		
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
    <div class="col-md-4">
      <!-- general form elements -->
      <div class="box box-danger">
        <!-- form start -->
          <div class="box-header with-border">
           <div class="form-group">
              
              <input type="text" class="form-control" id="cusname" placeholder="Nama" name="cusname">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="address" placeholder="Alamat" name="address">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="vehiclemodel" placeholder="Model" name="vehiclemodel">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="vehicletype" name="vehicletype" placeholder="Type">
            </div>
            <div class="form-group" style="margin-top:-5px !important">
                <div class="input-group">
                   <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                  <input type="text" class="form-control pull-right" id="datetrans"  placeholder="Tanggal Jual" name="datetrans" data-toggle="tooltip" data-placement="transdate" title="Transaction Date" data-date-format="dd/mm/yyyy">
                </div><!-- /.input group -->
            </div>
            <div class="form-group" style="margin-top:-5px !important">
               <label for="exampleInputPassword1">Tgl Tagih</label>
                    <div class="input-group">
                       <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                      <input type="text" class="form-control pull-right" id="arbillingdate"  placeholder="Tgl Tagih" name="arbillingdate" data-toggle="tooltip" data-placement="arbillingdate" title="Transaction Date" data-date-format="dd/mm/yyyy">
                    </div><!-- /.input group -->
            </div>
          </div><!-- /.box-header -->
         <div class="box-body">

            <div class="form-group">
                <label class="col-sm-4 control-label">Pelunasan</label>
                <div class="col-sm-5">
                 <input type="text" class="form-control" placeholder="Pelunasan" id="brutoamountsw" name="brutoamountsw" oninput="calculate();" onclick= "javascript:this.value=Comma(this.value);">
                 <input type="hidden" id="brutoamount" name="brutoamount">
                </div>
                <div class="col-sm-3">
                    <select class="form-control" style="width: 100%;" name="paymentformat"  id="paymentformat">
                       <option style="background-color:#0F0 !important" value="Y">Y</option>
                       <option style="background-color:#F00 !important" value="N">N</option>
                    </select>
                </div>
            </div><br/>

            <div class="form-group">
                <label class="col-sm-4 control-label">DP PO</label>
                <div class="col-sm-5">
                 <input type="text" class="form-control" placeholder="DP PO" id="creditnettdpsw" oninput="calculate();" onclick= "javascript:this.value=Comma(this.value);">
                 <input type="hidden" id="creditnettdp" name="creditnettdp">
                </div>
                <div class="col-sm-3">
                    <select class="form-control" style="width: 100%;" name="dppoformat"  id="dppoformat">
                       <option style="background-color:#0F0 !important" value="Y">Y</option>
                       <option style="background-color:#F00 !important" value="N">N</option>
                    </select>
                </div>
            </div><br/>
            
            <div class="form-group">
                <label class="col-sm-4 control-label">OTR</label>
                <div class="col-sm-5">
                 <input type="text" class="form-control" placeholder="OTR" id="otrsw" name="otrsw" oninput="calculate();" onclick= "javascript:this.value=Comma(this.value);">
               	 <input type="hidden" id="otr" name="otr">
                </div>
                <div class="col-sm-3">
                    <select class="form-control" style="width: 100%;" name="otrformat"  id="otrformat">
                       <option style="background-color:#0F0 !important" value="Y">Y</option>
                       <option style="background-color:#F00 !important" value="N">N</option>
                    </select>
                </div>
            </div><br/>
            
            <div class="form-group">
                <label class="col-sm-4 control-label">Subsidi Leasing</label>
                <div class="col-sm-5">
                 <input type="text" class="form-control" placeholder="Subsidi Leasing" id="subleasingsw" name="subleasingsw" oninput="calculate();" onclick= "javascript:this.value=Comma(this.value);">
               	 <input type="hidden" id="subleasing" name="subleasing">
                </div>
                <div class="col-sm-3">
                    <select class="form-control" style="width: 100%;" name="subleasingformat"  id="subleasingformat">
                       <option style="background-color:#0F0 !important" value="Y">Y</option>
                       <option style="background-color:#F00 !important" value="N">N</option>
                    </select>
                </div>
            </div><br/>
            
            <div class="form-group">
                <label class="col-sm-4 control-label">Scheme</label>
                <div class="col-sm-5">
                 <input type="text" class="form-control" placeholder="Scheme" id="schemesw" name="schemesw" oninput="calculate();" onclick= "javascript:this.value=Comma(this.value);">
                 <input type="hidden" id="scheme" name="scheme">
                </div>
                <div class="col-sm-3">
                    <select class="form-control" style="width: 100%;" name="schemeformat"  id="schemeformat">
                       <option style="background-color:#0F0 !important" value="Y">Y</option>
                       <option style="background-color:#F00 !important" value="N">N</option>
                    </select>
                </div>
            </div><br/>
            
            <div class="form-group">
                <label class="col-sm-4 control-label">Accessories</label>
                <div class="col-sm-5">
                 <input type="text" class="form-control" placeholder="Accessories" id="accessoriessw" name="accessoriessw" oninput="calculate();" onclick= "javascript:this.value=Comma(this.value);">
                 <input type="hidden" id="accessories" name="accessories">
                </div>
                <div class="col-sm-3">
                    <select class="form-control" style="width: 100%;" name="accessoriesformat" id="accessoriesformat">
                       <option style="background-color:#0F0 !important" value="Y">Y</option>
                       <option style="background-color:#F00 !important" value="N">N</option>
                    </select>
                </div>
            </div><br/>
            
            <div class="form-group">
                <label class="col-sm-4 control-label">No PO</label>
                <div class="col-sm-5">
                 <input type="text" class="form-control" placeholder="No PO" id="pono" name="pono" onclick= "javascript:this.value=Comma(this.value);">
                </div>
                <div class="col-sm-3">
                 <input type="text" class="form-control" placeholder="Tgl PO" id="podate" name="podate" onclick= "javascript:this.value=Comma(this.value);">
                </div>
            </div><br/>
        	<a href="#" onclick="SavePrint();" data-toggle="modal" data-easein="swoopIn" data-target=".MyModals" type="button" class="btn btn-primary"> <i class="fa fa-print"></i> Simpan & Cetak</a>
          <a href="#" data-toggle="modal" onClick="RefreshDataUnit()" data-easein="swoopIn" data-target=".MyModalsunit" type="button" class="btn btn-warning" id="chooseunit"><i class="fa fa-cogs"></i> Setting Default</a>
         </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col (left) -->
  </div><!-- /.row --> 
</section><!-- /.content -->
</div>

<!-- Modal Show Leasing -->
<div class="modal fade MyModalsunit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog" style="width:40%;">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Pilih Leasing</h4>
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
                        "sAjaxSource": "<?php echo $pagepost;?>showleasing.php",
                        "sServerMethod": "POST",
                        "columnDefs": [
                        { "orderable": false, "targets": 0, "searchable": false },
                        { "orderable": true, "targets": 1, "searchable": true }
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
                        <th>Leasing</th>
                        <th>Setting</th>
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


<!-- Modal Update Leasing -->
<div class="modal fade" id="myModals" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
      <input type="hidden" class="form-control" id="typerefresh" name="typerefresh" value="generate">
      <input type="hidden" class="form-control" id="userid" name="userid" value="<?php echo $user; ?>">
      <input type="hidden" class="form-control" id="idtrans" name="idtrans">
      <input type="hidden" class="form-control" id="soid" name="soid">
      <input type="hidden" class="form-control" id="spformat" name="spformat">
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
                <input type="hidden" class="form-control" id="idkeyleasing" name="idkeyleasing">
                <input type="hidden" class="form-control" id="typeleasing" name="typeleasing">
                <div class="form-group">
                    <label for="real_name" class="col-sm-3 control-label">Leasing</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="leasingname" name="leasingname" disabled="disabled">
                    </div>
                </div><br/>
                <div class="form-group">
                    <label for="real_name" class="col-sm-3 control-label">Nama Perusahaan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="companyname" name="companyname" >
                    </div>
                </div><br/>
                <div class="form-group">
                    <label for="real_name" class="col-sm-3 control-label">Alamat</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="addressls" name="address" >
                    </div>
                </div><br/>
                <div class="form-group">
                    <label for="real_name" class="col-sm-3 control-label">Pelunasan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="paymentls" name="payment" >
                    </div>
                </div><br/>
                <div class="form-group">
                    <label for="real_name" class="col-sm-3 control-label">DP PO</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="dppols" name="dppo" >
                    </div>
                </div><br/>
                <div class="form-group">
                    <label for="real_name" class="col-sm-3 control-label">OTR</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="otrls" name="otrls" >
                    </div>
                </div><br/>
                <div class="form-group">
                    <label for="real_name" class="col-sm-3 control-label">Sub Leasing</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="subleasing" name="subleasingls" >
                    </div>
                </div><br/>
                <div class="form-group">
                    <label for="real_name" class="col-sm-3 control-label">Scheme</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="scheme" name="schemels" >
                    </div>
                </div><br/>
                <div class="form-group">
                    <label for="real_name" class="col-sm-3 control-label">Accessories</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="accessories" name="accessoriesls" >
                    </div>
                </div><br/>
            </div>
        <div class="modal-footer"><br/><br/>
            <button type="submit" id="submitnew" onClick="submitData()" class="btn btn-primary btn-flat pull-right" style="margin-left:5px !important">Simpan</button>
            <button type="button" onclick="closeMyModals()" class="btn btn-default btn-flat pull-left">Tutup</button>
        </div>
    </div>
   
</div>
</div>
</div><!-- /.box-body -->
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



<script>
function FilterUnit()
{
	var formData = $("#formData").serialize();
	$.ajax({
		type: "POST",
		url: "<?php echo $pagepost; ?>postunitfilter.php",
		dataType: 'json',
		data: formData,
		success: function(data) {
			$("#typefilter").val("generate");
		}
	});
	RefreshDataUnit();
}
function RefreshDataUnit()
{
	dTable.ajax.reload();
}
function closeMyModals()
{
	$('#myModals').modal('toggle');
}
function getDataModals( idkey )
{
	//clearData();
	if( idkey )
	{
		//clearUnit();
		$.ajax({
			type: "POST",
			url: "<?php echo $pagepost;?>post.php",
			dataType: 'json',
			data: {idkey:idkey,type:"get"},
			success: function(res) {
				setUnitData( res );
			}
		});
	}
}
function setUnitData( data )
{
	//clearUnit();
	$("#idkey").val(data.idkey);
	$("#soid").val(data.idkey);
	$("#spformat").val(data.spformat);
	$("#cusname").val(data.cusname);
	$("#address").val(data.address);
	$("#vehiclemodel").val(data.vehiclemodel);
	$("#vehicletype").val(data.vehicletype);
	$("#datetrans").val(data.datetrans);
	$("#creditnettdp").val(data.creditnettdp);
	$("#subleasing").val(data.subleasing);
	$("#arbillingdate").val(data.arbillingdate);
	$("#otr").val(data.otr);
	$("#scheme").val(data.scheme);
	$("#accessories").val(data.accessories);
	$("#brutoamount").val(data.brutoamount);
	$("#pono").val(data.pono);
	$("#podate").val(data.podate);
	
	$("#creditnettdpsw").val(data.creditnettdpsw);
	$("#subleasingsw").val(data.subleasingsw);
	$("#otrsw").val(data.otrsw);
	$("#schemesw").val(data.schemesw);
	$("#accessoriessw").val(data.accessoriessw);
	$("#brutoamountsw").val(data.brutoamountsw);
	
	var paymentformat = data.paymentformat;
	$('#paymentformat option[value="' + paymentformat +'"]').prop("selected", true);
	var dppoformat = data.dppoformat;
	$('#dppoformat option[value="' + dppoformat +'"]').prop("selected", true);
	var otrformat = data.otrformat;
	$('#otrformat option[value="' + otrformat +'"]').prop("selected", true);
	var subleasingformat = data.subleasingformat;
	$('#subleasingformat option[value="' + subleasingformat +'"]').prop("selected", true);
	var schemeformat = data.schemeformat;
	$('#schemeformat option[value="' + schemeformat +'"]').prop("selected", true);
	var accessoriesformat = data.accessoriesformat;
	$('#accessoriesformat option[value="' + accessoriesformat +'"]').prop("selected", true);
	
	$("#idtrans").val(data.idkey);

}

function calculate() {
	var brutoamountsw = document.getElementById('brutoamountsw').value;
	var result = document.getElementById('brutoamount');
		var rsbrutoamount = (brutoamountsw);
		result.value = rsbrutoamount.replace(/,/g, "");
		
	var creditnettdpsw = document.getElementById('creditnettdpsw').value;
	var result1 = document.getElementById('creditnettdp');
		var rscreditnettdp = (creditnettdpsw);
		result1.value = rscreditnettdp.replace(/,/g, "");
		
	var otrsw = document.getElementById('otrsw').value;
	var result2 = document.getElementById('otr');
		var rsotr = (otrsw);
		result2.value = rsotr .replace(/,/g, "");
		
	var schemesw = document.getElementById('schemesw').value;
	var result3 = document.getElementById('scheme');
		var rsscheme = (schemesw);
		result3.value = rsscheme.replace(/,/g, "");
		
	var subleasingsw = document.getElementById('subleasingsw').value;
	var result4 = document.getElementById('subleasing');
		var rssubleasing = (subleasingsw);
		result4.value = rssubleasing.replace(/,/g, "");
		
	var accessoriessw = document.getElementById('accessoriessw').value;
	var result5 = document.getElementById('accessories');
		var rsaccessories = (accessoriessw);
		result5.value = rsaccessories.replace(/,/g, "");
	
}


var dTable;
$(document).ready(function() {
	dTable = $('#datagrid').DataTable( {
		"bProcessing": true,
		"bServerSide": true,
		"bJQueryUI": false,
		"responsive": true,
		"pageLength": 50,
		"scrollY": "360px",
		"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
		"sAjaxSource": "modules/arbilling/post/show.php?user=<?php echo $user ?>",
		"sServerMethod": "POST",
		"columnDefs": [
		{ "orderable": false, "targets": 0, "searchable": false },
		{ "orderable": true, "targets": 1, "searchable": true },
		{ "orderable": true, "targets": 2, "searchable": true },
		{ "orderable": true, "targets": 3, "searchable": true },
		{ "orderable": true, "targets": 4, "searchable": true },
		{ "orderable": true, "targets": 5, "searchable": true },
		{ "orderable": true, "targets": 6, "searchable": true }
		]
	} );
	$('#datagrid').removeClass( 'display' ).addClass('table table-striped table-bordered');
	$('#datagrid tfoot th').each( function () {
		if( $(this).text() != "Action" ){
			var title = $('#datagrid thead th').eq( $(this).index() ).text();
			$(this).html( '<input type="text" placeholder="Search '+title+'" class="form-control" />' );
		}
	} );
	
} );
</script>

<?php
	echo "<link rel='stylesheet' type='text/css' href='modules/".$modulename."/css/page.css' />";
	echo "<script type='text/javascript' src='modules/".$modulename."/js/page.js'></script>";
?>
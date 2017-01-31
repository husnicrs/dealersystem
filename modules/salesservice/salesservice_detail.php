<?php
$db=new Database();
$subnavmenu = new Subnavmenu();
$moddetail=$_GET['mod'];
$modulename=str_replace("_detail","", $moddetail );
$datasubnavmenu = $subnavmenu->showsubnavmenu($modulename);
extract($datasubnavmenu);

$salesservice = new Salesservice();
$slip = new Slip();
	if (isset($_GET['key'])) {
	    $key = $_GET['key'];
	    $data = $salesservice->showDetail($key);
	    extract($data);
		$submodule= str_replace("modules/","", $modulesname );
		$dataslip = $slip->showSlip($submodule);
	    extract($dataslip);
	}
	if(isset($_REQUEST['saveclose'])){
        extract($_REQUEST);
		$key = $_GET['key'];
        $salesservice->saveclose($key, $datetrans, $customerid, $payamount, $changeamount, $totalamount, $paytypeid, $remark, $serviceamount, $sparepartamount,
						$policeno, $customername, $vehiclemodel, $vahicletype, $vahiclejenis, $purchasedate, $mechineno, $rangka, $servicebook, $mekanikid, $employeeid, $km, $nextkm, $nextdatekm, $finishtime, $address, $telpno);
		//$salesservice->updateprice($key);
	}
	if(isset($_REQUEST['savepay'])){
        extract($_REQUEST);
		$key = $_GET['key'];
        $salesservice->savepay($key, $datetrans, $customerid, $payamount, $changeamount, $totalamount, $paytypeid, $remark, $serviceamount, $sparepartamount,
						$policeno, $customername, $vehiclemodel, $vahicletype, $vahiclejenis, $purchasedate, $mechineno, $rangka, $servicebook, $mekanikid, $employeeid, $km, $nextkm, $nextdatekm, $finishtime, $address, $telpno);
		//$salesservice->updateprice($key);
	}
	if(isset($_REQUEST['delete'])){
        extract($_REQUEST);
		$key = $_GET['key'];
        $salesservice->delete($key);
	}
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

<script type="text/javascript">
$(codeEditor.target).val('newval');
</script>

<!-- Main content -->
<section class="content">
  <div class="row" onclick="generateDatavahicletype();">
      <form id="formData" name="formData"  method="post" action="" enctype="multipart/form-data">
      <input type="hidden" class="form-control" id="transid" name="transid" value="<?php echo $key; ?>">
      <input type="hidden" class="form-control" id="type" name="type" value="generate">
            <!-- right column -->
            <div class="col-md-9">
              <!-- Horizontal Form -->
              <div class="box box-primary">
                  <div class="box-header with-border">
                      <div class="box-body">
                          <div class="row">
                            <div class="col-xs-10">
                              <div class="input-group input-group-sm">
                                <input type="text" class="form-control" id="barcode" name="barcode" placeholder="Masukan scan barcode..." onfocus="this.select();" onkeydown="handle(event)">
                                <span class="input-group-btn">
                                  <button id="btn1" class="btn btn-success btn-flat" type="button"><i class="fa fa-cart-plus" id="barcode"></i></button>
                                </span>
                              </div><!-- /input-group -->
                            </div>
                            <div class="col-xs-2">
                              <input type="text" class="form-control" placeholder="Jumlah" id="quantitysw" name="quantitysw" onfocus="this.select();" onkeydown="keyCode(event)" oninput="calculate()">
                              <input type="hidden" id="quantity" name="quantity">
                            </div>
                          </div>
                        </div><!-- /.box-body -->
                   </div><!-- /.box-header -->
                <!-- form start -->
                  <div class="box-body">
                   <div class="box-body">
                     <div class="easyui-tabs">
                        <div title="Servis" style="padding:10px">
                            <table id="dgservice" style="height:350px; width:100%"
                                toolbar="#toolbarservice" pagination="true" idField="idtransdet"
                                rownumbers="true" fitColumns="true" singleSelect="true" showFooter="true" data-options="pagination:true, rownumbers:true,singleSelect:true,
                                    autoRowHeight:false,pageSize:50">
                            <thead>
                                <tr>
                                    <th data-options="field:'vehicleserviceid', width:400, sortable:true, nowrap:true,
                                            formatter:function(value,row){
                                                return row.vehicleservicename;
                                            },
                                            editor:{
                                                type:'combogrid',
                                                options:{
                                                    panelWidth:700,
                                                    pagination: true,
                                                    mode:'remote',
                                                    idField:'idvehicleservice',
                                                    textField:'vehicleservicename',
                                                    url:'lib/combogrid/vehicleservice.php?key=<?php echo $key ?>',
                                                    columns:[[
                                                        {field:'vehicleservicename',title:'Servis',width:80,sortable:true},
                                                        {field:'vehliceservicetype',title:'Jenis Servis',width:80,sortable:true},
                                                        {field:'vehiclegroupmodel',title:'Grup Model',width:80,sortable:true},
                                                        {field:'unitprice',title:'Harga',width:70}
                                                    ]],
                                                     onSelect: function(index,row){
                                                         setTimeout(function(){
                                                             var opts = $('#dgservice').edatagrid('options');
                                                             var ed = $('#dgservice').edatagrid('getEditor',{
                                                                 index:opts.editIndex,
                                                                 field:'unitprice'
                                                             });
                                                             $(ed.target).numberbox('setValue',row.unitprice);
                                                         },0);
                                                     },
                                                    fitColumns: true
                                                }
                                            }">Servis</th>
                                    <th field="unitprice" width="100" align="right" editor="{type:'numberbox',options:{min:0,precision:0,groupSeparator:',',decimalSeparator:'.'}}" sortable="true">Harga</th>
                                    <th field="discount" width="100" align="right" editor="{type:'numberbox',options:{min:0,precision:0,groupSeparator:',',decimalSeparator:'.'}}" sortable="true">Diskon(%)</th>
                                    <th field="discountamt" width="100" align="right" editor="{type:'numberbox',options:{min:0,precision:0,groupSeparator:',',decimalSeparator:'.'}}" sortable="true">Diskon(Rp)</th>
                                    <th field="subtotal" width="100" align="right" editor="{type:'numberbox',options:{min:0,precision:0,groupSeparator:',',decimalSeparator:'.'}}" sortable="true">Subtotal</th>
                                </tr>
                            </thead>
                        </table>
                        </div>

                         <div title="Sparepart" style="padding:10px">
                            <table id="dg" style="height:350px; width:100%"
                                toolbar="#toolbar" pagination="true" idField="idtransdet"
                                rownumbers="true" fitColumns="true" singleSelect="true" showFooter="true" data-options="pagination:true, rownumbers:true,singleSelect:true,
                                    autoRowHeight:false,pageSize:50">
                            <thead>
                                <tr>
                                    <th data-options="field:'inventoryid', width:200, sortable:true, nowrap:true,
                                            formatter:function(value,row){
                                                return row.inventorycode;
                                            },
                                            editor:{
                                                type:'combogrid',
                                                options:{
                                                    panelWidth:595,
                                                    pagination: true,
                                                    mode:'remote',
                                                    idField:'idinventory',
                                                    textField:'inventorycode',
                                                    url:'lib/combogrid/inventorysales.php',
                                                    columns:[[
                                                        {field:'inventorycode',title:'Kode Part',width:80,sortable:true},
                                                        {field:'inventoryname',title:'Nama Part',width:170,sortable:true},
                                                        {field:'salesunit',title:'Satuan',width:50,sortable:true},
                                                        {field:'unitprice',title:'Harga',width:70},
                                                        {field:'stockqty',title:'Stok',width:50}
                                                    ]],
                                                     onSelect: function(index,row){
                                                         setTimeout(function(){
                                                             var opts = $('#dg').edatagrid('options');
                                                             var ed = $('#dg').edatagrid('getEditor',{
                                                                 index:opts.editIndex,
                                                                 field:'unitprice'
                                                             });
                                                             var edunit = $('#dg').edatagrid('getEditor',{
                                                                 index:opts.editIndex,
                                                                 field:'unit'
                                                             });
                                                             var edstock = $('#dg').edatagrid('getEditor',{
                                                                 index:opts.editIndex,
                                                                 field:'stockqty'
                                                             });
                                                             $(ed.target).numberbox('setValue',row.unitprice);
                                                             $(edunit.target).combobox('setValue',row.salesunit);
                                                             $(edstock.target).numberbox('setValue',row.stockqty);
                                                         },0);
                                                     },
                                                    fitColumns: true
                                                }
                                            }">Kode Part
											</th>
											<th field="inventoryname" width="370" align="left">Nama Part</th>

                                    <th data-options="field:'unit',width:100, sortable:true,
                                            formatter:function(value,row){
                                                return row.unit;
                                            },
                                            editor:{
                                                type:'combobox',
                                                options:{
                                                    valueField:'unitname',
                                                    textField:'unitname',
                                                    method:'get',
                                                    url:'lib/lookup/unit.php',
                                                    required:true
                                                }
                                            }">Satuan</th>
                                    <th field="stockqty" width="50" align="right" editor="{type:'numberbox',options:{precision:0,groupSeparator:','}}">Stok</th>
                                    <th field="avlqty"  width="50" align="right" editor="{type:'numberbox',options:{precision:0,groupSeparator:','}}" formatter="formatPrice">Tersedia</th>
                                    <th field="quantity" width="100" align="right" editor="{type:'numberbox',options:{min:0,precision:0,groupSeparator:','}}">Jumlah</th>
                                    <th field="unitprice" width="100" align="right" editor="{type:'numberbox',options:{min:0,precision:0,groupSeparator:',',decimalSeparator:'.'}}" sortable="true">Harga</th>
                                    <th field="discount" width="70" align="right" editor="{type:'numberbox',options:{min:0,precision:0,groupSeparator:','}}">Diskon(%)</th>
                                    <th field="discountamt" width="70" align="right" editor="{type:'numberbox',options:{min:0,precision:0,groupSeparator:','}}">Diskon(Rp)</th>
                                    <th field="amount"  hidden:"true" 
                                        width="150" 
                                        align="right" 
                                        editor="{type:'numberbox',options:{min:0,precision:0,groupSeparator:',',decimalSeparator:'.'}}" 
                                        sortable="true" 
                                        editable:"false"
                                        formatter:"function(value, row){
                                              return accounting.formatMoney(row.amount);
                                        }">
                                        Subtotal
                                    </th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                </div>
                <div id="toolbar">
                    <table cellpadding="0" cellspacing="0" style="width:100%">
                        <tr>
                             <td>
                                <a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="javascript:$('#dg').edatagrid('addRow')">Baru</a>
                                <a href="#" class="easyui-linkbutton" iconCls="icon-save" plain="true" onclick="javascript:$('#dg').edatagrid('saveRow')">Simpan</a>
                                <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="javascript:$('#dg').edatagrid('destroyRow')">Hapus</a>
                                <a href="#" class="easyui-linkbutton" iconCls="icon-undo" plain="true" onclick="javascript:$('#dg').edatagrid('cancelRow')">Batal</a>
                                <a href="#" class="easyui-linkbutton" iconCls="icon-reload" plain="true" onclick="refreshgrid()">Refresh</a>
                            </td>
                            <td style="text-align:right">
                                <input type="text" id="msearchdetail" style="line-height:18px;border:1px solid #ccc">
                                <a href="#" class="easyui-linkbutton" iconCls="icon-search" plain="true" onclick="doSearch()"></a>
                            </td>
                         </tr>
                    </table>
                </div>  
                
                <div id="toolbarservice">
                    <table cellpadding="0" cellspacing="0" style="width:100%">
                        <tr>
                             <td>
                                <a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="javascript:$('#dgservice').edatagrid('addRow')">Baru</a>
                                <a href="#" class="easyui-linkbutton" iconCls="icon-save" plain="true" onclick="javascript:$('#dgservice').edatagrid('saveRow')">Simpan</a>
                                <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="javascript:$('#dgservice').edatagrid('destroyRow')">Hapus</a>
                                <a href="#" class="easyui-linkbutton" iconCls="icon-undo" plain="true" onclick="javascript:$('#dgservice').edatagrid('cancelRow')">Batal</a>
                                <a href="#" class="easyui-linkbutton" iconCls="icon-reload" plain="true" onclick="refreshgridservice()">Refresh</a>
                            </td>
                            <td style="text-align:right">
                                <input type="text" id="msearchdetail" style="line-height:18px;border:1px solid #ccc" onkeydown="keyCode(event)">
                                <a href="#" class="easyui-linkbutton" iconCls="icon-search" plain="true" onclick="doSearch()"></a>
                            </td>
                         </tr>
                    </table>
                </div> 

              <div id="results"></div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                      <div class="box-body">
                          <div class="row">
                            <div class="col-xs-6">
                              <textarea class="form-control" name="remark" placeholder="Keterangan"><?php echo $remarkhead; ?></textarea>
                            </div>
                          </div>
                        </div><!-- /.box-body -->
                  </div><!-- /.box-footer -->
              </div><!-- /.box -->
        </div><!--/.col (right) -->
        <div class="col-md-3">
              <!-- general form elements -->
              <div class="box box-primary">
                <!-- form start -->
                  <div class="box-header with-border">
                   <div class="form-group">
                    <label for="exampleInputPassword1">No Trans</label>
                      <input type="text" class="form-control" id="transno" name="transno"  disabled="disabled" value="<?php echo $notrans; ?>">
                    </div>
                    <div class="form-group">
                       <label for="exampleInputPassword1">Tgl Trans</label>
                            <div class="input-group">
                               <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                              <input type="text" class="form-control pull-right" id="datetrans"  placeholder="Transaction Date" value="<?php echo $datetrans1; ?>"  name="datetrans" data-toggle="tooltip" data-placement="transdate" title="Transaction Date" data-date-format="dd/mm/yyyy">
                            </div><!-- /.input group -->
                    </div>
                    <input type="hidden" class="form-control" id="transno" name="customerid" />
                    
                    <div class="form-group">
                  <a href="#" data-toggle="modal" data-easein="swoopIn" data-target=".MyModals" type="button" class="btn btn-block btn-primary btn-xs"> Pelanggan Langsung & Kendaraan</a>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Jenis Pembayaran</label>
                        <select class="form-control select2"  style="width: 100%;" name="paytypeid" id="paytypeid"  placeholder="Jenis Pembayaran">
                            <option value=<?php echo $paytypeid; ?>><?php echo $paytypename; ?></option>
                           <?php
                                $rl = new Combobox();
                                $datarl = $rl->showPaytype();
                                foreach ($datarl as $value) {
                                    extract($value);
                                    echo "<option value='".$idpaytype."'>".$paytypename."</option>";
                                }
                            ?>
                          </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Kasir</label>
                        <select class="form-control select2"  style="width: 100%;" name="employeeid" id="employeeid"  placeholder="Kasir">
                            <option value=<?php echo $kasirid; ?>><?php echo $kasirname; ?></option>
                           <?php
                                $rl = new Combobox();
                                $datarl = $rl->showEmployeeKasir();
                                foreach ($datarl as $value) {
                                    extract($value);
                                    echo "<option value='".$idemployee."'>".$employeename."</option>";
                                }
                            ?>
                          </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mekanik</label>
                        <select class="form-control select2"  style="width: 100%;" name="mekanikid" id="mekanikid"  placeholder="Mekanik">
                            <option value=<?php echo $mekanikid; ?>><?php echo $mekanikname; ?></option>
                           <?php
                                $rl = new Combobox();
                                $datarl = $rl->showEmployeeMekanik();
                                foreach ($datarl as $value) {
                                    extract($value);
                                    echo "<option value='".$idemployee."'>".$employeename."</option>";
                                }
                            ?>
                          </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Jam Selesai</label>
                        <!-- time Picker -->
                      <div class="bootstrap-timepicker">
                          <div class="input-group">
                            <input type="text" class="form-control timepicker" name="finishtime" id="dayin">
                            <div class="input-group-addon">
                              <i class="fa fa-clock-o"></i>
                            </div>
                          </div><!-- /.input group -->
                      </div>
                    </div>
                  </div><!-- /.box-header -->
                 <div class="box-body">
                  <div class="form-group">
                        <label class="col-sm-3 control-label" style="font-size:13px !important; color:#000">Servis</label>
                        <div class="col-sm-9">
                         <input type="text" class="form-control" placeholder="Total Servis" id="serviceamountsw" name="serviceamountsw" onclick= "javascript:this.value=Comma(this.value);" value="<?php echo $serviceamount; ?>" >
                        <input type="hidden" id="serviceamount" name="serviceamount">
                        </div>
                    </div><br/>
                     <div class="form-group">
                        <label class="col-sm-3 control-label" style="font-size:13px !important; color:#000">Sparepart</label>
                        <div class="col-sm-9">
                         <input type="text" class="form-control" placeholder="Total Sparepart" id="sparepartamountsw" name="sparepartamountsw" onclick= "javascript:this.value=Comma(this.value);" value="<?php echo $sparepartamount; ?>" >
                        <input type="hidden" id="sparepartamount" name="sparepartamount">
                        </div>
                    </div><br/>

                     <div class="form-group" style="margin-top:-15px !important">
                        <label class="col-sm-3 control-label" style="font-size:15px !important; color:#0C0">Total</label>
                        <div class="col-sm-9">
                         <input type="text" class="form-control" placeholder="Total" id="totalamountsw" name="totalamountsw" onclick= "javascript:this.value=Comma(this.value);" value="<?php echo $totalamount; ?>" >
                        <input type="hidden" id="totalamount" name="totalamount">
                        </div>
                    </div><br/><br/>
                    <div class="form-group" style="margin-top:-15px !important">
                        <label class="col-sm-3 control-label" style="font-size:15px !important; color:#009">Bayar</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="Total Bayar" id="payamountsw" name="payamountsw" oninput="calculate(); calculatechange()" value="<?php echo $payamount; ?>">
                        <input type="hidden" id="payamount" name="payamount"  value="<?php echo $payamount; ?>">
                        </div>
                    </div><br/><br/>
                    <div class="form-group" style="margin-top:-15px !important">
                        <label class="col-sm-3 control-label" style="font-size:15px !important; color:#F00">Kembali</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" placeholder="Change Amount" id="changeamount" name="changeamount" oninput="calculatechange()"  onblur= "javascript:this.value=Comma(this.value);">
                        </div>
                    </div><br/>
                      <button  type="submit" class="btn btn-primary pull-right" name="savepay" style="margin-left:5px !important"><i class="fa fa-credit-card"></i> Bayar</button>
                   <a href="index.php?mod=salesservice" onclick="SaveClose();" class="btn btn-primary pull-right" name="saveclose11"><i class="fa fa-save"></i> Simpan</a>
                 </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!--/.col (left) -->
            
       		<div class="modal fade MyModals" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
			<div class="modal-dialog" style="width:420px !important;">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Pelanggan Langsung & Kendaraan</h4>
					</div>
                        <div class="modal-body">
							<div class="form-group">
								<label for="real_name" class="col-sm-3 control-label">No Polisi</label>
								<div class="col-sm-8">
                                  <input type="text" class="form-control" id="policeno" name="policeno" value="<?php echo $policeno; ?>">
								</div>
							</div><br/>
                            <div class="form-group">
								<label for="real_name" class="col-sm-3 control-label">Nama</label>
								<div class="col-sm-8">
                                  <input type="text" class="form-control" id="customername" name="customername" value="<?php echo $customername; ?>">
								</div>
							</div><br/>
                            <div class="form-group">
								<label for="real_name" class="col-sm-3 control-label">No Telp</label>
								<div class="col-sm-8">
                                  <input type="text" class="form-control" id="telpno" name="telpno" value="<?php echo $telpno; ?>">
								</div>
							</div><br/>
                            <div class="form-group">
								<label for="real_name" class="col-sm-3 control-label">Alamat</label>
								<div class="col-sm-8">
                                  <input type="text" class="form-control" id="address" name="address" value="<?php echo $address; ?>">
								</div>
							</div><br/>
                            <div class="form-group">
								<label for="real_name" class="col-sm-3 control-label">Model</label>
								<div class="col-sm-8">
                                <select class="form-control"  style="width: 100%;" name="vehiclemodel" id="vehiclemodel" onchange="generateDatavahicletype();">
                                    <option value="<?php echo $vehiclemodelsw; ?>"><?php echo $vehiclemodelsw; ?></option>
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
							</div><br/>
                            <div class="form-group">
								<label for="real_name" class="col-sm-3 control-label">Type</label>
								<div class="col-sm-8">
                                  <select class="form-control" id="vahicletype" name="vahicletype">
                                  <option value=<?php echo $vahicletype; ?>><?php echo $vahicletype; ?></option>
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
							<a href="#" data-toggle="modal" onclick="RefreshDataVehicle()"  data-easein="swoopIn" data-target=".MyModalvehicle"><i class="fa fa-hand-pointer-o"></i></a>
							<br/>
                            <div class="form-group">
								<label for="real_name" class="col-sm-3 control-label">Jenis</label>
								<div class="col-sm-8">
                                <select class="form-control" id="vahiclejenis" name="vahiclejenis">
                                <option value=<?php echo $vahiclejenis; ?>><?php echo $vahiclejenis; ?></option>
                                   <?php
                                        $rl = new Combobox();
                                        $datarl = $rl->showVehiclejenis();
                                        foreach ($datarl as $value) {
                                            extract($value);
                                            echo "<option value='".$lookupvehlicejenis."'>".$lookupvehlicejenis."</option>";
                                        }
                                    ?>
                                </select>
								</div>
							</div><br/>
                            <div class="form-group">
                              <label for="real_name" class="col-sm-3 control-label">Tgl Beli</label>
                              <div class="col-sm-8">
                                    <div class="input-group">
                                       <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                  <input type="text" class="form-control" id="purchasedate" name="purchasedate" value="<?php echo $purchasedate; ?>">
								</div>
                            </div><!-- /.input group -->
                            </div> <br/>
                            <div class="form-group">
								<label for="real_name" class="col-sm-3 control-label">No Mesin</label>
								<div class="col-sm-8">
                                  <input type="text" class="form-control" id="mechineno" name="mechineno" value="<?php echo $mechineno; ?>">
								</div>
							</div><br/>
                            <div class="form-group">
								<label for="real_name" class="col-sm-3 control-label">Rangka</label>
								<div class="col-sm-8">
                                  <input type="text" class="form-control" id="rangka" name="rangka" value="<?php echo $rangka; ?>">
								</div>
							</div><br/>
                            <div class="form-group">
								<label for="real_name" class="col-sm-3 control-label">Buku Srv</label>
								<div class="col-sm-8">
                                  <input type="text" class="form-control" id="servicebook" name="servicebook" value="<?php echo $servicebook; ?>">
								</div>
							</div><br/>
                            <div class="form-group">
								<label for="real_name" class="col-sm-3 control-label">Km</label>
								<div class="col-sm-8">
                                  <input type="text" class="form-control" id="km" name="km" value="<?php echo $km; ?>" onKeyUp="numericFilter(this);" oninput="calculatekm()">
								</div>
							</div><br/>
						</div>
                     
                     <div class="modal-body">
                        <div class="form-group">
								<label for="real_name" class="col-sm-3 control-label">Km Brkt</label>
								<div class="col-sm-8">
                                  <input type="text" class="form-control" id="nextkm" name="nextkm" value="<?php echo $nextkm; ?>" onKeyUp="numericFilter(this);">
								</div>
							</div><br/>
                        <div class="form-group">
								<label for="real_name" class="col-sm-3 control-label">Tgl Brkt</label>
								<div class="col-sm-8">
                                  <input type="text" class="form-control" id="nextdatekm" name="nextdatekm" value="<?php echo $nextdatekm; ?>">
								</div>
							</div>
                        
                     </div>
                        
					<div class="modal-footer">
						<button type="button" onclick="ClearVal()" class="btn btn-default btn-flat pull-left" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>

        </form>
	</div><!-- /.box-body -->
</section><!-- /.content -->
</div>

<div class="modal fade MyModalvehicle" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
<div class="modal-dialog" style="width:80%;">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Pilih Kendaraan</h4>
        </div>
        <div class="modal-body">
          <script type="text/javascript" language="javascript" >
			var dTableunit;
			$(document).ready(function() {
				dTableunit = $('#datagridvehicle').DataTable( {
					"bProcessing": true,
					"bServerSide": true,
					"bJQueryUI": false,
					"responsive": true,
					"pageLength": 10,
	
					"lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "All"]],
					"sAjaxSource": "<?php echo $pagepost;?>showvehicle.php",
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
				$('#datagridvehicle').removeClass( 'display' ).addClass('table table-striped table-bordered');
				$('#datagridvehicle tfoot th').each( function () {
					if( $(this).text() != "Action" ){
						var title = $('#datagridvehicle thead th').eq( $(this).index() ).text();
						$(this).html( '<input type="text" placeholder="Search '+title+'" class="form-control" />' );
					}
				} );
				
			} );
		</script>
        <table id="datagridvehicle"  class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Model</th>
                    <th>Jenis</th>
                    <th>CC</th>
                    <th>OTR</th>
                    <th>Tahun</th>
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



<script>
function getDataModals( idkey )
{
	if( idkey )
	{
		
		$.ajax({
			type: "POST",
			url: "<?php echo $pagepost;?>postvehicle.php",
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

	
	var vahicletype1 = data.vahicletype;
	$('#vahicletype option[value="' + vahicletype1 +'"]').prop("selected", true);
	
	var vahiclejenis1 = data.vahiclejenis;
	$('#vahiclejenis option[value="' + vahiclejenis1 +'"]').prop("selected", true);

	
	var vehiclemodel1 = data.vehiclemodel;
	$('#vehiclemodel option[value="' + vehiclemodel1 +'"]').prop("selected", true);
	

}




$("#vehiclemodel").change(function(){
	var idshipto = $("#vehiclemodel").val();
	$.ajax({
	  url: "lib/autovehicletype.php", 
	  data: $(this).serialize(),
	  success: function(data){    
		$("#vahicletype").html(data);
	  }
	});
});

$("#vehiclemodel").change(function(){
	var idshipto = $("#vehiclemodel").val();
	$.ajax({
	  url: "lib/autovehiclegroup.php", 
	  data: $(this).serialize(),
	  success: function(data){    
		$("#vahiclejenis").html(data);
	  }
	});
});

$("#policeno").change(function(){
	clearPoliceno();
	var policeno = document.getElementById('policeno').value;	
	getPoliceno(policeno);
});

$("#policeno").keypress(function (e) {
    if (e.which == 13) {
       clearPoliceno();
		var policeno = document.getElementById('policeno').value;	
		getPoliceno(policeno);
    }
});

function getPoliceno( policeno )
	{
		if( policeno )
		{
			$.ajax({
				type: "POST",
				url: "<?php echo $pagepost;?>getpoliceno.php",
				dataType: 'json',
				data: {policeno:policeno,type:"get"},
				success: function(res) {
					setPoliceno( res );
				}
			});
		}
		else
		{
			alert('Data tidak ditemukan!');
		}
	}
	
	function setPoliceno( data )
	{
		$("#policeno").val(data.policeno);
		$("#rangka").val(data.rangkano);
		$("#customername").val(data.bpkbname);
		$("#address").val(data.address);
		$("#mechineno").val(data.mechineno);
		$("#telpno").val(data.telpno);
		
		var vahicletype = data.vehicletype;
		$('#vahicletype option[value="' + vahicletype +'"]').prop("selected", true);
		
		var vahiclejenis = data.vahiclejenis;
		$('#vahiclejenis option[value="' + vahiclejenis +'"]').prop("selected", true);
		
		var vehiclemodel = data.vehiclemodel;
		$('#vehiclemodel option[value="' + vehiclemodel +'"]').prop("selected", true);
		
		
	}	
	
	function clearPoliceno()
	{
		$("#rangka").val("").removeAttr( "disabled" );
		$("#customername").val("").removeAttr( "disabled" );
		$("#address").val("").removeAttr( "disabled" );
		$("#vehiclemodel").val("").removeAttr( "disabled" );
		$("#vahicletype").val("").removeAttr( "disabled" );
		$("#vahiclejenis").val("").removeAttr( "disabled" );
		$("#mechineno").val("").removeAttr( "disabled" );
	}	
	function generateDatavahicletype()
	{
		var formData = $("#formData").serialize();
		$.ajax({
			type: "POST",
			url: "<?php echo $pagepost;?>generateservicetype.php",
			dataType: 'json',
			data: formData,
			success: function(data) {
				//$("#programid").val(data.programid);
				$("#type").val("generate");
				//alert("test");
			}
		});
	}
	
	function SaveClose()
	{
		var formData = $("#formData").serialize();
		$.ajax({
			type: "POST",
			url: "<?php echo $pagepost;?>generatesaveclose.php",
			dataType: 'json',
			data: formData,
			success: function(data) {
				//$("#programid").val(data.programid);
				$("#type").val("generate");
				//alert("test");
			}
		});
	}
 
</script>


<script>
function numericFilter(txb) {
   txb.value = txb.value.replace(/[^\0-9]/ig, "");
}
function calculatekm() {
	var km = document.getElementById('km').value;	
	var result = document.getElementById('nextkm');
		var hasiltotal = Number(km) + 2000;
		if (!isNaN(km)) {
		result.value = hasiltotal;
		}
}
</script>
<script type="text/javascript">
var key = "<?php echo $key; ?>";

$(function(){
   showdetail();
   showdetailservice();
});

function formatPrice(val,row){
    if (val < 0){
        return '<span style="color:red;">('+val+')</span>';
		alert ('test');
    } else {
        return val;
    }
}
</script>
<script>
$(document).ready(function() {
    $('#formData').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            employeeid: {
                validators: {
                    notEmpty: {
                        message: 'Kasir tidak boleh kosong'
                    } 
                }
            },
            mekanikid: {
                validators: {
                    notEmpty: {
                        message: 'Mekanik tidak boleh kosong'
                    }
                }
            }
        }
    });
});
</script>
<?php
	echo "<link rel='stylesheet' type='text/css' href='modules/".$modulename."/css/page.css' />";
	echo "<script type='text/javascript' src='modules/".$modulename."/js/page.js'></script>";
?>
   


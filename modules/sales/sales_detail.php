<?php
$db=new Database();
$subnavmenu = new Subnavmenu();
$moddetail=$_GET['mod'];
$modulename=str_replace("_detail","", $moddetail );
$datasubnavmenu = $subnavmenu->showsubnavmenu($modulename);
extract($datasubnavmenu);

$salesorder = new Sales();
$slip = new Slip();
	if (isset($_GET['key'])) {
	    $key = $_GET['key'];
	    $data = $salesorder->showDetail($key);
	    extract($data);
		$submodule= str_replace("modules/","", $modulesname );
		$dataslip = $slip->showSlip($submodule);
	    extract($dataslip);
	}
	if(isset($_REQUEST['saveclose'])){
        extract($_REQUEST);
		$key = $_GET['key'];
        $salesorder->saveclose($key, $datetrans, $customerid, $payamount, $changeamount, $totalamount, $paytypeid, $remark, $employeeid, $duedate, $disc, $discamt, $brutoamount);
		//$salesorder->updateprice($key);
	}
	if(isset($_REQUEST['delete'])){
        extract($_REQUEST);
		$key = $_GET['key'];
        $salesorder->delete($key);
	}
	$user=$_SESSION['uname'];
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

<script type="text/javascript">
$(codeEditor.target).val('newval');
</script>

<!-- Main content -->
<section class="content">
  <div class="row">
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
                    <table id="dg" style="height:490px; width:100%"
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
                                             striped: true,  
                                             editable:true,
                                             collapsible:false,
                                             rownumbers:true,
                                             fit:true,
                                             fitColumns:true,
                                             pagination:true,
                                             pageSize: 10,  
                                             pageList: [10],
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
                                                     var edinvname = $('#dg').edatagrid('getEditor',{
                                                         index:opts.editIndex,
                                                         field:'inventoryname'
                                                     });
                                                     var edstock = $('#dg').edatagrid('getEditor',{
                                                         index:opts.editIndex,
                                                         field:'stockqty'
                                                     });
                                                     
                                                     $(ed.target).numberbox('setValue',row.unitprice);
                                                     $(edunit.target).combobox('setValue',row.salesunit);
                                                     $(edstock.target).numberbox('setValue',row.stockqty);
                                                     $(ed.edinvname).validatebox('setValue',row.inventoryname);
                                                 },0);
                                             },
                                            fitColumns: true
                                        }
                                    }">Kode Part</th>
                            <th field="inventoryname" width="300">Nama Part</th>
                            <th data-options="field:'unit',width:70, sortable:true,
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
                            <th field="avlqty"  width="70" align="right" editor="{type:'numberbox',options:{precision:0,groupSeparator:','}}" formatter="formatPrice">Tersedia</th>
                            <th field="quantity" width="100" align="right" editor="{type:'numberbox',options:{min:0,precision:0,groupSeparator:','}}">Jumlah</th>
                            <th field="unitprice" width="100" align="right" editor="{type:'numberbox',options:{min:0,precision:0,groupSeparator:',',decimalSeparator:'.'}}" sortable="true">Harga</th>
                            <th field="discount" width="50" align="right" editor="{type:'numberbox',options:{min:0,precision:0,groupSeparator:','}}">Disc(%)</th>
                            <th field="discountamt" width="70" align="right" editor="{type:'numberbox',options:{min:0,precision:0,groupSeparator:','}}">Disc(Rp)</th>
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
  <div id="results"></div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                      <div class="box-body">
                          <div class="row">
                            <div class="col-xs-6">
                              <textarea class="form-control" id="remark" name="remark" placeholder="Keterangan"><?php echo $remarkhead; ?></textarea>
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
                    <div class="form-group" style="margin-top:-5px !important">
                       <label for="exampleInputPassword1">Tgl Trans</label>
                            <div class="input-group">
                               <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                              <input type="text" class="form-control pull-right" id="datetrans"  placeholder="Transaction Date" value="<?php echo $datetrans1; ?>"  name="datetrans" data-toggle="tooltip" data-placement="transdate" title="Transaction Date" data-date-format="dd/mm/yyyy">
                            </div><!-- /.input group -->
                    </div>
                    <div class="form-group" style="margin-top:-5px !important">
                    <label for="exampleInputPassword1">Pelanggan</label>
                      <select class="form-control select2"  style="width: 100%;" name="customerid" id="customerid"  placeholder="Pelanggan">
                       <option value=<?php echo $customerid; ?>><?php echo $customername; ?></option>
                       <?php
                            $rl = new Combobox();
                            $datarl = $rl->showCustomer();
                            foreach ($datarl as $value) {
                                extract($value);
                                echo "<option value='".$idcustomer."'>".$customername."</option>";
                            }
                        ?>
                      </select>
                    </div>
                    <div class="form-group" style="margin-top:-5px !important">
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
                    <div class="form-group" style="margin-top:-5px !important">
                       <label for="exampleInputPassword1">Jatuh Tempo</label>
                            <div class="input-group">
                               <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                              <input type="text" class="form-control pull-right" id="duedate"  placeholder="Jatuh Tempo" value="<?php echo $duedate; ?>"  name="duedate" data-toggle="tooltip" data-placement="transdate" title="Transaction Date" data-date-format="dd/mm/yyyy">
                            </div><!-- /.input group -->
                    </div>
                    <div class="form-group" style="margin-top:-5px !important">
                        <label for="exampleInputPassword1">Kasir</label>
                        <select class="form-control"  style="width: 100%;" name="employeeid" id="employeeid"  placeholder="Kasir">
                            <option value=<?php echo $employeeid; ?>><?php echo $employeename; ?></option>
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

                  </div><!-- /.box-header -->
                 <div class="box-body">
                    <div class="form-group">
                        <label class="col-sm-3 control-label" style="font-size:13px !important; color:#0C0">Total</label>
                        <div class="col-sm-9">
                         <input type="text" class="form-control" placeholder="Total" id="brutoamountsw" name="brutoamountsw" onchange="calculatechangedisc()" onclick= "javascript:this.value=Comma(this.value);" value="<?php echo $brutoamount; ?>" >
                        <input type="hidden" id="brutoamount" name="brutoamount" >
                        </div>
                    </div><br/>
                     <div class="form-group">
                        <label class="col-sm-3 control-label" style="font-size:13px !important; color:#0C0">Disc(%)</label>
                        <div class="col-sm-9">
                         <input type="text" class="form-control" placeholder="Diskon (%)" id="disc" name="disc" value="<?php echo $disc; ?>" oninput="calculate(); calculatechangedisc()">
                        </div>
                    </div><br/>
                     <div class="form-group">
                        <label class="col-sm-3 control-label" style="font-size:13px !important; color:#0C0">Disc(Rp)</label>
                        <div class="col-sm-9">
                         <input type="text" class="form-control" placeholder="Diskon (Rp)" id="discamtsw" name="discamtsw" value="<?php echo $discamtsw; ?>" oninput="calculate(); calculatediscamt()">
                         <input type="hidden" id="discamt" name="discamt"  value="<?php echo $discamt; ?>">
                        </div>
                    </div><br/>
                     
                     <div class="form-group">
                        <label class="col-sm-3 control-label" style="font-size:13px !important; color:#0C0">Netto</label>
                        <div class="col-sm-9">
                         <input type="text" class="form-control" placeholder="Total" id="totalamount" name="totalamount" value="<?php echo $totalamount; ?>" >
                        </div>
                    </div><br/>
                    <div class="form-group" style="margin-top:-15px !important">
                        <label class="col-sm-3 control-label" style="font-size:13px !important; color:#009">Bayar</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="Bayar" id="payamountsw" name="payamountsw" oninput="calculate(); calculatechange()" value="<?php echo $payamountsw; ?>">
                        <input type="hidden" id="payamount" name="payamount"  value="<?php echo $payamount; ?>">
                        </div>
                    </div><br/><br/>
                    <div class="form-group" style="margin-top:-15px !important">
                        <label class="col-sm-3 control-label" style="font-size:13px !important; color:#F00">Kembali</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" placeholder="Kembali" id="changeamount" name="changeamount" oninput="calculatechange()"  value="<?php echo $changeamount; ?>">
                        </div>
                    </div><br/><br/>
                  <button type="submit"  class="btn btn-primary" name="saveclose"><i class="fa fa-credit-card"></i> Simpan Pembayaran</button>
                 </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!--/.col (left) -->

        </form>
	</div><!-- /.box-body -->
</section><!-- /.content -->
</div>

<script type="text/javascript">
var key = "<?php echo $key; ?>";

$(function(){
   showdetail();
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
            }
        }
    });
});
</script>
<?php
	echo "<link rel='stylesheet' type='text/css' href='modules/".$modulename."/css/page.css' />";
	echo "<script type='text/javascript' src='modules/".$modulename."/js/page.js'></script>";
?>
   


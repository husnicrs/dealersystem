<?php
$db=new Database();
$subnavmenu = new Subnavmenu();
$moddetail=$_GET['mod'];
$modulename=str_replace("_detail","", $moddetail);
$datasubnavmenu = $subnavmenu->showsubnavmenu($modulename);
extract($datasubnavmenu);

${"$modulename"} = new Cashbank();
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
        ${"$modulename"}->saveclose($key, $datetrans, $cusname, $address, $unit, $nofaktur, $soid);
		${"$modulename"}->updateso($soid);
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
            <div class="box-header with-border">
               <div class="row">
                <!-- Coloumn 1-->
               <div class="col-md-4">
                    <div class="form-group">
                    	<input type="hidden" class="form-control" id="type" name="type" value="get">
                        <input type="hidden" class="form-control" id="typesave" name="typesave" value="generate">
                        <input type="hidden" class="form-control" id="idtrans" name="idtrans" value="<?php echo $key; ?>">
                        <input type="hidden" id="soid" name="soid" value="<?php echo $soid; ?>">

                        <label for="real_name" class="col-sm-3 control-label">No Tran</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="transno" name="transno"  disabled="disabled" value="<?php echo $notrans; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="real_name" class="col-sm-3 control-label">Tgl Tran</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                               <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                              <input type="text" class="form-control pull-right" id="datetrans"  placeholder="Transaction Date" value="<?php echo $datetrans; ?>"  name="datetrans" data-toggle="tooltip" data-placement="transdate" title="Transaction Date" data-date-format="dd/mm/yyyy">
                            </div><!-- /.input group -->
                        </div>
                    </div>
                 </div>
                  <!-- Coloumn 3-->                                   
                <div class="col-md-4">
    				<div class="form-group">
                        <label for="real_name" class="col-sm-3 control-label">Customer</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="cusname" name="cusname"  value="<?php echo $cusname; ?>">
                        </div>
                        <div class="col-sm-2">
                            <a href="#" data-toggle="modal" onclick="RefreshDataUnit()" data-easein="swoopIn" data-target=".MyModalsunit" type="button" class="btn btn-warning" id="chooseunit"><i class="fa fa-hand-pointer-o"></i> Pilih</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="real_name" class="col-sm-3 control-label">Alamat</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="address" name="address" value="<?php echo $address; ?>">
                        </div>
                    </div>
                </div>
                 <!-- Coloumn 2-->               
                <div class="col-md-4" style="margin-bottom:-20px !important">
                    <div class="form-group">
                        <label for="real_name" class="col-sm-3 control-label">Unit</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="unit" name="unit" value="<?php echo $unit; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="real_name" class="col-sm-3 control-label">No Faktur</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nofaktur" name="nofaktur" value="<?php echo $nofaktur; ?>">
                        </div>
                    </div>
                    <input type="hidden" id="remark" name="remark">
                </div>
    
                
            </div>
          </div><!-- /.box-header -->
          <div class="box-body">
                <table id="dg" style="height:350px"
                        toolbar="#toolbar" pagination="true" idField="idtransdet"
                        rownumbers="true" fitColumns="true" singleSelect="true" showFooter="true" data-options="pagination:true, rownumbers:true,singleSelect:true,
                            autoRowHeight:false,pageSize:50">
                    <thead>
                        <tr>
                             <th data-options="field:'acccode', width:200, sortable:true, nowrap:true,
                                    formatter:function(value,row){
                                        return row.acccode;
                                    },
                                    editor:{
                                        type:'combogrid',
                                        options:{
                                            panelWidth:830,
                                            pagination: true,
                                            mode:'remote',
                                            idField:'accountcode',
                                            textField:'accountcode',
                                            url:'lib/combogrid/account.php',
                                            columns:[[
                                                {field:'accountcode',title:'Kode Akun',width:80,sortable:true},
                                                {field:'accountname',title:'Nama Akun',width:200,sortable:true}
                                            ]],
                                             onSelect: function(index,row){
                                                 setTimeout(function(){
                                                     var opts = $('#dg').edatagrid('options');
                                                     var ed = $('#dg').edatagrid('getEditor',{
                                                         index:opts.editIndex,
                                                         field:'accname'
                                                     });
                                                     $(ed.target).combobox('setValue',row.accountname);
                                                 },0);
                                             },
                                            fitColumns: true
                                        }
                                    }">No Akun</th>
                            <th data-options="field:'accname',width:70, sortable:true,
                                    formatter:function(value,row){
                                        return row.accname;
                                    },
                                    editor:{
                                        type:'combobox'
                                    }">Nama Akun</th>
                            <th field="description" width="100" align="left" editor="{type:'validatebox'}">Keterangan</th>
                        	<th field="debet" width="100" align="right" editor="{type:'numberbox',options:{min:0,precision:0,groupSeparator:','}}">Debet</th>
                            <th field="credit" width="100" align="right" editor="{type:'numberbox',options:{min:0,precision:0,groupSeparator:','}}">Kredit</th>
                           <th field="print" width="20" align="center" editor="{type:'checkbox',options:{on: 'Y',off: ''}}">Cetak</th>
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
            <button class="btn btn-primary" name="saveclose"><i class="fa fa-save"></i> Simpan</button>
            <a href="#" onclick="SavePrint();" data-toggle="modal" data-easein="swoopIn" data-target=".MyModals" type="button" class="btn btn-primary"> <i class="fa fa-print"></i> Simpan & Cetak</a>
           	<button type="button" class="btn btn-primary btn-flat" onclick="showsaldo()"> <i class="fa fa-search"></i> Saldo</button>
            <button class="btn btn-danger" name="delete"><i class="fa fa-save"></i> Hapus</button>
            <a  href="index.php?mod=<?php echo str_replace("_detail","", $modulename ); ?>" type="button" class="btn btn-default"> <i class="fa fa-close"></i> Tutup</a>
        </div>
</div>
</section><!-- /.content -->
</div>


<div class="modal fade MyModalsunit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog" style="width:80%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Transaksi</h4>
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
					"lengthMenu": [[10, 50, 100, -1], [10, 50, 100, "All"]],
					"sAjaxSource": "<?php echo $pagepost;?>showtran.php",
					"sServerMethod": "POST",
					"columnDefs": [
					{ "orderable": true, "targets": 0, "searchable": true },
					{ "orderable": true, "targets": 1, "searchable": true },
					{ "orderable": true, "targets": 2, "searchable": true },
					{ "orderable": true, "targets": 3, "searchable": true },
					{ "orderable": true, "targets": 4, "searchable": true },
					{ "orderable": true, "targets": 5, "searchable": true }
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
                	<th>No </th>
                    <th>Tanggal</th>
                    <th>Customer</th>
                    <th>Alamat</th>
                    <th>Unit</th>
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
function getDataModals( idkey )
{
	
	if( idkey )
	{
		$.ajax({
			
			type: "POST",
			url: "<?php echo $pagepost;?>posttran.php",
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
	$("#idkey").val(data.idkey);
	$("#nofaktur").val(data.notrans);
	$("#cusname").val(data.cusname);
	$("#unit").val(data.unit);
	$("#address").val(data.address);	
	$("#soid").val(data.idkey);	

}


var key = "<?php echo $key; ?>";

$(function(){
   showdetail();
});
</script>
<?php
	echo "<link rel='stylesheet' type='text/css' href='modules/".$modulename."/css/page.css' />";
	echo "<script type='text/javascript' src='modules/".$modulename."/js/page.js'></script>";
?>



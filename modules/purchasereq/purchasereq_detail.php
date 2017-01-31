<?php
$db=new Database();
$subnavmenu = new Subnavmenu();
$moddetail=$_GET['mod'];
$modulename=str_replace("_detail","", $moddetail );
$datasubnavmenu = $subnavmenu->showsubnavmenu($modulename);
extract($datasubnavmenu);

$purchasereq = new Purchasereq();
$slip = new Slip();
	if (isset($_GET['key'])) {
	    $key = $_GET['key'];
	    $data = $purchasereq->showDetail($key);
	    extract($data);
		$submodule= str_replace("modules/","", $modulesname );
		$dataslip = $slip->showSlip($submodule);
	    extract($dataslip);
	}
	if(isset($_REQUEST['saveclose'])){
        extract($_REQUEST);
		$key = $_GET['key'];
        $purchasereq->saveclose($key, $datetrans, $remark);
	}
	if(isset($_REQUEST['savevalidate'])){
        extract($_REQUEST);
		$key = $_GET['key'];
        $purchasereq->savevalidate($key, $datetrans, $remark);
	}
	if(isset($_REQUEST['cancel'])){
        extract($_REQUEST);
		$key = $_GET['key'];
        $purchasereq->cancel($key);
	}
	if(isset($_REQUEST['delete'])){
        extract($_REQUEST);
		$key = $_GET['key'];
        $purchasereq->delete($key);
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
   <form class="form-horizontal" id="formData" name="formData"  method="post" action="" enctype="multipart/form-data">
    <div class="col-xs-12">
      <div class="easyui-panel" style="padding:5px;">
             <a href="<?php echo str_replace("_detail","", $modulename ); ?>.html" type="button" class="btn btn-default btn-sm"> <i class="fa fa-close"></i> Close</a>
            <button class="btn btn-primary btn-sm" name="saveclose"><i class="fa fa-save"></i> Save and Close</button>
            <button class="btn btn-primary btn-sm" name="savevalidate"><i class="fa fa-save"></i> Save and Validate</button>
            <a href="#" data-toggle="modal" data-easein="swoopIn" data-target=".MyModals" type="button" class="btn btn-primary btn-sm"> <i class="fa fa-print"></i> Print</a>
            <button class="btn btn-warning btn-sm" name="cancel"><i class="fa fa-save"></i> Cancel</button>
            <button class="btn btn-danger btn-sm" name="delete"><i class="fa fa-save"></i> Delete</button>
        </div>
        <div class="easyui-tabs" >
            <div title="<?php echo $subnavmenuname; ?> Header" style="padding:10px;">
                <div class="box box-danger">
                    <div class="box-header with-border"  style="margin-bottom:-10px">
                       <div class="box-body">
                           <div class="row">
                           <!-- Coloumn 1-->
               <div class="col-md-4">
                    <div class="form-group">
                        <label for="real_name" class="col-sm-3 control-label">Trans No</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="transno" name="transno"  disabled="disabled" value="<?php echo $notrans; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="real_name" class="col-sm-3 control-label">Trans Date</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                               <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                              <input type="text" class="form-control pull-right" id="datetrans"  placeholder="Transaction Date" value="<?php echo $datetrans; ?>"  name="datetrans" data-toggle="tooltip" data-placement="transdate" title="Transaction Date">
                            </div><!-- /.input group -->
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="real_name" class="col-sm-3 control-label">Remark</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="remark" name="remark"><?php echo $remark; ?></textarea>
                        </div>
                    </div>

                 </div>
                 <!-- Coloumn 2-->               
                <div class="col-md-4" style="margin-bottom:-20px !important">
                </div>
    
                 <!-- Coloumn 3-->                                   
                <div class="col-md-4">
                </div>
            </div>
          </div><!-- /.box-body -->
       </div><!-- /.box -->
    </div>
</div>
<div title="<?php echo $subnavmenuname; ?> Detail"  style="padding:10px;">
  <div class="box box-danger">
      <div class="box-body">
            <table id="dg" style="height:430px; width:100%"
                    toolbar="#toolbar" pagination="true" idField="idtransdet"
                    rownumbers="true" fitColumns="true" singleSelect="true" showFooter="true" data-options="pagination:true, rownumbers:true,singleSelect:true,
                        autoRowHeight:false,pageSize:50">
                <thead>
                    <tr>
                        <th data-options="field:'inventoryid', width:250, sortable:true, nowrap:true,
                                formatter:function(value,row){
                                    return row.inventoryname;
                                },
                                
                                editor:{
                                    type:'combobox',
                                    options:{
                                        valueField:'idinventory',
                                        textField:'inventoryname',
                                        method:'get',
                                        url:'lib/lookup/inventory.php',
                                        required:true,
                                        panelHeight:'auto'
                                    }
                                }">Product</th>
                        <th data-options="field:'unit',width:200, sortable:true,
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
                                }">Unit</th>
                         <th data-options="field:'colorid',width:200, sortable:true,
                                formatter:function(value,row){
                                    return row.inventorycolorname;
                                },
                                editor:{
                                    type:'combobox',
                                    options:{
                                        valueField:'idinventorycolor',
                                        textField:'inventorycolorname',
                                        method:'get',
                                        url:'lib/lookup/color.php',
                                        required:true
                                    }
                                }">Color</th>
                         <th data-options="field:'sizeid',width:200, sortable:true,
                                formatter:function(value,row){
                                    return row.inventorysizename;
                                },
                                editor:{
                                    type:'combobox',
                                    options:{
                                        valueField:'idinventorysize',
                                        textField:'inventorysizename',
                                        method:'get',
                                        url:'lib/lookup/size.php',
                                        required:true
                                    }
                                }">Size</th>
                            <th field="quantity" width="100" align="right" editor="{type:'numberbox',options:{min:0,precision:0,groupSeparator:','}}">Quantity</th>
                    </tr>
                </thead>
            </table>
    
            <div id="toolbar">
                <table cellpadding="0" cellspacing="0" style="width:100%">
                    <tr>
                         <td>
                            <a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="javascript:$('#dg').edatagrid('addRow')">New</a>
                            <a href="#" class="easyui-linkbutton" iconCls="icon-save" plain="true" onclick="javascript:$('#dg').edatagrid('saveRow')">Accept</a>
                            <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="javascript:$('#dg').edatagrid('destroyRow')">Destroy</a>
                            <a href="#" class="easyui-linkbutton" iconCls="icon-undo" plain="true" onclick="javascript:$('#dg').edatagrid('cancelRow')">Cancel</a>
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
    </div>
    </form>
</div><!-- /.box-body -->
</section><!-- /.content -->
</div>

<!-- Modal Popup -->
<div class="modal fade MyModals" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog" style="width:420px !important;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Select Print Out</h4>
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
            	<button type="button" class="btn btn-primary btn-flat" onclick="window.open('?mod=slip')"> <i class="fa fa-wrench"></i> Config</button>
                <button type="button" class="btn btn-primary btn-flat" onclick="showslip()"> <i class="fa fa-search"></i> Preview</button>
                <button type="button" onclick="ClearVal()" class="btn btn-default btn-flat pull-left" data-dismiss="modal"> <i class="fa fa-close"></i> Close</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
var key = "<?php echo $key; ?>";

$(function(){
   showdetail();
});
</script>
<?php
	echo "<link rel='stylesheet' type='text/css' href='modules/".$modulename."/css/page.css' />";
	echo "<script type='text/javascript' src='modules/".$modulename."/js/page.js'></script>";
?>



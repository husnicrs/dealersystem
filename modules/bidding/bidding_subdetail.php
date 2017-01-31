<?php
$db=new Database();
$subnavmenu = new Subnavmenu();
$moddetail=$_GET['mod'];
$modulename=str_replace("_subdetail","", $moddetail );
$datasubnavmenu = $subnavmenu->showsubnavmenu($modulename);
extract($datasubnavmenu);

$bidding = new Bidding();
if (isset($_GET['key'])) {
	$key = $_GET['key'];
	$data = $bidding->showSubetail($key);
	extract($data);
}
?>

<section class="content-header" style="margin-top:-15px !important; margin-bottom:-20px !important">
  <h4>
    Product: <?php echo $inventoryname; ?>
  </h4>
</section>
<form class="form-horizontal" id="formData" name="formData"  method="post" action="" enctype="multipart/form-data">
<input type="hidden" class="form-control" id="transdetid" name="transdetid" value="<?php echo $key; ?>">
<input type="hidden" class="form-control" id="inventoryid" name="inventoryid" value="<?php echo $inventoryid; ?>">
<input type="hidden" class="form-control" id="type" name="type" value="generate">
</form>
<!-- Main content -->
<section class="content">
    <table id="dg" style="width:100%;height:450px"
            toolbar="#toolbar" pagination="true" idField="idtranssubdet"
            fitColumns="false"  showFooter="true" footer="#ft" data-options="pagination:true, rownumbers:true,singleSelect:true,
                autoRowHeight:false,pageSize:50">
            <div id="ft" style="padding:2px 5px;">
               <a href="#" type="button" class="btn btn-danger btn-sm" onclick="generateData()"> <i class="fa fa-magic"></i> Generate</a>
            </div>
        <thead>
            <tr>
                <th data-options="field:'supplierid',width:250, sortable:true,
                    formatter:function(value,row){
                        return row.suppliername;
                    },
                    editor:{
                        type:'combobox',
                        options:{
                            valueField:'idsupplier',
                            textField:'suppliername',
                            method:'get',
                            url:'lib/lookup/supplier.php',
                            required:true
                        }
                    }">Supplier</th>
              	<th data-options="field:'currency',width:200, sortable:true,
                    formatter:function(value,row){
                        return row.currency;
                    },
                    editor:{
                        type:'combobox',
                        options:{
                            valueField:'currencyname',
                            textField:'currencyname',
                            method:'get',
                            url:'lib/lookup/currency.php',
                            required:true
                        }
                    }">Currency</th>
                <th field="price" width="100" align="right" editor="{type:'numberbox',options:{min:0,precision:0,groupSeparator:','}}">Price</th>
                <th field="rate" width="100" align="right" editor="{type:'numberbox',options:{min:0,precision:0,groupSeparator:','}}">Rate</th>
                <th field="disc" width="100" align="right" editor="{type:'numberbox',options:{min:0,precision:0,groupSeparator:','}}">Disc</th>
                <th field="paydue" width="100" align="right" editor="{type:'numberbox',options:{min:0,precision:0,groupSeparator:','}}">Paydue</th>
                <th field="leadtime" width="100" align="right" editor="{type:'numberbox',options:{min:0,precision:0,groupSeparator:','}}">Leadtime</th>
                <th field="minorder" width="100" align="right" editor="{type:'numberbox',options:{min:0,precision:0,groupSeparator:','}}">Min Order</th>
        </thead>
    </table>
    
    <div id="toolbar">
     <table cellpadding="0" cellspacing="0" style="width:100%">
        <tr>
         	<td>
                <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="javascript:$('#dg').edatagrid('addRow')">New</a>
                <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="javascript:$('#dg').edatagrid('destroyRow')">Destroy</a>
                <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-save" plain="true" onclick="javascript:$('#dg').edatagrid('saveRow')">Save</a>
                <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-undo" plain="true" onclick="javascript:$('#dg').edatagrid('cancelRow')">Cancel</a>
       		</td>
            <td style="text-align:right">
                <input type="text" id="msearchdetail" style="line-height:18px;border:1px solid #ccc" onkeydown="keyCode(event)">
                <a href="#" class="easyui-linkbutton" iconCls="icon-search" plain="true" onclick="doSearch()"></a>
            </td>
         </tr>
    </table>
    </div>
    </div>
</section><!-- /.content -->    
<script type="text/javascript">
var key = "<?php echo $key; ?>";

$(function(){
   showsubdetail();
});
</script>
<?php
	echo "<link rel='stylesheet' type='text/css' href='modules/".$modulename."/css/page.css' />";
	echo "<script type='text/javascript' src='modules/".$modulename."/js/page.js'></script>";
?>

<script type="text/javascript">

function refreshgrid()
{
	$('#dg').datagrid('reload'); 
}
function generateData()
{
	var formData = $("#formData").serialize();
	$.ajax({
		type: "POST",
		url: "<?php echo $pagepost; ?>generate.php",
		dataType: 'json',
		data: formData,
		success: function(data) {
			//$("#programid").val(data.programid);
			$("#type").val("generate");
			refreshgrid();
			generateMsg();
		}
	});
}

function generateMsg()
{
	 $.messager.alert('Info','Generate process is complete!','info');
}
</script>

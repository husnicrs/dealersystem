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
        <thead>
            <tr>
                <th field="suppliername" width="250" align="left">Supplier</th>
                <th field="currency" width="100" align="left">Currency</th>
                <th field="price" width="100" align="right">Price</th>
                <th field="rate" width="100" align="right">Rate</th>
                <th field="disc" width="100" align="right">Disc</th>
                <th field="paydue" width="100" align="right">Paydue</th>
                <th field="leadtime" width="100" align="right">Leadtime</th>
                <th field="minorder" width="100" align="right">Min Order</th>
                <th field="selected" width="100" align="center" editor="{type:'checkbox',options:{on: 'Y',off: ''}}">Selected</th>
        </thead>
    </table>
    
    <div id="toolbar">
     <table cellpadding="0" cellspacing="0" style="width:100%">
        <tr>
         	<td>
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


<?php
$db=new Database();
$subnavmenu = new Subnavmenu();
$moddetail=$_GET['mod'];
$modulename=str_replace("_saldo","", $moddetail);
$datasubnavmenu = $subnavmenu->showsubnavmenu($modulename);
extract($datasubnavmenu);

?>
<!-- Main content -->
<section class="content">
  <div class="row">
   
    <div class="col-xs-12">
        <form class="form-horizontal" id="formData" name="formData"  method="post" action="" enctype="multipart/form-data">
          <div class="box-body">
                <table id="dg" style="height:600px"
                        toolbar="#toolbar" pagination="true" idField="idtransdet"
                        rownumbers="true" fitColumns="true" singleSelect="true" showFooter="true" data-options="pagination:true, rownumbers:true,singleSelect:true,
                            autoRowHeight:false,pageSize:50">
                    <thead>
                        <tr>
                            <th field="datetrans" width="70" align="left">Tanggal</th>
                            <th field="notrans" width="100" align="left">Nomor</th>
                            <th field="acccode" width="70" align="left">Kode Akun</th>
                            <th field="accname" width="120" align="left">Nama Akun</th>
                            <th field="description" width="300" align="left">Keterangan</th>
                        	<th field="debet" width="100" align="right">Debet</th>
                            <th field="credit" width="100" align="right">Kredit</th>
                            <th field="remain" width="100" align="right">Saldo</th>
                        </tr>
                    </thead>
                </table>
                <div id="toolbar">
                    <table cellpadding="0" cellspacing="0" style="width:100%">
                        <tr>
                             <td>
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
    </form>
</div>

</section><!-- /.content -->
</div>


<script type="text/javascript">
var key = "<?php echo $key; ?>";

$(function(){
   showdetail();
});
</script>
<?php
	echo "<link rel='stylesheet' type='text/css' href='modules/".$modulename."/css/page.css' />";
	echo "<script type='text/javascript' src='modules/".$modulename."/js/pagesaldo.js'></script>";
?>



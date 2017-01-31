<?php
$db=new Database();
$vehlicemodelgroup = new Vehlicemodelgroup();
	if (isset($_GET['key'])) {
	    $key = $_GET['key'];
	    $data = $vehlicemodelgroup->showDetail($key);
	    extract($data);
	}
?>
<script type="text/javascript">
	function doSearch(){
		$('#dg11').datagrid('load',{
			msearchdetail: $('#msearchdetail').val(),
		});
	}
</script>
<!-- Main content -->
<section class="content">
 <form class="form-horizontal" id="formData" name="formaccount"  method="post" action="" enctype="multipart/form-data">
  <div class="row">
    <div class="col-xs-12">
    <div class="box box-danger">
        <div class="box-header with-border"  style="margin-bottom:-10px">
           <div class="box-body">
               <div class="row">
               <!-- Coloumn 1-->
               <div class="col-md-10">
                <div class="form-group">
                    <label for="real_name" class="col-sm-1 control-label">Group Model</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="groupmodelname" name="groupmodelname"  value="<?php echo $vehlicemodelgroupname; ?>">
                    </div>
                </div>
             </div>
            </div>
        </div>
	</div><!-- /.box-body -->
  </div><!-- /.box -->

<script type="text/javascript">
$(function(){
	$('#dg11').edatagrid({
		url: 'modules/vehlicemodelgroup/post/detail/get.php?key=<?php echo $key ?>',
		saveUrl: 'modules/vehlicemodelgroup/post/detail/save.php?key=<?php echo $key ?>',
		updateUrl: 'modules/vehlicemodelgroup/post/detail/update.php',
		destroyUrl: 'modules/vehlicemodelgroup/post/detail/destroy.php',
		
		onBeforeSave: function(index){
 			
				var vehlicetype = $(this).edatagrid('getEditor', {
					index: index,
					field: 'vehlicetype'
				});
				var row = $(this).edatagrid('getRows')[index];
				row.vehlicetype = $(vehlicetype.target).combobox('getText');
				
		}
	});
});

</script>
    
<!-- /.box 2 -->
<div class="box" style="margin-bottom:-10px !important">
 <div class="nav-tabs-custom"></div>
      <div class="box-header" style="margin-top:-40px">
        </div><!-- /.box-header -->
      <div class="box-body">
	<table id="dg11" style="height:300px"
        toolbar="#toolbar" pagination="true" idField="idvehlicemodelgroupdet"
        rownumbers="true" pageSize:"9"  showFooter="true" remoteSort="false" multiSort="true" showFooter="true" data-options="pagination:true, rownumbers:true,singleSelect:true,
                autoRowHeight:false,pageSize:50">
		<thead>
			<tr>
				
                        <th data-options="field:'vehlicetype', width:200, sortable:true, nowrap:true,
                                    formatter:function(value,row){
                                        return row.vehlicetype;
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
                                             idField:'vehlicetype',
                                            textField:'vehlicetype',
                                            url:'lib/combogrid/vehicletype.php',
                                            columns:[[
                                            {field:'vehlicetype',title:'Jenis',width:170,sortable:true},
                                                {field:'vehlicemodel',title:'Model',width:80,sortable:true},
                                                
                                            ]],
                                            
                                            fitColumns: true
                                        }
                                    }">Type Kendaraan</th>
                        <th field="vehlicemodel" width="300">Model Kendaraan</th>
		</thead>
	</table>
	<div id="toolbar">
    <table cellpadding="0" cellspacing="0" style="width:100%">
        <tr>
             <td>
                <a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="javascript:$('#dg11').edatagrid('addRow')">Tambah</a>
                <a href="#" class="easyui-linkbutton" iconCls="icon-save" plain="true" onclick="javascript:$('#dg11').edatagrid('saveRow')">Simpan</a>
                <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="javascript:$('#dg11').edatagrid('destroyRow')">Hapus</a>
                <a href="#" class="easyui-linkbutton" iconCls="icon-undo" plain="true" onclick="javascript:$('#dg11').edatagrid('cancelRow')">Batal</a>
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
</div><!-- /.box-body -->
</div><!-- /.box -->
</div><!-- /.row --> 
</div>
</form>
</section><!-- /.content -->


<script>
	function refreshgrid()
	{
		$('#dg11').datagrid('reload'); 
	}
 	function keyCode(event) {
    var x = event.keyCode;
    if (x == 13) {
        doSearch();
    }
	return false;
	}
	
	$('#formData').on('keyup keypress', function(e) {
	  var keyCode = e.keyCode || e.which;
	  if (keyCode === 13) { 
		e.preventDefault();
		return false;
	  }
	});
	
	function LinkSubForm(value,row) {
		var url = 'winopen.php?mod=period_subdetail&key='+row.idperioddet;
		//window.open(myurl, "myWindow", " height = 300, width = 300, resizable = 0")
		return '<a onclick="PopupCenterDual(\'' + url + '\',\'NIGRAPHIC\',\'1200\',\'470\'); " href="javascript:void(0);">(+)</a>'
	}
	
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


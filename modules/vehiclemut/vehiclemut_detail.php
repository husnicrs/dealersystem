<?php
$db=new Database();
$subnavmenu = new Subnavmenu();
$moddetail=$_GET['mod'];
$modulename=str_replace("_detail","", $moddetail);
$datasubnavmenu = $subnavmenu->showsubnavmenu($modulename);
extract($datasubnavmenu);

${"$modulename"} = new Vehiclemut();
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
        ${"$modulename"}->saveclose($key, $datetrans, $fromchannel, $tochannel, $remark);
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
            <div class="box-header with-border">
               <div class="row">
                <!-- Coloumn 1-->
               <div class="col-md-4">
                    <div class="form-group">
                        <label for="real_name" class="col-sm-3 control-label">No Pakai</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="transno" name="transno"  disabled="disabled" value="<?php echo $notrans; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="real_name" class="col-sm-3 control-label">Tgl Pakai</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                               <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                              <input type="text" class="form-control pull-right" id="datetrans"  placeholder="Transaction Date" value="<?php echo $datetrans1; ?>"  name="datetrans" data-toggle="tooltip" data-placement="transdate" title="Transaction Date" data-date-format="dd/mm/yyyy">
                            </div><!-- /.input group -->
                        </div>
                    </div>
                 </div>
                 <!-- Coloumn 2-->               
                <div class="col-md-4" style="margin-bottom:-20px !important">
                    <div class="form-group">
                        <label for="real_name" class="col-sm-3 control-label">Dari Channel</label>
                        <div class="col-sm-9">
                             <select class="form-control"  style="width: 100%;" name="fromchannel" id="fromchannel"  placeholder="Dari Chanel">
                               <option value=<?php echo $idfromchannel; ?>><?php echo $fromchannel; ?></option>
                               <?php
                                    $rl = new Combobox();
                                    $datarl = $rl->showChannel();
                                    foreach ($datarl as $value) {
                                        extract($value);
                                        echo "<option value='".$idchannel."'>".$channelname."</option>";
                                    }
                                ?>
                              </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="real_name" class="col-sm-3 control-label">Ke Channel</label>
                        <div class="col-sm-9">
                             <select class="form-control"  style="width: 100%;" name="tochannel" id="tochannel"  placeholder="Ke Chanel">
                               <option value=<?php echo $idtochannel; ?>><?php echo $tochannel; ?></option>
                               <?php
                                    $rl = new Combobox();
                                    $datarl = $rl->showChannel();
                                    foreach ($datarl as $value) {
                                        extract($value);
                                        echo "<option value='".$idchannel."'>".$channelname."</option>";
                                    }
                                ?>
                              </select>
                        </div>
                    </div>
                </div>
    
                 <!-- Coloumn 3-->                                   
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="real_name" class="col-sm-3 control-label">Keterangan</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="remark" name="remark"><?php echo $remarkhead; ?></textarea>
                        </div>
                    </div>
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
                             <th data-options="field:'vehiclemodel', width:350, sortable:true, nowrap:true,
                                    formatter:function(value,row){
                                        return row.vehiclemodel;
                                    },
                                    editor:{
                                        type:'combogrid',
                                        options:{
                                            panelWidth:830,
                                            pagination: true,
                                            mode:'remote',
                                            idField:'vehlicemodel',
                                            textField:'vehlicemodel',
                                            url:'lib/combogrid/vehiclemut.php',
                                            columns:[[
                                                {field:'vehlicemodel',title:'Model',width:150,sortable:true},
                                                {field:'mechineno',title:'No Mesin',width:200,sortable:true},
                                                {field:'rangkano',title:'No Rangka',width:100,sortable:true},
                                                {field:'vehlicejenis',title:'Jenis',width:70,sortable:true},
                                                {field:'vehicletype',title:'Type',width:70,sortable:true},
                                                {field:'vehiclecolor',title:'Warna',width:70,sortable:true},
                                                {field:'channelname',title:'Channel',width:70,sortable:true}
                                            ]],
                                             onSelect: function(index,row){
                                                 setTimeout(function(){
                                                     var opts = $('#dg').edatagrid('options');
                                                     var ed = $('#dg').edatagrid('getEditor',{
                                                         index:opts.editIndex,
                                                         field:'rangkano'
                                                     });
                                                     
                                                     var edvehicletype = $('#dg').edatagrid('getEditor',{
                                                         index:opts.editIndex,
                                                         field:'vehicletype'
                                                     });
                                                     
                                                     var edmechineno = $('#dg').edatagrid('getEditor',{
                                                         index:opts.editIndex,
                                                         field:'mechineno'
                                                     });
                                                     
                                                     var edvehiclecolor = $('#dg').edatagrid('getEditor',{
                                                         index:opts.editIndex,
                                                         field:'vehiclecolor'
                                                     });
                                                     
                                                     var edvehiclejenis = $('#dg').edatagrid('getEditor',{
                                                         index:opts.editIndex,
                                                         field:'vehiclejenis'
                                                     });
                                                     
                                                     $(ed.target).combobox('setValue',row.rangkano);
                                                     $(edvehicletype.target).combobox('setValue',row.vehicletype);
                                                     $(edmechineno.target).combobox('setValue',row.mechineno);
                                                     $(edvehiclecolor.target).combobox('setValue',row.vehiclecolor);
                                                     $(edvehiclejenis.target).combobox('setValue',row.vehlicejenis);
                                                     
                                                 },0);
                                             },
                                            fitColumns: true
                                        }
                                    }">Model</th>
                                    
                                    <th data-options="field:'vehicletype',width:70, sortable:true,
                                    formatter:function(value,row){
                                        return row.vehicletype;
                                    },
                                    editor:{
                                        type:'combobox'
                                    }">Type</th>
                                    
                                    <th data-options="field:'mechineno',width:70, sortable:true,
                                    formatter:function(value,row){
                                        return row.mechineno;
                                    },
                                    editor:{
                                        type:'combobox'
                                    }">No Mesin</th>
                                    
                                    <th data-options="field:'rangkano',width:70, sortable:true,
                                    formatter:function(value,row){
                                        return row.rangkano;
                                    },
                                    editor:{
                                        type:'combobox'
                                    }">Rangka No</th>
                                    
                                   <th data-options="field:'vehiclecolor',width:70, sortable:true,
                                    formatter:function(value,row){
                                        return row.vehiclecolor;
                                    },
                                    editor:{
                                        type:'combobox'
                                    }">Warna</th>
                                    
                                   <th data-options="field:'vehiclejenis',width:70, sortable:true,
                                    formatter:function(value,row){
                                        return row.vehiclejenis;
                                    },
                                    editor:{
                                        type:'combobox'
                                    }">Jenis</th>
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
            <a href="#" data-toggle="modal" data-easein="swoopIn" data-target=".MyModals" type="button" class="btn btn-primary"> <i class="fa fa-print"></i> Cetak</a>
            <button class="btn btn-warning" name="cancel"><i class="fa fa-save"></i> Batal</button>
            <button class="btn btn-danger" name="delete"><i class="fa fa-save"></i> Hapus</button>
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
var key = "<?php echo $key; ?>";

$(function(){
   showdetail();
});
</script>
<?php
	echo "<link rel='stylesheet' type='text/css' href='modules/".$modulename."/css/page.css' />";
	echo "<script type='text/javascript' src='modules/".$modulename."/js/page.js'></script>";
?>



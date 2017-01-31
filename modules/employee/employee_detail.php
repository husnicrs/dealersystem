<?php
	$key = $_GET['key'];

$db=new Database();
$employee = new Employee();
	if (isset($_GET['key'])) {
	    $key = $_GET['key'];
	    $data = $employee->showDetail($key);
	    extract($data);
	}
?>
<style>
input[type=text]:disabled {
    background: #FFF;
}
</style>
<section class="content-header" style="margin-top:-15px !important; margin-bottom:-20px !important">
<h5>Employee Detail</h5>
</section>
<!-- Main content -->
<section class="content">
<div class="easyui-tabs" >
    <div title="Employee" style="padding:10px;">
      <div class="box box-danger">
      <form class="form-horizontal" id="formData" name="formData"  method="post" action="" enctype="multipart/form-data">
         <div class="box-header with-border"  style="margin-bottom:-10px">
           <div class="box-body">
               <div class="row">
               <!-- Coloumn 1-->
               <div class="col-md-6">
                   <div class="form-group">
                        <label for="real_name" class="col-sm-3 control-label">Identity No</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="transno" name="transno"  disabled="disabled" value="<?php echo $identityno; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="real_name" class="col-sm-3 control-label">Employee Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="transno" name="transno"  disabled="disabled" value="<?php echo $employeename; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="real_name" class="col-sm-3 control-label">Nick Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="transno" name="transno"  disabled="disabled" value="<?php echo $nickname; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="real_name" class="col-sm-3 control-label">Place Birth</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="transno" name="transno"  disabled="disabled" value="<?php echo $placebirth; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="real_name" class="col-sm-3 control-label">Date Birth</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="transno" name="transno"  disabled="disabled" value="<?php echo $datebirth; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="real_name" class="col-sm-3 control-label">Address</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="transno" name="transno"  disabled="disabled" value="<?php echo $address; ?>">
                        </div>
                    </div>
                </div>
                
               <div class="col-md-6">
                    <div class="form-group">
                        <label for="real_name" class="col-sm-3 control-label">Education Level</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="transno" name="transno"  disabled="disabled" value="<?php echo $educationlevelname; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="real_name" class="col-sm-3 control-label">NIK</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="transno" name="transno"  disabled="disabled" value="<?php echo $nik; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="real_name" class="col-sm-3 control-label">Join Date</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="transno" name="transno"  disabled="disabled" value="<?php echo $joindate; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="real_name" class="col-sm-3 control-label">Term Date</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="transno" name="transno"  disabled="disabled" value="<?php echo $termdate; ?>">
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="real_name" class="col-sm-3 control-label">Position</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="transno" name="transno"  disabled="disabled" value="<?php echo $positionname; ?>">
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="real_name" class="col-sm-3 control-label">Department</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="transno" name="transno"  disabled="disabled" value="<?php echo $departmentname; ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.box-body -->
        </div>
    </form>
       </div><!-- /.col -->
    </div>
    <div title="Family"  style="padding:10px;">
      <div class="box box-danger">
          <div class="box-body">
             <table id="dgfamily" style="width:100%;height:300px"
                    toolbar="#toolbarfamily" pagination="true" idField="idemployeefamily"
                    rownumbers="true" fitColumns="true" singleSelect="true" showFooter="true" >
                <thead>
                    <tr>
                        <th field="familyname" width="150" editor="{type:'validatebox',options:{required:true}}" sortable="true">Family Name</th>
                        <th field="placebirth" width="75" editor="{type:'validatebox',options:{required:false}}" sortable="true">Place Birth</th>
                        <th field="contracttime" width="100" editor="{type:'datebox',options:{required:false, validType:'validDate[\'yyyy-MM-dd\']'}}">Date Birth</th>
                        <th field="lasteducation" width="75" editor="{type:'validatebox',options:{required:false}}" sortable="true">Last Education</th>
                        <th field="occupation" width="75" editor="{type:'validatebox',options:{required:false}}" sortable="true">Occupation</th>
                        <th field="medicalprotection" width="100" editor="{type:'validatebox',options:{required:false}}" sortable="true">Medical Protection</th>
                        <th field="medicalprotection" width="50" editor="{type:'validatebox',options:{required:false}}" sortable="true">Job</th>
                        <th data-options="field:'sex',width:120, sortable:true,
                            formatter:function(value,row){
                                return row.description;
                            },
                            editor:{
                                type:'combobox',
                                options:{
                                    valueField:'id',
                                    textField:'description',
                                    method:'get',
                                    url:'lib/lookup/sex.php'
                                }
                            }">Sex</th>      
                    </tr>
                </thead>
            </table>
            
            <div id="toolbarfamily">
             <table cellpadding="0" cellspacing="0" style="width:100%">
                <tr>
                     <td>
                <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="javascript:$('#dgfamily').edatagrid('addRow')">New</a>
                <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="javascript:$('#dgfamily').edatagrid('destroyRow')">Destroy</a>
                <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-save" plain="true" onclick="javascript:$('#dgfamily').edatagrid('saveRow')">Save</a>
                <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-undo" plain="true" onclick="javascript:$('#dgfamily').edatagrid('cancelRow')">Cancel</a>
                </td>
                    <td style="text-align:right">
                        <input type="text" id="msearchdetailfam" style="line-height:18px;border:1px solid #ccc" onkeydown="keyCode(event)">
                        <a href="#" class="easyui-linkbutton" iconCls="icon-search" plain="true" onclick="doSearch()"></a>
                    </td>
                 </tr>
            </table>
        </div>
    </div>
   </div><!-- /.col -->
    </div>
    <div title="Education "  style="padding:10px;">
      <div class="box box-danger">
            <div class="box-body">
                 <table id="dgeducation" style="width:100%;height:300px"
                        toolbar="#toolbareducation" pagination="true" idField="idemployeeeducation"
                        rownumbers="true" fitColumns="true" singleSelect="true" showFooter="true" >
                    <thead>
                        <tr>
                            <th data-options="field:'educationtypeid',width:120, sortable:true,
                                formatter:function(value,row){
                                    return row.educationtypename;
                                },
                                editor:{
                                    type:'combobox',
                                    options:{
                                        valueField:'ideducationtype',
                                        textField:'educationtypename',
                                        method:'get',
                                        url:'lib/lookup/educationtype.php'
                                    }
                                }">Education Type</th>   
                            <th data-options="field:'majorid',width:120, sortable:true,
                                formatter:function(value,row){
                                    return row.majorname;
                                },
                                editor:{
                                    type:'combobox',
                                    options:{
                                        valueField:'idmajor',
                                        textField:'majorname',
                                        method:'get',
                                        url:'lib/lookup/major.php'
                                    }
                                }">Major</th> 
                            <th field="address" width="150" editor="{type:'validatebox',options:{required:true}}" sortable="true">Address</th>
                            <th field="yearfrom" width="75" editor="{type:'validatebox',options:{required:false}}" sortable="true">Year From</th>
                            <th field="yearto" width="75" editor="{type:'validatebox',options:{required:false}}" sortable="true">Year To</th>
                            <th field="gpa" width="75" editor="{type:'validatebox',options:{required:false}}" sortable="true">GPA</th>
                            <th field="description" width="100" editor="{type:'validatebox',options:{required:false}}" sortable="true">description</th>
                        </tr>
                    </thead>
                </table>
                
                <div id="toolbareducation">
                 <table cellpadding="0" cellspacing="0" style="width:100%">
                    <tr>
                         <td>
                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="javascript:$('#dgeducation').edatagrid('addRow')">New</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="javascript:$('#dgeducation').edatagrid('destroyRow')">Destroy</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-save" plain="true" onclick="javascript:$('#dgeducation').edatagrid('saveRow')">Save</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-undo" plain="true" onclick="javascript:$('#dgeducation').edatagrid('cancelRow')">Cancel</a>
                    </td>
                        <td style="text-align:right">
                            <input type="text" id="msearchdetailedu" style="line-height:18px;border:1px solid #ccc" onkeydown="keyCode(event)">
                            <a href="#" class="easyui-linkbutton" iconCls="icon-search" plain="true" onclick="doSearch()"></a>
                        </td>
                     </tr>
                </table>
            </div>
        </div>
       </div><!-- /.col -->
    </div>
    <div title="Job Experience"  style="padding:10px;">
      <div class="box box-danger">
    	 <div class="box-body">
                 <table id="dgjob" style="width:100%;height:300px"
                        toolbar="#toolbarjob" pagination="true" idField="idemployeeeducation"
                        rownumbers="true" fitColumns="true" singleSelect="true" showFooter="true" >
                    <thead>
                        <tr>
                            <th data-options="field:'positionid',width:120, sortable:true,
                                formatter:function(value,row){
                                    return row.positionname;
                                },
                                editor:{
                                    type:'combobox',
                                    options:{
                                        valueField:'idposition',
                                        textField:'positionname',
                                        method:'get',
                                        url:'lib/lookup/position.php'
                                    }
                                }">Position</th>   
                            <th field="yearfrom" width="150" editor="{type:'validatebox',options:{required:true}}" sortable="true">Year From</th>
                            <th field="yearto" width="75" editor="{type:'validatebox',options:{required:false}}" sortable="true">Year To</th>
                            <th field="company" width="75" editor="{type:'validatebox',options:{required:false}}" sortable="true">Company</th>
                            <th field="usinesstype" width="75" editor="{type:'validatebox',options:{required:false}}" sortable="true">Busniness Type</th>
                            <th field="lastsalary" width="100" editor="{type:'validatebox',options:{required:false}}" sortable="true">Last Salary</th>
                            <th field="sparationtype" width="100" editor="{type:'validatebox',options:{required:false}}" sortable="true">Sparation Type</th>
                        </tr>
                    </thead>
                </table>
                
                <div id="toolbarjob">
                 <table cellpadding="0" cellspacing="0" style="width:100%">
                    <tr>
                         <td>
                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="javascript:$('#dgjob').edatagrid('addRow')">New</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="javascript:$('#dgjob').edatagrid('destroyRow')">Destroy</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-save" plain="true" onclick="javascript:$('#dgjob').edatagrid('saveRow')">Save</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-undo" plain="true" onclick="javascript:$('#dgjob').edatagrid('cancelRow')">Cancel</a>
                    </td>
                        <td style="text-align:right">
                            <input type="text" id="msearchdetailedu" style="line-height:18px;border:1px solid #ccc" onkeydown="keyCode(event)">
                            <a href="#" class="easyui-linkbutton" iconCls="icon-search" plain="true" onclick="doSearch()"></a>
                        </td>
                     </tr>
                </table>
            </div>
        </div>
       </div><!-- /.col -->
    </div>
</div>
</section><!-- /.content -->    
<script type="text/javascript">
	$(function(){
		$('#dgfamily').edatagrid({
			url: 'modules/employee/post/family/get.php?key=<?php echo $key ?>',
			saveUrl: 'modules/employee/post/family/save.php?key=<?php echo $key ?>',
			updateUrl: 'modules/employee/post/family/update.php',
			destroyUrl: 'modules/employee/post/family/destroy.php',
		onBeforeSave: function(index){
 				
				var sex = $(this).edatagrid('getEditor', {
					index: index,
					field: 'sex'
				});
				var row = $(this).edatagrid('getRows')[index];
				row.sex = $(sex.target).combobox('getText');
 			}
		});
	});
	
	$(function(){
		$('#dgeducation').edatagrid({
			url: 'modules/employee/post/education/get.php?key=<?php echo $key ?>',
			saveUrl: 'modules/employee/post/education/save.php?key=<?php echo $key ?>',
			updateUrl: 'modules/employee/post/education/update.php',
			destroyUrl: 'modules/employee/post/education/destroy.php',
			onBeforeSave: function(index){
 				
				var educationtypename = $(this).edatagrid('getEditor', {
					index: index,
					field: 'educationtypeid'
				});
				var row = $(this).edatagrid('getRows')[index];
				row.educationtypename = $(educationtypename.target).combobox('getText');
				
				var majorname = $(this).edatagrid('getEditor', {
					index: index,
					field: 'majorid'
				});
				var row = $(this).edatagrid('getRows')[index];
				row.majorname = $(majorname.target).combobox('getText');
 			}
		});
	});
	$(function(){
		$('#dgjob').edatagrid({
			url: 'modules/employee/post/job/get.php?key=<?php echo $key ?>',
			saveUrl: 'modules/employee/post/job/save.php?key=<?php echo $key ?>',
			updateUrl: 'modules/employee/post/job/update.php',
			destroyUrl: 'modules/employee/post/job/destroy.php',
			onBeforeSave: function(index){
 			
			var positionname = $(this).edatagrid('getEditor', {
				index: index,
				field: 'positionid'
			});
			var row = $(this).edatagrid('getRows')[index];
			row.positionname = $(positionname.target).combobox('getText');
	
				
 			}
		});
	});
	function doSearch(){
		$('#dg').datagrid('load',{
			msearchdetail: $('#msearchdetailfam').val(),
		});
	}
	
	$.extend($.fn.datebox.defaults.rules, { 
		validDate: {  
			validator: function(value){  
				var date = $.fn.datebox.defaults.parser(value);
				var s = $.fn.datebox.defaults.formatter(date);
				return s==value; 
			},  
			message: 'Please input the correct date format'  
		}
	});
	

</script>




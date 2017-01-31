<?php
$db=new Database();
$subnavmenu = new Subnavmenu();
$moddetail=$_GET['mod'];
$modulename=str_replace("_detail","", $moddetail);
$datasubnavmenu = $subnavmenu->showsubnavmenu($modulename);
extract($datasubnavmenu);

$username1=$_SESSION['uname'];

$data = $subnavmenu->showfilter();
extract($data);

${"$modulename"} = new Arreceive();
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
        ${"$modulename"}->saveclose($key, $subahm, $submd, $skm, $penagihan);
	}
	if(isset($_REQUEST['delete'])){
        extract($_REQUEST);
		$key = $_GET['key'];
        ${"$modulename"}->delete($key);
	}
?>
<style>
fieldset.scheduler-border {
    border: 1px groove #ddd !important;
    padding: 0 0.4em 0.4em 0.4em !important;
    margin: 0 0 0.5em 0 !important;
    -webkit-box-shadow:  0px 0px 0px 0px #000;
            box-shadow:  0px 0px 0px 0px #000;
}
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
<!-- Main content -->
<section class="content">
  <div class="row">
   
    <div class="col-xs-12">
        <div class="box box-danger">
        <form class="form-horizontal" id="formData" name="formData"  method="post" action="" enctype="multipart/form-data">
        <input type="hidden" class="form-control" id="idtrans" name="idtrans" value="<?php echo $key; ?>">
        <input type="hidden" class="form-control" id="type" name="type" value="generate">
        <input type="hidden" class="form-control" id="soid" name="soid" value="<?php echo $soid; ?>">
            <div class="box-header with-border">
               <div class="row">
                <!-- Coloumn 1-->
               <div class="col-md-4">
                    <div class="form-group">
                        <label for="real_name" class="col-sm-3 control-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="cusname" name="cusname" value="<?php echo $cusname; ?>" disabled="disabled" />
                        </div>
                    </div>
                     <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">Alamat</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="address" name="address" style="height:70px !important" disabled="disabled"><?php echo $address; ?></textarea>
                        </div>
                    </div>
                     <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">No Mesin</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="mechineno" name="mechineno"  value="<?php echo $mechineno; ?>" disabled="disabled">
                        </div>
                    </div>
                     <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">No Rangka</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="rangkano" name="rangkano"  value="<?php echo $rangkano; ?>" disabled="disabled">
                        </div>
                    </div>

                </div>
                                   
                <div class="col-md-4">
                     <div class="form-group">
                        <label for="real_name" class="col-sm-3 control-label">Leasing</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="leasing" name="leasing"  value="<?php echo $leasing; ?>" disabled="disabled">
                        </div>
                    </div>
                     <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">Program</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="program" name="program" disabled="disabled">
                        </div>
                    </div>
                     <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">OTR</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="otr" name="otr"  value="<?php echo $otr; ?>" disabled="disabled">
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">Gross DP</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="creditgrossdpsw" name="creditgrossdpsw"  value="<?php echo $creditgrossdpsw; ?>" disabled="disabled">
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">Sub Leasing</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="subleasingsw" name="subleasingsw"  value="<?php echo $subleasingsw; ?>" disabled="disabled">
                        </div>
                    </div>
                </div>
                
            	<div class="col-md-4">
                     <div class="form-group">
                        <label for="real_name" class="col-sm-3 control-label">Sub AHM</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="subahmsw" name="subahmsw"  value="<?php echo $subahmsw; ?>" oninput="calculate();">
                            <input type="hidden" id="subahm" name="subahm"  value="<?php echo $subahm; ?>">
                        </div>
                    </div>
                     <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">Sub MD</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="submdsw" name="submdsw"  value="<?php echo $submdsw; ?>" oninput="calculate();">
                            <input type="hidden" id="submd" name="submd" value="<?php echo $submd; ?>">
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">SKM</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="skmsw" name="skmsw"  value="<?php echo $skmsw; ?>" oninput="calculate();">
                            <input type="hidden" id="skm" name="skm"  value="<?php echo $skm; ?>">
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">Penagihan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="penagihansw" name="penagihansw"  value="<?php echo $penagihansw; ?>" oninput="calculate();">
                            <input type="hidden" id="penagihan" name="penagihan"  value="<?php echo $penagihan; ?>">
                        </div>
                    </div>
                    <div class="form-group pull-right">
                    <div class="col-sm-12">
                        </div>
                    </div>
                  
                </div>
            </div>
            
          </div><!-- /.box-header -->
         <div class="box-footer">
         <div class="pull-right">
            <button class="btn btn-primary" name="saveclose" id="saveclose"><i class="fa fa-save"></i> Simpan</button>
            <a  href="index.php?mod=<?php echo str_replace("_detail","", $modulename ); ?>" type="button" class="btn btn-default"> <i class="fa fa-close"></i> Tutup</a>
        </div>
     </div>
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

</form>

<script type="text/javascript">
function calculate() {
	var subahmsw = document.getElementById('subahmsw').value;
	var result = document.getElementById('subahm');
		var rssubahm = (subahmsw);
		result.value = rssubahm.replace(/,/g, "");
		
	var submdsw = document.getElementById('submdsw').value;
	var result1 = document.getElementById('submd');
		var rssubmd = (submdsw);
		result1.value = rssubmd.replace(/,/g, "");
		
		var skmsw = document.getElementById('skmsw').value;
	var result2 = document.getElementById('skm');
		var rsskm = (skmsw);
		result2.value = rsskm.replace(/,/g, "");
		
	var penagihansw = document.getElementById('penagihansw').value;
	var result3 = document.getElementById('penagihan');
		var rspenagihan = (penagihansw);
		result3.value = rspenagihan.replace(/,/g, "");

}

// insert commas as thousands separators 
function addCommas(n){
    var rx=  /(\d+)(\d{3})/;
    return String(n).replace(/^\d+/, function(w){
        while(rx.test(w)){
            w= w.replace(rx, '$1,$2');
        }
        return w;
    });
}
// return integers and decimal numbers from input
// optionally truncates decimals- does not 'round' input
function validDigits(n, dec){
    n= n.replace(/[^\d\.]+/g, '');
    var ax1= n.indexOf('.'), ax2= -1;
    if(ax1!= -1){
        ++ax1;
        ax2= n.indexOf('.', ax1);
        if(ax2> ax1) n= n.substring(0, ax2);
        if(typeof dec=== 'number') n= n.substring(0, ax1+dec);
    }
    return n;
}
window.onload= function(){
	//Calculate quantity
    n2= document.getElementById('subahmsw');

    n2.onkeyup=n2.onchange= function(e){
        e=e|| window.event; 
        var who=e.target || e.srcElement,temp;
        if(who.id==='subahm')  temp= validDigits(who.value,0); 
        else temp= validDigits(who.value);
        who.value= addCommas(temp);
    }   
   n2.onblur= function(){
        var 
        temp2=parseFloat(validDigits(n2.value));
        if(temp2)n2.value=addCommas(temp2.toFixed(0));
    }
	
	//Calculate 
    n3= document.getElementById('submdsw');

    n3.onkeyup=n3.onchange= function(e){
        e=e|| window.event; 
        var who=e.target || e.srcElement,temp;
        if(who.id==='submd')  temp= validDigits(who.value,0); 
        else temp= validDigits(who.value);
        who.value= addCommas(temp);
    }   
   n3.onblur= function(){
        var 
        temp3=parseFloat(validDigits(n3.value));
        if(temp3)n3.value=addCommas(temp3.toFixed(0));
    }
	
	//Calculate 
    n4= document.getElementById('skmsw');

    n4.onkeyup=n4.onchange= function(e){
        e=e|| window.event; 
        var who=e.target || e.srcElement,temp;
        if(who.id==='skm')  temp= validDigits(who.value,0); 
        else temp= validDigits(who.value);
        who.value= addCommas(temp);
    }   
   n4.onblur= function(){
        var 
        temp4=parseFloat(validDigits(n4.value));
        if(temp4)n4.value=addCommas(temp4.toFixed(0));
    }
	
	//Calculate 
    n5= document.getElementById('penagihansw');

    n5.onkeyup=n5.onchange= function(e){
        e=e|| window.event; 
        var who=e.target || e.srcElement,temp;
        if(who.id==='penagihan')  temp= validDigits(who.value,0); 
        else temp= validDigits(who.value);
        who.value= addCommas(temp);
    }   
   n5.onblur= function(){
        var 
        temp5=parseFloat(validDigits(n5.value));
        if(temp5)n5.value=addCommas(temp5.toFixed(0));
    }
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



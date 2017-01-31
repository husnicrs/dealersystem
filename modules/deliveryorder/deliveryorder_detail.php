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
$user=$_SESSION['uname'];

${"$modulename"} = new Deliveryorder();
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
        ${"$modulename"}->saveclose($key, $paytypeid, $tunaiscpmd, $tunaiscpdaeler, $tunaidscmarketing, 
		$tunaidsckonsumen, $tunainettbayar, $credittype, $leasing, $subleasing, $creditscmd, $creditscpdealer, $creditsubsidi, $creditgrossdp, 
		$creditdiscmarketing, $creditdisckonsumen, $creditnettdp, $credittenor, $creditcicilan, $creditcostadm, $channelid, $salesmanid, $username, $sjno, $driver);
	
		${"$modulename"}->updatespformat($key);
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
        <input type="hidden" class="form-control" id="typefilter" name="typefilter" value="generate">
            <div class="box-header with-border">
               <div class="row">
                <!-- Coloumn 1-->
               <div class="col-md-4">
               
               <fieldset class="scheduler-border">
                <legend class="scheduler-border">Customer</legend>
                    <div class="form-group">
                        <label for="real_name" class="col-sm-3 control-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="cusname" name="cusname"  value="<?php echo $cusname; ?>" onkeyup="getname();">
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">Nama BPKB</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="bpkbname" name="bpkbname"  value="<?php echo $bpkbname; ?>">
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">No KTP</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="noktp" name="noktp" value="<?php echo $noktp; ?>" />
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">No SIM</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nosim" name="nosim" value="<?php echo $nosim; ?>" />
                        </div>
                    </div>
                     <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">Alamat</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="address" name="address" style="height:190px !important"><?php echo $address; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">Desa</label>
                        <div class="col-sm-9">
                            <select class="form-control"  style="width: 100%;" name="villageid" id="villageid"  placeholder="Customer">
                               <option value=<?php echo $villageid; ?>><?php echo $villagename; ?></option>
                               <?php
                                    $rl = new Combobox();
                                    $datarl = $rl->showVillage();
                                    foreach ($datarl as $value) {
                                        extract($value);
                                        echo "<option value='".$idvillage."'>".$villagename."</option>";
                                    }
                                ?>
                              </select>
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">Kecamatan</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="districtsid" name="districtsid">
                            <option value="<?php echo $districtsid; ?>"><?php echo $districtsname; ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">Kab/Kota</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="cityid" name="cityid">
                            <option value="<?php echo $cityid; ?>"><?php echo $cityname; ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">Telp.</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="telp" name="telp" value="<?php echo $telp; ?>" />
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">Handphone</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="handphone" name="handphone" value="<?php echo $handphone; ?>" />
                        </div>
                    </div>
                     <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">Agama</label>
                        <div class="col-sm-9">
                            <select class="form-control"  style="width: 100%;" name="religion" id="religion"  placeholder="Customer">
                               <option value="<?php echo $religion; ?>"><?php echo $religion; ?></option>
                               <option value="Budha">Budha</option>
                               <option value="Hindu">Hindu</option>
                               <option value="Islam">Islam</option>
                               <option value="Katholik">Katholik</option>
                               <option value="Kristen">Kristen</option>
                               <option value="Lainnya">Lainnya</option>
                             </select>
                        </div>
                    </div>
                     <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">Jns Kelamin</label>
                        <div class="col-sm-9">
                            <select class="form-control"  style="width: 100%;" name="sex" id="sex"  placeholder="Jenis Kelamin">
                            	<option value="<?php echo $sex; ?>"><?php echo $sex; ?></option>
                               <option value="Pria">Pria</option>
                               <option value="Wanita">Wanita</option>
                               <option value="Lainnya">Lainnya</option>
                              </select>
                        </div>
                    </div>
                     <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">Tgl Lahir</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                               <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                              <input type="text" class="form-control pull-right" id="datebirth"  placeholder="Tanggal Lahir" value="<?php echo $datebirth; ?>"  name="datebirth" data-toggle="tooltip" data-placement="datebirth" title="Tanggal Lahir" data-date-format="dd/mm/yyyy">
                            </div><!-- /.input group -->
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">Pekerjaan</label>
                        <div class="col-sm-9">
                            <select class="form-control"  style="width: 100%;" name="job" id="job"  placeholder="Pekerjaan">
                               <option value="<?php echo $job; ?>"><?php echo $job; ?></option>
                               <?php
                                    $rl = new Combobox();
                                    $datarl = $rl->showProfession();
                                    foreach ($datarl as $value) {
                                        extract($value);
                                        echo "<option value='".$professionname."'>".$professionname."</option>";
                                    }
                                ?>
                              </select>
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">Status</label>
                        <div class="col-sm-9">
                            <select class="form-control"  style="width: 100%;" name="maritalstatus" id="maritalstatus"  placeholder="Status Pernikahan">
                               <option value="<?php echo $maritalstatus; ?>"><?php echo $maritalstatus; ?></option>
                               <option value="Menikah">Menikah</option>
                               <option value="Lajang">Lajang</option>
                              </select>
                        </div>
                    </div>
                   </fieldset> 
                   
                   <fieldset class="scheduler-border">
                	<legend class="scheduler-border">Transaksi</legend>
                    <div class="form-group">
                        <label for="real_name" class="col-sm-3 control-label">ID Customer</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="customerid" name="customerid"  value="<?php echo $customerid; ?>" disabled="disabled">
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">Tgl Trans</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                               <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                              <input type="text" class="form-control pull-right" id="datetrans"  placeholder="Tgl Transaksi" value="<?php echo $datetrans1; ?>"  name="datetrans" data-toggle="tooltip" data-placement="datetrans" title="Tgl Transaksi" data-date-format="dd/mm/yyyy">
                            </div><!-- /.input group -->
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">Tgl Kirim</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                               <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                              <input type="text" class="form-control pull-right" id="deliverydate"  placeholder="Tgl Kirim" value="<?php echo $deliverydate; ?>"  name="deliverydate" data-toggle="tooltip" data-placement="deliverydate" title="Tgl Kirim" data-date-format="dd/mm/yyyy">
                            </div><!-- /.input group -->
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">No SPK</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="spkno" name="spkno"  value="<?php echo $spkno; ?>">
                            <input type="hidden" id="sjno" name="sjno"  value="<?php echo $sjno; ?>">
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">No PO</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="pono" name="pono"  value="<?php echo $pono; ?>">
                        </div>
                    </div>
                   </fieldset> 
                 </div>
                 <!-- Coloumn 2-->               
                <div class="col-md-4" style="margin-bottom:-20px !important">
                    <fieldset class="scheduler-border" style="margin-bottom:30px !important">
                	<legend class="scheduler-border">
                    	Unit
                    </legend>
                    
                    <div class="form-group">
                        <label for="real_name" class="col-sm-3 control-label">No DO</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="dono" name="dono"  value="<?php echo $dono; ?>">
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">Model</label>
                        <div class="col-sm-9">
                            <select class="form-control"  style="width: 100%;" name="vehiclemodel" id="vehiclemodel">
                               <option value="<?php echo $vehiclemodelsw; ?>"><?php echo $vehiclemodelsw; ?></option>
                                   <?php
                                        $rl = new Combobox();
                                        $datarl = $rl->showVehiclemodel();
                                        foreach ($datarl as $value) {
                                            extract($value);
                                            echo "<option value='".$lookupvehiclemodel."'>".$lookupvehiclemodel."</option>";
                                        }
                                    ?>
                             </select>
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">Tipe</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="vehicletype" name="vehicletype">
                            <option value="<?php echo $vehicletypesw; ?>"><?php echo $vehicletypesw; ?></option>
                                  <?php
                                        $rl = new Combobox();
                                        $datarl = $rl->showVahicletype1();
                                        foreach ($datarl as $value) {
                                            extract($value);
                                            echo "<option value='".$lookupvehlicetype1."'>".$lookupvehlicetype1."</option>";
                                        }
                                    ?>
                            </select>
                        </div>
                    </div>
                     <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">Warna</label>
                        <div class="col-sm-9">
                             <select class="form-control"  style="width: 100%;" name="vehiclecolor" id="vehiclecolor">
                                <option value="<?php echo $vehiclecolor; ?>"><?php echo $vehiclecolorname; ?></option>
                               <?php
                                    $rl = new Combobox();
                                    $datarl = $rl->showVehiclecolor();
                                    foreach ($datarl as $value) {
                                        extract($value);
                                        echo "<option value='".$lookupvehiclecolor."'>".$lookupvehiclecolor."</option>";
                                    }
                                ?>
                              </select>
                        </div>
                    </div>
                     <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">No Mesin</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="mechineno" name="mechineno"  value="<?php echo $mechineno; ?>">
                        </div>
                    </div>
                     <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">No Rangka</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="rangkano" name="rangkano"  value="<?php echo $rangkano; ?>">
                        </div>
                    </div>
                     <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">Tahun</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="year" name="year"  value="<?php echo $year; ?>">
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">OTR</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="OTR" id="otrsw" name="otrsw" oninput="calculateotr();" value="<?php echo $otrsw; ?>">
                            <input type="hidden" class="form-control" id="otr" name="otr"  value="<?php echo $otr; ?>">
                        </div>
                    </div>
                    <div class="form-group pull-right">
                    <div class="col-sm-12">
                     <a href="#" data-toggle="modal" onclick="RefreshDataUnit()" data-easein="swoopIn" data-target=".MyModalsunit" type="button" class="btn btn-warning" id="chooseunit"><i class="fa fa-hand-pointer-o"></i> Pilih Unit</a>
                        </div>
                    </div>
                   </fieldset> 
                   
                    <fieldset class="scheduler-border" style="margin-bottom:30px !important">
                	<legend class="scheduler-border">BBN</legend>
                    <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">Samsat</label>
                        <div class="col-sm-9">
                            <select class="form-control"  style="width: 100%;" name="samsatid" id="samsatid"  placeholder="Samsat">
                               <option value=<?php echo $samsatid; ?>><?php echo $samsatname; ?></option>
                               <?php
                                    $rl = new Combobox();
                                    $datarl = $rl->showSamsat();
                                    foreach ($datarl as $value) {
                                        extract($value);
                                        echo "<option value='".$idsamsat."'>".$samsatname."</option>";
                                    }
                                ?>
                              </select>
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">Bea Notis</label>
                        <div class="col-sm-9">
                        	<input type="text" class="form-control" placeholder="Bea Notaris" id="beanoticesw" name="beanoticesw" oninput="calculateotr(); calculatetotalbbn();" value="<?php echo $beanoticesw; ?>">
                            <input type="hidden" class="form-control" id="beanotice" name="beanotice"  value="<?php echo $beanotice; ?>">
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">Bea ADM</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Bea ADM" id="beaadmsw" name="beaadmsw" oninput="calculateotr(); calculatetotalbbn();" value="<?php echo $beaadmsw; ?>">
                            <input type="hidden" class="form-control" id="beaadm" name="beaadm"  value="<?php echo $beaadm; ?>">
                        </div>
                    </div>
                     <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">BBN Total</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="BBN Total" id="bbntotalsw" name="bbntotalsw" oninput="calculateotr(); calculatetotalbbn();" value="<?php echo $bbntotalsw; ?>" style="background-color:#B0FDD1 !important">
                            <input type="hidden" class="form-control" id="bbntotal" name="bbntotal"  value="<?php echo $bbntotal; ?>">
                        </div>
                    </div>
                   </fieldset> 
                   
                    <fieldset class="scheduler-border">
                	<legend class="scheduler-border">Identitas Unit</legend>
                    <div class="form-group">
                        <label for="real_name" class="col-sm-3 control-label">No Polisi</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="policeno" name="policeno"  value="<?php echo $policeno; ?>">
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">No STNK</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="stnkno" name="stnkno"  value="<?php echo $stnkno; ?>">
                        </div>
                    </div>
                    <input type="hidden" id="finishdate" name="finishdate"  value="<?php echo $finishdate; ?>">
                    <input type="hidden" class="form-control" id="nostock" name="nostock"  value="<?php echo $nostock; ?>">
                    <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">Tgl STNK</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                               <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                              <input type="text" class="form-control pull-right" id="datestnk"  placeholder="Tgl STNK" value="<?php echo $datestnk; ?>"  name="datestnk" data-toggle="tooltip" data-placement="Tgl STNK" title="Tgl STNK" data-date-format="dd/mm/yyyy">
                            </div><!-- /.input group -->
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">Tgl BPKB</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                               <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                              <input type="text" class="form-control pull-right" id="datebpkb"  placeholder="Tgl BPKB" value="<?php echo $datebpkb; ?>"  name="datebpkb" data-toggle="tooltip" data-placement="Tgl BPKB" title="Tgl BPKB" data-date-format="dd/mm/yyyy">
                            </div><!-- /.input group -->
                        </div>
                    </div>
                     <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">Penerima</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="receiver" name="receiver"  value="<?php echo $receiver; ?>">
                        </div>
                    </div>
                     <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">Nama BPKB</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="bpkbname2" name="bpkbname2"  value="<?php echo $bpkbname2; ?>">
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">No BPKB</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="bpkbno" name="bpkbno"  value="<?php echo $bpkbno; ?>">
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">No BK Srv</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="bpkbbkservice" name="bpkbbkservice"  value="<?php echo $bpkbbkservice; ?>">
                        </div>
                    </div>
                   </fieldset> 
                </div>
    
                 <!-- Coloumn 3-->                                   
                <div class="col-md-4">
                    <fieldset class="scheduler-border">
                	<legend class="scheduler-border">Cara Pembayaran</legend>
                    <div class="form-group"  style="margin-bottom:-30px; margin-top:-10px !important">
                        <label for="real_name" class="col-sm-3 control-label">Jenis Bayar</label>
                        <div class="col-sm-9">
                            <select class="form-control"  style="width: 100%;" name="paytypeid" id="paytypeid" onchange="changepaymenttype();" placeholder="Jenis Bayar">
                              	<option value="<?php echo $paytypeid; ?>"><?php echo $paytypename; ?></option>
                               <option value="1">Tunai</option>
                               <option value="2">Kredit</option>
                              </select>
                        </div>
                    </div>
                    <fieldset class="scheduler-border">
                	<legend class="scheduler-border" style="font-size:15px !important">Tunai</legend>
                    <div class="form-group">
                        <label for="real_name" class="col-sm-3 control-label">SCP MD</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="tunaiscpmdsw" name="tunaiscpmdsw" oninput="calculateotr(); calculatetotalcash();" value="<?php echo $tunaiscpmdsw; ?>">
                            <input type="hidden" class="form-control" id="tunaiscpmd" name="tunaiscpmd"  value="<?php echo $tunaiscpmd; ?>">
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">SCP Dealer</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="tunaiscpdaelersw" name="tunaiscpdaelersw" oninput="calculateotr(); calculatetotalcash();" value="<?php echo $tunaiscpdaelersw; ?>">
                            <input type="hidden" class="form-control" id="tunaiscpdaeler" name="tunaiscpdaeler"  value="<?php echo $tunaiscpdaeler; ?>">
                        </div>
                    </div>
                     <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">Dsc Mrktg</label>
                        <div class="col-sm-9">
                        	<input type="text" class="form-control" id="tunaidscmarketingsw" name="tunaidscmarketingsw" oninput="calculateotr(); calculatetotalcash();" value="<?php echo $tunaidscmarketingsw; ?>">
                            <input type="hidden" class="form-control" id="tunaidscmarketing" name="tunaidscmarketing"  value="<?php echo $tunaidscmarketing; ?>">
                        </div>
                    </div>
                     <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">Dsc Kons</label>
                        <div class="col-sm-9">
                        	<input type="text" class="form-control" id="tunaidsckonsumensw" name="tunaidsckonsumensw" oninput="calculateotr(); calculatetotalcash();" value="<?php echo $tunaidsckonsumensw; ?>">
                            <input type="hidden" class="form-control" id="tunaidsckonsumen" name="tunaidsckonsumen"  value="<?php echo $tunaidsckonsumen; ?>">
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">Nett Bayar</label>
                        <div class="col-sm-9">
                        	<input type="text" class="form-control" id="tunainettbayarsw" name="tunainettbayarsw" oninput="calculateotr(); calculatetotalcash();" value="<?php echo $tunainettbayarsw; ?>" style="background-color:#B0FDD1 !important">
                            <input type="hidden" class="form-control" id="tunainettbayar" name="tunainettbayar"  value="<?php echo $tunainettbayar; ?>">
                        </div>
                    </div>
                    </fieldset> 
                    <fieldset class="scheduler-border">
                	<legend class="scheduler-border" style="font-size:15px !important">Kredit</legend>
                    <div class="form-group">
                        <label for="real_name" class="col-sm-3 control-label">Tipe Kredit</label>
                        <div class="col-sm-9">
                            <select class="form-control"  style="width: 100%;" name="credittype" id="credittype"  placeholder="Tipe Kredit">
                            	<option value="<?php echo $credittype; ?>"><?php echo $credittype; ?></option>
                               <option value="LEASE">LEASE</option>
                               <option value="NON LEASE">NON LEASE</option>
                              </select>
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">Leasing</label>
                        <div class="col-sm-9">
                            <select class="form-control"  style="width: 100%;" name="leasing" id="leasing"  placeholder="Leasing">
                               <option value="<?php echo $leasing; ?>"><?php echo $leasing; ?></option>
                               <?php
                                $rl = new Combobox();
                                $datarl = $rl->showLeasing();
                                foreach ($datarl as $value) {
                                    extract($value);
                                    echo "<option value='".$leasingname."'>".$leasingname."</option>";
                                }
                            	?>
                              </select>
                        </div>
                    </div>
                     <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">Sub Leasing</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="subleasingsw" name="subleasingsw" oninput="calculateotr(); calculatetotalsubsidi();" value="<?php echo $subleasingsw; ?>">
                            <input type="hidden" class="form-control" id="subleasing" name="subleasing"  value="<?php echo $subleasing; ?>">
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">SCP MD</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="creditscmdsw" name="creditscmdsw" oninput="calculateotr(); calculatetotalsubsidi();" value="<?php echo $creditscmdsw; ?>">
                            <input type="hidden" class="form-control" id="creditscmd" name="creditscmd"  value="<?php echo $creditscmd; ?>">
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">SCP Dealer</label>
                        <div class="col-sm-9">
                        	<input type="text" class="form-control" id="creditscpdealersw" name="creditscpdealersw" oninput="calculateotr(); calculatetotalsubsidi();" value="<?php echo $creditscpdealersw; ?>">
                            <input type="hidden" class="form-control" id="creditscpdealer" name="creditscpdealer"  value="<?php echo $creditscpdealer; ?>">
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">Subsidi Total</label>
                        <div class="col-sm-9">
                        	<input type="text" class="form-control" id="creditsubsidisw" name="creditsubsidisw" oninput="calculateotr(); calculatetotalsubsidi();" value="<?php echo $creditsubsidisw; ?>" style="background-color:#B0FDD1 !important">
                            <input type="hidden" class="form-control" id="creditsubsidi" name="creditsubsidi"  value="<?php echo $creditsubsidi; ?>">
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">Gross DP</label>
                        <div class="col-sm-9">
                        	<input type="text" class="form-control" id="creditgrossdpsw" name="creditgrossdpsw" oninput="calculateotr(); calculatetotaldp();" value="<?php echo $creditgrossdpsw; ?>">
                            <input type="hidden" class="form-control" id="creditgrossdp" name="creditgrossdp"  value="<?php echo $creditgrossdp; ?>">
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">Dsc Mrktg</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="creditdiscmarketingsw" name="creditdiscmarketingsw" oninput="calculateotr(); calculatetotaldp();" value="<?php echo $creditdiscmarketingsw; ?>">
                            <input type="hidden" class="form-control" id="creditdiscmarketing" name="creditdiscmarketing"  value="<?php echo $creditdiscmarketing; ?>">
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">Dsc Knsmn</label>
                        <div class="col-sm-9">
                        	<input type="text" class="form-control" id="creditdisckonsumensw" name="creditdisckonsumensw" oninput="calculateotr(); calculatetotaldp();" value="<?php echo $creditdisckonsumensw; ?>">
                            <input type="hidden" class="form-control" id="creditdisckonsumen" name="creditdisckonsumen"  value="<?php echo $creditdisckonsumen; ?>">
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">Nett DP</label>
                        <div class="col-sm-9">
                        	<input type="text" class="form-control" id="creditnettdpsw" name="creditnettdpsw" oninput="calculateotr(); calculatetotaldp();" value="<?php echo $creditnettdpsw; ?>" style="background-color:#B0FDD1 !important">
                            <input type="hidden" class="form-control" id="creditnettdp" name="creditnettdp"  value="<?php echo $creditnettdp; ?>">
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">Tenor</label>
                        <div class="col-sm-9">
                        	<input type="text" class="form-control" id="credittenorsw" name="credittenorsw" oninput="calculateotr(); calculatetotalcredit();" value="<?php echo $credittenorsw; ?>">
                            <input type="hidden" class="form-control" id="credittenor" name="credittenor"  value="<?php echo $credittenor; ?>">
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">Cicilan</label>
                        <div class="col-sm-9">
                        	<input type="text" class="form-control" id="creditcicilansw" name="creditcicilansw" oninput="calculateotr(); calculatetotalcredit();" value="<?php echo $creditcicilansw; ?>">
                            <input type="hidden" class="form-control" id="creditcicilan" name="creditcicilan"  value="<?php echo $creditcicilan; ?>">
                        </div>
                    </div>
                   </fieldset> 
                   
                </fieldset> 
                 <fieldset class="scheduler-border">
                	<legend class="scheduler-border" style="font-size:15px !important">Total</legend>
                    <div class="form-group">
                        <label for="real_name" class="col-sm-3 control-label">Biaya ADM</label>
                        <div class="col-sm-9">
                        	<input type="text" class="form-control" id="creditcostadmsw" name="creditcostadmsw" oninput="calculateotr();" value="<?php echo $creditcostadmsw; ?>">
                            <input type="hidden" class="form-control" id="creditcostadm" name="creditcostadm"  value="<?php echo $creditcostadm; ?>">
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">POS/Channel</label>
                        <div class="col-sm-9">
                            <select class="form-control"  style="width: 100%;" name="channelid" id="channelid"  placeholder="Customer">
                               <option value=<?php echo $channelid; ?>><?php echo $channelname; ?></option>
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
                    <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">Sales</label>
                        <div class="col-sm-9">
                            <select class="form-control"  style="width: 100%;" name="salesmanid" id="salesmanid"  placeholder="Salesman">
                               <option value=<?php echo $salesmanid; ?>><?php echo $salesmanname; ?></option>
                               <?php
                                    $rl = new Combobox();
                                    $datarl = $rl->showMarketing();
                                    foreach ($datarl as $value) {
                                        extract($value);
                                        echo "<option value='".$idemployee."'>".$employeename."</option>";
                                    }
                                ?>
                              </select>
                        </div>
                    </div>
                     <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">User</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="username" name="username"  value="<?php echo $username1; ?>">
                        </div>
                    </div>
                     <div class="form-group" style="margin-top:-12px !important">
                        <label for="real_name" class="col-sm-3 control-label">Supir</label>
                        <div class="col-sm-9">
                            <select class="form-control"  style="width: 100%;" name="driver" id="driver"  placeholder="Supir">
                               <option value=<?php echo $driver; ?>><?php echo $driver; ?></option>
                               <?php
                                    $rl = new Combobox();
                                    $datarl = $rl->showDriver();
                                    foreach ($datarl as $value) {
                                        extract($value);
                                        echo "<option value='".$employeename."'>".$employeename."</option>";
                                    }
                                ?>
                              </select>
                        </div>
                    </div>
                    </fieldset> 
                </div>
            </div>
            
          </div><!-- /.box-header -->
         <div class="box-footer">
         <div class="pull-right">
         	<a href="#" onclick="SavePrint();" data-toggle="modal" data-easein="swoopIn" data-target=".MyModals" type="button" class="btn btn-primary"> <i class="fa fa-print"></i> Simpan & Cetak</a>
            <button class="btn btn-primary" name="saveclose" id="saveclose"><i class="fa fa-save"></i> Simpan & Tutup</button>
            <button class="btn btn-warning" name="cancel" id="cancel"><i class="fa fa-save"></i> Batalkan</button>
            <button class="btn btn-danger" name="delete" id="delete"><i class="fa fa-save"></i> Hapus</button>
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

<div class="modal fade MyModalsunit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog" style="width:80%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Pilih Unit</h4>
            </div>
            <div class="box-header with-border" style="height:50px !important; margin-top:-2px !important">
              <div>
                <div class="form-group pull-left">
                    <div class="col-sm-12 pull-right">
                     <label for="real_name" class="col-sm-2 control-label">Model</label>
                        <div class="col-sm-10">
                            <select class="form-control"  style="width: 100%;" name="vehiclemodelfilter" id="vehiclemodelfilter" onchange="FilterUnit();">
                               
                               <option value="<?php echo $modelfilter; ?>"><?php echo $modelfilter; ?></option>
                               <option value="">*KOSONGKAN FILTER*</option>
                                   <?php
                                        $rl = new Combobox();
                                        $datarl = $rl->showVehiclemodel();
                                        foreach ($datarl as $value) {
                                            extract($value);
                                            echo "<option value='".$lookupvehiclemodel."'>".$lookupvehiclemodel."</option>";
                                        }
                                    ?>
                             </select>
                        </div>
                    </div>
                </div>
           </div>
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
					"lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "All"]],
					"sAjaxSource": "<?php echo $pagepost;?>showunit.php?user=<?php echo $user ?>",
					"sServerMethod": "POST",
					"columnDefs": [
					{ "orderable": false, "targets": 0, "searchable": false },
					{ "orderable": true, "targets": 1, "searchable": true },
					{ "orderable": true, "targets": 2, "searchable": true },
					{ "orderable": true, "targets": 3, "searchable": true },
					{ "orderable": true, "targets": 4, "searchable": true },
					{ "orderable": true, "targets": 5, "searchable": true },
					{ "orderable": true, "targets": 6, "searchable": true },
					{ "orderable": true, "targets": 7, "searchable": true },
					{ "orderable": true, "targets": 8, "searchable": true },
					{ "orderable": true, "targets": 9, "searchable": true },
					{ "orderable": true, "targets": 10, "searchable": true }
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
                	<th>No DO</th>
                    <th>Model</th>
                    <th>Tipe</th>
                    <th>Nomor Mesin</th>
                    <th>Nomor Rangka</th>
                    <th>Warna</th>
                    <th>Tahun</th>
                    <th>CC</th>
                    <th>OTR</th>
                    <th>Status</th>
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


<script>
$("#villageid").change(function(){
	var idshipto = $("#villageid").val();
	$.ajax({
	  url: "lib/autodistricts.php", 
	  data: $(this).serialize(),
	  success: function(data){    
		$("#districtsid").html(data);
	  }
	});
});
$("#villageid").change(function(){
	var idshipto = $("#villageid").val();
	$.ajax({
	  url: "lib/autocity.php", 
	  data: $(this).serialize(),
	  success: function(data){    
		$("#cityid").html(data);
	  }
	});
});
$("#vehiclemodel").change(function(){
	var idshipto = $("#vehiclemodel").val();
	$.ajax({
	  url: "lib/autovehicletypesrv.php", 
	  data: $(this).serialize(),
	  success: function(data){    
		$("#vahicletype").html(data);
	  }
	});
});
$('#MyModalsunit').on('show.bs.modal', function () {
  dTableunit.ajax.reload();
})
function getname() {
	var cusname = document.getElementById('cusname').value;
	var bpkbname = document.getElementById('bpkbname').value=cusname;
}



function getDataModals( idkey )
{
	clearUnit();
	if( idkey )
	{
		clearUnit();
		$.ajax({
			type: "POST",
			url: "<?php echo $pagepost;?>postunit.php",
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
	clearUnit();
	$("#idkey").val(data.idkey);
	$("#year").val(data.year);
	$("#otr").val(data.otr);
	$("#otrsw").val(data.otrsw);
	$("#rangkano").val(data.rangkano);
	$("#mechineno").val(data.mechineno);
	$("#dono").val(data.dono);
	
	var vehicletype = data.vehicletype;
	$('#vehicletype option[value="' + vehicletype +'"]').prop("selected", true);
	
	var vehiclecolor = data.vehiclecolor;
	$('#vehiclecolor option[value="' + vehiclecolor +'"]').prop("selected", true);
	
	var vehiclemodel = data.vehiclemodel;
	$('#vehiclemodel option[value="' + vehiclemodel +'"]').prop("selected", true);
	

}

function clearUnit()
{
	$("#idkey").val("").removeAttr( "disabled" );
	$("#year").val("").removeAttr( "disabled" );
}

var varcalculateotr = setInterval(function(){ autocalculateotr() }, 500);
function autocalculateotr() {
	var bbntotalsw = document.getElementById('bbntotalsw').value;
	var result3 = document.getElementById('bbntotal');
		var rsbbntotal = (bbntotalsw);
		result3.value = rsbbntotal.replace(/,/g, "");
		
	var tunainettbayarsw = document.getElementById('tunainettbayarsw').value;
	var result7 = document.getElementById('tunainettbayar');
		var rstunainettbayar = (tunainettbayarsw);
		result7.value = rstunainettbayar.replace(/,/g, "");
		
	var creditsubsidisw = document.getElementById('creditsubsidisw').value;
	var result7 = document.getElementById('creditsubsidi');
		var rscreditsubsidi = (creditsubsidisw);
		result7.value = rscreditsubsidi.replace(/,/g, "");
		
	var creditnettdpsw = document.getElementById('creditnettdpsw').value;
	var result7 = document.getElementById('creditnettdp');
		var rscreditnettdp = (creditnettdpsw);
		result7.value = rscreditnettdp.replace(/,/g, "");
}

function calculateotr() {
	var otrsw = document.getElementById('otrsw').value;
	var result = document.getElementById('otr');
		var rsort = (otrsw);
		result.value = rsort.replace(/,/g, "");
		
	var beanoticesw = document.getElementById('beanoticesw').value;
	var result1 = document.getElementById('beanotice');
		var rsbeanotice = (beanoticesw);
		result1.value = rsbeanotice.replace(/,/g, "");
		
	var beaadmsw = document.getElementById('beaadmsw').value;
	var result2 = document.getElementById('beaadm');
		var rsbeaadm = (beaadmsw);
		result2.value = rsbeaadm.replace(/,/g, "");
		
	var bbntotalsw = document.getElementById('bbntotalsw').value;
	var result3 = document.getElementById('bbntotal');
		var rsbbntotal = (bbntotalsw);
		result3.value = rsbbntotal.replace(/,/g, "");
		
	var tunaiscpmdsw = document.getElementById('tunaiscpmdsw').value;
	var result4 = document.getElementById('tunaiscpmd');
		var rstunaiscpmd = (tunaiscpmdsw);
		result4.value = rstunaiscpmd.replace(/,/g, "");
		
	var tunaiscpdaelersw = document.getElementById('tunaiscpdaelersw').value;
	var result5 = document.getElementById('tunaiscpdaeler');
		var rstunaiscpdaeler = (tunaiscpdaelersw);
		result5.value = rstunaiscpdaeler.replace(/,/g, "");
		
	var tunaidscmarketingsw = document.getElementById('tunaidscmarketingsw').value;
	var result6 = document.getElementById('tunaidscmarketing');
		var rstunaidscmarketing = (tunaidscmarketingsw);
		result6.value = rstunaidscmarketing.replace(/,/g, "");
		
	var tunaidsckonsumensw = document.getElementById('tunaidsckonsumensw').value;
	var result7 = document.getElementById('tunaidsckonsumen');
		var rstunaidsckonsumen = (tunaidsckonsumensw);
		result7.value = rstunaidsckonsumen.replace(/,/g, "");
		
	var subleasingsw = document.getElementById('subleasingsw').value;
	var result7 = document.getElementById('subleasing');
		var rssubleasing = (subleasingsw);
		result7.value = rssubleasing.replace(/,/g, "");
		
	var creditscmdsw = document.getElementById('creditscmdsw').value;
	var result7 = document.getElementById('creditscmd');
		var rscreditscmd = (creditscmdsw);
		result7.value = rscreditscmd.replace(/,/g, "");
		
	var creditscpdealersw = document.getElementById('creditscpdealersw').value;
	var result7 = document.getElementById('creditscpdealer');
		var rscreditscpdealer = (creditscpdealersw);
		result7.value = rscreditscpdealer.replace(/,/g, "");
		
	var creditsubsidisw = document.getElementById('creditsubsidisw').value;
	var result7 = document.getElementById('creditsubsidi');
		var rscreditsubsidi = (creditsubsidisw);
		result7.value = rscreditsubsidi.replace(/,/g, "");
		
	var creditgrossdpsw = document.getElementById('creditgrossdpsw').value;
	var result7 = document.getElementById('creditgrossdp');
		var rscreditgrossdp = (creditgrossdpsw);
		result7.value = rscreditgrossdp.replace(/,/g, "");
		
	var creditdiscmarketingsw = document.getElementById('creditdiscmarketingsw').value;
	var result7 = document.getElementById('creditdiscmarketing');
		var rscreditdiscmarketing = (creditdiscmarketingsw);
		result7.value = rscreditdiscmarketing.replace(/,/g, "");
		
	var creditdisckonsumensw = document.getElementById('creditdisckonsumensw').value;
	var result7 = document.getElementById('creditdisckonsumen');
		var rscreditdisckonsumen = (creditdisckonsumensw);
		result7.value = rscreditdisckonsumen.replace(/,/g, "");
		
	var creditnettdpsw = document.getElementById('creditnettdpsw').value;
	var result7 = document.getElementById('creditnettdp');
		var rscreditnettdp = (creditnettdpsw);
		result7.value = rscreditnettdp.replace(/,/g, "");
		
	var credittenorsw = document.getElementById('credittenorsw').value;
	var result7 = document.getElementById('credittenor');
		var rscredittenor = (credittenorsw);
		result7.value = rscredittenor.replace(/,/g, "");	
		
	var creditcicilansw = document.getElementById('creditcicilansw').value;
	var result7 = document.getElementById('creditcicilan');
		var rscreditcicilan = (creditcicilansw);
		result7.value = rscreditcicilan.replace(/,/g, "");
		
	var creditcostadmsw = document.getElementById('creditcostadmsw').value;
	var result7 = document.getElementById('creditcostadm');
		var rscreditcostadm = (creditcostadmsw);
		result7.value = rscreditcostadm.replace(/,/g, "");
		
	var tunainettbayarsw = document.getElementById('tunainettbayarsw').value;
	var result7 = document.getElementById('tunainettbayar');
		var rstunainettbayar = (tunainettbayarsw);
		result7.value = rstunainettbayar.replace(/,/g, "");
	
}

function FilterUnit()
{
	var formData = $("#formData").serialize();
	$.ajax({
		type: "POST",
		url: "<?php echo $pagepost; ?>postunitfilter.php",
		dataType: 'json',
		data: formData,
		success: function(data) {
			$("#type").val("generate");
		}
	});
	RefreshDataUnit();
}

// Change combobox option by payment type
function changepaymenttype()
{
	if ($("#paytypeid").val() == "1") {
            console.log(true);
			//Tunai
            $("#tunaiscpmdsw").removeAttr("disabled");
			$("#tunaiscpmd").removeAttr("disabled");
			$("#tunaiscpdaelersw").removeAttr("disabled");
			$("#tunaidscmarketingsw").removeAttr("disabled");
			$("#tunaidscmarketing").removeAttr("disabled");
			$("#tunaidsckonsumensw").removeAttr("disabled");
			$("#tunaidsckonsumen").removeAttr("disabled");
			$("#tunainettbayarsw").removeAttr("disabled");
			$("#tunainettbayar").removeAttr("disabled");
			
			//Kredit
			$("#credittype").attr("disabled", "disabled");
			$("#leasing").attr("disabled", "disabled");
			$("#subleasingsw").attr("disabled", "disabled");
			$("#subleasing").attr("disabled", "disabled");
			$("#creditscmdsw").attr("disabled", "disabled");
			$("#creditscmd").attr("disabled", "disabled");
			$("#creditscpdealersw").attr("disabled", "disabled");
			$("#creditscpdealer").attr("disabled", "disabled");
			$("#creditsubsidisw").attr("disabled", "disabled");
			$("#creditsubsidi").attr("disabled", "disabled");
			$("#creditgrossdpsw").attr("disabled", "disabled");
			$("#creditgrossdp").attr("disabled", "disabled");
			$("#creditdiscmarketingsw").attr("disabled", "disabled");
			$("#creditdiscmarketing").attr("disabled", "disabled");
			$("#creditdisckonsumensw").attr("disabled", "disabled");
			$("#creditdisckonsumen").attr("disabled", "disabled");
			$("#creditnettdpsw").attr("disabled", "disabled");
			$("#creditnettdp").attr("disabled", "disabled");
			$("#credittenorsw").attr("disabled", "disabled");
			$("#credittenor").attr("disabled", "disabled");
			$("#creditcicilansw").attr("disabled", "disabled");
			$("#creditcicilan").attr("disabled", "disabled");
			
			//Reset value
			document.getElementById("credittype").value = "";
			document.getElementById("leasing").value = "";
			document.getElementById("subleasingsw").value = "";
			document.getElementById("subleasing").value = "";
			document.getElementById("creditscmdsw").value = "";
			document.getElementById("creditscmd").value = "";
			document.getElementById("creditscpdealersw").value = "";
			document.getElementById("creditscpdealer").value = "";
			document.getElementById("creditsubsidisw").value = "";
			document.getElementById("creditsubsidi").value = "";
			document.getElementById("creditgrossdpsw").value = "";
			document.getElementById("creditgrossdp").value = "";
			document.getElementById("creditdiscmarketingsw").value = "";
			document.getElementById("creditdiscmarketing").value = "";
			document.getElementById("creditdisckonsumensw").value = "";
			document.getElementById("creditdisckonsumen").value = "";
			document.getElementById("creditnettdpsw").value = "";
			document.getElementById("creditnettdp").value = "";
			document.getElementById("credittenorsw").value = "";
			document.getElementById("credittenor").value = "";
			document.getElementById("creditcicilansw").value = "";
			document.getElementById("creditcicilan").value = "";
			
        }
        else {
			//Tunai
            console.log(false);
			$("#tunaiscpmdsw").attr("disabled", "disabled");
			$("#tunaiscpmd").attr("disabled", "disabled");
			$("#tunaiscpdaelersw").attr("disabled", "disabled");
			$("#tunaidscmarketingsw").attr("disabled", "disabled");
			$("#tunaidscmarketing").attr("disabled", "disabled");
			$("#tunaidsckonsumensw").attr("disabled", "disabled");
			$("#tunaidsckonsumen").attr("disabled", "disabled");
			$("#tunainettbayarsw").attr("disabled", "disabled");
			$("#tunainettbayar").attr("disabled", "disabled");
			
			//Kredit
			$("#credittype").removeAttr("disabled");
			$("#leasing").removeAttr("disabled");
			$("#subleasingsw").removeAttr("disabled");
			$("#subleasing").removeAttr("disabled");
			$("#creditscmdsw").removeAttr("disabled");
			$("#creditscmd").removeAttr("disabled");
			$("#creditscpdealersw").removeAttr("disabled");
			$("#creditscpdealer").removeAttr("disabled");
			$("#creditsubsidisw").removeAttr("disabled");
			$("#creditsubsidi").removeAttr("disabled");
			$("#creditgrossdpsw").removeAttr("disabled");
			$("#creditgrossdp").removeAttr("disabled");
			$("#creditdiscmarketingsw").removeAttr("disabled");
			$("#creditdiscmarketing").removeAttr("disabled");
			$("#creditdisckonsumensw").removeAttr("disabled");
			$("#creditdisckonsumen").removeAttr("disabled");
			$("#creditnettdpsw").removeAttr("disabled");
			$("#creditnettdp").removeAttr("disabled");
			$("#credittenorsw").removeAttr("disabled");
			$("#credittenor").removeAttr("disabled");
			$("#creditcicilansw").removeAttr("disabled");
			$("#creditcicilan").removeAttr("disabled");
			
			//Reset value
			document.getElementById("tunaiscpmdsw").value = "";
			document.getElementById("tunaiscpmd").value = "";
			document.getElementById("tunaiscpdaelersw").value = "";
			document.getElementById("tunaidscmarketingsw").value = "";
			document.getElementById("tunaidscmarketing").value = "";
			document.getElementById("tunaidsckonsumensw").value = "";
			document.getElementById("tunaidsckonsumen").value = "";
			document.getElementById("tunainettbayarsw").value = "";
			document.getElementById("tunainettbayar").value = "";
        }
		
		$("#cusname").attr("disabled", "disabled");
		$("#bpkbname").attr("disabled", "disabled");
		$("#noktp").attr("disabled", "disabled");
		$("#nosim").attr("disabled", "disabled");
		$("#address").attr("disabled", "disabled");
		$("#telp").attr("disabled", "disabled");
		$("#handphone").attr("disabled", "disabled");
		$("#religion").attr("disabled", "disabled");
		$("#sex").attr("disabled", "disabled");
		$("#datebirth").attr("disabled", "disabled");
		$("#datetrans").attr("disabled", "disabled");
		$("#job").attr("disabled", "disabled");
		$("#datetrans").attr("disabled", "disabled");
		$("#deliverydate").attr("disabled", "disabled");
		$("#spkno").attr("disabled", "disabled");
		$("#pono").attr("disabled", "disabled");
		$("#dono").attr("disabled", "disabled");
		$("#mechineno").attr("disabled", "disabled");
		$("#rangkano").attr("disabled", "disabled");
		$("#year").attr("disabled", "disabled");
		$("#otrsw").attr("disabled", "disabled");
		
		$("#beanoticesw").attr("disabled", "disabled");
		$("#beaadmsw").attr("disabled", "disabled");
		$("#bbntotalsw").attr("disabled", "disabled");
		
		$("#policeno").attr("disabled", "disabled");
		$("#stnkno").attr("disabled", "disabled");
		$("#datestnk").attr("disabled", "disabled");
		$("#datebpkb").attr("disabled", "disabled");
		$("#receiver").attr("disabled", "disabled");
		$("#bpkbname2").attr("disabled", "disabled");
		$("#bpkbno").attr("disabled", "disabled");
		$("#bpkbbkservice").attr("disabled", "disabled");
		
		$("#username").attr("disabled", "disabled");
		$("#datetrans").attr("disabled", "disabled");
		
		 //For combobox
		 document.getElementById("channelid").disabled = true;
		 document.getElementById("samsatid").disabled = true;
		 
		 document.getElementById("villageid").disabled = true;
		 document.getElementById("districtsid").disabled = true;
		 document.getElementById("cityid").disabled = true;
		 document.getElementById("maritalstatus").disabled = true;
		 document.getElementById("vehiclemodel").disabled = true;
		 document.getElementById("vehicletype").disabled = true;
		 document.getElementById("vehiclecolor").disabled = true;
		 
		 //For button
		 document.getElementById("cancel").disabled = true;
		 document.getElementById("delete").disabled = true;
		 document.getElementById("delete").disabled = true;
		 document.getElementById("chooseunit").disabled = true;
}

//Calculate BBN
function calculatetotalbbn() {
	var beanotice = document.getElementById('beanotice').value;	
	var beaadm = document.getElementById('beaadm').value;
	var result = document.getElementById('bbntotalsw');
		var gettotal = Number(beanotice) + Number(beaadm)
		if (!isNaN(beanotice) && !isNaN(beaadm)) {
		result.value = Math.ceil(gettotal/100)*100;
		}
}
//Calculate Subsidi
function calculatetotalsubsidi() {
	var subleasing = document.getElementById('subleasing').value;	
	var creditscmd = document.getElementById('creditscmd').value;
	var creditscpdealer = document.getElementById('creditscpdealer').value;
	var result = document.getElementById('creditsubsidisw');
		var gettotal = Number(subleasing) + Number(creditscmd) + Number(creditscpdealer)
		if (!isNaN(subleasing) && !isNaN(creditscmd) && !isNaN(creditscpdealer)) {
		result.value = Math.ceil(gettotal/100)*100;
		}
}

//Calculate DP
function calculatetotaldp() {
	var creditgrossdp = document.getElementById('creditgrossdp').value;	
	var creditdiscmarketing = document.getElementById('creditdiscmarketing').value;
	var creditdisckonsumen = document.getElementById('creditdisckonsumen').value;
	
	var creditscmd = document.getElementById('creditscmd').value;
	var creditscpdealer = document.getElementById('creditscpdealer').value;
	var result = document.getElementById('creditnettdpsw');
		var gettotal = Number(creditgrossdp) - Number(creditdiscmarketing) - Number(creditdisckonsumen)  - Number(creditscmd) - Number(creditscpdealer)
		if (!isNaN(creditgrossdp) && !isNaN(creditdiscmarketing) && !isNaN(creditdisckonsumen)) {
		result.value = Math.ceil(gettotal/100)*100;
		}
}

var varcalculateotr = setInterval(function(){ intervalcalculatetotalcash() }, 500);
function intervalcalculatetotalcash()
{
	if ($("#paytypeid").val() == "1") {
            console.log(true);
			//Tunai
			calculatetotalcash();
        }
        else {
			//Credit
			calculatetotalcredit();
            
        }
}

//Calculate Cash Payment
function calculatetotalcash() {
	var tunaiscpmd = document.getElementById('tunaiscpmd').value;	
	var tunaiscpdaeler = document.getElementById('tunaiscpdaeler').value;
	var tunaidscmarketing = document.getElementById('tunaidscmarketing').value;
	var tunaidsckonsumen = document.getElementById('tunaidsckonsumen').value;
	var otr = document.getElementById('otr').value;
	var bbntotal = document.getElementById('bbntotal').value;
	
	var result = document.getElementById('tunainettbayarsw');
		var gettotalcash = (Number(otr) + Number(bbntotal)) - (Number(tunaiscpmd) + Number(tunaiscpdaeler)+ Number(tunaidscmarketing)+ Number(tunaidsckonsumen))
		if (!isNaN(tunaiscpmd) && !isNaN(tunaiscpdaeler)) {
		result.value = Math.ceil(gettotalcash/100)*100;
	}
}


//Calculate Credit Payment
/*
function calculatetotalcredit() {
	var creditsubsidi = document.getElementById('creditsubsidi').value;	
	var creditnettdp = document.getElementById('creditnettdp').value;
	var credittenor = document.getElementById('credittenor').value;
	var otr = document.getElementById('otr').value;
	var bbntotal = document.getElementById('bbntotal').value;
	
	var result = document.getElementById('creditcicilansw');
		//var gettotalcredit = (Number(otr) + Number(bbntotal)) + (Number(creditsubsidi) + Number(creditnettdp) / Number(credittenor))
		var gettotalcredit = (Number(otr) + Number(bbntotal) + Number(creditsubsidi) + Number(creditnettdp)) / (Number(credittenor))
		if (!isNaN(creditsubsidi) && !isNaN(creditnettdp)) {
		result.value = Math.ceil(gettotalcredit/100)*100;
	}
}
*/



</script>


<script type="text/javascript">
var key = "<?php echo $key; ?>";

$(function(){
   showdetail();
   changepaymenttype();
});
</script>
<?php
	echo "<link rel='stylesheet' type='text/css' href='modules/".$modulename."/css/page.css' />";
	echo "<script type='text/javascript' src='modules/".$modulename."/js/page.js'></script>";
?>



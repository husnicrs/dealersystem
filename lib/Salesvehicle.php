<?php
include_once 'Database.php';
date_default_timezone_set("Asia/Bangkok");
class salesvehicle {
    private $db = '';
    private $data;
    public function __construct() {
        $this->db = new Database();
    }
    function insert($codetrans) {
        $sql = "INSERT INTO salesvehicle (codetrans, notrans, datetrans)
				SELECT :codetrans,
				IFNULL(CONCAT(:codetrans,'-',DATE_FORMAT(NOW(), '%d%m%y'),RIGHT((RIGHT(MAX(RIGHT(salesvehicle.notrans,3)),3))+1001,3)), CONCAT(:codetrans,'-',DATE_FORMAT(NOW(), '%d%m%y'),'001')), DATE(NOW())  
				FROM
				salesvehicle
				WHERE codetrans=:codetrans";
        $arrData = array(':codetrans' => $codetrans);
        $this->data = $this->db->insertData($sql, $arrData);
		if($this->data == true){
			$key = $this->db->lastID();
            header("location:index.php?mod=salesvehicle_detail&key=$key");
        }		
    }
	
    function saveclose($key, $cusname, $bpkbname, $noktp, $nosim, $address, $villageid, $districtsid, $cityid, $telp, $handphone, $religion, $sex, $datebirth, $job, $maritalstatus, $customerid, $datetrans, $deliverydate, $spkno, $pono, $dono, $vehiclemodel, $vehicletype, $vehiclecolor, $mechineno, $rangkano, $year, $otr, $samsatid, $beanotice, $beaadm, $bbntotal, $policeno, $stnkno, $nostock, $finishdate, $receiver, $bpkbname2, $bpkbno, $bpkbbkservice, $paytypeid, $tunaiscpmd, $tunaiscpdaeler, $tunaidscmarketing, $tunaidsckonsumen, $tunainettbayar, $credittype, $leasing, $subleasing, $creditscmd, $creditscpdealer, $creditsubsidi, $creditgrossdp, $creditdiscmarketing, $creditdisckonsumen, $creditnettdp, $credittenor, $creditcicilan, $creditcostadm, $channelid, $salesmanid, $datebpkb, $datestnk, $username) {
		
		//Date transaction
		$vardatetime = $_POST['datetrans']; 
		$date = str_replace('/', '-', $vardatetime);
		$datetrans = date('Y-m-d', strtotime($date));
		
		//Date birth
		$vardatebirth= $_POST['datebirth']; 
		$date = str_replace('/', '-', $vardatebirth);
		$datebirth = date('Y-m-d', strtotime($date));
		
		//Date delivery
		$vardeliverydate = $_POST['deliverydate']; 
		$date = str_replace('/', '-', $vardeliverydate);
		$deliverydate = date('Y-m-d', strtotime($date));
		
		//Date finish
		$varfinishdate = $_POST['finishdate']; 
		$date = str_replace('/', '-', $varfinishdate);
		$finishdate = date('Y-m-d', strtotime($date));
		
		//Date STBK
		$vardatestnk = $_POST['datestnk']; 
		$date = str_replace('/', '-', $vardatestnk);
		$datestnk = date('Y-m-d', strtotime($date));
		
		//Date BPKB
		$vardatebpkb = $_POST['datebpkb']; 
		$date = str_replace('/', '-', $vardatebpkb);
		$datebpkb = date('Y-m-d', strtotime($date));
				
        $sql = "UPDATE salesvehicle SET cusname=:cusname, bpkbname=:bpkbname, noktp=:noktp, nosim=:nosim, address=:address, villageid=:villageid, districtsid=:districtsid, cityid=:cityid, telp=:telp, handphone=:handphone, religion=:religion, sex=:sex, datebirth=:datebirth, job=:job, maritalstatus=:maritalstatus, customerid=:customerid, datetrans=:datetrans, deliverydate=:deliverydate, spkno=:spkno, pono=:pono, dono=:dono, vehiclemodel=:vehiclemodel, vehicletype=:vehicletype, vehiclecolor=:vehiclecolor, mechineno=:mechineno, rangkano=:rangkano, year=:year, otr=:otr, samsatid=:samsatid, beanotice=:beanotice, beaadm=:beaadm, bbntotal=:bbntotal, policeno=:policeno, stnkno=:stnkno, nostock=:nostock, finishdate=:finishdate, receiver=:receiver, bpkbname2=:bpkbname, bpkbno=:bpkbno, bpkbbkservice=:bpkbbkservice, paytypeid=:paytypeid, tunaiscpmd=:tunaiscpmd, tunaiscpdaeler=:tunaiscpdaeler, tunaidscmarketing=:tunaidscmarketing, tunaidsckonsumen=:tunaidsckonsumen, tunainettbayar=:tunainettbayar, credittype=:credittype, leasing=:leasing, subleasing=:subleasing, creditscmd=:creditscmd, creditscpdealer=:creditscpdealer, creditsubsidi=:creditsubsidi, creditgrossdp=:creditgrossdp, creditdiscmarketing=:creditdiscmarketing, creditdisckonsumen=:creditdisckonsumen, creditnettdp=:creditnettdp, credittenor=:credittenor, creditcicilan=:creditcicilan, creditcostadm=:creditcostadm, channelid=:channelid, salesmanid=:salesmanid, username=:username, datebpkb=:datebpkb, datestnk=:datestnk WHERE idtrans=:key";
        $arrData = array(':cusname' => $cusname, ':bpkbname' => $bpkbname, ':noktp' => $noktp, ':nosim' => $nosim, ':address' => $address, ':villageid' => $villageid, ':districtsid' => $districtsid, ':cityid' => $cityid, ':telp' => $telp, ':handphone' => $handphone, ':religion' => $religion, ':sex' => $sex, ':datebirth' => $datebirth, ':job' => $job, ':maritalstatus' => $maritalstatus, ':customerid' => $customerid, ':datetrans' => $datetrans, ':deliverydate' => $deliverydate, ':spkno' => $spkno, ':pono' => $pono, ':dono' => $dono, ':vehiclemodel' => $vehiclemodel, ':vehicletype' => $vehicletype, ':vehiclecolor' => $vehiclecolor, ':mechineno' => $mechineno, ':rangkano' => $rangkano, ':year' => $year, ':otr' => $otr, ':samsatid' => $samsatid, ':beanotice' => $beanotice, ':beaadm' => $beaadm, ':bbntotal' => $bbntotal, ':policeno' => $policeno, ':stnkno' => $stnkno, ':nostock' => $nostock, ':finishdate' => $finishdate, ':receiver' => $receiver, ':bpkbname2' => $bpkbname2, ':bpkbno' => $bpkbno, ':bpkbbkservice' => $bpkbbkservice, ':paytypeid' => $paytypeid, ':tunaiscpmd' => $tunaiscpmd, ':tunaiscpdaeler' => $tunaiscpdaeler, ':tunaidscmarketing' => $tunaidscmarketing, ':tunaidsckonsumen' => $tunaidsckonsumen, ':tunainettbayar' => $tunainettbayar, ':credittype' => $credittype, ':leasing' => $leasing, ':subleasing' => $subleasing, ':creditscmd' => $creditscmd, ':creditscpdealer' => $creditscpdealer, ':creditsubsidi' => $creditsubsidi, ':creditgrossdp' => $creditgrossdp, ':creditdiscmarketing' => $creditdiscmarketing, ':creditdisckonsumen' => $creditdisckonsumen, ':creditnettdp' => $creditnettdp, ':credittenor' => $credittenor, ':creditcicilan' => $creditcicilan, ':creditcostadm' => $creditcostadm, ':channelid' => $channelid, ':salesmanid' => $salesmanid, ':datebpkb' => $datebpkb, ':datestnk' => $datestnk, ':username' => $username, ':key' => $key);
        $this->data = $this->db->insertData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=salesvehicle");
        }
        return $this->data;
    }

    function cancel($key) {
        $sql = "UPDATE salesvehicle SET status=9 WHERE idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->insertData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=salesvehicle");
        }
        return $this->data;
    }

    function showDetail($key) {
        $sql = "SELECT
				salesvehicle.idtrans,
				salesvehicle.codetrans,
				salesvehicle.notrans,
				DATE_FORMAT(salesvehicle.datetrans,'%d/%m/%Y') AS datetrans,
				DATE_FORMAT(salesvehicle.datetrans,'%d/%m/%Y') AS datetrans1,
				paytype.paytypename,
				salesvehicle.cusname,
				salesvehicle.policeno,
				salesvehicle.vehiclemodel AS vehiclemodelsw,
				salesvehicle.remark,
				salesvehicle.`status`,
				salesvehicle.`status` AS statustrans,
				salesvehicle.bpkbname,
				salesvehicle.noktp,
				salesvehicle.address,
				salesvehicle.nosim,
				salesvehicle.villageid,
				village.villagename,
				salesvehicle.districtsid,
				districts.districtsname,
				salesvehicle.telp,
				salesvehicle.handphone,
				salesvehicle.religion,
				salesvehicle.sex,
				DATE_FORMAT(salesvehicle.datebirth,'%d/%m/%Y') AS datebirth,
				salesvehicle.job,
				salesvehicle.maritalstatus,
				DATE_FORMAT(salesvehicle.deliverydate,'%d/%m/%Y') AS deliverydate,
				salesvehicle.pono,
				CONCAT('DO-',RIGHT(salesvehicle.notrans,8)) AS dono,
				salesvehicle.paytypeid,
				CASE WHEN salesvehicle.paytypeid=1 THEN 'Tunai' ELSE CASE WHEN salesvehicle.paytypeid=2 THEN 'Kredit' END END AS paytypename,
				salesvehicle.vehicletype AS vehicletypesw,
				salesvehicle.vehiclecolor,
				salesvehicle.mechineno,
				salesvehicle.rangkano,
				salesvehicle.`year`,
				salesvehicle.otr,
				FORMAT(salesvehicle.otr,0) AS otrsw,
				salesvehicle.beanotice,
				FORMAT(salesvehicle.beanotice,0) AS beanoticesw,
				salesvehicle.beaadm,
				FORMAT(salesvehicle.beaadm,0) AS beaadmsw,
				salesvehicle.bbntotal,
				FORMAT(salesvehicle.bbntotal,0) AS bbntotalsw,
				salesvehicle.stnkno,
				salesvehicle.nostock,
				DATE_FORMAT(salesvehicle.finishdate,'%d/%m/%Y') AS finishdate,
				salesvehicle.receiver,
				salesvehicle.bpkbname2,
				salesvehicle.bpkbno,
				salesvehicle.bpkbbkservice,
				salesvehicle.cityid,
				city.cityname,
				RIGHT(salesvehicle.notrans,8) AS customerid,
				salesvehicle.samsatid,
				samsat.samsatname,
				salesvehicle.tunaiscpmd,
				FORMAT(salesvehicle.tunaiscpmd,0) AS tunaiscpmdsw,
				salesvehicle.tunaiscpdaeler,
				FORMAT(salesvehicle.tunaiscpdaeler,0) AS tunaiscpdaelersw,
				salesvehicle.tunaidscmarketing,
				FORMAT(salesvehicle.tunaidscmarketing,0) AS tunaidscmarketingsw,
				salesvehicle.tunaidsckonsumen,
				FORMAT(salesvehicle.tunaidsckonsumen,0) AS tunaidsckonsumensw,
				salesvehicle.tunainettbayar,
				FORMAT(salesvehicle.tunainettbayar,0) AS tunainettbayarsw,
				salesvehicle.credittype,
				salesvehicle.leasing,
				salesvehicle.subleasing,
				FORMAT(salesvehicle.subleasing,0) AS subleasingsw,
				salesvehicle.creditscmd,
				FORMAT(salesvehicle.creditscmd,0) AS creditscmdsw,
				salesvehicle.creditscpdealer,
				FORMAT(salesvehicle.creditscpdealer,0) AS creditscpdealersw,
				salesvehicle.creditsubsidi,
				FORMAT(salesvehicle.creditsubsidi,0) AS creditsubsidisw,
				salesvehicle.creditgrossdp,
				FORMAT(salesvehicle.creditgrossdp,0) AS creditgrossdpsw,
				salesvehicle.creditdiscmarketing,
				FORMAT(salesvehicle.creditdiscmarketing,0) AS creditdiscmarketingsw,
				salesvehicle.creditdisckonsumen,
				FORMAT(salesvehicle.creditdisckonsumen,0) AS creditdisckonsumensw,
				salesvehicle.creditnettdp,
				FORMAT(salesvehicle.creditnettdp,0) AS creditnettdpsw,
				salesvehicle.credittenor,
				FORMAT(salesvehicle.credittenor,0) AS credittenorsw,
				salesvehicle.creditcicilan,
				FORMAT(salesvehicle.creditcicilan,0) AS creditcicilansw,
				salesvehicle.creditcostadm,
				FORMAT(salesvehicle.creditcostadm,0) AS creditcostadmsw,
				salesvehicle.salesmanid,
				salesvehicle.salesmanid,
				employee.employeename AS salesmanname,
				salesvehicle.username, 
				CONCAT('SPK/',EXTRACT(YEAR FROM datetrans),'/',roman.romanname,'/', RIGHT(salesvehicle.notrans,3)) AS spkno,
				salesvehicle.channelid,
				channel.channelname,
				DATE_FORMAT(salesvehicle.datebpkb,'%d/%m/%Y') AS datebpkb,
				DATE_FORMAT(salesvehicle.datestnk,'%d/%m/%Y') AS datestnk,
				vehiclecolor.vehiclecolorname
				FROM
				salesvehicle
				LEFT JOIN paytype ON salesvehicle.paytypeid = paytype.idpaytype
				LEFT JOIN village ON salesvehicle.villageid = village.idvillage
				LEFT JOIN districts ON salesvehicle.districtsid = districts.iddistricts
				LEFT JOIN city ON salesvehicle.cityid = city.idcity
				LEFT JOIN samsat ON salesvehicle.samsatid = samsat.idsamsat
				LEFT JOIN employee ON salesvehicle.salesmanid = employee.idemployee
				LEFT JOIN roman ON EXTRACT(MONTH FROM datetrans) = roman.number
				LEFT JOIN channel ON salesvehicle.channelid = channel.idchannel
				LEFT JOIN vehiclecolor ON salesvehicle.vehiclecolor = vehiclecolor.vehiclecolorcode
				WHERE salesvehicle.idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->getById($sql, $arrData);
        return $this->data;
    }

	function delete($key) {
        $sql = "DELETE FROM salesvehicle WHERE idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->deleteData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=salesvehicle");
        }
    }
	function showslipdetail($key) {
        $sql = "SELECT
				salesvehicledet.idtransdet,
				salesvehicledet.transid,
				salesvehicledet.inventoryid,
				inventory.inventorycode,
				inventory.inventoryname,
				salesvehicledet.unit,
				salesvehicledet.unitprice,
				salesvehicledet.discount,
				salesvehicledet.amount,
				salesvehicledet.quantity
				FROM
				salesvehicledet
				INNER JOIN inventory ON salesvehicledet.inventoryid = inventory.idinventory
				WHERE  salesvehicledet.transid=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
   	function showsliptotal($key) {
        $sql = "SELECT
				SUM(salesvehicledet.amount) AS tamount,
				SUM(salesvehicledet.quantity) AS tquantity
				FROM
				salesvehicledet
				WHERE  salesvehicledet.transid=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }

}
?>

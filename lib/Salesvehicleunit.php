<?php
include_once 'Database.php';
date_default_timezone_set("Asia/Bangkok");
class salesvehicleunit {
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
	
    function saveclose($key,  $policeno, $stnkno, $nostock, $finishdate, $receiver, $bpkbname2, $bpkbno, $bpkbbkservice, $tglambil, $datestnk, $datebpkb) {
		
		//Date STBK
		$vardatestnk = $_POST['datestnk']; 
		$date = str_replace('/', '-', $vardatestnk);
		$datestnk = date('Y-m-d', strtotime($date));
		
		//Date BPKB
		$vardatebpkb = $_POST['datebpkb']; 
		$date = str_replace('/', '-', $vardatebpkb);
		$datebpkb = date('Y-m-d', strtotime($date));
		
		//Date Ambil
		$vardatebpkb = $_POST['tglambil']; 
		$date = str_replace('/', '-', $vardatebpkb);
		$tglambil = date('Y-m-d', strtotime($date));
		
		//Date finish
		$varfinishdate = $_POST['finishdate']; 
		$date = str_replace('/', '-', $varfinishdate);
		$finishdate = date('Y-m-d', strtotime($date));
		
        $sql = "UPDATE salesvehicle SET policeno=:policeno, stnkno=:stnkno, nostock=:nostock, finishdate=:finishdate, receiver=:receiver, bpkbname2=:bpkbname2, bpkbno=:bpkbno, bpkbbkservice=:bpkbbkservice, tglambil=:tglambil, datestnk=:datestnk, datebpkb=:datebpkb WHERE idtrans=:key";
        $arrData = array(':policeno' => $policeno, ':stnkno' => $stnkno, ':nostock' => $nostock, ':finishdate' => $finishdate, ':receiver' => $receiver, ':bpkbname2' => $bpkbname2, ':bpkbno' => $bpkbno, ':bpkbbkservice' => $bpkbbkservice, ':nostock' => $nostock, ':tglambil' => $tglambil, ':datestnk' => $datestnk, ':datebpkb' => $datebpkb, ':key' => $key);
        $this->data = $this->db->insertData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=salesvehicleunit");
        }
        return $this->data;
    }

    function cancel($key) {
        $sql = "UPDATE salesvehicle SET status=9 WHERE idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->insertData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=salesvehicleunit");
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
				DATE_FORMAT(salesvehicle.tglambil,'%d/%m/%Y') AS tglambil,
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
				DATE_FORMAT(salesvehicle.datestnk,'%d/%m/%Y') AS datestnk
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

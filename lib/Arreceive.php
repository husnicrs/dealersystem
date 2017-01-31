<?php
include_once 'Database.php';
date_default_timezone_set("Asia/Bangkok");
class arreceive {
    private $db = '';
    private $data;
    public function __construct() {
        $this->db = new Database();
    }
	
    function saveclose($key, $subahm, $submd, $skm, $penagihan) {
		$sql = "UPDATE salesvehicle SET subahm=:subahm, submd=:submd, skm=:skm, penagihan=:penagihan, clearstatus=1 WHERE idtrans=:key";
		$arrData = array(':subahm' => $subahm, ':submd' => $submd, ':skm' => $skm, ':penagihan' => $penagihan, ':key' => $key);
		$this->data = $this->db->insertData($sql, $arrData);
		if ($this->data == true) {
			header("location:index.php?mod=arreceive");
		}
		return $this->data;
	}
    function savecloselist($key,$penagihan, $pencairan, $dateclear, $cairschema, $datecairschema, $selisih, $nokontrak, $desccashreceive) {
		
		$vardateclear = $_POST['dateclear']; 
		$date = str_replace('/', '-', $vardateclear);
		$dateclear = date('Y-m-d', strtotime($date));
		
		$vardatecairschema = $_POST['datecairschema']; 
		$date2 = str_replace('/', '-', $vardatecairschema);
		$datecairschema = date('Y-m-d', strtotime($date2));
				
		$sql = "UPDATE salesvehicle SET penagihan=:penagihan, pencairan=:pencairan,
		dateclear=:dateclear, cairschema=:cairschema, datecairschema=:datecairschema, selisih=:selisih, nokontrak=:nokontrak, 
		desccashreceive=:desccashreceive WHERE idtrans=:key";
		$arrData = array(':penagihan' => $penagihan, ':pencairan' => $pencairan,
		':dateclear' => $dateclear, ':cairschema' => $cairschema, ':datecairschema' => $datecairschema, ':selisih' => $selisih, ':nokontrak' => $nokontrak, ':desccashreceive' => $desccashreceive, ':key' => $key);
		$this->data = $this->db->insertData($sql, $arrData);
		if ($this->data == true) {
			header("location:index.php?mod=arreceive");
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
				DATE_FORMAT(NOW(),'%d/%m/%Y') AS dateprint,
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
				CONCAT('SPK/',EXTRACT(YEAR FROM datetrans),'/',roman.romanname,'/', RIGHT(salesvehicle.notrans,7)) AS spkno,
				CONCAT('SRJ/',EXTRACT(YEAR FROM datetrans),'/',roman.romanname,'/', RIGHT(salesvehicle.notrans,7)) AS sjno,
				salesvehicle.channelid,
				channel.channelname,
				DATE_FORMAT(salesvehicle.datebpkb,'%d/%m/%Y') AS datebpkb,
				DATE_FORMAT(salesvehicle.datestnk,'%d/%m/%Y') AS datestnk,
				vehiclecolor.vehiclecolorname,
				salesvehicle.subahm,
				salesvehicle.submd,
				salesvehicle.skm,
				salesvehicle.penagihan,
				salesvehicle.pencairan,
				salesvehicle.cairschema,
				salesvehicle.selisih,
				salesvehicle.nokontrak,
				salesvehicle.desccashreceive, FORMAT(salesvehicle.dppoformat,0) AS dppoformat1,
				FORMAT(salesvehicle.subahm,0) AS subahmsw,
				FORMAT(salesvehicle.submd,0) AS submdsw,
				FORMAT(salesvehicle.skm,0) AS skmsw,
				FORMAT(salesvehicle.penagihan,0) AS penagihansw,
				FORMAT(salesvehicle.pencairan,0) AS pencairansw,
				FORMAT(salesvehicle.cairschema,0) AS cairschemasw,
				FORMAT(salesvehicle.selisih,0) AS selisihsw,
				DATE_FORMAT(salesvehicle.dateclear,'%d/%m/%Y') AS dateclear,
				DATE_FORMAT(salesvehicle.datecairschema,'%d/%m/%Y') AS datecairschema,
				FORMAT(IFNULL(salesvehicle.otr,0)-IFNULL(salesvehicle.creditnettdp,0),0) AS brutoamountsw,
				IFNULL(salesvehicle.brutoamount,0) AS brutoamount
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


}
?>

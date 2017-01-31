<?php
include_once 'Database.php';
date_default_timezone_set("Asia/Bangkok");
class fakturpajaksubsidi {
    private $db = '';
    private $data;
    public function __construct() {
        $this->db = new Database();
    }
    function insert($codetrans) {
        $sql = "INSERT INTO fakturpajaksubsidi (codetrans, notrans, datetrans)
				SELECT :codetrans,
				IFNULL(CONCAT(:codetrans,'-',DATE_FORMAT(NOW(), '%d%m%y'),RIGHT((RIGHT(MAX(RIGHT(fakturpajaksubsidi.notrans,3)),3))+1001,3)), CONCAT(:codetrans,'-',DATE_FORMAT(NOW(), '%d%m%y'),'001')), DATE(NOW())  
				FROM
				fakturpajaksubsidi
				WHERE codetrans=:codetrans";
        $arrData = array(':codetrans' => $codetrans);
        $this->data = $this->db->insertData($sql, $arrData);
		if($this->data == true){
			$key = $this->db->lastID();
            header("location:index.php?mod=fakturpajaksubsidi_detail&key=$key");
        }		
    }
	
    function saveclose($key, $datetrans, $nourut, $vehiclemodel, $vehicletype, $rangkano, $mechineno, $kuantum, $hargajual, $dpp, 
		$ppn, $jumlahdpp, $remark, $soid) {
		
		//Date transaction
		$vardatetime = $_POST['datetrans']; 
		$date = str_replace('/', '-', $vardatetime);
		$datetrans = date('Y-m-d', strtotime($date));
		
        $sql = "UPDATE fakturpajaksubsidi SET datetrans=:datetrans, nourut=:nourut, vehiclemodel=:vehiclemodel, vehicletype=:vehicletype, rangkano=:rangkano, mechineno=:mechineno, kuantum=:kuantum, hargajual=:hargajual, dpp=:dpp, ppn=:ppn, jumlahdpp=:jumlahdpp, remark=:remark, soid=:soid WHERE idtrans=:key";
        $arrData = array(':datetrans' => $datetrans, ':nourut' => $nourut, ':vehiclemodel' => $vehiclemodel, ':vehicletype' => $vehicletype, ':rangkano' => $rangkano, ':mechineno' => $mechineno, ':kuantum' => $kuantum, ':hargajual' => $hargajual, ':dpp' => $dpp, ':ppn' => $ppn, 
		':jumlahdpp' => $jumlahdpp, ':remark' => $remark, ':soid' => $soid,':key' => $key);
        $this->data = $this->db->insertData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=fakturpajaksubsidi");
        }
        return $this->data;
    }

    function showDetail($key) {
        $sql = "SELECT
					fakturpajaksubsidi.idtrans,
					fakturpajaksubsidi.codetrans,
					fakturpajaksubsidi.notrans,
					DATE_FORMAT(fakturpajaksubsidi.datetrans,'%d/%m/%Y') AS datetrans,
					DATE_FORMAT(fakturpajaksubsidi.datetrans,'%d-%m-%Y') AS datetransprint,
					fakturpajaksubsidi.remark,
					fakturpajaksubsidi.`status`,
					fakturpajaksubsidi.transcode,
					fakturpajaksubsidi.vehiclemodel,
					fakturpajaksubsidi.vehicletype,
					fakturpajaksubsidi.mechineno,
					fakturpajaksubsidi.rangkano,
					fakturpajaksubsidi.soid,
					fakturpajaksubsidi.nourut,
					fakturpajaksubsidi.kuantum,
					fakturpajaksubsidi.hargajual AS hargajual,
					fakturpajaksubsidi.dpp AS dpp,
					fakturpajaksubsidi.ppn AS ppn,
					fakturpajaksubsidi.jumlahdpp AS jumlahdpp,
					FORMAT(fakturpajaksubsidi.hargajual, 0) AS hargajualsw,
					FORMAT(fakturpajaksubsidi.dpp, 0) AS dppsw,
					FORMAT(fakturpajaksubsidi.ppn, 0) AS ppnsw,
					FORMAT(fakturpajaksubsidi.jumlahdpp, 0) AS jumlahdppsw
				FROM
					fakturpajaksubsidi
				WHERE fakturpajaksubsidi.idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->getById($sql, $arrData);
        return $this->data;
    }

	function delete($key) {
        $sql = "DELETE FROM fakturpajaksubsidi WHERE idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->deleteData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=fakturpajaksubsidi");
        }
    }
	function showslipdetail($key) {
        $sql = "SELECT
				fakturpajaksubsididet.idtransdet,
				fakturpajaksubsididet.transid,
				fakturpajaksubsididet.inventoryid,
				inventory.inventorycode,
				inventory.inventoryname,
				fakturpajaksubsididet.unit,
				fakturpajaksubsididet.unitprice,
				fakturpajaksubsididet.discount,
				fakturpajaksubsididet.amount,
				fakturpajaksubsididet.quantity
				FROM
				fakturpajaksubsididet
				INNER JOIN inventory ON fakturpajaksubsididet.inventoryid = inventory.idinventory
				WHERE  fakturpajaksubsididet.transid=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
   	function showsliptotal($key) {
        $sql = "SELECT
				SUM(fakturpajaksubsididet.amount) AS tamount,
				SUM(fakturpajaksubsididet.quantity) AS tquantity
				FROM
				fakturpajaksubsididet
				WHERE  fakturpajaksubsididet.transid=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }

}
?>

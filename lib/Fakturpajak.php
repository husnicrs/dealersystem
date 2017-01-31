<?php
include_once 'Database.php';
date_default_timezone_set("Asia/Bangkok");
class fakturpajak {
    private $db = '';
    private $data;
    public function __construct() {
        $this->db = new Database();
    }
    function insert($codetrans) {
        $sql = "INSERT INTO fakturpajak (codetrans, notrans, datetrans)
				SELECT :codetrans,
				IFNULL(CONCAT(:codetrans,'-',DATE_FORMAT(NOW(), '%d%m%y'),RIGHT((RIGHT(MAX(RIGHT(fakturpajak.notrans,3)),3))+1001,3)), CONCAT(:codetrans,'-',DATE_FORMAT(NOW(), '%d%m%y'),'001')), DATE(NOW())  
				FROM
				fakturpajak
				WHERE codetrans=:codetrans";
        $arrData = array(':codetrans' => $codetrans);
        $this->data = $this->db->insertData($sql, $arrData);
		if($this->data == true){
			$key = $this->db->lastID();
            header("location:index.php?mod=fakturpajak_detail&key=$key");
        }		
    }
	
    function saveclose($key, $datetrans, $nourut, $vehiclemodel, $vehicletype, $rangkano, $mechineno, $kuantum, $hargajual, $dpp, 
		$ppn, $jumlahdpp, $remark, $soid) {
		
		//Date transaction
		$vardatetime = $_POST['datetrans']; 
		$date = str_replace('/', '-', $vardatetime);
		$datetrans = date('Y-m-d', strtotime($date));
		
        $sql = "UPDATE fakturpajak SET datetrans=:datetrans, nourut=:nourut, vehiclemodel=:vehiclemodel, vehicletype=:vehicletype, rangkano=:rangkano, mechineno=:mechineno, kuantum=:kuantum, hargajual=:hargajual, dpp=:dpp, ppn=:ppn, jumlahdpp=:jumlahdpp, remark=:remark, soid=:soid WHERE idtrans=:key";
        $arrData = array(':datetrans' => $datetrans, ':nourut' => $nourut, ':vehiclemodel' => $vehiclemodel, ':vehicletype' => $vehicletype, ':rangkano' => $rangkano, ':mechineno' => $mechineno, ':kuantum' => $kuantum, ':hargajual' => $hargajual, ':dpp' => $dpp, ':ppn' => $ppn, 
		':jumlahdpp' => $jumlahdpp, ':remark' => $remark, ':soid' => $soid,':key' => $key);
        $this->data = $this->db->insertData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=fakturpajak");
        }
        return $this->data;
    }

    function showDetail($key) {
        $sql = "SELECT
					fakturpajak.idtrans,
					fakturpajak.codetrans,
					fakturpajak.notrans,
					DATE_FORMAT(fakturpajak.datetrans,'%d/%m/%Y') AS datetrans,
					DATE_FORMAT(fakturpajak.datetrans,'%d-%m-%Y') AS datetransprint,
					fakturpajak.remark,
					fakturpajak.`status`,
					fakturpajak.transcode,
					fakturpajak.vehiclemodel,
					fakturpajak.vehicletype,
					fakturpajak.mechineno,
					fakturpajak.rangkano,
					fakturpajak.soid,
					fakturpajak.nourut,
					fakturpajak.kuantum,
					fakturpajak.hargajual AS hargajual,
					fakturpajak.dpp AS dpp,
					fakturpajak.ppn AS ppn,
					fakturpajak.jumlahdpp AS jumlahdpp,
					FORMAT(fakturpajak.hargajual, 0) AS hargajualsw,
					FORMAT(fakturpajak.dpp, 0) AS dppsw,
					FORMAT(fakturpajak.ppn, 0) AS ppnsw,
					FORMAT(fakturpajak.jumlahdpp, 0) AS jumlahdppsw
				FROM
					fakturpajak
				WHERE fakturpajak.idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->getById($sql, $arrData);
        return $this->data;
    }

	function delete($key) {
        $sql = "DELETE FROM fakturpajak WHERE idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->deleteData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=fakturpajak");
        }
    }
	function showslipdetail($key) {
        $sql = "SELECT
				fakturpajakdet.idtransdet,
				fakturpajakdet.transid,
				fakturpajakdet.inventoryid,
				inventory.inventorycode,
				inventory.inventoryname,
				fakturpajakdet.unit,
				fakturpajakdet.unitprice,
				fakturpajakdet.discount,
				fakturpajakdet.amount,
				fakturpajakdet.quantity
				FROM
				fakturpajakdet
				INNER JOIN inventory ON fakturpajakdet.inventoryid = inventory.idinventory
				WHERE  fakturpajakdet.transid=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
   	function showsliptotal($key) {
        $sql = "SELECT
				SUM(fakturpajakdet.amount) AS tamount,
				SUM(fakturpajakdet.quantity) AS tquantity
				FROM
				fakturpajakdet
				WHERE  fakturpajakdet.transid=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }

}
?>

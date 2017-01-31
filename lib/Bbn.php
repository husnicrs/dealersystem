<?php
include_once 'Database.php';
date_default_timezone_set("Asia/Bangkok");
class bbn {
    private $db = '';
    private $data;
    public function __construct() {
        $this->db = new Database();
    }
    function insert($codetrans) {
        $sql = "INSERT INTO bbn (codetrans, notrans, datetrans)
				SELECT :codetrans,
				IFNULL(CONCAT(:codetrans,'-',DATE_FORMAT(NOW(), '%d%m%y'),RIGHT((RIGHT(MAX(RIGHT(bbn.notrans,3)),3))+1001,3)), CONCAT(:codetrans,'-',DATE_FORMAT(NOW(), '%d%m%y'),'001')), DATE(NOW())  
				FROM
				bbn
				WHERE codetrans=:codetrans";
        $arrData = array(':codetrans' => $codetrans);
        $this->data = $this->db->insertData($sql, $arrData);
		if($this->data == true){
			$key = $this->db->lastID();
            header("location:index.php?mod=bbn_detail&key=$key");
        }		
    }
	
    function saveclose($key, $datetrans, $cusname, $address, $vehiclemodel, $vehicletype, $mechineno, $rangkano, $nota, 
		$adm, $totalbbn, $samsatid, $soid) {
		
		//Date transaction
		$vardatetime = $_POST['datetrans']; 
		$date = str_replace('/', '-', $vardatetime);
		$datetrans = date('Y-m-d', strtotime($date));
		
        $sql = "UPDATE bbn SET cusname=:cusname, address=:address, vehiclemodel=:vehiclemodel, vehicletype=:vehicletype, mechineno=:mechineno, rangkano=:rangkano, nota=:nota, adm=:adm, totalbbn=:totalbbn, samsatid=:samsatid, datetrans=:datetrans, soid=:soid WHERE idtrans=:key";
        $arrData = array(':cusname' => $cusname, ':address' => $address, ':vehiclemodel' => $vehiclemodel, ':vehicletype' => $vehicletype, ':mechineno' => $mechineno, ':rangkano' => $rangkano, ':nota' => $nota, ':adm' => $adm, ':totalbbn' => $totalbbn, 
		':samsatid' => $samsatid, ':datetrans' => $datetrans, ':soid' => $soid,':key' => $key);
        $this->data = $this->db->insertData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=bbn");
        }
        return $this->data;
    }

	function updateso($nota, $adm, $totalbbn, $samsatid, $soid) {
		
        $sql = "UPDATE salesvehicle SET beanotice=:nota, beaadm=:adm, bbntotal=:totalbbn, samsatid=:samsatid  WHERE idtrans=:soid";
        $arrData = array(':nota' => $nota, ':adm' => $adm, ':totalbbn' => $totalbbn, ':soid' => $soid, ':samsatid' => $samsatid);
        $this->data = $this->db->insertData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=bbn");
        }
        return $this->data;
    }

    function showDetail($key) {
        $sql = "SELECT
				bbn.idtrans,
				bbn.codetrans,
				bbn.notrans,
				DATE_FORMAT(bbn.datetrans,'%d/%m/%Y') AS datetranssw,
				bbn.remark,
				bbn.`status`,
				bbn.transcode,
				bbn.cusname,
				bbn.address,
				bbn.vehiclemodel,
				bbn.vehicletype,
				bbn.vehiclemodel AS vehiclemodelsw,
				bbn.vehicletype AS vehicletypesw,
				bbn.mechineno,
				bbn.rangkano,
				bbn.nota,
				bbn.adm,
				bbn.soid,
				bbn.totalbbn,
				FORMAT(bbn.nota,0) AS notasw,
				FORMAT(bbn.adm,0) AS admsw,
				FORMAT(bbn.totalbbn,0) AS totalbbnsw,
				bbn.samsatid,
				samsat.samsatname
				FROM
				bbn
				LEFT JOIN samsat ON bbn.samsatid = samsat.idsamsat
				WHERE bbn.idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->getById($sql, $arrData);
        return $this->data;
    }

	function delete($key) {
        $sql = "DELETE FROM bbn WHERE idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->deleteData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=bbn");
        }
    }
	function showslipdetail($key) {
        $sql = "SELECT
				bbndet.idtransdet,
				bbndet.transid,
				bbndet.inventoryid,
				inventory.inventorycode,
				inventory.inventoryname,
				bbndet.unit,
				bbndet.unitprice,
				bbndet.discount,
				bbndet.amount,
				bbndet.quantity
				FROM
				bbndet
				INNER JOIN inventory ON bbndet.inventoryid = inventory.idinventory
				WHERE  bbndet.transid=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
   	function showsliptotal($key) {
        $sql = "SELECT
				SUM(bbndet.amount) AS tamount,
				SUM(bbndet.quantity) AS tquantity
				FROM
				bbndet
				WHERE  bbndet.transid=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }

}
?>

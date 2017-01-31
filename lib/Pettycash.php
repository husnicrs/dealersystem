<?php
include_once 'Database.php';
date_default_timezone_set("Asia/Bangkok");
class pettycash {
    private $db = '';
    private $data;
    public function __construct() {
        $this->db = new Database();
    }
    function insert($codetrans) {
        $sql = "INSERT INTO pettycash (codetrans, notrans, datetrans)
				SELECT :codetrans,
				IFNULL(CONCAT(:codetrans,'-',DATE_FORMAT(NOW(), '%d%m%y'),RIGHT((RIGHT(MAX(RIGHT(pettycash.notrans,3)),3))+1001,3)), CONCAT(:codetrans,'-',DATE_FORMAT(NOW(), '%d%m%y'),'001')), DATE(NOW())  
				FROM
				pettycash
				WHERE codetrans=:codetrans";
        $arrData = array(':codetrans' => $codetrans);
        $this->data = $this->db->insertData($sql, $arrData);
		if($this->data == true){
			$key = $this->db->lastID();
            header("location:index.php?mod=pettycash_detail&key=$key");
        }		
    }
	
    function saveclose($key, $datetrans, $remark) {
		$vardatetime = $_POST['datetrans']; 
		$date = str_replace('/', '-', $vardatetime);
		$datetrans = date('Y-m-d', strtotime($date));
        $sql = "UPDATE pettycash SET datetrans=:datetrans, remark=:remark WHERE idtrans=:key";
        $arrData = array(':datetrans' => $datetrans, ':remark' => $remark, ':key' => $key);
        $this->data = $this->db->insertData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=pettycash");
        }
        return $this->data;
    }

    function cancel($key) {
        $sql = "UPDATE pettycash SET status=9 WHERE idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->insertData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=pettycash");
        }
        return $this->data;
    }

    function showDetail($key) {
        $sql = "SELECT
				pettycash.idtrans,
				pettycash.codetrans,
				pettycash.notrans,
				DATE_FORMAT(pettycash.datetrans,'%d/%m/%Y') AS datetrans1,
				pettycash.remark AS remarkhead,
				pettycash.datetrans,
				pettycash.transcode
				FROM
				pettycash
				WHERE pettycash.idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->getById($sql, $arrData);
        return $this->data;
    }

	function delete($key) {
        $sql = "DELETE FROM pettycash WHERE idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->deleteData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=pettycash");
        }
    }
	function showslipdetail($key) {
        $sql = "SELECT
				pettycashdet.idtransdet,
				pettycashdet.transid,
				pettycashdet.inventoryid,
				inventory.inventorycode,
				inventory.inventoryname,
				pettycashdet.unit,
				pettycashdet.unitprice,
				pettycashdet.discount,
				pettycashdet.amount,
				pettycashdet.quantity
				FROM
				pettycashdet
				INNER JOIN inventory ON pettycashdet.inventoryid = inventory.idinventory
				WHERE  pettycashdet.transid=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
   	function showsliptotal($key) {
        $sql = "SELECT
				SUM(pettycashdet.amount) AS tamount,
				SUM(pettycashdet.quantity) AS tquantity
				FROM
				pettycashdet
				WHERE  pettycashdet.transid=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }

}
?>

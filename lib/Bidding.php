<?php
include_once 'Database.php';
date_default_timezone_set("Asia/Bangkok");
class bidding {
    private $db = '';
    private $data;
    public function __construct() {
        $this->db = new Database();
    }
	
    function saveclose($key, $datetrans, $remark) {
		$vardatetime = $_POST['datetrans']; 
		$date = str_replace('/', '-', $vardatetime);
		$datetrans = date('Y-m-d', strtotime($date));
        $sql = "UPDATE purchasereq SET datetrans=:datetrans, remark=:remark WHERE idtrans=:key";
        $arrData = array(':datetrans' => $datetrans, ':remark' => $remark, ':key' => $key);
        $this->data = $this->db->insertData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=bidding");
        }
        return $this->data;
    }

    function savevalidate($key, $datetrans, $remark) {
		$vardatetime = $_POST['datetrans']; 
		$date = str_replace('/', '-', $vardatetime);
		$datetrans = date('Y-m-d', strtotime($date));
        $sql = "UPDATE purchasereq SET datetrans=:datetrans, remark=:remark, status=2 WHERE idtrans=:key";
        $arrData = array(':datetrans' => $datetrans, ':remark' => $remark, ':key' => $key);
        $this->data = $this->db->insertData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=bidding");
        }
        return $this->data;
    }
    function saveselected($key) {
		$vardatetime = $_POST['datetrans']; 
        $sql = "UPDATE purchasereq SET status=3 WHERE idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->insertData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=vendorselection");
        }
        return $this->data;
    }

    function cancel($key) {
        $sql = "UPDATE purchasereq SET status=9 WHERE idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->insertData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=bidding");
        }
        return $this->data;
    }

    function showDetail($key) {
        $sql = "SELECT
				purchasereq.idtrans,
				purchasereq.codetrans,
				purchasereq.notrans,
				DATE_FORMAT(purchasereq.datetrans,'%d/%m/%Y') AS datetrans,
				purchasereq.remark AS remarkhead,
				purchasereq.datetrans,
				purchasereq.`status`,
				purchasereq.transcode,
				purchasereq.remark
				FROM
				purchasereq 
				WHERE purchasereq.idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->getById($sql, $arrData);
        return $this->data;
    }
    function showSubetail($key) {
        $sql = "SELECT
				purchasereqdet.inventoryid,
				inventory.inventoryname
				FROM
				purchasereqdet
				INNER JOIN inventory ON purchasereqdet.inventoryid = inventory.idinventory
				WHERE purchasereqdet.idtransdet=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->getById($sql, $arrData);
        return $this->data;
    }


	function showslipdetail($key) {
        $sql = "SELECT
				purchasereqdet.idtransdet,
				purchasereqdet.transid,
				purchasereqdet.inventoryid,
				inventory.inventorycode,
				inventory.inventoryname,
				purchasereqdet.unit,
				purchasereqdet.quantity
				FROM
				purchasereqdet
				INNER JOIN inventory ON purchasereqdet.inventoryid = inventory.idinventory
				WHERE  purchasereqdet.transid=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
   	function showsliptotal($key) {
        $sql = "SELECT
				SUM(purchasereqdet.quantity) AS tquantity
				FROM
				purchasereqdet
				WHERE  purchasereqdet.transid=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }

}
?>

<?php
include_once 'Database.php';
date_default_timezone_set("Asia/Bangkok");
class salesreturn {
    private $db = '';
    private $data;
    public function __construct() {
        $this->db = new Database();
    }
    function insert($codetrans) {
        $sql = "INSERT INTO salesreturn (codetrans, notrans, datetrans)
				SELECT :codetrans,
				IFNULL(CONCAT(:codetrans,'-',DATE_FORMAT(NOW(), '%d%m%y'),RIGHT((RIGHT(MAX(RIGHT(salesreturn.notrans,3)),3))+1001,3)), CONCAT(:codetrans,'-',DATE_FORMAT(NOW(), '%d%m%y'),'001')), DATE(NOW())  
				FROM
				salesreturn
				WHERE codetrans=:codetrans";
        $arrData = array(':codetrans' => $codetrans);
        $this->data = $this->db->insertData($sql, $arrData);
		if($this->data == true){
			$key = $this->db->lastID();
            header("location:index.php?mod=salesreturn_detail&key=$key");
        }		
    }
	
    function saveclose($key, $datetrans, $customerid, $paytypeid, $remark) {
		$vardatetime = $_POST['datetrans']; 
		$date = str_replace('/', '-', $vardatetime);
		$datetrans = date('Y-m-d', strtotime($date));
        $sql = "UPDATE salesreturn SET datetrans=:datetrans, customerid=:customerid, paytypeid=:paytypeid, remark=:remark WHERE idtrans=:key";
        $arrData = array(':datetrans' => $datetrans, ':customerid' => $customerid, ':paytypeid' => $paytypeid, ':remark' => $remark, ':key' => $key);
        $this->data = $this->db->insertData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=salesreturn");
        }
        return $this->data;
    }

    function cancel($key) {
        $sql = "UPDATE salesreturn SET status=9 WHERE idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->insertData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=salesreturn");
        }
        return $this->data;
    }

    function showDetail($key) {
        $sql = "SELECT
				salesreturn.idtrans,
				salesreturn.codetrans,
				salesreturn.notrans,
				DATE_FORMAT(salesreturn.datetrans,'%d/%m/%Y') AS datetrans1,
				salesreturn.remark AS remarkhead,
				salesreturn.datetrans,
				salesreturn.customerid,
				salesreturn.paytypeid,
				salesreturn.transcode,
				customer.customername,
				salesreturn.paytypeid,
				paytype.paytypename
				FROM
				salesreturn
				LEFT JOIN customer ON salesreturn.customerid = customer.idcustomer
				LEFT JOIN paytype ON salesreturn.paytypeid = paytype.idpaytype
				WHERE salesreturn.idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->getById($sql, $arrData);
        return $this->data;
    }

	function delete($key) {
        $sql = "DELETE FROM salesreturn WHERE idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->deleteData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=salesreturn");
        }
    }
	function showslipdetail($key) {
        $sql = "SELECT
				salesreturndet.idtransdet,
				salesreturndet.transid,
				salesreturndet.inventoryid,
				inventory.inventorycode,
				inventory.inventoryname,
				salesreturndet.unit,
				salesreturndet.unitprice,
				salesreturndet.discount,
				salesreturndet.amount,
				salesreturndet.quantity
				FROM
				salesreturndet
				INNER JOIN inventory ON salesreturndet.inventoryid = inventory.idinventory
				WHERE  salesreturndet.transid=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
   	function showsliptotal($key) {
        $sql = "SELECT
				SUM(salesreturndet.amount) AS tamount,
				SUM(salesreturndet.quantity) AS tquantity
				FROM
				salesreturndet
				WHERE  salesreturndet.transid=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }

}
?>

<?php
include_once 'Database.php';
date_default_timezone_set("Asia/Bangkok");
class purchasereturn {
    private $db = '';
    private $data;
    public function __construct() {
        $this->db = new Database();
    }
    function insert($codetrans) {
        $sql = "INSERT INTO purchasereturn (codetrans, notrans, datetrans)
				SELECT :codetrans,
				IFNULL(CONCAT(:codetrans,'-',DATE_FORMAT(NOW(), '%d%m%y'),RIGHT((RIGHT(MAX(RIGHT(purchasereturn.notrans,3)),3))+1001,3)), CONCAT(:codetrans,'-',DATE_FORMAT(NOW(), '%d%m%y'),'001')), DATE(NOW())  
				FROM
				purchasereturn
				WHERE codetrans=:codetrans";
        $arrData = array(':codetrans' => $codetrans);
        $this->data = $this->db->insertData($sql, $arrData);
		if($this->data == true){
			$key = $this->db->lastID();
            header("location:index.php?mod=purchasereturn_detail&key=$key");
        }		
    }
	
    function saveclose($key, $datetrans, $supplierid, $paytypeid, $remark) {
		$vardatetime = $_POST['datetrans']; 
		$date = str_replace('/', '-', $vardatetime);
		$datetrans = date('Y-m-d', strtotime($date));
        $sql = "UPDATE purchasereturn SET datetrans=:datetrans, supplierid=:supplierid, paytypeid=:paytypeid, remark=:remark WHERE idtrans=:key";
        $arrData = array(':datetrans' => $datetrans, ':supplierid' => $supplierid, ':paytypeid' => $paytypeid, ':remark' => $remark, ':key' => $key);
        $this->data = $this->db->insertData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=purchasereturn");
        }
        return $this->data;
    }

    function cancel($key) {
        $sql = "UPDATE purchasereturn SET status=9 WHERE idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->insertData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=purchasereturn");
        }
        return $this->data;
    }

    function showDetail($key) {
        $sql = "SELECT
				purchasereturn.idtrans,
				purchasereturn.codetrans,
				purchasereturn.notrans,
				DATE_FORMAT(purchasereturn.datetrans,'%d/%m/%Y') AS datetrans1,
				purchasereturn.remark AS remarkhead,
				purchasereturn.datetrans,
				purchasereturn.supplierid,
				purchasereturn.paytypeid,
				purchasereturn.transcode,
				supplier.suppliername,
				purchasereturn.paytypeid,
				paytype.paytypename
				FROM
				purchasereturn
				LEFT JOIN supplier ON purchasereturn.supplierid = supplier.idsupplier
				LEFT JOIN paytype ON purchasereturn.paytypeid = paytype.idpaytype
				WHERE purchasereturn.idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->getById($sql, $arrData);
        return $this->data;
    }

	function delete($key) {
        $sql = "DELETE FROM purchasereturn WHERE idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->deleteData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=purchasereturn");
        }
    }
	function showslipdetail($key) {
        $sql = "SELECT
				purchasereturndet.idtransdet,
				purchasereturndet.transid,
				purchasereturndet.inventoryid,
				inventory.inventorycode,
				inventory.inventoryname,
				purchasereturndet.unit,
				purchasereturndet.unitprice,
				purchasereturndet.discount,
				purchasereturndet.amount,
				purchasereturndet.quantity
				FROM
				purchasereturndet
				INNER JOIN inventory ON purchasereturndet.inventoryid = inventory.idinventory
				WHERE  purchasereturndet.transid=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
   	function showsliptotal($key) {
        $sql = "SELECT
				SUM(purchasereturndet.amount) AS tamount,
				SUM(purchasereturndet.quantity) AS tquantity
				FROM
				purchasereturndet
				WHERE  purchasereturndet.transid=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }

}
?>

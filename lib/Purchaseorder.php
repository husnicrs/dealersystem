<?php
include_once 'Database.php';
date_default_timezone_set("Asia/Bangkok");
class purchaseorder {
    private $db = '';
    private $data;
    public function __construct() {
        $this->db = new Database();
    }
    function insert($codetrans) {
        $sql = "INSERT INTO purchaseorder (codetrans, notrans, datetrans)
				SELECT :codetrans,
				IFNULL(CONCAT(:codetrans,'-',DATE_FORMAT(NOW(), '%d%m%y'),RIGHT((RIGHT(MAX(RIGHT(purchaseorder.notrans,3)),3))+1001,3)), CONCAT(:codetrans,'-',DATE_FORMAT(NOW(), '%d%m%y'),'001')), DATE(NOW())  
				FROM
				purchaseorder
				WHERE codetrans=:codetrans";
        $arrData = array(':codetrans' => $codetrans);
        $this->data = $this->db->insertData($sql, $arrData);
		if($this->data == true){
			$key = $this->db->lastID();
            header("location:index.php?mod=purchaseorder_detail&key=$key");
        }		
    }
	
    function saveclose($key, $datetrans, $orderref, $supplierid, $paytypeid, $top, $duedate, $brutoamount, $disc, $totalamount) {
		$vardatetime = $_POST['datetrans']; 
		$date = str_replace('/', '-', $vardatetime);
		$datetrans = date('Y-m-d', strtotime($date));
		
		$varduedate = $_POST['duedate']; 
		$date = str_replace('/', '-', $varduedate);
		$duedate = date('Y-m-d', strtotime($date));
		
        $sql = "UPDATE purchaseorder SET datetrans=:datetrans, orderref=:orderref, supplierid=:supplierid, paytypeid=:paytypeid, top=:top, duedate=:duedate, brutoamount=:brutoamount, disc=:disc , totalamount=:totalamount  WHERE idtrans=:key";
        $arrData = array(':datetrans' => $datetrans, ':orderref' => $orderref, ':supplierid' => $supplierid, ':paytypeid' => $paytypeid, ':top' => $top, ':duedate' => $duedate, ':brutoamount' => $brutoamount, ':disc' => $disc, ':totalamount' => $totalamount, ':key' => $key);
        $this->data = $this->db->insertData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=purchaseorder");
        }
        return $this->data;
    }

    function cancel($key) {
        $sql = "UPDATE purchaseorder SET status=9 WHERE idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->insertData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=purchaseorder");
        }
        return $this->data;
    }

    function showDetail($key) {
        $sql = "SELECT
				purchaseorder.idtrans,
				purchaseorder.codetrans,
				purchaseorder.notrans,
				DATE_FORMAT(purchaseorder.datetrans,'%d/%m/%Y') AS datetrans1,
				DATE_FORMAT(purchaseorder.duedate,'%d/%m/%Y') AS duedate,
				purchaseorder.remark AS remarkhead,
				purchaseorder.datetrans,
				purchaseorder.orderref,
				purchaseorder.supplierid,
				purchaseorder.paytypeid,
				purchaseorder.transcode,
				supplier.suppliername,
				purchaseorder.paytypeid,
				paytype.paytypename,
				purchaseorder.brutoamount,
				purchaseorder.disc,
				purchaseorder.totalamount,
				CASE WHEN purchaseorder.top=0 THEN 0 ELSE purchaseorder.top END AS top
				FROM
				purchaseorder
				LEFT JOIN supplier ON purchaseorder.supplierid = supplier.idsupplier
				LEFT JOIN paytype ON purchaseorder.paytypeid = paytype.idpaytype
				WHERE purchaseorder.idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->getById($sql, $arrData);
        return $this->data;
    }

	function delete($key) {
        $sql = "DELETE FROM purchaseorder WHERE idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->deleteData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=purchaseorder");
        }
    }
	function showslipdetail($key) {
        $sql = "SELECT
				purchaseorderdet.idtransdet,
				purchaseorderdet.transid,
				purchaseorderdet.inventoryid,
				inventory.inventorycode,
				inventory.inventoryname,
				purchaseorderdet.unit,
				purchaseorderdet.unitprice,
				purchaseorderdet.discount,
				purchaseorderdet.amount,
				purchaseorderdet.quantity
				FROM
				purchaseorderdet
				INNER JOIN inventory ON purchaseorderdet.inventoryid = inventory.idinventory
				WHERE  purchaseorderdet.transid=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
   	function showsliptotal($key) {
        $sql = "SELECT
				SUM(purchaseorderdet.amount) AS tamount,
				SUM(purchaseorderdet.quantity) AS tquantity
				FROM
				purchaseorderdet
				WHERE  purchaseorderdet.transid=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }

}
?>

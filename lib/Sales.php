<?php
include_once 'Database.php';
date_default_timezone_set("Asia/Bangkok");
class sales {
    private $db = '';
    private $data;
    public function __construct() {
        $this->db = new Database();
    }
    function insert($codetrans) {
        $sql = "INSERT INTO salesorder (codetrans, notrans, datetrans)
				SELECT :codetrans,
				IFNULL(CONCAT(:codetrans,'-',DATE_FORMAT(NOW(), '%d%m%y'),RIGHT((RIGHT(MAX(RIGHT(salesorder.notrans,3)),3))+1001,3)), CONCAT(:codetrans,'-',DATE_FORMAT(NOW(), '%d%m%y'),'001')), DATE(NOW())  
				FROM
				salesorder
				WHERE codetrans=:codetrans";
        $arrData = array(':codetrans' => $codetrans);
        $this->data = $this->db->insertData($sql, $arrData);
		if($this->data == true){
			$key = $this->db->lastID();
            header("location:index.php?mod=sales_detail&key=$key");
        }		
    }
	
    function saveclose($key, $datetrans, $customerid, $payamount, $changeamount, $totalamount, $paytypeid, $remark, $employeeid, $duedate, $disc, $discamt, $brutoamount) {
		$vardatetime = $_POST['datetrans']; 
		$date = str_replace('/', '-', $vardatetime);
		$datetrans = date('Y-m-d', strtotime($date));
		
		$varduedate = $_POST['duedate']; 
		$date = str_replace('/', '-', $varduedate);
		$duedate = date('Y-m-d', strtotime($date));
		
        $sql = "UPDATE salesorder SET datetrans=:datetrans, customerid=:customerid, payamount=:payamount, changeamount=:changeamount, totalamount=:totalamount, paytypeid=:paytypeid,  remark=:remark, employeeid=:employeeid, duedate=:duedate, disc=:disc, discamt=:discamt, brutoamount=:brutoamount WHERE idtrans=:key";
        $arrData = array(':datetrans' => $datetrans, ':customerid' => $customerid, ':payamount' => $payamount, ':changeamount' => $changeamount, ':totalamount' => $totalamount, ':paytypeid' => $paytypeid, ':remark' => $remark, ':employeeid' => $employeeid, ':duedate' => $duedate, ':disc' => $disc, ':discamt' => $discamt,':brutoamount' => $brutoamount,':key' => $key);
        $this->data = $this->db->insertData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=sales_finish&key=$key");
        }
        return $this->data;
    }

    function updateprice($key) {
		
        $sql = "UPDATE salesorderdet A INNER JOIN (SELECT
				inventory.idinventory,
				inventory.unitprice,
				salesorderdet.quantity*inventory.unitprice AS amount
				FROM
				inventory
				INNER JOIN salesorderdet ON inventory.idinventory = salesorderdet.inventoryid) AS U SET A.unitprice=U.unitprice, A.amount=U.amount WHERE A.inventoryid=U.idinventory AND A.transid=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->insertData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=sales_finish&key=$key");
        }
        return $this->data;
    }


    function cancel($key) {
        $sql = "UPDATE salesorder SET status=9 WHERE idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->insertData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=sales");
        }
        return $this->data;
    }

    function showDetail($key) {
        $sql = "SELECT
				salesorder.idtrans,
				salesorder.codetrans,
				salesorder.notrans,
				DATE_FORMAT(salesorder.datetrans,'%d/%m/%Y') AS datetrans1,
				salesorder.remark AS remarkhead,
				salesorder.datetrans,
				CASE WHEN salesorder.customerid=0 THEN 1 ELSE salesorder.customerid END AS customerid,
				CASE WHEN salesorder.paytypeid=0 THEN 1 ELSE salesorder.paytypeid END AS paytypeid,
				salesorder.transcode,
				CASE WHEN salesorder.customerid=0 THEN 'CUSTOMER CASH' ELSE customer.customername END AS customername,
				CASE WHEN salesorder.paytypeid=0 THEN 'Cash' ELSE paytype.paytypename END AS paytypename,
				salesorder.payamount,
				FORMAT(salesorder.payamount,0) AS payamountsw,
				salesorder.changeamount,
				DATE_FORMAT(salesorder.duedate,'%d/%m/%Y') AS duedate,
				salesorder.username,
				salesorder.totalamount,
				CASE WHEN salesorder.employeeid=0 THEN '' ELSE salesorder.employeeid END AS employeeid,
				employee.employeename,
				salesorder.brutoamount,
				FORMAT(salesorder.brutoamount,0) AS brutoamountsw,
				salesorder.discamt,
				FORMAT(salesorder.discamt,0) AS discamtsw,
				salesorder.disc
				FROM
				salesorder
				LEFT JOIN customer ON salesorder.customerid = customer.idcustomer
				LEFT JOIN paytype ON salesorder.paytypeid = paytype.idpaytype
				LEFT JOIN employee ON salesorder.employeeid = employee.idemployee
				WHERE salesorder.idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->getById($sql, $arrData);
        return $this->data;
    }

	function delete($key) {
        $sql = "DELETE FROM salesorder WHERE idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->deleteData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=salesorderupload_detail&key=$key");
        }
    }
	function showslipdetail($key) {
        $sql = "SELECT
				salesorderdet.idtransdet,
				salesorderdet.transid,
				salesorderdet.inventoryid,
				inventory.inventorycode,
				inventory.inventoryname,
				salesorderdet.unit,
				salesorderdet.unitprice,
				salesorderdet.discountamt AS discountamtdet,
				salesorderdet.discount,
				salesorderdet.amount,
				salesorderdet.quantity
				FROM
				salesorderdet
				INNER JOIN inventory ON salesorderdet.inventoryid = inventory.idinventory
				WHERE  salesorderdet.transid=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
   	function showsliptotal($key) {
        $sql = "SELECT
				SUM(salesorderdet.amount) AS tamount,
				SUM(salesorderdet.quantity) AS tquantity
				FROM
				salesorderdet
				WHERE  salesorderdet.transid=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }

}
?>

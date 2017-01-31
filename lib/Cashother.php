<?php
include_once 'Database.php';
date_default_timezone_set("Asia/Bangkok");
class cashother {
    private $db = '';
    private $data;
    public function __construct() {
        $this->db = new Database();
    }
    function insert($codetrans) {
        $sql = "INSERT INTO cashother (codetrans, notrans, datetrans)
				SELECT :codetrans,
				IFNULL(CONCAT(:codetrans,'-',DATE_FORMAT(NOW(), '%d%m%y'),RIGHT((RIGHT(MAX(RIGHT(cashother.notrans,3)),3))+1001,3)), CONCAT(:codetrans,'-',DATE_FORMAT(NOW(), '%d%m%y'),'001')), DATE(NOW())  
				FROM
				cashother
				WHERE codetrans=:codetrans";
        $arrData = array(':codetrans' => $codetrans);
        $this->data = $this->db->insertData($sql, $arrData);
		if($this->data == true){
			$key = $this->db->lastID();
            header("location:index.php?mod=cashother_detail&key=$key");
        }		
    }
	
    function saveclose($key, $datetrans, $cashothertype, $amount, $taxamount, $total, $remark) {
		
		//Date transaction
		$vardatetime = $_POST['datetrans']; 
		$date = str_replace('/', '-', $vardatetime);
		$datetrans = date('Y-m-d', strtotime($date));
		
        $sql = "UPDATE cashother SET datetrans=:datetrans, cashothertype=:cashothertype, amount=:amount, taxamount=:taxamount, total=:total, remark=:remark WHERE idtrans=:key";
        $arrData = array(':datetrans' => $datetrans, ':cashothertype' => $cashothertype, ':amount' => $amount, ':taxamount' => $taxamount, ':total' => $total, ':remark' => $remark,':key' => $key);
        $this->data = $this->db->insertData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=cashother");
        }
        return $this->data;
    }


    function showDetail($key) {
        $sql = "SELECT
					cashother.idtrans,
					cashother.codetrans,
					DATE_FORMAT(
						cashother.datetrans,
						'%d/%m/%Y'
					) AS datetrans,
					cashother.notrans,
					cashother.amount,
					cashother.taxamount,
					cashother.total,
					FORMAT(cashother.amount, 0) AS amountsw,
					FORMAT(cashother.taxamount, 0) AS taxamountsw,
					FORMAT(cashother.total, 0) AS totalsw,
					cashother.`status`,
					cashother.cashothertype,
					cashother.remark
				FROM
					cashother
				WHERE cashother.idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->getById($sql, $arrData);
        return $this->data;
    }

	function delete($key) {
        $sql = "DELETE FROM cashother WHERE idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->deleteData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=cashother");
        }
    }
	function showslipdetail($key) {
        $sql = "SELECT
				cashotherdet.idtransdet,
				cashotherdet.transid,
				cashotherdet.inventoryid,
				inventory.inventorycode,
				inventory.inventoryname,
				cashotherdet.unit,
				cashotherdet.unitprice,
				cashotherdet.discount,
				cashotherdet.amount,
				cashotherdet.quantity
				FROM
				cashotherdet
				INNER JOIN inventory ON cashotherdet.inventoryid = inventory.idinventory
				WHERE  cashotherdet.transid=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
   	function showsliptotal($key) {
        $sql = "SELECT
				SUM(cashotherdet.amount) AS tamount,
				SUM(cashotherdet.quantity) AS tquantity
				FROM
				cashotherdet
				WHERE  cashotherdet.transid=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }

}
?>

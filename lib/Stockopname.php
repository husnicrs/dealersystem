<?php
include_once 'Database.php';
date_default_timezone_set("Asia/Bangkok");
class stockopname {
    private $db = '';
    private $data;
    public function __construct() {
        $this->db = new Database();
    }
    function insert($codetrans) {
        $sql = "INSERT INTO stockopname (codetrans, notrans, datetrans)
				SELECT :codetrans,
				IFNULL(CONCAT(:codetrans,'-',DATE_FORMAT(NOW(), '%d%m%y'),RIGHT((RIGHT(MAX(RIGHT(stockopname.notrans,3)),3))+1001,3)), CONCAT(:codetrans,'-',DATE_FORMAT(NOW(), '%d%m%y'),'001')), DATE(NOW())  
				FROM
				stockopname
				WHERE codetrans=:codetrans";
        $arrData = array(':codetrans' => $codetrans);
        $this->data = $this->db->insertData($sql, $arrData);
		if($this->data == true){
			$key = $this->db->lastID();
            header("location:index.php?mod=stockopname_detail&key=$key");
        }		
    }
	
    function saveclose($key, $datetrans, $matusedtypeid, $remark) {
		$vardatetime = $_POST['datetrans']; 
		$date = str_replace('/', '-', $vardatetime);
		$datetrans = date('Y-m-d', strtotime($date));
        $sql = "UPDATE stockopname SET datetrans=:datetrans, matusedtypeid=:matusedtypeid, remark=:remark WHERE idtrans=:key";
        $arrData = array(':datetrans' => $datetrans, ':matusedtypeid' => $matusedtypeid, ':remark' => $remark, ':key' => $key);
        $this->data = $this->db->insertData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=stockopname");
        }
        return $this->data;
    }

    function cancel($key) {
        $sql = "UPDATE stockopname SET status=9 WHERE idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->insertData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=stockopname");
        }
        return $this->data;
    }

    function showDetail($key) {
        $sql = "SELECT
				stockopname.idtrans,
				stockopname.codetrans,
				stockopname.notrans,
				DATE_FORMAT(stockopname.datetrans,'%d/%m/%Y') AS datetrans1,
				stockopname.remark AS remarkhead,
				stockopname.datetrans,
				stockopname.matusedtypeid,
				stockopname.transcode,
				stockopname.matusedtypeid,
				matusedtype.matusedtypename
				FROM
				stockopname
				LEFT JOIN matusedtype ON stockopname.matusedtypeid = matusedtype.idmatusedtype
				WHERE stockopname.idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->getById($sql, $arrData);
        return $this->data;
    }

	function delete($key) {
        $sql = "DELETE FROM stockopname WHERE idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->deleteData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=stockopname");
        }
    }
	function showslipdetail($key) {
        $sql = "SELECT
				stockopnamedet.idtransdet,
				stockopnamedet.transid,
				stockopnamedet.inventoryid,
				inventory.inventorycode,
				inventory.inventoryname,
				stockopnamedet.unit,
				stockopnamedet.unitprice,
				stockopnamedet.discount,
				stockopnamedet.amount,
				stockopnamedet.quantity
				FROM
				stockopnamedet
				INNER JOIN inventory ON stockopnamedet.inventoryid = inventory.idinventory
				WHERE  stockopnamedet.transid=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
   	function showsliptotal($key) {
        $sql = "SELECT
				SUM(stockopnamedet.amount) AS tamount,
				SUM(stockopnamedet.quantity) AS tquantity
				FROM
				stockopnamedet
				WHERE  stockopnamedet.transid=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }

}
?>

<?php
include_once 'Database.php';
date_default_timezone_set("Asia/Bangkok");
class inventoryadj {
    private $db = '';
    private $data;
    public function __construct() {
        $this->db = new Database();
    }
    function insert($codetrans) {
        $sql = "INSERT INTO inventoryadj (codetrans, notrans, datetrans)
				SELECT :codetrans,
				IFNULL(CONCAT(:codetrans,'-',DATE_FORMAT(NOW(), '%d%m%y'),RIGHT((RIGHT(MAX(RIGHT(inventoryadj.notrans,3)),3))+1001,3)), CONCAT(:codetrans,'-',DATE_FORMAT(NOW(), '%d%m%y'),'001')), DATE(NOW())  
				FROM
				inventoryadj
				WHERE codetrans=:codetrans";
        $arrData = array(':codetrans' => $codetrans);
        $this->data = $this->db->insertData($sql, $arrData);
		if($this->data == true){
			$key = $this->db->lastID();
            header("location:index.php?mod=inventoryadj_detail&key=$key");
        }		
    }
	
    function saveclose($key, $datetrans, $matusedtypeid, $remark) {
		$vardatetime = $_POST['datetrans']; 
		$date = str_replace('/', '-', $vardatetime);
		$datetrans = date('Y-m-d', strtotime($date));
        $sql = "UPDATE inventoryadj SET datetrans=:datetrans, matusedtypeid=:matusedtypeid, remark=:remark WHERE idtrans=:key";
        $arrData = array(':datetrans' => $datetrans, ':matusedtypeid' => $matusedtypeid, ':remark' => $remark, ':key' => $key);
        $this->data = $this->db->insertData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=inventoryadj");
        }
        return $this->data;
    }

    function cancel($key) {
        $sql = "UPDATE inventoryadj SET status=9 WHERE idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->insertData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=inventoryadj");
        }
        return $this->data;
    }

    function showDetail($key) {
        $sql = "SELECT
				inventoryadj.idtrans,
				inventoryadj.codetrans,
				inventoryadj.notrans,
				DATE_FORMAT(inventoryadj.datetrans,'%d/%m/%Y') AS datetrans1,
				inventoryadj.remark AS remarkhead,
				inventoryadj.datetrans,
				inventoryadj.matusedtypeid,
				inventoryadj.transcode,
				inventoryadj.matusedtypeid,
				matusedtype.matusedtypename
				FROM
				inventoryadj
				LEFT JOIN matusedtype ON inventoryadj.matusedtypeid = matusedtype.idmatusedtype
				WHERE inventoryadj.idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->getById($sql, $arrData);
        return $this->data;
    }

	function delete($key) {
        $sql = "DELETE FROM inventoryadj WHERE idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->deleteData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=inventoryadj");
        }
    }
	function showslipdetail($key) {
        $sql = "SELECT
				inventoryadjdet.idtransdet,
				inventoryadjdet.transid,
				inventoryadjdet.inventoryid,
				inventory.inventorycode,
				inventory.inventoryname,
				inventoryadjdet.unit,
				inventoryadjdet.unitprice,
				inventoryadjdet.discount,
				inventoryadjdet.amount,
				inventoryadjdet.quantity
				FROM
				inventoryadjdet
				INNER JOIN inventory ON inventoryadjdet.inventoryid = inventory.idinventory
				WHERE  inventoryadjdet.transid=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
   	function showsliptotal($key) {
        $sql = "SELECT
				SUM(inventoryadjdet.amount) AS tamount,
				SUM(inventoryadjdet.quantity) AS tquantity
				FROM
				inventoryadjdet
				WHERE  inventoryadjdet.transid=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }

}
?>

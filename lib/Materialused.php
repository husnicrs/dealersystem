<?php
include_once 'Database.php';
date_default_timezone_set("Asia/Bangkok");
class materialused {
    private $db = '';
    private $data;
    public function __construct() {
        $this->db = new Database();
    }
    function insert($codetrans) {
        $sql = "INSERT INTO materialused (codetrans, notrans, datetrans)
				SELECT :codetrans,
				IFNULL(CONCAT(:codetrans,'-',DATE_FORMAT(NOW(), '%d%m%y'),RIGHT((RIGHT(MAX(RIGHT(materialused.notrans,3)),3))+1001,3)), CONCAT(:codetrans,'-',DATE_FORMAT(NOW(), '%d%m%y'),'001')), DATE(NOW())  
				FROM
				materialused
				WHERE codetrans=:codetrans";
        $arrData = array(':codetrans' => $codetrans);
        $this->data = $this->db->insertData($sql, $arrData);
		if($this->data == true){
			$key = $this->db->lastID();
            header("location:index.php?mod=materialused");
        }		
    }
	
    function saveclose($key, $datetrans, $matusedtypeid, $remark) {
		$vardatetime = $_POST['datetrans']; 
		$date = str_replace('/', '-', $vardatetime);
		$datetrans = date('Y-m-d', strtotime($date));
        $sql = "UPDATE materialused SET datetrans=:datetrans, matusedtypeid=:matusedtypeid, remark=:remark WHERE idtrans=:key";
        $arrData = array(':datetrans' => $datetrans, ':matusedtypeid' => $matusedtypeid, ':remark' => $remark, ':key' => $key);
        $this->data = $this->db->insertData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=materialused");
        }
        return $this->data;
    }

    function cancel($key) {
        $sql = "UPDATE materialused SET status=9 WHERE idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->insertData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=materialused");
        }
        return $this->data;
    }

    function showDetail($key) {
        $sql = "SELECT
				materialused.idtrans,
				materialused.codetrans,
				materialused.notrans,
				DATE_FORMAT(materialused.datetrans,'%d/%m/%Y') AS datetrans1,
				materialused.remark AS remarkhead,
				materialused.datetrans,
				materialused.matusedtypeid,
				materialused.transcode,
				materialused.matusedtypeid,
				matusedtype.matusedtypename
				FROM
				materialused
				LEFT JOIN matusedtype ON materialused.matusedtypeid = matusedtype.idmatusedtype
				WHERE materialused.idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->getById($sql, $arrData);
        return $this->data;
    }

	function delete($key) {
        $sql = "DELETE FROM materialused WHERE idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->deleteData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=materialusedupload_detail&key=$key");
        }
    }
	function showslipdetail($key) {
        $sql = "SELECT
				materialuseddet.idtransdet,
				materialuseddet.transid,
				materialuseddet.inventoryid,
				inventory.inventorycode,
				inventory.inventoryname,
				materialuseddet.unit,
				materialuseddet.unitprice,
				materialuseddet.discount,
				materialuseddet.amount,
				materialuseddet.quantity
				FROM
				materialuseddet
				INNER JOIN inventory ON materialuseddet.inventoryid = inventory.idinventory
				WHERE  materialuseddet.transid=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
   	function showsliptotal($key) {
        $sql = "SELECT
				SUM(materialuseddet.amount) AS tamount,
				SUM(materialuseddet.quantity) AS tquantity
				FROM
				materialuseddet
				WHERE  materialuseddet.transid=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }

}
?>

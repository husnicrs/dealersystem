<?php
include_once 'Database.php';
date_default_timezone_set("Asia/Bangkok");
class vehiclemutation {
    private $db = '';
    private $data;
    public function __construct() {
        $this->db = new Database();
    }
    function insert($codetrans) {
        $sql = "INSERT INTO vehiclemutation (codetrans, notrans, datetrans)
				SELECT :codetrans,
				IFNULL(CONCAT(:codetrans,'-',DATE_FORMAT(NOW(), '%d%m%y'),RIGHT((RIGHT(MAX(RIGHT(vehiclemutation.notrans,3)),3))+1001,3)), CONCAT(:codetrans,'-',DATE_FORMAT(NOW(), '%d%m%y'),'001')), DATE(NOW())  
				FROM
				vehiclemutation
				WHERE codetrans=:codetrans";
        $arrData = array(':codetrans' => $codetrans);
        $this->data = $this->db->insertData($sql, $arrData);
		if($this->data == true){
			$key = $this->db->lastID();
            header("location:index.php?mod=vehiclemutation_detail&key=$key");
        }		
    }
	
    function saveclose($key, $datetrans, $channelfromid, $paytypeid, $remark) {
		$vardatetime = $_POST['datetrans']; 
		$date = str_replace('/', '-', $vardatetime);
		$datetrans = date('Y-m-d', strtotime($date));
        $sql = "UPDATE vehiclemutation SET datetrans=:datetrans, channelfromid=:channelfromid, paytypeid=:paytypeid, remark=:remark WHERE idtrans=:key";
        $arrData = array(':datetrans' => $datetrans, ':channelfromid' => $channelfromid, ':paytypeid' => $paytypeid, ':remark' => $remark, ':key' => $key);
        $this->data = $this->db->insertData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=vehiclemutation");
        }
        return $this->data;
    }

    function cancel($key) {
        $sql = "UPDATE vehiclemutation SET status=9 WHERE idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->insertData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=vehiclemutation");
        }
        return $this->data;
    }

    function showDetail($key) {
        $sql = "SELECT
				vehiclemutation.idtrans,
				vehiclemutation.codetrans,
				vehiclemutation.notrans,
				DATE_FORMAT(vehiclemutation.datetrans,'%d/%m/%Y') AS datetrans1,
				vehiclemutation.remark AS remarkhead,
				vehiclemutation.datetrans,
				vehiclemutation.channelfromid,
				vehiclemutation.paytypeid,
				vehiclemutation.transcode,
				channel.channelname,
				vehiclemutation.paytypeid,
				paytype.paytypename
				FROM
				vehiclemutation
				LEFT JOIN channel ON vehiclemutation.channelfromid = channel.idchannel
				LEFT JOIN paytype ON vehiclemutation.paytypeid = paytype.idpaytype
				WHERE vehiclemutation.idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->getById($sql, $arrData);
        return $this->data;
    }

	function delete($key) {
        $sql = "DELETE FROM vehiclemutation WHERE idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->deleteData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=vehiclemutation");
        }
    }
	function showslipdetail($key) {
        $sql = "SELECT
				vehiclemutationdet.idtransdet,
				vehiclemutationdet.transid,
				vehiclemutationdet.inventoryid,
				inventory.inventorycode,
				inventory.inventoryname,
				vehiclemutationdet.unit,
				vehiclemutationdet.unitprice,
				vehiclemutationdet.discount,
				vehiclemutationdet.amount,
				vehiclemutationdet.quantity
				FROM
				vehiclemutationdet
				INNER JOIN inventory ON vehiclemutationdet.inventoryid = inventory.idinventory
				WHERE  vehiclemutationdet.transid=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
   	function showsliptotal($key) {
        $sql = "SELECT
				SUM(vehiclemutationdet.amount) AS tamount,
				SUM(vehiclemutationdet.quantity) AS tquantity
				FROM
				vehiclemutationdet
				WHERE  vehiclemutationdet.transid=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }

}
?>

<?php
include_once 'Database.php';
date_default_timezone_set("Asia/Bangkok");
class vehiclemut {
    private $db = '';
    private $data;
    public function __construct() {
        $this->db = new Database();
    }
    function insert($codetrans) {
        $sql = "INSERT INTO vehiclemut (codetrans, notrans, datetrans)
				SELECT :codetrans,
				IFNULL(CONCAT(:codetrans,'-',DATE_FORMAT(NOW(), '%d%m%y'),RIGHT((RIGHT(MAX(RIGHT(vehiclemut.notrans,3)),3))+1001,3)), CONCAT(:codetrans,'-',DATE_FORMAT(NOW(), '%d%m%y'),'001')), DATE(NOW())  
				FROM
				vehiclemut
				WHERE codetrans=:codetrans";
        $arrData = array(':codetrans' => $codetrans);
        $this->data = $this->db->insertData($sql, $arrData);
		if($this->data == true){
			$key = $this->db->lastID();
            header("location:index.php?mod=vehiclemut_detail&key=$key");
        }		
    }
	
    function saveclose($key, $datetrans, $fromchannel, $tochannel, $remark) {
		$vardatetime = $_POST['datetrans']; 
		$date = str_replace('/', '-', $vardatetime);
		$datetrans = date('Y-m-d', strtotime($date));
        $sql = "UPDATE vehiclemut SET datetrans=:datetrans, fromchannel=:fromchannel, tochannel=:tochannel, remark=:remark WHERE idtrans=:key";
        $arrData = array(':datetrans' => $datetrans, ':fromchannel' => $fromchannel, ':tochannel' => $tochannel, ':remark' => $remark, ':key' => $key);
        $this->data = $this->db->insertData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=vehiclemut");
        }
        return $this->data;
    }

    function cancel($key) {
        $sql = "UPDATE vehiclemut SET status=9 WHERE idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->insertData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=vehiclemut");
        }
        return $this->data;
    }

    function showDetail($key) {
        $sql = "SELECT
				vehiclemut.idtrans,
				vehiclemut.codetrans,
				vehiclemut.notrans,
				DATE_FORMAT(vehiclemut.datetrans,'%d/%m/%Y') AS datetrans1,
				vehiclemut.remark,
				vehiclemut.matusedtypeid,
				fromchannel.idchannel AS idfromchannel,
				tochannel.idchannel AS idtochannel,
				fromchannel.channelname AS fromchannel,
				tochannel.channelname AS tochannel
				FROM
				vehiclemut
				LEFT JOIN channel AS fromchannel ON vehiclemut.fromchannel = fromchannel.idchannel
				LEFT JOIN channel AS tochannel ON vehiclemut.tochannel = tochannel.idchannel
				WHERE vehiclemut.idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->getById($sql, $arrData);
        return $this->data;
    }

	function delete($key) {
        $sql = "DELETE FROM vehiclemut WHERE idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->deleteData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=vehiclemut");
        }
    }
	function showslipdetail($key) {
        $sql = "SELECT
				vehiclemutdet.idtransdet,
				vehiclemutdet.transid,
				vehiclemutdet.dono,
				vehiclemutdet.rangkano,
				vehiclemutdet.mechineno,
				vehiclemutdet.vehiclecolor,
				vehiclemutdet.vehiclemodel,
				vehiclemutdet.vehiclejenis,
				vehiclemutdet.vehicletype,
				vehiclestock.`year`,
				vehiclecolor.vehiclecolorname
				FROM
				vehiclemutdet
				LEFT JOIN vehiclestock ON vehiclemutdet.rangkano = vehiclestock.rangkano
				LEFT JOIN vehiclecolor ON vehiclestock.vehiclecolor = vehiclecolor.vehiclecolorcode
				WHERE  vehiclemutdet.transid=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
   	function showsliptotal($key) {
        $sql = "SELECT
				SUM(vehiclemutdet.amount) AS tamount,
				SUM(vehiclemutdet.quantity) AS tquantity
				FROM
				vehiclemutdet
				WHERE  vehiclemutdet.transid=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }

}
?>

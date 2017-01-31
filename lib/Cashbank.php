<?php
include_once 'Database.php';
date_default_timezone_set("Asia/Bangkok");
class cashbank {
    private $db = '';
    private $data;
    public function __construct() {
        $this->db = new Database();
    }
    function insert($codetrans) {
        $sql = "INSERT INTO cashbank (codetrans, notrans, datetrans)
				SELECT :codetrans,
				IFNULL(CONCAT(:codetrans,'-',DATE_FORMAT(NOW(), '%d%m%y'),RIGHT((RIGHT(MAX(RIGHT(cashbank.notrans,3)),3))+1001,3)), CONCAT(:codetrans,'-',DATE_FORMAT(NOW(), '%d%m%y'),'001')), DATE(NOW())  
				FROM
				cashbank
				WHERE codetrans=:codetrans";
        $arrData = array(':codetrans' => $codetrans);
        $this->data = $this->db->insertData($sql, $arrData);
		if($this->data == true){
			$key = $this->db->lastID();
            header("location:index.php?mod=cashbank_detail&key=$key");
        }		
    }
	
    function saveclose($key, $datetrans, $cusname, $address, $unit, $nofaktur, $soid) {
		$vardatetime = $_POST['datetrans']; 
		$date = str_replace('/', '-', $vardatetime);
		$datetrans = date('Y-m-d', strtotime($date));
        $sql = "UPDATE cashbank SET datetrans=:datetrans, cusname=:cusname, address=:address, unit=:unit, nofaktur=:nofaktur, soid=:soid WHERE idtrans=:key";
        $arrData = array(':datetrans' => $datetrans, ':cusname' => $cusname, ':address' => $address, ':unit' => $unit, ':nofaktur' => $nofaktur, ':soid' => $soid, ':key' => $key);
        $this->data = $this->db->insertData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=cashbank");
        }
        return $this->data;
    }

	function updateso($soid) {
        $sql = "UPDATE salesvehicle SET dpjurnal=1  WHERE idtrans=:soid";
        $arrData = array( ':soid' => $soid);
        $this->data = $this->db->insertData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=cashbank");
        }
        return $this->data;
    }

    function cancel($key) {
        $sql = "UPDATE cashbank SET status=9 WHERE idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->insertData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=cashbank");
        }
        return $this->data;
    }

    function showDetail($key) {
        $sql = "SELECT
				cashbank.idtrans,
				cashbank.codetrans,
				cashbank.notrans,
				DATE_FORMAT(cashbank.datetrans,'%d/%m/%Y') AS datetrans,
				cashbank.remark,
				cashbank.cusname,
				cashbank.address,
				cashbank.unit,
				cashbank.nofaktur,
				cashbank.soid
				FROM
				cashbank
				WHERE cashbank.idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->getById($sql, $arrData);
        return $this->data;
    }

	function delete($key) {
        $sql = "DELETE FROM cashbank WHERE idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->deleteData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=cashbank");
        }
    }
	function showslipdebet($key) {
        $sql = "SELECT
					cashbank.idtrans,
					cashbank.codetrans,
					cashbank.notrans,
					DATE_FORMAT(NOW(), '%Y-%m-%d') AS dateprint,
					DATE_FORMAT(
						cashbank.datetrans,
						'%d/%m/%Y'
					) AS datetrans,
					cashbank.remark,
					cashbank.cusname,
					cashbank.address,
					cashbank.unit,
					cashbank.nofaktur,
					Sum(cashbankdet.debet) AS amount,
					cashbankdet.description AS description,
					cashbank.soid,
					salesvehicle.rangkano,
					salesvehicle.mechineno,
					salesvehicle.vehiclecolor,
					salesvehicle.`year`,
					vehiclecolor.vehiclecolorname,
					salesvehicle.leasing
				FROM
					cashbank
				INNER JOIN cashbankdet ON cashbank.idtrans = cashbankdet.transid
				LEFT JOIN salesvehicle ON cashbank.soid = salesvehicle.idtrans
				LEFT JOIN vehiclecolor ON salesvehicle.vehiclecolor = vehiclecolor.vehiclecolorcode
				WHERE
					cashbank.idtrans=:key AND cashbankdet.debet > 0 AND cashbankdet.print = 1
				GROUP BY
					cashbank.idtrans,
					cashbank.codetrans,
					cashbank.notrans,
					DATE_FORMAT(
						cashbank.datetrans,
						'%d/%m/%Y'
					),
					cashbank.remark,
					cashbank.cusname,
					cashbank.address,
					cashbank.unit,
					cashbank.nofaktur,
					cashbank.soid,
					salesvehicle.rangkano,
					salesvehicle.mechineno,
					salesvehicle.vehiclecolor,
					salesvehicle.`year`,
					cashbankdet.description,
					salesvehicle.leasing";
        $arrData = array(':key' => $key);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
	
	function showslipcredit($key) {
        $sql = "SELECT
					cashbank.idtrans,
					cashbank.codetrans,
					cashbank.notrans,
					DATE_FORMAT(NOW(), '%Y-%m-%d') AS dateprint,
					DATE_FORMAT(
						cashbank.datetrans,
						'%d/%m/%Y'
					) AS datetrans,
					cashbank.remark,
					cashbank.cusname,
					cashbank.address,
					cashbank.unit,
					cashbank.nofaktur,
					Sum(cashbankdet.credit) AS amount,
					cashbankdet.description AS description,
					cashbank.soid,
					salesvehicle.rangkano,
					salesvehicle.mechineno,
					salesvehicle.vehiclecolor,
					salesvehicle.`year`,
					vehiclecolor.vehiclecolorname,
					salesvehicle.leasing
				FROM
					cashbank
				INNER JOIN cashbankdet ON cashbank.idtrans = cashbankdet.transid
				LEFT JOIN salesvehicle ON cashbank.soid = salesvehicle.idtrans
				LEFT JOIN vehiclecolor ON salesvehicle.vehiclecolor = vehiclecolor.vehiclecolorcode
				WHERE
					cashbank.idtrans=:key AND cashbankdet.credit >0 AND cashbankdet.print = 1
				GROUP BY
					cashbank.idtrans,
					cashbank.codetrans,
					cashbank.notrans,
					DATE_FORMAT(
						cashbank.datetrans,
						'%d/%m/%Y'
					),
					cashbank.remark,
					cashbank.cusname,
					cashbank.address,
					cashbank.unit,
					cashbank.nofaktur,
					cashbank.soid,
					salesvehicle.rangkano,
					salesvehicle.mechineno,
					salesvehicle.vehiclecolor,
					salesvehicle.`year`,
					cashbankdet.description,
					salesvehicle.leasing";
        $arrData = array(':key' => $key);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }

}
?>

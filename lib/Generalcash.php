<?php
include_once 'Database.php';
date_default_timezone_set("Asia/Bangkok");
class generalcash {
    private $db = '';
    private $data;
    public function __construct() {
        $this->db = new Database();
    }
    function insert($codetrans) {
        $sql = "INSERT INTO generalcash (codetrans, notrans, datetrans)
				SELECT :codetrans,
				IFNULL(CONCAT(:codetrans,'-',DATE_FORMAT(NOW(), '%d%m%y'),RIGHT((RIGHT(MAX(RIGHT(generalcash.notrans,3)),3))+1001,3)), CONCAT(:codetrans,'-',DATE_FORMAT(NOW(), '%d%m%y'),'001')), DATE(NOW())  
				FROM
				generalcash
				WHERE codetrans=:codetrans";
        $arrData = array(':codetrans' => $codetrans);
        $this->data = $this->db->insertData($sql, $arrData);
		if($this->data == true){
			$key = $this->db->lastID();
            header("location:index.php?mod=generalcash_detail&key=$key");
        }		
    }
	
    function saveclose($key, $datetrans, $matusedtypeid, $remark) {
		$vardatetime = $_POST['datetrans']; 
		$date = str_replace('/', '-', $vardatetime);
		$datetrans = date('Y-m-d', strtotime($date));
        $sql = "UPDATE generalcash SET datetrans=:datetrans, matusedtypeid=:matusedtypeid, remark=:remark WHERE idtrans=:key";
        $arrData = array(':datetrans' => $datetrans, ':matusedtypeid' => $matusedtypeid, ':remark' => $remark, ':key' => $key);
        $this->data = $this->db->insertData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=generalcash");
        }
        return $this->data;
    }

    function cancel($key) {
        $sql = "UPDATE generalcash SET status=9 WHERE idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->insertData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=generalcash");
        }
        return $this->data;
    }

    function showDetail($key) {
        $sql = "SELECT
				generalcash.idtrans,
				generalcash.codetrans,
				generalcash.notrans,
				DATE_FORMAT(generalcash.datetrans,'%d/%m/%Y') AS datetrans1,
				generalcash.remark AS remarkhead,
				generalcash.datetrans,
				generalcash.transcode
				FROM
				generalcash
				WHERE generalcash.idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->getById($sql, $arrData);
        return $this->data;
    }

	function delete($key) {
        $sql = "DELETE FROM generalcash WHERE idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->deleteData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=generalcash");
        }
    }
function showslipdebet($key) {
        $sql = "SELECT
				generalcash.idtrans,
				generalcash.codetrans,
				generalcash.notrans,
				DATE_FORMAT(NOW(),'%Y-%m-%d') AS dateprint,
				DATE_FORMAT(generalcash.datetrans,'%d/%m/%Y') AS datetrans,
				generalcash.remark,
				Sum(generalcashdet.debet) AS amount,
				Max(generalcashdet.description) AS description
				FROM
				generalcash
				INNER JOIN generalcashdet ON generalcash.idtrans = generalcashdet.transid
				WHERE generalcashdet.debet >0 AND generalcash.idtrans=:key 
				GROUP BY
				generalcash.idtrans,
				generalcash.codetrans,
				generalcash.notrans,
				DATE_FORMAT(generalcash.datetrans,'%d/%m/%Y'),
				generalcash.remark";
        $arrData = array(':key' => $key);
        $this->data = $this->db->getById($sql, $arrData);
        return $this->data;
    }
	
	function showslipcredit($key) {
        $sql = "SELECT
				generalcash.idtrans,
				generalcash.codetrans,
				generalcash.notrans,
				DATE_FORMAT(NOW(),'%Y-%m-%d') AS dateprint,
				DATE_FORMAT(generalcash.datetrans,'%d/%m/%Y') AS datetrans,
				generalcash.remark,
				Sum(generalcashdet.credit) AS amount,
				Max(generalcashdet.description) AS description
				FROM
				generalcash
				INNER JOIN generalcashdet ON generalcash.idtrans = generalcashdet.transid
				WHERE generalcashdet.credit >0 AND generalcash.idtrans=:key 
				GROUP BY
				generalcash.idtrans,
				generalcash.codetrans,
				generalcash.notrans,
				DATE_FORMAT(generalcash.datetrans,'%d/%m/%Y'),
				generalcash.remark";
        $arrData = array(':key' => $key);
        $this->data = $this->db->getById($sql, $arrData);
        return $this->data;
    }

}

?>

<?php
include_once 'Database.php';
date_default_timezone_set("Asia/Bangkok");
class notadebet {
    private $db = '';
    private $data;
    public function __construct() {
        $this->db = new Database();
    }

    function showDetail($key) {
        $sql = "SELECT
				notadebet.idvehicle,
				notadebet.dono,
				DATE_FORMAT(notadebet.dodate,'%d/%m/%Y') AS dodate,
				notadebet.ndno,
				notadebet.subtotal,
				notadebet.potongan,
				notadebet.total,
				notadebet.ppn,
				notadebet.grandtotal,
				FORMAT(notadebet.subtotal,0) AS subtotalsw,
				FORMAT(notadebet.potongan,0) AS potongansw,
				FORMAT(notadebet.total,0) AS totalsw,
				FORMAT(notadebet.ppn,0) AS ppnsw,
				FORMAT(notadebet.grandtotal,0) AS grandtotalsw
				FROM
				notadebet WHERE notadebet.ndno=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->getById($sql, $arrData);
        return $this->data;
    }

	function saveclose($key, $subtotal, $potongan, $total, $ppn, $grandtotal) {
		
        $sql = "UPDATE notadebet SET subtotal=:subtotal, potongan=:potongan, total=:total, ppn=:ppn, grandtotal=:grandtotal WHERE ndno=:key";
        $arrData = array(':subtotal' => $subtotal, ':potongan' => $potongan, ':total' => $total, ':ppn' => $ppn, ':grandtotal' => $grandtotal,':key' => $key);
        $this->data = $this->db->insertData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=notadebet");
        }
        return $this->data;
    }
}
?>

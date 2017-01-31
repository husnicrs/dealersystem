	<?php
	include_once 'Database.php';
	class rptcashreceipt {
    private $db ='';
    private $data;
    public function __construct(){
        $this->db = new Database();
    }

	function show($datefrom, $dateto){
        $sql = "SELECT
				cashreceipt.idtrans AS idkey,
				cashreceipt.notrans,
				DATE_FORMAT(cashreceipt.datetrans,'%d/%m/%Y') AS datetrans,
				customer.customername,
				bank.bankname,
				paytype.paytypename,
				FORMAT(cashreceipt.amount,0) AS amount
				FROM
				cashreceipt
				LEFT JOIN customer ON cashreceipt.customerid = customer.idcustomer
				LEFT JOIN bank ON cashreceipt.bankid = bank.idbank
				LEFT JOIN paytype ON cashreceipt.paytypeid = paytype.idpaytype
				WHERE cashreceipt.datetrans BETWEEN :datefrom AND :dateto";
        $arrData = array(':datefrom' => $datefrom, ':dateto' => $dateto);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
	
	function showtotal($datefrom, $dateto){
        $sql = "SELECT
				FORMAT(SUM(cashreceipt.amount),0) AS tamount
				FROM
				cashreceipt
				WHERE cashreceipt.datetrans BETWEEN :datefrom AND :dateto";
        $arrData = array(':datefrom' => $datefrom, ':dateto' => $dateto);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }

}
?>


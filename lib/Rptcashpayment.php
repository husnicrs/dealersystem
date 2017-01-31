	<?php
	include_once 'Database.php';
	class rptcashpayment {
    private $db ='';
    private $data;
    public function __construct(){
        $this->db = new Database();
    }

	function show($datefrom, $dateto){
        $sql = "SELECT
				cashpayment.idtrans AS idkey,
				cashpayment.notrans,
				DATE_FORMAT(cashpayment.datetrans,'%d/%m/%Y') AS datetrans,
				supplier.suppliername,
				bank.bankname,
				paytype.paytypename,
				FORMAT(cashpayment.amount,0) AS amount
				FROM
				cashpayment
				LEFT JOIN supplier ON cashpayment.supplierid = supplier.idsupplier
				LEFT JOIN bank ON cashpayment.bankid = bank.idbank
				LEFT JOIN paytype ON cashpayment.paytypeid = paytype.idpaytype
				WHERE cashpayment.datetrans BETWEEN :datefrom AND :dateto";
        $arrData = array(':datefrom' => $datefrom, ':dateto' => $dateto);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
	
	function showtotal($datefrom, $dateto){
        $sql = "SELECT
				FORMAT(SUM(cashpayment.amount),0) AS tamount
				FROM
				cashpayment
				WHERE cashpayment.datetrans BETWEEN :datefrom AND :dateto";
        $arrData = array(':datefrom' => $datefrom, ':dateto' => $dateto);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }

}
?>


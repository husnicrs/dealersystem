	<?php
	include_once 'Database.php';
	class rptcashbank {
    private $db ='';
    private $data;
    public function __construct(){
        $this->db = new Database();
    }

	function show($rptdatefrom, $rptdateto){
		$rptdatefrom = $_POST['rptdatefrom']; 
		$date = str_replace('/', '-', $rptdatefrom);
		$rptdatefrom = date('Y-m-d', strtotime($date));
		
		$rptdateto = $_POST['rptdateto']; 
		$date = str_replace('/', '-', $rptdateto);
		$rptdateto = date('Y-m-d', strtotime($date));

        $sql = "SELECT
				cashbank.codetrans,
				cashbank.notrans,
				DATE_FORMAT(cashbank.datetrans,'%d/%m/%Y') AS datetrans,
				CONCAT(cashbankdet.acccode, ' - ', cashbankdet.accname) AS account,
				cashbankdet.description,
				FORMAT(cashbankdet.debet,0) AS debet,
				FORMAT(cashbankdet.credit,0) AS credit,
				FORMAT(cashbankdet.debet-cashbankdet.credit,0) AS balance,
				cashbank.nofaktur
				FROM
				cashbank
				INNER JOIN cashbankdet ON cashbank.idtrans = cashbankdet.transid
				WHERE cashbank.datetrans BETWEEN :rptdatefrom AND :rptdateto";
        $arrData = array(':rptdatefrom' => $rptdatefrom, ':rptdateto' => $rptdateto);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
	
	function showtotal($rptdatefrom, $rptdateto){
		$rptdatefrom = $_POST['rptdatefrom']; 
		$date = str_replace('/', '-', $rptdatefrom);
		$rptdatefrom = date('Y-m-d', strtotime($date));
		
		$rptdateto = $_POST['rptdateto']; 
		$date = str_replace('/', '-', $rptdateto);
		$rptdateto = date('Y-m-d', strtotime($date));

        $sql = "SELECT
				FORMAT(SUM(cashbankdet.debet),0) AS tdebet,
				FORMAT(SUM(cashbankdet.credit),0) AS tcredit,
				FORMAT(SUM(cashbankdet.debet-cashbankdet.credit),0) AS tbalance
				FROM
				cashbank
				INNER JOIN cashbankdet ON cashbank.idtrans = cashbankdet.transid
				WHERE cashbank.datetrans BETWEEN :rptdatefrom AND :rptdateto";
        $arrData = array(':rptdatefrom' => $rptdatefrom, ':rptdateto' => $rptdateto);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
	
}
?>


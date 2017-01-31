	<?php
	include_once 'Database.php';
	class rptpettycash {
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
				pettycash.codetrans,
				pettycash.notrans,
				DATE_FORMAT(pettycash.datetrans,'%d/%m/%Y') AS datetrans,
				CONCAT(IFNULL(pettycashdet.acccode,''), ' - ', pettycashdet.accname) AS account,
				pettycashdet.description,
				FORMAT(pettycashdet.debet,0) AS debet,
				FORMAT(pettycashdet.credit,0) AS credit,
				FORMAT(pettycashdet.debet-pettycashdet.credit,0) AS balance
				FROM
				pettycash
				INNER JOIN pettycashdet ON pettycash.idtrans = pettycashdet.transid
				WHERE pettycash.datetrans BETWEEN :rptdatefrom AND :rptdateto";
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
				FORMAT(SUM(pettycashdet.debet),0) AS tdebet,
				FORMAT(SUM(pettycashdet.credit),0) AS tcredit,
				FORMAT(SUM(pettycashdet.debet-pettycashdet.credit),0) AS tbalance
				FROM
				pettycash
				INNER JOIN pettycashdet ON pettycash.idtrans = pettycashdet.transid
				WHERE pettycash.datetrans BETWEEN :rptdatefrom AND :rptdateto";
        $arrData = array(':rptdatefrom' => $rptdatefrom, ':rptdateto' => $rptdateto);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
	
}
?>


	<?php
	include_once 'Database.php';
	class rptarreceivesum {
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
				1 AS idkey,
				COUNT(salesvehicle.idtrans) AS counttrans,
				salesvehicle.leasing,
				FORMAT(SUM(salesvehicle.pencairan),0) AS pencairansw,
				FORMAT(SUM(DATEDIFF(salesvehicle.datetrans, salesvehicle.tglambil))/COUNT(salesvehicle.idtrans),0) AS leadsales
				FROM
				salesvehicle
				WHERE salesvehicle.datetrans BETWEEN :rptdatefrom AND :rptdateto AND salesvehicle.clearstatus=1";
        $arrData = array(':rptdatefrom' => $rptdatefrom, ':rptdateto' => $rptdateto);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
	
}
?>


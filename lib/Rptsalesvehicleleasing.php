	<?php
	include_once 'Database.php';
	class rptsalesvehicleleasing {
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
				Count(salesvehicle.idtrans) AS idkey,
				Count(salesvehicle.idtrans) AS countvehicle,
				salesvehicle.leasing,
				leasing.leasingname
				FROM
				salesvehicle
				LEFT JOIN leasing ON salesvehicle.leasing = leasing.idleasing
				WHERE salesvehicle.datetrans BETWEEN :rptdatefrom AND :rptdateto
				GROUP BY
				salesvehicle.leasing,
				leasing.leasingname";
        $arrData = array(':rptdatefrom' => $rptdatefrom, ':rptdateto' => $rptdateto);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
	

}
?>


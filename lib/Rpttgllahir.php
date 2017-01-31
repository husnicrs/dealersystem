	<?php
	include_once 'Database.php';
	class rpttgllahir {
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
				salesvehicle.idtrans AS idkey,
				salesvehicle.cusname,
				salesvehicle.bpkbname,
				DATE_FORMAT(salesvehicle.datebirth,'%d/%m/%Y') AS datebirth,
				salesvehicle.address,
				salesvehicle.handphone,
				salesvehicle.vehiclemodel,
				DATE_FORMAT(salesvehicle.datetrans,'%d/%m/%Y') AS datetrans,
				salesvehicle.leasing,
				salesvehicle.credittenor
				FROM
				salesvehicle
				WHERE salesvehicle.datetrans BETWEEN :rptdatefrom AND :rptdateto";
        $arrData = array(':rptdatefrom' => $rptdatefrom, ':rptdateto' => $rptdateto);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
	

}
?>


	<?php
	include_once 'Database.php';
	class rptsalesvehicletype {
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
				COUNT(salesvehicle.idtrans) countvehicle,
				salesvehicle.vehicletype,
				salesvehicle.vehiclemodel
				FROM
				salesvehicle
				WHERE salesvehicle.datetrans BETWEEN :rptdatefrom AND :rptdateto
				GROUP BY
				salesvehicle.vehicletype,
				salesvehicle.vehiclemodel";
        $arrData = array(':rptdatefrom' => $rptdatefrom, ':rptdateto' => $rptdateto);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
	

}
?>


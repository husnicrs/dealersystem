	<?php
	include_once 'Database.php';
	class rptsalesvehiclesales {
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
				Count(salesvehicle.idtrans) AS countvehicle,
				salesvehicle.channelid,
				salesvehicle.salesmanid,
				employee.nik,
				employee.identityno,
				employee.employeename,
				employee.nickname,
				employee.address
				FROM
				salesvehicle
				LEFT JOIN employee ON salesvehicle.salesmanid = employee.idemployee
				WHERE salesvehicle.datetrans BETWEEN :rptdatefrom AND :rptdateto
				GROUP BY
				salesvehicle.channelid,
				salesvehicle.salesmanid,
				employee.nik,
				employee.identityno,
				employee.employeename,
				employee.nickname,
				employee.address";
        $arrData = array(':rptdatefrom' => $rptdatefrom, ':rptdateto' => $rptdateto);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
	

}
?>


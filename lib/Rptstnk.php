	<?php
	include_once 'Database.php';
	class rptstnk {
    private $db ='';
    private $data;
    public function __construct(){
        $this->db = new Database();
    }

	function show($rptdatefrom, $rptdateto, $statusstnk){
		$rptdatefrom = $_POST['rptdatefrom']; 
		$date = str_replace('/', '-', $rptdatefrom);
		$rptdatefrom = date('Y-m-d', strtotime($date));
		
		$rptdateto = $_POST['rptdateto']; 
		$date = str_replace('/', '-', $rptdateto);
		$rptdateto = date('Y-m-d', strtotime($date));

        $sql = "SELECT
					salesvehicle.idtrans AS idkey,
					DATE_FORMAT(salesvehicle.datetrans,'%d/%m/%Y') AS datetrans,
					salesvehicle.cusname,
					salesvehicle.address,
					salesvehicle.vehicletype,
					salesvehicle.vehiclecolor,
					vehiclecolor.vehiclecolorname,
					salesvehicle.mechineno,
					employee.employeename, CASE
				WHEN salesvehicle.stnkno = '' THEN
					'BELUM DIBUAT'
				ELSE
					CASE
				WHEN salesvehicle.stnkno <> ''
				AND salesvehicle.datestnk = '1970-01-01' THEN
					'BELUM DIAMBIL'
				ELSE
					CASE
				WHEN salesvehicle.stnkno <> ''
				AND salesvehicle.datestnk <> '1970-01-01' THEN
					'SUDAH DIAMBIL'
				END
				END
				END AS prosesstatus
				FROM
					salesvehicle
				LEFT JOIN vehiclecolor ON salesvehicle.vehicletype = vehiclecolor.vehiclecolorcode
				LEFT JOIN employee ON salesvehicle.salesmanid = employee.idemployee
				WHERE salesvehicle.datetrans BETWEEN :rptdatefrom AND :rptdateto AND CASE
				WHEN salesvehicle.stnkno = '' THEN
					'BELUM DIBUAT'
				ELSE
					CASE
				WHEN salesvehicle.stnkno <> ''
				AND salesvehicle.datestnk = '1970-01-01' THEN
					'BELUM DIAMBIL'
				ELSE
					CASE
				WHEN salesvehicle.stnkno <> ''
				AND salesvehicle.datestnk <> '1970-01-01' THEN
					'SUDAH DIAMBIL'
				END
				END
				END = :statusstnk";
        $arrData = array(':rptdatefrom' => $rptdatefrom, ':rptdateto' => $rptdateto, ':statusstnk' => $statusstnk);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
	

}
?>


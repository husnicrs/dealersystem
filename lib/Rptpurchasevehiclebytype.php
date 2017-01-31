	<?php
	include_once 'Database.php';
	class rptpurchasevehiclebytype {
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
				vehiclestock.vehicletype AS idkey,
				vehiclestock.vehicletype,
				COUNT(vehiclestock.idvehicle) AS countvehicle
				FROM
				vehiclestock
				WHERE vehiclestock.dodate BETWEEN :rptdatefrom AND :rptdateto
				GROUP BY
				vehiclestock.vehicletype";
        $arrData = array(':rptdatefrom' => $rptdatefrom, ':rptdateto' => $rptdateto);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
	

}
?>


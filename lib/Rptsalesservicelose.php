	<?php
	include_once 'Database.php';
	class rptsalesservicelose {
    private $db ='';
    private $data;
    public function __construct(){
        $this->db = new Database();
    }

	function show($rptdateto){
		
		$rptdateto = $_POST['rptdateto']; 
		$date = str_replace('/', '-', $rptdateto);
		$rptdateto = date('Y-m-d', strtotime($date));
		
		
        $sql = "SELECT transaksi.policeno, transaksi.customername, transaksi.address, transaksi.mechineno, transaksi.datetrans, transaksi.notrans, mekanik.employeename
				FROM
				(
				SELECT
				salesservice.policeno,
				salesservice.customername,
				salesservice.address,
				CONCAT(salesservice.vehiclemodel) AS mechineno,
				MAX(salesservice.datetrans) AS datetrans,
				MAX(salesservice.notrans) AS notrans
				FROM
				salesservice
				LEFT JOIN employee ON salesservice.employeeid = employee.idemployee
				GROUP BY
				policeno,
				salesservice.customername,
				salesservice.address,
				CONCAT(salesservice.vehiclemodel) 
				) transaksi
				LEFT JOIN
				(SELECT
				employee.employeename,
				salesservice.notrans
				FROM
				salesservice
				INNER JOIN employee ON salesservice.mekanikid = employee.idemployee) AS mekanik
				ON transaksi.notrans=mekanik.notrans
				WHERE DATEDIFF(:rptdateto, transaksi.datetrans)>180";
        $arrData = array(':rptdateto' => $rptdateto);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
	

}
?>


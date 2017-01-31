<?php
include_once 'Database.php';
date_default_timezone_set("Asia/Bangkok");
class kwitansi {
    private $db = '';
    private $data;
    public function __construct() {
        $this->db = new Database();
    }

    function showDetail($user) {
		$user=$_SESSION['uname'];
        $sql = "SELECT 
				DERIVEDTBL.idtrans,
				UPPER(DERIVEDTBL.sjno) AS sjno,
				UPPER(DERIVEDTBL.nik) AS nik,
				DERIVEDTBL.arbillingdate,
				UPPER(DERIVEDTBL.cusname) AS cusname,
				UPPER(DERIVEDTBL.address) AS address,
				CASE WHEN DERIVEDTBL.amount IS NULL THEN 0 ELSE DERIVEDTBL.amount END AS amount,
				UPPER(DERIVEDTBL.ket) AS ket,
				UPPER(DERIVEDTBL.vehicletype) AS vehicletype,
				UPPER(DERIVEDTBL.vehiclecolor) AS vehiclecolor,
				UPPER(DERIVEDTBL.mechineno) AS mechineno,
				UPPER(DERIVEDTBL.rangkano) AS rangkano,
				UPPER(vehiclecolor.vehiclecolorname) AS vehiclecolorname
				FROM 
				(
				SELECT
				salesvehicle.idtrans,
				salesvehicle.sjno,
				vehiclestock.nik,
				salesvehicle.arbillingdate,
				salesvehicle.cusname,
				salesvehicle.address,
				salesvehicle.brutoamount AS amount,
				leasing.payment AS ket,
				salesvehicle.vehicletype,
				salesvehicle.vehiclecolor,
				salesvehicle.mechineno,
				salesvehicle.rangkano
				FROM
				salesvehicle
				INNER JOIN vehiclestock ON salesvehicle.mechineno = vehiclestock.mechineno
				INNER JOIN leasing ON salesvehicle.leasing = leasing.leasingname
				WHERE salesvehicle.paymentformat ='Y'
				
				UNION ALL
				
				SELECT
				salesvehicle.idtrans,
				salesvehicle.sjno,
				vehiclestock.nik,
				salesvehicle.arbillingdate,
				salesvehicle.cusname,
				salesvehicle.address,
				salesvehicle.creditnettdp AS amount,
				leasing.dppo AS ket,
				salesvehicle.vehicletype,
				salesvehicle.vehiclecolor,
				salesvehicle.mechineno,
				salesvehicle.rangkano
				FROM
				salesvehicle
				INNER JOIN vehiclestock ON salesvehicle.mechineno = vehiclestock.mechineno
				INNER JOIN leasing ON salesvehicle.leasing = leasing.leasingname
				WHERE salesvehicle.dppoformat ='Y'
				
				UNION ALL
				
				SELECT
				salesvehicle.idtrans,
				salesvehicle.sjno,
				vehiclestock.nik,
				salesvehicle.arbillingdate,
				salesvehicle.cusname,
				salesvehicle.address,
				salesvehicle.otr AS amount,
				leasing.otr AS ket,
				salesvehicle.vehicletype,
				salesvehicle.vehiclecolor,
				salesvehicle.mechineno,
				salesvehicle.rangkano
				FROM
				salesvehicle
				INNER JOIN vehiclestock ON salesvehicle.mechineno = vehiclestock.mechineno
				INNER JOIN leasing ON salesvehicle.leasing = leasing.leasingname
				WHERE salesvehicle.otrformat ='Y'
				
				UNION ALL
				
				SELECT
				salesvehicle.idtrans,
				salesvehicle.sjno,
				vehiclestock.nik,
				salesvehicle.arbillingdate,
				salesvehicle.cusname,
				salesvehicle.address,
				salesvehicle.subleasing AS amount,
				leasing.subleasing AS ket,
				salesvehicle.vehicletype,
				salesvehicle.vehiclecolor,
				salesvehicle.mechineno,
				salesvehicle.rangkano
				FROM
				salesvehicle
				INNER JOIN vehiclestock ON salesvehicle.mechineno = vehiclestock.mechineno
				INNER JOIN leasing ON salesvehicle.leasing = leasing.leasingname
				WHERE salesvehicle.subleasingformat ='Y'
				
				UNION ALL
				
				SELECT
				salesvehicle.idtrans,
				salesvehicle.sjno,
				vehiclestock.nik,
				salesvehicle.arbillingdate,
				salesvehicle.cusname,
				salesvehicle.address,
				salesvehicle.scheme AS amount,
				leasing.scheme AS ket,
				salesvehicle.vehicletype,
				salesvehicle.vehiclecolor,
				salesvehicle.mechineno,
				salesvehicle.rangkano
				FROM
				salesvehicle
				INNER JOIN vehiclestock ON salesvehicle.mechineno = vehiclestock.mechineno
				INNER JOIN leasing ON salesvehicle.leasing = leasing.leasingname
				WHERE salesvehicle.schemeformat ='Y'
				
				UNION ALL
				
				SELECT
				salesvehicle.idtrans,
				salesvehicle.sjno,
				vehiclestock.nik,
				salesvehicle.arbillingdate,
				salesvehicle.cusname,
				salesvehicle.address,
				salesvehicle.accessories AS amount,
				leasing.accessories AS ket,
				salesvehicle.vehicletype,
				salesvehicle.vehiclecolor,
				salesvehicle.mechineno,
				salesvehicle.rangkano
				FROM
				salesvehicle
				INNER JOIN vehiclestock ON salesvehicle.mechineno = vehiclestock.mechineno
				INNER JOIN leasing ON salesvehicle.leasing = leasing.leasingname
				WHERE salesvehicle.accessoriesformat ='Y'
				) DERIVEDTBL INNER JOIN 
				users ON users.soid = DERIVEDTBL.idtrans
				LEFT JOIN vehiclecolor ON DERIVEDTBL.vehiclecolor = vehiclecolor.vehiclecolorcode
				WHERE users.username='".$user."'";
        $arrData = array(':user' => $user);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }


}
?>

<?php
include_once 'Database.php';
date_default_timezone_set("Asia/Bangkok");
class arbilling {
    private $db = '';
    private $data;
    public function __construct() {
        $this->db = new Database();
    }

    function showDetail($user) {
		$user=$_SESSION['uname'];
        $sql = "SELECT
				UPPER(salesvehicle.cusname) AS cusname,
				UPPER(salesvehicle.bpkbname) AS bpkbname,
				salesvehicle.telp,
				UPPER(salesvehicle.address) AS address,
				UPPER(salesvehicle.vehicletype) AS vehicletype,
				UPPER(salesvehicle.rangkano) AS rangkano,
				UPPER(salesvehicle.mechineno) AS mechineno,
				salesvehicle.`year`,
				UPPER(salesvehicle.vehiclecolor) AS vehiclecolor,
				UPPER(salesvehicle.vehiclejenis) AS vehiclejenis,
				UPPER(salesvehicle.vehiclemodel) AS vehiclemodel,
				UPPER(vehiclecolor.vehiclecolorname) AS vehiclecolorname,
				UPPER(village.villagename) AS villagename,
				UPPER(districts.districtsname) AS districtsname,
				UPPER(city.cityname) AS cityname
				FROM
				users
				INNER JOIN salesvehicle ON users.soid = salesvehicle.idtrans
				LEFT JOIN vehiclecolor ON salesvehicle.vehiclecolor = vehiclecolor.vehiclecolorcode
				LEFT JOIN village ON salesvehicle.villageid = village.idvillage
				LEFT JOIN districts ON village.districtsid = districts.iddistricts
				LEFT JOIN city ON districts.cityid = city.idcity
				WHERE users.username='".$user."'";
        $arrData = array(':user' => $user);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }


}
?>

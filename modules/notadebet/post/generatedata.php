<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['type']) {
	case "generate":
		
		$SQL = mysqli_query($con, "UPDATE vehiclestock A INNER JOIN (SELECT
									vehiclestock.vehicletype,
									MAX(vehiclestock.unitprice) AS unitprice
									FROM
									vehiclestock
									WHERE vehiclestock.ndno = '".$_POST['ndno']."'
									GROUP BY
									vehiclestock.vehicletype) U SET A.unitprice=U.unitprice WHERE A.ndno = '".$_POST['ndno']."' AND A.vehicletype=U.vehicletype");
		if($SQL){
			echo json_encode("OK");
		}
		
		
		$SQL1 = mysqli_query($con, "DELETE FROM vehicleupload");
		if($SQL1){
			echo json_encode("OK");
		}
		break;
} 
?>

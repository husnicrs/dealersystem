<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['type']) {
	case "generate":
		
		$SQL = mysqli_query($con, "INSERT INTO vehiclestock (dono, dodate, ndno, vehicledate, mechineno, rangkano, year, vehicletype, vehiclecolor)
		SELECT
		vehicleupload.dono,
		STR_TO_DATE(vehicleupload.dodate,'%d%m%Y') AS dodate,
		vehicleupload.ndno,
		vehicleupload.vehicledate,
		vehicleupload.mechineno,
		vehicleupload.rangkano,
		vehicleupload.`year`,
		vehicleupload.vehicletype,
		vehicleupload.vehiclecolor
		FROM
		vehicleupload
		WHERE vehicleupload.rangkano NOT IN (SELECT rangkano FROM vehiclestock)");
		if($SQL){
			echo json_encode("OK");
		}
		
		$SQL = mysqli_query($con, "INSERT INTO notadebet (dono, dodate, ndno)
		SELECT
		vehicleupload.dono,
		STR_TO_DATE(vehicleupload.dodate,'%d%m%Y') AS dodate,
		vehicleupload.ndno
		FROM
		vehicleupload
		WHERE vehicleupload.ndno NOT IN (SELECT ndno FROM notadebet)
		GROUP BY 
		vehicleupload.dono,
		STR_TO_DATE(vehicleupload.dodate,'%d%m%Y'),
		vehicleupload.ndno");
		if($SQL){
			echo json_encode("OK");
		}
		$con->query('set @rank = 0');
		$SQL = mysqli_query($con, "UPDATE vehiclestock A INNER JOIN 
				(
		SELECT CONCAT(LEFT(dono,6), '-',@rank:=@rank+1) AS rank, idvehicle, COUNT(*) as ordercount
		  FROM vehiclestock
		  GROUP BY idvehicle
		  ORDER BY idvehicle DESC) U SET A.nik=U.rank WHERE A.idvehicle=U.idvehicle AND A.spkno IS NULL OR A.spkno=''");
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

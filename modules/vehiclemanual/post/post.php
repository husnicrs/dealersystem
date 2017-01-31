<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['type']) {
	case "get":
		$SQL = mysqli_query($con, "SELECT
					vehiclestock.idvehicle AS idkey,
					vehiclestock.dono,
					DATE_FORMAT(
						vehiclestock.dodate,
						'%d/%m/%Y'
					) AS dodate,
					vehiclestock.vehicletype,
					vehiclestock.vehiclecolor,
					vehiclestock.mechineno,
					vehiclestock.year,
					vehiclestock.rangkano
				FROM
					vehiclestock
				WHERE
					vehiclestock.idvehicle='".$_POST['idkey']."'");
		$return = mysqli_fetch_array($SQL,MYSQLI_ASSOC);
		echo json_encode($return);
		break;
	case "new":
		$dodate1 = $_POST['dodate']; 
		$date = str_replace('/', '-', $dodate1);
		$dodate = date('Y-m-d', strtotime($date));
		
		$SQL = mysqli_query($con, 
		"INSERT INTO vehiclestock SET dono='".$_POST['dono']."', dodate='".$dodate."', vehiclecolor='".$_POST['vehiclecolor']."', vehicletype='".$_POST['vehicletype']."',
		mechineno='".$_POST['mechineno']."', rangkano='".$_POST['rangkano']."', year='".$_POST['year']."', manual=1, status='".$_POST['status']."'");
		if($SQL){
			echo json_encode("OK");
		}
		break;
	case "edit":
		$dodate1 = $_POST['dodate']; 
		$date = str_replace('/', '-', $dodate1);
		$dodate = date('Y-m-d', strtotime($date));
		
		$SQL = mysqli_query($con, 
		"UPDATE vehiclestock SET dono='".$_POST['dono']."', dodate='".$dodate."', vehiclecolor='".$_POST['vehiclecolor']."', vehicletype='".$_POST['vehicletype']."',
		mechineno='".$_POST['mechineno']."', rangkano='".$_POST['rangkano']."', year='".$_POST['year']."' WHERE idvehicle='".$_POST['idkey']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;		
		
	case "delete":
		$SQL = mysqli_query($con, "DELETE FROM vehiclestock WHERE idvehicle='".$_POST['idkey']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
} 
?>

<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['type']) {
	case "get":
		$SQL = mysqli_query($con, "SELECT
				districts.iddistricts,
				districts.districtsname,
				city.cityname,
				districts.cityid
				FROM
				city
				RIGHT JOIN districts ON city.idcity = districts.cityid
				WHERE districts.iddistricts='".$_POST['iddistricts']."'");
		$return = mysqli_fetch_array($SQL,MYSQLI_ASSOC);
		echo json_encode($return);
		break;
	case "new":
		$SQL = mysqli_query($con, 
		"INSERT INTO districts SET districtsname='".$_POST['districtsname']."', cityid='".$_POST['cityid']."'");
		if($SQL){
			echo json_encode("OK");
		}
		break;
	case "edit":
		$SQL = mysqli_query($con, 
		"UPDATE districts SET districtsname='".$_POST['districtsname']."', cityid='".$_POST['cityid']."' WHERE iddistricts='".$_POST['iddistricts']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
	case "delete":
		$SQL = mysqli_query($con, "DELETE FROM districts WHERE iddistricts='".$_POST['iddistricts']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
} 
?>

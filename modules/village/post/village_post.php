<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['type']) {
	case "get":
		$SQL = mysqli_query($con, "SELECT
				village.idvillage,
				village.villagename,
				districts.districtsname,
				village.districtsid,
				village.postcode
				FROM
				districts
				RIGHT JOIN village ON districts.iddistricts = village.districtsid
				WHERE village.idvillage='".$_POST['idvillage']."'");
		$return = mysqli_fetch_array($SQL,MYSQLI_ASSOC);
		echo json_encode($return);
		break;
	case "new":
		$SQL = mysqli_query($con, 
		"INSERT INTO village SET villagename='".$_POST['villagename']."', districtsid='".$_POST['districtsid']."', postcode='".$_POST['postcode']."'");
		if($SQL){
			echo json_encode("OK");
		}
		break;
	case "edit":
		$SQL = mysqli_query($con, 
		"UPDATE village SET villagename='".$_POST['villagename']."', districtsid='".$_POST['districtsid']."', postcode='".$_POST['postcode']."' WHERE idvillage='".$_POST['idvillage']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
	case "delete":
		$SQL = mysqli_query($con, "DELETE FROM village WHERE idvillage='".$_POST['idvillage']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
} 
?>

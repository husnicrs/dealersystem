<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['type']) {
	case "get":
		$SQL = mysqli_query($con, "SELECT
				country.idcountry AS idkey,
				country.countryname,
				country.countrycode,
				country.status
				FROM
				country
				WHERE country.idcountry='".$_POST['idkey']."'");
		$return = mysqli_fetch_array($SQL,MYSQLI_ASSOC);
		echo json_encode($return);
		break;	
		
	case "new":
		$SQL = mysqli_query($con, 
		"INSERT INTO country SET countryname='".$_POST['countryname']."', countrycode='".$_POST['countrycode']."', status='".$_POST['status']."'");
		if($SQL){
			echo json_encode("OK");
		}
		break;
	case "edit":
		$SQL = mysqli_query($con, 
		"UPDATE country SET countryname='".$_POST['countryname']."', countrycode='".$_POST['countrycode']."', status='".$_POST['status']."' WHERE idcountry='".$_POST['idkey']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
	case "delete":
		$SQL = mysqli_query($con, "DELETE FROM country WHERE idcountry='".$_POST['idkey']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
} 
?>

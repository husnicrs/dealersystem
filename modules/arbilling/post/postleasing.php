<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['typeleasing']) {
	case "get":
		$SQL = mysqli_query($con, "SELECT
				leasing.idleasing AS idkeyleasing,
				leasing.leasingname,
				leasing.companyname,
				leasing.address AS addressls,
				leasing.payment AS paymentls,
				leasing.dppo AS dppols,
				leasing.otr AS otrls,
				leasing.subleasing AS subleasingls,
				leasing.scheme,
				leasing.accessories,
				leasing.`status`
				FROM
				leasing
				WHERE leasing.idleasing='".$_POST['idkeyleasing']."'");
		$return = mysqli_fetch_array($SQL,MYSQLI_ASSOC);
		echo json_encode($return);
		break;
		
		case "edit":
		$SQL = mysqli_query($con, 
		"UPDATE leasing SET companyname='".$_POST['companyname']."', address='".$_POST['address']."', payment='".$_POST['payment']."', dppo='".$_POST['dppo']."',
		otr='".$_POST['otrls']."', subleasing='".$_POST['subleasingls']."', scheme='".$_POST['schemels']."', accessories='".$_POST['accessoriesls']."' WHERE idleasing='".$_POST['idkeyleasing']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
	
} 
?>

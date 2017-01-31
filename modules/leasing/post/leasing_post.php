<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['type']) {
	case "get":
		$SQL = mysqli_query($con, "SELECT
				leasing.idleasing AS idkey,
				leasing.leasingname,
				leasing.companyname,
				leasing.address,
				leasing.payment,
				leasing.dppo,
				leasing.otr,
				leasing.subleasing,
				leasing.scheme,
				leasing.accessories,
				leasing.spformat,
				leasing.`status`,
				leasing.paymentformat,
				leasing.dppoformat,
				leasing.otrformat,
				leasing.subleasingformat,
				leasing.schemeformat,
				leasing.accessoriesformat
				FROM
				leasing
				WHERE leasing.idleasing='".$_POST['idkey']."'");
		$return = mysqli_fetch_array($SQL,MYSQLI_ASSOC);
		echo json_encode($return);
		break;
	case "new":
		$SQL = mysqli_query($con, 
		"INSERT INTO leasing SET leasingname='".$_POST['leasingname']."', companyname='".$_POST['companyname']."', address='".$_POST['address']."', payment='".$_POST['payment']."', dppo='".$_POST['dppo']."',
		otr='".$_POST['otr']."', subleasing='".$_POST['subleasing']."', scheme='".$_POST['scheme']."', accessories='".$_POST['accessories']."', spformat='".$_POST['spformat']."', paymentformat='".$_POST['paymentformat']."',
		dppoformat='".$_POST['dppoformat']."', otrformat='".$_POST['otrformat']."', subleasingformat='".$_POST['subleasingformat']."', schemeformat='".$_POST['schemeformat']."', accessoriesformat='".$_POST['accessoriesformat']."'");
		if($SQL){
			echo json_encode("OK");
		}
		break;
	case "edit":
		$SQL = mysqli_query($con, 
		"UPDATE leasing SET leasingname='".$_POST['leasingname']."', companyname='".$_POST['companyname']."', address='".$_POST['address']."', payment='".$_POST['payment']."', dppo='".$_POST['dppo']."',
		otr='".$_POST['otr']."', subleasing='".$_POST['subleasing']."', scheme='".$_POST['scheme']."', accessories='".$_POST['accessories']."', spformat='".$_POST['spformat']."', paymentformat='".$_POST['paymentformat']."',
		dppoformat='".$_POST['dppoformat']."', otrformat='".$_POST['otrformat']."', subleasingformat='".$_POST['subleasingformat']."', schemeformat='".$_POST['schemeformat']."', accessoriesformat='".$_POST['accessoriesformat']."' WHERE idleasing='".$_POST['idkey']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
	case "delete":
		$SQL = mysqli_query($con, "DELETE FROM leasing WHERE idleasing='".$_POST['idkey']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
} 
?>

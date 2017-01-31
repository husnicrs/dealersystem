<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['type']) {
	case "get":
		$SQL = mysqli_query($con, "SELECT
				slip.idslip,
				slip.slipname,
				slip.module,
				slip.subnavmenuid,
				slip.sequencenumber,
				subnavmenu.subnavmenuname
				FROM
				slip
				INNER JOIN subnavmenu ON slip.subnavmenuid = subnavmenu.idsubnavmenu
				WHERE slip.idslip='".$_POST['idslip']."'");
		$return = mysqli_fetch_array($SQL,MYSQLI_ASSOC);
		echo json_encode($return);
		break;
	case "new":
		$SQL = mysqli_query($con, 
		"INSERT INTO slip SET slipname='".$_POST['slipname']."', module='".$_POST['module']."', sequencenumber='".$_POST['sequencenumber']."', subnavmenuid='".$_POST['subnavmenuid']."'");
		if($SQL){
			echo json_encode("OK");
		}
		break;
	case "edit":
		$SQL = mysqli_query($con, 
		"UPDATE slip SET slipname='".$_POST['slipname']."', module='".$_POST['module']."', sequencenumber='".$_POST['sequencenumber']."', subnavmenuid='".$_POST['subnavmenuid']."' WHERE idslip='".$_POST['idslip']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
	case "delete":
		$SQL = mysqli_query($con, "DELETE FROM slip WHERE idslip='".$_POST['idslip']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
} 
?>

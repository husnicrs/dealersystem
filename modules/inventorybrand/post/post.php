<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['type']) {
	case "get":
		$SQL = mysqli_query($con, "SELECT
				inventorybrand.idinventorybrand AS idkey,
				inventorybrand.inventorybrandname,
				inventorybrand.status
				FROM
				inventorybrand
				WHERE inventorybrand.idinventorybrand='".$_POST['idkey']."'");
		$return = mysqli_fetch_array($SQL,MYSQLI_ASSOC);
		echo json_encode($return);
		break;
	case "new":
		$SQL = mysqli_query($con, 
		"INSERT INTO inventorybrand SET inventorybrandname='".$_POST['inventorybrandname']."', status='".$_POST['status']."'");
		if($SQL){
			echo json_encode("OK");
		}
		break;
	case "edit":
		$SQL = mysqli_query($con, 
		"UPDATE inventorybrand SET inventorybrandname='".$_POST['inventorybrandname']."', status='".$_POST['status']."' WHERE idinventorybrand='".$_POST['idkey']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;		
		
	case "delete":
		$SQL = mysqli_query($con, "DELETE FROM inventorybrand WHERE idinventorybrand='".$_POST['idkey']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
} 
?>

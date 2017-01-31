<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['type']) {
	case "get":
		$SQL = mysqli_query($con, "SELECT
				inventorytype.idinventorytype AS idkey,
				inventorytype.inventorytypename,
				inventorytype.status
				FROM
				inventorytype
				WHERE inventorytype.idinventorytype='".$_POST['idkey']."'");
		$return = mysqli_fetch_array($SQL,MYSQLI_ASSOC);
		echo json_encode($return);
		break;
	case "new":
		$SQL = mysqli_query($con, 
		"INSERT INTO inventorytype SET inventorytypename='".$_POST['inventorytypename']."', status='".$_POST['status']."'");
		if($SQL){
			echo json_encode("OK");
		}
		break;
	case "edit":
		$SQL = mysqli_query($con, 
		"UPDATE inventorytype SET inventorytypename='".$_POST['inventorytypename']."', status='".$_POST['status']."' WHERE idinventorytype='".$_POST['idkey']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;		
		
	case "delete":
		$SQL = mysqli_query($con, "DELETE FROM inventorytype WHERE idinventorytype='".$_POST['idkey']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
} 
?>

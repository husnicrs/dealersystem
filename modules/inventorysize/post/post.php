<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['type']) {
	case "get":
		$SQL = mysqli_query($con, "SELECT
				inventorysize.idinventorysize AS idkey,
				inventorysize.inventorysizename,
				inventorysize.status
				FROM
				inventorysize
				WHERE inventorysize.idinventorysize='".$_POST['idkey']."'");
		$return = mysqli_fetch_array($SQL,MYSQLI_ASSOC);
		echo json_encode($return);
		break;
	case "new":
		$SQL = mysqli_query($con, 
		"INSERT INTO inventorysize SET inventorysizename='".$_POST['inventorysizename']."', status='".$_POST['status']."'");
		if($SQL){
			echo json_encode("OK");
		}
		break;
	case "edit":
		$SQL = mysqli_query($con, 
		"UPDATE inventorysize SET inventorysizename='".$_POST['inventorysizename']."', status='".$_POST['status']."' WHERE idinventorysize='".$_POST['idkey']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;		
		
	case "delete":
		$SQL = mysqli_query($con, "DELETE FROM inventorysize WHERE idinventorysize='".$_POST['idkey']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
} 
?>

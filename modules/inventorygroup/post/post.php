<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['type']) {
	case "get":
		$SQL = mysqli_query($con, "SELECT
				inventorygroup.idinventorygroup AS idkey,
				inventorygroup.inventorygroupname,
				inventorygroup.status
				FROM
				inventorygroup
				WHERE inventorygroup.idinventorygroup='".$_POST['idkey']."'");
		$return = mysqli_fetch_array($SQL,MYSQLI_ASSOC);
		echo json_encode($return);
		break;	
		
	case "new":
		$SQL = mysqli_query($con, 
		"INSERT INTO inventorygroup SET inventorygroupname='".$_POST['inventorygroupname']."', status='".$_POST['status']."'");
		if($SQL){
			echo json_encode("OK");
		}
		break;
	case "edit":
		$SQL = mysqli_query($con, 
		"UPDATE inventorygroup SET inventorygroupname='".$_POST['inventorygroupname']."', status='".$_POST['status']."' WHERE idinventorygroup='".$_POST['idkey']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
	case "delete":
		$SQL = mysqli_query($con, "DELETE FROM inventorygroup WHERE idinventorygroup='".$_POST['idkey']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
} 
?>

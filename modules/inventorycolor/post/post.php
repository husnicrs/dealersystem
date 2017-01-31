<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['type']) {
	case "get":
		$SQL = mysqli_query($con, "SELECT
				inventorycolor.idinventorycolor AS idkey,
				inventorycolor.inventorycolorname,
				inventorycolor.status
				FROM
				inventorycolor
				WHERE inventorycolor.idinventorycolor='".$_POST['idkey']."'");
		$return = mysqli_fetch_array($SQL,MYSQLI_ASSOC);
		echo json_encode($return);
		break;
	case "new":
		$SQL = mysqli_query($con, 
		"INSERT INTO inventorycolor SET inventorycolorname='".$_POST['inventorycolorname']."', status='".$_POST['status']."'");
		if($SQL){
			echo json_encode("OK");
		}
		break;
	case "edit":
		$SQL = mysqli_query($con, 
		"UPDATE inventorycolor SET inventorycolorname='".$_POST['inventorycolorname']."', status='".$_POST['status']."' WHERE idinventorycolor='".$_POST['idkey']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;		
		
	case "delete":
		$SQL = mysqli_query($con, "DELETE FROM inventorycolor WHERE idinventorycolor='".$_POST['idkey']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
} 
?>

<?php
include_once 'Database.php';
switch ($_POST['type']) {
	case "get":
		$SQL = mysqli_query($con, "SELECT * FROM usertype WHERE idusertype='".$_POST['idusertype']."'");
		$return = mysqli_fetch_array($SQL,MYSQLI_ASSOC);
		echo json_encode($return);
		break;
	case "new":
		$SQL = mysqli_query($con, 
		"INSERT INTO usertype SET usertypename='".$_POST['usertypename']."'");
		if($SQL){
			echo json_encode("OK");
		}
		break;
	case "edit":
		$SQL = mysqli_query($con, 
		"UPDATE usertype SET usertypename='".$_POST['usertypename']."' WHERE idusertype='".$_POST['idusertype']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
	case "delete":
		$SQL = mysqli_query($con, "DELETE FROM usertype WHERE idusertype='".$_POST['idusertype']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
} 
?>

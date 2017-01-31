<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['type']) {
	case "get":
		$SQL = mysqli_query($con, "SELECT
				accountlvl1.idaccountlvl1 AS idkey,
				accountlvl1.accountlvl1name
				FROM
				accountlvl1
				WHERE accountlvl1.idaccountlvl1='".$_POST['idkey']."'");
		$return = mysqli_fetch_array($SQL,MYSQLI_ASSOC);
		echo json_encode($return);
		break;
	case "new":
		$SQL = mysqli_query($con, 
		"INSERT INTO accountlvl1 SET accountlvl1name='".$_POST['accountlvl1name']."', status='".$_POST['status']."'");
		if($SQL){
			echo json_encode("OK");
		}
		break;
	case "edit":
		$SQL = mysqli_query($con, 
		"UPDATE accountlvl1 SET accountlvl1name='".$_POST['accountlvl1name']."', status='".$_POST['status']."' WHERE idaccountlvl1='".$_POST['idkey']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
	case "delete":
		$SQL = mysqli_query($con, "DELETE FROM accountlvl1 WHERE idaccountlvl1='".$_POST['idkey']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
} 
?>

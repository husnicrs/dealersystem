<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['type']) {
	case "get":
		$SQL = mysqli_query($con, "SELECT
				bank.idbank AS idkey,
				bank.bankname,
				bank.bankaccount,
				bank.banknumber,
				bank.branch
				FROM
				bank
				WHERE bank.idbank='".$_POST['idkey']."'");
		$return = mysqli_fetch_array($SQL,MYSQLI_ASSOC);
		echo json_encode($return);
		break;
	case "new":
		$SQL = mysqli_query($con, 
		"INSERT INTO bank SET bankname='".$_POST['bankname']."', bankaccount='".$_POST['bankaccount']."', banknumber='".$_POST['banknumber']."', branch='".$_POST['branch']."', status='".$_POST['status']."'");
		if($SQL){
			echo json_encode("OK");
		}
		break;
	case "edit":
		$SQL = mysqli_query($con, 
		"UPDATE bank SET bankname='".$_POST['bankname']."', bankaccount='".$_POST['bankaccount']."', banknumber='".$_POST['banknumber']."', branch='".$_POST['branch']."', status='".$_POST['status']."' WHERE idbank='".$_POST['idkey']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
	case "delete":
		$SQL = mysqli_query($con, "DELETE FROM bank WHERE idbank='".$_POST['idkey']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
} 
?>

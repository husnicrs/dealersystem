<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['type']) {
	case "get":
		$SQL = mysqli_query($con, "SELECT
				account.idaccount AS idkey,
				account.accountname,
				account.accountcode,
				account.accountlvl1id,
				account.status
				FROM
				account
				WHERE account.idaccount='".$_POST['idkey']."'");
		$return = mysqli_fetch_array($SQL,MYSQLI_ASSOC);
		echo json_encode($return);
		break;
	case "new":
		$SQL = mysqli_query($con, 
		"INSERT INTO account SET accountcode='".$_POST['accountcode']."', accountname='".$_POST['accountname']."', accountlvl1id='".$_POST['accountlvl1id']."', status='".$_POST['status']."'");
		if($SQL){
			echo json_encode("OK");
		}
		break;
	case "edit":
		$SQL = mysqli_query($con, 
		"UPDATE account SET accountcode='".$_POST['accountcode']."', accountname='".$_POST['accountname']."', accountlvl1id='".$_POST['accountlvl1id']."', status='".$_POST['status']."' WHERE idaccount='".$_POST['idkey']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;		
		
	case "delete":
		$SQL = mysqli_query($con, "DELETE FROM account WHERE idaccount='".$_POST['idkey']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
} 
?>

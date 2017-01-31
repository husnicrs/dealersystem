<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['type']) {
	case "get":
		$SQL = mysqli_query($con, "SELECT
				samsat.idsamsat AS idkey,
				samsat.samsatname,
				samsat.status
				FROM
				samsat
				WHERE samsat.idsamsat='".$_POST['idkey']."'");
		$return = mysqli_fetch_array($SQL,MYSQLI_ASSOC);
		echo json_encode($return);
		break;	
		
	case "new":
		$SQL = mysqli_query($con, 
		"INSERT INTO samsat SET samsatname='".$_POST['samsatname']."', status='".$_POST['status']."'");
		if($SQL){
			echo json_encode("OK");
		}
		break;
	case "edit":
		$SQL = mysqli_query($con, 
		"UPDATE samsat SET samsatname='".$_POST['samsatname']."', status='".$_POST['status']."' WHERE idsamsat='".$_POST['idkey']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
	case "delete":
		$SQL = mysqli_query($con, "DELETE FROM samsat WHERE idsamsat='".$_POST['idkey']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
} 
?>

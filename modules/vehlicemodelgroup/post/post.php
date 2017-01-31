<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['type']) {
	case "get":
		$SQL = mysqli_query($con, "SELECT
				vehlicemodelgroup.idvehlicemodelgroup AS idkey,
				vehlicemodelgroup.vehlicemodelgroupname,
				vehlicemodelgroup.status
				FROM
				vehlicemodelgroup
				WHERE vehlicemodelgroup.idvehlicemodelgroup='".$_POST['idkey']."'");
		$return = mysqli_fetch_array($SQL,MYSQLI_ASSOC);
		echo json_encode($return);
		break;	
		
	case "new":
		$SQL = mysqli_query($con, 
		"INSERT INTO vehlicemodelgroup SET vehlicemodelgroupname='".$_POST['vehlicemodelgroupname']."', status='".$_POST['status']."'");
		if($SQL){
			echo json_encode("OK");
		}
		break;
	case "edit":
		$SQL = mysqli_query($con, 
		"UPDATE vehlicemodelgroup SET vehlicemodelgroupname='".$_POST['vehlicemodelgroupname']."', status='".$_POST['status']."' WHERE idvehlicemodelgroup='".$_POST['idkey']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
	case "delete":
		$SQL = mysqli_query($con, "DELETE FROM vehlicemodelgroup WHERE idvehlicemodelgroup='".$_POST['idkey']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
} 
?>

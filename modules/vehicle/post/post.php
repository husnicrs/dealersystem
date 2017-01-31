<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['type']) {
	case "get":
		$SQL = mysqli_query($con, "SELECT
				vehicle.idvehicle AS idkey,
				vehicle.vehlicetype,
				vehicle.vehlicemodel,
				vehicle.vehlicejenis,
				vehicle.cc,
				vehicle.otr,
				vehicle.`status`
				FROM
				vehicle
				WHERE vehicle.idvehicle='".$_POST['idkey']."'");
		$return = mysqli_fetch_array($SQL,MYSQLI_ASSOC);
		echo json_encode($return);
		break;	
		
	case "new":
		$SQL = mysqli_query($con, 
		"INSERT INTO vehicle SET vehlicetype='".$_POST['vehlicetype']."', 
		vehlicemodel='".$_POST['vehlicemodel']."',  
		vehlicejenis='".$_POST['vehlicejenis']."', cc='".$_POST['cc']."', otr='".$_POST['otr']."', status='".$_POST['status']."'");
		if($SQL){
			echo json_encode("OK");
		}
		break;
	case "edit":
		$SQL = mysqli_query($con, 
		"UPDATE vehicle SET  vehlicetype='".$_POST['vehlicetype']."', 
		vehlicemodel='".$_POST['vehlicemodel']."',  
		vehlicejenis='".$_POST['vehlicejenis']."', cc='".$_POST['cc']."', otr='".$_POST['otr']."', status='".$_POST['status']."' WHERE idvehicle='".$_POST['idkey']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
	case "delete":
		$SQL = mysqli_query($con, "DELETE FROM vehicle WHERE idvehicle='".$_POST['idkey']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
} 
?>

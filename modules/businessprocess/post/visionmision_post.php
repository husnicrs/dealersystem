<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['type']) {
	case "get":
		$SQL = mysqli_query($con, "SELECT
				visionmision.idvisionmision,
				visionmision.task,
				visionmision.`function`,
				LEFT(visionmision.vision,50) AS vision,
				LEFT(visionmision.mision,50) AS mision,
				visionmision.policy
				FROM
				visionmision
				WHERE visionmision.idvisionmision='".$_POST['idvisionmision']."'");
		$return = mysqli_fetch_array($SQL,MYSQLI_ASSOC);
		echo json_encode($return);
		break;
	case "new":
		$SQL = mysqli_query($con, 
		"INSERT INTO visionmision SET task='".$_POST['task']."', function='".$_POST['function']."', vision='".$_POST['vision']."', mision='".$_POST['mision']."', policy='".$_POST['policy']."'");
		if($SQL){
			echo json_encode("OK");
		}
		break;
	case "edit":
		$SQL = mysqli_query($con, 
		"UPDATE visionmision SET task='".$_POST['task']."', function='".$_POST['function']."', vision='".$_POST['vision']."', mision='".$_POST['mision']."', policy='".$_POST['policy']."' WHERE idvisionmision='".$_POST['idvisionmision']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
	case "delete":
		$SQL = mysqli_query($con, "DELETE FROM visionmision WHERE idvisionmision='".$_POST['idvisionmision']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
} 
?>

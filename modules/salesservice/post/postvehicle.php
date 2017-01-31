<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['type']) {
	case "get":
		$SQL = mysqli_query($con, "SELECT
				vehicle.vehlicetype AS idkey,
				vehicle.vehlicetype AS vahicletype,
				vehicle.vehlicemodel AS vehiclemodel,
				vehicle.vehlicejenis AS vahiclejenis,
				vehicle.cc,
				FORMAT(vehicle.otr,0) AS otr,
				vehicle.`status`
				FROM
				vehicle
				WHERE vehicle.vehlicetype='".$_POST['idkey']."'");
		$return = mysqli_fetch_array($SQL,MYSQLI_ASSOC);
		echo json_encode($return);
		break;
	
} 
?>

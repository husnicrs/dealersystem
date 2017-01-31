<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['typedelete']) {
	case "get":
		$SQL = mysqli_query($con, "SELECT
				userlocauthorized.locationid,
				location.locationname,
				userlocauthorized.userid,
				userlocauthorized.iduserautorized
				FROM
				userlocauthorized
				INNER JOIN location ON userlocauthorized.locationid = location.idlocation
				WHERE userlocauthorized.iduserautorized='".$_POST['iduserautorized']."'");
		$return = mysqli_fetch_array($SQL,MYSQLI_ASSOC);
		echo json_encode($return);
		break;
	case "delete":
		$SQL = mysqli_query($con, "DELETE FROM userlocauthorized WHERE iduserautorized='".$_POST['iduserautorizeddelete']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
} 
?>

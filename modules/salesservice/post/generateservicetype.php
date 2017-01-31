<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['type']) {
	case "generate":
	
		/*INSERT NEW DATA*/
		$SQL = mysqli_query($con, "UPDATE salesservice SET vehiclemodel='".$_POST['vehiclemodel']."' WHERE
				salesservice.idtrans='".$_POST['transid']."' ");
		if($SQL){
			echo json_encode("OK");
		}
		break;

} 
?>

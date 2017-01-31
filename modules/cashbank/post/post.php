<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['typesave']) {
	case "generate":
		$vardatetime = $_POST['datetrans']; 
		$date = str_replace('/', '-', $vardatetime);
		$datetrans = date('Y-m-d', strtotime($date));
	
		$SQL = mysqli_query($con, "UPDATE cashbank SET datetrans='".$datetrans."', cusname='".$_POST['cusname']."', address='".$_POST['address']."', unit='".$_POST['unit']."',
nofaktur='".$_POST['nofaktur']."', soid='".$_POST['soid']."'  WHERE idtrans='".$_POST['idtrans']."'");
		if($SQL){
			echo json_encode("OK");
		}
		
		$SQL = mysqli_query($con, "UPDATE salesvehicle SET dpjurnal=1  WHERE idtrans='".$_POST['soid']."'");
		if($SQL){
			echo json_encode("OK");
		}
		break;

} 



?>

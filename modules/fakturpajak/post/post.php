<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['type']) {
	case "generate":
		$vardatetime = $_POST['datetrans']; 
		$date = str_replace('/', '-', $vardatetime);
		$datetrans = date('Y-m-d', strtotime($date));
	
		$SQL = mysqli_query($con, "UPDATE fakturpajak SET datetrans='".$datetrans."', nourut='".$_POST['nourut']."', 
		vehiclemodel='".$_POST['vehiclemodel']."', vehicletype='".$_POST['vehicletype']."', rangkano='".$_POST['rangkano']."', mechineno='".$_POST['mechineno']."', kuantum='".$_POST['kuantum']."', hargajual='".$_POST['hargajual']."', dpp='".$_POST['dpp']."', ppn='".$_POST['ppn']."', jumlahdpp='".$_POST['jumlahdpp']."', remark='".$_POST['remark']."' WHERE idtrans='".$_POST['idtrans']."'");
		if($SQL){
			echo json_encode("OK");
		}
		break;

} 
?>


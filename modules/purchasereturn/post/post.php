<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['type']) {
	case "generate":
		$vardatetime = $_POST['datetrans']; 
		$date = str_replace('/', '-', $vardatetime);
		$datetrans = date('Y-m-d', strtotime($date));
	
		$SQL = mysqli_query($con, "UPDATE purchasereturn SET datetrans='".$datetrans."', supplierid='".$_POST['supplierid']."', 
		paytypeid='".$_POST['paytypeid']."', remark='".$_POST['remark']."' WHERE idtrans='".$_POST['idtrans']."'");
		if($SQL){
			echo json_encode("OK");
		}
		break;

} 
?>


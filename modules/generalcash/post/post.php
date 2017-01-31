<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['typesave']) {
	case "generate":
		$vardatetime = $_POST['datetrans']; 
		$date = str_replace('/', '-', $vardatetime);
		$datetrans = date('Y-m-d', strtotime($date));
	
		$SQL = mysqli_query($con, "UPDATE generalcash SET datetrans='".$datetrans."',  remark='".$_POST['remark']."'  WHERE idtrans='".$_POST['idtrans']."'");
		if($SQL){
			echo json_encode("OK");
		}
		break;

} 



?>

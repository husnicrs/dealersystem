<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['type']) {
	case "generate":
	
		$userid = $_POST['userid']; 
		$rptdatefrom = $_POST['rptdatefrom']; 
		$date = str_replace('/', '-', $rptdatefrom);
		$rptdatefrom = date('Y-m-d', strtotime($date));
		
		$rptdateto = $_POST['rptdateto']; 
		$date = str_replace('/', '-', $rptdateto);
		$rptdateto = date('Y-m-d', strtotime($date));
		
		$SQL = mysqli_query($con, "UPDATE users SET begindate = '$rptdatefrom', enddate = '$rptdateto' WHERE username='".$_POST['userid']."'");
		if($SQL){
			echo json_encode("OK");
		}
		break;
} 
?>

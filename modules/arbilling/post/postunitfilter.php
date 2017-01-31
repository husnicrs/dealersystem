<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['typefilter']) {
	case "generate":
	
		$varbilldatefilter = $_POST['billdatefilter']; 
		$date2 = str_replace('/', '-', $varbilldatefilter);
		$billdatefilter = date('Y-m-d', strtotime($date2));
		
		$SQL = mysqli_query($con, "UPDATE users SET leasingfilter = '".$_POST['leasingfilter']."', billfilter = '".$_POST['billfilter']."', billdatefilter = '".$billdatefilter."' WHERE username='".$_POST['username']."'");
		if($SQL){
			echo json_encode("OK");
		}
		break;

} 
?>



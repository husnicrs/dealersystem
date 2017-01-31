<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['typefilter']) {
	case "generate":
	
		
		$SQL = mysqli_query($con, "UPDATE users SET modelfilter = '".$_POST['vehiclemodelfilter']."' WHERE username='".$_POST['username']."'");
		if($SQL){
			echo json_encode("OK");
		}
		break;

} 
?>



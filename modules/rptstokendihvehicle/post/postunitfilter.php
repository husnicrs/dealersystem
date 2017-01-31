<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['typefilter1']) {
	case "generate":
	
		
		$SQL = mysqli_query($con, "UPDATE users SET typefilter = '".$_POST['typefilter']."', channelfilter = '".$_POST['channelfilter']."' WHERE username='".$_POST['username']."'");
		if($SQL){
			echo json_encode("OK");
		}
		break;

} 
?>



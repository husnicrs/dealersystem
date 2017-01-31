<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['typerefresh']) {
	case "generate":
		
		$vararbillingdate = $_POST['arbillingdate']; 
		$date2 = str_replace('/', '-', $vararbillingdate);
		$arbillingdate = date('Y-m-d', strtotime($date2));
		
		$varpodate = $_POST['podate']; 
		$date2 = str_replace('/', '-', $varpodate);
		$podate = date('Y-m-d', strtotime($date2));
		
		$SQL = mysqli_query($con, "UPDATE users SET soid = '".$_POST['soid']."', spformat = '".$_POST['spformat']."' WHERE username='".$_POST['userid']."'");
		if($SQL){
			echo json_encode("OK");
		}
		
		$SQL = mysqli_query($con, "UPDATE salesvehicle SET arbillingdate = '".$arbillingdate."', paymentformat = '".$_POST['paymentformat']."',
		dppoformat = '".$_POST['dppoformat']."', otrformat = '".$_POST['otrformat']."', subleasingformat = '".$_POST['subleasingformat']."',
		schemeformat = '".$_POST['schemeformat']."', accessoriesformat = '".$_POST['accessoriesformat']."', 
		creditnettdp = '".$_POST['creditnettdp']."', subleasing = '".$_POST['subleasing']."', brutoamount = '".$_POST['brutoamount']."',
		otr = '".$_POST['otr']."', scheme = '".$_POST['scheme']."', accessories = '".$_POST['accessories']."', pono = '".$_POST['pono']."', podate = '".$podate."', arstatus=1 WHERE idtrans='".$_POST['soid']."'");
		if($SQL){
			echo json_encode("OK");
		}
		break;
} 
?>

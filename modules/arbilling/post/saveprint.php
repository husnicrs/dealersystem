<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['typefilter']) {
	case "generate":
		
		$vardatetime2 = $_POST['deliverydate']; 
		$date2 = str_replace('/', '-', $vardatetime2);
		$deliverydate = date('Y-m-d', strtotime($date2));
	
		$SQL = mysqli_query($con, "UPDATE salesvehicle SET paytypeid='".$_POST['paytypeid']."', tunaiscpmd='".$_POST['tunaiscpmd']."', tunaiscpdaeler='".$_POST['tunaiscpdaeler']."', 
		tunaidscmarketing='".$_POST['tunaidscmarketing']."', tunaidsckonsumen='".$_POST['tunaidsckonsumen']."', tunainettbayar='".$_POST['tunainettbayar']."', 
		credittype='".$_POST['credittype']."', leasing='".$_POST['leasing']."', subleasing='".$_POST['subleasing']."', creditscmd='".$_POST['creditscmd']."', 
		creditscpdealer='".$_POST['creditscpdealer']."', creditsubsidi='".$_POST['creditsubsidi']."', creditgrossdp='".$_POST['creditgrossdp']."', 
		creditdiscmarketing='".$_POST['creditdiscmarketing']."', creditdisckonsumen='".$_POST['creditdisckonsumen']."', 
		creditnettdp='".$_POST['creditnettdp']."', credittenor='".$_POST['credittenor']."', creditcicilan='".$_POST['creditcicilan']."', 
		creditcostadm='".$_POST['creditcostadm']."', salesmanid='".$_POST['salesmanid']."', sjno='".$_POST['sjno']."', status=1 WHERE idtrans='".$_POST['idtrans']."'");
		if($SQL){
			echo json_encode("OK");
		}
		
		$SQL = mysqli_query($con, "UPDATE salesvehicle A
				INNER JOIN (
					SELECT
						leasing.paymentformat,
						leasing.dppoformat,
						leasing.otrformat,
						leasing.subleasingformat,
						leasing.schemeformat,
						leasing.accessoriesformat,
						leasing.leasingname
					FROM
						leasing
				) U
				SET A.paymentformat = U.paymentformat,
				 A.dppoformat = U.dppoformat,
				 A.otrformat = U.otrformat,
				 A.subleasingformat = U.subleasingformat,
				 A.schemeformat = U.schemeformat,
				 A.accessoriesformat = U.accessoriesformat
				WHERE
					A.leasing = U.leasingname AND A.idtrans='".$_POST['idtrans']."'");
		if($SQL){
			echo json_encode("OK");
		}
		
		
		
		
		
		break;

} 
?>


'
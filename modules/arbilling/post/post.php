<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['type']) {
	case "get":
		$SQL = mysqli_query($con, "SELECT
				salesvehicle.idtrans AS idkey,
				salesvehicle.codetrans,
				salesvehicle.notrans,
				DATE_FORMAT(salesvehicle.datetrans,'%d/%m/%Y') AS datetrans,
				DATE_FORMAT(salesvehicle.arbillingdate,'%d/%m/%Y') AS arbillingdate,
				paytype.paytypename,
				salesvehicle.cusname,
				salesvehicle.policeno,
				salesvehicle.vehiclemodel,
				salesvehicle.noktp,
				salesvehicle.dono,
				salesvehicle.spkno,
				salesvehicle.leasing,
				salesvehicle.vehicletype,
				salesvehicle.address,
				salesvehicle.paymentformat,
				salesvehicle.dppoformat,
				salesvehicle.otrformat,
				salesvehicle.subleasingformat,
				salesvehicle.schemeformat,
				salesvehicle.accessoriesformat,
				salesvehicle.pono,
				DATE_FORMAT(salesvehicle.podate,'%d/%m/%Y') AS podate,
				FORMAT(IFNULL(salesvehicle.creditnettdp,0),0) AS creditnettdpsw,
				FORMAT(IFNULL(salesvehicle.subleasing,0),0) AS subleasingsw,
				FORMAT(IFNULL(salesvehicle.otr,0),0) AS otrsw,
				FORMAT(IFNULL(salesvehicle.scheme,0),0) AS schemesw,
				FORMAT(IFNULL(salesvehicle.accessories,0),0) AS accessoriessw,
				FORMAT(IFNULL(salesvehicle.otr,0)-IFNULL(salesvehicle.creditnettdp,0),0) AS brutoamountsw,
				IFNULL(salesvehicle.brutoamount,0) AS brutoamount,
				IFNULL(salesvehicle.creditnettdp,0) AS creditnettdp,
				IFNULL(salesvehicle.subleasing,0) AS subleasing,
				IFNULL(salesvehicle.otr,0) AS otr,
				IFNULL(salesvehicle.scheme,0) AS scheme,
				IFNULL(salesvehicle.accessories,0) AS accessories,
				IFNULL(salesvehicle.otr,0)-IFNULL(salesvehicle.creditnettdp,0) AS brutoamount,
				leasing.spformat
				FROM
				salesvehicle
				LEFT JOIN paytype ON salesvehicle.paytypeid = paytype.idpaytype
				LEFT JOIN leasing ON salesvehicle.leasing = leasing.leasingname
				WHERE paytype.paytypename='Credit'
				AND salesvehicle.idtrans='".$_POST['idkey']."'");
		$return = mysqli_fetch_array($SQL,MYSQLI_ASSOC);
		echo json_encode($return);
		break;	
} 
?>

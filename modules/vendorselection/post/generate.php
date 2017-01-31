<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['type']) {
	case "generate":
		$SQL = mysqli_query($con, "INSERT INTO purchasebidding (transdetid,
																supplierid,
																currency,
																price,
																rate,
																disc,
																paydue,
																leadtime,
																minorder)
				SELECT
				'".$_POST['transdetid']."',
				purchasebidding.supplierid,
				purchasebidding.currency,
				purchasebidding.price,
				purchasebidding.rate,
				purchasebidding.disc,
				purchasebidding.paydue,
				purchasebidding.leadtime,
				purchasebidding.minorder
				FROM
				purchasebidding
				INNER JOIN purchasereqdet ON purchasebidding.transdetid = purchasereqdet.idtransdet
				WHERE purchasereqdet.inventoryid='".$_POST['inventoryid']."'
				AND  purchasebidding.supplierid NOT IN (SELECT
														purchasebidding.supplierid
														FROM
														purchasebidding WHERE purchasebidding.transdetid='".$_POST['transdetid']."')
				GROUP BY 
				purchasebidding.supplierid,
				purchasebidding.currency,
				purchasebidding.price,
				purchasebidding.rate,
				purchasebidding.disc,
				purchasebidding.paydue,
				purchasebidding.leadtime,
				purchasebidding.minorder");
		if($SQL){
			echo json_encode("OK");
		}
		break;

} 
?>

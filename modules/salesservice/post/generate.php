<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['type']) {
	case "generate":
	
		/*DELETE SAME BARCODE*/
		$SQL = mysqli_query($con, "DELETE FROM salesservicedet
											WHERE
												salesservicedet.barcode ='".$_POST['barcode']."' AND salesservicedet.transid='".$_POST['transid']."'");
		if($SQL){
			echo json_encode("OK");
		}

		/*INSERT NEW DATA*/
		$SQL = mysqli_query($con, "INSERT INTO salesservicedet (transid, inventoryid,unit,unitprice,quantity,amount, barcode)
				SELECT
				'".$_POST['transid']."',
				inventory.idinventory,
				inventory.salesunit,
				inventory.unitprice,
				'".$_POST['quantity']."',
				inventory.unitprice*'".$_POST['quantity']."',
				'".$_POST['barcode']."'
				FROM
				inventory
				WHERE inventory.barcode='".$_POST['barcode']."' AND inventory.barcode<>''");
		if($SQL){
			echo json_encode("OK");
		}
		break;

} 
?>

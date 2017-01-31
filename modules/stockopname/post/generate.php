<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['type']) {
	case "generate":
	
		/*INSERT ALL PRODUCT*/
		$SQL = mysqli_query($con, "INSERT INTO stockopnamedet (transid, inventoryid, unit)
									SELECT
									'".$_POST['transid']."',
									inventory.idinventory,
									inventory.stockunit
									FROM
									inventory
									WHERE
									inventory.idinventory NOT IN (SELECT inventoryid FROM stockopnamedet WHERE stockopnamedet.transid='".$_POST['transid']."')");
		if($SQL){
			echo json_encode("OK");
		}

		/*UPDATE QTY STOCK*/
		$SQL = mysqli_query($con, "UPDATE stockopnamedet AS A
									INNER JOIN (
									(SELECT inventoryid, SUM(qty) AS qty
									FROM
									(SELECT
									salesorderdet.inventoryid,
									-salesorderdet.quantity AS qty
									FROM
									salesorderdet
									
									UNION ALL
									
									SELECT
									salesorderdet.inventoryid,
									salesorderdet.quantity AS qty
									FROM
									salesorderdet
									INNER JOIN salesorder ON salesorder.idtrans = salesorderdet.transid
									WHERE salesorder.`status`=10
				
									UNION ALL
									
									SELECT
									salesservicedet.inventoryid,
									-salesservicedet.quantity AS qty
									FROM
									salesservicedet
									
									UNION ALL
									
									SELECT
									inventoryadjdet.inventoryid,
									inventoryadjdet.quantity AS qty
									FROM
									inventoryadjdet
									
									UNION ALL
									
									SELECT
									salesreturndet.inventoryid,
									salesreturndet.quantity AS qty
									FROM
									salesreturndet
									
									UNION ALL
									
									SELECT
									purchaseorderdet.inventoryid,
									purchaseorderdet.quantity AS qty
									FROM
									purchaseorderdet
									
									UNION ALL
									
									SELECT
									purchasereturndet.inventoryid,
									-purchasereturndet.quantity AS qty
									FROM
									purchasereturndet
									
									UNION ALL
									
									SELECT
									materialuseddet.inventoryid,
									-materialuseddet.quantity AS qty
									FROM
									materialuseddet
									
									UNION ALL
									
									SELECT
									stockopnamedet.inventoryid,
									stockopnamedet.adjqty AS qty
									FROM
									stockopnamedet) AS DERIVEDTBL GROUP BY inventoryid) AS U) SET A.stockqty=U.qty
									WHERE A.inventoryid=U.inventoryid AND A.transid='".$_POST['transid']."'");
		if($SQL){
			echo json_encode("OK");
		}

		break;

} 
?>

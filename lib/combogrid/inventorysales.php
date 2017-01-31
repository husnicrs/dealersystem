<?php
$q = isset($_POST['q']) ? strval($_POST['q']) : '';
include '../conn.php';
$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;

$offset = ($page-1)*$rows;

$result = array();

$rs = mysql_query("select count(*) from inventory");
$row = mysql_fetch_row($rs);
$result["total"] = $row[0];

$rs = mysql_query("SELECT inventory.idinventory, inventory.inventorycode, inventory.inventoryname, 
				CASE WHEN inventory.salesunit=0 OR inventory.salesunit='' THEN 'PCS' ELSE inventory.salesunit END AS salesunit,
				FORMAT(inventory.unitprice,0) AS unitprice, SUM(DERIVEDTBL.qty) AS stockqty 
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
				stockopnamedet
				) AS DERIVEDTBL RIGHT JOIN inventory ON DERIVEDTBL.inventoryid=inventory.idinventory
				WHERE inventory.inventoryname like '%$q%' or inventory.inventorycode like '%$q%'
				GROUP BY inventory.idinventory, inventory.inventorycode, inventory.inventoryname, inventory.salesunit limit $offset,$rows");
$items = array();
while($row = mysql_fetch_object($rs)){
	array_push($items, $row);
}
$result["rows"] = $items;
echo json_encode($result);



?>


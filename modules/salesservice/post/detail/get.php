<?php
$key = $_GET['key'];
include '../../../../lib/conn.php';


$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
$msearchdetail = isset($_POST['msearchdetail']) ? mysql_real_escape_string($_POST['msearchdetail']) : '';

$offset = ($page-1)*$rows;

$result = array();

$where = "IFNULL(inventoryname,'') like '%$msearchdetail%'";
$rs = mysql_query("select count(*) from salesservicedet LEFT JOIN inventory ON salesservicedet.inventoryid = inventory.idinventory where " . $where);
$row = mysql_fetch_row($rs);
$result["total"] = $row[0];

$rs = mysql_query("SELECT
salesservicedet.idtransdet,
salesservicedet.transid,
salesservicedet.inventoryid,
salesservicedet.unit,
FORMAT(salesservicedet.unitprice,0) AS unitprice,
salesservicedet.discount,
FORMAT(salesservicedet.amount,0) AS amount,
FORMAT(salesservicedet.discountamt,0) AS discountamt,
salesservicedet.quantity,
salesservicedet.stockqty,
salesservicedet.avlqty,
inventory.inventorycode,
inventory.inventoryname
FROM
salesservicedet
LEFT JOIN inventory ON salesservicedet.inventoryid = inventory.idinventory
WHERE salesservicedet.transid=".$key." AND " . $where . " limit $offset,$rows");
$items = array();
while($row = mysql_fetch_object($rs)){
	array_push($items, $row);
}
$result["rows"] = $items;


// SUM() for footer --------------------
$rs = mysql_query("SELECT 'Total' AS unitprice, FORMAT(SUM(quantity),0) AS quantity, FORMAT(SUM(amount),0) AS amount FROM salesservicedet LEFT JOIN inventory ON salesservicedet.inventoryid = inventory.idinventory WHERE salesservicedet.transid=".$key." AND " . $where . " limit $offset,$rows");

$totalitems = array();
while($row = mysql_fetch_object($rs)){

	array_push($totalitems, $row);			
}
$result["footer"] = $totalitems;
echo json_encode($result);
?>
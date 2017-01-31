<?php
$key = $_GET['key'];
include '../../../../lib/conn.php';

$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
$msearchdetail = isset($_POST['msearchdetail']) ? mysql_real_escape_string($_POST['msearchdetail']) : '';

$offset = ($page-1)*$rows;

$result = array();

$where = "CONCAT(IFNULL(inventoryname,''), IFNULL(inventorycode,'')) like '%$msearchdetail%'";
$rs = mysql_query("select count(*) from stockopnamedet LEFT JOIN inventory ON stockopnamedet.inventoryid = inventory.idinventory where " . $where);
$row = mysql_fetch_row($rs);
$result["total"] = $row[0];

$rs = mysql_query("SELECT
					stockopnamedet.idtransdet,
					stockopnamedet.transid,
					stockopnamedet.inventoryid,
					stockopnamedet.unit,
					stockopnamedet.quantity,
					stockopnamedet.stockqty,
					stockopnamedet.adjqty,
					inventory.inventoryname,
					inventory.inventorycode
					FROM
					stockopnamedet
					LEFT JOIN inventory ON stockopnamedet.inventoryid = inventory.idinventory
					WHERE stockopnamedet.transid=".$key." AND " . $where . " limit $offset,$rows");
$items = array();
while($row = mysql_fetch_object($rs)){
	array_push($items, $row);
}
$result["rows"] = $items;


// SUM() for footer --------------------
$rs = mysql_query("SELECT 'Total' AS unit, FORMAT(SUM(quantity),0) AS quantity, FORMAT(SUM(stockqty),0) AS stockqty, FORMAT(SUM(adjqty),0) AS adjqty FROM stockopnamedet LEFT JOIN inventory ON stockopnamedet.inventoryid = inventory.idinventory WHERE stockopnamedet.transid=".$key." AND " . $where . " limit $offset,$rows");

$totalitems = array();
while($row = mysql_fetch_object($rs)){

	array_push($totalitems, $row);			
}
$result["footer"] = $totalitems;
echo json_encode($result);
?>
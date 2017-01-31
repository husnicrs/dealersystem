<?php
$q = isset($_POST['q']) ? strval($_POST['q']) : '';
include '../conn.php';
$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
$msearchinv = isset($_POST['msearchinv']) ? mysql_real_escape_string($_POST['msearchinv']) : '';


$offset = ($page-1)*$rows;

$result = array();

$where = "inventoryname like '%$msearchinv%'";
$rs = mysql_query("select count(*) from inventory");
$row = mysql_fetch_row($rs);
$result["total"] = $row[0];

$rs = mysql_query("SELECT
					inventory.inventoryname,
					inventory.inventorycode,
					CASE WHEN inventory.salesunit=0 OR inventory.salesunit='' THEN 'PCS' ELSE inventory.salesunit END AS salesunit,
					inventory.idinventory,
					FORMAT(inventory.unitprice,0) AS unitprice
					from inventory WHERE inventoryname like '%$q%' or inventorycode like '%$q%' or idinventory like '%$q%' limit $offset,$rows");
$items = array();
while($row = mysql_fetch_object($rs)){
	array_push($items, $row);
}
$result["rows"] = $items;
echo json_encode($result);



?>


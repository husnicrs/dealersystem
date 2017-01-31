<?php
$key = $_GET['key'];
include '../../../../lib/conn.php';


$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
$msearchdetail = isset($_POST['msearchdetail']) ? mysql_real_escape_string($_POST['msearchdetail']) : '';

$offset = ($page-1)*$rows;

$result = array();

$where = "inventoryname like '%$msearchdetail%'";
$rs = mysql_query("select count(*) from purchasereqdet LEFT JOIN inventory ON purchasereqdet.inventoryid = inventory.idinventory where " . $where);
$row = mysql_fetch_row($rs);
$result["total"] = $row[0];

$rs = mysql_query("SELECT purchasereqdet.idtransdet,
purchasereqdet.transid,
purchasereqdet.inventoryid,
purchasereqdet.unit,
purchasereqdet.quantity,
purchasereqdet.sizeid,
purchasereqdet.colorid,
inventory.inventoryname,
inventorysize.inventorysizename,
inventorycolor.inventorycolorname 
FROM
purchasereqdet
LEFT JOIN inventory ON purchasereqdet.inventoryid = inventory.idinventory
LEFT JOIN inventorysize ON purchasereqdet.sizeid = inventorysize.idinventorysize
LEFT JOIN inventorycolor ON purchasereqdet.colorid = inventorycolor.idinventorycolor
WHERE purchasereqdet.transid=".$key." AND " . $where . " limit $offset,$rows");
$items = array();
while($row = mysql_fetch_object($rs)){
	array_push($items, $row);
}
$result["rows"] = $items;


// SUM() for footer --------------------
$rs = mysql_query("SELECT 'Total' AS inventorysizename, FORMAT(SUM(quantity),0) AS quantity FROM purchasereqdet WHERE purchasereqdet.transid=".$key."");

$totalitems = array();
while($row = mysql_fetch_object($rs)){

	array_push($totalitems, $row);			
}
$result["footer"] = $totalitems;
echo json_encode($result);
?>
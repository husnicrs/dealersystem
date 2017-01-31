<?php
$key = $_GET['key'];
include '../../../../../lib/conn.php';

$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
$msearchdetail = isset($_POST['msearchdetail']) ? mysql_real_escape_string($_POST['msearchdetail']) : '';

$offset = ($page-1)*$rows;

$result = array();

$where = "inventoryname like '%$msearchdetail%'";
$rs = mysql_query("select count(*) FROM
					purchaseorderdet
					LEFT JOIN inventory ON purchaseorderdet.inventoryid = inventory.idinventory
					LEFT JOIN inventorysize ON purchaseorderdet.sizeid = inventorysize.idinventorysize
					LEFT JOIN inventorycolor ON purchaseorderdet.colorid = inventorycolor.idinventorycolor where " . $where);
$row = mysql_fetch_row($rs);
$result["total"] = $row[0];

$rs = mysql_query("SELECT
					purchaseorderdet.idtransdet,
					purchaseorderdet.transid,
					purchaseorderdet.inventoryid,
					inventory.inventorycode,
					inventory.inventoryname,
					purchaseorderdet.unit,
					purchaseorderdet.unitprice,
					purchaseorderdet.discount,
					purchaseorderdet.amount,
					purchaseorderdet.quantity,
					purchaseorderdet.sizeid,
					inventorysize.inventorysizename,
					purchaseorderdet.colorid,
					inventorycolor.inventorycolorname
					FROM
					purchaseorderdet
					LEFT JOIN inventory ON purchaseorderdet.inventoryid = inventory.idinventory
					LEFT JOIN inventorysize ON purchaseorderdet.sizeid = inventorysize.idinventorysize
					LEFT JOIN inventorycolor ON purchaseorderdet.colorid = inventorycolor.idinventorycolor
					WHERE purchaseorderdet.transid=".$key." AND " . $where . " limit $offset,$rows");
$items = array();
while($row = mysql_fetch_object($rs)){
	array_push($items, $row);
}
$result["rows"] = $items;

echo json_encode($result);
?>
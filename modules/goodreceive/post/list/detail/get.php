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
					goodreceivedet
					LEFT JOIN inventory ON goodreceivedet.inventoryid = inventory.idinventory
					LEFT JOIN inventorysize ON goodreceivedet.sizeid = inventorysize.idinventorysize
					LEFT JOIN inventorycolor ON goodreceivedet.colorid = inventorycolor.idinventorycolor where " . $where);
$row = mysql_fetch_row($rs);
$result["total"] = $row[0];

$rs = mysql_query("SELECT
					goodreceivedet.idtransdet,
					goodreceivedet.transid,
					goodreceivedet.inventoryid,
					inventory.inventorycode,
					inventory.inventoryname,
					goodreceivedet.unit,
					goodreceivedet.unitprice,
					goodreceivedet.discount,
					goodreceivedet.amount,
					goodreceivedet.quantity,
					goodreceivedet.sizeid,
					inventorysize.inventorysizename,
					goodreceivedet.colorid,
					inventorycolor.inventorycolorname
					FROM
					goodreceivedet
					LEFT JOIN inventory ON goodreceivedet.inventoryid = inventory.idinventory
					LEFT JOIN inventorysize ON goodreceivedet.sizeid = inventorysize.idinventorysize
					LEFT JOIN inventorycolor ON goodreceivedet.colorid = inventorycolor.idinventorycolor
					WHERE goodreceivedet.transid=".$key." AND " . $where . " limit $offset,$rows");
$items = array();
while($row = mysql_fetch_object($rs)){
	array_push($items, $row);
}
$result["rows"] = $items;

echo json_encode($result);
?>
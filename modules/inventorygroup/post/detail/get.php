<?php
$key = $_GET['key'];
include '../../../../lib/conn.php';


$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
$msearchdetail = isset($_POST['msearchdetail']) ? mysql_real_escape_string($_POST['msearchdetail']) : '';

$offset = ($page-1)*$rows;

$result = array();

$where = "inventorycode like '%$msearchdetail%'";
$rs = mysql_query("select count(*) FROM
					inventorygroupdet
					INNER JOIN inventory ON inventorygroupdet.inventoryid = inventory.idinventory
					INNER JOIN inventorygroup ON inventorygroupdet.inventorygroupid = inventorygroup.idinventorygroup
					where " . $where);
$row = mysql_fetch_row($rs);
$result["total"] = $row[0];

$rs = mysql_query("SELECT
					inventorygroupdet.idinventorygroupdet,
					inventorygroupdet.inventoryid,
					inventory.inventorycode,
					inventory.inventoryname,
					inventorygroupdet.inventorygroupid,
					inventorygroup.inventorygroupname
					FROM
					inventorygroupdet
					INNER JOIN inventory ON inventorygroupdet.inventoryid = inventory.idinventory
					INNER JOIN inventorygroup ON inventorygroupdet.inventorygroupid = inventorygroup.idinventorygroup
					WHERE inventorygroupdet.inventorygroupid=".$key." AND " . $where . " 
					limit $offset,$rows");
$items = array();
while($row = mysql_fetch_object($rs)){
	array_push($items, $row);
}
$result["rows"] = $items;


echo json_encode($result);
?>
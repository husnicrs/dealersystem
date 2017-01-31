<?php

$id = intval($_REQUEST['idinventorygroupdet']);
$inventoryid = $_REQUEST['inventoryid'];

include '../../../../lib/conn.php';

$sql = "update inventorygroupdet set inventoryid='$inventoryid' where idinventorygroupdet=$id";
@mysql_query($sql);
echo json_encode(array(
	'id' => $id,
	'inventoryid' => $inventoryid,
	'success'=>true
));
?>
<?php

$id = intval($_REQUEST['idtransdet']);
$inventoryid = $_REQUEST['inventoryid'];
$unit = $_REQUEST['unit'];
$quantity = $_REQUEST['quantity'];

include '../../../../lib/conn.php';

$sql = "update inventoryadjdet set inventoryid='$inventoryid',unit='$unit',quantity='$quantity' where idtransdet=$id";
@mysql_query($sql);
echo json_encode(array(
	'id' => $id,
	'inventoryid' => $inventoryid,
	'unit' => $unit,
	'success'=>true
));
?>
<?php

$id = intval($_REQUEST['idtransdet']);
$inventoryid = $_REQUEST['inventoryid'];
$unit = $_REQUEST['unit'];
$quantity = $_REQUEST['quantity'];
$adjqty = $_REQUEST['adjqty'];
$stockqty = $_REQUEST['stockqty'];

include '../../../../lib/conn.php';

$sql = "update stockopnamedet set inventoryid='$inventoryid',unit='$unit',quantity='$quantity',adjqty='$adjqty',stockqty='$stockqty' where idtransdet=$id";
@mysql_query($sql);
echo json_encode(array(
	'id' => $id,
	'inventoryid' => $inventoryid,
	'quantity' => $quantity,
	'adjqty' => $adjqty,
	'stockqty' => $stockqty,
	'unit' => $unit,
	'success'=>true
));
?>
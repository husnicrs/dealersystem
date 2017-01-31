<?php

$id = intval($_REQUEST['idtransdet']);
$inventoryid = $_REQUEST['inventoryid'];
$unit = $_REQUEST['unit'];
$quantity = $_REQUEST['quantity'];
$sizeid = $_REQUEST['sizeid'];
$colorid = $_REQUEST['colorid'];

include '../../../../lib/conn.php';

$sql = "update purchasereqdet set inventoryid='$inventoryid',unit='$unit',quantity='$quantity',sizeid='$sizeid',colorid='$colorid' where idtransdet=$id";
@mysql_query($sql);
echo json_encode(array(
	'id' => $id,
	'inventoryid' => $inventoryid,
	'unit' => $unit,
	'sizeid' => $sizeid,
	'colorid' => $colorid,
	'success'=>true
));
?>
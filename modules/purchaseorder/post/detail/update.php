<?php

$id = intval($_REQUEST['idtransdet']);
$inventoryid = $_REQUEST['inventoryid'];
$unit = $_REQUEST['unit'];
$unitprice = $_REQUEST['unitprice'];
$discount = $_REQUEST['discount'];
$amount = $_REQUEST['amount'];
$quantity = $_REQUEST['quantity'];
$rackno = $_REQUEST['rackno'];

include '../../../../lib/conn.php';

$sql = "update purchaseorderdet set inventoryid='$inventoryid',unit='$unit',unitprice='$unitprice',discount='$discount',amount='$amount',quantity='$quantity', rackno='$rackno' where idtransdet=$id";
@mysql_query($sql);
echo json_encode(array(
	'id' => $id,
	'inventoryid' => $inventoryid,
	'unit' => $unit,
	'unitprice' => $unitprice,
	'discount' => $discount,
	'amount' => $amount,
	'rackno' => $rackno,
	'success'=>true
));
?>
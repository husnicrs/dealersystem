<?php

$id = intval($_REQUEST['idtransdet']);
$inventoryid = $_REQUEST['inventoryid'];
$unit = $_REQUEST['unit'];
$unitprice = $_REQUEST['unitprice'];
$discount = $_REQUEST['discount'];
$amount = $_REQUEST['amount'];
$quantity = $_REQUEST['quantity'];
$stockqty = $_REQUEST['stockqty'];
$avlqty = $_REQUEST['avlqty'];
$discountamt = $_REQUEST['discountamt'];

include '../../../../lib/conn.php';

$sql = "update salesorderdet set inventoryid='$inventoryid',unit='$unit',unitprice='$unitprice',discount='$discount',discountamt='$discountamt',amount='$amount',stockqty='$stockqty',avlqty='$avlqty',
quantity='$quantity' where idtransdet=$id";
@mysql_query($sql);
echo json_encode(array(
	'id' => $id,
	'inventoryid' => $inventoryid,
	'unit' => $unit,
	'unitprice' => $unitprice,
	'discount' => $discount,
	'amount' => $amount,
	'stockqty' => $stockqty,
	'avlqty' => $avlqty,
	'avlqty' => $discountamt,
	'discountamt'=>true
));
?>
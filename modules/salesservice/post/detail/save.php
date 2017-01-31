<?php
$key = $_GET['key'];
$inventoryid = $_REQUEST['inventoryid'];
$unit = $_REQUEST['unit'];
$unitprice = $_REQUEST['unitprice'];
$discount = $_REQUEST['discount'];
$amount = $_REQUEST['amount'];
$quantity = $_REQUEST['quantity'];
$stockqty = $_REQUEST['stockqty'];
$avlqty = $_REQUEST['avlqty'];
$discountamt = $_REQUEST['discountamt'];
$transid = $_REQUEST['transid'];
$userid = isset($_POST['userid']) ? mysql_real_escape_string($_POST['userid']) : '';
//$transid = isset($_POST['transid']) ? mysql_real_escape_string($_POST['transid']) : '';



include '../../../../lib/conn.php';

$sql = "insert into salesservicedet(inventoryid,unit,unitprice,discount,discountamt,amount,quantity,stockqty,avlqty,transid) 
values('$inventoryid','$unit','$unitprice','$discount','$discountamt','$amount','$quantity','$stockqty','$avlqty','$key')";
@mysql_query($sql);
echo json_encode(array(
	'idtransdet' => mysql_insert_id(),
	'inventoryid' => $inventoryid,
	'unit' => $unit,
	'unitprice' => $unitprice,
	'discount' => $discount,
	'discountamt' => $discountamt,
	'amount' => $amount,
	'stockqty' => $stockqty,
	'avlqty' => $avlqty,
	'transid' => $transid,
	'inventoryname' => $inventoryname
	
));

?>
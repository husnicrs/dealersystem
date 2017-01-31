<?php
$key = $_GET['key'];
$inventoryid = $_REQUEST['inventoryid'];
$unit = $_REQUEST['unit'];
$quantity = $_REQUEST['quantity'];
$transid = $_REQUEST['transid'];
$userid = isset($_POST['userid']) ? mysql_real_escape_string($_POST['userid']) : '';
//$transid = isset($_POST['transid']) ? mysql_real_escape_string($_POST['transid']) : '';

include '../../../../lib/conn.php';

$sql = "insert into materialuseddet(inventoryid,unit,quantity,transid) values('$inventoryid','$unit','$quantity','$key')";
@mysql_query($sql);
echo json_encode(array(
	'idtransdet' => mysql_insert_id(),
	'inventoryid' => $inventoryid,
	'unit' => $unit,
	'transid' => $transid,
	'inventoryname' => $inventoryname
	
));

?>
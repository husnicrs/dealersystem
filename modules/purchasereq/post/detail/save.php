<?php
$key = $_GET['key'];
$inventoryid = $_REQUEST['inventoryid'];
$unit = $_REQUEST['unit'];
$quantity = $_REQUEST['quantity'];
$sizeid = $_REQUEST['sizeid'];
$colorid = $_REQUEST['colorid'];
$transid = $_REQUEST['transid'];
$userid = isset($_POST['userid']) ? mysql_real_escape_string($_POST['userid']) : '';
//$transid = isset($_POST['transid']) ? mysql_real_escape_string($_POST['transid']) : '';



include '../../../../lib/conn.php';

$sql = "insert into purchasereqdet(inventoryid,unit,quantity,sizeid,colorid,transid) values('$inventoryid','$unit','$quantity','$sizeid','$colorid','$key')";
@mysql_query($sql);
echo json_encode(array(
	'idtransdet' => mysql_insert_id(),
	'inventoryid' => $inventoryid,
	'unit' => $unit,
	'sizeid' => $sizeid,
	'colorid' => $colorid,
	'transid' => $transid,
	'inventoryname' => $inventoryname
	
));

?>
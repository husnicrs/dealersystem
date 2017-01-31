<?php
$key = $_GET['key'];
$vehicleserviceid = $_REQUEST['vehicleserviceid'];
$unitprice = $_REQUEST['unitprice'];
$transid = $_REQUEST['transid'];
$discountamt = $_REQUEST['discountamt'];
$subtotal = $_REQUEST['subtotal'];
$discount = $_REQUEST['discount'];

$userid = isset($_POST['userid']) ? mysql_real_escape_string($_POST['userid']) : '';

include '../../../../lib/conn.php';

$sql = "insert into salesservicedet2 set vehicleserviceid='$vehicleserviceid',unitprice='$unitprice',
discountamt='$discountamt',subtotal='$subtotal',discount='$discount',transid='$key'";
@mysql_query($sql);
echo json_encode(array(
	'idtransdet' => mysql_insert_id(),
	'vehicleserviceid' => $vehicleserviceid,
	'unitprice' => $unitprice,
	'discountamt' => $discountamt,
	'subtotal' => $subtotal,
	'discount' => $discount,
	'transid' => $transid
));

?>
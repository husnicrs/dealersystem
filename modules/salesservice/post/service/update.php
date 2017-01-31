<?php

$id = intval($_REQUEST['idtransdet']);
$vehicleserviceid = $_REQUEST['vehicleserviceid'];
$unitprice = $_REQUEST['unitprice'];
$discountamt = $_REQUEST['discountamt'];
$subtotal = $_REQUEST['subtotal'];
$discount = $_REQUEST['discount'];

include '../../../../lib/conn.php';

$sql = "update salesservicedet2 set vehicleserviceid='$vehicleserviceid',unitprice='$unitprice',
discountamt='$discountamt',subtotal='$subtotal',discount='$discount' where idtransdet=$id";
@mysql_query($sql);
echo json_encode(array(
	'id' => $id,
	'vehicleserviceid' => $vehicleserviceid,
	'unitprice' => $unitprice,
	'discountamt' => $discountamt,
	'subtotal' => $subtotal,
	'discount' => $discount,
	'success'=>true
));
?>
<?php
$key = $_GET['key'];
$supplierid = $_REQUEST['supplierid'];
$currency = $_REQUEST['currency'];
$price = $_REQUEST['price'];
$rate = $_REQUEST['rate'];
$disc = $_REQUEST['disc'];
$paydue = $_REQUEST['paydue'];
$leadtime = $_REQUEST['leadtime'];
$minorder = $_REQUEST['minorder'];

include '../../../../lib/conn.php';
$sql = "insert into purchasebidding SET transdetid='$key', supplierid='$supplierid', currency='$currency', price='$price', rate='$rate', disc='$disc',
paydue='$paydue', leadtime='$leadtime', minorder='$minorder'";
@mysql_query($sql);
echo json_encode(array(
	'idtranssubdet' => mysql_insert_id(),
	'transdetid' => $key,
	'supplierid' => $supplierid,
	'currency' => $currency,
	'price' => $price,
	'rate' => $rate,
	'disc' => $disc,
	'paydue' => $paydue,
	'leadtime' => $leadtime,
	'minorder' => $minorder
));

?>
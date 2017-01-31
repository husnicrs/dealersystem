<?php
$id = intval($_REQUEST['idtranssubdet']);
$supplierid = $_REQUEST['supplierid'];
$currency = $_REQUEST['currency'];
$price = $_REQUEST['price'];
$rate = $_REQUEST['rate'];
$disc = $_REQUEST['disc'];
$paydue = $_REQUEST['paydue'];
$leadtime = $_REQUEST['leadtime'];
$minorder = $_REQUEST['minorder'];

include '../../../../lib/conn.php';
$sql = "update purchasebidding set supplierid='$supplierid', currency='$currency', price='$price', rate='$rate', disc='$disc',
paydue='$paydue', leadtime='$leadtime', minorder='$minorder' where idtranssubdet=$id";
@mysql_query($sql);
echo json_encode(array(
	'id' => $id,
	'supplierid' => $supplierid,
	'currency' => $currency,
	'price' => $price,
	'rate' => $rate,
	'disc' => $disc,
	'paydue' => $paydue,
	'leadtime' => $leadtime,
	'minorder' => $minorder,
	'success'=>true
));
?>
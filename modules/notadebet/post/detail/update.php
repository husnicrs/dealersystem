<?php

$id = intval($_REQUEST['idvehicle']);
$unitprice = $_REQUEST['unitprice'];

include '../../../../lib/conn.php';

$sql = "update vehiclestock set unitprice='$unitprice' where idvehicle=$id";
@mysql_query($sql);
echo json_encode(array(
	'id' => $id,
	'unitprice' => $unitprice,
	'success'=>true
));
?>
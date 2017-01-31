<?php

$id = intval($_REQUEST['idtransdet']);
$vehiclemodel = $_REQUEST['vehiclemodel'];
$vehicletype = $_REQUEST['vehicletype'];
$mechineno = $_REQUEST['mechineno'];
$rangkano = $_REQUEST['rangkano'];
$vehiclecolor = $_REQUEST['vehiclecolor'];
$vehiclejenis = $_REQUEST['vehiclejenis'];
$transid = $_REQUEST['transid'];

include '../../../../lib/conn.php';

$sql = "update vehiclemutdet set vehiclemodel='$vehiclemodel',vehicletype='$vehicletype',mechineno='$mechineno',
rangkano='$rangkano',vehiclecolor='$vehiclecolor',vehiclejenis='$vehiclejenis' where idtransdet=$id";
@mysql_query($sql);
echo json_encode(array(
	'id' => $id,
	'vehiclemodel' => $vehiclemodel,
	'vehicletype' => $vehicletype,
	'mechineno' => $mechineno,
	'rangkano' => $rangkano,
	'vehiclecolor' => $vehiclecolor,
	'vehiclejenis' => $vehiclejenis,
	'success'=>true
));
?>
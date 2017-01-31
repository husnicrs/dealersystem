<?php
$key = $_GET['key'];
$vehiclemodel = $_REQUEST['vehiclemodel'];
$vehicletype = $_REQUEST['vehicletype'];
$mechineno = $_REQUEST['mechineno'];
$rangkano = $_REQUEST['rangkano'];
$vehiclecolor = $_REQUEST['vehiclecolor'];
$vehiclejenis = $_REQUEST['vehiclejenis'];
$transid = $_REQUEST['transid'];
$userid = isset($_POST['userid']) ? mysql_real_escape_string($_POST['userid']) : '';
//$transid = isset($_POST['transid']) ? mysql_real_escape_string($_POST['transid']) : '';

include '../../../../lib/conn.php';

$sql = "insert into vehiclemutdet(vehiclemodel,vehicletype,mechineno,rangkano,vehiclecolor,vehiclejenis,transid) 
values('$vehiclemodel','$vehicletype','$mechineno','$rangkano','$vehiclecolor','$vehiclejenis','$key')";
@mysql_query($sql);
echo json_encode(array(
	'idtransdet' => mysql_insert_id(),
	'vehiclemodel' => $vehiclemodel,
	'vehicletype' => $vehicletype,
	'mechineno' => $mechineno,
	'rangkano' => $rangkano,
	'vehiclecolor' => $vehiclecolor,
	'vehiclejenis' => $vehiclejenis,
	'transid' => $transid
	
));

?>
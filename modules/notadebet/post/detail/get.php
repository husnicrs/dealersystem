<?php
$key = $_GET['key'];
include '../../../../lib/conn.php';

$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
$msearchdetail = isset($_POST['msearchdetail']) ? mysql_real_escape_string($_POST['msearchdetail']) : '';

$offset = ($page-1)*$rows;

$result = array();

$where = "CONCAT(IFNULL(dono,''), IFNULL(rangkano,''),  IFNULL(mechineno,''), IFNULL(vehlicemodel,''), IFNULL(nik,''), IFNULL(vehicletype,'')) like '%$msearchdetail%'";
$rs = mysql_query("select count(*) from vehiclestock
					LEFT JOIN vehicle ON vehiclestock.vehicletype = vehicle.vehlicetype where " . $where);
$row = mysql_fetch_row($rs);
$result["total"] = $row[0];

$rs = mysql_query("SELECT
					vehiclestock.idvehicle,
					vehiclestock.dono, vehiclestock.nik,
					DATE_FORMAT(vehiclestock.dodate,'%d/%m/%Y') AS dodate,
					vehiclestock.ndno,
					vehiclestock.vehicletype,
					vehicle.vehlicemodel,
					vehiclestock.mechineno,
					vehiclestock.rangkano,
					vehiclestock.vehiclecolor,
					FORMAT(vehiclestock.unitprice,0) AS unitprice
					FROM
					vehiclestock
					LEFT JOIN vehicle ON vehiclestock.vehicletype = vehicle.vehlicetype
					WHERE vehiclestock.ndno=".$key." AND " . $where . " limit $offset,$rows");
$items = array();
while($row = mysql_fetch_object($rs)){
	array_push($items, $row);
}
$result["rows"] = $items;


// SUM() for footer --------------------
$rs = mysql_query("SELECT 'Total' AS vehiclecolor, FORMAT(SUM(vehiclestock.unitprice),0) AS unitprice FROM
					vehiclestock
					LEFT JOIN vehicle ON vehiclestock.vehicletype = vehicle.vehlicetype WHERE vehiclestock.ndno=".$key." AND " . $where . " limit $offset,$rows");

$totalitems = array();
while($row = mysql_fetch_object($rs)){

	array_push($totalitems, $row);			
}
$result["footer"] = $totalitems;
echo json_encode($result);
?>
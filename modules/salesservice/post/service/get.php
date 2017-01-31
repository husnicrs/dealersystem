<?php
$key = $_GET['key'];
include '../../../../lib/conn.php';


$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
$msearchdetail = isset($_POST['msearchdetail']) ? mysql_real_escape_string($_POST['msearchdetail']) : '';

$offset = ($page-1)*$rows;

$result = array();

$where = "IFNULL(vehicleservicename,'') like '%$msearchdetail%'";
$rs = mysql_query("select count(*) from salesservicedet2
LEFT JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice where " . $where);
$row = mysql_fetch_row($rs);
$result["total"] = $row[0];

$rs = mysql_query("SELECT
salesservicedet2.idtransdet,
salesservicedet2.transid,
salesservicedet2.vehicleserviceid,
vehicleservice.vehicleservicename,
FORMAT(salesservicedet2.unitprice,0) AS unitprice,
FORMAT(salesservicedet2.kilometer,0) AS kilometer,
employee.employeename,
salesservicedet2.discount,
FORMAT(salesservicedet2.discountamt,0) AS discountamt,
FORMAT(salesservicedet2.subtotal,0) AS subtotal,
salesservicedet2.employeeid
FROM
salesservicedet2
LEFT JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice
LEFT JOIN employee ON salesservicedet2.employeeid = employee.idemployee
WHERE salesservicedet2.transid=".$key." AND " . $where . " limit $offset,$rows");
$items = array();
while($row = mysql_fetch_object($rs)){
	array_push($items, $row);
}
$result["rows"] = $items;


// SUM() for footer --------------------
$rs = mysql_query("SELECT 'Total' AS discountamt, FORMAT(SUM(salesservicedet2.subtotal),0) AS subtotal from salesservicedet2
LEFT JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice WHERE salesservicedet2.transid=".$key." AND " . $where . " limit $offset,$rows");

$totalitems = array();
while($row = mysql_fetch_object($rs)){

	array_push($totalitems, $row);			
}
$result["footer"] = $totalitems;
echo json_encode($result);
?>
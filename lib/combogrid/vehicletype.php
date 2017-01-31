<?php
$q = isset($_POST['q']) ? strval($_POST['q']) : '';

include '../conn.php';
$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;

$offset = ($page-1)*$rows;

$result = array();

$rs = mysql_query("select count(*) from vehicle");
$row = mysql_fetch_row($rs);
$result["total"] = $row[0];

$rs = mysql_query("SELECT
					vehicle.vehlicemodel,
					vehicle.vehlicetype
					FROM
					vehicle
					WHERE  CONCAT(vehicle.vehlicetype,vehicle.vehlicemodel) like '%$q%' 
					GROUP BY
					vehicle.vehlicemodel,
					vehicle.vehlicetype
					limit $offset,$rows");
$items = array();
while($row = mysql_fetch_object($rs)){
	array_push($items, $row);
}
$result["rows"] = $items;
echo json_encode($result);



?>


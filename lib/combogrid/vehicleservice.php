<?php
$key = $_GET['key'];
$q = isset($_POST['q']) ? strval($_POST['q']) : '';
//$vahicletypeid = isset($_POST['vahicletypeid']) ? strval($_POST['vahicletypeid']) : '';

$vahicletypeid = isset($_POST['vahicletypeid']) ? mysql_real_escape_string($_POST['vahicletypeid']) : '';

include '../conn.php';
$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;

$offset = ($page-1)*$rows;

$result = array();

$rs = mysql_query("select count(*) from vehicleservice");
$row = mysql_fetch_row($rs);
$result["total"] = $row[0];

$rs = mysql_query("SELECT
					vehicleservice.idvehicleservice,
					vehicleservice.vehicleservicename,
					vehicleservice.unitprice,
					vehicleservice.`status`,
					vehicleservice.vehiclemodel,
					vehicleservice.vehliceservicetype,
					vehicleservice.vehiclegroupmodel 
					FROM
					vehicleservice
					INNER JOIN vehlicemodelgroup ON vehicleservice.vehiclegroupmodel = vehlicemodelgroup.vehlicemodelgroupname
					INNER JOIN vehlicemodelgroupdet ON vehlicemodelgroup.idvehlicemodelgroup = vehlicemodelgroupdet.vehlicemodelgroupid
					INNER JOIN vehicle ON vehlicemodelgroupdet.vehlicetype = vehicle.vehlicetype
					INNER JOIN salesservice ON vehicle.vehlicemodel = salesservice.vehiclemodel
					WHERE salesservice.idtrans=".$key." AND IFNULL(CONCAT(vehicleservice.vehiclegroupmodel,vehicleservice.vehicleservicename),'') like '%$q%' 
					GROUP BY
					vehicleservice.idvehicleservice,
					vehicleservice.vehicleservicename,
					vehicleservice.unitprice,
					vehicleservice.`status`,
					vehicleservice.vehiclemodel,
					vehicleservice.vehliceservicetype,
					vehicleservice.vehiclegroupmodel 
					limit $offset,$rows");
$items = array();
while($row = mysql_fetch_object($rs)){
	array_push($items, $row);
}
$result["rows"] = $items;
echo json_encode($result);



?>


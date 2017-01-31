<?php
$key = $_GET['key'];
$yearfrom = $_REQUEST['yearfrom'];
$yearto = $_REQUEST['yearto'];
$company = $_REQUEST['company'];
$usinesstype = $_REQUEST['usinesstype'];
$positionid = $_REQUEST['positionid'];
$lastsalary = $_REQUEST['lastsalary'];
$sparationtype = $_REQUEST['sparationtype'];

include '../../../../lib/conn.php';

$sql = "insert into employeejobexperience (employeeid,yearfrom,yearto,company,usinesstype,positionid,lastsalary,sparationtype) values('$key','$yearfrom', '$yearto', '$company','$usinesstype', '$positionid', '$lastsalary', '$sparationtype')";
@mysql_query($sql);
echo json_encode(array(
	'idemployeejobexperience' => mysql_insert_id(),
	'employeeid' => $key,
	'yearfrom' => $yearfrom,
	'yearto' => $yearto, 
	'company' => $company,
	'usinesstype' => $usinesstype,
	'positionid' => $positionid,
	'lastsalary' => $lastsalary,
	'sparationtype' => $sparationtype
));

?>
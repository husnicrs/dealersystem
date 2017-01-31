<?php
$id = intval($_REQUEST['idemployeeeducation']);
$yearfrom = $_REQUEST['yearfrom'];
$yearto = $_REQUEST['yearto'];
$company = $_REQUEST['company'];
$usinesstype = $_REQUEST['usinesstype'];
$positionid = $_REQUEST['positionid'];
$lastsalary = $_REQUEST['lastsalary'];
$sparationtype = $_REQUEST['sparationtype'];

include '../../../../lib/conn.php';
		
$sql = "update employeeeducation set educationtypeid='$educationtypeid', majorid='$majorid', address='$address', yearfrom='$yearfrom', yearto='$yearto', gpa='$gpa', description='$description' where idemployeeeducation=$id";
@mysql_query($sql);
echo json_encode(array(
	'id' => $id,
	'yearfrom' => $yearfrom,
	'yearto' => $yearto, 
	'company' => $company,
	'usinesstype' => $usinesstype,
	'positionid' => $positionid,
	'lastsalary' => $lastsalary,
	'sparationtype' => $sparationtype,
	'success'=>true
));
?>
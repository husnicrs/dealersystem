<?php
$id = intval($_REQUEST['idemployeeeducation']);
$educationtypeid = $_REQUEST['educationtypeid'];
$majorid = $_REQUEST['majorid'];
$address = $_REQUEST['address'];
$yearfrom = $_REQUEST['yearfrom'];
$yearto = $_REQUEST['yearto'];
$gpa = $_REQUEST['gpa'];
$description = $_REQUEST['description'];


include '../../../../lib/conn.php';
		
$sql = "update employeeeducation set educationtypeid='$educationtypeid', majorid='$majorid', address='$address', yearfrom='$yearfrom', yearto='$yearto', gpa='$gpa', description='$description' where idemployeeeducation=$id";
@mysql_query($sql);
echo json_encode(array(
	'id' => $id,
	'educationtypeid' => $educationtypeid,
	'majorid' => $majorid, 
	'address' => $address,
	'yearfrom' => $yearfrom,
	'yearto' => $yearto,
	'gpa' => $gpa,
	'description' => $description,
	'success'=>true
));
?>
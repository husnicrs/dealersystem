<?php
$key = $_GET['key'];
$educationtypeid = $_REQUEST['educationtypeid'];
$majorid = $_REQUEST['majorid'];
$address = $_REQUEST['address'];
$yearfrom = $_REQUEST['yearfrom'];
$yearto = $_REQUEST['yearto'];
$gpa = $_REQUEST['gpa'];
$description = $_REQUEST['description'];

include '../../../../lib/conn.php';

$sql = "insert into employeeeducation (employeeid,educationtypeid,majorid,address,yearfrom,yearto,gpa,description) values('$key','$educationtypeid', '$majorid', '$address','$yearfrom', '$yearto', '$gpa', '$description')";
@mysql_query($sql);
echo json_encode(array(
	'idemployeeeducation' => mysql_insert_id(),
	'employeeid' => $key,
	'educationtypeid' => $educationtypeid,
	'majorid' => $majorid, 
	'address' => $address,
	'yearfrom' => $yearfrom,
	'yearto' => $yearto,
	'gpa' => $gpa,
	'description' => $description
));

?>
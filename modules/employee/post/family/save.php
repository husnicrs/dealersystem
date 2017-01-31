<?php
$key = $_GET['key'];
$familyname = $_REQUEST['familyname'];
$placebirth = $_REQUEST['placebirth'];
$lasteducation = $_REQUEST['lasteducation'];
$occupation = $_REQUEST['occupation'];
$medicalprotection = $_REQUEST['medicalprotection'];
$job = $_REQUEST['job'];
$sex = $_REQUEST['sex'];

$vardatebirth = $_REQUEST['datebirth'];
$datebirth = date('Y-m-d', strtotime($vardatebirth));

include '../../../../lib/conn.php';

$sql = "insert into employeefamily(employeeid,familyname,placebirth,lasteducation,occupation,medicalprotection,job,sex,datebirth) values('$key','$familyname', '$placebirth', '$lasteducation','$occupation', '$medicalprotection', '$job', '$sex', '$datebirth')";
@mysql_query($sql);
echo json_encode(array(
	'idemployeefamily' => mysql_insert_id(),
	'employeeid' => $key,
	'familyname' => $familyname,
	'placebirth' => $placebirth, 
	'lasteducation' => $lasteducation,
	'occupation' => $occupation,
	'medicalprotection' => $medicalprotection,
	'job' => $job,
	'sex' => $sex,
	'datebirth' => $datebirth
));

?>
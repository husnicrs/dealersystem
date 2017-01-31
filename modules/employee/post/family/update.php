<?php
$id = intval($_REQUEST['idemployeefamily']);
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
		
$sql = "update employeefamily set familyname='$familyname', placebirth='$placebirth', lasteducation='$lasteducation', occupation='$occupation', medicalprotection='$medicalprotection', job='$job', sex='$sex' where idemployeefamily=$id";
@mysql_query($sql);
echo json_encode(array(
	'id' => $id,
	'familyname' => $familyname,
	'placebirth' => $placebirth, 
	'lasteducation' => $lasteducation,
	'occupation' => $occupation,
	'medicalprotection' => $medicalprotection,
	'job' => $job,
	'sex' => $sex,
	'datebirth' => $datebirth,
	'success'=>true
));
?>
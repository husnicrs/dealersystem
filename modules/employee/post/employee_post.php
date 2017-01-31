<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['type']) {
	case "get":
		$SQL = mysqli_query($con, "SELECT
				employee.idemployee,
				employee.nik,
				employee.identityno,
				employee.employeename,
				employee.nickname,
				employee.placebirth,
				employee.datebirth,
				employee.address,
				employee.maritalstatus,
				employee.staffstatusid,
				employee.sex,
				employee.blood,
				employee.joindate,
				employee.termdate,
				employee.insuranceno,
				employee.npwp,
				employee.cityid,
				employee.positionid,
				position.positionname,
				employee.departmentid,
				department.departmentname,
				employee.taxstatus,
				employee.educationlevelid,
				educationlevel.educationlevelname,
				employee.basic,
				employee.postall,
				employee.allowance,
				employee.locationid
				FROM
				employee
				LEFT JOIN position ON employee.positionid = position.idposition
				LEFT JOIN department ON employee.departmentid = department.iddepartment
				LEFT JOIN educationlevel ON employee.educationlevelid = educationlevel.ideducationlevel
				WHERE employee.idemployee='".$_POST['idemployee']."'");
		$return = mysqli_fetch_array($SQL,MYSQLI_ASSOC);
		echo json_encode($return);
		break;
	case "new":
		$SQL = mysqli_query($con, 
		"INSERT INTO employee SET identityno='".$_POST['identityno']."',employeename='".$_POST['employeename']."',positionid='".$_POST['positionid']."',nickname='".$_POST['nickname']."',
		placebirth='".$_POST['placebirth']."',datebirth='".$_POST['datebirth']."',address='".$_POST['address']."',cityid='".$_POST['cityid']."',
		maritalstatus='".$_POST['maritalstatus']."',sex='".$_POST['sex']."',blood='".$_POST['blood']."',educationlevelid='".$_POST['educationlevelid']."',
		nik='".$_POST['nik']."',joindate='".$_POST['joindate']."',termdate='".$_POST['termdate']."',
		insuranceno='".$_POST['insuranceno']."',npwp='".$_POST['npwp']."',departmentid='".$_POST['departmentid']."',majorid='".$_POST['majorid']."',locationid='".$_POST['locationid']."'");
		if($SQL){
			echo json_encode("OK");
		}
		break;
	case "edit":
		$SQL = mysqli_query($con, 
		"UPDATE employee SET identityno='".$_POST['identityno']."',employeename='".$_POST['employeename']."',positionid='".$_POST['positionid']."',nickname='".$_POST['nickname']."',
		placebirth='".$_POST['placebirth']."',datebirth='".$_POST['datebirth']."',address='".$_POST['address']."',cityid='".$_POST['cityid']."',
		maritalstatus='".$_POST['maritalstatus']."',sex='".$_POST['sex']."',blood='".$_POST['blood']."',educationlevelid='".$_POST['educationlevelid']."',
		nik='".$_POST['nik']."',joindate='".$_POST['joindate']."',termdate='".$_POST['termdate']."',
		insuranceno='".$_POST['insuranceno']."',npwp='".$_POST['npwp']."',departmentid='".$_POST['departmentid']."',majorid='".$_POST['majorid']."',locationid='".$_POST['locationid']."' WHERE idemployee='".$_POST['idemployee']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
	case "delete":
		$SQL = mysqli_query($con, "DELETE FROM employee WHERE idemployee='".$_POST['idemployee']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
} 
?>

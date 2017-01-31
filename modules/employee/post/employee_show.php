<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idemployee','nik','employeename','positionname','departmentname'); 
	$sIndexColumn = 'idemployee';
	$sTable = '(SELECT
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
				employee.positionid,
				position.positionname,
				employee.departmentid,
				department.departmentname,
				employee.taxstatus,
				employee.educationlevelid,
				educationlevel.educationlevelname,
				employee.basic,
				employee.postall,
				employee.allowance
				FROM
				employee
				LEFT JOIN position ON employee.positionid = position.idposition
				LEFT JOIN department ON employee.departmentid = department.iddepartment
				LEFT JOIN educationlevel ON employee.educationlevelid = educationlevel.ideducationlevel) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		$detail = '<a onclick="PopupCenterDual(\'winopen.php?mod=employee_detail&key='.$aRow['idemployee'].'\',\'NIGRAPHIC\',\'1200\',\'475\'); " href="javascript:void(0);"><button class="btn btn-default btn-xs"><i class="fa fa-folder-open"></i> Detail</button></a>';
		$btn = '<a href="#" onClick="showModals(\''.$aRow['idemployee'].'\')">Edit</a> | <a href="#" onClick="deleteData(\''.$aRow['idemployee'].'\')">Delete</a>';
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$row = array( $btn, $aRow['nik'], $aRow['employeename'], $aRow['positionname'], $aRow['departmentname']);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );
?>
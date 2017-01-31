<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idkey', 'registrationno', 'suppliername','address1','phone1','phone2','colorstatus','descstatus'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT
				supplier.idsupplier AS idkey,
				supplier.registrationno,
				supplier.registrationdate,
				supplier.suppliername,
				supplier.address1,
				supplier.address2,
				supplier.zipcode,
				supplier.phone1,
				supplier.phone2,
				supplier.fax,
				supplier.emailaddress,
				supplier.cityid,
				supplier.suppliertypeid,
				supplier.suppliergroupid,
				supplier.bankaccountid,
				supplier.reknumber,
				supplier.status,
				supplier.remark,
				CASE WHEN supplier.status = 0 THEN "green" ELSE "red" END AS colorstatus,
				CASE WHEN supplier.status = 0 THEN "Active" ELSE "Not Active" END AS descstatus
				FROM
				supplier) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		$status= '<span class="badge bg-'.$aRow['colorstatus'].'">'.$aRow['descstatus'].'</span>';
		$btn = '<a href="#" onClick="showModals(\''.$aRow['idkey'].'\')">Edit</a> | <a href="#" onClick="deleteData(\''.$aRow['idkey'].'\')">Delete</a>';
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$row = array( $btn, $aRow['registrationno'], $aRow['suppliername'], $aRow['address1'], $aRow['phone1'], $aRow['phone2'], $status);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>


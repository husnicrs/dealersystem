<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idkey', 'registrationno', 'customername','address1','phone1','phone2','customertypename','colorstatus','descstatus'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT
				customer.idcustomer AS idkey,
				customer.registrationno,
				customer.registrationdate,
				customer.customername,
				customer.address1,
				customer.address2,
				customer.zipcode,
				customer.phone1,
				customer.phone2,
				customer.fax,
				customer.emailaddress,
				customer.cityid,
				customer.customertypeid,
				customer.customergroupid,
				customer.bankaccountid,
				customer.reknumber,
				customer.status,
				customer.remark,
				customertype.customertypename,
				CASE WHEN customer.status = 0 THEN "green" ELSE "red" END AS colorstatus,
				CASE WHEN customer.status = 0 THEN "Active" ELSE "Not Active" END AS descstatus
				FROM
				customer LEFT JOIN customertype ON customer.customertypeid = customertype.idcustomertype) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		$status= '<span class="badge bg-'.$aRow['colorstatus'].'">'.$aRow['descstatus'].'</span>';
		$btn = '<a href="#" onClick="showModals(\''.$aRow['idkey'].'\')">Edit</a> | <a href="#" onClick="deleteData(\''.$aRow['idkey'].'\')">Delete</a>';
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$row = array( $btn, $aRow['registrationno'], $aRow['customername'], $aRow['customertypename'], $aRow['address1'], $aRow['phone1'], $aRow['phone2'], $status);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>


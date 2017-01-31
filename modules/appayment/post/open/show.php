<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../../lib/';
	$aColumns = array( 'idkey','suppliername','address1','cityname','phone1','amount','payamount','remainamount'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT
				purchaseorder.supplierid AS idkey,
				supplier.suppliercode,
				supplier.suppliername,
				supplier.phone1,
				supplier.hp1,
				supplier.emailaddress,
				supplier.address1,
				city.cityname,
				FORMAT(SUM(purchaseorder.totalamount),0) AS amount,
				FORMAT(SUM(purchaseorder.apamount),0) AS payamount,
				FORMAT(SUM(purchaseorder.totalamount-purchaseorder.apamount),0) AS remainamount
				FROM
				purchaseorder		
				INNER JOIN supplier ON purchaseorder.supplierid = supplier.idsupplier
				LEFT JOIN city ON supplier.cityid = city.idcity
				WHERE purchaseorder.totalamount-purchaseorder.apamount>0 AND purchaseorder.paytypeid=2
				GROUP BY 
				purchaseorder.supplierid,
				supplier.suppliercode,
				supplier.suppliername,
				supplier.phone1,
				supplier.hp1,
				supplier.emailaddress,
				supplier.fax,
				supplier.address1,
				city.cityname,
				supplier.zipcode) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		$btn = '<a href="index.php?mod=appayment_odetail&key='.$aRow['idkey'].'">'.$aRow['suppliername'].'</a>';
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$row = array($btn, $aRow['address1'], $aRow['cityname'], $aRow['phone1'], $aRow['amount'], $aRow['payamount'], $aRow['remainamount']);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>


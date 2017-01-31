<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../../lib/';
	$aColumns = array( 'idkey','suppliername','address1','cityname','zipcode','phone1','fax','emailaddress','remainqty'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT
				purchaseorder.supplierid AS idkey,
				supplier.suppliercode,
				supplier.suppliername,
				supplier.phone1,
				supplier.hp1,
				supplier.emailaddress,
				supplier.fax,
				supplier.address1,
				city.cityname,
				supplier.zipcode,
				SUM(purchaseorderdet.quantity-purchaseorderdet.grqty) AS remainqty
				FROM
				purchaseorder
				INNER JOIN supplier ON purchaseorder.supplierid = supplier.idsupplier
				LEFT JOIN city ON supplier.cityid = city.idcity
				INNER JOIN purchaseorderdet ON purchaseorder.idtrans = purchaseorderdet.transid
				WHERE purchaseorderdet.quantity-purchaseorderdet.grqty>0
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
		$btn = '<a href="index.php?mod=goodreceive_odetail&key='.$aRow['idkey'].'">'.$aRow['suppliername'].'</a>';
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$row = array($btn, $aRow['address1'], $aRow['cityname'], $aRow['zipcode'], $aRow['phone1'], $aRow['fax'], $aRow['emailaddress'], $aRow['remainqty']);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>


<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../../lib/';
	$aColumns = array( 'idkey','suppliername','address1','cityname','zipcode','phone1','fax','emailaddress'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT
				purchasebidding.supplierid AS idkey,
				supplier.suppliercode,
				supplier.suppliername,
				supplier.phone1,
				supplier.hp1,
				supplier.emailaddress,
				supplier.fax,
				supplier.address1,
				city.cityname,
				supplier.zipcode
				FROM
				purchasereq
				INNER JOIN purchasereqdet ON purchasereq.idtrans = purchasereqdet.transid
				INNER JOIN purchasebidding ON purchasereqdet.idtransdet = purchasebidding.transdetid
				INNER JOIN supplier ON purchasebidding.supplierid = supplier.idsupplier
				LEFT JOIN city ON supplier.cityid = city.idcity
				WHERE 
				purchasebidding.selected=1) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		$btn = '<a onclick="PopupCenterDual(\'winopen.php?mod=purchaseorder_odetail&key='.$aRow['idkey'].'\',\'NIGRAPHIC\',\'1320\',\'600\'); " href="javascript:void(0);">'.$aRow['suppliername'].'</a>';
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$row = array($btn, $aRow['address1'], $aRow['cityname'], $aRow['zipcode'], $aRow['phone1'], $aRow['fax'], $aRow['emailaddress']);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>


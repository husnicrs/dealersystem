	<?php
	include_once 'Database.php';
	class rptlbbwalkin {
    private $db ='';
    private $data;
    public function __construct(){
        $this->db = new Database();
    }

	function show_pjr($rptdatefrom, $rptdateto){
		$rptdatefrom = $_POST['rptdatefrom']; 
		$date = str_replace('/', '-', $rptdatefrom);
		$rptdatefrom = date('Y-m-d', strtotime($date));
		
		$rptdateto = $_POST['rptdateto']; 
		$date = str_replace('/', '-', $rptdateto);
		$rptdateto = date('Y-m-d', strtotime($date));
		
        $sql = "SELECT
					pjrsw.vehliceservicetype_pjr,
					pjrsw.subtotal__pjr,
					pppsw.inventorygroupname_ppp,
					pppsw.amount_ppp,
					pppsw1.inventorygroupname_ppp2,
					pppsw1.amount_ppp2
				FROM
					(
						SELECT
							(@cnt := @cnt + 1) AS rownumber,
							ppp.inventorygroupname_ppp,
							ppp.amount_ppp
						FROM
							(
								SELECT
									inventorygroupname_ppp,
									SUM(amount_ppp) AS amount_ppp
								FROM
									(
										SELECT
											'Oli' AS inventorygroupname_ppp,
											SUM(
												salesorderdet.amount
											) AS amount_ppp
										FROM
											salesorder
										INNER JOIN salesorderdet ON salesorderdet.transid = salesorder.idtrans
										LEFT JOIN inventorygroupdet ON salesorderdet.inventoryid = inventorygroupdet.inventoryid
										LEFT JOIN inventorygroup ON inventorygroupdet.inventorygroupid = inventorygroup.idinventorygroup
										WHERE
											inventorygroup.inventorygroupname = 'OLI AHM' AND salesorder.datetrans BETWEEN :rptdatefrom AND :rptdateto AND salesorder.status <> 10
										UNION ALL
											SELECT
												'Oli' AS inventorygroupname_ppp,
												SUM(
													salesservicedet.amount
												) AS amount_ppp
											FROM
												salesservice
											INNER JOIN salesservicedet ON salesservicedet.transid = salesservice.idtrans
											LEFT JOIN inventorygroupdet ON salesservicedet.inventoryid = inventorygroupdet.inventoryid
											LEFT JOIN inventorygroup ON inventorygroupdet.inventorygroupid = inventorygroup.idinventorygroup
											WHERE
												inventorygroup.inventorygroupname = 'OLI AHM' AND salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto
									) AS oli
								UNION ALL
									SELECT
										inventorygroupname_ppp,
										SUM(amount_ppp) AS amount_ppp
									FROM
										(
											SELECT
												'Ban (luar & dalam)' AS inventorygroupname_ppp,
												SUM(
													salesorderdet.amount
												) AS amount_ppp
											FROM
												salesorder
											INNER JOIN salesorderdet ON salesorderdet.transid = salesorder.idtrans
											LEFT JOIN inventorygroupdet ON salesorderdet.inventoryid = inventorygroupdet.inventoryid
											LEFT JOIN inventorygroup ON inventorygroupdet.inventorygroupid = inventorygroup.idinventorygroup
											WHERE
												inventorygroup.inventorygroupname = 'Ban' AND salesorder.datetrans BETWEEN :rptdatefrom AND :rptdateto AND salesorder.status <> 10
											UNION ALL
												SELECT
													'Ban (luar & dalam)' AS inventorygroupname_ppp,
													SUM(
														salesservicedet.amount
													) AS amount_ppp
												FROM
													salesservice
												INNER JOIN salesservicedet ON salesservicedet.transid = salesservice.idtrans
												LEFT JOIN inventorygroupdet ON salesservicedet.inventoryid = inventorygroupdet.inventoryid
												LEFT JOIN inventorygroup ON inventorygroupdet.inventorygroupid = inventorygroup.idinventorygroup
												WHERE
													inventorygroup.inventorygroupname = 'Ban' AND salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto 
										) AS ban
									UNION ALL
										SELECT
											inventorygroupname_ppp,
											SUM(amount_ppp) AS amount_ppp
										FROM
											(
												SELECT
													'Busi' AS inventorygroupname_ppp,
													SUM(
														salesorderdet.amount
													) AS amount_ppp
												FROM
													salesorder
												INNER JOIN salesorderdet ON salesorderdet.transid = salesorder.idtrans
												LEFT JOIN inventorygroupdet ON salesorderdet.inventoryid = inventorygroupdet.inventoryid
												LEFT JOIN inventorygroup ON inventorygroupdet.inventorygroupid = inventorygroup.idinventorygroup
												WHERE
													inventorygroup.inventorygroupname = 'Busi' AND salesorder.datetrans BETWEEN :rptdatefrom AND :rptdateto AND salesorder.status <> 10
												UNION ALL
													SELECT
														'Busi' AS inventorygroupname_ppp,
														SUM(
															salesservicedet.amount
														) AS amount_ppp
													FROM
														salesservice
													INNER JOIN salesservicedet ON salesservicedet.transid = salesservice.idtrans
													LEFT JOIN inventorygroupdet ON salesservicedet.inventoryid = inventorygroupdet.inventoryid
													LEFT JOIN inventorygroup ON inventorygroupdet.inventorygroupid = inventorygroup.idinventorygroup
													WHERE
														inventorygroup.inventorygroupname = 'Busi' AND salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto
											) AS busi
										UNION ALL
											SELECT
												inventorygroupname_ppp,
												SUM(amount_ppp) AS amount_ppp
											FROM
												(
													SELECT
														'Aki / Batere' AS inventorygroupname_ppp,
														SUM(
															salesorderdet.amount
														) AS amount_ppp
													FROM
														salesorder
													INNER JOIN salesorderdet ON salesorderdet.transid = salesorder.idtrans
													LEFT JOIN inventorygroupdet ON salesorderdet.inventoryid = inventorygroupdet.inventoryid
													LEFT JOIN inventorygroup ON inventorygroupdet.inventorygroupid = inventorygroup.idinventorygroup
													WHERE
														inventorygroup.inventorygroupname = 'Aki' AND salesorder.datetrans BETWEEN :rptdatefrom AND :rptdateto AND salesorder.status <> 10
													UNION ALL
														SELECT
															'Aki / Batere' AS inventorygroupname_ppp,
															SUM(
																salesservicedet.amount
															) AS amount_ppp
														FROM
															salesservice
														INNER JOIN salesservicedet ON salesservicedet.transid = salesservice.idtrans
														LEFT JOIN inventorygroupdet ON salesservicedet.inventoryid = inventorygroupdet.inventoryid
														LEFT JOIN inventorygroup ON inventorygroupdet.inventorygroupid = inventorygroup.idinventorygroup
														WHERE
															inventorygroup.inventorygroupname = 'Aki' AND salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto
												) AS aki
											UNION ALL
												SELECT
													inventorygroupname_ppp,
													SUM(amount_ppp) AS amount_ppp
												FROM
													(
														SELECT
															'Kanvas Rem' AS inventorygroupname_ppp,
															SUM(
																salesorderdet.amount
															) AS amount_ppp
														FROM
															salesorder
														INNER JOIN salesorderdet ON salesorderdet.transid = salesorder.idtrans
														LEFT JOIN inventorygroupdet ON salesorderdet.inventoryid = inventorygroupdet.inventoryid
														LEFT JOIN inventorygroup ON inventorygroupdet.inventorygroupid = inventorygroup.idinventorygroup
														WHERE
															inventorygroup.inventorygroupname = 'Kamvas Rem' AND salesorder.datetrans BETWEEN :rptdatefrom AND :rptdateto AND salesorder.status <> 10
														UNION ALL
															SELECT
																'Kanvas Rem' AS inventorygroupname_ppp,
																SUM(
																	salesservicedet.amount
																) AS amount_ppp
															FROM
																salesservice
															INNER JOIN salesservicedet ON salesservicedet.transid = salesservice.idtrans
															LEFT JOIN inventorygroupdet ON salesservicedet.inventoryid = inventorygroupdet.inventoryid
															LEFT JOIN inventorygroup ON inventorygroupdet.inventorygroupid = inventorygroup.idinventorygroup
															WHERE
																inventorygroup.inventorygroupname = 'Kamvas Rem' AND salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto
													) AS kanvasrem
							) ppp
						CROSS JOIN (SELECT @cnt := 0) AS dummy
												
											) AS pppsw
										LEFT JOIN (
											SELECT
							(@cnt2 := @cnt2 + 1) AS rownumber2,
							ppp2.inventorygroupname_ppp2,
							ppp2.amount_ppp2
						FROM
							(
								SELECT
									inventorygroupname_ppp2,
									SUM(amount_ppp2) AS amount_ppp2
								FROM
									(
										SELECT
											'CVT belt' AS inventorygroupname_ppp2,
											SUM(
												salesorderdet.amount
											) AS amount_ppp2
										FROM
											salesorder
										INNER JOIN salesorderdet ON salesorderdet.transid = salesorder.idtrans
										LEFT JOIN inventorygroupdet ON salesorderdet.inventoryid = inventorygroupdet.inventoryid
										LEFT JOIN inventorygroup ON inventorygroupdet.inventorygroupid = inventorygroup.idinventorygroup
										WHERE
											inventorygroup.inventorygroupname = 'CVT Belt' AND salesorder.datetrans BETWEEN :rptdatefrom AND :rptdateto AND salesorder.status <> 10
										UNION ALL
											SELECT
												'CVT Belt' AS inventorygroupname_ppp2,
												SUM(
													salesservicedet.amount
												) AS amount_ppp2
											FROM
												salesservice
											INNER JOIN salesservicedet ON salesservicedet.transid = salesservice.idtrans
											LEFT JOIN inventorygroupdet ON salesservicedet.inventoryid = inventorygroupdet.inventoryid
											LEFT JOIN inventorygroup ON inventorygroupdet.inventorygroupid = inventorygroup.idinventorygroup
											WHERE
												inventorygroup.inventorygroupname = 'CVT Belt' AND salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto
									) AS oli
								UNION ALL
									SELECT
										inventorygroupname_ppp2,
										SUM(amount_ppp2) AS amount_ppp2
									FROM
										(
											SELECT
												'Radiator Collant' AS inventorygroupname_ppp2,
												SUM(
													salesorderdet.amount
												) AS amount_ppp2
											FROM
												salesorder
											INNER JOIN salesorderdet ON salesorderdet.transid = salesorder.idtrans
											LEFT JOIN inventorygroupdet ON salesorderdet.inventoryid = inventorygroupdet.inventoryid
											LEFT JOIN inventorygroup ON inventorygroupdet.inventorygroupid = inventorygroup.idinventorygroup
											WHERE
												inventorygroup.inventorygroupname = 'Radiator Collant' AND salesorder.datetrans BETWEEN :rptdatefrom AND :rptdateto AND salesorder.status <> 10
											UNION ALL
												SELECT
													'Radiator Collant' AS inventorygroupname_ppp2,
													SUM(
														salesservicedet.amount
													) AS amount_ppp2
												FROM
													salesservice
												INNER JOIN salesservicedet ON salesservicedet.transid = salesservice.idtrans
												LEFT JOIN inventorygroupdet ON salesservicedet.inventoryid = inventorygroupdet.inventoryid
												LEFT JOIN inventorygroup ON inventorygroupdet.inventorygroupid = inventorygroup.idinventorygroup
												WHERE
													inventorygroup.inventorygroupname = 'Radiator Collant' AND salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto
										) AS ban
									UNION ALL
										SELECT
											inventorygroupname_ppp2,
											SUM(amount_ppp2) AS amount_ppp2
										FROM
											(
												SELECT
													'Rantai' AS inventorygroupname_ppp2,
													SUM(
														salesorderdet.amount
													) AS amount_ppp2
												FROM
													salesorder
												INNER JOIN salesorderdet ON salesorderdet.transid = salesorder.idtrans
												LEFT JOIN inventorygroupdet ON salesorderdet.inventoryid = inventorygroupdet.inventoryid
												LEFT JOIN inventorygroup ON inventorygroupdet.inventorygroupid = inventorygroup.idinventorygroup
												WHERE
													inventorygroup.inventorygroupname = 'Rantai' AND salesorder.datetrans BETWEEN :rptdatefrom AND :rptdateto AND salesorder.status <> 10
												UNION ALL
													SELECT
														'Rantai' AS inventorygroupname_ppp2,
														SUM(
															salesservicedet.amount
														) AS amount_ppp2
													FROM
														salesservice
													INNER JOIN salesservicedet ON salesservicedet.transid = salesservice.idtrans
													LEFT JOIN inventorygroupdet ON salesservicedet.inventoryid = inventorygroupdet.inventoryid
													LEFT JOIN inventorygroup ON inventorygroupdet.inventorygroupid = inventorygroup.idinventorygroup
													WHERE
														inventorygroup.inventorygroupname = 'Rantai' AND salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto
											) AS busi
										UNION ALL
											SELECT
												inventorygroupname_ppp2,
												SUM(amount_ppp2) AS amount_ppp2
											FROM
												(
													SELECT
														'Filter Udara' AS inventorygroupname_ppp2,
														SUM(
															salesorderdet.amount
														) AS amount_ppp2
													FROM
														salesorder
													INNER JOIN salesorderdet ON salesorderdet.transid = salesorder.idtrans
													LEFT JOIN inventorygroupdet ON salesorderdet.inventoryid = inventorygroupdet.inventoryid
													LEFT JOIN inventorygroup ON inventorygroupdet.inventorygroupid = inventorygroup.idinventorygroup
													WHERE
														inventorygroup.inventorygroupname = 'Filter Udara' AND salesorder.datetrans BETWEEN :rptdatefrom AND :rptdateto AND salesorder.status <> 10
													UNION ALL
														SELECT
															'Filter Udara' AS inventorygroupname_ppp2,
															SUM(
																salesservicedet.amount
															) AS amount_ppp2
														FROM
															salesservice
														INNER JOIN salesservicedet ON salesservicedet.transid = salesservice.idtrans
														LEFT JOIN inventorygroupdet ON salesservicedet.inventoryid = inventorygroupdet.inventoryid
														LEFT JOIN inventorygroup ON inventorygroupdet.inventorygroupid = inventorygroup.idinventorygroup
														WHERE
															inventorygroup.inventorygroupname = 'Filter Udara' AND salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto
												) AS aki
											UNION ALL
												SELECT
													inventorygroupname_ppp2,
													SUM(amount_ppp2) AS amount_ppp2
												FROM
													(
														SELECT
															'Others' AS inventorygroupname_ppp2,
															SUM(
																salesorderdet.amount
															) AS amount_ppp2
														FROM
															salesorder
														INNER JOIN salesorderdet ON salesorderdet.transid = salesorder.idtrans
														LEFT JOIN inventorygroupdet ON salesorderdet.inventoryid = inventorygroupdet.inventoryid
														LEFT JOIN inventorygroup ON inventorygroupdet.inventorygroupid = inventorygroup.idinventorygroup
														WHERE
															(inventorygroup.inventorygroupname = 'Others' OR inventorygroup.inventorygroupname = ''
																						OR inventorygroup.inventorygroupname IS NULL) AND (salesorder.datetrans BETWEEN :rptdatefrom AND :rptdateto) AND (salesorder.status <> 10)
														UNION ALL
															SELECT
																'Others' AS inventorygroupname_ppp2,
																SUM(
																	salesservicedet.amount
																) AS amount_ppp2
															FROM
																salesservice
															INNER JOIN salesservicedet ON salesservicedet.transid = salesservice.idtrans
															LEFT JOIN inventorygroupdet ON salesservicedet.inventoryid = inventorygroupdet.inventoryid
															LEFT JOIN inventorygroup ON inventorygroupdet.inventorygroupid = inventorygroup.idinventorygroup
															WHERE
																(inventorygroup.inventorygroupname = 'Others' OR inventorygroup.inventorygroupname = ''
																						OR inventorygroup.inventorygroupname IS NULL)  AND (salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto)
													) AS kanvasrem
							) ppp2
						CROSS JOIN (SELECT @cnt2 := 0) AS dummy2
											
										) AS pppsw1 ON pppsw.rownumber = pppsw1.rownumber2
										LEFT JOIN (
											SELECT
												(@cnt1 := @cnt1 + 1) AS rownumber1,
												pjr.vehliceservicetype_pjr,
												pjr.subtotal__pjr
											FROM
												(
													SELECT
														'Jasa KPB/ASS' AS vehliceservicetype_pjr,
														SUM(salesservicedet2.unitprice) AS subtotal__pjr
													FROM
														salesservice
													INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
													INNER JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice
													WHERE
														vehicleservice.vehliceservicetype = 'KPB'  AND salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto
													UNION ALL
														SELECT
															'Jasa Claim C2' AS vehliceservicetype_pjr,
															SUM(salesservicedet2.subtotal) AS subtotal__pjr
														FROM
															salesservice
														INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
														INNER JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice
														WHERE
															vehicleservice.vehliceservicetype = 'Claim' AND salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto
														UNION ALL
															SELECT
																'Jasa Quick Service (QS)' AS vehliceservicetype_pjr,
																SUM(salesservicedet2.subtotal) AS subtotal__pjr
															FROM
																salesservice
															INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
															INNER JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice
															WHERE
																(vehicleservice.vehliceservicetype = 'QS' OR vehicleservice.vehliceservicetype = 'OR+' OR vehicleservice.vehliceservicetype = 'LS') AND (salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto)
															UNION ALL
																SELECT
																	'Jasa Light Repair (LR)' AS vehliceservicetype_pjr,
																	SUM(salesservicedet2.subtotal) AS subtotal__pjr
																FROM
																	salesservice
																INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
																INNER JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice
																WHERE
																	vehicleservice.vehliceservicetype = 'LR' AND salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto
																UNION ALL
																	SELECT
																		'Jasa Heavy Repair (HR)' AS vehliceservicetype_pjr,
																		SUM(salesservicedet2.subtotal) AS subtotal__pjr
																	FROM
																		salesservice
																	INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
																	INNER JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice
																	WHERE
																		vehicleservice.vehliceservicetype = 'HR' AND salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto
											
						) AS pjr
					CROSS JOIN (SELECT @cnt1 := 0) AS dummy1
				) AS pjrsw ON pppsw.rownumber = pjrsw.rownumber1";
						$arrData = array(':rptdatefrom' => $rptdatefrom, ':rptdateto' => $rptdateto);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
	
	
	
	function showtotal_pjr($rptdatefrom, $rptdateto){
		$rptdatefrom = $_POST['rptdatefrom']; 
		$date = str_replace('/', '-', $rptdatefrom);
		$rptdatefrom = date('Y-m-d', strtotime($date));
		
		$rptdateto = $_POST['rptdateto']; 
		$date = str_replace('/', '-', $rptdateto);
		$rptdateto = date('Y-m-d', strtotime($date));
		
        $sql = "SELECT
					SUM(pjr.subtotal__pjr) AS tsubtotal__pjr,
					SUM(ppp.amount_ppp) AS tamount_ppp,
					SUM(IFNULL(pjr.subtotal__pjr,0)+IFNULL(ppp.amount_ppp,0)) AS tpjrppp
				FROM
					(
						SELECT
							(@cnt := @cnt + 1) AS rownumber,
							SUM(DERIVED.subtotal__pjr) AS subtotal__pjr
						FROM
							(
								SELECT
									SUM(salesservicedet2.unitprice) AS subtotal__pjr
								FROM
									salesservice
								INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
								INNER JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice
								WHERE
									vehicleservice.vehliceservicetype = 'KPB' AND salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto
								UNION ALL
									SELECT
										SUM(salesservicedet2.subtotal) AS subtotal__pjr
									FROM
										salesservice
									INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
									INNER JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice
									WHERE
										vehicleservice.vehliceservicetype <> 'KPB' AND salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto
							) DERIVED
						CROSS JOIN (SELECT @cnt := 0) AS dummy
					
					) pjr
				RIGHT JOIN (
					SELECT
			 (@cnt1 := @cnt1 + 1) AS rownumber1,
			SUM(amount_ppp) AS amount_ppp
		FROM
			(SELECT
					 
					SUM(
						salesorderdet.amount
					) AS amount_ppp
				FROM
					salesorder
				INNER JOIN salesorderdet ON salesorderdet.transid = salesorder.idtrans
				LEFT JOIN inventorygroupdet ON salesorderdet.inventoryid = inventorygroupdet.inventoryid
				LEFT JOIN inventorygroup ON inventorygroupdet.inventorygroupid = inventorygroup.idinventorygroup
				 WHERE salesorder.datetrans BETWEEN :rptdatefrom AND :rptdateto  AND salesorder.status <> 10
				UNION ALL
					SELECT
						 
						SUM(
							salesservicedet.amount
						) AS amount_ppp
					FROM
						salesservice
					INNER JOIN salesservicedet ON salesservicedet.transid = salesservice.idtrans
					LEFT JOIN inventorygroupdet ON salesservicedet.inventoryid = inventorygroupdet.inventoryid
					LEFT JOIN inventorygroup ON inventorygroupdet.inventorygroupid = inventorygroup.idinventorygroup
					WHERE salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto) AS DRIVEDTBL
CROSS JOIN (SELECT @cnt1 := 0) AS dummy
					 
					
				) AS ppp ON pjr.rownumber = ppp.rownumber1";
						$arrData = array(':rptdatefrom' => $rptdatefrom, ':rptdateto' => $rptdateto);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
	function show_unit($rptdatefrom, $rptdateto){
		$rptdatefrom = $_POST['rptdatefrom']; 
		$date = str_replace('/', '-', $rptdatefrom);
		$rptdatefrom = date('Y-m-d', strtotime($date));
		
		$rptdateto = $_POST['rptdateto']; 
		$date = str_replace('/', '-', $rptdateto);
		$rptdateto = date('Y-m-d', strtotime($date));
		
        $sql = "SELECT 

				qtymodel.vahiclejenis, 
				
				SUM(IFNULL(qtykpb1.qtykpb1,0) + IFNULL(qtykpb2.qtykpb2,0)+ IFNULL(qtykpb3.qtykpb3,0)+ IFNULL(qtykpb4.qtykpb4,0)+ IFNULL(qtyc2.qtyc2,0)+ IFNULL(qtycs.qtycs,0)+ IFNULL(qtyls.qtyls,0)+ IFNULL(qtyqrplus.qtyqrplus,0)) AS sumqtyentry,
				SUM(IFNULL(qtykpb1.qtykpb1,0))  AS sumqtykpb1,
				SUM(IFNULL(qtykpb2.qtykpb2,0))  AS sumqtykpb2,
				SUM(IFNULL(qtykpb3.qtykpb3,0))  AS sumqtykpb3,
				SUM(IFNULL(qtykpb4.qtykpb4,0))  AS sumqtykpb4,
				SUM(IFNULL(qtyc2.qtyc2,0))  AS sumqtyc2,
				SUM(IFNULL(qtycs.qtycs,0))  AS sumqtycs,
				SUM(IFNULL(qtyls.qtyls,0))  AS sumqtyls,
				SUM(IFNULL(qtyqrplus.qtyqrplus,0))  AS sumqtyqrplus,
				SUM(IFNULL(qtylr.qtylr,0))  AS sumqtylr,
				SUM(IFNULL(qtyhr.qtyhr,0))  AS sumqtyhr,
				SUM(IFNULL(qtymodel.totalqty,0))  AS sumtotalqty,
				
				GROUP_CONCAT(REPLACE(qtymodel.vehiclemodel,',',' '))   AS vehiclemodel,
				GROUP_CONCAT(REPLACE(IFNULL(qtykpb1.qtykpb1,0) + IFNULL(qtykpb2.qtykpb2,0)+ IFNULL(qtykpb3.qtykpb3,0)+ IFNULL(qtykpb4.qtykpb4,0)+ IFNULL(qtyc2.qtyc2,0)+ IFNULL(qtycs.qtycs,0)+ IFNULL(qtyls.qtyls,0)+ IFNULL(qtyqrplus.qtyqrplus,0),',',' ')) AS qtyentry,
				GROUP_CONCAT(REPLACE(IFNULL(qtykpb1.qtykpb1,0),',',' '))  AS qtykpb1,
				GROUP_CONCAT(REPLACE(IFNULL(qtykpb2.qtykpb2,0),',',' '))  AS qtykpb2,
				GROUP_CONCAT(REPLACE(IFNULL(qtykpb3.qtykpb3,0),',',' '))  AS qtykpb3,
				GROUP_CONCAT(REPLACE(IFNULL(qtykpb4.qtykpb4,0),',',' '))  AS qtykpb4,
				GROUP_CONCAT(REPLACE(IFNULL(qtyc2.qtyc2,0),',',' '))  AS qtyc2,
				GROUP_CONCAT(REPLACE(IFNULL(qtycs.qtycs,0),',',' '))  AS qtycs,
				GROUP_CONCAT(REPLACE(IFNULL(qtyls.qtyls,0),',',' '))  AS qtyls,
				GROUP_CONCAT(REPLACE(IFNULL(qtyqrplus.qtyqrplus,0),',',' '))  AS qtyqrplus,
				GROUP_CONCAT(REPLACE(IFNULL(qtylr.qtylr,0),',',' '))  AS qtylr,
				GROUP_CONCAT(REPLACE(IFNULL(qtyhr.qtyhr,0),',',' '))  AS qtyhr,
				GROUP_CONCAT(REPLACE(IFNULL(qtymodel.totalqty,0),',',' '))  AS totalqty
				
				 FROM 
				(
				SELECT
				salesservice.vehiclemodel AS vehiclemodel,
				Count(salesservice.idtrans) AS totalqty,
				salesservice.vahiclejenis
				FROM
				salesservice
				INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
				INNER JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice
				WHERE salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto
				GROUP BY 
				salesservice.vehiclemodel,
				salesservice.vahiclejenis
				
				) AS qtymodel
				
				
				
				
				LEFT JOIN
				
				(
				SELECT
				Count(salesservicedet2.idtransdet) AS qtykpb1,
				salesservice.vehiclemodel
				FROM
				salesservice
				INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
				INNER JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice
				WHERE vehicleservice.vehicleservicename='1'  AND vehicleservice.vehliceservicetype='KPB'
				AND salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto
				GROUP BY 
				salesservice.vehiclemodel
				
				) AS qtykpb1 ON qtymodel.vehiclemodel=qtykpb1.vehiclemodel
				
				
				
				
				LEFT JOIN
				
				(
				SELECT
				Count(salesservicedet2.idtransdet) AS qtykpb2,
				salesservice.vehiclemodel
				FROM
				salesservice
				INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
				INNER JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice
				WHERE vehicleservice.vehicleservicename='2'  AND vehicleservice.vehliceservicetype='KPB'
				AND salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto
				GROUP BY 
				salesservice.vehiclemodel
				
				) AS qtykpb2 ON qtymodel.vehiclemodel=qtykpb2.vehiclemodel
				
				
				
				LEFT JOIN
				
				(
				SELECT
				Count(salesservicedet2.idtransdet) AS qtykpb3,
				salesservice.vehiclemodel
				FROM
				salesservice
				INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
				INNER JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice
				WHERE vehicleservice.vehicleservicename='2'  AND vehicleservice.vehliceservicetype='KPB'
				AND salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto
				GROUP BY 
				salesservice.vehiclemodel
				
				
				) AS qtykpb3 ON qtymodel.vehiclemodel=qtykpb3.vehiclemodel
				
				
				LEFT JOIN
				
				(
				SELECT
				Count(salesservicedet2.idtransdet) AS qtykpb4,
				salesservice.vehiclemodel
				FROM
				salesservice
				INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
				INNER JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice
				WHERE vehicleservice.vehicleservicename='4'  AND vehicleservice.vehliceservicetype='KPB'
				AND salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto
				GROUP BY 
				salesservice.vehiclemodel
				
				) AS qtykpb4 ON qtymodel.vehiclemodel=qtykpb4.vehiclemodel
				
				
				LEFT JOIN
				
				(
				SELECT
				Count(salesservicedet2.idtransdet) AS qtyc2,
				salesservice.vehiclemodel
				FROM
				salesservice
				INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
				INNER JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice
				WHERE vehicleservice.vehliceservicetype='Claim'
				AND salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto
				GROUP BY 
				salesservice.vehiclemodel
				
				)  AS qtyc2 ON qtymodel.vehiclemodel=qtyc2.vehiclemodel
				
				
				
				
				LEFT JOIN
				
				(
				SELECT
				Count(salesservicedet2.idtransdet) AS qtycs,
				salesservice.vehiclemodel
				FROM
				salesservice
				INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
				INNER JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice
				WHERE vehicleservice.vehliceservicetype='QS'
				AND salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto
				GROUP BY 
				salesservice.vehiclemodel
				
				)  AS qtycs ON qtymodel.vehiclemodel=qtycs.vehiclemodel
				
				LEFT JOIN
				
				(
				SELECT
				Count(salesservicedet2.idtransdet) AS qtyls,
				salesservice.vehiclemodel
				FROM
				salesservice
				INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
				INNER JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice
				WHERE vehicleservice.vehliceservicetype='LS'
				AND salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto
				GROUP BY 
				salesservice.vehiclemodel
				
				)  AS qtyls ON qtymodel.vehiclemodel=qtyls.vehiclemodel
				
				
				LEFT JOIN
				
				(
				SELECT
				Count(salesservicedet2.idtransdet) AS qtyqrplus,
				salesservice.vehiclemodel
				FROM
				salesservice
				INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
				INNER JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice
				WHERE vehicleservice.vehliceservicetype='OR+'
				AND salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto
				GROUP BY 
				salesservice.vehiclemodel
				
				)  AS qtyqrplus ON qtymodel.vehiclemodel=qtyqrplus.vehiclemodel
				
				
				LEFT JOIN
				
				(
				SELECT
				Count(salesservicedet2.idtransdet) AS qtylr,
				salesservice.vehiclemodel
				FROM
				salesservice
				INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
				INNER JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice
				WHERE vehicleservice.vehliceservicetype='LR'
				AND salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto
				GROUP BY 
				salesservice.vehiclemodel
				
				)  AS qtylr ON qtymodel.vehiclemodel=qtylr.vehiclemodel
				
				LEFT JOIN
				
				(
				SELECT
				Count(salesservicedet2.idtransdet) AS qtyhr,
				salesservice.vehiclemodel
				FROM
				salesservice
				INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
				INNER JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice
				WHERE vehicleservice.vehliceservicetype='HR'
				AND salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto
				GROUP BY 
				salesservice.vehiclemodel
				
				)  AS qtyhr ON qtymodel.vehiclemodel=qtyhr.vehiclemodel
				
				GROUP BY qtymodel.vahiclejenis";
						$arrData = array(':rptdatefrom' => $rptdatefrom, ':rptdateto' => $rptdateto);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
	
	
	function show_totalunit($rptdatefrom, $rptdateto){
		$rptdatefrom = $_POST['rptdatefrom']; 
		$date = str_replace('/', '-', $rptdatefrom);
		$rptdatefrom = date('Y-m-d', strtotime($date));
		
		$rptdateto = $_POST['rptdateto']; 
		$date = str_replace('/', '-', $rptdateto);
		$rptdateto = date('Y-m-d', strtotime($date));
		
        $sql = "SELECT 

				SUM(IFNULL(qtykpb1.qtykpb1,0) + IFNULL(qtykpb2.qtykpb2,0)+ IFNULL(qtykpb3.qtykpb3,0)+ IFNULL(qtykpb4.qtykpb4,0)+ IFNULL(qtyc2.qtyc2,0)+ IFNULL(qtycs.qtycs,0)+ IFNULL(qtyls.qtyls,0)+ IFNULL(qtyqrplus.qtyqrplus,0)) AS tsumqtyentry,
				SUM(IFNULL(qtykpb1.qtykpb1,0))  AS tsumqtykpb1,
				SUM(IFNULL(qtykpb2.qtykpb2,0))  AS tsumqtykpb2,
				SUM(IFNULL(qtykpb3.qtykpb3,0))  AS tsumqtykpb3,
				SUM(IFNULL(qtykpb4.qtykpb4,0))  AS tsumqtykpb4,
				SUM(IFNULL(qtyc2.qtyc2,0))  AS tsumqtyc2,
				SUM(IFNULL(qtycs.qtycs,0))  AS tsumqtycs,
				SUM(IFNULL(qtyls.qtyls,0))  AS tsumqtyls,
				SUM(IFNULL(qtyqrplus.qtyqrplus,0))  AS tsumqtyqrplus,
				SUM(IFNULL(qtylr.qtylr,0))  AS tsumqtylr,
				SUM(IFNULL(qtyhr.qtyhr,0))  AS tsumqtyhr,
				SUM(IFNULL(qtymodel.totalqty,0))  AS tsumtotalqty
				
				 FROM 
				(
				SELECT
				salesservice.vehiclemodel AS vehiclemodel,
				Count(salesservice.idtrans) AS totalqty,
				salesservice.vahiclejenis
				FROM
				salesservice
				INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
				INNER JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice
				WHERE salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto
				GROUP BY 
				salesservice.vehiclemodel,
				salesservice.vahiclejenis
				
				) AS qtymodel
				
				
				
				
				LEFT JOIN
				
				(
				SELECT
				Count(salesservicedet2.idtransdet) AS qtykpb1,
				salesservice.vehiclemodel
				FROM
				salesservice
				INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
				INNER JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice
				WHERE vehicleservice.vehicleservicename='1'  AND vehicleservice.vehliceservicetype='KPB'
				AND salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto
				GROUP BY 
				salesservice.vehiclemodel
				
				) AS qtykpb1 ON qtymodel.vehiclemodel=qtykpb1.vehiclemodel
				
				
				
				
				LEFT JOIN
				
				(
				SELECT
				Count(salesservicedet2.idtransdet) AS qtykpb2,
				salesservice.vehiclemodel
				FROM
				salesservice
				INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
				INNER JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice
				WHERE vehicleservice.vehicleservicename='2'  AND vehicleservice.vehliceservicetype='KPB'
				AND salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto
				GROUP BY 
				salesservice.vehiclemodel
				
				) AS qtykpb2 ON qtymodel.vehiclemodel=qtykpb2.vehiclemodel
				
				
				
				LEFT JOIN
				
				(
				SELECT
				Count(salesservicedet2.idtransdet) AS qtykpb3,
				salesservice.vehiclemodel
				FROM
				salesservice
				INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
				INNER JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice
				WHERE vehicleservice.vehicleservicename='3'  AND vehicleservice.vehliceservicetype='KPB'
				AND salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto
				GROUP BY 
				salesservice.vehiclemodel
				
				
				) AS qtykpb3 ON qtymodel.vehiclemodel=qtykpb3.vehiclemodel
				
				
				LEFT JOIN
				
				(
				SELECT
				Count(salesservicedet2.idtransdet) AS qtykpb4,
				salesservice.vehiclemodel
				FROM
				salesservice
				INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
				INNER JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice
				WHERE vehicleservice.vehicleservicename='4'  AND vehicleservice.vehliceservicetype='KPB'
				AND salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto
				GROUP BY 
				salesservice.vehiclemodel
				
				) AS qtykpb4 ON qtymodel.vehiclemodel=qtykpb4.vehiclemodel
				
				
				LEFT JOIN
				
				(
				SELECT
				Count(salesservicedet2.idtransdet) AS qtyc2,
				salesservice.vehiclemodel
				FROM
				salesservice
				INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
				INNER JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice
				WHERE vehicleservice.vehliceservicetype='Claim'
				AND salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto
				GROUP BY 
				salesservice.vehiclemodel
				
				)  AS qtyc2 ON qtymodel.vehiclemodel=qtyc2.vehiclemodel
				
				
				
				
				LEFT JOIN
				
				(
				SELECT
				Count(salesservicedet2.idtransdet) AS qtycs,
				salesservice.vehiclemodel
				FROM
				salesservice
				INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
				INNER JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice
				WHERE vehicleservice.vehliceservicetype='QS'
				AND salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto
				GROUP BY 
				salesservice.vehiclemodel
				
				)  AS qtycs ON qtymodel.vehiclemodel=qtycs.vehiclemodel
				
				LEFT JOIN
				
				(
				SELECT
				Count(salesservicedet2.idtransdet) AS qtyls,
				salesservice.vehiclemodel
				FROM
				salesservice
				INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
				INNER JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice
				WHERE vehicleservice.vehliceservicetype='LS'
				AND salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto
				GROUP BY 
				salesservice.vehiclemodel
				
				)  AS qtyls ON qtymodel.vehiclemodel=qtyls.vehiclemodel
				
				
				LEFT JOIN
				
				(
				SELECT
				Count(salesservicedet2.idtransdet) AS qtyqrplus,
				salesservice.vehiclemodel
				FROM
				salesservice
				INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
				INNER JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice
				WHERE vehicleservice.vehliceservicetype='OR+'
				AND salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto
				GROUP BY 
				  salesservice.vehiclemodel
				
				)  AS qtyqrplus ON qtymodel.vehiclemodel=qtyqrplus.vehiclemodel
				
				
				LEFT JOIN
				
				(
				SELECT
				Count(salesservicedet2.idtransdet) AS qtylr,
				salesservice.vehiclemodel
				FROM
				salesservice
				INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
				INNER JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice
				WHERE vehicleservice.vehliceservicetype='LR'
				AND salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto
				GROUP BY 
				salesservice.vehiclemodel
				
				)  AS qtylr ON qtymodel.vehiclemodel=qtylr.vehiclemodel
				
				LEFT JOIN
				
				(
				SELECT
				Count(salesservicedet2.idtransdet) AS qtyhr,
				salesservice.vehiclemodel
				FROM
				salesservice
				INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
				INNER JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice
				WHERE vehicleservice.vehliceservicetype='HR'
				AND salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto
				GROUP BY 
				salesservice.vehiclemodel
				
				)  AS qtyhr ON qtymodel.vehiclemodel=qtyhr.vehiclemodel";
						$arrData = array(':rptdatefrom' => $rptdatefrom, ':rptdateto' => $rptdateto);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
	
	
	
		function show_totalyear($rptdatefrom, $rptdateto){
		$rptdatefrom = $_POST['rptdatefrom']; 
		$date = str_replace('/', '-', $rptdatefrom);
		$rptdatefrom = date('Y-m-d', strtotime($date));
		
		$rptdateto = $_POST['rptdateto']; 
		$date = str_replace('/', '-', $rptdateto);
		$rptdateto = date('Y-m-d', strtotime($date));
		
        $sql = "SELECT
				Count(salesservicedet2.idtransdet) AS qtyyear,
				vehiclestock.`year` 
				FROM
				salesservice
				INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
				LEFT JOIN vehiclestock ON salesservice.vahicletype = vehiclestock.vehicletype
				WHERE salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto
				GROUP BY vehiclestock.`year`
				
				UNION ALL
				
				SELECT 
				Count(salesservicedet2.idtransdet) AS qtyyear,
				'TOTAL' AS `year` 
				FROM
				salesservice
				INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
				LEFT JOIN vehiclestock ON salesservice.vahicletype = vehiclestock.vehicletype
				WHERE salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto
				ORDER BY `year` ASC";
						$arrData = array(':rptdatefrom' => $rptdatefrom, ':rptdateto' => $rptdateto);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }

}
?>


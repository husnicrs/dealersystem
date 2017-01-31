	<?php
	include_once 'Database.php';
	class rptmekanik {
    private $db ='';
    private $data;
    public function __construct(){
        $this->db = new Database();
    }

	function show($rptdatefrom, $rptdateto){
		$rptdatefrom = $_POST['rptdatefrom']; 
		$date = str_replace('/', '-', $rptdatefrom);
		$rptdatefrom = date('Y-m-d', strtotime($date));
		
		$rptdateto = $_POST['rptdateto']; 
		$date = str_replace('/', '-', $rptdateto);
		$rptdateto = date('Y-m-d', strtotime($date));
		
		
        $sql = "SELECT
				1 AS idkey,
				employee.employeename,
				employee.nik,
				position.positionname,
				servicekpb.qtykpb, 
				servicec2.qtyc2,
				servicecs.qtycs,
				servicels.qtyls,
				serviceorplus.qtyorplus, 
				IFNULL(servicekpb.qtykpb,0)+IFNULL(servicec2.qtyc2,0)+IFNULL(servicecs.qtycs,0)+IFNULL(servicels.qtyls,0)+IFNULL(serviceorplus.qtyorplus,0) AS qtyunit,
				servicehr.qtyhr,
				servicelr.qtylr,
				totalservice.qtyservice,
				totalservice.subtotal
				FROM
				employee
				INNER JOIN position ON employee.positionid = position.idposition
				
				LEFT JOIN 
				
				(SELECT
				salesservice.mekanikid,
				Count(salesservicedet2.idtransdet) AS qtykpb, 
				SUM(salesservicedet2.subtotal) AS subtotal
				FROM
				salesservice
				INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
				INNER JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice
				WHERE vehicleservice.vehliceservicetype='KPB' AND salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto
				GROUP BY 
				salesservice.mekanikid) AS servicekpb ON employee.idemployee=servicekpb.mekanikid
				
				LEFT JOIN 
				
				(
				SELECT
				salesservice.mekanikid,
				Count(salesservicedet2.idtransdet) AS qtyc2,
				SUM(salesservicedet2.subtotal) AS subtotal
				FROM
				salesservice
				INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
				INNER JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice
				WHERE vehicleservice.vehliceservicetype='Claim' AND salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto
				GROUP BY 
				salesservice.mekanikid
				) AS servicec2 ON employee.idemployee=servicec2.mekanikid
				
				LEFT JOIN 
				
				(
				SELECT
				salesservice.mekanikid,
				Count(salesservicedet2.idtransdet) AS qtycs,
				SUM(salesservicedet2.subtotal) AS subtotal
				FROM
				salesservice
				INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
				INNER JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice
				WHERE vehicleservice.vehliceservicetype='QS' AND salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto
				GROUP BY 
				salesservice.mekanikid
				
				) AS servicecs ON employee.idemployee=servicecs.mekanikid
				
				LEFT JOIN 
				
				(
				SELECT
				salesservice.mekanikid,
				Count(salesservicedet2.idtransdet) AS qtyls,
				SUM(salesservicedet2.subtotal) AS subtotal
				FROM
				salesservice
				INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
				INNER JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice
				WHERE vehicleservice.vehliceservicetype='LS' AND salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto
				GROUP BY 
				salesservice.mekanikid
				
				) AS servicels ON employee.idemployee=servicels.mekanikid
				
				
				
				LEFT JOIN 
				
				(
				SELECT
				salesservice.mekanikid,
				Count(salesservicedet2.idtransdet) AS qtyorplus,
				SUM(salesservicedet2.subtotal) AS subtotal
				FROM
				salesservice
				INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
				INNER JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice
				WHERE vehicleservice.vehliceservicetype='OR+' AND salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto
				GROUP BY 
				salesservice.mekanikid
				
				) AS serviceorplus ON employee.idemployee=serviceorplus.mekanikid
				
				
				
				LEFT JOIN 
				
				(
				SELECT
				salesservice.mekanikid,
				Count(salesservicedet2.idtransdet) AS qtylr,
				SUM(salesservicedet2.subtotal) AS subtotal
				FROM
				salesservice
				INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
				INNER JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice
				WHERE vehicleservice.vehliceservicetype='LR' AND salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto
				GROUP BY 
				salesservice.mekanikid
				
				) AS servicelr ON employee.idemployee=servicelr.mekanikid
				
				
				LEFT JOIN 
				
				(
				SELECT
				salesservice.mekanikid,
				Count(salesservicedet2.idtransdet) AS qtyhr,
				SUM(salesservicedet2.subtotal) AS subtotal
				FROM
				salesservice
				INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
				INNER JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice
				WHERE vehicleservice.vehliceservicetype='HR' AND salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto
				GROUP BY 
				salesservice.mekanikid
				
				) AS servicehr ON employee.idemployee=servicehr.mekanikid
				
				
				LEFT JOIN
				(
				SELECT
				salesservice.mekanikid,
				Count(salesservicedet2.idtransdet) AS qtyservice,
				SUM(salesservicedet2.subtotal) AS subtotal
				FROM
				salesservice
				INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
				INNER JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice
				WHERE salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto
				GROUP BY 
				salesservice.mekanikid
				) AS totalservice ON employee.idemployee=totalservice.mekanikid
				
				WHERE position.positionname='Mekanik'";
        $arrData = array(':rptdatefrom' => $rptdatefrom, ':rptdateto' => $rptdateto);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
	
	function showtotal($rptdatefrom, $rptdateto){
		$rptdatefrom = $_POST['rptdatefrom']; 
		$date = str_replace('/', '-', $rptdatefrom);
		$rptdatefrom = date('Y-m-d', strtotime($date));
		
		$rptdateto = $_POST['rptdateto']; 
		$date = str_replace('/', '-', $rptdateto);
		$rptdateto = date('Y-m-d', strtotime($date));
		
		
        $sql = "SELECT
				SUM(servicekpb.qtykpb) AS tqtykpb, 
				SUM(servicec2.qtyc2) AS tqtyc2,
				SUM(servicecs.qtycs) AS tqtycs,
				SUM(servicels.qtyls) AS tqtyls,
				SUM(serviceorplus.qtyorplus) AS tqtyorplus, 
				SUM(IFNULL(servicekpb.qtykpb,0)+IFNULL(servicec2.qtyc2,0)+IFNULL(servicecs.qtycs,0)+IFNULL(servicels.qtyls,0)+IFNULL(serviceorplus.qtyorplus,0)) AS tqtyunit,
				SUM(servicehr.qtyhr) AS tqtyhr,
				SUM(servicelr.qtylr) AS tqtylr,
				SUM(totalservice.qtyservice) AS tqtyservice,
				SUM(totalservice.subtotal) AS tsubtotal
				FROM
				employee
				INNER JOIN position ON employee.positionid = position.idposition
				
				LEFT JOIN 
				
				(SELECT
				salesservice.mekanikid,
				Count(salesservicedet2.idtransdet) AS qtykpb, 
				SUM(salesservicedet2.subtotal) AS subtotal
				FROM
				salesservice
				INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
				INNER JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice
				WHERE vehicleservice.vehliceservicetype='KPB' AND salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto
				GROUP BY 
				salesservice.mekanikid) AS servicekpb ON employee.idemployee=servicekpb.mekanikid
				
				LEFT JOIN 
				
				(
				SELECT
				salesservice.mekanikid,
				Count(salesservicedet2.idtransdet) AS qtyc2,
				SUM(salesservicedet2.subtotal) AS subtotal
				FROM
				salesservice
				INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
				INNER JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice
				WHERE vehicleservice.vehliceservicetype='Claim' AND salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto
				GROUP BY 
				salesservice.mekanikid
				) AS servicec2 ON employee.idemployee=servicec2.mekanikid
				
				LEFT JOIN 
				
				(
				SELECT
				salesservice.mekanikid,
				Count(salesservicedet2.idtransdet) AS qtycs,
				SUM(salesservicedet2.subtotal) AS subtotal
				FROM
				salesservice
				INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
				INNER JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice
				WHERE vehicleservice.vehliceservicetype='QS' AND salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto
				GROUP BY 
				salesservice.mekanikid
				
				) AS servicecs ON employee.idemployee=servicecs.mekanikid
				
				LEFT JOIN 
				
				(
				SELECT
				salesservice.mekanikid,
				Count(salesservicedet2.idtransdet) AS qtyls,
				SUM(salesservicedet2.subtotal) AS subtotal
				FROM
				salesservice
				INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
				INNER JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice
				WHERE vehicleservice.vehliceservicetype='LS' AND salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto
				GROUP BY 
				salesservice.mekanikid
				
				) AS servicels ON employee.idemployee=servicels.mekanikid
				
				
				
				LEFT JOIN 
				
				(
				SELECT
				salesservice.mekanikid,
				Count(salesservicedet2.idtransdet) AS qtyorplus,
				SUM(salesservicedet2.subtotal) AS subtotal
				FROM
				salesservice
				INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
				INNER JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice
				WHERE vehicleservice.vehliceservicetype='OR+' AND salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto
				GROUP BY 
				salesservice.mekanikid
				
				) AS serviceorplus ON employee.idemployee=serviceorplus.mekanikid
				
				
				
				LEFT JOIN 
				
				(
				SELECT
				salesservice.mekanikid,
				Count(salesservicedet2.idtransdet) AS qtylr,
				SUM(salesservicedet2.subtotal) AS subtotal
				FROM
				salesservice
				INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
				INNER JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice
				WHERE vehicleservice.vehliceservicetype='LR' AND salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto
				GROUP BY 
				salesservice.mekanikid
				
				) AS servicelr ON employee.idemployee=servicelr.mekanikid
				
				
				LEFT JOIN 
				
				(
				SELECT
				salesservice.mekanikid,
				Count(salesservicedet2.idtransdet) AS qtyhr,
				SUM(salesservicedet2.subtotal) AS subtotal
				FROM
				salesservice
				INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
				INNER JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice
				WHERE vehicleservice.vehliceservicetype='HR' AND salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto
				GROUP BY 
				salesservice.mekanikid
				
				) AS servicehr ON employee.idemployee=servicehr.mekanikid
				
				
				LEFT JOIN
				(
				SELECT
				salesservice.mekanikid,
				Count(salesservicedet2.idtransdet) AS qtyservice,
				SUM(salesservicedet2.subtotal) AS subtotal
				FROM
				salesservice
				INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
				INNER JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice
				WHERE salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto
				GROUP BY 
				salesservice.mekanikid
				) AS totalservice ON employee.idemployee=totalservice.mekanikid
				
				WHERE position.positionname='Mekanik'";
        $arrData = array(':rptdatefrom' => $rptdatefrom, ':rptdateto' => $rptdateto);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }

}
?>


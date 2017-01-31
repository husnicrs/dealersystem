	<?php
	include_once 'Database.php';
	class rptsalesaccdaily {
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
		
		
        $sql = "SELECT DATE_FORMAT(DERIVEDTBL.datetrans,'%d/%m/%Y') AS datetrans, SUM(DERIVEDTBL.subtotalservis) AS subtotalservis, SUM(DERIVEDTBL.subtotalahm) AS subtotalahm, SUM(DERIVEDTBL.subtotalpart) AS subtotalpart, SUM(DERIVEDTBL.subtotalservis+DERIVEDTBL.subtotalahm+subtotalpart) AS total FROM
				(
				SELECT
				salesservice.datetrans,
				salesservicedet2.subtotal AS subtotalservis,
				0 AS subtotalahm,
				0 AS subtotalpart
				FROM
				salesservice
				INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans

				
				UNION ALL
				
				SELECT partnonahm.datetrans, 0 AS subtotalservis, partnonahm.subtotalpart AS subtotalahm, 0 AS subtotalpart FROM (SELECT
				salesorder.datetrans,
				salesorderdet.amount AS subtotalpart
				FROM
				salesorder
				LEFT JOIN salesorderdet ON salesorder.idtrans = salesorderdet.transid
				LEFT JOIN inventorygroupdet ON salesorderdet.inventoryid = inventorygroupdet.inventoryid
				LEFT JOIN inventorygroup ON inventorygroupdet.inventorygroupid = inventorygroup.idinventorygroup
				WHERE inventorygroup.inventorygroupname IS NULL OR inventorygroup.inventorygroupname <> 'OLI AHM'
				UNION ALL
				SELECT
				salesservice.datetrans,
				salesservicedet.amount AS subtotalpart
				FROM
				salesservice
				LEFT JOIN salesservicedet ON salesservicedet.transid = salesservice.idtrans
				LEFT JOIN inventorygroupdet ON salesservicedet.inventoryid = inventorygroupdet.inventoryid
				LEFT JOIN inventorygroup ON inventorygroupdet.inventorygroupid = inventorygroup.idinventorygroup
				WHERE inventorygroup.inventorygroupname IS NULL OR inventorygroup.inventorygroupname <> 'OLI AHM') AS partnonahm

				
				UNION ALL
				
				SELECT partahm.datetrans, 0 AS subtotalservis, 0 AS subtotalahm, partahm.subtotalpart AS subtotal FROM (SELECT
				salesorder.datetrans,
				salesorderdet.amount AS subtotalpart
				FROM
				salesorder
				LEFT JOIN salesorderdet ON salesorder.idtrans = salesorderdet.transid
				LEFT JOIN inventorygroupdet ON salesorderdet.inventoryid = inventorygroupdet.inventoryid
				LEFT JOIN inventorygroup ON inventorygroupdet.inventorygroupid = inventorygroup.idinventorygroup
				WHERE inventorygroup.inventorygroupname = 'OLI AHM'
				UNION ALL
				SELECT
				salesservice.datetrans,
				salesservicedet.amount AS subtotalpart
				FROM
				salesservice
				LEFT JOIN salesservicedet ON salesservicedet.transid = salesservice.idtrans
				LEFT JOIN inventorygroupdet ON salesservicedet.inventoryid = inventorygroupdet.inventoryid
				LEFT JOIN inventorygroup ON inventorygroupdet.inventorygroupid = inventorygroup.idinventorygroup
				WHERE inventorygroup.inventorygroupname = 'OLI AHM') AS partahm

				) AS DERIVEDTBL
				WHERE DERIVEDTBL.datetrans BETWEEN :rptdatefrom AND :rptdateto
				GROUP BY DERIVEDTBL.datetrans";
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
		
        $sql = "SELECT SUM(DERIVEDTBL.subtotalservis) AS tsubtotalservis, SUM(DERIVEDTBL.subtotalahm) AS tsubtotalahm, SUM(DERIVEDTBL.subtotalpart) AS tsubtotalpart, SUM(DERIVEDTBL.subtotalservis+DERIVEDTBL.subtotalahm+subtotalpart) AS ttotal FROM
				(
				SELECT
				salesservice.datetrans,
				salesservicedet2.subtotal AS subtotalservis,
				0 AS subtotalahm,
				0 AS subtotalpart
				FROM
				salesservice
				INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
				
				
				UNION ALL
				
				SELECT partnonahm.datetrans, 0 AS subtotalservis, partnonahm.subtotalpart AS subtotalahm, 0 AS subtotalpart FROM (SELECT
				salesorder.datetrans,
				salesorderdet.amount AS subtotalpart
				FROM
				salesorder
				LEFT JOIN salesorderdet ON salesorder.idtrans = salesorderdet.transid
				LEFT JOIN inventorygroupdet ON salesorderdet.inventoryid = inventorygroupdet.inventoryid
				LEFT JOIN inventorygroup ON inventorygroupdet.inventorygroupid = inventorygroup.idinventorygroup
				WHERE inventorygroup.inventorygroupname IS NULL OR inventorygroup.inventorygroupname <> 'OLI AHM'
				UNION ALL
				SELECT
				salesservice.datetrans,
				salesservicedet.amount AS subtotalpart
				FROM
				salesservice
				LEFT JOIN salesservicedet ON salesservicedet.transid = salesservice.idtrans
				LEFT JOIN inventorygroupdet ON salesservicedet.inventoryid = inventorygroupdet.inventoryid
				LEFT JOIN inventorygroup ON inventorygroupdet.inventorygroupid = inventorygroup.idinventorygroup
				WHERE inventorygroup.inventorygroupname IS NULL OR inventorygroup.inventorygroupname <> 'OLI AHM') AS partnonahm
				
				
				UNION ALL
				
				SELECT partahm.datetrans, 0 AS subtotalservis, 0 AS subtotalahm, partahm.subtotalpart AS subtotal FROM (SELECT
				salesorder.datetrans,
				salesorderdet.amount AS subtotalpart
				FROM
				salesorder
				LEFT JOIN salesorderdet ON salesorder.idtrans = salesorderdet.transid
				LEFT JOIN inventorygroupdet ON salesorderdet.inventoryid = inventorygroupdet.inventoryid
				LEFT JOIN inventorygroup ON inventorygroupdet.inventorygroupid = inventorygroup.idinventorygroup
				WHERE inventorygroup.inventorygroupname = 'OLI AHM'
				UNION ALL
				SELECT
				salesservice.datetrans,
				salesservicedet.amount AS subtotalpart
				FROM
				salesservice
				LEFT JOIN salesservicedet ON salesservicedet.transid = salesservice.idtrans
				LEFT JOIN inventorygroupdet ON salesservicedet.inventoryid = inventorygroupdet.inventoryid
				LEFT JOIN inventorygroup ON inventorygroupdet.inventorygroupid = inventorygroup.idinventorygroup
				WHERE inventorygroup.inventorygroupname = 'OLI AHM') AS partahm
				
				) AS DERIVEDTBL
				WHERE DERIVEDTBL.datetrans BETWEEN :rptdatefrom AND :rptdateto";
        $arrData = array(':rptdatefrom' => $rptdatefrom, ':rptdateto' => $rptdateto);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }

}
?>


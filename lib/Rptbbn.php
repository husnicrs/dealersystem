	<?php
	include_once 'Database.php';
	class rptbbn {
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
				GROUP_CONCAT(REPLACE(bbn.idtrans,',','')) AS idtrans,
				GROUP_CONCAT(REPLACE(bbn.codetrans,',','')) AS codetrans,
				GROUP_CONCAT(REPLACE(RIGHT(bbn.notrans,9),',','')) AS notrans,
				GROUP_CONCAT(REPLACE(bbn.datetrans,',','')) AS datetrans,
				GROUP_CONCAT(REPLACE(bbn.remark,',','')) AS remark,
				GROUP_CONCAT(REPLACE(bbn.cusname,',','')) AS cusname,
				GROUP_CONCAT(REPLACE(bbn.address,',','')) AS address,
				GROUP_CONCAT(REPLACE(bbn.vehiclemodel,',','')) AS vehiclemodel,
				GROUP_CONCAT(REPLACE(bbn.vehicletype,',','')) AS vehicletype,
				GROUP_CONCAT(REPLACE(bbn.mechineno,',','')) AS mechineno,
				GROUP_CONCAT(REPLACE(bbn.rangkano,',','')) AS rangkano,
				GROUP_CONCAT(REPLACE(bbn.nota,',','')) AS nota,
				GROUP_CONCAT(REPLACE(bbn.adm,',','')) AS adm,
				GROUP_CONCAT(REPLACE(bbn.totalbbn,',','')) AS totalbbn,
				SUM(bbn.totalbbn) AS sumtotalbbnm,
				bbn.samsatid,
				samsat.samsatname,
				samsat.idsamsat
				FROM
				bbn
				INNER JOIN samsat ON bbn.samsatid = samsat.idsamsat
				WHERE bbn.datetrans BETWEEN :rptdatefrom AND :rptdateto
				GROUP BY bbn.samsatid,
				samsat.samsatname,
				samsat.idsamsat";
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
					SUM(bbn.totalbbn) AS tsumtotalbbnm
				FROM
					bbn
				INNER JOIN samsat ON bbn.samsatid = samsat.idsamsat
				WHERE bbn.datetrans BETWEEN :rptdatefrom AND :rptdateto";
        $arrData = array(':rptdatefrom' => $rptdatefrom, ':rptdateto' => $rptdateto);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }

	function showtype($rptdatefrom, $rptdateto){
		$rptdatefrom = $_POST['rptdatefrom']; 
		$date = str_replace('/', '-', $rptdatefrom);
		$rptdatefrom = date('Y-m-d', strtotime($date));
		
		$rptdateto = $_POST['rptdateto']; 
		$date = str_replace('/', '-', $rptdateto);
		$rptdateto = date('Y-m-d', strtotime($date));
		
        $sql = "SELECT
			bbn.vehicletype as vehicletypetype,
			COUNT(bbn.idtrans) AS qtytype,
			SUM(bbn.nota) AS notatype,
			SUM(bbn.adm) AS admtype 
			FROM
			bbn
			WHERE bbn.datetrans BETWEEN :rptdatefrom AND :rptdateto
			GROUP BY bbn.vehicletype";
        $arrData = array(':rptdatefrom' => $rptdatefrom, ':rptdateto' => $rptdateto);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
	
	function showtotaltype($rptdatefrom, $rptdateto){
		$rptdatefrom = $_POST['rptdatefrom']; 
		$date = str_replace('/', '-', $rptdatefrom);
		$rptdatefrom = date('Y-m-d', strtotime($date));
		
		$rptdateto = $_POST['rptdateto']; 
		$date = str_replace('/', '-', $rptdateto);
		$rptdateto = date('Y-m-d', strtotime($date));
		
        $sql = "SELECT
				COUNT(bbn.idtrans) AS qtyttype,
				SUM(bbn.nota) AS notattype,
				SUM(bbn.adm) AS admttype 
				FROM
				bbn
				WHERE bbn.datetrans BETWEEN :rptdatefrom AND :rptdateto";
        $arrData = array(':rptdatefrom' => $rptdatefrom, ':rptdateto' => $rptdateto);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }

}
?>


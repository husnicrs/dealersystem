	<?php
	include_once 'Database.php';
	class rptwpp {
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
					countsw1.rscount1,
					countsw2.rscount2,
					countsw3.rscount3,
					countsw4.rscount4,
					countsw5.rscount5,
					countsw6.rscount6
				FROM
					(
						SELECT
							1 AS rownumber,
							Count(count1.customername) AS rscount1
						FROM
							(
								SELECT
									salesservice.customername
								FROM
									salesservice
				WHERE DATE(salesservice.datetrans) < '".$rptdatefrom."' 
								GROUP BY
									salesservice.customername,
									salesservice.policeno
							) AS count1
					) AS countsw1
				INNER JOIN (
					SELECT
						1 AS rownumber,
						Count(count2.customername) AS rscount2
					FROM
						(
							SELECT
								salesservice.customername
							FROM
								salesservice
								WHERE salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto 
							GROUP BY
								salesservice.customername,
								salesservice.policeno
						) AS count2
				) AS countsw2 ON countsw1.rownumber = countsw2.rownumber
				INNER JOIN (
					SELECT
						1 AS rownumber,
						Count(count3.customername) AS rscount3
					FROM
						(
							SELECT
								salesservice.customername
							FROM
								salesservice
							WHERE (salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto) OR DATE(salesservice.datetrans) < '".$rptdatefrom."' 
							GROUP BY
								salesservice.customername,
								salesservice.policeno
						) AS count3
				) AS countsw3 ON countsw2.rownumber = countsw3.rownumber
				INNER JOIN (
					SELECT
						1 AS rownumber,
						Count(count4.customername) AS rscount4
					FROM
						(
							SELECT
								salesservice.customername,
								TIMESTAMPDIFF(MONTH,MAX(salesservice.datetrans), '".$rptdateto."') AS maxtrans
							FROM
								salesservice
							
							GROUP BY
								salesservice.customername,
								salesservice.policeno
						) AS count4 WHERE count4.maxtrans>3 
				) AS countsw4 ON countsw3.rownumber = countsw4.rownumber
				INNER JOIN (
					SELECT
						1 AS rownumber,
						Count(count5.customername) AS rscount5
					FROM
						(
							SELECT
								salesservice.customername,
								TIMESTAMPDIFF(MONTH,MAX(salesservice.datetrans), '".$rptdateto."') AS maxtrans
							FROM
								salesservice
							GROUP BY
								salesservice.customername,
								salesservice.policeno
						) AS count5 WHERE count5.maxtrans<3
				) AS countsw5 ON countsw4.rownumber = countsw5.rownumber
				INNER JOIN (
					SELECT
						1 AS rownumber,
						Count(count6.customername) AS rscount6
					FROM
						(
							SELECT
								salesservice.customername,
								TIMESTAMPDIFF(MONTH,MAX(salesservice.datetrans), '".$rptdateto."') AS maxtrans
							FROM
								salesservice
							GROUP BY
								salesservice.customername,
								salesservice.policeno
						) AS count6 WHERE count6.maxtrans<3 OR count6.maxtrans>3 
				) AS countsw6 ON countsw5.rownumber = countsw6.rownumber";
        $arrData = array(':rptdatefrom' => $rptdatefrom, ':rptdateto' => $rptdateto);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
	
}
?>


	<?php

	include_once 'Database.php';

	class rptstockendingvalue {

    private $db ='';

    private $data;

    public function __construct(){

        $this->db = new Database();

    }



	function show(){

        $sql = "SELECT inventory.idinventory AS idkey, inventory.inventorycode, inventory.inventoryname, inventory.stockunit,  rackpurchase.rackno, SUM(DERIVEDTBL.qty) AS qty, inventory.unitprice AS unitprice, SUM(DERIVEDTBL.qty)* inventory.unitprice AS total  

				FROM 

				(SELECT

				salesorderdet.inventoryid,

				-salesorderdet.quantity AS qty

				FROM

				salesorderdet

				UNION ALL
				
				SELECT
				salesorderdet.inventoryid,
				salesorderdet.quantity AS qty
				FROM
				salesorderdet
				INNER JOIN salesorder ON salesorder.idtrans = salesorderdet.transid
				WHERE salesorder.`status`=10
									

				UNION ALL

				

				SELECT

				salesservicedet.inventoryid,

				-salesservicedet.quantity AS qty

				FROM

				salesservicedet

				

				UNION ALL

				

				SELECT

				inventoryadjdet.inventoryid,

				inventoryadjdet.quantity AS qty

				FROM

				inventoryadjdet

				

				UNION ALL

				

				SELECT

				salesreturndet.inventoryid,

				salesreturndet.quantity AS qty

				FROM

				salesreturndet

				

				UNION ALL

				

				SELECT

				purchaseorderdet.inventoryid,

				purchaseorderdet.quantity AS qty

				FROM

				purchaseorderdet

				

				UNION ALL

				

				SELECT

				purchasereturndet.inventoryid,

				-purchasereturndet.quantity AS qty

				FROM

				purchasereturndet

				

				UNION ALL

				

				SELECT

				materialuseddet.inventoryid,

				-materialuseddet.quantity AS qty

				FROM

				materialuseddet

				

				UNION ALL

				

				SELECT

				stockopnamedet.inventoryid,

				stockopnamedet.adjqty AS qty

				FROM

				stockopnamedet

				) AS DERIVEDTBL INNER JOIN inventory ON DERIVEDTBL.inventoryid=inventory.idinventory

				LEFT JOIN (SELECT

				purchaseorderdet.inventoryid,

				MAX(purchaseorderdet.rackno) AS rackno

				FROM

				purchaseorderdet

				GROUP BY

				purchaseorderdet.inventoryid) AS rackpurchase ON rackpurchase.inventoryid = inventory.idinventory

				GROUP BY inventory.idinventory, inventory.inventorycode, inventory.inventoryname, inventory.stockunit, inventory.unitprice";

        $this->data = $this->db->loadData($sql);

        return $this->data;

    }

	

function showtotal(){

		

        $sql = "SELECT SUM(DERIVEDTBL.qty) AS tqty, SUM(DERIVEDTBL.qty* inventory.unitprice) AS ttotal

				FROM 

				(SELECT

				salesorderdet.inventoryid,

				-salesorderdet.quantity AS qty

				FROM

				salesorderdet LEFT JOIN inventory

				ON salesorderdet.inventoryid=inventory.idinventory

				

				UNION ALL

				

				SELECT

				salesservicedet.inventoryid,

				-salesservicedet.quantity AS qty

				FROM

				salesservicedet

				

				UNION ALL

				

				SELECT

				inventoryadjdet.inventoryid,

				inventoryadjdet.quantity AS qty

				FROM

				inventoryadjdet

				

				UNION ALL

				

				SELECT

				salesreturndet.inventoryid,

				salesreturndet.quantity AS qty

				FROM

				salesreturndet

				

				UNION ALL

				

				SELECT

				purchaseorderdet.inventoryid,

				purchaseorderdet.quantity AS qty

				FROM

				purchaseorderdet

				

				UNION ALL

				

				SELECT

				purchasereturndet.inventoryid,

				-purchasereturndet.quantity AS qty

				FROM

				purchasereturndet

				

				UNION ALL

				

				SELECT

				materialuseddet.inventoryid,

				-materialuseddet.quantity AS qty

				FROM

				materialuseddet

				

				UNION ALL

				

				SELECT

				stockopnamedet.inventoryid,

				stockopnamedet.adjqty AS qty

				FROM

				stockopnamedet

				) AS DERIVEDTBL INNER JOIN inventory ON DERIVEDTBL.inventoryid=inventory.idinventory

				LEFT JOIN (SELECT

				purchaseorderdet.inventoryid,

				MAX(purchaseorderdet.rackno) AS rackno

				FROM

				purchaseorderdet

				GROUP BY

				purchaseorderdet.inventoryid) AS rackpurchase ON rackpurchase.inventoryid = inventory.idinventory";

        $this->data = $this->db->loadData($sql);

        return $this->data;

    }



}

?>




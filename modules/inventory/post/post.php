<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['type']) {
	case "get":
		$SQL = mysqli_query($con, "SELECT
				inventory.idinventory AS idkey,
				inventory.inventorycode,
				inventory.inventoryname,
				inventory.spec,
				inventory.salesunit,
				inventory.purchaseunit,
				inventory.stockunit,
				inventory.inventorygroupid,
				inventorygroup.inventorygroupname,
				inventory.barcode,
				inventory.weight,
				inventory.inventorytypeid,
				inventorytype.inventorytypename,
				inventory.unitprice,
				inventory.floorprice,
				inventory.inventorybrandid,
				inventorybrand.inventorybrandname,
				inventory.inventorycolorid,
				inventorycolor.inventorycolorname,
				inventorysize.inventorysizename,
				inventory.inventorysizeid,
				inventory.status
				FROM
				inventory
				LEFT JOIN inventorycolor ON inventory.inventorycolorid = inventorycolor.idinventorycolor
				LEFT JOIN inventorygroup ON inventory.inventorygroupid = inventorygroup.idinventorygroup
				LEFT JOIN inventorytype ON inventory.inventorytypeid = inventorytype.idinventorytype
				LEFT JOIN inventorybrand ON inventory.inventorybrandid = inventorybrand.idinventorybrand
				LEFT JOIN inventorysize ON inventory.inventorysizeid= inventorysize.idinventorysize
				WHERE inventory.idinventory='".$_POST['idkey']."'");
		$return = mysqli_fetch_array($SQL,MYSQLI_ASSOC);
		echo json_encode($return);
		break;	
		
	case "new":
		$SQL = mysqli_query($con, 
		"INSERT INTO inventory SET inventorycode='".$_POST['inventorycode']."', inventoryname='".$_POST['inventoryname']."', 
		inventorytypeid='".$_POST['inventorytypeid']."', inventorysizeid='".$_POST['inventorysizeid']."', inventorybrandid='".$_POST['inventorybrandid']."',
		barcode='".$_POST['barcode']."', unitprice='".$_POST['unitprice']."', salesunit='".$_POST['unitname']."', purchaseunit='".$_POST['unitname']."',
		stockunit='".$_POST['unitname']."', status='".$_POST['status']."'");
		if($SQL){
			echo json_encode("OK");
		}
		break;
	case "edit":
		$SQL = mysqli_query($con, 
		"UPDATE inventory SET inventorycode='".$_POST['inventorycode']."', inventoryname='".$_POST['inventoryname']."',  
		inventorytypeid='".$_POST['inventorytypeid']."', inventorysizeid='".$_POST['inventorysizeid']."', inventorybrandid='".$_POST['inventorybrandid']."',
		barcode='".$_POST['barcode']."', 
		unitprice='".$_POST['unitprice']."',
		salesunit='".$_POST['unitname']."', purchaseunit='".$_POST['unitname']."',
		stockunit='".$_POST['unitname']."', status='".$_POST['status']."' WHERE idinventory='".$_POST['idkey']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
	case "delete":
		$SQL = mysqli_query($con, "DELETE FROM inventory WHERE idinventory='".$_POST['idkey']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
} 
?>

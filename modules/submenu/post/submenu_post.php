<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['type']) {
	case "get":
		$SQL = mysqli_query($con, "SELECT
				subnavmenu.idsubnavmenu,
				subnavmenu.subnavmenuname,
				subnavmenu.navmenuid,
				subnavmenu.sequencenumber,
				subnavmenu.submodule,
				subnavmenu.specialcharacter,
				navmenu.navmenuname
				FROM
				subnavmenu
				INNER JOIN navmenu ON subnavmenu.navmenuid = navmenu.idnavmenu
				WHERE subnavmenu.idsubnavmenu='".$_POST['idsubnavmenu']."'");
		$return = mysqli_fetch_array($SQL,MYSQLI_ASSOC);
		echo json_encode($return);
		break;
	case "new":
		$SQL = mysqli_query($con, 
		"INSERT INTO subnavmenu SET subnavmenuname='".$_POST['subnavmenuname']."', sequencenumber='".$_POST['sequencenumber']."', submodule='".$_POST['submodule']."', navmenuid='".$_POST['navmenuid']."'");
		if($SQL){
			echo json_encode("OK");
		}
		break;
	case "edit":
		$SQL = mysqli_query($con, 
		"UPDATE subnavmenu SET subnavmenuname='".$_POST['subnavmenuname']."', sequencenumber='".$_POST['sequencenumber']."', submodule='".$_POST['submodule']."', navmenuid='".$_POST['navmenuid']."' WHERE idsubnavmenu='".$_POST['idsubnavmenu']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
	case "delete":
		$SQL = mysqli_query($con, "DELETE FROM subnavmenu WHERE idsubnavmenu='".$_POST['idsubnavmenu']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
} 
?>

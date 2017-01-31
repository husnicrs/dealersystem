<?php
include_once 'Database.php';
switch ($_POST['type']) {
	case "get":
		$SQL = mysqli_query($con, "SELECT * FROM notification WHERE idnotification='".$_POST['idnotification']."'");
		$return = mysqli_fetch_array($SQL,MYSQLI_ASSOC);
		echo json_encode($return);
		break;
	case "new":
		$SQL = mysqli_query($con, 
		"INSERT INTO notification SET description='".$_POST['description']."', recoreded=NOW(), username='".$_POST['username']."', status='".$_POST['status']."'");
		if($SQL){
			echo json_encode("OK");
		}
		
		$SQL = mysqli_query($con, 
		"INSERT INTO notificationstatus (username, notificationid)
		SELECT
		users.username,
		MAX(notification.idnotification) AS idnotification
		FROM
		users ,
		notification
		GROUP BY users.username");
		if($SQL){
			echo json_encode("OK");
		}

		break;
	case "edit":
		$SQL = mysqli_query($con, 
		"UPDATE notification SET description='".$_POST['description']."', recoreded=NOW(), username='".$_POST['username']."', status='".$_POST['status']."' WHERE idnotification='".$_POST['idnotification']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
	case "delete":
		$SQL = mysqli_query($con, "DELETE FROM notification WHERE idnotification='".$_POST['idnotification']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
} 
?>

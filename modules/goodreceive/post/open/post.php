<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['type']) {
	case "get":
		$SQL = mysqli_query($con, "SELECT
				supplier.idsupplier AS idkey,
				supplier.registrationno,
				supplier.registrationdate,
				supplier.suppliername,
				supplier.address1,
				supplier.address2,
				supplier.zipcode,
				supplier.phone1,
				supplier.phone2,
				supplier.fax,
				supplier.emailaddress,
				supplier.cityid,
				supplier.suppliertypeid,
				supplier.suppliergroupid,
				supplier.bankaccountid,
				supplier.reknumber,
				supplier.status,
				supplier.remark
				FROM
				supplier
				WHERE supplier.idsupplier='".$_POST['idkey']."'");
		$return = mysqli_fetch_array($SQL,MYSQLI_ASSOC);
		echo json_encode($return);
		break;	
		
	case "new":
		$SQL = mysqli_query($con, 
		"INSERT INTO supplier SET registrationno='".$_POST['registrationno']."', registrationdate='".$_POST['registrationdate']."', suppliername='".$_POST['suppliername']."', address1='".$_POST['address1']."', address2='".$_POST['address2']."', cityid='".$_POST['cityid']."', zipcode='".$_POST['zipcode']."', phone1='".$_POST['phone1']."', phone2='".$_POST['phone2']."', fax='".$_POST['fax']."', emailaddress='".$_POST['emailaddress']."',  reknumber='".$_POST['reknumber']."', status='".$_POST['status']."'");
		if($SQL){
			echo json_encode("OK");
		}
		break;
	case "edit":
		$SQL = mysqli_query($con, 
		"UPDATE supplier SET registrationno='".$_POST['registrationno']."', registrationdate='".$_POST['registrationdate']."', suppliername='".$_POST['suppliername']."', address1='".$_POST['address1']."', address2='".$_POST['address2']."', cityid='".$_POST['cityid']."', zipcode='".$_POST['zipcode']."', phone1='".$_POST['phone1']."', phone2='".$_POST['phone2']."', fax='".$_POST['fax']."', emailaddress='".$_POST['emailaddress']."', reknumber='".$_POST['reknumber']."', status='".$_POST['status']."' WHERE idsupplier='".$_POST['idkey']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
	case "delete":
		$SQL = mysqli_query($con, "DELETE FROM supplier WHERE idsupplier='".$_POST['idkey']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
} 
?>


<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['type']) {
	case "get":
		$SQL = mysqli_query($con, "SELECT
				customer.idcustomer AS idkey,
				customer.registrationno,
				customer.registrationdate,
				customer.customername,
				customer.address1,
				customer.address2,
				customer.zipcode,
				customer.phone1,
				customer.phone2,
				customer.fax,
				customer.emailaddress,
				customer.cityid,
				customer.customertypeid,
				customer.customergroupid,
				customer.bankaccountid,
				customer.reknumber,
				customer.status,
				customer.remark
				FROM
				customer
				WHERE customer.idcustomer='".$_POST['idkey']."'");
		$return = mysqli_fetch_array($SQL,MYSQLI_ASSOC);
		echo json_encode($return);
		break;	
		
	case "new":
		$SQL = mysqli_query($con, 
		"INSERT INTO customer SET registrationno='".$_POST['registrationno']."', registrationdate='".$_POST['registrationdate']."', customername='".$_POST['customername']."', address1='".$_POST['address1']."', address2='".$_POST['address2']."', cityid='".$_POST['cityid']."', zipcode='".$_POST['zipcode']."', phone1='".$_POST['phone1']."', phone2='".$_POST['phone2']."', fax='".$_POST['fax']."', emailaddress='".$_POST['emailaddress']."',  reknumber='".$_POST['reknumber']."', status='".$_POST['status']."'");
		if($SQL){
			echo json_encode("OK");
		}
		break;
	case "edit":
		$SQL = mysqli_query($con, 
		"UPDATE customer SET registrationno='".$_POST['registrationno']."', registrationdate='".$_POST['registrationdate']."', customername='".$_POST['customername']."', address1='".$_POST['address1']."', address2='".$_POST['address2']."', cityid='".$_POST['cityid']."', zipcode='".$_POST['zipcode']."', phone1='".$_POST['phone1']."', phone2='".$_POST['phone2']."', fax='".$_POST['fax']."', emailaddress='".$_POST['emailaddress']."', reknumber='".$_POST['reknumber']."', status='".$_POST['status']."' WHERE idcustomer='".$_POST['idkey']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
	case "delete":
		$SQL = mysqli_query($con, "DELETE FROM customer WHERE idcustomer='".$_POST['idkey']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
} 
?>

<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['type']) {
	case "generate":
		$vardatetime = $_POST['datetrans']; 
		$date = str_replace('/', '-', $vardatetime);
		$datetrans = date('Y-m-d', strtotime($date));
		
		/*INSERT NEW DATA*/
		$SQL = mysqli_query($con, "UPDATE salesservice SET datetrans='".$datetrans."', customerid='".$_POST['customerid']."', payamount='".$_POST['payamount']."',
		changeamount='".$_POST['changeamount']."', totalamount='".$_POST['totalamount']."', paytypeid='".$_POST['paytypeid']."',
		remark='".$_POST['remark']."', serviceamount='".$_POST['serviceamount']."', sparepartamount='".$_POST['sparepartamount']."',
		policeno='".$_POST['policeno']."', customername='".$_POST['customername']."', vehiclemodel='".$_POST['vehiclemodel']."',
		vahicletype='".$_POST['vahicletype']."', vahiclejenis='".$_POST['vahiclejenis']."', purchasedate='".$_POST['purchasedate']."', mechineno='".$_POST['mechineno']."', rangka='".$_POST['rangka']."', servicebook='".$_POST['servicebook']."', mekanikid='".$_POST['mekanikid']."', employeeid='".$_POST['employeeid']."', km='".$_POST['km']."', nextkm='".$_POST['nextkm']."', nextdatekm='".$_POST['nextdatekm']."', finishtime='".$_POST['finishtime']."', address='".$_POST['address']."', telpno='".$_POST['telpno']."' WHERE salesservice.idtrans='".$_POST['transid']."' ");
		if($SQL){
			echo json_encode("OK");
		}
		break;

} 
?>

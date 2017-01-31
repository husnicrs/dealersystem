<?php
	$db=new Database();
	$rptdatefrom = $_POST['rptdatefrom'];
	$rptdateto = $_POST['rptdateto'];
	//error_reporting(0);
	$rptarreceivedetail = new Rptarreceivedetail();
	$core=new Core();
	$data = $rptarreceivedetail->show($rptdatefrom, $rptdateto);
	extract($data);
	
	$datatotal = $rptarreceivedetail->showtotal($rptdatefrom, $rptdateto);
	extract($datatotal);
?>


<style type="text/css">
    table { page-break-inside:auto }
    tr    { page-break-inside:avoid; page-break-after:auto }
    thead { display:table-header-group }
    tfoot { display:table-footer-group }
	
<!--	@media print {
  <!-- thead {display: table-header-group;}
<!-- }
</style>

<html xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:x="urn:schemas-microsoft-com:office:excel"
xmlns="http://www.w3.org/TR/REC-html40">

<head>
<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
<meta name=ProgId content=Excel.Sheet>
<meta name=Generator content="Microsoft Excel 15">
<link rel=File-List href="AR%20Receive%20Detail_files/filelist.xml">
<style id="AR Receive Detail_8893_Styles"><!--table
	{mso-displayed-decimal-separator:"\.";
	mso-displayed-thousand-separator:"\,";}
.xl638893
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:18.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl648893
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl658893
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl668893
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl678893
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl688893
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl698893
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl708893
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:bottom;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl718893
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	background:#BFBFBF;
	mso-pattern:black none;
	white-space:nowrap;}
.xl728893
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:8.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
--></style>
</head>

<body>
<!--[if !excel]>&nbsp;&nbsp;<![endif]-->
<!--The following information was generated by Microsoft Excel's Publish as Web
Page wizard.-->
<!--If the same item is republished from Excel, all information between the DIV
tags will be replaced.-->
<!----------------------------->
<!--START OF OUTPUT FROM EXCEL PUBLISH AS WEB PAGE WIZARD -->
<!----------------------------->

<div id="AR Receive Detail_8893" align=center x:publishsource="Excel">

<table border=0 cellpadding=0 cellspacing=0 width=1812 class=xl648893
 style='border-collapse:collapse;table-layout:fixed;width:1364pt'>
 <col class=xl648893 width=117 span=2 style='mso-width-source:userset;
 mso-width-alt:4278;width:88pt'>
 <col class=xl648893 width=154 style='mso-width-source:userset;mso-width-alt:
 5632;width:116pt'>
 <col class=xl648893 width=344 style='mso-width-source:userset;mso-width-alt:
 12580;width:258pt'>
 <col class=xl648893 width=224 style='mso-width-source:userset;mso-width-alt:
 8192;width:168pt'>
 <col class=xl648893 width=142 style='mso-width-source:userset;mso-width-alt:
 5193;width:107pt'>
 <col class=xl648893 width=102 span=7 style='mso-width-source:userset;
 mso-width-alt:3730;width:77pt'>
 <tr height=31 style='mso-height-source:userset;height:23.25pt'>
  <td colspan=6 height=31 class=xl638893 width=1098 style='height:23.25pt;
  width:825pt'>MITRA UTAMA MOTOR</td>
  <td class=xl648893 width=102 style='width:77pt'></td>
  <td class=xl648893 width=102 style='width:77pt'></td>
  <td class=xl648893 width=102 style='width:77pt'></td>
  <td class=xl648893 width=102 style='width:77pt'></td>
  <td class=xl648893 width=102 style='width:77pt'></td>
  <td class=xl648893 width=102 style='width:77pt'></td>
  <td class=xl648893 width=102 style='width:77pt'></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td colspan=6 height=20 class=xl698893 width=1098 style='height:15.0pt;
  width:825pt'>LAPORAN PENCAIRAN DETAIL</td>
  <td class=xl648893 width=102 style='width:77pt'></td>
  <td class=xl648893 width=102 style='width:77pt'></td>
  <td class=xl648893 width=102 style='width:77pt'></td>
  <td class=xl648893 width=102 style='width:77pt'></td>
  <td class=xl648893 width=102 style='width:77pt'></td>
  <td class=xl648893 width=102 style='width:77pt'></td>
  <td class=xl648893 width=102 style='width:77pt'></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td colspan=6 height=20 class=xl658893 width=1098 style='height:15.0pt;
  width:825pt'>PERIODE : <?php echo $rptdatefrom; ?> SAMPAI <?php echo $rptdateto; ?></td>
  <td class=xl648893 width=102 style='width:77pt'></td>
  <td class=xl648893 width=102 style='width:77pt'></td>
  <td class=xl648893 width=102 style='width:77pt'></td>
  <td class=xl648893 width=102 style='width:77pt'></td>
  <td class=xl648893 width=102 style='width:77pt'></td>
  <td class=xl648893 width=102 style='width:77pt'></td>
  <td class=xl648893 width=102 style='width:77pt'></td>
 </tr>
  <?php
		$i=1;
		if($datatotal !=0){
		foreach ($datatotal as $value123) {
		extract($value123);
	?>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td colspan=6 height=20 class=xl688893 width=1098 style='height:15.0pt;
  width:825pt'>JUMLAH UNIT : <?php echo number_format($tunit); ?> </td>
  <td class=xl648893 width=102 style='width:77pt'></td>
  <td class=xl648893 width=102 style='width:77pt'></td>
  <td class=xl648893 width=102 style='width:77pt'></td>
  <td class=xl648893 width=102 style='width:77pt'></td>
  <td class=xl648893 width=102 style='width:77pt'></td>
  <td class=xl648893 width=102 style='width:77pt'></td>
  <td class=xl648893 width=102 style='width:77pt'></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td colspan=6 height=20 class=xl688893 width=1098 style='height:15.0pt;
  width:825pt'>TOTAL : <?php echo number_format($ttagih); ?> </td>
  <td class=xl648893 width=102 style='width:77pt'></td>
  <td class=xl648893 width=102 style='width:77pt'></td>
  <td class=xl648893 width=102 style='width:77pt'></td>
  <td class=xl648893 width=102 style='width:77pt'></td>
  <td class=xl648893 width=102 style='width:77pt'></td>
  <td class=xl648893 width=102 style='width:77pt'></td>
  <td class=xl648893 width=102 style='width:77pt'></td>
 </tr>
 <?php
	$i++;
		}
		} 
    ?>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl718893 style='height:15.0pt'>TGL JUAL</td>
  <td class=xl718893 style='border-left:none'>TGL CAIR</td>
  <td class=xl718893 style='border-left:none'>NAMA</td>
  <td class=xl718893 style='border-left:none'>ALAMAT</td>
  <td class=xl718893 style='border-left:none'>TYPE</td>
  <td class=xl718893 style='border-left:none'>NO MESIN</td>
  <td class=xl718893 style='border-left:none'>SALES</td>
  <td class=xl718893 style='border-left:none'>TAGIH</td>
  <td class=xl718893 style='border-left:none'>CAIR</td>
  <td class=xl718893 style='border-left:none'>SKIM</td>
  <td class=xl718893 style='border-left:none'>SELISIH</td>
  <td class=xl718893 style='border-left:none'>LEAD TIME</td>
  <td class=xl718893 style='border-left:none'>LEASING</td>
 </tr>
 <?php
		$i=1;
		if($data !=0){
		foreach ($data as $value) {
		extract($value);
	?>
    
    
 <tr class=xl678893 height=16 style='height:12.0pt'>
  <td height=16 class=xl668893 width=117 style='height:12.0pt;border-top:none;
  width:88pt'>
   <?php echo $datetrans; ?></td>
  <td class=xl668893 width=117 style='border-top:none;border-left:none;
  width:88pt'> <?php echo $dateclear; ?></td>
  <td class=xl668893 width=154 style='border-top:none;border-left:none;
  width:116pt'> <?php echo $cusname; ?></td>
  <td class=xl728893 width=344 style='border-top:none;border-left:none;
  width:258pt'> <?php echo $address; ?></td>
  <td class=xl668893 width=224 style='border-top:none;border-left:none;
  width:168pt'> <?php echo $vehicletypesw; ?> -  <?php echo $vehiclemodelsw; ?></td>
  <td class=xl668893 width=142 style='border-top:none;border-left:none;
  width:107pt'> <?php echo $mechineno; ?></td>
  <td class=xl668893 width=102 style='border-top:none;border-left:none;
  width:77pt'> <?php echo $salesmanname; ?></td>
  <td class=xl668893 width=102 style='border-top:none;border-left:none;
  width:77pt'> <?php echo $penagihansw; ?></td>
  <td class=xl668893 width=102 style='border-top:none;border-left:none;
  width:77pt'> <?php echo $pencairansw; ?></td>
  <td class=xl668893 width=102 style='border-top:none;border-left:none;
  width:77pt'> <?php echo $cairschemasw; ?></td>
  <td class=xl668893 width=102 style='border-top:none;border-left:none;
  width:77pt'> <?php echo $selisihsw; ?></td>
  <td class=xl708893 width=102 style='border-top:none;border-left:none;
  width:77pt'> <?php echo $leadsales; ?><span style='mso-spacerun:yes'> </span></td>
  <td class=xl708893 width=102 style='border-top:none;border-left:none;
  width:77pt'><?php echo $leasing; ?></td>
 </tr>
  <?php
	$i++;
		}
		} 
    ?>
 <![if supportMisalignedColumns]>
 <tr height=0 style='display:none'>
  <td width=117 style='width:88pt'></td>
  <td width=117 style='width:88pt'></td>
  <td width=154 style='width:116pt'></td>
  <td width=344 style='width:258pt'></td>
  <td width=224 style='width:168pt'></td>
  <td width=142 style='width:107pt'></td>
  <td width=102 style='width:77pt'></td>
  <td width=102 style='width:77pt'></td>
  <td width=102 style='width:77pt'></td>
  <td width=102 style='width:77pt'></td>
  <td width=102 style='width:77pt'></td>
  <td width=102 style='width:77pt'></td>
  <td width=102 style='width:77pt'></td>
 </tr>
 <![endif]>
</table>

</div>


<!----------------------------->
<!--END OF OUTPUT FROM EXCEL PUBLISH AS WEB PAGE WIZARD-->
<!----------------------------->
</body>

</html>


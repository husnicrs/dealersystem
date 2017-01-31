<?php
	$db=new Database();
	$rptdatefrom = $_POST['rptdatefrom'];
	$rptdateto = $_POST['rptdateto'];
	//error_reporting(0);
	$rptcashbank = new Rptcashbank();
	$core=new Core();
	$data = $rptcashbank->show($rptdatefrom, $rptdateto);
	extract($data);
	
	$datatotal = $rptcashbank->showtotal($rptdatefrom, $rptdateto);
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
<link rel=File-List href="Kas%20Besar_files/filelist.xml">
<style id="Kas Besar_16673_Styles"><!--table
	{mso-displayed-decimal-separator:"\.";
	mso-displayed-thousand-separator:"\,";}
.xl1516673
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl6316673
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
.xl6416673
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
.xl6516673
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	background:#D9D9D9;
	mso-pattern:black none;
	white-space:normal;}
.xl6616673
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
	text-align:general;
	vertical-align:bottom;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl6716673
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
	text-align:general;
	vertical-align:bottom;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl6816673
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
	text-align:right;
	vertical-align:bottom;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl6916673
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:right;
	vertical-align:bottom;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl7016673
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:right;
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl7116673
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:right;
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl7216673
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:right;
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl7316673
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
	border-top:none;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
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

<div id="Kas Besar_16673" align=center x:publishsource="Excel">

<table border=0 cellpadding=0 cellspacing=0 width=1527 style='border-collapse:
 collapse;table-layout:fixed;width:1148pt'>
 <col width=78 style='mso-width-source:userset;mso-width-alt:2852;width:59pt'>
 <col width=220 style='mso-width-source:userset;mso-width-alt:8045;width:165pt'>
 <col width=138 span=2 style='mso-width-source:userset;mso-width-alt:5046;
 width:104pt'>
 <col width=710 style='mso-width-source:userset;mso-width-alt:25965;width:533pt'>
 <col width=81 span=3 style='mso-width-source:userset;mso-width-alt:2962;
 width:61pt'>
 <tr height=31 style='mso-height-source:userset;height:23.25pt'>
  <td colspan=5 height=31 class=xl6316673 width=1284 style='height:23.25pt;
  width:965pt'>MITRA UTAMA MOTOR</td>
  <td class=xl6316673 width=81 style='width:61pt'></td>
  <td class=xl6316673 width=81 style='width:61pt'></td>
  <td class=xl6316673 width=81 style='width:61pt'></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td colspan=5 height=20 class=xl6416673 width=1284 style='height:15.0pt;
  width:965pt'>LAPORAN KAS BESAR</td>
  <td class=xl6416673 width=81 style='width:61pt'></td>
  <td class=xl6416673 width=81 style='width:61pt'></td>
  <td class=xl6416673 width=81 style='width:61pt'></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td colspan=5 height=20 class=xl7316673 width=1284 style='height:15.0pt;
  width:965pt'>PERIODE : <?php echo $rptdatefrom; ?> SAMPAI <?php echo $rptdateto; ?></td>
  <td class=xl6416673 width=81 style='width:61pt'></td>
  <td class=xl6416673 width=81 style='width:61pt'></td>
  <td class=xl6416673 width=81 style='width:61pt'></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl6516673 width=78 style='height:15.0pt;border-top:none;
  width:59pt'>TANGGAL</td>
  <td class=xl6516673 width=220 style='border-top:none;border-left:none;
  width:165pt'>COA</td>
  <td class=xl6516673 width=138 style='border-top:none;border-left:none;
  width:104pt'>KW</td>
  <td class=xl6516673 width=138 style='border-top:none;border-left:none;
  width:104pt'>TRXNO</td>
  <td class=xl6516673 width=710 style='border-top:none;border-left:none;
  width:533pt'>DESKRIPSI</td>
  <td class=xl6516673 width=81 style='border-left:none;width:61pt'>DEBET</td>
  <td class=xl6516673 width=81 style='border-left:none;width:61pt'>KREDIT</td>
  <td class=xl6516673 width=81 style='border-left:none;width:61pt'>BALANCE</td>
 </tr>
 <?php
	$i=1;
	if($data !=0){
	foreach ($data as $value) {
	extract($value);
	?>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl6616673 width=78 style='height:15.0pt;border-top:none;
  width:59pt'><?php echo $datetrans; ?></td>
  <td class=xl6716673 width=220 style='border-top:none;border-left:none;
  width:165pt'>&nbsp;<?php echo $account; ?></td>
  <td class=xl6716673 width=138 style='border-top:none;border-left:none;
  width:104pt'>&nbsp;<?php echo $nofaktur; ?></td>
  <td class=xl6716673 width=138 style='border-top:none;border-left:none;
  width:104pt'>&nbsp;<?php echo $notrans; ?></td>
  <td class=xl6716673 width=710 style='border-top:none;border-left:none;
  width:533pt'><?php echo $description; ?></td>
  <td class=xl6816673 width=81 style='border-top:none;border-left:none;
  width:61pt'><?php echo $debet; ?></td>
  <td class=xl6816673 width=81 style='border-top:none;border-left:none;
  width:61pt'><?php echo $credit; ?></td>
  <td class=xl6816673 width=81 style='border-top:none;border-left:none;
  width:61pt'><?php echo $balance; ?></td>
 </tr>
 <?php
	$i++;
		}
		} 
    ?>
    
    <?php
	$i=1;
	if($data !=0){
	foreach ($datatotal as $valuetotal) {
	extract($valuetotal);
	?>
 <tr height=22 style='mso-height-source:userset;height:16.5pt'>
  <td colspan=5 height=22 class=xl7016673 width=1284 style='border-right:.5pt solid black;
  height:16.5pt;width:965pt'>TOTAL SALDO</td>
  <td class=xl6916673 width=81 style='border-top:none;border-left:none;
  width:61pt'><?php echo $tdebet; ?></td>
  <td class=xl6916673 width=81 style='border-top:none;border-left:none;
  width:61pt'><?php echo $tcredit; ?></td>
  <td class=xl6916673 width=81 style='border-top:none;border-left:none;
  width:61pt'><?php echo $tbalance; ?></td>
 </tr>
 <?php
	$i++;
		}
		} 
    ?>
 <![if supportMisalignedColumns]>
 <tr height=0 style='display:none'>
  <td width=78 style='width:59pt'></td>
  <td width=220 style='width:165pt'></td>
  <td width=138 style='width:104pt'></td>
  <td width=138 style='width:104pt'></td>
  <td width=710 style='width:533pt'></td>
  <td width=81 style='width:61pt'></td>
  <td width=81 style='width:61pt'></td>
  <td width=81 style='width:61pt'></td>
 </tr>
 <![endif]>
</table>

</div>


<!----------------------------->
<!--END OF OUTPUT FROM EXCEL PUBLISH AS WEB PAGE WIZARD-->
<!----------------------------->
</body>

</html>






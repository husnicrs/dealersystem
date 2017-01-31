<?php
	$db=new Database();
	$rptdatefrom = $_POST['rptdatefrom'];
	$rptdateto = $_POST['rptdateto'];
	//error_reporting(0);
	$rptbbn = new Rptbbn();
	$core=new Core();
	$data = $rptbbn->show($rptdatefrom, $rptdateto);
	extract($data);
	$datatotal = $rptbbn->showtotal($rptdatefrom, $rptdateto);
	extract($datatotal);
	
	$datatype = $rptbbn->showtype($rptdatefrom, $rptdateto);
	extract($datatype);
	
	$datatotaltype = $rptbbn->showtotaltype($rptdatefrom, $rptdateto);
	extract($datatotaltype);
	
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
<link rel=File-List href="rptbiayabbn_files/filelist.xml">
<style id="rptbiayabbn_1232_Styles"><!--table
	{mso-displayed-decimal-separator:"\.";
	mso-displayed-thousand-separator:"\,";}
.xl631232
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:18.0pt;
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
.xl641232
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
	white-space:normal;}
.xl651232
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
.xl661232
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
.xl671232
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
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl681232
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
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl691232
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:9.5pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl701232
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:9.5pt;
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
.xl711232
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
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl721232
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
	text-align:general;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl731232
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
.xl741232
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
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl751232
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl761232
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl771232
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl781232
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl791232
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:right;
	vertical-align:bottom;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl801232
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl811232
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
	text-align:center;
	vertical-align:bottom;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl821232
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
	text-align:center;
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl831232
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
	text-align:center;
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl841232
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
	text-align:center;
	vertical-align:bottom;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl851232
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
	text-align:center;
	vertical-align:bottom;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl861232
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
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:none;
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

<div id="rptbiayabbn_1232" align=center x:publishsource="Excel">

<table border=0 cellpadding=0 cellspacing=0 width=959 class=xl641232
 style='border-collapse:collapse;table-layout:fixed;width:719pt'>
 <col class=xl641232 width=28 style='mso-width-source:userset;mso-width-alt:
 1024;width:21pt'>
 <col class=xl641232 width=191 style='mso-width-source:userset;mso-width-alt:
 6985;width:143pt'>
 <col class=xl641232 width=117 span=2 style='mso-width-source:userset;
 mso-width-alt:4278;width:88pt'>
 <col class=xl641232 width=84 style='mso-width-source:userset;mso-width-alt:
 3072;width:63pt'>
 <col class=xl641232 width=80 span=2 style='mso-width-source:userset;
 mso-width-alt:2925;width:60pt'>
 <col class=xl641232 width=84 style='mso-width-source:userset;mso-width-alt:
 3072;width:63pt'>
 <col class=xl641232 width=87 style='mso-width-source:userset;mso-width-alt:
 3181;width:65pt'>
 <col class=xl641232 width=91 style='mso-width-source:userset;mso-width-alt:
 3328;width:68pt'>
 <tr height=29 style='mso-height-source:userset;height:21.75pt'>
  <td colspan=10 height=29 class=xl631232 width=959 style='height:21.75pt;
  width:719pt'>DATA PENGAJUAN BIAYA BBN</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td colspan=2 height=20 class=xl651232 width=219 style='height:15.0pt;
  width:164pt'>Tanggal : <?php echo $rptdatefrom; ?> to <?php echo $rptdateto; ?></td>
  <td class=xl661232 width=117 style='width:88pt'></td>
  <td class=xl661232 width=117 style='width:88pt'></td>
  <td class=xl661232 width=84 style='width:63pt'></td>
  <td class=xl661232 width=80 style='width:60pt'></td>
  <td class=xl661232 width=80 style='width:60pt'></td>
  <td class=xl661232 width=84 style='width:63pt'></td>
  <td class=xl661232 width=87 style='width:65pt'></td>
  <td class=xl661232 width=91 style='width:68pt'></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td colspan=2 height=20 class=xl651232 width=219 style='height:15.0pt;
  width:164pt'>Dicetak : 18/11/2016 10:05:10</td>
  <td class=xl661232 width=117 style='width:88pt'></td>
  <td class=xl661232 width=117 style='width:88pt'></td>
  <td class=xl661232 width=84 style='width:63pt'></td>
  <td class=xl661232 width=80 style='width:60pt'></td>
  <td class=xl661232 width=80 style='width:60pt'></td>
  <td class=xl661232 width=84 style='width:63pt'></td>
  <td class=xl661232 width=87 style='width:65pt'></td>
  <td class=xl661232 width=91 style='width:68pt'></td>
 </tr>
 <tr height=12 style='mso-height-source:userset;height:9.0pt'>
  <td height=12 class=xl661232 width=28 style='height:9.0pt;width:21pt'></td>
  <td class=xl661232 width=191 style='width:143pt'></td>
  <td class=xl661232 width=117 style='width:88pt'></td>
  <td class=xl661232 width=117 style='width:88pt'></td>
  <td class=xl661232 width=84 style='width:63pt'></td>
  <td class=xl661232 width=80 style='width:60pt'></td>
  <td class=xl661232 width=80 style='width:60pt'></td>
  <td class=xl661232 width=84 style='width:63pt'></td>
  <td class=xl661232 width=87 style='width:65pt'></td>
  <td class=xl661232 width=91 style='width:68pt'></td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.75pt'>
  <td height=21 class=xl671232 width=28 style='height:15.75pt;width:21pt'>NO</td>
  <td class=xl671232 width=191 style='border-left:none;width:143pt'>NAMA</td>
  <td class=xl671232 width=117 style='border-left:none;width:88pt'>TYPE</td>
  <td class=xl671232 width=117 style='border-left:none;width:88pt'>NO MESIN</td>
  <td class=xl671232 width=84 style='border-left:none;width:63pt'>NO FAKTUR</td>
  <td class=xl671232 width=80 style='border-left:none;width:60pt'>TGL JUAL</td>
  <td class=xl671232 width=80 style='border-left:none;width:60pt'>TGL PO</td>
  <td class=xl671232 width=84 style='border-left:none;width:63pt'>NOTICE</td>
  <td class=xl671232 width=87 style='border-left:none;width:65pt'>ADMIN</td>
  <td class=xl671232 width=91 style='border-left:none;width:68pt'>TOTAL</td>
 </tr>
 <?php
	$i=1;
	if($data !=0){
	foreach ($data as $value) {
	extract($value);
	$cusname = split(",",$value["cusname"]);
	$vehicletype = split(",",$value["vehicletype"]);
	$mechineno = split(",",$value["mechineno"]);
	$notrans = split(",",$value["notrans"]);
	$datetrans = split(",",$value["datetrans"]);
	$nota = split(",",$value["nota"]);
	$adm = split(",",$value["adm"]);
	$totalbbn = split(",",$value["totalbbn"]);
	
	$counti = count($cusname);
 ?>  
 
  <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl661232 width=28 style='height:15.0pt;width:21pt'></td>
  <td class=xl661232 width=191 style='width:143pt'></td>
  <td class=xl661232 width=117 style='width:88pt'></td>
  <td class=xl661232 width=117 style='width:88pt'></td>
  <td class=xl661232 width=84 style='width:63pt'></td>
  <td class=xl661232 width=80 style='width:60pt'></td>
  <td colspan=3 class=xl711232 width=251 style='width:188pt'>Subtotal Samsat
  <?php echo $samsatname; ?></td>
  <td class=xl721232 align=right width=91 style='width:68pt'><?php echo number_format($sumtotalbbnm); ?></td>
 </tr>
 <?php 
   error_reporting(0);
	$c=count($cusname);
	for($rs=0;$rs<=$c-1;$rs++) {
	$cusnameshow = $cusname[$rs];
	$vehicletypeshow = $vehicletype[$rs];
	$mechinenoshow = $mechineno[$rs];
	$notransshow = $notrans[$rs];
	$datetransshow = $datetrans[$rs];
	$notashow = $nota[$rs];
	$admshow = $adm[$rs];
	$totalbbnshow = $totalbbn[$rs];
  ?>
 
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl691232 width=28 style='height:15.0pt;width:21pt'><?php echo $rs+1; ?></td>
  <td class=xl701232 width=191 style='border-left:none;width:143pt'><?php echo $cusnameshow; ?></td>
  <td class=xl701232 width=117 style='border-left:none;width:88pt'><?php echo $vehicletypeshow; ?></td>
  <td class=xl701232 width=117 style='border-left:none;width:88pt'><?php echo $mechinenoshow; ?></td>
  <td class=xl701232 width=84 style='border-left:none;width:63pt'><?php echo $notransshow; ?></td>
  <td class=xl701232 width=80 style='border-left:none;width:60pt'><?php echo $datetransshow; ?></td>
  <td class=xl701232 width=80 style='border-left:none;width:60pt'><?php echo $datetransshow; ?></td>
  <td class=xl701232 align=right width=84 style='border-left:none;width:63pt'><?php echo number_format($notashow); ?></td>
  <td class=xl701232 align=right width=87 style='border-left:none;width:65pt'><?php echo number_format($admshow); ?></td>
  <td class=xl701232 align=right width=91 style='border-left:none;width:68pt'><?php echo number_format($totalbbnshow); ?></td>
 </tr>
 <?php
		  
	}
$i++;
	}
	}
?> 

 <tr height=20 style='height:15.0pt'>
  <td colspan=2 height=20 class=xl731232 width=219 style='height:15.0pt;
  width:164pt'>REKAP PENGAJUAN BBN</td>
  <td class=xl661232 width=117 style='width:88pt'></td>
  <td class=xl661232 width=117 style='width:88pt'></td>
  <td class=xl661232 width=84 style='width:63pt'></td>
  <td class=xl661232 width=80 style='width:60pt'></td>
  <td colspan=3 class=xl741232 width=251 style='width:188pt'>Grand Total</td>
   <?php
		$i=1;
		if($datatotal !=0){
		foreach ($datatotal as $valuetotal) {
		extract($valuetotal);
	?> 
  <td class=xl721232 align=right width=91 style='width:68pt'><?php echo number_format($tsumtotalbbnm); ?></td>
  <?php
	$i++;
		}
		} 
    ?>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl751232 width=28 style='height:15.0pt;width:21pt'>NO</td>
  <td class=xl761232 width=191 style='border-left:none;width:143pt'>TYPE</td>
  <td class=xl761232 width=117 style='border-left:none;width:88pt'>QTY</td>
  <td class=xl761232 width=117 style='border-left:none;width:88pt'>NOTICE</td>
  <td class=xl761232 width=84 style='border-left:none;width:63pt'>ADM</td>
  <td class=xl641232 width=80 style='width:60pt'></td>
  <td class=xl641232 width=80 style='width:60pt'></td>
  <td class=xl641232 width=84 style='width:63pt'></td>
  <td class=xl641232 width=87 style='width:65pt'></td>
  <td class=xl641232 width=91 style='width:68pt'></td>
 </tr>
  <?php
		$i=1;
		if($datatype !=0){
		foreach ($datatype as $valuedatatype) {
		extract($valuedatatype);
	?>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl771232 width=28 style='height:15.0pt;border-top:none;
  width:21pt'><?php echo $i; ?></td>
  <td class=xl781232 width=191 style='border-top:none;border-left:none;
  width:143pt'><?php echo $vehicletypetype; ?></td>
  <td class=xl781232 align=right width=117 style='border-top:none;border-left:
  none;width:88pt'><?php echo number_format($qtytype); ?></td>
  <td class=xl781232 align=right width=117 style='border-top:none;border-left:
  none;width:88pt'><?php echo number_format($notatype); ?></td>
  <td class=xl781232 align=right width=84 style='border-top:none;border-left:
  none;width:63pt'><?php echo number_format($admtype); ?></td>
  <td class=xl641232 width=80 style='width:60pt'></td>
  <td class=xl641232 width=80 style='width:60pt'></td>
  <td class=xl641232 width=84 style='width:63pt'></td>
  <td class=xl641232 width=87 style='width:65pt'></td>
  <td class=xl641232 width=91 style='width:68pt'></td>
  <?php
	$i++;
		}
		} 
    ?>
    <?php
		$i=1;
		if($datatotaltype !=0){
		foreach ($datatotaltype as $valuedatatotaltype) {
		extract($valuedatatotaltype);
	?>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td colspan=2 height=20 class=xl791232 width=219 style='height:15.0pt;
  width:164pt'>TOTAL</td>
  <td class=xl801232 align=right width=117 style='border-top:none;border-left:
  none;width:88pt'><?php echo number_format($qtyttype); ?></td>
  <td class=xl801232 align=right width=117 style='border-top:none;border-left:
  none;width:88pt'><?php echo number_format($notattype); ?></td>
  <td class=xl801232 align=right width=84 style='border-top:none;border-left:
  none;width:63pt'><?php echo number_format($admttype); ?></td>
  <td class=xl641232 width=80 style='width:60pt'></td>
  <td class=xl641232 width=80 style='width:60pt'></td>
  <td class=xl641232 width=84 style='width:63pt'></td>
  <td class=xl641232 width=87 style='width:65pt'></td>
  <td class=xl641232 width=91 style='width:68pt'></td>
 </tr>
 <?php
	$i++;
		}
		} 
    ?>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl641232 width=28 style='height:15.0pt;width:21pt'></td>
  <td class=xl641232 width=191 style='width:143pt'></td>
  <td class=xl641232 width=117 style='width:88pt'></td>
  <td class=xl641232 width=117 style='width:88pt'></td>
  <td class=xl641232 width=84 style='width:63pt'></td>
  <td class=xl641232 width=80 style='width:60pt'></td>
  <td class=xl641232 width=80 style='width:60pt'></td>
  <td class=xl641232 width=84 style='width:63pt'></td>
  <td class=xl641232 width=87 style='width:65pt'></td>
  <td class=xl641232 width=91 style='width:68pt'></td>
 </tr>
 <tr height=25 style='mso-height-source:userset;height:18.75pt'>
  <td height=25 class=xl641232 width=28 style='height:18.75pt;width:21pt'></td>
  <td class=xl641232 width=191 style='width:143pt'></td>
  <td class=xl641232 width=117 style='width:88pt'></td>
  <td class=xl641232 width=117 style='width:88pt'></td>
  <td class=xl641232 width=84 style='width:63pt'></td>
  <td class=xl641232 width=80 style='width:60pt'></td>
  <td class=xl771232 width=80 style='width:60pt'>Diajukan</td>
  <td class=xl771232 width=84 style='border-left:none;width:63pt'>ADM</td>
  <td class=xl771232 width=87 style='border-left:none;width:65pt'>Accounting</td>
  <td class=xl771232 width=91 style='border-left:none;width:68pt'>Kepala Bagian</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl641232 width=28 style='height:15.0pt;width:21pt'></td>
  <td class=xl641232 width=191 style='width:143pt'></td>
  <td class=xl641232 width=117 style='width:88pt'></td>
  <td class=xl641232 width=117 style='width:88pt'></td>
  <td class=xl641232 width=84 style='width:63pt'></td>
  <td class=xl641232 width=80 style='width:60pt'></td>
  <td rowspan=3 class=xl811232 width=80 style='border-top:none;width:60pt'>&nbsp;</td>
  <td rowspan=3 class=xl811232 width=84 style='border-top:none;width:63pt'>&nbsp;</td>
  <td rowspan=3 class=xl821232 width=87 style='border-top:none;width:65pt'>&nbsp;</td>
  <td rowspan=3 class=xl831232 width=91 style='border-bottom:.5pt solid black;
  border-top:none;width:68pt'>&nbsp;</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl641232 width=28 style='height:15.0pt;width:21pt'></td>
  <td class=xl641232 width=191 style='width:143pt'></td>
  <td class=xl641232 width=117 style='width:88pt'></td>
  <td class=xl641232 width=117 style='width:88pt'></td>
  <td class=xl641232 width=84 style='width:63pt'></td>
  <td class=xl641232 width=80 style='width:60pt'></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl641232 width=28 style='height:15.0pt;width:21pt'></td>
  <td class=xl641232 width=191 style='width:143pt'></td>
  <td class=xl641232 width=117 style='width:88pt'></td>
  <td class=xl641232 width=117 style='width:88pt'></td>
  <td class=xl641232 width=84 style='width:63pt'></td>
  <td class=xl641232 width=80 style='width:60pt'></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl641232 width=28 style='height:15.0pt;width:21pt'></td>
  <td class=xl641232 width=191 style='width:143pt'></td>
  <td class=xl641232 width=117 style='width:88pt'></td>
  <td class=xl641232 width=117 style='width:88pt'></td>
  <td class=xl641232 width=84 style='width:63pt'></td>
  <td class=xl641232 width=80 style='width:60pt'></td>
  <td class=xl641232 width=80 style='width:60pt'></td>
  <td class=xl641232 width=84 style='width:63pt'></td>
  <td class=xl641232 width=87 style='width:65pt'></td>
  <td class=xl861232 width=91 style='border-top:none;width:68pt'>&nbsp;</td>
 </tr>
 <![if supportMisalignedColumns]>
 <tr height=0 style='display:none'>
  <td width=28 style='width:21pt'></td>
  <td width=191 style='width:143pt'></td>
  <td width=117 style='width:88pt'></td>
  <td width=117 style='width:88pt'></td>
  <td width=84 style='width:63pt'></td>
  <td width=80 style='width:60pt'></td>
  <td width=80 style='width:60pt'></td>
  <td width=84 style='width:63pt'></td>
  <td width=87 style='width:65pt'></td>
  <td width=91 style='width:68pt'></td>
 </tr>
 <![endif]>
</table>

</div>


<!----------------------------->
<!--END OF OUTPUT FROM EXCEL PUBLISH AS WEB PAGE WIZARD-->
<!----------------------------->
</body>

</html>






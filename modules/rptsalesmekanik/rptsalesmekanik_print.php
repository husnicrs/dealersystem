<?php
	$db=new Database();
	$rptdatefrom = $_POST['rptdatefrom'];
	$rptdateto = $_POST['rptdateto'];
	//error_reporting(0);
	$rptsalesbymekanik = new Rptsalesbymekanik();
	$core=new Core();
	$data = $rptsalesbymekanik->show($rptdatefrom, $rptdateto);
	extract($data);
	$datatotal = $rptsalesbymekanik->showtotal($rptdatefrom, $rptdateto);
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
<link rel=File-List href="Laporan%20Pendapatan%20Mekanik_files/filelist.xml">
<style id="Book1_12617_Styles"><!--table
	{mso-displayed-decimal-separator:"\.";
	mso-displayed-thousand-separator:"\,";}
.xl1512617
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
.xl6312617
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
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl6412617
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:14.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl6512617
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:12.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl6612617
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:bottom;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl6712617
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
.xl6812617
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
	text-align:left;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl6912617
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
	text-align:right;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7012617
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
	text-align:right;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7112617
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:8.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:bottom;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl7212617
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
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl7312617
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:9.0pt;
	font-weight:400;
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
.xl7412617
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
	text-align:right;
	vertical-align:bottom;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl7512617
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
	text-align:right;
	vertical-align:bottom;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl7612617
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
	text-align:left;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7712617
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
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl7812617
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
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl7912617
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:15.0pt;
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
	white-space:nowrap;}
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

<div id="Book1_12617" align=center x:publishsource="Excel">

<table border=0 cellpadding=0 cellspacing=0 width=683 style='border-collapse:
 collapse;table-layout:fixed;width:513pt'>
 <col width=9 style='mso-width-source:userset;mso-width-alt:329;width:7pt'>
 <col width=30 style='mso-width-source:userset;mso-width-alt:1097;width:23pt'>
 <col width=92 style='mso-width-source:userset;mso-width-alt:3364;width:69pt'>
 <col width=184 style='mso-width-source:userset;mso-width-alt:6729;width:138pt'>
 <col width=61 style='mso-width-source:userset;mso-width-alt:2230;width:46pt'>
 <col width=76 style='mso-width-source:userset;mso-width-alt:2779;width:57pt'>
 <col width=61 style='mso-width-source:userset;mso-width-alt:2230;width:46pt'>
 <col width=83 style='mso-width-source:userset;mso-width-alt:3035;width:62pt'>
 <col width=87 style='mso-width-source:userset;mso-width-alt:3181;width:65pt'>
 <tr height=12 style='mso-height-source:userset;height:9.0pt'>
  <td height=12 class=xl1512617 width=9 style='height:9.0pt;width:7pt'></td>
  <td class=xl1512617 width=30 style='width:23pt'></td>
  <td class=xl1512617 width=92 style='width:69pt'></td>
  <td class=xl1512617 width=184 style='width:138pt'></td>
  <td class=xl1512617 width=61 style='width:46pt'></td>
  <td class=xl1512617 width=76 style='width:57pt'></td>
  <td class=xl1512617 width=61 style='width:46pt'></td>
  <td class=xl1512617 width=83 style='width:62pt'></td>
  <td class=xl1512617 width=87 style='width:65pt'></td>
 </tr>
 <tr height=23 style='mso-height-source:userset;height:17.25pt'>
  <td height=23 class=xl1512617 style='height:17.25pt'></td>
  <td colspan=6 class=xl7912617>LAPORAN PENDAPATAN MEKANIK</td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl1512617 style='height:15.0pt'></td>
  <td class=xl6512617 colspan=3>PEIODE: Dari S/D Sampai</td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
 </tr>
 <tr class=xl6312617 height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6312617 style='height:15.0pt'></td>
  <td class=xl7212617 width=30 style='width:23pt'>No</td>
  <td class=xl7212617 width=92 style='border-left:none;width:69pt'>NIK</td>
  <td class=xl7212617 width=184 style='border-left:none;width:138pt'>Nama</td>
  <td class=xl7212617 width=61 style='border-left:none;width:46pt'>Jml Part</td>
  <td class=xl7212617 width=76 style='border-left:none;width:57pt'>Total Part</td>
  <td class=xl7212617 width=61 style='border-left:none;width:46pt'>Jml Servis</td>
  <td class=xl7212617 width=83 style='border-left:none;width:62pt'>Total Servis</td>
  <td class=xl7212617 width=87 style='border-left:none;width:65pt'>Netto</td>
 </tr>
  <?php
	$i=1;
	if($data !=0){
	foreach ($data as $value) {
	extract($value);
	?> 
 
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl1512617 style='height:15.0pt'></td>
  <td class=xl6612617 width=30 style='border-top:none;width:23pt'><?php echo $i; ?></td>
  <td class=xl7112617 width=92 style='border-top:none;border-left:none;
  width:69pt'><?php echo $nik; ?></td>
  <td class=xl7112617 width=184 style='border-top:none;border-left:none;
  width:138pt'><?php echo $employeename; ?></td>
  <td class=xl7312617 width=61 style='border-top:none;border-left:none;
  width:46pt'><?php echo $qtypart; ?></td>
  <td class=xl7312617 width=76 style='border-top:none;border-left:none;
  width:57pt'><?php echo $amountpart; ?></td>
  <td class=xl7312617 width=61 style='border-top:none;border-left:none;
  width:46pt'><?php echo $qtyservice; ?></td>
  <td class=xl7312617 width=83 style='border-top:none;border-left:none;
  width:62pt'><?php echo $amountsrv; ?></td>
  <td class=xl7412617 width=87 style='border-top:none;border-left:none;
  width:65pt'><?php echo $total; ?></td>
 </tr>
 
 <?php
	$i++;
		}
		} else{
			$core->pesan_warning("Data is empty");
		}
    ?> 
    <?php
	$i=1;
	if($datatotal !=0){
	foreach ($datatotal as $value) {
	extract($value);
	?> 
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl1512617 style='height:15.0pt'></td>
  <td colspan=3 class=xl7712617 width=306 style='width:230pt'>TOTAL</td>
  <td class=xl7512617 width=61 style='border-top:none;width:46pt'><?php echo $tqtypart; ?></td>
  <td class=xl7512617 width=76 style='border-top:none;border-left:none;
  width:57pt'><?php echo $tamountpart; ?></td>
  <td class=xl7512617 width=61 style='border-top:none;border-left:none;
  width:46pt'><?php echo $tqtyservice; ?></td>
  <td class=xl7512617 width=83 style='border-top:none;border-left:none;
  width:62pt'><?php echo $tamountsrv; ?></td>
  <td class=xl7512617 width=87 style='border-top:none;border-left:none;
  width:65pt'><?php echo $ttotal; ?></td>
 </tr>
 
 <?php
	$i++;
		}
		} else{
			$core->pesan_warning("Data is empty");
		}
    ?> 
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl1512617 style='height:15.0pt'></td>
  <td class=xl6812617 width=30 style='width:23pt'></td>
  <td class=xl6812617 width=92 style='width:69pt'></td>
  <td class=xl6712617 width=184 style='width:138pt'></td>
  <td class=xl6712617 width=61 style='width:46pt'></td>
  <td class=xl6712617 width=76 style='width:57pt'></td>
  <td class=xl6712617 width=61 style='width:46pt'></td>
  <td class=xl6912617></td>
  <td class=xl1512617></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl1512617 style='height:15.0pt'></td>
  <td class=xl6812617 width=30 style='width:23pt'></td>
  <td class=xl6812617 width=92 style='width:69pt'></td>
  <td class=xl6712617 width=184 style='width:138pt'></td>
  <td class=xl6712617 width=61 style='width:46pt'></td>
  <td class=xl6712617 width=76 style='width:57pt'></td>
  <td class=xl6712617 width=61 style='width:46pt'></td>
  <td class=xl7012617></td>
  <td class=xl1512617></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl1512617 style='height:15.0pt'></td>
  <td colspan=2 class=xl7612617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
 </tr>
 <![if supportMisalignedColumns]>
 <tr height=0 style='display:none'>
  <td width=9 style='width:7pt'></td>
  <td width=30 style='width:23pt'></td>
  <td width=92 style='width:69pt'></td>
  <td width=184 style='width:138pt'></td>
  <td width=61 style='width:46pt'></td>
  <td width=76 style='width:57pt'></td>
  <td width=61 style='width:46pt'></td>
  <td width=83 style='width:62pt'></td>
  <td width=87 style='width:65pt'></td>
 </tr>
 <![endif]>
</table>

</div>


<!----------------------------->
<!--END OF OUTPUT FROM EXCEL PUBLISH AS WEB PAGE WIZARD-->
<!----------------------------->
</body>

</html>


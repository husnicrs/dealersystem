<?php
	$db=new Database();
	$rptdatefrom = $_POST['rptdatefrom'];
	$rptdateto = $_POST['rptdateto'];
	//error_reporting(0);
	$rptwpp = new Rptwpp();
	$core=new Core();
	$data = $rptwpp->show($rptdatefrom, $rptdateto);
	extract($data);
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
<link rel=File-List href="Laporan%20WPP_files/filelist.xml">
<style id="Laporan WPP_17584_Styles"><!--table
	{mso-displayed-decimal-separator:"\.";
	mso-displayed-thousand-separator:"\,";}
.xl1517584
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
.xl6317584
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
	text-align:center;
	vertical-align:bottom;
	border-top:none;
	border-right:none;
	border-bottom:1.0pt solid black;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl6417584
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:15.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl6517584
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
	text-align:center;
	vertical-align:middle;
	border:1.0pt solid black;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl6617584
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
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid black;
	border-right:1.0pt solid black;
	border-bottom:1.0pt solid black;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl6717584
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
	border-top:none;
	border-right:1.0pt solid black;
	border-bottom:1.0pt solid black;
	border-left:1.0pt solid black;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl6817584
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
	border-top:none;
	border-right:1.0pt solid black;
	border-bottom:1.0pt solid black;
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

<div id="Laporan WPP_17584" align=center x:publishsource="Excel">

<table border=0 cellpadding=0 cellspacing=0 width=977 style='border-collapse:
 collapse;table-layout:fixed;width:734pt'>
 <col width=125 style='mso-width-source:userset;mso-width-alt:4571;width:94pt'>
 <col width=128 style='mso-width-source:userset;mso-width-alt:4681;width:96pt'>
 <col width=180 style='mso-width-source:userset;mso-width-alt:6582;width:135pt'>
 <col width=153 style='mso-width-source:userset;mso-width-alt:5595;width:115pt'>
 <col width=173 style='mso-width-source:userset;mso-width-alt:6326;width:130pt'>
 <col width=218 style='mso-width-source:userset;mso-width-alt:7972;width:164pt'>
 <tr height=27 style='mso-height-source:userset;height:20.25pt'>
  <td colspan=6 height=27 class=xl6417584 width=977 style='height:20.25pt;
  width:734pt'>WPP (Workshop Performance Parameter)</td>
 </tr>
 <tr height=27 style='mso-height-source:userset;height:20.25pt'>
  <td colspan=6 height=27 class=xl6417584 style='height:20.25pt'>Periode : <?php echo $rptdatefrom; ?> to <?php echo $rptdateto; ?></td>
 </tr>
 <tr height=17 style='mso-height-source:userset;height:12.75pt'>
  <td height=17 class=xl6317584 style='height:12.75pt'>&nbsp;</td>
  <td class=xl6317584>&nbsp;</td>
  <td class=xl6317584>&nbsp;</td>
  <td class=xl6317584>&nbsp;</td>
  <td class=xl6317584>&nbsp;</td>
  <td class=xl6317584>&nbsp;</td>
 </tr>
 <tr height=36 style='mso-height-source:userset;height:27.0pt'>
  <td height=36 class=xl6517584 width=125 style='height:27.0pt;border-top:none;
  width:94pt'><span style='mso-no-proof:yes'>Langganan Lama</span></td>
  <td class=xl6617584 width=128 style='border-top:none;width:96pt'><span
  style='mso-no-proof:yes'>Langganan Baru</span></td>
  <td class=xl6617584 width=180 style='border-top:none;width:135pt'><span
  style='mso-no-proof:yes'>Jumlah Langganan Bulan Ini</span></td>
  <td class=xl6517584 width=153 style='border-top:none;border-left:none;
  width:115pt'><span style='mso-no-proof:yes'>Langganan &gt; 3 Bulan</span></td>
  <td class=xl6617584 width=173 style='border-top:none;width:130pt'><span
  style='mso-no-proof:yes'>Langganan yang terkontrol</span></td>
  <td class=xl6617584 width=218 style='border-top:none;width:164pt'><span
  style='mso-no-proof:yes'>Jumlah langganan selama 2 tahun</span></td>
 </tr>
 <?php
		$i=1;
		if($data !=0){
		foreach ($data as $value) {
		extract($value);
	?>  
 <tr height=36 style='mso-height-source:userset;height:27.0pt'>
  <td height=36 class=xl6717584 width=125 style='height:27.0pt;width:94pt'><?php echo $rscount1; ?></td>
  <td class=xl6817584 width=128 style='width:96pt'><?php echo $rscount2; ?></td>
  <td class=xl6817584 width=180 style='width:135pt'><?php echo $rscount3; ?></td>
  <td class=xl6717584 width=153 style='border-left:none;width:115pt'><?php echo $rscount4; ?></td>
  <td class=xl6817584 width=173 style='width:130pt'><?php echo $rscount5; ?></td>
  <td class=xl6817584 width=218 style='width:164pt'><?php echo $rscount6; ?></td>
 </tr>
 <?php
	$i++;
		}
		} else{
			$core->pesan_warning("Data is empty");
		}
    ?>   
 <![if supportMisalignedColumns]>
 <tr height=0 style='display:none'>
  <td width=125 style='width:94pt'></td>
  <td width=128 style='width:96pt'></td>
  <td width=180 style='width:135pt'></td>
  <td width=153 style='width:115pt'></td>
  <td width=173 style='width:130pt'></td>
  <td width=218 style='width:164pt'></td>
 </tr>
 <![endif]>
</table>

</div>


<!----------------------------->
<!--END OF OUTPUT FROM EXCEL PUBLISH AS WEB PAGE WIZARD-->
<!----------------------------->
</body>

</html>



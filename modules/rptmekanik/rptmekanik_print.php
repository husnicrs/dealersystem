<?php
	$db=new Database();
	$datefrom = $_POST['rptdatefrom'];
	$dateto = $_POST['rptdateto'];
	//error_reporting(0);
	$rptmekanik = new Rptmekanik();
	$core=new Core();
	$data = $rptmekanik->show($datefrom, $dateto);
	extract($data);
	$datatotal = $rptmekanik->showtotal($datefrom, $dateto);
	extract($datatotal);
?>



<style type="text/css">
    table { page-break-inside:auto }
    tr    { page-break-inside:avoid; page-break-after:auto }
    thead { display:table-header-group }
    tfoot { display:table-footer-group }
</style>

<html xmlns:v="urn:schemas-microsoft-com:vml"
xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:x="urn:schemas-microsoft-com:office:excel"
xmlns="http://www.w3.org/TR/REC-html40">

<head>
<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
<meta name=ProgId content=Excel.Sheet>
<meta name=Generator content="Microsoft Excel 15">
<link rel=File-List href="Laporan%20Prestasi%20Mekanik_files/filelist.xml">
<!--[if !mso]>
<style>
v\:* {behavior:url(#default#VML);}
o\:* {behavior:url(#default#VML);}
x\:* {behavior:url(#default#VML);}
.shape {behavior:url(#default#VML);}
</style>
<![endif]-->
<style id="Laporan Prestasi Mekanik_17675_Styles"><!--table
	{mso-displayed-decimal-separator:"\.";
	mso-displayed-thousand-separator:"\,";}
.font517675
	{color:black;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;}
.font617675
	{color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;}
.font717675
	{color:black;
	font-size:9.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Tahoma, sans-serif;
	mso-font-charset:0;}
.font817675
	{color:black;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Tahoma, sans-serif;
	mso-font-charset:0;}
.font917675
	{color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Tahoma, sans-serif;
	mso-font-charset:0;}
.font1017675
	{color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Tahoma, sans-serif;
	mso-font-charset:0;}
.font1117675
	{color:black;
	font-size:12.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;}
.font1217675
	{color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;}
.font1317675
	{color:black;
	font-size:9.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;}
.font1417675
	{color:black;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;}
.xl6317675
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:nowrap;}
.xl6417675
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:nowrap;}
.xl6517675
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:nowrap;}
.xl6617675
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:9.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	background:white;
	mso-pattern:black none;
	white-space:normal;}
.xl6717675
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:nowrap;}
.xl6817675
	{padding:0px;
	mso-ignore:padding;
	color:white;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:nowrap;}
.xl6917675
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	background:white;
	mso-pattern:black none;
	white-space:nowrap;}
.xl7017675
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:none;
	border-left:1.5pt solid black;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:nowrap;}
.xl7117675
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:1.0pt solid black;
	border-left:none;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:nowrap;}
.xl7217675
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:1.0pt solid black;
	border-left:none;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:nowrap;}
.xl7317675
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid black;
	border-right:none;
	border-bottom:none;
	border-left:none;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:nowrap;}
.xl7417675
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:12.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:nowrap;}
.xl7517675
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:1.0pt solid black;
	border-bottom:none;
	border-left:1.0pt solid black;
	background:#BFBFBF;
	mso-pattern:teal none;
	white-space:normal;}
.xl7617675
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:9.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:1.0pt solid black;
	border-bottom:none;
	border-left:1.0pt solid black;
	background:#BFBFBF;
	mso-pattern:teal none;
	white-space:normal;}
.xl7717675
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:9.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:2.0pt double black;
	border-right:none;
	border-bottom:1.0pt solid black;
	border-left:1.0pt solid black;
	background:#BFBFBF;
	mso-pattern:teal none;
	mso-protection:locked hidden;
	white-space:normal;}
.xl7817675
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border:1.0pt solid black;
	background:#BFBFBF;
	mso-pattern:teal none;
	white-space:normal;}
.xl7917675
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:1.0pt solid black;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid black;
	background:#BFBFBF;
	mso-pattern:teal none;
	white-space:normal;}
.xl8017675
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:9.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:1.0pt solid black;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid black;
	background:#BFBFBF;
	mso-pattern:teal none;
	white-space:normal;}
.xl8117675
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:9.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:2.0pt double black;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid black;
	background:#BFBFBF;
	mso-pattern:teal none;
	mso-protection:locked hidden;
	white-space:normal;}
.xl8217675
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid black;
	border-right:1.0pt solid black;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid black;
	background:#BFBFBF;
	mso-pattern:teal none;
	white-space:normal;}
.xl8317675
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl8417675
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:12.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl8517675
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid black;
	border-right:none;
	border-bottom:1.0pt solid black;
	border-left:1.0pt solid black;
	background:#BFBFBF;
	mso-pattern:teal none;
	white-space:normal;}
.xl8617675
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:1.0pt solid black;
	border-left:none;
	background:#BFBFBF;
	mso-pattern:teal none;
	white-space:normal;}
.xl8717675
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid black;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid black;
	background:#BFBFBF;
	mso-pattern:teal none;
	white-space:normal;}
.xl8817675
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid black;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid black;
	background:#BFBFBF;
	mso-pattern:teal none;
	white-space:normal;}
.xl8917675
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid black;
	border-bottom:1.0pt solid windowtext;
	border-left:.5pt solid black;
	background:#BFBFBF;
	mso-pattern:teal none;
	white-space:normal;}
.xl9017675
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:1.0pt solid black;
	border-bottom:1.0pt solid windowtext;
	border-left:.5pt solid black;
	background:#BFBFBF;
	mso-pattern:teal none;
	white-space:normal;}
.xl9117675
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	background:#BFBFBF;
	mso-pattern:teal none;
	white-space:normal;}
.xl9217675
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:1.0pt solid black;
	border-bottom:.5pt solid black;
	border-left:1.0pt solid black;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl9317675
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid black;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl9417675
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:1.0pt solid black;
	border-bottom:.5pt solid black;
	border-left:1.0pt solid black;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl9517675
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:1.0pt solid black;
	border-bottom:.5pt solid black;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl9617675
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid black;
	border-left:1.0pt solid black;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl9717675
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:.5pt solid black;
	border-bottom:.5pt solid black;
	border-left:1.0pt solid black;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl9817675
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:.5pt solid black;
	border-bottom:.5pt solid black;
	border-left:.5pt solid black;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl9917675
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:1.0pt solid black;
	border-bottom:.5pt solid black;
	border-left:.5pt solid black;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl10017675
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid black;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl10117675
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:2.0pt double black;
	border-left:2.0pt double black;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl10217675
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:2.0pt double black;
	border-left:none;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl10317675
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:1.0pt solid black;
	border-bottom:2.0pt double black;
	border-left:none;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl10417675
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:2.0pt double black;
	border-left:1.0pt solid black;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl10517675
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid black;
	border-bottom:2.0pt double black;
	border-left:1.0pt solid black;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl10617675
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid black;
	border-bottom:2.0pt double black;
	border-left:.5pt solid black;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl10717675
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:1.0pt solid black;
	border-bottom:2.0pt double black;
	border-left:.5pt solid black;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl10817675
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:1.0pt solid black;
	border-bottom:2.0pt double black;
	border-left:1.0pt solid black;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl10917675
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:14.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl11017675
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:2.0pt double windowtext;
	border-right:none;
	border-bottom:1.0pt solid black;
	border-left:2.0pt double windowtext;
	background:#BFBFBF;
	mso-pattern:teal none;
	white-space:normal;}
.xl11117675
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:2.0pt double windowtext;
	border-right:1.0pt solid black;
	border-bottom:none;
	border-left:1.0pt solid black;
	background:#BFBFBF;
	mso-pattern:teal none;
	white-space:normal;}
.xl11217675
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:9.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:2.0pt double windowtext;
	border-right:1.0pt solid black;
	border-bottom:none;
	border-left:1.0pt solid black;
	background:#BFBFBF;
	mso-pattern:teal none;
	white-space:normal;}
.xl11317675
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:9.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:2.0pt double windowtext;
	border-right:none;
	border-bottom:1.0pt solid black;
	border-left:1.0pt solid black;
	background:#BFBFBF;
	mso-pattern:teal none;
	mso-protection:locked hidden;
	white-space:normal;}
.xl11417675
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:2.0pt double windowtext;
	border-right:1.0pt solid black;
	border-bottom:1.0pt solid black;
	border-left:1.0pt solid black;
	background:#BFBFBF;
	mso-pattern:teal none;
	white-space:normal;}
.xl11517675
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:2.0pt double windowtext;
	border-right:2.0pt double windowtext;
	border-bottom:1.0pt solid black;
	border-left:none;
	background:#BFBFBF;
	mso-pattern:teal none;
	white-space:normal;}
.xl11617675
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:2.0pt double black;
	border-right:none;
	border-bottom:1.0pt solid black;
	border-left:2.0pt double windowtext;
	background:#BFBFBF;
	mso-pattern:teal none;
	white-space:normal;}
.xl11717675
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:2.0pt double black;
	border-right:2.0pt double windowtext;
	border-bottom:1.0pt solid black;
	border-left:none;
	background:#BFBFBF;
	mso-pattern:teal none;
	white-space:normal;}
.xl11817675
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:2.0pt double black;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:2.0pt double windowtext;
	background:#BFBFBF;
	mso-pattern:teal none;
	white-space:normal;}
.xl11917675
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:2.0pt double black;
	border-right:2.0pt double windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	background:#BFBFBF;
	mso-pattern:teal none;
	white-space:normal;}
.xl12017675
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid black;
	border-left:2.0pt double windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl12117675
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:"\#\,\#\#0";
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:2.0pt double windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid black;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl12217675
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:2.0pt double black;
	border-left:2.0pt double windowtext;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl12317675
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:2.0pt double windowtext;
	border-bottom:2.0pt double black;
	border-left:none;
	background:white;
	mso-pattern:#FFFFCC none;
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

<div id="Laporan Prestasi Mekanik_17675" align=center x:publishsource="Excel">

<table border=0 cellpadding=0 cellspacing=0 width=1496 class=xl6417675
 style='border-collapse:collapse;table-layout:fixed;width:1128pt'>
 <col class=xl6417675 width=19 style='mso-width-source:userset;mso-width-alt:
 694;width:14pt'>
 <col class=xl6717675 width=33 style='mso-width-source:userset;mso-width-alt:
 1206;width:25pt'>
 <col class=xl6417675 width=191 style='mso-width-source:userset;mso-width-alt:
 6985;width:143pt'>
 <col class=xl6417675 width=115 style='mso-width-source:userset;mso-width-alt:
 4205;width:86pt'>
 <col class=xl6417675 width=70 style='mso-width-source:userset;mso-width-alt:
 2560;width:53pt'>
 <col class=xl6417675 width=52 style='mso-width-source:userset;mso-width-alt:
 1901;width:39pt'>
 <col class=xl6417675 width=70 span=2 style='mso-width-source:userset;
 mso-width-alt:2560;width:53pt'>
 <col class=xl6417675 width=73 style='mso-width-source:userset;mso-width-alt:
 2669;width:55pt'>
 <col class=xl6417675 width=50 span=4 style='mso-width-source:userset;
 mso-width-alt:1828;width:38pt'>
 <col class=xl6417675 width=50 style='mso-width-source:userset;mso-width-alt:
 1828;width:38pt'>
 <col class=xl6417675 width=50 span=2 style='mso-width-source:userset;
 mso-width-alt:1828;width:38pt'>
 <col class=xl6417675 width=54 style='mso-width-source:userset;mso-width-alt:
 1974;width:41pt'>
 <col class=xl6417675 width=50 style='mso-width-source:userset;mso-width-alt:
 1828;width:38pt'>
 <col class=xl6417675 width=170 style='mso-width-source:userset;mso-width-alt:
 6217;width:128pt'>
 <col class=xl6417675 width=19 style='mso-width-source:userset;mso-width-alt:
 694;width:14pt'>
 <col class=xl6417675 width=80 span=2 style='width:60pt'>
 <tr height=8 style='mso-height-source:userset;height:6.0pt'>
  <td height=8 class=xl6417675 width=19 style='height:6.0pt;width:14pt'>&nbsp;</td>
  <td class=xl6717675 width=33 style='width:25pt'>&nbsp;</td>
  <td class=xl6417675 width=191 style='width:143pt'>&nbsp;</td>
  <td class=xl6417675 width=115 style='width:86pt'>&nbsp;</td>
  <td class=xl6417675 width=70 style='width:53pt'>&nbsp;</td>
  <td class=xl6417675 width=52 style='width:39pt'>&nbsp;</td>
  <td class=xl6417675 width=70 style='width:53pt'>&nbsp;</td>
  <td class=xl6417675 width=70 style='width:53pt'>&nbsp;</td>
  <td class=xl6417675 width=73 style='width:55pt'>&nbsp;</td>
  <td class=xl6417675 width=50 style='width:38pt'>&nbsp;</td>
  <td class=xl6417675 width=50 style='width:38pt'>&nbsp;</td>
  <td class=xl6417675 width=50 style='width:38pt'>&nbsp;</td>
  <td class=xl6417675 width=50 style='width:38pt'>&nbsp;</td>
  <td class=xl6417675 width=50 style='width:38pt'>&nbsp;</td>
  <td class=xl6417675 width=50 style='width:38pt'>&nbsp;</td>
  <td class=xl6417675 width=50 style='width:38pt'>&nbsp;</td>
  <td class=xl6417675 width=54 style='width:41pt'>&nbsp;</td>
  <td class=xl6417675 width=50 style='width:38pt'>&nbsp;</td>
  <td class=xl7417675 width=170 style='width:128pt'>&nbsp;</td>
  <td class=xl6417675 width=19 style='width:14pt'>&nbsp;</td>
  <td class=xl6417675 width=80 style='width:60pt'>&nbsp;</td>
  <td class=xl6417675 width=80 style='width:60pt'>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6417675 style='height:15.0pt'>&nbsp;</td>
  <td colspan=9 class=xl10917675 width=724 style='width:545pt'>LAPORAN PRESTASI
  MEKANIK DALAM BULAN INI</td>
  <td class=xl8317675 width=50 style='width:38pt'>&nbsp;</td>
  <td class=xl8317675 width=50 style='width:38pt'>&nbsp;</td>
  <td class=xl8317675 width=50 style='width:38pt'>&nbsp;</td>
  <td class=xl8317675 width=50 style='width:38pt'>&nbsp;</td>
  <td class=xl8317675 width=50 style='width:38pt'>&nbsp;</td>
  <td class=xl8317675 width=50 style='width:38pt'>&nbsp;</td>
  <td class=xl8317675 width=54 style='width:41pt'>&nbsp;</td>
  <td class=xl8317675 width=50 style='width:38pt'>&nbsp;</td>
  <td class=xl8317675 width=170 style='width:128pt'>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6417675 style='height:15.0pt'>&nbsp;</td>
  <td colspan=4 class=xl8417675 width=409 style='width:307pt'>Periode : <?php echo $datefrom; ?> to <?php echo $dateto; ?></td>
  <td class=xl8317675 width=52 style='width:39pt'>&nbsp;</td>
  <td class=xl8317675 width=70 style='width:53pt'>&nbsp;</td>
  <td class=xl8317675 width=70 style='width:53pt'>&nbsp;</td>
  <td class=xl8317675 width=73 style='width:55pt'>&nbsp;</td>
  <td class=xl8317675 width=50 style='width:38pt'>&nbsp;</td>
  <td class=xl8317675 width=50 style='width:38pt'>&nbsp;</td>
  <td class=xl8317675 width=50 style='width:38pt'>&nbsp;</td>
  <td class=xl8317675 width=50 style='width:38pt'>&nbsp;</td>
  <td class=xl8317675 width=50 style='width:38pt'>&nbsp;</td>
  <td class=xl8317675 width=50 style='width:38pt'>&nbsp;</td>
  <td class=xl8317675 width=50 style='width:38pt'>&nbsp;</td>
  <td class=xl8317675 width=54 style='width:41pt'>&nbsp;</td>
  <td class=xl8317675 width=50 style='width:38pt'>&nbsp;</td>
  <td class=xl8317675 width=170 style='width:128pt'>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
 </tr>
 <tr height=11 style='mso-height-source:userset;height:8.25pt'>
  <td height=11 class=xl6417675 style='height:8.25pt'>&nbsp;</td>
  <td class=xl8417675 width=33 style='width:25pt'>&nbsp;</td>
  <td class=xl8317675 width=191 style='width:143pt'>&nbsp;</td>
  <td class=xl8317675 width=115 style='width:86pt'>&nbsp;</td>
  <td class=xl8317675 width=70 style='width:53pt'>&nbsp;</td>
  <td class=xl8317675 width=52 style='width:39pt'>&nbsp;</td>
  <td class=xl8317675 width=70 style='width:53pt'>&nbsp;</td>
  <td class=xl8317675 width=70 style='width:53pt'>&nbsp;</td>
  <td class=xl8317675 width=73 style='width:55pt'>&nbsp;</td>
  <td class=xl8317675 width=50 style='width:38pt'>&nbsp;</td>
  <td class=xl8317675 width=50 style='width:38pt'>&nbsp;</td>
  <td class=xl8317675 width=50 style='width:38pt'>&nbsp;</td>
  <td class=xl8317675 width=50 style='width:38pt'>&nbsp;</td>
  <td class=xl8317675 width=50 style='width:38pt'>&nbsp;</td>
  <td class=xl8317675 width=50 style='width:38pt'>&nbsp;</td>
  <td class=xl8317675 width=50 style='width:38pt'>&nbsp;</td>
  <td class=xl8317675 width=54 style='width:41pt'>&nbsp;</td>
  <td class=xl8317675 width=50 style='width:38pt'>&nbsp;</td>
  <td class=xl8317675 width=170 style='width:128pt'>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6517675 style='height:15.0pt'>&nbsp;</td>
  <td rowspan=3 class=xl11017675 width=33 style='border-bottom:1.0pt solid black;
  width:25pt'>No.</td>
  <td rowspan=3 class=xl11117675 width=191 style='border-bottom:1.0pt solid black;
  width:143pt'>Nama Mekanik</td>
  <td rowspan=3 class=xl11117675 width=115 style='border-bottom:1.0pt solid black;
  width:86pt'>NIKJ</td>
  <td rowspan=3 class=xl11217675 width=70 style='border-bottom:1.0pt solid black;
  width:53pt'>Tahun Bergabung</td>
  <td rowspan=3 class=xl11217675 width=52 style='border-bottom:1.0pt solid black;
  width:39pt'>Training TTL (0,1,2,3)</td>
  <td rowspan=3 class=xl11317675 width=70 style='border-bottom:1.0pt solid black;
  width:53pt'>Jumlah Kehadiran (hari)</td>
  <td rowspan=3 class=xl11317675 width=70 style='border-bottom:1.0pt solid black;
  width:53pt'>Jumlah Absen (hari)</td>
  <td rowspan=3 class=xl11217675 width=73 style='border-bottom:1.0pt solid black;
  width:55pt'>Jumlah Unit diservis</td>
  <td colspan=9 class=xl11417675 width=454 style='border-left:none;width:345pt'>JENIS
  PEKERJAAN</td>
  <td rowspan=3 class=xl11517675 width=170 style='border-bottom:1.0pt solid black;
  width:128pt'>Total Pendapatan Jasa</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6517675 style='height:15.0pt'>&nbsp;</td>
  <td rowspan=2 class=xl8517675 width=50 style='border-bottom:1.0pt solid black;
  border-top:none;width:38pt'>KPB</td>
  <td rowspan=2 class=xl7817675 width=50 style='border-bottom:1.0pt solid black;
  border-top:none;width:38pt'>Claim (C2)</td>
  <td colspan=3 class=xl7817675 width=150 style='border-left:none;width:114pt'>Quick
  Service (QS)</td>
  <td rowspan=2 class=xl7817675 width=50 style='border-bottom:1.0pt solid black;
  border-top:none;width:38pt'>LR</td>
  <td rowspan=2 class=xl7817675 width=50 style='border-bottom:1.0pt solid black;
  border-top:none;width:38pt'>HR</td>
  <td rowspan=2 class=xl8617675 width=54 style='border-bottom:1.0pt solid black;
  width:41pt'>TOTAL</td>
  <td rowspan=2 class=xl7817675 width=50 style='border-bottom:1.0pt solid black;
  border-top:none;width:38pt'>JR</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td rowspan=3 class=xl6617675 width=80 style='width:60pt'>&nbsp;</td>
 </tr>
 <tr class=xl6717675 height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6317675 style='height:15.0pt'>&nbsp;</td>
  <td class=xl8817675 width=50 style='border-left:none;width:38pt'>CS</td>
  <td class=xl8917675 width=50 style='border-left:none;width:38pt'>LS</td>
  <td class=xl9017675 width=50 style='border-left:none;width:38pt'>OR +</td>
  <td class=xl6317675>&nbsp;</td>
  <td class=xl6717675>&nbsp;</td>
 </tr>
  <?php
		$i=1;
		if($data !=0){
		foreach ($data as $value) {
		extract($value);
	?>  
 <tr height=24 style='mso-height-source:userset;height:18.0pt'>
  <td height=24 class=xl6517675 style='height:18.0pt'>&nbsp;</td>
  <td class=xl12017675 width=33 style='border-top:none;width:25pt'><?php echo $i; ?></td>
  <td class=xl9217675 width=191 style='border-top:none;width:143pt'><?php echo $employeename; ?></td>
  <td class=xl9317675 width=115 style='border-top:none;width:86pt'>&nbsp;</td>
  <td class=xl9417675 width=70 style='border-top:none;width:53pt'></td>
  <td class=xl9417675 width=52 style='border-top:none;border-left:none;
  width:39pt'></td>
  <td class=xl9517675 width=70 style='border-top:none;width:53pt'></td>
  <td class=xl9517675 width=70 style='border-top:none;width:53pt'></td>
  <td class=xl9517675 width=73 style='border-top:none;width:55pt'><?php echo $qtyunit; ?></td>
  <td class=xl9617675 width=50 style='border-top:none;border-left:none;
  width:38pt'><?php echo $qtykpb; ?></td>
  <td class=xl9617675 width=50 style='border-top:none;width:38pt'><?php echo $qtyc2; ?></td>
  <td class=xl9717675 width=50 style='border-top:none;width:38pt'><?php echo $qtycs; ?></td>
  <td class=xl9817675 width=50 style='border-top:none;border-left:none;
  width:38pt'><?php echo $qtyls; ?></td>
  <td class=xl9917675 width=50 style='border-top:none;border-left:none;
  width:38pt'><?php echo $qtyorplus; ?></td>
  <td class=xl10017675 width=50 style='border-top:none;width:38pt'><?php echo $qtylr; ?></td>
  <td class=xl9417675 width=50 style='border-top:none;width:38pt'><?php echo $qtyhr; ?></td>
  <td class=xl10017675 width=54 style='border-top:none;width:41pt'><?php echo $qtyservice; ?></td>
  <td class=xl9617675 width=50 style='border-top:none;width:38pt'>&nbsp;</td>
  <td class=xl12117675 width=170 style='border-top:none;width:128pt'><?php echo number_format($subtotal); ?></td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6817675 align=right>0</td>
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
		foreach ($datatotal as $valuetotal) {
		extract($valuetotal);
	?> 
 <tr height=24 style='mso-height-source:userset;height:18.0pt'>
  <td height=24 class=xl6517675 style='height:18.0pt'>&nbsp;</td>
  <td colspan=2 class=xl12217675 width=224 style='width:168pt'>T O T A L</td>
  <td class=xl10217675 width=115 style='width:86pt'>&nbsp;</td>
  <td class=xl10217675 width=70 style='width:53pt'>&nbsp;</td>
  <td class=xl10217675 width=52 style='width:39pt'>&nbsp;</td>
  <td class=xl10317675 width=70 style='width:53pt'></td>
  <td class=xl10317675 width=70 style='width:53pt'></td>
  <td class=xl10317675 width=73 style='width:55pt'><?php echo $tqtyunit; ?></td>
  <td class=xl10417675 width=50 style='border-left:none;width:38pt'><?php echo $tqtykpb; ?></td>
  <td class=xl10417675 width=50 style='width:38pt'><?php echo $tqtyc2; ?></td>
  <td class=xl10517675 width=50 style='width:38pt'><?php echo $tqtycs; ?></td>
  <td class=xl10617675 width=50 style='border-left:none;width:38pt'><?php echo $tqtyls; ?></td>
  <td class=xl10717675 width=50 style='border-left:none;width:38pt'><?php echo $tqtyorplus; ?></td>
  <td class=xl10217675 width=50 style='width:38pt'><?php echo $tqtylr; ?></td>
  <td class=xl10817675 width=50 style='width:38pt'><?php echo $tqtyhr; ?></td>
  <td class=xl10217675 width=54 style='width:41pt'><?php echo $tqtyservice; ?></td>
  <td class=xl10817675 width=50 style='width:38pt'></td>
  <td class=xl12317675 width=170 style='width:128pt'><?php echo number_format($tsubtotal); ?></td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6917675>&nbsp;</td>
 </tr>
  <?php
	$i++;
		}
		} else{
			$core->pesan_warning("Data is empty");
		}
    ?>  
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6517675 style='height:15.0pt'>&nbsp;</td>
  <td class=xl6317675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td colspan=3 height=20 class=xl6317675 style='height:15.0pt'>Dibuat,</td>
  <td class=xl6317675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td colspan=3 class=xl6317675>Diperiksa,</td>
  <td class=xl6317675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td colspan=3 class=xl6317675>Mengetahui,</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl6517675 style='height:15.0pt'>&nbsp;</td>
  <td class=xl6317675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl6517675 style='height:15.0pt'>&nbsp;</td>
  <td class=xl6317675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td colspan=3 height=20 class=xl6317675 style='height:15.0pt'>&nbsp;</td>
  <td class=xl6317675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6317675>&nbsp;</td>
  <td class=xl6317675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
 </tr>
 <tr height=21 style='height:15.75pt'>
  <td height=21 class=xl6517675 style='height:15.75pt'>&nbsp;</td>
  <td class=xl7117675>&nbsp;</td>
  <td class=xl7217675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td colspan=3 class=xl7117675>&nbsp;</td>
  <td class=xl6317675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td colspan=3 class=xl7117675>&nbsp;</td>
  <td class=xl6317675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td colspan=3 height=20 class=xl6317675 style='height:15.0pt'>Front desk</td>
  <td class=xl6317675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td colspan=3 class=xl6317675>Kepala Bengkel</td>
  <td class=xl6317675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td colspan=3 class=xl7317675>Pemilik / Pimpinan</td>
  <td class=xl6317675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl6517675 style='height:15.0pt'>&nbsp;</td>
  <td class=xl6317675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6517675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
 </tr>
 <tr height=17 style='height:12.75pt'>
  <td height=17 class=xl6417675 style='height:12.75pt'>&nbsp;</td>
  <td class=xl6717675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
 </tr>
 <tr height=17 style='height:12.75pt'>
  <td height=17 class=xl6417675 style='height:12.75pt'>&nbsp;</td>
  <td class=xl6717675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
 </tr>
 <tr height=17 style='height:12.75pt'>
  <td height=17 class=xl6417675 style='height:12.75pt'>&nbsp;</td>
  <td class=xl6717675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
 </tr>
 <tr height=17 style='height:12.75pt'>
  <td height=17 class=xl6417675 style='height:12.75pt'>&nbsp;</td>
  <td class=xl6717675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
 </tr>
 <tr height=17 style='height:12.75pt'>
  <td height=17 class=xl6417675 style='height:12.75pt'>&nbsp;</td>
  <td class=xl6717675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
 </tr>
 <tr height=17 style='height:12.75pt'>
  <td height=17 class=xl6417675 style='height:12.75pt'>&nbsp;</td>
  <td class=xl6717675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
 </tr>
 <tr height=17 style='height:12.75pt'>
  <td height=17 class=xl6417675 style='height:12.75pt'>&nbsp;</td>
  <td class=xl6717675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
 </tr>
 <tr height=17 style='height:12.75pt'>
  <td height=17 class=xl6417675 style='height:12.75pt'>&nbsp;</td>
  <td class=xl6717675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
 </tr>
 <tr height=17 style='height:12.75pt'>
  <td height=17 class=xl6417675 style='height:12.75pt'>&nbsp;</td>
  <td class=xl6717675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
 </tr>
 <tr height=17 style='height:12.75pt'>
  <td height=17 class=xl6417675 style='height:12.75pt'>&nbsp;</td>
  <td class=xl6717675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6817675>&nbsp;</td>
  <td class=xl6817675>&nbsp;</td>
  <td class=xl6817675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
  <td class=xl6417675>&nbsp;</td>
 </tr>
 <![if supportMisalignedColumns]>
 <tr height=0 style='display:none'>
  <td width=19 style='width:14pt'></td>
  <td width=33 style='width:25pt'></td>
  <td width=191 style='width:143pt'></td>
  <td width=115 style='width:86pt'></td>
  <td width=70 style='width:53pt'></td>
  <td width=52 style='width:39pt'></td>
  <td width=70 style='width:53pt'></td>
  <td width=70 style='width:53pt'></td>
  <td width=73 style='width:55pt'></td>
  <td width=50 style='width:38pt'></td>
  <td width=50 style='width:38pt'></td>
  <td width=50 style='width:38pt'></td>
  <td width=50 style='width:38pt'></td>
  <td width=50 style='width:38pt'></td>
  <td width=50 style='width:38pt'></td>
  <td width=50 style='width:38pt'></td>
  <td width=54 style='width:41pt'></td>
  <td width=50 style='width:38pt'></td>
  <td width=170 style='width:128pt'></td>
  <td width=19 style='width:14pt'></td>
  <td width=80 style='width:60pt'></td>
  <td width=80 style='width:60pt'></td>
 </tr>
 <![endif]>
</table>

</div>


<!----------------------------->
<!--END OF OUTPUT FROM EXCEL PUBLISH AS WEB PAGE WIZARD-->
<!----------------------------->
</body>

</html>





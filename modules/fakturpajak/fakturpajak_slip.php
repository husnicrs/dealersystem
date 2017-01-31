<?php
	$db=new Database();
	$moddetail=$_GET['mod'];
	$modulename=str_replace("_slip","", $moddetail);
	${"$modulename"} = new Fakturpajak();
	$core=new Core();
	if (isset($_GET['key'])) {
		$key = $_GET['key'];
		$data = ${"$modulename"}->showDetail($key);
		extract($data);
	}
?>
<style type="text/css">
    table { page-break-inside:auto }
    tr    { page-break-inside:avoid; page-break-after:auto }
    thead { display:table-header-group }
    tfoot { display:table-footer-group }
</style>

<html xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:x="urn:schemas-microsoft-com:office:excel"
xmlns="http://www.w3.org/TR/REC-html40">

<head>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
<meta name=ProgId content=Excel.Sheet>
<meta name=Generator content="Microsoft Excel 15">
<link rel=File-List href="fakturpajak_files/filelist.xml">
<style id="fakturpajak_374_Styles">
<!--table
	{mso-displayed-decimal-separator:"\.";
	mso-displayed-thousand-separator:"\,";}
.xl15374
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl66374
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl67374
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl68374
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl69374
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl70374
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	border-top:none;
	border-right:none;
	border-bottom:none;
	border-left:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl71374
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:none;
	border-left:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl72374
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:"\@";
	text-align:general;
	vertical-align:bottom;
	border-top:none;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl73374
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:"\@";
	text-align:general;
	vertical-align:bottom;
	border-top:none;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl74374
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	border-top:none;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl75374
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl76374
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl77374
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:"\@";
	text-align:left;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl78374
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl79374
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	border-top:none;
	border-right:1.0pt solid windowtext;
	border-bottom:none;
	border-left:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl80374
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	border-top:none;
	border-right:1.0pt solid windowtext;
	border-bottom:none;
	border-left:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl81374
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl82374
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:bottom;
	border-top:none;
	border-right:1.0pt solid windowtext;
	border-bottom:none;
	border-left:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl83374
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	border-top:none;
	border-right:1.0pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl84374
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	border-top:none;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl85374
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl86374
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:"dd\\-mm\\-yyyy\;\@";
	text-align:left;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl87374
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl88374
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	border-top:none;
	border-right:1.0pt solid windowtext;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl89374
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	border-top:1.0pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl90374
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	border-top:none;
	border-right:1.0pt solid windowtext;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl91374
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	border-top:none;
	border-right:1.0pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl92374
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:"_\(\[$Rp-421\]* \#\,\#\#0_\)\;_\(\[$Rp-421\]* \\\(\#\,\#\#0\\\)\;_\(\[$Rp-421\]* \0022-\0022_\)\;_\(\@_\)";
	text-align:center;
	vertical-align:bottom;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl93374
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	border-top:none;
	border-right:1.0pt solid windowtext;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl94374
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:00000;
	text-align:general;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl95374
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:"_\(\[$Rp-421\]* \#\,\#\#0_\)\;_\(\[$Rp-421\]* \\\(\#\,\#\#0\\\)\;_\(\[$Rp-421\]* \0022-\0022_\)\;_\(\@_\)";
	text-align:center;
	vertical-align:bottom;
	border-top:1.0pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl96374
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:"_\(\[$Rp-421\]* \#\,\#\#0_\)\;_\(\[$Rp-421\]* \\\(\#\,\#\#0\\\)\;_\(\[$Rp-421\]* \0022-\0022_\)\;_\(\@_\)";
	text-align:center;
	vertical-align:bottom;
	border-top:none;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl97374
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:"_\(\[$Rp-421\]* \#\,\#\#0_\)\;_\(\[$Rp-421\]* \\\(\#\,\#\#0\\\)\;_\(\[$Rp-421\]* \0022-\0022_\)\;_\(\@_\)";
	text-align:center;
	vertical-align:bottom;
	border-top:none;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl98374
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:"_\(\[$Rp-421\]* \#\,\#\#0_\)\;_\(\[$Rp-421\]* \\\(\#\,\#\#0\\\)\;_\(\[$Rp-421\]* \0022-\0022_\)\;_\(\@_\)";
	text-align:center;
	vertical-align:bottom;
	border-top:none;
	border-right:1.0pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl99374
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:"_\(\[$Rp-421\]* \#\,\#\#0_\)\;_\(\[$Rp-421\]* \\\(\#\,\#\#0\\\)\;_\(\[$Rp-421\]* \0022-\0022_\)\;_\(\@_\)";
	text-align:center;
	vertical-align:bottom;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl100374
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	border-top:none;
	border-right:none;
	border-bottom:none;
	border-left:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl101374
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl102374
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:"_\(\[$Rp-421\]* \#\,\#\#0_\)\;_\(\[$Rp-421\]* \\\(\#\,\#\#0\\\)\;_\(\[$Rp-421\]* \0022-\0022_\)\;_\(\@_\)";
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:none;
	border-left:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl103374
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:"_\(\[$Rp-421\]* \#\,\#\#0_\)\;_\(\[$Rp-421\]* \\\(\#\,\#\#0\\\)\;_\(\[$Rp-421\]* \0022-\0022_\)\;_\(\@_\)";
	text-align:center;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl104374
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:none;
	border-right:1.0pt solid windowtext;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl105374
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:"_\(\[$Rp-421\]* \#\,\#\#0_\)\;_\(\[$Rp-421\]* \\\(\#\,\#\#0\\\)\;_\(\[$Rp-421\]* \0022-\0022_\)\;_\(\@_\)";
	text-align:center;
	vertical-align:bottom;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl106374
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl107374
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	border-top:1.0pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl108374
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
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
	border-left:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl109374
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
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
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl110374
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
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
	border-right:1.0pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl111374
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:00000;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl112374
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl113374
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl114374
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
-->
</style>
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

<div id="fakturpajak_374" align=center x:publishsource="Excel">

<table border=0 cellpadding=0 cellspacing=0 width=433 class=xl66374
 style='border-collapse:collapse;table-layout:fixed;width:324pt'>
 <col class=xl66374 width=44 style='mso-width-source:userset;mso-width-alt:
 1609;width:33pt'>
 <col class=xl66374 width=10 style='mso-width-source:userset;mso-width-alt:
 365;width:8pt'>
 <col class=xl66374 width=12 style='mso-width-source:userset;mso-width-alt:
 438;width:9pt'>
 <col class=xl66374 width=13 style='mso-width-source:userset;mso-width-alt:
 475;width:10pt'>
 <col class=xl66374 width=12 style='mso-width-source:userset;mso-width-alt:
 438;width:9pt'>
 <col class=xl66374 width=16 span=2 style='mso-width-source:userset;mso-width-alt:
 585;width:12pt'>
 <col class=xl66374 width=8 style='mso-width-source:userset;mso-width-alt:292;
 width:6pt'>
 <col class=xl66374 width=16 span=3 style='mso-width-source:userset;mso-width-alt:
 585;width:12pt'>
 <col class=xl66374 width=8 style='mso-width-source:userset;mso-width-alt:292;
 width:6pt'>
 <col class=xl66374 width=23 style='mso-width-source:userset;mso-width-alt:
 841;width:17pt'>
 <col class=xl66374 width=19 span=2 style='mso-width-source:userset;mso-width-alt:
 694;width:14pt'>
 <col class=xl66374 width=12 style='mso-width-source:userset;mso-width-alt:
 438;width:9pt'>
 <col class=xl66374 width=19 style='mso-width-source:userset;mso-width-alt:
 694;width:14pt'>
 <col class=xl66374 width=12 style='mso-width-source:userset;mso-width-alt:
 438;width:9pt'>
 <col class=xl66374 width=19 span=2 style='mso-width-source:userset;mso-width-alt:
 694;width:14pt'>
 <col class=xl66374 width=16 style='mso-width-source:userset;mso-width-alt:
 585;width:12pt'>
 <col class=xl66374 width=12 style='mso-width-source:userset;mso-width-alt:
 438;width:9pt'>
 <col class=xl66374 width=19 style='mso-width-source:userset;mso-width-alt:
 694;width:14pt'>
 <col class=xl66374 width=16 span=2 style='mso-width-source:userset;mso-width-alt:
 585;width:12pt'>
 <col class=xl66374 width=15 style='mso-width-source:userset;mso-width-alt:
 548;width:11pt'>
 <col class=xl66374 width=10 style='mso-width-source:userset;mso-width-alt:
 365;width:8pt'>
 <tr height=6 style='mso-height-source:userset;height:4.5pt'>
  <td height=6 class=xl68374 width=44 style='height:4.5pt;width:33pt'>&nbsp;</td>
  <td class=xl69374 width=10 style='width:8pt'>&nbsp;</td>
  <td class=xl69374 width=12 style='width:9pt'>&nbsp;</td>
  <td class=xl69374 width=13 style='width:10pt'>&nbsp;</td>
  <td class=xl69374 width=12 style='width:9pt'>&nbsp;</td>
  <td class=xl69374 width=16 style='width:12pt'>&nbsp;</td>
  <td class=xl69374 width=16 style='width:12pt'>&nbsp;</td>
  <td class=xl69374 width=8 style='width:6pt'>&nbsp;</td>
  <td class=xl69374 width=16 style='width:12pt'>&nbsp;</td>
  <td class=xl69374 width=16 style='width:12pt'>&nbsp;</td>
  <td class=xl69374 width=16 style='width:12pt'>&nbsp;</td>
  <td class=xl69374 width=8 style='width:6pt'>&nbsp;</td>
  <td class=xl69374 width=23 style='width:17pt'>&nbsp;</td>
  <td class=xl69374 width=19 style='width:14pt'>&nbsp;</td>
  <td class=xl69374 width=19 style='width:14pt'>&nbsp;</td>
  <td class=xl69374 width=12 style='width:9pt'>&nbsp;</td>
  <td class=xl69374 width=19 style='width:14pt'>&nbsp;</td>
  <td class=xl69374 width=12 style='width:9pt'>&nbsp;</td>
  <td class=xl69374 width=19 style='width:14pt'>&nbsp;</td>
  <td class=xl69374 width=19 style='width:14pt'>&nbsp;</td>
  <td class=xl69374 width=16 style='width:12pt'>&nbsp;</td>
  <td class=xl69374 width=12 style='width:9pt'>&nbsp;</td>
  <td class=xl69374 width=19 style='width:14pt'>&nbsp;</td>
  <td class=xl69374 width=16 style='width:12pt'>&nbsp;</td>
  <td class=xl69374 width=16 style='width:12pt'>&nbsp;</td>
  <td class=xl69374 width=15 style='width:11pt'>&nbsp;</td>
  <td class=xl89374 width=10 style='width:8pt'>&nbsp;</td>
 </tr>
 <tr height=34 style='mso-height-source:userset;height:25.5pt'>
  <td colspan=27 height=34 class=xl108374 style='border-right:1.0pt solid black;
  height:25.5pt'>FAKTUR PAJAK</td>
 </tr>
 <tr height=8 style='mso-height-source:userset;height:6.0pt'>
  <td height=8 class=xl70374 style='height:6.0pt'>&nbsp;</td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl89374 style='border-top:none'>&nbsp;</td>
 </tr>
 <tr class=xl67374 height=19 style='height:14.25pt'>
  <td height=19 class=xl71374 colspan=10 style='height:14.25pt'>Pengusaha Kena
  Pajak</td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl93374>&nbsp;</td>
 </tr>
 <tr class=xl67374 height=8 style='mso-height-source:userset;height:6.0pt'>
  <td height=8 class=xl71374 style='height:6.0pt'>&nbsp;</td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl93374>&nbsp;</td>
 </tr>
 <tr class=xl67374 height=19 style='height:14.25pt'>
  <td height=19 class=xl71374 colspan=3 style='height:14.25pt'>N a m a</td>
  <td class=xl67374>:</td>
  <td class=xl67374></td>
  <td class=xl67374 colspan=8>SAMUEL SIDDIK</td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl93374>&nbsp;</td>
 </tr>
 <tr class=xl67374 height=8 style='mso-height-source:userset;height:6.0pt'>
  <td height=8 class=xl71374 style='height:6.0pt'>&nbsp;</td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl93374>&nbsp;</td>
 </tr>
 <tr class=xl67374 height=19 style='height:14.25pt'>
  <td height=19 class=xl71374 colspan=3 style='height:14.25pt'>A l a m a t</td>
  <td class=xl67374>:</td>
  <td class=xl67374></td>
  <td class=xl67374 colspan=16>Jl. Sunan Gunung Jati No. 47 Cirebon</td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl93374>&nbsp;</td>
 </tr>
 <tr class=xl67374 height=8 style='mso-height-source:userset;height:6.0pt'>
  <td height=8 class=xl71374 style='height:6.0pt'>&nbsp;</td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl93374>&nbsp;</td>
 </tr>
 <tr class=xl67374 height=19 style='height:14.25pt'>
  <td height=19 class=xl71374 colspan=3 style='height:14.25pt'>N P W P<span
  style='mso-spacerun:yes'> </span></td>
  <td class=xl67374>:</td>
  <td class=xl67374></td>
  <td class=xl85374 align=right>0</td>
  <td class=xl85374 align=right style='border-left:none'>6</td>
  <td class=xl67374></td>
  <td class=xl85374 align=right>5</td>
  <td class=xl85374 align=right style='border-left:none'>8</td>
  <td class=xl85374 align=right style='border-left:none'>2</td>
  <td class=xl67374></td>
  <td class=xl85374 align=right>1</td>
  <td class=xl85374 align=right style='border-left:none'>1</td>
  <td class=xl85374 align=right style='border-left:none'>8</td>
  <td class=xl67374></td>
  <td class=xl85374 align=right>3</td>
  <td class=xl67374></td>
  <td class=xl85374 align=right>4</td>
  <td class=xl85374 align=right style='border-left:none'>2</td>
  <td class=xl85374 align=right style='border-left:none'>6</td>
  <td class=xl67374></td>
  <td class=xl85374 align=right>0</td>
  <td class=xl85374 align=right style='border-left:none'>0</td>
  <td class=xl85374 align=right style='border-left:none'>0</td>
  <td class=xl67374></td>
  <td class=xl93374>&nbsp;</td>
 </tr>
 <tr class=xl67374 height=8 style='mso-height-source:userset;height:6.0pt'>
  <td height=8 class=xl71374 style='height:6.0pt'>&nbsp;</td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl93374>&nbsp;</td>
 </tr>
 <tr class=xl67374 height=19 style='height:14.25pt'>
  <td height=19 class=xl71374 style='height:14.25pt'>&nbsp;</td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td colspan=7 class=xl86374></td>
  <td class=xl86374></td>
  <td class=xl86374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl67374></td>
  <td class=xl93374>&nbsp;</td>
 </tr>
 <tr height=8 style='mso-height-source:userset;height:6.0pt'>
  <td height=8 class=xl72374 style='height:6.0pt'>&nbsp;</td>
  <td class=xl73374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl73374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl91374>&nbsp;</td>
 </tr>
 <tr class=xl67374 height=34 style='mso-height-source:userset;height:25.5pt'>
  <td height=34 class=xl75374 colspan=3 style='height:25.5pt'>Tanggal,</td>
  <td class=xl77374 colspan=7><?php echo $datetransprint; ?></td>
  <td class=xl76374 style='border-top:none'>&nbsp;</td>
  <td class=xl76374 style='border-top:none'>&nbsp;</td>
  <td class=xl76374 style='border-top:none'>&nbsp;</td>
  <td class=xl76374 style='border-top:none'>&nbsp;</td>
  <td class=xl76374 colspan=7>No. Urut Faktur :</td>
  <td class=xl76374 style='border-top:none'>&nbsp;</td>
  <td colspan=4 class=xl111374><?php echo $nourut; ?></td>
  <td class=xl94374 style='border-top:none'>&nbsp;</td>
 </tr>
 <tr height=34 style='mso-height-source:userset;height:25.5pt'>
  <td height=34 class=xl78374 style='height:25.5pt;border-top:none'>No.</td>
  <td colspan=13 class=xl112374 style='border-left:none'>Nama Barang Kena Pajak</td>
  <td colspan=5 class=xl112374 style='border-right:1.0pt solid black'>Kuantum</td>
  <td colspan=8 class=xl112374 style='border-right:1.0pt solid black;
  border-left:none'>Harga Jual<span style='mso-spacerun:yes'> </span></td>
 </tr>
 <tr height=19 style='height:14.25pt'>
  <td height=19 class=xl79374 style='height:14.25pt'>&nbsp;</td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl68374 style='border-top:none'>&nbsp;</td>
  <td class=xl69374 style='border-top:none'>&nbsp;</td>
  <td class=xl69374 style='border-top:none'>&nbsp;</td>
  <td class=xl69374 style='border-top:none'>&nbsp;</td>
  <td class=xl89374 style='border-top:none'>&nbsp;</td>
  <td class=xl70374 style='border-left:none'>&nbsp;</td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl89374 style='border-top:none'>&nbsp;</td>
 </tr>
 <tr height=19 style='height:14.25pt'>
  <td height=19 class=xl80374 style='height:14.25pt'>1</td>
  <td class=xl66374></td>
  <td class=xl66374 colspan=11>Sepeda Motor Honda</td>
  <td class=xl88374>&nbsp;</td>
  <td colspan=5 class=xl100374 style='border-right:1.0pt solid black;
  border-left:none'><?php echo $kuantum; ?></td>
  <td colspan=7 class=xl102374 style='border-left:none'><span
  style='mso-spacerun:yes'> </span>Rp<span style='mso-spacerun:yes'> 
  </span><?php echo $hargajualsw; ?> </td>
  <td class=xl90374>&nbsp;</td>
 </tr>
 <tr height=19 style='height:14.25pt'>
  <td height=19 class=xl79374 style='height:14.25pt'>&nbsp;</td>
  <td class=xl66374></td>
  <td class=xl66374 colspan=3>Type</td>
  <td class=xl81374>:</td>
  <td colspan=8 class=xl81374 style='border-right:1.0pt solid black'><?php echo $vehicletype; ?></td>
  <td class=xl70374 style='border-left:none'>&nbsp;</td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl88374>&nbsp;</td>
  <td class=xl70374 style='border-left:none'>&nbsp;</td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl88374>&nbsp;</td>
 </tr>
 <tr height=19 style='height:14.25pt'>
  <td height=19 class=xl79374 style='height:14.25pt'>&nbsp;</td>
  <td class=xl66374></td>
  <td class=xl66374 colspan=7>No. Rangka :</td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl70374>&nbsp;</td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl88374>&nbsp;</td>
  <td class=xl70374 style='border-left:none'>&nbsp;</td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl88374>&nbsp;</td>
 </tr>
 <tr height=19 style='height:14.25pt'>
  <td height=19 class=xl79374 style='height:14.25pt'>&nbsp;</td>
  <td class=xl66374></td>
  <td class=xl81374 colspan=3>MH1</td>
  <td colspan=9 class=xl81374 style='border-right:1.0pt solid black'> <?php echo $rangkano; ?></td>
  <td class=xl70374 style='border-left:none'>&nbsp;</td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl88374>&nbsp;</td>
  <td class=xl70374 style='border-left:none'>&nbsp;</td>
  <td class=xl66374></td>
  <td class=xl66374><span style='mso-spacerun:yes'> </span></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl88374>&nbsp;</td>
 </tr>
 <tr height=19 style='height:14.25pt'>
  <td height=19 class=xl79374 style='height:14.25pt'>&nbsp;</td>
  <td class=xl66374></td>
  <td class=xl66374 colspan=6>No. Mesin :</td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl87374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl70374>&nbsp;</td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl88374>&nbsp;</td>
  <td class=xl70374 style='border-left:none'>&nbsp;</td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl88374>&nbsp;</td>
 </tr>
 <tr height=19 style='height:14.25pt'>
  <td height=19 class=xl82374 style='height:14.25pt'>&nbsp;</td>
  <td class=xl66374></td>
  <td colspan=9 class=xl81374> <?php echo $mechineno; ?></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl70374>&nbsp;</td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl88374>&nbsp;</td>
  <td class=xl70374 style='border-left:none'>&nbsp;</td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl88374>&nbsp;</td>
 </tr>
 <tr height=19 style='height:14.25pt'>
  <td height=19 class=xl79374 style='height:14.25pt'>&nbsp;</td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl70374>&nbsp;</td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl88374>&nbsp;</td>
  <td class=xl70374 style='border-left:none'>&nbsp;</td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl88374>&nbsp;</td>
 </tr>
 <tr height=19 style='height:14.25pt'>
  <td height=19 class=xl79374 style='height:14.25pt'>&nbsp;</td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl70374>&nbsp;</td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl88374>&nbsp;</td>
  <td class=xl70374 style='border-left:none'>&nbsp;</td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl88374>&nbsp;</td>
 </tr>
 <tr height=19 style='height:14.25pt'>
  <td height=19 class=xl79374 style='height:14.25pt'>&nbsp;</td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl70374>&nbsp;</td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl88374>&nbsp;</td>
  <td class=xl70374 style='border-left:none'>&nbsp;</td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl88374>&nbsp;</td>
 </tr>
 <tr height=19 style='height:14.25pt'>
  <td height=19 class=xl79374 style='height:14.25pt'>&nbsp;</td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl70374>&nbsp;</td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl88374>&nbsp;</td>
  <td class=xl70374 style='border-left:none'>&nbsp;</td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl88374>&nbsp;</td>
 </tr>
 <tr height=19 style='height:14.25pt'>
  <td height=19 class=xl79374 style='height:14.25pt'>&nbsp;</td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl70374>&nbsp;</td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl88374>&nbsp;</td>
  <td class=xl70374 style='border-left:none'>&nbsp;</td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl88374>&nbsp;</td>
 </tr>
 <tr height=23 style='mso-height-source:userset;height:17.25pt'>
  <td height=23 class=xl79374 style='height:17.25pt'>&nbsp;</td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl70374>&nbsp;</td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl88374>&nbsp;</td>
  <td class=xl70374 style='border-left:none'>&nbsp;</td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl88374>&nbsp;</td>
 </tr>
 <tr height=19 style='height:14.25pt'>
  <td height=19 class=xl79374 style='height:14.25pt'>&nbsp;</td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl70374>&nbsp;</td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl88374>&nbsp;</td>
  <td class=xl70374 style='border-left:none'>&nbsp;</td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl88374>&nbsp;</td>
 </tr>
 <tr height=32 style='mso-height-source:userset;height:24.0pt'>
  <td height=32 class=xl83374 style='height:24.0pt'>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl84374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl91374>&nbsp;</td>
  <td class=xl84374 style='border-left:none'>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl91374>&nbsp;</td>
 </tr>
 <tr height=27 style='mso-height-source:userset;height:20.25pt'>
  <td height=27 class=xl70374 colspan=10 style='height:20.25pt'>Dasar Pengenaan
  Pajak</td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl89374 style='border-top:none'>&nbsp;</td>
  <td colspan=8 class=xl105374 style='border-right:1.0pt solid black;
  border-left:none'><span style='mso-spacerun:yes'> </span>Rp<span
  style='mso-spacerun:yes'>    </span> <?php echo $dppsw; ?> </td>
 </tr>
 <tr height=7 style='mso-height-source:userset;height:5.25pt'>
  <td height=7 class=xl68374 style='height:5.25pt'>&nbsp;</td>
  <td class=xl69374>&nbsp;</td>
  <td class=xl69374>&nbsp;</td>
  <td class=xl69374>&nbsp;</td>
  <td class=xl69374>&nbsp;</td>
  <td class=xl69374>&nbsp;</td>
  <td class=xl69374>&nbsp;</td>
  <td class=xl69374>&nbsp;</td>
  <td class=xl69374>&nbsp;</td>
  <td class=xl69374>&nbsp;</td>
  <td class=xl69374>&nbsp;</td>
  <td class=xl69374>&nbsp;</td>
  <td class=xl69374>&nbsp;</td>
  <td class=xl69374>&nbsp;</td>
  <td class=xl69374>&nbsp;</td>
  <td class=xl69374>&nbsp;</td>
  <td class=xl69374>&nbsp;</td>
  <td class=xl69374>&nbsp;</td>
  <td class=xl89374>&nbsp;</td>
  <td class=xl69374 style='border-top:none'>&nbsp;</td>
  <td class=xl69374 style='border-top:none'>&nbsp;</td>
  <td class=xl69374 style='border-top:none'>&nbsp;</td>
  <td class=xl69374 style='border-top:none'>&nbsp;</td>
  <td class=xl69374 style='border-top:none'>&nbsp;</td>
  <td class=xl69374 style='border-top:none'>&nbsp;</td>
  <td class=xl69374 style='border-top:none'>&nbsp;</td>
  <td class=xl89374 style='border-top:none'>&nbsp;</td>
 </tr>
 <tr height=23 style='mso-height-source:userset;height:17.25pt'>
  <td height=23 class=xl84374 colspan=16 style='height:17.25pt'>PPN : 10% x
  Dasar Pengenaan Pajak</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl91374>&nbsp;</td>
  <td colspan=8 class=xl96374 style='border-right:1.0pt solid black;border-left:
  none'><span style='mso-spacerun:yes'> </span>Rp<span
  style='mso-spacerun:yes'>      </span><?php echo $ppnsw; ?>  </td>
 </tr>
 <tr height=9 style='mso-height-source:userset;height:6.75pt'>
  <td height=9 class=xl70374 style='height:6.75pt'>&nbsp;</td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl88374>&nbsp;</td>
  <td colspan=8 class=xl99374 style='border-right:1.0pt solid black;border-left:
  none'>&nbsp;</td>
 </tr>
 <tr height=19 style='height:14.25pt'>
  <td height=19 class=xl84374 colspan=3 style='height:14.25pt'>Jumlah :</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl91374>&nbsp;</td>
  <td colspan=8 class=xl96374 style='border-right:1.0pt solid black;border-left:
  none'><span style='mso-spacerun:yes'> </span>Rp<span
  style='mso-spacerun:yes'>    </span><?php echo $jumlahdppsw; ?> </td>
 </tr>
 <tr height=11 style='mso-height-source:userset;height:8.25pt'>
  <td height=11 class=xl70374 style='height:8.25pt'>&nbsp;</td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl88374>&nbsp;</td>
  <td colspan=8 class=xl99374 style='border-right:1.0pt solid black;border-left:
  none'>&nbsp;</td>
 </tr>
 <tr height=24 style='mso-height-source:userset;height:18.0pt'>
  <td height=24 class=xl84374 colspan=16 style='height:18.0pt'>Ppn. BM : ………….%
  x …………..= 0</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl91374>&nbsp;</td>
  <td colspan=8 class=xl96374 style='border-right:1.0pt solid black;border-left:
  none'>&nbsp;</td>
 </tr>
 <tr height=24 style='mso-height-source:userset;height:18.0pt'>
  <td height=24 class=xl68374 colspan=12 style='height:18.0pt'>Lembar ke -1
  untuk Pembeli</td>
  <td class=xl69374 style='border-top:none'>&nbsp;</td>
  <td class=xl69374 style='border-top:none'>&nbsp;</td>
  <td class=xl69374 style='border-top:none'>&nbsp;</td>
  <td class=xl69374 style='border-top:none'>&nbsp;</td>
  <td class=xl69374 style='border-top:none'>&nbsp;</td>
  <td class=xl69374 style='border-top:none'>&nbsp;</td>
  <td class=xl69374 style='border-top:none'>&nbsp;</td>
  <td class=xl92374 style='border-top:none'>&nbsp;</td>
  <td class=xl92374 style='border-top:none'>&nbsp;</td>
  <td class=xl92374 style='border-top:none'>&nbsp;</td>
  <td class=xl92374 style='border-top:none'>&nbsp;</td>
  <td class=xl92374 style='border-top:none'>&nbsp;</td>
  <td class=xl92374 style='border-top:none'>&nbsp;</td>
  <td class=xl92374 style='border-top:none'>&nbsp;</td>
  <td class=xl95374 style='border-top:none'>&nbsp;</td>
 </tr>
 <tr height=24 style='mso-height-source:userset;height:18.0pt'>
  <td height=24 class=xl84374 colspan=18 style='height:18.0pt'>Lembar ke -2
  untuk Pengusaha Kena Pajak</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl74374>&nbsp;</td>
  <td class=xl91374>&nbsp;</td>
 </tr>
 <tr height=19 style='height:14.25pt'>
  <td height=19 class=xl66374 colspan=4 style='height:14.25pt'>PK.PPN.20</td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
  <td class=xl66374></td>
 </tr>
 <![if supportMisalignedColumns]>
 <tr height=0 style='display:none'>
  <td width=44 style='width:33pt'></td>
  <td width=10 style='width:8pt'></td>
  <td width=12 style='width:9pt'></td>
  <td width=13 style='width:10pt'></td>
  <td width=12 style='width:9pt'></td>
  <td width=16 style='width:12pt'></td>
  <td width=16 style='width:12pt'></td>
  <td width=8 style='width:6pt'></td>
  <td width=16 style='width:12pt'></td>
  <td width=16 style='width:12pt'></td>
  <td width=16 style='width:12pt'></td>
  <td width=8 style='width:6pt'></td>
  <td width=23 style='width:17pt'></td>
  <td width=19 style='width:14pt'></td>
  <td width=19 style='width:14pt'></td>
  <td width=12 style='width:9pt'></td>
  <td width=19 style='width:14pt'></td>
  <td width=12 style='width:9pt'></td>
  <td width=19 style='width:14pt'></td>
  <td width=19 style='width:14pt'></td>
  <td width=16 style='width:12pt'></td>
  <td width=12 style='width:9pt'></td>
  <td width=19 style='width:14pt'></td>
  <td width=16 style='width:12pt'></td>
  <td width=16 style='width:12pt'></td>
  <td width=15 style='width:11pt'></td>
  <td width=10 style='width:8pt'></td>
 </tr>
 <![endif]>
</table>

</div>


<!----------------------------->
<!--END OF OUTPUT FROM EXCEL PUBLISH AS WEB PAGE WIZARD-->
<!----------------------------->
</body>

</html>

